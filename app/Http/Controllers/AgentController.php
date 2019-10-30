<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; // Untuk gunain Query 
use App\_dapros;
use App\_dapros_statistics;
use App\_call;
use App\_call_status;
use App\_call_status_detail;
use App\_call_status_detail_reason;

class AgentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    	$counting = _dapros_statistics::select(
			DB::raw("IFNULL(SUM(CASE WHEN `call_status_id` > 0 THEN 1 ELSE 0 END), 0) AS `consumed`"),
			DB::raw("IFNULL(SUM(CASE WHEN `call_status_detail_id` = 1 THEN 1 ELSE 0 END), 0)  AS `agree`"),
			DB::raw("IFNULL(SUM(CASE WHEN `call_status_detail_id` = 2 THEN 1 ELSE 0 END), 0)  AS `fu`"),
			DB::raw("IFNULL(SUM(CASE WHEN `call_status_detail_id` = 3 THEN 1 ELSE 0 END), 0)  AS `decline`"),
			DB::raw("IFNULL(SUM(CASE WHEN `call_status_id` = 2 THEN 1 ELSE 0 END), 0)  AS `nc`"),
			DB::raw("IFNULL(SUM(CASE WHEN `tapping_status_id` = 1 THEN 1 ELSE 0 END), 0)  AS `approved`"),
			DB::raw("IFNULL(SUM(CASE WHEN `tapping_status_id` = 2 THEN 1 ELSE 0 END), 0)  AS `return`"),

			DB::raw("IFNULL(SUM(CASE WHEN `call_status_id` > 0 AND DATE(`call_consume_datetime`) = CURDATE() THEN 1 ELSE 0 END), 0) AS `consumed_daily`"),
			DB::raw("IFNULL(SUM(CASE WHEN `call_status_detail_id` = 1 AND DATE(`call_consume_datetime`) = CURDATE() THEN 1 ELSE 0 END), 0)  AS `agree_daily`"),
			DB::raw("IFNULL(SUM(CASE WHEN `call_status_detail_id` = 2 THEN 1 ELSE 0 END), 0)  AS `fu_daily`"),
			DB::raw("IFNULL(SUM(CASE WHEN `call_status_detail_id` = 3 AND DATE(`call_consume_datetime`) = CURDATE() THEN 1 ELSE 0 END), 0)  AS `decline_daily`"),
			DB::raw("IFNULL(SUM(CASE WHEN `call_status_id` = 2 AND DATE(`call_consume_datetime`) = CURDATE() THEN 1 ELSE 0 END), 0)  AS `nc_daily`"),
			DB::raw("IFNULL(SUM(CASE WHEN `tapping_status_id` = 1 AND DATE(`call_consume_datetime`) = CURDATE() THEN 1 ELSE 0 END), 0)  AS `approved_daily`"),
			DB::raw("IFNULL(SUM(CASE WHEN `tapping_status_id` = 2 AND DATE(`call_consume_datetime`) = CURDATE() THEN 1 ELSE 0 END), 0)  AS `return_daily`")
    		)->where('call_agent_username', auth()->user()->username)->first();
        return view('agent.index')->with('counting',$counting);
    }

    /**
     * Menampilkan tabel consume agent berdasarkan parameter.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function consume($param)
    {
    	switch ($param) {
    		case 'all':
    			$qWhere = "`call_status_id` > 0";
    			break;
    		case 'agree':
    			$qWhere = "`call_status_detail_id` = 1";
    			break;
    		case 'follow_up':
    			$qWhere = "`call_status_detail_id` = 2";
    			break;
    		case 'decline':
    			$qWhere = "`call_status_detail_id` = 3";
    			break;
    		case 'not_contacted':
    			$qWhere = "`call_status_id` = 2";
    			break;
    		case 'return':
    			$qWhere = "`tapping_status_id` = 2";
    			break;
    		
    		default:
    			# code...
    			break;
    	}
    	$datas = _dapros_statistics::whereRaw($qWhere)
               ->orderBy('call_consume_datetime', 'desc')
               ->paginate(10);
    	//return response()->json($datas, 200);
       	return view('agent.consume')->with('datas',$datas);
    }

    /**
     * Mencari data
     */
    public function getData()
    {
    	#mencari data yang available
    	$data = _dapros::where('data_available','available')
						    ->inRandomOrder()
						    ->first();

    	$data->data_available = "in use";
    	$updateResult = $data->save();
    	# Memastikan bahwa save berhasil memperbaharui data
    	if (! $updateResult) {
    		abort(500, 'Error while updating status data.');
    	}

    	# Memasukan data ke statistik
    	$saveResult = _dapros_statistics::updateOrCreate(
        	['dapros_id' => $data->id],
        	[
        		'call_status_id' => 0
				, 'call_status_detail_id' => 0
				, 'call_status_detail_reason_id' => 0
				, 'call_information' => ''
				, 'call_agent_username' => auth()->user()->username
				, 'call_consume_datetime' => now()
        	]
        );
    	# Memastikan data yang disave masuk atau ga
		if (! _dapros_statistics::findOrFail($saveResult->id)) {
        	abort(500, 'Error while inserting data to statistics.');
        }
    	
		// Return hasilnya
    	return response()->json($data);
    }
    /**
     * Chained Select 
     */
    public function chain_status_call()
    {
    	$data = _call_status::select('id','value_call_status')->get();
        return response()->json($data);
    }
    public function chain_status_detail_call(Request $request)
    {
    	$input = $request->input('id');
    	$data = _call_status::find($input)->status_details;
        return response()->json($data);
    }
    public function chain_status_detail_reason_call(Request $request)
    {
    	$input = $request->input('id');
    	$data = _call_status_detail::find($input)->status_detail_reasons;
        return response()->json($data);
    }
    /**
     * Save Data dari inputan ke Tabel Dapros_statitisctic 
     */
    public function saveDataCall(Request $request)
    {
    	# Error messages validation
    	$messages = [
	        'dapros_id.required' => "You haven't fetch data yet.",
	        'status_call.required'  => 'A status call is required',
	        'status_detail.required'  => 'A status detail is required',
	        'status_detail_reason.required'  => 'A status detailreason is required',
	        'information.required'  => 'An information is required',
	        'am_date.required_if'  => 'A Appointment Management Date is required if detail status call is Agree',
	        'am_time.required_if'  => 'A Appointment Management Time is required if detail status call is Agree',
	        'fu_date.required_if'  => 'A Follow Up Date is required if detail status call is Follow Up',
	        'fu_time.required_if'  => 'A Follow Up Time is required if detail status call is Follow Up'
	    ];
	    # Rules Validation
    	$validation = $this->validate($request, [
            'dapros_id' => 'required',
            'status_call' => 'required',
            'status_detail' => 'required',
            'status_detail_reason' => 'required',
            'information' => 'required',
            'am_date' => 'required_if:status_detail,1|nullable',
            'am_time' => 'required_if:status_detail,1|nullable',
            'fu_date' => 'required_if:status_detail,2|nullable',
            'fu_time' => 'required_if:status_detail,2|nullable'
        ], $messages);

    	# Post ke tabel Call
    	$call = new _call;
    	$call->dapros_id = $request->input('dapros_id');
    	$call->call_status_id = $request->input('status_call');
    	$call->call_status_detail_id = $request->input('status_detail');
    	$call->call_status_detail_reason_id = $request->input('status_detail_reason');
    	$call->call_information = $request->input('information');
    	if ( $request->input('status_detail') == 1 ) {
    		$call->call_am_datetime = $request->input('am_date')." ".$request->input('am_time');
    	}
    	else{
    		$call->call_am_datetime = null;
    	}
    	if ( $request->input('status_detail') == 2 ) {
    		$call->call_fu_datetime =  $request->input('fu_date')." ".$request->input('fu_time');
    	}
    	else{
    		$call->call_fu_datetime =  null;
    	}
    	$call->call_agent_username = auth()->user()->username;
    	$boolSaveCall = $call->save();

    	# Memastikan bahwa save ke tabel Call berhasil
    	if (! $boolSaveCall) {
    		abort(500, 'Error while saving call information');
    	}
    	# Post ke Dapros_statistics dg status INSERT INTO ... ON DUPLICATE KEY UPDATE ...
        $statistics_dapros = _dapros_statistics::updateOrCreate(
        	['dapros_id' => $request->input('dapros_id')],
        	[
        		'call_status_id' => $call->call_status_id
				, 'call_status_detail_id' => $call->call_status_detail_id
				, 'call_status_detail_reason_id' => $call->call_status_detail_reason_id
				, 'call_am_datetime' => $call->call_am_datetime
				, 'call_fu_datetime' => $call->call_fu_datetime
				, 'call_information' => $call->call_information
				, 'call_agent_username' => $call->call_agent_username
				, 'call_consume_datetime' => $call->created_at
				, 'call_attempts' => DB::raw('call_attempts+1')
        	]
        )->first();
        #memastikan bahwa save ke tabel Dapros Statistics berhasil
        if (! _dapros_statistics::findOrFail($statistics_dapros->id)) {
        	abort(500, 'Error while saving statistics information');
        }

        # Melakukan cek bila Attempt nya lebih dari sama dengan 9
        $call_attempts = $statistics_dapros->call_attempts;
        if ( $call_attempts >= 9 ) {
        	$data = _dapros::where('id',$statistics_dapros->dapros_id)
						    ->first();

	    	$data->data_available = "junk";
	    	$updateResult = $data->save();
	    	# Memastikan pembaharuan data menjadi junk berhasil
	    	if (! $updateResult) {
	    		abort(500, 'Error while sending data to junk.');
	    	}
        }
        // Return hasilnya
    	return response()->json(['success' => "success"], 200);
    }

    # Function buat Counting Activity Agent
    public function countActivityAgent()
    {
    	$data = _dapros_statistics::select(
			DB::raw("IFNULL(SUM(CASE WHEN `call_status_id` > 0 THEN 1 ELSE 0 END), 0) AS `consumed`"),
			DB::raw("IFNULL(SUM(CASE WHEN `call_status_detail_id` = 1 THEN 1 ELSE 0 END), 0)  AS `agree`"),
			DB::raw("IFNULL(SUM(CASE WHEN `call_status_detail_id` = 2 THEN 1 ELSE 0 END), 0)  AS `fu`"),
			DB::raw("IFNULL(SUM(CASE WHEN `call_status_detail_id` = 3 THEN 1 ELSE 0 END), 0)  AS `decline`"),
			DB::raw("IFNULL(SUM(CASE WHEN `call_status_id` = 2 THEN 1 ELSE 0 END), 0)  AS `nc`"),
			DB::raw("IFNULL(SUM(CASE WHEN `tapping_status_id` = 1 THEN 1 ELSE 0 END), 0)  AS `approved`"),
			DB::raw("IFNULL(SUM(CASE WHEN `tapping_status_id` = 2 THEN 1 ELSE 0 END), 0)  AS `return`"),

			DB::raw("IFNULL(SUM(CASE WHEN `call_status_id` > 0 AND DATE(`call_consume_datetime`) = CURDATE() THEN 1 ELSE 0 END), 0) AS `consumed_daily`"),
			DB::raw("IFNULL(SUM(CASE WHEN `call_status_detail_id` = 1 AND DATE(`call_consume_datetime`) = CURDATE() THEN 1 ELSE 0 END), 0)  AS `agree_daily`"),
			DB::raw("IFNULL(SUM(CASE WHEN `call_status_detail_id` = 2 THEN 1 ELSE 0 END), 0)  AS `fu_daily`"),
			DB::raw("IFNULL(SUM(CASE WHEN `call_status_detail_id` = 3 AND DATE(`call_consume_datetime`) = CURDATE() THEN 1 ELSE 0 END), 0)  AS `decline_daily`"),
			DB::raw("IFNULL(SUM(CASE WHEN `call_status_id` = 2 AND DATE(`call_consume_datetime`) = CURDATE() THEN 1 ELSE 0 END), 0)  AS `nc_daily`"),
			DB::raw("IFNULL(SUM(CASE WHEN `tapping_status_id` = 1 AND DATE(`call_consume_datetime`) = CURDATE() THEN 1 ELSE 0 END), 0)  AS `approved_daily`"),
			DB::raw("IFNULL(SUM(CASE WHEN `tapping_status_id` = 2 AND DATE(`call_consume_datetime`) = CURDATE() THEN 1 ELSE 0 END), 0)  AS `return_daily`")
    		)->where('call_agent_username', auth()->user()->username)->first();
    	return response()->json($data, 200);
    }
}
