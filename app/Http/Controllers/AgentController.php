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
use App\_regional;
use App\_witel;
use App\_paket;
// Untuk menangkap error ketika FirstorFail error
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
        $this->middleware('Agent', ['except' => ['chain_status_call', 'chain_status_detail_call', 'chain_status_detail_reason_call']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    	$counting = $this->countingActivity();
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
    		case 'all': // Semua yang di consume
    			$qWhere = "`call_status_id` > 0";
    			break;
    		case 'agree':
    			$qWhere = "`call_status_detail_id` = 1 AND data_condition != 'returned to agent'";
    			break;
    		case 'follow_up':
    			$qWhere = "`call_status_detail_id` = 2 AND data_condition != 'returned to agent'";
    			break;
    		case 'decline':
    			$qWhere = "`call_status_detail_id` = 3 AND data_condition != 'returned to agent'";
    			break;
    		case 'not_contacted':
    			$qWhere = "`call_status_id` = 2 AND data_condition != 'returned to agent'";
    			break;
            case 'contacted':
                $qWhere = "`call_status_id` = 1 AND data_condition != 'returned to agent'";
                break;
    		case 'return':
                $qWhere = "`tapping_status_id` = 2 AND data_condition = 'returned to agent'";
                break;
            case 'approved':
                $qWhere = "`tapping_status_id` = 1";
                break;
            case 'returntoagree':
                $qWhere = "`call_status_detail_id` = 1 AND `ever_be_returned` = 'yes' AND data_condition = 'returned to qco'";
                break;
            case 'returntodecline':
                $qWhere = "`call_status_detail_id` = 3 AND `ever_be_returned` = 'yes' AND data_condition = 'returned to qco'";
                break;
            
    		default:
    			# code...
    			break;
    	}
    	$datas = _dapros_statistics::whereRaw($qWhere)
               ->where('call_agent_username', auth()->user()->username)
               ->orderBy('call_consume_datetime', 'desc')
               ->orderBy('updated_at', 'desc')
               ->paginate(5);
    	//return response()->json($datas, 200);
       	return view('agent.consume')->with('datas',$datas);
    }
    public function unconsume()
    {
        $qWhere = "`call_status_id` = 0"; // Semua yang udah pernag ke get oleh agent namun belum pernah di lakukan interaksi
        $datas = _dapros_statistics::whereRaw($qWhere)
               ->where('call_agent_username', auth()->user()->username)
               ->orderBy('call_consume_datetime', 'desc')
               ->orderBy('updated_at', 'desc')
               ->paginate(5);
        //return response()->json($datas, 200);
        return view('agent.unconsume')->with('datas',$datas);
    }

    /**
     * Workspace dengan value dari parameter.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function recall($id)
    {
    	$counting = $this->countingActivity();

    	$dataToRecall = _dapros_statistics::where([
				    		['id', $id]/*,
				    		['call_attempts', '<', 9],
				    		['call_status_detail_id', '!=', 1],
				    		['call_status_detail_id', '!=', 3]*/
				    	])
                        //->orWhere('data_condition', '=', 'returned to agent')
                        ->whereRaw("(call_attempts < 9 AND call_status_detail_id != 3 AND call_status_detail_id != 1 OR data_condition = 'returned to agent')")
                        ->firstOrFail();
        $counting['details_dapros'] = _dapros::where('id', $dataToRecall->dapros_id)->firstOrFail();
        # Apakah data pernah di return atau data return?
        if ($dataToRecall->tapping_status_id == 2) {
            $counting['data_is_return'] = true;
        }

        return view('agent.index')->with('counting',$counting);
    }

    /**
     * Mencari data
     */
    public function getData()
    {
    	#mencari data yang available
        try {
    		// Check if agent have unsonsume data first
        	$have_unconsume = _dapros_statistics::where([
				['call_status_id', 0]
				, ['call_agent_username', auth()->user()->username]
			])->first();
			if ($have_unconsume) {
				$data['message'] = 'You still have an uncosume data.';
	            $data['alert-title'] = 'Error';
	            $data['alert-class'] = 'warning';
	            return response()->json($data);
			}
			
        	$data = _dapros::where('data_available','available')
                                ->inRandomOrder()
                                ->firstOrFail();
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

        } catch (ModelNotFoundException $e) {
            $data['message'] = 'Data empty.';
            $data['alert-title'] = 'Error';
            $data['alert-class'] = 'warning';
            return response()->json($data);
        }
    }
    /**
     * Chained Select 
     */
    public function chain_status_call()
    {
    	//$data = _call_status::select('id','value_call_status')->get();
        $data = _call_status::select('id','value_call_status')->where('is_enabled', '=', '1')->get();
        return response()->json($data);
    }
    public function chain_status_detail_call(Request $request)
    {
    	$input = $request->input('id');
    	//$data = _call_status::find($input)->status_details;
        $data = _call_status_detail::select('id','value_call_status_detail')->where([ ['is_enabled', '=', '1'], ['id_call_status', '=', $input] ])->get();
        return response()->json($data);
    }
    public function chain_status_detail_reason_call(Request $request)
    {
    	$input = $request->input('id');
    	//$data = _call_status_detail::find($input)->status_detail_reasons;
        $data = _call_status_detail_reason::select('id','value_call_status_detail_reason')->where([ ['is_enabled', '=', '1'], ['id_call_status_detail', '=', $input] ])->get();
        return response()->json($data);
    }
    public function chain_regional()
    {
        //$data = _call_status::select('id','value_call_status')->get();
        $data = _regional::select('id','regional_desc')->where('is_enabled', '=', '1')->get();
        return response()->json($data);
    }
    public function chain_witel(Request $request)
    {
        $input = $request->input('id');
        //$data = _call_status::find($input)->status_details;
        $data = _witel::select('id','witel_desc')->where([ ['is_enabled', '=', '1'], ['id_regional', '=', $input] ])->get();
        return response()->json($data);
    }
    public function chain_paket(Request $request)
    {
        $input = $request->input('skill');
        //$data = _call_status::find($input)->status_details;
        $data = _paket::select('id','paket_desc')->where([ ['is_enabled', '=', '1'], ['skill', '=', $input] ])->get();
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
	        'fu_time.required_if'  => 'A Follow Up Time is required if detail status call is Follow Up',

            'input_k_kontak.required_if'  => 'K-Kontak is required if detail status call is Agree',
            'input_cp_marshanda.required_if'  => 'CP Marshanda is required if detail status call is Agree',
            'input_an_pemasangan.required_if'  => 'AN Pemasangan is required if detail status call is Agree',
            'regional.required_if'  => 'Regional is required if detail status call is Agree',
            'witel.required_if'  => 'Witel is required if detail status call is Agree',
            'paket.required_if'  => 'Paket is required if detail status call is Agree',
            'input_alamat_pemasangan.required_if'  => 'Alamat Pemasangan is required if detail status call is Agree',
            'input_email.required_if'  => 'Email is required if detail status call is Agree',
            'via_by.required_if'  => 'Via by is required if detail status call is Agree'
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
            'fu_time' => 'required_if:status_detail,2|nullable',
            
            'input_k_kontak' => 'required_if:status_detail,1|nullable',
            'input_cp_marshanda' => 'required_if:status_detail,1|nullable|regex:/(0)[0-9]/',
            'input_an_pemasangan' => 'required_if:status_detail,1|nullable',
            'regional' => 'required_if:status_detail,1|nullable',
            'witel' => 'required_if:status_detail,1|nullable',
            'paket' => 'required_if:status_detail,1|nullable',
            'input_alamat_pemasangan' => 'required_if:status_detail,1|nullable',
            'input_email' => 'required_if:status_detail,1|nullable|email',
            'via_by' => 'required_if:status_detail,1|nullable'
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
        // Input Agent
        $call->call_input_k_kontak = $request->input('input_k_kontak');
        $call->call_input_cp_marshanda = $request->input('input_cp_marshanda');
        $call->call_input_an_pemasangan = $request->input('input_an_pemasangan');
        $call->call_regional = $request->input('regional');
        $call->call_witel = $request->input('witel');
        $call->call_paket = $request->input('paket');
        $call->call_alamat_pemasangan = $request->input('input_alamat_pemasangan');
        $call->call_email = $request->input('input_email');
        $call->call_via_by = $request->input('via_by');

    	$call->call_agent_username = auth()->user()->username;
    	$boolSaveCall = $call->save();

    	# Memastikan bahwa save ke tabel Call berhasil
    	if (! $boolSaveCall) {
    		abort(500, 'Error while saving call information');
    	}
        #Bila data return jangan di tambah attempts nya
        if (null !== $request->input('data_is_return') AND $request->input('data_is_return') == 1) {
            if ( $request->input('status_detail') == 1 OR  $request->input('status_detail') == 3 ) {
                $value_data_condition = 'returned to qco';
            }
            else{
                $value_data_condition = 'returned to agent';
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
                    //, 'call_attempts' => DB::raw('call_attempts+1')

                    // Input Agent
                    ,'call_input_k_kontak' => $call->call_input_k_kontak
                    ,'call_input_cp_marshanda' => $call->call_input_cp_marshanda
                    ,'call_input_an_pemasangan' => $call->call_input_an_pemasangan
                    ,'call_regional' => $call->call_regional
                    ,'call_witel' => $call->call_witel
                    ,'call_paket' => $call->call_paket
                    ,'call_alamat_pemasangan' => $call->call_alamat_pemasangan
                    ,'call_email' => $call->call_email
                    ,'call_via_by' => $call->call_via_by

                    , 'data_condition' => $value_data_condition
                ]
            )->first();
        }
        else{
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

                    // Input Agent
                    ,'call_input_k_kontak' => $call->call_input_k_kontak
                    ,'call_input_cp_marshanda' => $call->call_input_cp_marshanda
                    ,'call_input_an_pemasangan' => $call->call_input_an_pemasangan
                    ,'call_regional' => $call->call_regional
                    ,'call_witel' => $call->call_witel
                    ,'call_paket' => $call->call_paket
                    ,'call_alamat_pemasangan' => $call->call_alamat_pemasangan
                    ,'call_email' => $call->call_email
                    ,'call_via_by' => $call->call_via_by

                    , 'call_agent_username' => $call->call_agent_username
                    , 'call_consume_datetime' => $call->created_at
                    , 'call_attempts' => DB::raw('call_attempts+1')
                ]
            )->first();
        }
        	
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
    	$data = $this->countingActivity();
    	return response()->json($data, 200);
    }

    # Func to count QCO activty
    protected function countingActivity()
    {
        $data = _dapros_statistics::select(
            DB::raw("IFNULL(SUM(CASE WHEN `call_status_id` = 0 AND DATE(`call_consume_datetime`) = CURDATE() THEN 1 ELSE 0 END), 0) AS `unconsumed_daily`"),
            DB::raw("IFNULL(SUM(CASE WHEN `call_status_id` > 0 AND DATE(`call_consume_datetime`) = CURDATE() THEN 1 ELSE 0 END), 0) AS `consumed_daily`"),
            DB::raw("IFNULL(SUM(CASE WHEN `call_status_id` = 1 AND DATE(`call_consume_datetime`) = CURDATE() AND data_condition != 'returned to agent' THEN 1 ELSE 0 END), 0)  AS `c_daily`"),
            DB::raw("IFNULL(SUM(CASE WHEN `call_status_detail_id` = 1 AND DATE(`call_consume_datetime`) = CURDATE() AND data_condition != 'returned to agent' THEN 1 ELSE 0 END), 0)  AS `agree_daily`"),
            DB::raw("IFNULL(SUM(CASE WHEN `call_status_detail_id` = 2 AND data_condition != 'returned to agent'  THEN 1 ELSE 0 END), 0)  AS `fu_daily`"),
            DB::raw("IFNULL(SUM(CASE WHEN `call_status_detail_id` = 3 AND DATE(`call_consume_datetime`) = CURDATE() AND data_condition != 'returned to agent' THEN 1 ELSE 0 END), 0)  AS `decline_daily`"),
            DB::raw("IFNULL(SUM(CASE WHEN `call_status_id` = 2 AND DATE(`call_consume_datetime`) = CURDATE() AND data_condition != 'returned to agent'  THEN 1 ELSE 0 END), 0)  AS `nc_daily`"),
            DB::raw("IFNULL(SUM(CASE WHEN `tapping_status_id` = 1 AND DATE(`call_consume_datetime`) = CURDATE() THEN 1 ELSE 0 END), 0)  AS `approved_daily`"),
            DB::raw("IFNULL(SUM(CASE WHEN `tapping_status_id` = 2 AND data_condition = 'returned to agent' AND DATE(`call_consume_datetime`) = CURDATE() THEN 1 ELSE 0 END), 0)  AS `return_daily`"),
            DB::raw("IFNULL(SUM(CASE WHEN `call_status_detail_id` = 1 AND `ever_be_returned` = 'yes' AND data_condition = 'returned to qco' AND DATE(`call_consume_datetime`) = CURDATE() THEN 1 ELSE 0 END), 0)  AS `returntoagree_daily`"), // Belum kebikin countingnya
            DB::raw("IFNULL(SUM(CASE WHEN `call_status_detail_id` = 3 AND `ever_be_returned` = 'yes' AND data_condition = 'returned to qco' AND DATE(`call_consume_datetime`) = CURDATE() THEN 1 ELSE 0 END), 0)  AS `returntodecline_daily`") // Belum kebikin countingnya
            )->where([
                ['call_agent_username', auth()->user()->username]
            ])->whereRaw('DATE(call_consume_datetime) >= curdate()')->first();
        return $data;
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
    		'consume_tapping' => $data->tapping_consume_datetime,

            'k_kontak' => $data->call_input_k_kontak ,
            'cp_marshanda' => $data->call_input_cp_marshanda ,
            'an_pemasangan' => $data->call_input_an_pemasangan ,
            'regional' => ($data->call_regional != null ? $data->regional->regional_desc : null) ,
            'witel' => ($data->call_witel != null ? $data->witel->witel_desc : null) ,
            'paket' => ($data->call_paket != null ? $data->paket->paket_desc : null) ,
            'alamat_pemasangan' => $data->call_alamat_pemasangan ,
            'email' => $data->call_email ,
            'via_by' => $data->call_via_by
		];
		$datas = [
			'details_dapros' => $details_dapros,
			'details_call' => $details_call
		];
    	return response()->json($datas, 200);

    }
}
