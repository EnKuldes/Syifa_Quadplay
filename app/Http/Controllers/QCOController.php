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
        $this->middleware('QCO', ['except' => ['chain_tapping_call']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    	$counting = $this->countingActivity();
        return view('qco.index')->with('counting',$counting);
    }
    /**
     * Menampilkan tabel consume QCO berdasarkan parameter.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function consume($param)
    {
        switch ($param) {
            case 'all':
                $qWhere = "`tapping_status_id` > 0";
                break;
            case 'return':
                $qWhere = "`tapping_status_id` = 2";
                break;
            case 'approved':
                $qWhere = "`tapping_status_id` = 1";
                break;
            case 'returntoagree':
                $qWhere = "`tapping_status_id` = 2 and `data_condition` = 'returned to qco' and `call_status_detail_id` = 1";
                break;
            case 'returntodecline':
                $qWhere = "`tapping_status_id` = 2 and `data_condition` = 'returned to qco' and `call_status_detail_id` = 3";
                break;
            
            default:
                $qWhere = "";
                break;
        }
        $datas = _dapros_statistics::whereRaw($qWhere)
               ->where('tapping_agent_username', auth()->user()->username)
               ->orderBy([['call_consume_datetime', 'desc'], ['updated_at', 'desc']])
               ->paginate(5);
        //return response()->json($datas, 200);
        return view('qco.consume')->with('datas',$datas);
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

        # Kalo data nya status tapping nya return maka
        if ($request->input('status_tapping') == 2) {
            $ebr_value = 'yes'; #Kolom ever_be_returned bernilai 'yes'
            $dc_value = 'returned to agent'; #Kolom data_condition bernilai 'returned to agent'
        }
        elseif (null !== $request->input('data_is_return') AND $request->input('data_is_return') == 1){
            $ebr_value = 'yes'; #Kolom ever_be_returned bernilai 'yes'
            $dc_value = '-'; #Kolom data condituin bernilai '-'
        }
        else{
            $ebr_value = 'no'; #Kolom ever_be_returned bernilai 'yes'
            $dc_value = '-'; #Kolom data condituin bernilai '-'
        }
        # Post ke Dapros_statistics dg status INSERT INTO ... ON DUPLICATE KEY UPDATE ...
        $statistics_dapros = _dapros_statistics::updateOrCreate(
            ['dapros_id' => $request->input('dapros_id')],
            [
                'tapping_status_id' => $tapp->tapping_status_id
                , 'tapping_information' => $tapp->tapping_information
                , 'tapping_agent_username' => $tapp->tapping_agent_username
                , 'tapping_consume_datetime' => $tapp->created_at
                , 'ever_be_returned' => $ebr_value
                , 'data_condition' => $dc_value
            ]
        )->first();
        
        #memastikan bahwa save ke tabel Dapros Statistics berhasil
        $data = _dapros_statistics::findOrFail($statistics_dapros->id);
        if (! $data) {
            abort(500, 'Error while saving statistics information');
        }
        else{
            # Return hasilnya
            return response()->json(['success' => "success"], 200);
        }

    }
    /**
     * Workspace dengan value dari parameter.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function retapping($id)
    {
        $counting = $this->countingActivity();

        $dataToRecall = _dapros_statistics::where([
                            ['id', $id],
                            ['data_condition', '=', 'returned to qco'],
                            ['ever_be_returned', '=', 'yes']
                        ])
                        ->firstOrFail();
        $counting['details_call'] = $dataToRecall;
        $counting['details_dapros'] = _dapros::where('id', $dataToRecall->dapros_id)->firstOrFail();
        # Apakah data pernah di return atau data return?
        if ($dataToRecall->tapping_status_id == 2) {
            $counting['data_is_return'] = true;
        }

        return view('qco.index')->with('counting',$counting);
    }
    # JSON response for view dapros_statistic
    public function viewDataStatistics(Request $request)
    {
        $data = _dapros_statistics::where('id', $request->input('id'))->firstOrFail();
        $details_dapros = _dapros::where('id', $data->dapros_id)->firstOrFail();
        $details_call = [
            'status_call' => $data->call_status->value_call_status,
            'reason_status_call' => $data->call_status_detail->value_call_status_detail,
            'detail_reason_status_call' => $data->call_status_detail_reason->value_call_status_detail_reason,
            'am_call' => $data->call_am_datetime,
            'fu_call' => $data->call_fu_datetime,
            'information_call' => $data->call_information,
            'attempts_call' => $data->call_attempts,
            'agent_call' => ($data->call_agent_username != null ? $data->call_agent->name : null),
            'consume_call' => $data->call_consume_datetime,
            'status_tapping' => $data->tapping_status_id,
            'information_tapping' => $data->tapping_information,
            'agent_tapping' => ($data->tapping_agent_username != null ? $data->tapping_agent->name : null),
            'consume_tapping' => $data->tapping_consume_datetime
        ];
        $datas = [
            'details_dapros' => $details_dapros,
            'details_call' => $details_call
        ];
        return response()->json($datas, 200);

    }
    /**
     * Chained Select 
     */
    public function chain_tapping_call()
    {
    	$data = _tapping_status::select('id','value_tapping_status')->where('is_enabled', '=', '1')->get();
        return response()->json($data);
    }
    # Function buat Counting Activity Agent
    public function countActivityAgent()
    {
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
