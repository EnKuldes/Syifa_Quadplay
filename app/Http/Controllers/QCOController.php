<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; // Untuk gunain Query 
use App\_dapros;
use App\_dapros_statistics;
use App\_tapping_status;
use App\_tapping;

class QCOController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('QCO');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    	/*$counting = _dapros_statistics::select(
			DB::raw("IFNULL(SUM(CASE WHEN `tapping_status_id` = 1 AND DATE(`call_consume_datetime`) = CURDATE() THEN 1 ELSE 0 END), 0)  AS `approved_daily`"),
			DB::raw("IFNULL(SUM(CASE WHEN `tapping_status_id` = 2 AND DATE(`call_consume_datetime`) = CURDATE() THEN 1 ELSE 0 END), 0)  AS `return_daily`"),
            DB::raw("IFNULL(SUM(CASE WHEN `tapping_status_id` = 2 AND DATE(`call_consume_datetime`) = CURDATE() THEN 1 ELSE 0 END), 0)  AS `returntoagree_daily`"), // Belum kebikin countingnya
            DB::raw("IFNULL(SUM(CASE WHEN `tapping_status_id` = 2 AND DATE(`call_consume_datetime`) = CURDATE() THEN 1 ELSE 0 END), 0)  AS `returntodecline_daily`") // Belum kebikin countingnya
    		)->where('tapping_agent_username', auth()->user()->username)->first();*/
    	$counting = $this->countingActivity();
        return view('qco.index')->with('counting',$counting);
    }
    /**
     * Mencari data
     */
    public function getData()
    {
    	#mencari data yang available
    	$data = _dapros_statistics::where([
					    		['tapping_agent_username',NULL],
					    		['call_status_detail_reason_id',1]
					    	])
						    ->inRandomOrder()
						    ->firstOrFail();

    	$data->tapping_agent_username = auth()->user()->username;
    	$updateResult = $data->save();
    	# Memastikan bahwa save berhasil memperbaharui data
    	if (! $updateResult) {
    		abort(500, 'Error while updating status data.');
    	}

    	# Ngambil value yang diperlukan saja
    	$datas['details_dapros'] = _dapros::where('id', $data->dapros_id)->firstOrFail();
    	$datas['details_call'] = $data;
    	
		// Return hasilnya
    	return response()->json($datas);
    }
    /**
     * Save Data dari inputan ke Tabel Dapros_statitisctic 
     */
    public function saveDataTapping(Request $request)
    {
        # Error messages validation
        $messages = [
            'dapros_id.required' => "You haven't fetch data yet.",
            'status_tapping.required'  => 'A status tapping is required',
            'information.required'  => 'An information is required'
        ];
        # Rules Validation
        $validation = $this->validate($request, [
            'dapros_id' => 'required',
            'status_tapping' => 'required',
            'information' => 'required'
        ], $messages);

        # Post ke tabel Tapping
        $tapp = new _tapping;
        $tapp->dapros_id = $request->input('dapros_id');
        $tapp->tapping_status_id = $request->input('status_tapping');
        $tapp->tapping_information = $request->input('information');
        $tapp->tapping_agent_username = auth()->user()->username;
        $boolSaveTapp = $tapp->save();

        # Memastikan bahwa save ke tabel Call berhasil
        if (! $boolSaveTapp ) {
            abort(500, 'Error while saving tapping information');
        }

        # Post ke Dapros_statistics dg status INSERT INTO ... ON DUPLICATE KEY UPDATE ...
        $statistics_dapros = _dapros_statistics::updateOrCreate(
            ['dapros_id' => $request->input('dapros_id')],
            [
                'tapping_status_id' => $tapp->tapping_status_id
                , 'tapping_information' => $tapp->tapping_information
                , 'tapping_agent_username' => $tapp->tapping_agent_username
                , 'tapping_consume_datetime' => $tapp->created_at
            ]
        )->first();
        
        #memastikan bahwa save ke tabel Dapros Statistics berhasil
        $data = _dapros_statistics::findOrFail($statistics_dapros->id);
        if (! $data) {
            abort(500, 'Error while saving statistics information');
        }
        else{
            if ($data->tapping_status_id == 2) {
                $data->ever_be_returned = 'yes';
                $data->data_condition = 'returned to agent';
            }
            else{
                $data->data_condition = '-';
            }
            $data->save();
        }

        # Return hasilnya
        return response()->json(['success' => "success"], 200);
    }
    /**
     * Chained Select 
     */
    public function chain_tapping_call()
    {
    	$data = _tapping_status::select('id','value_tapping_status')->get();
        return response()->json($data);
    }
    # Function buat Counting Activity Agent
    public function countActivityAgent()
    {
    	/*$data = _dapros_statistics::select(
			DB::raw("IFNULL(SUM(CASE WHEN `tapping_status_id` = 1 AND DATE(`call_consume_datetime`) = CURDATE() THEN 1 ELSE 0 END), 0)  AS `approved_daily`"),
            DB::raw("IFNULL(SUM(CASE WHEN `tapping_status_id` = 2 AND DATE(`call_consume_datetime`) = CURDATE() THEN 1 ELSE 0 END), 0)  AS `return_daily`"),
            DB::raw("IFNULL(SUM(CASE WHEN `tapping_status_id` = 2 AND DATE(`call_consume_datetime`) = CURDATE() THEN 1 ELSE 0 END), 0)  AS `returntoagree_daily`"), // Belum kebikin countingnya
            DB::raw("IFNULL(SUM(CASE WHEN `tapping_status_id` = 2 AND DATE(`call_consume_datetime`) = CURDATE() THEN 1 ELSE 0 END), 0)  AS `returntodecline_daily`") // Belum kebikin countingny
    		)->where('tapping_agent_username', auth()->user()->username)->first();*/
		$data = $this->countingActivity();
    	return response()->json($data, 200);
    }
    # Func to count QCO activty
    protected function countingActivity()
    {
    	$data = _dapros_statistics::select(
			DB::raw("IFNULL(SUM(CASE WHEN `tapping_status_id` = 1 AND DATE(`call_consume_datetime`) = CURDATE() THEN 1 ELSE 0 END), 0)  AS `approved_daily`"),
            DB::raw("IFNULL(SUM(CASE WHEN `tapping_status_id` = 2 AND data_condition = 'returned to agent' AND DATE(`call_consume_datetime`) = CURDATE() THEN 1 ELSE 0 END), 0)  AS `return_daily`"),
            DB::raw("IFNULL(SUM(CASE WHEN `call_status_detail_id` = 1 AND `ever_be_returned` = 'yes' AND data_condition = 'returned to qco' AND DATE(`call_consume_datetime`) = CURDATE() THEN 1 ELSE 0 END), 0)  AS `returntoagree_daily`"), // Belum kebikin countingnya
            DB::raw("IFNULL(SUM(CASE WHEN `call_status_detail_id` = 3 AND `ever_be_returned` = 'yes' AND data_condition = 'returned to qco' AND DATE(`call_consume_datetime`) = CURDATE() THEN 1 ELSE 0 END), 0)  AS `returntodecline_daily`") // Belum kebikin countingnya
    		)->where('tapping_agent_username', auth()->user()->username)->first();
    	return $data;
    }
}
