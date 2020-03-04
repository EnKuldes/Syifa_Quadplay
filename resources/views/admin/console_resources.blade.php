@extends('layouts.app')

@section('content')

<div class="row">
	<div class="col-md-12 col-lg-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Console Status Call</h3>
				<div class="panel-control">
					<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalForStatusCall" onclick="goToTop()"><i class="fa fa-plus"></i></button>
				</div>

			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table id="console_status_calls" class="display table" style="width: 100%; cellspacing: 0;">
						<thead>
							<tr>
								<th>No</th>
								<th>Call Status</th>
								<th>Status</th>
								<th>Action</th>

							</tr>
						</thead>
						<tbody>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-12 col-lg-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Console Detail Call</h3>
				<div class="panel-control">
					<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalForDetailCall" onclick="goToTop();"><i class="fa fa-plus"></i></button>
				</div>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table id="console_detail_calls" class="display table" style="width: 100%; cellspacing: 0;">
						<thead>
							<tr>
								<th>No</th>
								<th>Call Status</th>
								<th>Detail Call</th>
								<th>Status</th>
								<th>Action</th>

							</tr>
						</thead>
						<tbody>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-12 col-lg-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Console Detail Reason</h3>
				<div class="panel-control">
					<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalForDetailReason" onclick="goToTop();"><i class="fa fa-plus"></i></button>
				</div>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table id="console_detail_reasons" class="display table" style="width: 100%; cellspacing: 0;">
						<thead>
							<tr>
								<th>No</th>
								<th>Detail Call</th>
								<th>Detail Reason</th>
								<th>Status</th>
								<th>Action</th>

							</tr>
						</thead>
						<tbody>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-12 col-lg-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Console Witel</h3>
				<div class="panel-control">
					<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalForWitel" onclick="goToTop();"><i class="fa fa-plus"></i></button>
				</div>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table id="console_witels" class="display table" style="width: 100%; cellspacing: 0;">
						<thead>
							<tr>
								<th>No</th>
								<th>Witel</th>
								<th>Regional</th>
								<th>Status</th>
								<th>Action</th>

							</tr>
						</thead>
						<tbody>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	{{-- <div class="col-md-12 col-lg-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Console Regional</h3>
						<div class="panel-control">
							<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalForRegional"><i class="fa fa-plus"></i></button>
						</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table id="console_regionals" class="display table" style="width: 100%; cellspacing: 0;">
								<thead>
									<tr>
										<th>No</th>
										<th>Regional</th>
										<th>Status</th>
										<th>Action</th>

									</tr>
								</thead>
								<tbody>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div> --}}
	<div class="col-md-4 col-lg-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Console Status Tapping</h3>
				<div class="panel-control">
					<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalForTappingStatus" onclick="goToTop();"><i class="fa fa-plus"></i></button>
				</div>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table id="console_status_tappings" class="display table" style="width: 100%; cellspacing: 0;">
						<thead>
							<tr>
								<th>No</th>
								<th>Tapping Status</th>
								<th>Status</th>
								<th>Action</th>

							</tr>
						</thead>
						<tbody>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4 col-lg-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Console Skill</h3>
				<div class="panel-control">
					<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalForSkill" onclick="goToTop();"><i class="fa fa-plus"></i></button>
				</div>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table id="console_skills" class="display table" style="width: 100%; cellspacing: 0;">
						<thead>
							<tr>
								<th>No</th>
								<th>Skill</th>
								<th>Status</th>
								<th>Action</th>

							</tr>
						</thead>
						<tbody>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4 col-lg-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Console Paket</h3>
				<div class="panel-control">
					<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalForPaket" onclick="goToTop();"><i class="fa fa-plus"></i></button>
				</div>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table id="console_pakets" class="display table" style="width: 100%; cellspacing: 0;">
						<thead>
							<tr>
								<th>No</th>
								<th>Paket</th>
								<th>Skill</th>
								<th>Status</th>
								<th>Action</th>

							</tr>
						</thead>
						<tbody>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
{{-- Form Status Call --}}
<div class="modal fade" id="modalForStatusCall" tabindex="-1" role="dialog" aria-labelledby="modalForStatusCallLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="modalForStatusCallLabel">Form Status Call</h4>
			</div>
			<div class="modal-body">
				<form id="formForStatusCall">
					<div class="form-group">
						<label for="input_call_status">Call Status</label>
						<input type="text" class="form-control" id="input_call_status" name="input_call_status" placeholder="Enter Call Status">
					</div>
					<div class="form-group">
						<label for="input_status_1">Enable this?</label>
						<select class="form-control" id="input_status_1" name="input_status" style="width: 100%;">
							<option></option>
						</select>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				{{-- <button type="reset" class="btn btn-default" form="formForStatusCall">Reset</button> --}}
				<button type="submit" class="btn btn-success" form="formForStatusCall">Save</button>
			</div>
		</div>
	</div>
</div>
{{-- Form Detail Call --}}
<div class="modal fade" id="modalForDetailCall" tabindex="-1" role="dialog" aria-labelledby="modalForDetailCallLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="modalForDetailCallLabel">Form Detail Call</h4>
			</div>
			<div class="modal-body">
				<form id="formForDetailCall">
					<div class="form-group">
						<label for="input_call_status_detail">Detail Call</label>
						<input type="text" class="form-control" id="input_call_status_detail" name="input_call_status_detail" placeholder="Enter Detail Call">
					</div>
					<div class="form-group">
						<label for="select_call_status">Choose Status Call</label>
						<select class="form-control" id="select_call_status" name="select_call_status" style="width: 100%;">
							<option></option>
						</select>
					</div>
					<div class="form-group">
						<label for="input_status_2">Enable this?</label>
						<select class="form-control" id="input_status_2" name="input_status" style="width: 100%;">
							<option></option>
						</select>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				{{-- <button type="reset" class="btn btn-default" form="formForDetailCall">Reset</button> --}}
				<button type="submit" class="btn btn-success" form="formForDetailCall">Save</button>
			</div>
		</div>
	</div>
</div>
{{-- Form Detail Reason --}}
<div class="modal fade" id="modalForDetailReason" tabindex="-1" role="dialog" aria-labelledby="modalForDetailReasonLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="modalForDetailReasonLabel">Form Detail Reason</h4>
			</div>
			<div class="modal-body">
				<form id="formForDetailReason">
					<div class="form-group">
						<label for="input_call_status_detail_reason">Detail Reason</label>
						<input type="text" class="form-control" id="input_call_status_detail_reason" name="input_call_status_detail_reason" placeholder="Enter Detail Reason">
					</div>
					<div class="form-group">
						<label for="select_call_status_detail">Choose Status Call</label>
						<select class="form-control" id="select_call_status_detail" name="select_call_status_detail" style="width: 100%;">
							<option></option>
						</select>
					</div>
					<div class="form-group">
						<label for="input_status_3">Enable this?</label>
						<select class="form-control" id="input_status_3" name="input_status" style="width: 100%;">
							<option></option>
						</select>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				{{-- <button type="reset" class="btn btn-default" form="formForDetailReason">Reset</button> --}}
				<button type="submit" class="btn btn-success" form="formForDetailReason">Save</button>
			</div>
		</div>
	</div>
</div>
{{-- Form Status Tapping --}}
<div class="modal fade" id="modalForTappingStatus" tabindex="-1" role="dialog" aria-labelledby="modalForTappingStatusLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="modalForTappingStatusLabel">Form Status Tapping</h4>
			</div>
			<div class="modal-body">
				<form id="formForStatusTapping">
					<div class="form-group">
						<label for="input_tapping_status">Tapping Status</label>
						<input type="text" class="form-control" id="input_tapping_status" name="input_tapping_status" placeholder="Enter Tapping Status">
					</div>
					<div class="form-group">
						<label for="input_status_4">Enable this?</label>
						<select class="form-control" id="input_status_4" name="input_status" style="width: 100%;">
							<option></option>
						</select>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				{{-- <button type="reset" class="btn btn-default" form="formForStatusTapping">Reset</button> --}}
				<button type="submit" class="btn btn-success" form="formForStatusTapping">Save</button>
			</div>
		</div>
	</div>
</div>

{{-- Form Status Witel --}}
<div class="modal fade" id="modalForWitel" tabindex="-1" role="dialog" aria-labelledby="modalForWitelLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="modalForWitelLabel">Form Witel</h4>
			</div>
			<div class="modal-body">
				<form id="formForWitel">
					<div class="form-group">
						<label for="input_witel">Witel</label>
						<input type="text" class="form-control" id="input_witel" name="input_witel" placeholder="Enter Witel">
					</div>
					<div class="form-group">
						<label for="select_regional">Choose Regional</label>
						<select class="form-control" id="select_regional" name="select_regional" style="width: 100%;">
							<option></option>
						</select>
					</div>
					<div class="form-group">
						<label for="input_status_5">Enable this?</label>
						<select class="form-control" id="input_status_5" name="input_status" style="width: 100%;">
							<option></option>
						</select>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				{{-- <button type="reset" class="btn btn-default" form="formForWitel">Reset</button> --}}
				<button type="submit" class="btn btn-success" form="formForWitel">Save</button>
			</div>
		</div>
	</div>
</div>
{{-- Form Status Skill --}}
<div class="modal fade" id="modalForSkill" tabindex="-1" role="dialog" aria-labelledby="modalForSkillLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="modalForSkillLabel">Form Skill</h4>
			</div>
			<div class="modal-body">
				<form id="formForSkill">
					<div class="form-group">
						<label for="input_skill">Skill</label>
						<input type="text" class="form-control" id="input_skill" name="input_skill" placeholder="Enter Skill">
					</div>
					<div class="form-group">
						<label for="input_status_6">Enable this?</label>
						<select class="form-control" id="input_status_6" name="input_status" style="width: 100%;">
							<option></option>
						</select>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				{{-- <button type="reset" class="btn btn-default" form="formForSkill">Reset</button> --}}
				<button type="submit" class="btn btn-success" form="formForSkill">Save</button>
			</div>
		</div>
	</div>
</div>
{{-- Form Status Paket --}}
<div class="modal fade" id="modalForPaket" tabindex="-1" role="dialog" aria-labelledby="modalForPaketLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="modalForPaketLabel">Form Paket</h4>
			</div>
			<div class="modal-body">
				<form id="formForPaket">
					<div class="form-group">
						<label for="input_paket">Paket</label>
						<input type="text" class="form-control" id="input_paket" name="input_paket" placeholder="Enter Paket">
					</div>
					<div class="form-group">
						<label for="select_skill">Choose Skill</label>
						<select class="form-control" id="select_skill" name="select_skill" style="width: 100%;">
							<option></option>
						</select>
					</div>
					<div class="form-group">
						<label for="input_status_7">Enable this?</label>
						<select class="form-control" id="input_status_7" name="input_status" style="width: 100%;">
							<option></option>
						</select>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				{{-- <button type="reset" class="btn btn-default" form="formForPaket">Reset</button> --}}
				<button type="submit" class="btn btn-success" form="formForPaket">Save</button>
			</div>
		</div>
	</div>
</div>

<script src="{{ asset('plugins/datatables/js/jquery.datatables.min.js')}}"></script>
<script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
<script type="text/javascript">
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	{{-- Document Ready --}}
	$(document).ready(function() {
		{{-- Mempersiapkan value untuk select2 --}}
		var data_option = [
			{id: 1, text: 'Yes'},
			{id: 0, text: 'No'}
		];
		{{-- Set Default Confoguration buat Select2 --}}
		$.fn.select2.defaults.set("placeholder", "Please select option");
		$.fn.select2.defaults.set("data", data_option);
		$.fn.select2.defaults.set("closeOnSelect", true);
		//$.fn.select2.defaults.set("allowClear", true);
	    $("#input_status_1").select2({
			dropdownParent: $("#modalForStatusCall")
		});
		$("#input_status_2").select2({
			dropdownParent: $("#modalForDetailCall")
		});
		$("#input_status_3").select2({
			dropdownParent: $("#modalForDetailReason")
		});
		$("#input_status_4").select2({
			dropdownParent: $("#modalForTappingStatus")
		});
		$("#input_status_5").select2({
			dropdownParent: $("#modalForWitel")
		});
		$("#input_status_6").select2({
			dropdownParent: $("#modalForSkill")
		});
		$("#input_status_7").select2({
			dropdownParent: $("#modalForPaket")
		});

		get_list_resources_options();

	});
	function get_list_resources_options() {
		// Reinsiasi
		$.ajax({
	       type:"post",
	       url:'/admin/console/get_status_call_list_options',
	       //data: {},
	       success: function(data){

	       	var list_options = [];
	       	for (var i = 0; i < data.length; i++) {
	       		option = {id: data[i]['id'], text: data[i]['value_call_status']};
	       		list_options.push(option);
	       	}
	        //$('#select_call_status').html(ahtml);
	        $("#select_call_status").select2({
				dropdownParent: $("#modalForDetailCall")
				, data: list_options
			});
	       },
	        error : function(data) {
	        }
	     }).done(function(){

	     });
	    $.ajax({
	       type:"post",
	       url:'/admin/console/get_detail_call_list_options',
	       //data: {},
	       success: function(data){

	       	//var ahtml = '<option></option>';
	       	var list_options = [];
	       	for (var i = 0; i < data.length; i++) {
	       		//ahtml+="<option value='"+data[i]['id']+"'>"+data[i]['value_call_status_detail']+"</option>"
	       		option = {id: data[i]['id'], text: data[i]['value_call_status_detail']};
	       		list_options.push(option);
	       	}
	        //$('#select_call_status_detail').html(ahtml);
	        $("#select_call_status_detail").select2({
				dropdownParent: $("#modalForDetailReason")
				, data: list_options
			});
	       },
	        error : function(data) {
	        }
	     }).done(function(){
			/*$("#select_call_status_detail").select2({
				dropdownParent: $("#modalForDetailReason")
			});*/
	     });
	     $.ajax({
	       type:"post",
	       url:'/admin/console/get_regional_list_options',
	       //data: {},
	       success: function(data){

	       	//var ahtml = '<option></option>';
	       	var list_options = [];
	       	for (var i = 0; i < data.length; i++) {
	       		//ahtml+="<option value='"+data[i]['id']+"'>"+data[i]['value_call_status_detail']+"</option>"
	       		option = {id: data[i]['id'], text: data[i]['regional_desc']};
	       		list_options.push(option);
	       	}
	        //$('#select_call_status_detail').html(ahtml);
	        $("#select_regional").select2({
				dropdownParent: $("#modalForWitel")
				, data: list_options
			});
	       },
	        error : function(data) {
	        }
	     }).done(function(){
			/*$("#select_call_status_detail").select2({
				dropdownParent: $("#modalForDetailReason")
			});*/
	     });
	     $.ajax({
	       type:"post",
	       url:'/admin/console/get_skill_list_options',
	       //data: {},
	       success: function(data){

	       	//var ahtml = '<option></option>';
	       	var list_options = [];
	       	for (var i = 0; i < data.length; i++) {
	       		//ahtml+="<option value='"+data[i]['id']+"'>"+data[i]['value_call_status_detail']+"</option>"
	       		option = {id: data[i]['skill_desc'], text: data[i]['skill_desc']};
	       		list_options.push(option);
	       	}
	        //$('#select_call_status_detail').html(ahtml);
	        $("#select_skill").select2({
				dropdownParent: $("#modalForPaket")
				, data: list_options
			});
	       },
	        error : function(data) {
	        }
	     }).done(function(){
			/*$("#select_call_status_detail").select2({
				dropdownParent: $("#modalForDetailReason")
			});*/
	     });
	}

	{{-- Rules untuk semua Datatables --}}
	$.extend( true, $.fn.dataTable.defaults, {
		pageLength: 5,
		dom: 'ftrip',
		ordering: false,
		searching: true,
		scrollY: '364px',
	} );
	{{-- Inisiasi masing-masing tabel console --}}
	var table_1 = $('#console_status_calls').DataTable({
		processing: true,
		serverSide: true,
		ajax: {
			url: 'get_status_call_list',
		},
		columns: [
		{ data: 'i', name: 'i' }
		, { data: 'value_call_status', name: 'value_call_status' }
		, { data: 'status', name: 'status' }
		, { data: 'action', name: 'action' }
		],
		language: {
			processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '
		},
	});
	var table_2 = $('#console_detail_calls').DataTable({
		processing: true,
		serverSide: true,
		ajax: {
			url: 'get_detail_call_list',
		},
		columns: [
		{ data: 'i', name: 'i' }
		, { data: 'value_call_status', name: 'value_call_status' }
		, { data: 'value_call_status_detail', name: 'value_call_status_detail' }
		, { data: 'status', name: 'status' }
		, { data: 'action', name: 'action' }
		],
		language: {
			processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '
		},
	});
	var table_3 = $('#console_detail_reasons').DataTable({
		processing: true,
		serverSide: true,
		ajax: {
			url: 'get_detail_reason_list',
		},
		columns: [
		{ data: 'i', name: 'i' }
		, { data: 'value_call_status_detail', name: 'value_call_status_detail' }
		, { data: 'value_call_status_detail_reason', name: 'value_call_status_detail_reason' }
		, { data: 'status', name: 'status' }
		, { data: 'action', name: 'action' }
		],
		language: {
			processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '
		},
	});
	var table_4 = $('#console_status_tappings').DataTable({
		processing: true,
		serverSide: true,
		ajax: {
			url: 'get_status_tapping_list',
		},
		columns: [
		{ data: 'i', name: 'i' }
		, { data: 'value_tapping_status', name: 'value_tapping_status' }
		, { data: 'status', name: 'status' }
		, { data: 'action', name: 'action' }
		],
		language: {
			processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '
		},
	});
	var table_5 = $('#console_witels').DataTable({
		processing: true,
		serverSide: true,
		ajax: {
			url: 'get_witel_list',
		},
		columns: [
		{ data: 'i', name: 'i' }
		, { data: 'witel_desc', name: 'witel_desc' }
		, { data: 'regional_desc', name: 'regional_desc' }
		, { data: 'status', name: 'status' }
		, { data: 'action', name: 'action' }
		],
		language: {
			processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '
		},
	});
	var table_6 = $('#console_skills').DataTable({
		processing: true,
		serverSide: true,
		ajax: {
			url: 'get_skill_list',
		},
		columns: [
		{ data: 'i', name: 'i' }
		, { data: 'skill_desc', name: 'skill_desc' }
		, { data: 'status', name: 'status' }
		, { data: 'action', name: 'action' }
		],
		language: {
			processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '
		},
	});
	var table_7 = $('#console_pakets').DataTable({
		processing: true,
		serverSide: true,
		ajax: {
			url: 'get_paket_list',
		},
		columns: [
		{ data: 'i', name: 'i' }
		, { data: 'paket_desc', name: 'paket_desc' }
		, { data: 'skill', name: 'skill' }
		, { data: 'status', name: 'status' }
		, { data: 'action', name: 'action' }
		],
		language: {
			processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '
		},
	});
	{{-- Modify Caller --}}
	function modifyCallStatus(id_value) {
		$.ajax({
	       type:"post",
	       url:'/admin/console/get_status_call_list_options',
	       data: {id: id_value},
	       success: function(data){
	       	for (var i = 0; i < data.length; i++) {
	       		// {{-- Append Hidden Input to Form --}}
	       		var form = document.getElementById("formForStatusCall")
	       		var hiddenInput = document.createElement("input");
	       		hiddenInput.value= data[i]['id'];
	       		hiddenInput.name="id";
	       		hiddenInput.type="hidden";
	       		form.appendChild(hiddenInput);
	       		// Masang value ke masing-masing input pada form
	       		form.elements["input_call_status"].value = data[i]['value_call_status']
	       		form.elements["input_status"].value = data[i]['is_enabled']
	       		form.elements["input_status"].dispatchEvent(new Event('change'));
	       	}
	       },
	        error : function(data) {
	        }
	     }).done(function(){

	     });
		goToTop();
		$('#modalForStatusCall').modal('show');
	}
	function modifyDetailCall(id_value) {
		$.ajax({
	       type:"post",
	       url:'/admin/console/get_detail_call_list_options',
	       data: {id: id_value},
	       success: function(data){
	       	for (var i = 0; i < data.length; i++) {
	       		// {{-- Append Hidden Input to Form --}}
	       		var form = document.getElementById("formForDetailCall")
	       		var hiddenInput = document.createElement("input");
	       		hiddenInput.value= data[i]['id'];
	       		hiddenInput.name="id";
	       		hiddenInput.type="hidden";
	       		form.appendChild(hiddenInput);
	       		// Masang value ke masing-masing input pada form
	       		form.elements["input_call_status_detail"].value = data[i]['value_call_status_detail']
	       		form.elements["select_call_status"].value = data[i]['id_call_status']
	       		form.elements["select_call_status"].dispatchEvent(new Event('change'));
	       		form.elements["input_status"].value = data[i]['is_enabled']
	       		form.elements["input_status"].dispatchEvent(new Event('change'));
	       	}
	       },
	        error : function(data) {
	        }
	     }).done(function(){

	     });
		goToTop();
		$('#modalForDetailCall').modal('show');
	}
	function modifyReasonDetail(id_value) {
		$.ajax({
	       type:"post",
	       url:'/admin/console/get_detail_reason_list_options',
	       data: {id: id_value},
	       success: function(data){
	       	for (var i = 0; i < data.length; i++) {
	       		// {{-- Append Hidden Input to Form --}}
	       		var form = document.getElementById("formForDetailReason")
	       		var hiddenInput = document.createElement("input");
	       		hiddenInput.value= data[i]['id'];
	       		hiddenInput.name="id";
	       		hiddenInput.type="hidden";
	       		form.appendChild(hiddenInput);
	       		// Masang value ke masing-masing input pada form
	       		form.elements["input_call_status_detail_reason"].value = data[i]['value_call_status_detail_reason']
	       		form.elements["select_call_status_detail"].value = data[i]['id_call_status_detail']
	       		form.elements["select_call_status_detail"].dispatchEvent(new Event('change'));
	       		form.elements["input_status"].value = data[i]['is_enabled']
	       		form.elements["input_status"].dispatchEvent(new Event('change'));
	       	}
	       },
	        error : function(data) {
	        }
	     }).done(function(){

	     });
		goToTop();
		$('#modalForDetailReason').modal('show');
	}
	function modifyTappingStatus(id_value) {
		$.ajax({
	       type:"post",
	       url:'/admin/console/get_status_tapping_list_options',
	       data: {id: id_value},
	       success: function(data){
	       	for (var i = 0; i < data.length; i++) {
	       		// {{-- Append Hidden Input to Form --}}
	       		var form = document.getElementById("formForStatusTapping")
	       		var hiddenInput = document.createElement("input");
	       		hiddenInput.value= data[i]['id'];
	       		hiddenInput.name="id";
	       		hiddenInput.type="hidden";
	       		form.appendChild(hiddenInput);
	       		// Masang value ke masing-masing input pada form
	       		form.elements["input_tapping_status"].value = data[i]['value_tapping_status']
	       		form.elements["input_status"].value = data[i]['is_enabled']
	       		form.elements["input_status"].dispatchEvent(new Event('change'));
	       	}
	       },
	        error : function(data) {
	        }
	     }).done(function(){

	     });
		goToTop();
		$('#modalForTappingStatus').modal('show');
	}
	function modifyWitel(id_value) {
		$.ajax({
	       type:"post",
	       url:'/admin/console/get_witel_list_options',
	       data: {id: id_value},
	       success: function(data){
	       	for (var i = 0; i < data.length; i++) {
	       		// {{-- Append Hidden Input to Form --}}
	       		var form = document.getElementById("formForWitel")
	       		var hiddenInput = document.createElement("input");
	       		hiddenInput.value= data[i]['id'];
	       		hiddenInput.name="id";
	       		hiddenInput.type="hidden";
	       		form.appendChild(hiddenInput);
	       		// Masang value ke masing-masing input pada form
	       		form.elements["input_witel"].value = data[i]['witel_desc']
	       		form.elements["select_regional"].value = data[i]['id_regional']
	       		form.elements["select_regional"].dispatchEvent(new Event('change'));
	       		form.elements["input_status"].value = data[i]['is_enabled']
	       		form.elements["input_status"].dispatchEvent(new Event('change'));
	       	}
	       },
	        error : function(data) {
	        }
	     }).done(function(){

	     });
		goToTop();
		$('#modalForWitel').modal('show');
	}
	function modifySkill(id_value) {
		$.ajax({
	       type:"post",
	       url:'/admin/console/get_skill_list_options',
	       data: {id: id_value},
	       success: function(data){
	       	for (var i = 0; i < data.length; i++) {
	       		// {{-- Append Hidden Input to Form --}}
	       		var form = document.getElementById("formForSkill")
	       		var hiddenInput = document.createElement("input");
	       		hiddenInput.value= data[i]['id'];
	       		hiddenInput.name="id";
	       		hiddenInput.type="hidden";
	       		form.appendChild(hiddenInput);
	       		// Masang value ke masing-masing input pada form
	       		form.elements["input_skill"].value = data[i]['skill_desc']
	       		form.elements["input_status"].value = data[i]['is_enabled']
	       		form.elements["input_status"].dispatchEvent(new Event('change'));
	       	}
	       },
	        error : function(data) {
	        }
	     }).done(function(){

	     });
		goToTop();
		$('#modalForSkill').modal('show');
	}
	function modifyPaket(id_value) {
		$.ajax({
	       type:"post",
	       url:'/admin/console/get_paket_list_options',
	       data: {id: id_value},
	       success: function(data){
	       	for (var i = 0; i < data.length; i++) {
	       		// {{-- Append Hidden Input to Form --}}
	       		var form = document.getElementById("formForPaket")
	       		var hiddenInput = document.createElement("input");
	       		hiddenInput.value= data[i]['id'];
	       		hiddenInput.name="id";
	       		hiddenInput.type="hidden";
	       		form.appendChild(hiddenInput);
	       		// Masang value ke masing-masing input pada form
	       		form.elements["input_paket"].value = data[i]['paket_desc']
	       		form.elements["select_skill"].value = data[i]['skill']
	       		form.elements["select_skill"].dispatchEvent(new Event('change'));
	       		form.elements["input_status"].value = data[i]['is_enabled']
	       		form.elements["input_status"].dispatchEvent(new Event('change'));
	       	}
	       },
	        error : function(data) {
	        }
	     }).done(function(){

	     });
	    goToTop();
		$('#modalForPaket').modal('show');
	}

	$('#formForStatusCall').on('submit', function(e){
        e.preventDefault();
        $.ajax({
	       type:"post",
	       url:'/admin/console/save_status_call',
	       data: $( this ).serialize(),
	       success: function(data){
	       	console.log(data);
	       	if (data) {notificationScript("success", "Success", "Successfully save data.");}
	       	else{notificationScript("error", "error", "Error while saving data.");}
	       },
	        error: function(jqXhr, json, errorThrown){// this are default for ajax errors
	        	var errors = jqXhr.responseJSON;
	            var errorsHtml = '<div class="alert alert-danger alert-dismissible" role="alert" style="margin-bottom: 0;"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Error ' + jqXhr.status + ': ' + errorThrown + '</div>';
	            notificationScript("error", "Error " + jqXhr.status, errorThrown);
	            $.each(errors['errors'], function (index, value) {
	                errorsHtml += '<div class="alert alert-danger alert-dismissible" role="alert" style="margin-bottom: 0;><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' + value + '</div>';
	                notificationScript("error", "Error Field", value);
	            });

	        }
	     }).done(function(){
	     	refresh_table();
	     	$('#modalForStatusCall').modal('hide');
	     });

    });

    $('#formForDetailCall').on('submit', function(e){
        e.preventDefault();
        $.ajax({
	       type:"post",
	       url:'/admin/console/save_status_detail_call',
	       data: $( this ).serialize(),
	       success: function(data){
	       	console.log(data);
	       	if (data) {notificationScript("success", "Success", "Successfully save data.");}
	       	else{notificationScript("error", "error", "Error while saving data.");}
	       },
	        error: function(jqXhr, json, errorThrown){// this are default for ajax errors
	        	var errors = jqXhr.responseJSON;
	            var errorsHtml = '<div class="alert alert-danger alert-dismissible" role="alert" style="margin-bottom: 0;"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Error ' + jqXhr.status + ': ' + errorThrown + '</div>';
	            notificationScript("error", "Error " + jqXhr.status, errorThrown);
	            $.each(errors['errors'], function (index, value) {
	                errorsHtml += '<div class="alert alert-danger alert-dismissible" role="alert" style="margin-bottom: 0;><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' + value + '</div>';
	                notificationScript("error", "Error Field", value);
	            });

	        }
	     }).done(function(){
	     	refresh_table();
	     	$('#modalForDetailCall').modal('hide');
	     });

    });

    $('#formForDetailReason').on('submit', function(e){
        e.preventDefault();
        $.ajax({
	       type:"post",
	       url:'/admin/console/save_status_detail_reason_call',
	       data: $( this ).serialize(),
	       success: function(data){
	       	console.log(data);
	       	if (data) {notificationScript("success", "Success", "Successfully save data.");}
	       	else{notificationScript("error", "error", "Error while saving data.");}
	       },
	        error: function(jqXhr, json, errorThrown){// this are default for ajax errors
	        	var errors = jqXhr.responseJSON;
	            var errorsHtml = '<div class="alert alert-danger alert-dismissible" role="alert" style="margin-bottom: 0;"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Error ' + jqXhr.status + ': ' + errorThrown + '</div>';
	            notificationScript("error", "Error " + jqXhr.status, errorThrown);
	            $.each(errors['errors'], function (index, value) {
	                errorsHtml += '<div class="alert alert-danger alert-dismissible" role="alert" style="margin-bottom: 0;><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' + value + '</div>';
	                notificationScript("error", "Error Field", value);
	            });

	        }
	     }).done(function(){
	     	refresh_table();
	     	$('#modalForDetailReason').modal('hide');
	     });

    });

    $('#formForStatusTapping').on('submit', function(e){
        e.preventDefault();
        $.ajax({
	       type:"post",
	       url:'/admin/console/save_tapping_status',
	       data: $( this ).serialize(),
	       success: function(data){
	       	console.log(data);
	       	if (data) {notificationScript("success", "Success", "Successfully save data.");}
	       	else{notificationScript("error", "error", "Error while saving data.");}
	       },
	        error: function(jqXhr, json, errorThrown){// this are default for ajax errors
	        	var errors = jqXhr.responseJSON;
	            var errorsHtml = '<div class="alert alert-danger alert-dismissible" role="alert" style="margin-bottom: 0;"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Error ' + jqXhr.status + ': ' + errorThrown + '</div>';
	            notificationScript("error", "Error " + jqXhr.status, errorThrown);
	            $.each(errors['errors'], function (index, value) {
	                errorsHtml += '<div class="alert alert-danger alert-dismissible" role="alert" style="margin-bottom: 0;><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' + value + '</div>';
	                notificationScript("error", "Error Field", value);
	            });

	        }
	     }).done(function(){
	     	refresh_table();
	     	$('#modalForTappingStatus').modal('hide');
	     });

    });

    $('#formForWitel').on('submit', function(e){
        e.preventDefault();
        $.ajax({
	       type:"post",
	       url:'/admin/console/save_witel',
	       data: $( this ).serialize(),
	       success: function(data){
	       	console.log(data);
	       	if (data) {notificationScript("success", "Success", "Successfully save data.");}
	       	else{notificationScript("error", "error", "Error while saving data.");}
	       },
	        error: function(jqXhr, json, errorThrown){// this are default for ajax errors
	        	var errors = jqXhr.responseJSON;
	            var errorsHtml = '<div class="alert alert-danger alert-dismissible" role="alert" style="margin-bottom: 0;"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Error ' + jqXhr.status + ': ' + errorThrown + '</div>';
	            notificationScript("error", "Error " + jqXhr.status, errorThrown);
	            $.each(errors['errors'], function (index, value) {
	                errorsHtml += '<div class="alert alert-danger alert-dismissible" role="alert" style="margin-bottom: 0;><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' + value + '</div>';
	                notificationScript("error", "Error Field", value);
	            });

	        }
	     }).done(function(){
	     	refresh_table();
	     	$('#modalForWitel').modal('hide');
	     });

    });

    $('#formForSkill').on('submit', function(e){
        e.preventDefault();
        $.ajax({
	       type:"post",
	       url:'/admin/console/save_skill',
	       data: $( this ).serialize(),
	       success: function(data){
	       	console.log(data);
	       	if (data) {notificationScript("success", "Success", "Successfully save data.");}
	       	else{notificationScript("error", "error", "Error while saving data.");}
	       },
	        error: function(jqXhr, json, errorThrown){// this are default for ajax errors
	        	var errors = jqXhr.responseJSON;
	            var errorsHtml = '<div class="alert alert-danger alert-dismissible" role="alert" style="margin-bottom: 0;"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Error ' + jqXhr.status + ': ' + errorThrown + '</div>';
	            notificationScript("error", "Error " + jqXhr.status, errorThrown);
	            $.each(errors['errors'], function (index, value) {
	                errorsHtml += '<div class="alert alert-danger alert-dismissible" role="alert" style="margin-bottom: 0;><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' + value + '</div>';
	                notificationScript("error", "Error Field", value);
	            });

	        }
	     }).done(function(){
	     	refresh_table();
	     	$('#modalForSkill').modal('hide');
	     });

    });

    $('#formForPaket').on('submit', function(e){
        e.preventDefault();
        $.ajax({
	       type:"post",
	       url:'/admin/console/save_paket',
	       data: $( this ).serialize(),
	       success: function(data){
	       	console.log(data);
	       	if (data) {notificationScript("success", "Success", "Successfully save data.");}
	       	else{notificationScript("error", "error", "Error while saving data.");}
	       },
	        error: function(jqXhr, json, errorThrown){// this are default for ajax errors
	        	var errors = jqXhr.responseJSON;
	            var errorsHtml = '<div class="alert alert-danger alert-dismissible" role="alert" style="margin-bottom: 0;"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Error ' + jqXhr.status + ': ' + errorThrown + '</div>';
	            notificationScript("error", "Error " + jqXhr.status, errorThrown);
	            $.each(errors['errors'], function (index, value) {
	                errorsHtml += '<div class="alert alert-danger alert-dismissible" role="alert" style="margin-bottom: 0;><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' + value + '</div>';
	                notificationScript("error", "Error Field", value);
	            });

	        }
	     }).done(function(){
	     	refresh_table();
	     	$('#modalForPaket').modal('hide');
	     });

    });

    // Refresh Tabel
    function refresh_table() {
    	table_1.ajax.reload(null, false);
    	table_2.ajax.reload(null, false);
    	table_3.ajax.reload(null, false);
    	table_4.ajax.reload(null, false);
    	table_5.ajax.reload(null, false);
    	table_6.ajax.reload(null, false);
    	table_7.ajax.reload(null, false);
    	clear_input();
    }
    // Clear input
    function clear_input() {
    	$('input').val('');
    	destroy_select2();
    	get_list_resources_options();
    	$('select').val([]).trigger('change');
    }
    // Destroy Select2 Elements on specific
    function destroy_select2() {
     	// Destroy
     	$('#select_call_status').empty().trigger("change");
		$('#select_call_status_detail').empty().trigger("change");
		$('#select_regional').empty().trigger("change");
		$('#select_skill').empty().trigger("change");
     }
    // Go To Top of Page
    function goToTop() {
    	$('html, body').animate({ scrollTop: 0 }, 'fast');
    }
    // Setiap kali close Modal, cek ada inputt Hidden ga
    $('#modalForStatusCall').on('hidden.bs.modal', function () {
    	var element = $(this).find('form input[name = "id"]')
    	element.remove()
    	clear_input();
    });
    $('#modalForDetailCall').on('hidden.bs.modal', function () {
    	var element = $(this).find('form input[name = "id"]')
    	element.remove()
    	clear_input();
    });
    $('#modalForDetailReason').on('hidden.bs.modal', function () {
    	var element = $(this).find('form input[name = "id"]')
    	element.remove()
    	clear_input();
    });
    $('#modalForTappingStatus').on('hidden.bs.modal', function () {
    	var element = $(this).find('form input[name = "id"]')
    	element.remove()
    	clear_input();
    });
    $('#modalForWitel').on('hidden.bs.modal', function () {
    	var element = $(this).find('form input[name = "id"]')
    	element.remove()
    	clear_input();
    });
    $('#modalForSkill').on('hidden.bs.modal', function () {
    	var element = $(this).find('form input[name = "id"]')
    	element.remove()
    	clear_input();
    });
    $('#modalForPaket').on('hidden.bs.modal', function () {
    	var element = $(this).find('form input[name = "id"]')
    	element.remove()
    	clear_input();
    });
</script>

@endsection
