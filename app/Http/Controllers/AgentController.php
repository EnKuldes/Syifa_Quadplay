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
        return view('agent.index');
    }

    /**
     * Mencari data
     */
    public function getData()
    {
    	$data = _dapros::all()->random(1);
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
            'am_date' => 'required_if:status_detail,1',
            'am_time' => 'required_if:status_detail,1',
            'fu_date' => 'required_if:status_detail,2',
            'fu_time' => 'required_if:status_detail,2'
        ], $messages);

    	# Post ke tabel Call
    	$call = new _call;
    	$call->dapros_id = $request->input('dapros_id');
    	$call->call_status_id = $request->input('status_call');
    	$call->call_status_detail_id = $request->input('status_detail');
    	$call->call_status_detail_reason_id = $request->input('status_detail_reason');
    	$call->call_information = $request->input('information');
    	if (! $request->input('am_date') ) {
    		$call->call_am_datetime = null;
    	}
    	else{
    		$call->call_am_datetime = $request->input('am_date')." ".$request->input('am_time');
    	}
    	if (! $request->input('am_date') ) {
    		$call->call_fu_datetime =  null;
    	}
    	else{
    		$call->call_fu_datetime =  $request->input('fu_date')." ".$request->input('fu_time');
    	}
    	$call->call_agent_username = auth()->user()->username;
    	$call->save();

    	# Post ke Dapros_statistics dg status INSERT INTO ... ON DUPLICATE KEY UPDATE ...
        _dapros_statistics::updateOrCreate(
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
        );//

        // Return hasilnya
    	return $last_call;
    }
}
