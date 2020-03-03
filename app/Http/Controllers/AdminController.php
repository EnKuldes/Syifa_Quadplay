<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; // Untuk gunain Query 
use App\_dapros;
use App\_dapros_statistics;
use App\_call;
use App\_tapping;

// Laravel Excel
use App\Exports\DaprosExport;
use App\Imports\UsersImport;
use App\Imports\DaprosImport;
use Maatwebsite\Excel\Facades\Excel;
//use App\Http\Controllers\Controller;

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

    public function console_users()
    {
        $datas['dev_message'] = 'Masih dalam tahap development, bila ada kekurangan bisa kami minta feedbacknya. Page Console Users';
        return view('admin.console_users')->with('datas',$datas);
    }

    public function console_resources()
    {
        //$datas['dev_message'] = 'Masih dalam tahap development, bila ada kekurangan bisa kami minta feedbacknya. Page Console Resources';
        $datas = null;
        return view('admin.console_resources')->with('datas',$datas);
    }

    public function console_data_consume($id)
    {
        $datas['dev_message'] = 'Masih dalam tahap development, bila ada kekurangan bisa kami minta feedbacknya. Page Console Data';
        $dapros_stastics = _dapros_statistics::where('id', $id)->firstOrFail();
        $dapros_information = _dapros::where('id', $dapros_stastics->dapros_id)->firstOrFail();
        $datas['dapros_stastics'] = $dapros_stastics;
        $datas['dapros_information'] = $dapros_information;

        return view('admin.console_data')->with('datas',$datas);
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

    // ** Mengembalikan Data Statistik Dapros dalam bentuk JSON untuk Datatables
    public function get_dapros_data(Request $request)
    {
        $datas = DB::table('_dapros_statistics as ds')
        ->join('_dapros as da', 'ds.dapros_id', '=', 'da.id')
        ->leftJoin('_call_statuses as cs', 'ds.call_status_id', '=', 'cs.id')
        ->leftJoin('_call_status_details as sd', 'ds.call_status_detail_id', '=', 'sd.id')
        ->leftJoin('_call_status_detail_reasons as dr', 'ds.call_status_detail_reason_id', '=', 'dr.id')
        ->leftJoin('users as ua', 'ds.call_agent_username', '=', 'ua.username')
        ->leftJoin('_tapping_statuses as ts', 'ds.tapping_status_id', '=', 'ts.id')
        ->leftJoin('users as uq', 'ds.tapping_agent_username', '=', 'uq.username')
        ->select('ds.id as id' , 'da.BRAND as brand' , 'da.ROW_NUM as row_number' , 'da.MSISDN_MASK as msisdn_mask' , 'da.MSISDN as msisdn' , 'da.NAME_MASK as name_mask' , 'da.CUSTOMER_SUBTYPE as customer_subtype' , 'da.KABUPATEN as kabupaten' , 'da.ODP1 as odp1' , 'da.ODP2 as odp2' , 'da.ODP3 as odp3' , 'ds.call_am_datetime as am_datetime' , 'ds.call_fu_datetime as fu_datetime' , 'ds.call_information as call_information' , 'ds.call_attempts as call_attempts' , 'ds.call_agent_username as call_agent' , 'ds.call_consume_datetime as call_consume' , 'ds.tapping_information as tapping_information' , 'ds.tapping_agent_username as tapping_agent_username' , 'ds.tapping_consume_datetime as tapping_consume' , 'cs.value_call_status as call_status' , 'sd.value_call_status_detail as call_status_detail' , 'dr.value_call_status_detail_reason as call_status_detail_reason' , 'ua.name as call_agent_name' , 'ts.value_tapping_status as tapping_status' , 'uq.name as tapping_agent_name');
        if(request()->ajax()){
            if(!empty($request->from_date)){
                $datas->whereBetween('ds.created_at', array($request->from_date, $request->to_date));
            }
            else{
                $datas->whereDate('ds.created_at', DB::raw('CURDATE()'));
            }
        }
        $datas = $datas->get();
        $datas->map(function ($datas, $i) {
            $datas->action = '<button type="button" class="btn btn-default " onclick="modifyDataConsume('.$datas->id.')"><i class="fa fa-wrench"></i> </button>';
            $datas->i = ++$i;
            //$datas->action = null;
            return $datas;
        });
        return datatables()->of($datas)->toJson();
        
    }

    // ** Download Report
    public function download_report(Request $request)
    {
        return (new DaprosExport($request->from_date, $request->to_date))->download('report.xlsx', \Maatwebsite\Excel\Excel::XLSX);

    }

    // List All Resources, Users dan Data ke Datatables
    public function get_status_call_list($value='')
    {
        $datas = DB::table('_call_statuses')
        ->select('id', 'value_call_status', 'is_enabled')->get();
        $datas->map(function ($datas, $i) {
            $datas->status = $datas->is_enabled == 1 ? 'Enable' : 'Disable';
            $datas->action = '<button type="button" class="btn btn-default " onclick="modifyCallStatus('.$datas->id.')"><i class="fa fa-wrench"></i> </button>';
            $datas->i = ++$i;
            return $datas;
        });
        return datatables()->of($datas)->toJson();
    }
    public function get_detail_call_list($value='')
    {
        $datas = DB::table('_call_status_details')
        ->leftJoin('_call_statuses', '_call_statuses.id', '=', '_call_status_details.id_call_status')
        ->select('_call_status_details.id', '_call_statuses.value_call_status', '_call_status_details.value_call_status_detail', '_call_status_details.is_enabled')->get();
        $datas->map(function ($datas, $i) {
            $datas->status = $datas->is_enabled == 1 ? 'Enable' : 'Disable';
            $datas->action = '<button type="button" class="btn btn-default " onclick="modifyDetailCall('.$datas->id.')"><i class="fa fa-wrench"></i> </button>';
            $datas->i = ++$i;
            return $datas;
        });
        return datatables()->of($datas)->toJson();
    }
    public function get_detail_reason_list($value='')
    {
        $datas = DB::table('_call_status_detail_reasons')
        ->leftJoin('_call_status_details', '_call_status_details.id', '=', '_call_status_detail_reasons.id_call_status_detail')
        ->select('_call_status_detail_reasons.id', '_call_status_detail_reasons.value_call_status_detail_reason', '_call_status_details.value_call_status_detail', '_call_status_detail_reasons.is_enabled')->get();
        $datas->map(function ($datas, $i) {
            $datas->status = $datas->is_enabled == 1 ? 'Enable' : 'Disable';
            $datas->action = '<button type="button" class="btn btn-default " onclick="modifyReasonDetail('.$datas->id.')"><i class="fa fa-wrench"></i> </button>';
            $datas->i = ++$i;
            return $datas;
        });
        return datatables()->of($datas)->toJson();
    }
    public function get_status_tapping_list($value='')
    {
        $datas = DB::table('_tapping_statuses')
        ->select('id', 'value_tapping_status', 'is_enabled')->get();
        $datas->map(function ($datas, $i) {
            $datas->status = $datas->is_enabled == 1 ? 'Enable' : 'Disable';
            $datas->action = '<button type="button" class="btn btn-default " onclick="modifyTappingStatus('.$datas->id.')"><i class="fa fa-wrench"></i> </button>';
            $datas->i = ++$i;
            return $datas;
        });
        return datatables()->of($datas)->toJson();
    }
    public function get_users_list(Request $request)
    {
        $datas = DB::table('users')
        ->select('id', 'name', 'username', 'level', 'leader', 'is_enabled', 'updated_at')
        ->where('level', '!=', 'Admin');
        if ( request()->ajax() ) {
            if (!empty($request->id)) {
                $datas->where('id', '=', $request->id);
            }
        }
        $datas = $datas->get();
        $datas->map(function ($datas, $i) {
            $datas->status = $datas->is_enabled == 1 ? 'Enable' : 'Disable';
            $datas->action = '<button type="button" class="btn btn-default " onclick="modifyUser('.$datas->id.')"><i class="fa fa-wrench"></i> </button>';
            $datas->i = ++$i;
            return $datas;
        });
        if ( request()->ajax() ) {
            if (!empty($request->id)) {
                return response()->json($datas);
            }
        }
        return datatables()->of($datas)->toJson();
    }
    public function get_witel_list($value='')
    {
        $datas = DB::table('_witels')
        ->leftJoin('_regionals', '_regionals.id', '=', '_witels.id_regional')
        ->select('_witels.id', '_witels.witel_desc', '_regionals.regional_desc', '_witels.is_enabled')->get();
        $datas->map(function ($datas, $i) {
            $datas->status = $datas->is_enabled == 1 ? 'Enable' : 'Disable';
            $datas->action = '<button type="button" class="btn btn-default " onclick="modifyWitel('.$datas->id.')"><i class="fa fa-wrench"></i> </button>';
            $datas->i = ++$i;
            return $datas;
        });
        return datatables()->of($datas)->toJson();
    }
    public function get_skill_list($value='')
    {
        $datas = DB::table('_skills')
        ->select('id', 'skill_desc', 'is_enabled')->get();
        $datas->map(function ($datas, $i) {
            $datas->status = $datas->is_enabled == 1 ? 'Enable' : 'Disable';
            $datas->action = '<button type="button" class="btn btn-default " onclick="modifySkill('.$datas->id.')"><i class="fa fa-wrench"></i> </button>';
            $datas->i = ++$i;
            return $datas;
        });
        return datatables()->of($datas)->toJson();
    }
    public function get_paket_list($value='')
    {
        $datas = DB::table('_pakets')
        ->select('id', 'paket_desc', 'skill', 'is_enabled')->get();
        $datas->map(function ($datas, $i) {
            $datas->status = $datas->is_enabled == 1 ? 'Enable' : 'Disable';
            $datas->action = '<button type="button" class="btn btn-default " onclick="modifyPaket('.$datas->id.')"><i class="fa fa-wrench"></i> </button>';
            $datas->i = ++$i;
            return $datas;
        });
        return datatables()->of($datas)->toJson();
    }
    // List All Option dari semua Resources ke JSON untuk Select2
    public function list_all_options_status_call(Request $request)
    {
        $datas = DB::table('_call_statuses')->select('id', 'value_call_status');
        if ( request()->ajax() ) {
            if (!empty($request->id)) {
                $datas->addSelect('is_enabled')->where('id', '=', $request->id);
            }
            else{
                $datas->where('is_enabled', '=', '1');
            }
        }
        $datas = $datas->get();
        return response()->json($datas);
    }
    public function list_all_options_status_detail_call(Request $request)
    {
        $datas = DB::table('_call_status_details')->select('id', 'value_call_status_detail');
        if ( request()->ajax() ) {
            if (!empty($request->id)) {
                $datas->addSelect('is_enabled', 'id_call_status')->where('id', '=', $request->id);
            }
            else{
                $datas->where('is_enabled', '=', '1');
            }
        }
        $datas = $datas->get();
        return response()->json($datas);
    }
    public function list_all_options_status_detail_reason_call(Request $request)
    {
        $datas = DB::table('_call_status_detail_reasons')->select('id', 'value_call_status_detail_reason');
        if ( request()->ajax() ) {
            if (!empty($request->id)) {
                $datas->addSelect('is_enabled', 'id_call_status_detail')->where('id', '=', $request->id);
            }
            else{
                $datas->where('is_enabled', '=', '1');
            }
        }
        $datas = $datas->get();
        return response()->json($datas);
    }
    public function list_all_options_tapping_status(Request $request)
    {
        $datas = DB::table('_tapping_statuses')->select('id', 'value_tapping_status');
        if ( request()->ajax() ) {
            if (!empty($request->id)) {
                $datas->addSelect('is_enabled')->where('id', '=', $request->id);
            }
            else{
                $datas->where('is_enabled', '=', '1');
            }
        }
        $datas = $datas->get();
        return response()->json($datas);
    }
    public function list_all_options_regional(Request $request)
    {
        $datas = DB::table('_regionals')->select('id', 'regional_desc');
        if ( request()->ajax() ) {
            if (!empty($request->id)) {
                $datas->addSelect('is_enabled')->where('id', '=', $request->id);
            }
            else{
                $datas->where('is_enabled', '=', '1');
            }
        }
        $datas = $datas->get();
        return response()->json($datas);
    }
    public function list_all_options_witel(Request $request)
    {
        $datas = DB::table('_witels')->select('id', 'witel_desc');
        if ( request()->ajax() ) {
            if (!empty($request->id)) {
                $datas->addSelect('is_enabled', 'id_regional')->where('id', '=', $request->id);
            }
            else{
                $datas->where('is_enabled', '=', '1');
            }
        }
        $datas = $datas->get();
        return response()->json($datas);
    }
    public function list_all_options_skill(Request $request)
    {
        $datas = DB::table('_skills')->select('id', 'skill_desc');
        if ( request()->ajax() ) {
            if (!empty($request->id)) {
                $datas->addSelect('is_enabled')->where('id', '=', $request->id);
            }
            else{
                $datas->where('is_enabled', '=', '1');
            }
        }
        $datas = $datas->get();
        return response()->json($datas);
    }
    public function list_all_options_paket(Request $request)
    {
        $datas = DB::table('_pakets')->select('id', 'paket_desc');
        if ( request()->ajax() ) {
            if (!empty($request->id)) {
                $datas->addSelect('is_enabled', 'skill')->where('id', '=', $request->id);
            }
            else{
                $datas->where('is_enabled', '=', '1');
            }
        }
        $datas = $datas->get();
        return response()->json($datas);
    }

    // Save/Update Data yang di submit dari Form
    public function save_status_call(Request $request)
    {
        $model = DB::table('_call_statuses');
        /*if(request()->ajax()){
            if(!empty($request->id)){
                $model->updateOrInsert(
                    ['id' => $request->id],
                    ['value_call_status' => $request->input_call_status, 'is_enabled' => $request->input_status]
                );
            }
            else{
                $model->insert(
                    ['value_call_status' => $request->input_call_status, 'is_enabled' => $request->input_status]
                );
            }
        }*/
        $model->updateOrInsert(
            ['id' => $request->id],
            ['value_call_status' => $request->input_call_status, 'is_enabled' => $request->input_status]
        );
        if ($model) {
            return response()->json(true);
        }
        else{
            return response()->json(false);
        }
        
    }
    public function save_status_detail_call(Request $request)
    {
        $model = DB::table('_call_status_details');
        /*if(request()->ajax()){
            if(!empty($request->id)){
                $model->updateOrInsert(
                    ['id' => $request->id],
                    ['value_call_status_detail' => $request->input_call_status_detail, 'is_enabled' => $request->input_status, 'id_call_status' => $request->select_call_status]
                );
            }
            else{
                $model->insert(
                    ['value_call_status_detail' => $request->input_call_status_detail, 'is_enabled' => $request->input_status, 'id_call_status' => $request->select_call_status]
                );
            }
        }*/
        $model->updateOrInsert(
            ['id' => $request->id],
            ['value_call_status_detail' => $request->input_call_status_detail, 'is_enabled' => $request->input_status, 'id_call_status' => $request->select_call_status]
        );
        if ($model) {
            return response()->json(true);
        }
        else{
            return response()->json(false);
        }
    }
    public function save_status_detail_reason_call(Request $request)
    {
        $model = DB::table('_call_status_detail_reasons');
        /*if(request()->ajax()){
            if(!empty($request->id)){
                $model->updateOrInsert(
                    ['id' => $request->id],
                    ['value_call_status_detail_reason' => $request->input_call_status_detail_reason, 'is_enabled' => $request->input_status, 'id_call_status_detail' => $request->select_call_status_detail]
                );
            }
            else{
                $model->insert(
                    ['value_call_status_detail_reason' => $request->input_call_status_detail_reason, 'is_enabled' => $request->input_status, 'id_call_status_detail' => $request->select_call_status_detail]
                );
            }
        }*/
        $model->updateOrInsert(
            ['id' => $request->id],
            ['value_call_status_detail_reason' => $request->input_call_status_detail_reason, 'is_enabled' => $request->input_status, 'id_call_status_detail' => $request->select_call_status_detail]
        );
        if ($model) {
            return response()->json(true);
        }
        else{
            return response()->json(false);
        }
    }
    public function save_tapping_status(Request $request)
    {
        $model = DB::table('_tapping_statuses');
        /*if(request()->ajax()){
            if(!empty($request->id)){
                $model->updateOrInsert(
                    ['id' => $request->id],
                    ['value_tapping_status' => $request->input_tapping_status, 'is_enabled' => $request->input_status]
                );
            }
            else{
                $model->insert(
                    ['value_tapping_status' => $request->input_tapping_status, 'is_enabled' => $request->input_status]
                );
            }
        }*/
        $model->updateOrInsert(
            ['id' => $request->id],
            ['value_tapping_status' => $request->input_tapping_status, 'is_enabled' => $request->input_status]
        );
        if ($model) {
            return response()->json(true);
        }
        else{
            return response()->json(false);
        }
    }
    public function save_regional(Request $request)
    {
        $model = DB::table('_regionals');
        /*if(request()->ajax()){
            if(!empty($request->id)){
                $model->updateOrInsert(
                    ['id' => $request->id],
                    ['value_tapping_status' => $request->input_tapping_status, 'is_enabled' => $request->input_status]
                );
            }
            else{
                $model->insert(
                    ['value_tapping_status' => $request->input_tapping_status, 'is_enabled' => $request->input_status]
                );
            }
        }*/
        $model->updateOrInsert(
            ['id' => $request->id],
            ['regional_desc' => $request->input_regional, 'is_enabled' => $request->input_status]
        );
        if ($model) {
            return response()->json(true);
        }
        else{
            return response()->json(false);
        }
    }
    public function save_witel(Request $request)
    {
        $model = DB::table('_witels');
        /*if(request()->ajax()){
            if(!empty($request->id)){
                $model->updateOrInsert(
                    ['id' => $request->id],
                    ['value_tapping_status' => $request->input_tapping_status, 'is_enabled' => $request->input_status]
                );
            }
            else{
                $model->insert(
                    ['value_tapping_status' => $request->input_tapping_status, 'is_enabled' => $request->input_status]
                );
            }
        }*/
        $model->updateOrInsert(
            ['id' => $request->id],
            ['witel_desc' => $request->input_witel, 'id_regional' => $request->select_regional, 'is_enabled' => $request->input_status]
        );
        if ($model) {
            return response()->json(true);
        }
        else{
            return response()->json(false);
        }
    }
    public function save_skill(Request $request)
    {
        $model = DB::table('_skills');
        /*if(request()->ajax()){
            if(!empty($request->id)){
                $model->updateOrInsert(
                    ['id' => $request->id],
                    ['value_tapping_status' => $request->input_tapping_status, 'is_enabled' => $request->input_status]
                );
            }
            else{
                $model->insert(
                    ['value_tapping_status' => $request->input_tapping_status, 'is_enabled' => $request->input_status]
                );
            }
        }*/
        $model->updateOrInsert(
            ['id' => $request->id],
            ['skill_desc' => $request->input_skill, 'is_enabled' => $request->input_status]
        );
        if ($model) {
            return response()->json(true);
        }
        else{
            return response()->json(false);
        }
    }
    public function save_paket(Request $request)
    {
        $model = DB::table('_pakets');
        /*if(request()->ajax()){
            if(!empty($request->id)){
                $model->updateOrInsert(
                    ['id' => $request->id],
                    ['value_tapping_status' => $request->input_tapping_status, 'is_enabled' => $request->input_status]
                );
            }
            else{
                $model->insert(
                    ['value_tapping_status' => $request->input_tapping_status, 'is_enabled' => $request->input_status]
                );
            }
        }*/
        $model->updateOrInsert(
            ['id' => $request->id],
            ['paket_desc' => $request->input_paket, 'skill' => $request->select_skill, 'is_enabled' => $request->input_status]
        );
        if ($model) {
            return response()->json(true);
        }
        else{
            return response()->json(false);
        }
    }
    public function save_user(Request $request)
    {
        $model = DB::table('users');
        $model->updateOrInsert(
            ['id' => $request->id],
            ['name' => $request->input_name, 'username' => $request->input_username, 'level' => $request->select_role_value, 'divisi' => 'Offering', 'is_enabled' => $request->input_status, 'password' => bcrypt('infomedia2020'), 'leader' =>'']
        );
        if ($model) {
            return response()->json(true);
        }
        else{
            return response()->json(false);
        }
        
    }
    public function import_users(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
 
        // menangkap file excel
        $file = $request->file('file');
 
        // membuat nama file unik
        $nama_file = rand().$file->getClientOriginalName();
 
        // upload ke folder file_siswa di dalam folder public
        $file->move('file_user',$nama_file);
 
        // import data
        Excel::import(new UsersImport, public_path('/file_user/'.$nama_file));
 
        // notifikasi dengan session
        $request->session()->flash('sukses', 'Upload Successfully!');
 
        // alihkan halaman kembali
        return redirect('/admin/console/users');
        
    }

    public function import_dapros(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
 
        // menangkap file excel
        $file = $request->file('file');
 
        // membuat nama file unik
        $nama_file = rand().$file->getClientOriginalName();
 
        // upload ke folder file_siswa di dalam folder public
        $file->move('file_user',$nama_file);
 
        // import data
        Excel::import(new DaprosImport, public_path('/file_user/'.$nama_file));
 
        // notifikasi dengan session

        $request->session()->flash('sukses', 'Upload Successfully!');
        /*$request->session()->flash('message', 'Upload Successfully!');
        $request->session()->flash('alert-class', 'success');
        $request->session()->flash('title-alert', 'Success!');*/
 
        // alihkan halaman kembali
        return redirect('/admin');
        
    }

    public function update_data_dapros_statistics(Request $request)
    {
        // Dapatkan ds dari ID
        $ds = _dapros_statistics::where('id', $request->id)->firstOrFail();
        // Update log terakhir di call 
        $call = _call::where('dapros_id', $ds->dapros_id)
        ->orderBy('created_at', 'desc')
        ->first();
        if ($call !== null) {
            $call->call_status_id = $request->status_call;
            $call->call_status_detail_id = $request->status_detail;
            $call->call_status_detail_reason_id = $request->status_detail_reason;
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
            $call->call_information = $request->c_information;
            $call->save();
        }
        // Update Log terakhir di tapping
        $tapping = _tapping::where('dapros_id', $ds->dapros_id)
        ->orderBy('created_at', 'desc')
        ->first();
        if ($tapping !== null) {
            $tapping->tapping_status_id = $request->status_tapping;
            $tapping->tapping_information = $request->t_information;
            $tapping->save();
        }
        # Kalo data nya status tapping nya return maka
        if ($request->input('status_tapping') == 2) {
            $ebr_value = 'yes'; #Kolom ever_be_returned bernilai 'yes'
            $dc_value = 'returned to agent'; #Kolom data_condition bernilai 'returned to agent'
        }
        elseif (null !== $ds->tapping_status_id AND $ds->tapping_status_id == 2){
            $ebr_value = 'yes'; #Kolom ever_be_returned bernilai 'yes'
            $dc_value = '-'; #Kolom data condituin bernilai '-'
        }
        else{
            $ebr_value = 'no'; #Kolom ever_be_returned bernilai 'yes'
            $dc_value = '-'; #Kolom data condituin bernilai '-'
        }
        // Save nilai baru dari updatean
        $ds->call_status_id = $request->status_call;
        $ds->call_status_detail_id = $request->status_detail;
        $ds->call_status_detail_reason_id = $request->status_detail_reason;
        $ds->call_am_datetime = $call->call_am_datetime;
        $ds->call_fu_datetime =  $call->call_fu_datetime;
        $ds->call_information = $request->c_information;
        $ds->tapping_status_id = $request->status_tapping;
        $ds->tapping_information = $request->t_information;
        $ds->ever_be_returned = $ebr_value;
        $ds->data_condition = $dc_value;
        $save_status = $ds->save();
        # Memastikan bahwa save berhasil memperbaharui data
        if (! $save_status) {
            abort(500, 'Error while updating status data.');
        }
        return response()->json(true);
        //return response()->json($request->id);
    }
}
