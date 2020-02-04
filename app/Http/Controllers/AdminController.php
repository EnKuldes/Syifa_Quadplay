<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; // Untuk gunain Query 
use App\_dapros;
use App\_dapros_statistics;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('Admin');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $datas['dev_message'] = 'Masih dalam tahap development, bila ada kekurangan bisa kami minta feedbacknya.';
        return view('admin.index')->with('datas',$datas);
    }

    /**
     * Show the application report data.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function report()
    {
        return view('admin.report');
    }

    // ** Mengembalikan Data Statistik Dapros dalam bentuk JSON
    public function get_dapros_data(Request $request)
    {
        /*$results = _dapros_statistics::all();//whereDate('created_at', DB::raw('CURDATE()'))->get();//all();
        $datas = collect([]);
        $idx = 1;
        foreach ($results as $result) {
            //echo $result->dapros;
            $tapping_status = ($result->tapping_status_id != null ? $result->tapping_status->value_tapping_status : null);
            $tapping_agent_name = ($result->tapping_agent_username != null ? $result->tapping_agent->name : null);
            $datas->push([
                "idx" => $idx
                , "dapros_id" => $result->dapros_id
                , "brand" => $result->dapros->BRAND
                , "row_number" => $result->dapros->ROW_NUM
                , 'msisdn_mask' => $result->dapros->MSISDN_MASK
                , 'msisdn' => $result->dapros->MSISDN
                , 'name_mask' => $result->dapros->NAME_MASK
                , 'customer_subtype' => $result->dapros->CUSTOMER_SUBTYPE
                , 'kabupaten' => $result->dapros->KABUPATEN
                , 'odp1' => $result->dapros->ODP1
                , 'odp2' => $result->dapros->ODP2
                , 'odp3' => $result->dapros->ODP3
                , 'call_status' => $result->call_status->value_call_status
                , 'call_status_detail' => $result->call_status_detail->value_call_status_detail
                , 'call_status_detail_reason' => $result->call_status_detail_reason->value_call_status_detail_reason
                , 'am_datetime' => $result->call_am_datetime
                , 'fu_datetime' => $result->call_fu_datetime
                , 'call_information' => $result->call_information
                , 'call_attempts' => $result->call_attempts
                , 'call_agent' => $result->call_agent_username
                , 'call_agent_name' => $result->call_agent->name
                , 'call_consume' => $result->call_consume_datetime
                , 'tapping_status' => $tapping_status
                , 'tapping_information' => $result->tapping_information
                , 'tapping_agent_username' => $result->tapping_agent_username
                , 'tapping_agent_name' => $tapping_agent_name
                , 'tapping_consume' => $result->tapping_consume_datetime
            ]);
            $idx++;
        }*/

        $datas = DB::table('_dapros_statistics as ds')
        ->join('_dapros as da', 'ds.dapros_id', '=', 'da.id')
        ->leftJoin('_call_statuses as cs', 'ds.call_status_id', '=', 'cs.id')
        ->leftJoin('_call_status_details as sd', 'ds.call_status_detail_id', '=', 'sd.id')
        ->leftJoin('_call_status_detail_reasons as dr', 'ds.call_status_detail_reason_id', '=', 'dr.id')
        ->leftJoin('users as ua', 'ds.call_agent_username', '=', 'ua.username')
        ->leftJoin('_tapping_statuses as ts', 'ds.tapping_status_id', '=', 'ts.id')
        ->leftJoin('users as uq', 'ds.tapping_agent_username', '=', 'uq.username')
        ->select('da.BRAND as brand' , 'da.ROW_NUM as row_number' , 'da.MSISDN_MASK as msisdn_mask' , 'da.MSISDN as msisdn' , 'da.NAME_MASK as name_mask' , 'da.CUSTOMER_SUBTYPE as customer_subtype' , 'da.KABUPATEN as kabupaten' , 'da.ODP1 as odp1' , 'da.ODP2 as odp2' , 'da.ODP3 as odp3' , 'ds.call_am_datetime as am_datetime' , 'ds.call_fu_datetime as fu_datetime' , 'ds.call_information as call_information' , 'ds.call_attempts as call_attempts' , 'ds.call_agent_username as call_agent' , 'ds.call_consume_datetime as call_consume' , 'ds.tapping_information as tapping_information' , 'ds.tapping_agent_username as tapping_agent_username' , 'ds.tapping_consume_datetime as tapping_consume' , 'cs.value_call_status as call_status' , 'sd.value_call_status_detail as call_status_detail' , 'dr.value_call_status_detail_reason as call_status_detail_reason' , 'ua.name as call_agent_name' , 'ts.value_tapping_status as tapping_status' , 'uq.name as tapping_agent_name')
        ->whereDate('ds.created_at', DB::raw('CURDATE()'));

        return datatables()->of($datas)->toJson();
        
    }
}
