<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; // Untuk gunain Query 
use App\_dapros;
use App\_dapros_statistics;
use App\_tapping_status;

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
            DB::raw("IFNULL(SUM(CASE WHEN `tapping_status_id` = 2 AND DATE(`call_consume_datetime`) = CURDATE() THEN 1 ELSE 0 END), 0)  AS `return_daily`"),
            DB::raw("IFNULL(SUM(CASE WHEN `tapping_status_id` = 2 AND DATE(`call_consume_datetime`) = CURDATE() THEN 1 ELSE 0 END), 0)  AS `returntoagree_daily`"), // Belum kebikin countingnya
            DB::raw("IFNULL(SUM(CASE WHEN `tapping_status_id` = 2 AND DATE(`call_consume_datetime`) = CURDATE() THEN 1 ELSE 0 END), 0)  AS `returntodecline_daily`") // Belum kebikin countingny
    		)->where('tapping_agent_username', auth()->user()->username)->first();
    	return $data;
    }
}
