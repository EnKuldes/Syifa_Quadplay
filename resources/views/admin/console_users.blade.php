@extends('layouts.app')

@section('content')

<div class="panel panel-white">
	<div class="panel-heading clearfix">
		<h4 class="panel-title">Console Users</h4>
		<div class="panel-control">
			<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalForUser"><i class="fa fa-plus"></i></button>
			<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalForUploadUser"><i class="fa fa-upload"></i></button>
			{{-- <button type="button" class="btn btn-default " onclick="resetSearch()"><i class="fa fa-repeat"></i> </button> --}}
			<button type="button" class="btn btn-default " onclick="refreshTable()"><i class="fa fa-refresh"></i> </button>
		</div>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table id="console_users" class="display table" style="width: 100%; cellspacing: 0;">
				<thead>
					<tr>
						<th>No</th>
						<th>Name</th>
						<th>Username</th>
						<th>Role</th>
						<th>Skill</th>
						<th>Leader</th>
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
{{-- Form Nambah User --}}
<div class="modal fade" id="modalForUser" tabindex="-1" role="dialog" aria-labelledby="modalForUserLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="modalForUserLabel">Form User</h4>
			</div>
			<div class="modal-body">
				<form id="formForUser">
					<div class="form-group">
						<label for="input_name">Name</label>
						<input type="text" class="form-control" id="input_name" name="input_name" placeholder="Enter Name">
					</div>
					<div class="form-group">
						<label for="input_username">Username</label>
						<input type="text" class="form-control" id="input_username" name="input_username" placeholder="Enter Username">
					</div>
					<div class="form-group">
						<label for="select_role_value">Role</label>
						<select class="form-control" id="select_role_value" name="select_role_value" style="width: 100%;">
							<option></option>
						</select>
					</div>
					<div class="form-group">
						<label for="select_skill_value">Skill</label>
						<select class="form-control" id="select_skill_value" name="select_skill_value" style="width: 100%;">
							<option></option>
						</select>
					</div>
					<div class="form-group">
						<label for="select_leader_value">Leader</label>
						<select class="form-control" id="select_leader_value" name="select_leader_value" style="width: 100%;">
							<option></option>
						</select>
					</div>
					{{-- <div class="form-group">
																<label for="input_call_status">Leader</label>
																<input type="text" class="form-control" id="input_call_status" name="input_call_status" placeholder="Enter Call Status">
															</div> --}}
					<div class="form-group">
						<label for="input_status_1">Enable this?</label>
						<select class="form-control" id="input_status_1" name="input_status" style="width: 100%;">
							<option></option>
						</select>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success" form="formForUser">Save</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="modalForUploadUser" tabindex="-1" role="dialog" aria-labelledby="modalForUploadUserLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="modalForUploadUserLabel">Form Upload User</h4>
			</div>
			<div class="modal-body">
				<form id="formForUploadUsers" method="post" action="/admin/console/import_users" enctype="multipart/form-data">
					{{-- csrf_field() --}}
					@csrf
					<div class="form-group">
						<label for="file"></label>
						<input type="file" name="file" id="file" required="required" accept="application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success" form="formForUploadUsers">Submit</button>
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
			dropdownParent: $("#modalForUser")
		});
		// Role Select2
		$.ajax({
			type:"post",
			url:'/admin/console/get_role_list_options',
	       //data: {},
	       success: function(data){

	       	var list_options = [];
	       	for (var i = 0; i < data.length; i++) {
	       		option = {id: data[i]['id'], text: data[i]['value_role']};
	       		list_options.push(option);
	       	}
	        //$('#select_role_value').html(ahtml);
	        $("#select_role_value").select2({
	        	dropdownParent: $("#modalForUser")
	        	, data: list_options
	        });
	    },
	    error : function(data) {
	    }
		}).done(function(){

		});
		// Skill Select2
		$.ajax({
			type:"post",
			url:'/admin/console/get_skill_list_options',
	       //data: {},
	       success: function(data){

	       	var list_options = [];
	       	for (var i = 0; i < data.length; i++) {
	       		option = {id: data[i]['skill_desc'], text: data[i]['skill_desc']};
	       		list_options.push(option);
	       	}
	        //$('#select_role_value').html(ahtml);
	        $("#select_skill_value").select2({
	        	dropdownParent: $("#modalForUser")
	        	, data: list_options
	        });
	    },
	    error : function(data) {
	    }
		}).done(function(){

		});
		// Leader Select2
		$.ajax({
			type:"post",
			url:'/admin/console/get_leader_list_options',
	       //data: {},
	       success: function(data){

	       	var list_options = [];
	       	for (var i = 0; i < data.length; i++) {
	       		option = {id: data[i]['username'], text: data[i]['name']};
	       		list_options.push(option);
	       	}
	        //$('#select_role_value').html(ahtml);
	        $("#select_leader_value").select2({
	        	dropdownParent: $("#modalForUser")
	        	, data: list_options
	        });
	    },
	    error : function(data) {
	    }
		}).done(function(){

		});

		@if(Session::has('sukses'))
		notificationScript("success", "Success", "Successfully save data.");
		@endif

	});
	var oTable = $('#console_users').DataTable({
		pageLength: 10,
		ordering: false,
		//scrollY: '364px',
		searching: true,
		processing: true,
		serverSide: true,
		ajax: {
			url: 'get_users_list',
			/*data: function(data) {
			},*/
		},
		columns: [
		{ data: 'i', name: 'i' }
		, { data: 'name', name: 'name' }
		, { data: 'username', name: 'username' }
		, { data: 'level', name: 'level' }
		, { data: 'skill', name: 'skill' }
		, { data: 'leader', name: 'leader' } 
		, { data: 'status', name: 'status' }
		{{-- , { data: 'updated_at', name: 'updated_at' } --}}
		, { data: 'action', name: 'action' }
		],
		language: {
			processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '
		},
		dom: 
		"<'row'<'col-md-2'l><'col-md-4 col-md-offset-6'f>>trip",
	});
	
    // Clear input
    function clear_input() {
    	$('input').val('');
    	$('form select').val([]).trigger('change');
    }
	function resetSearch() {
		clear_input()
		oTable
		.search( '' )
		.columns().search( '' )
		.draw();
	}
	function refreshTable() {
		resetSearch();
		oTable.ajax.reload(null, false);
	}
    // Setiap kali close Modal, cek ada inputt Hidden ga
    $('#modalForUser').on('hidden.bs.modal', function () {
    	var element = $(this).find('form input[name = "id"]')
    	element.remove()
    	clear_input();
    });
    // Form Submit
    $('#formForUser').on('submit', function(e){
        e.preventDefault();
        $.ajax({
	       type:"post",
	       url:'/admin/console/save_user',
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
	     	refreshTable();
	     	$('#modalForUser').modal('hide');
	     });

    });
    {{-- Modify Caller --}}
	function modifyUser(id_value) {
		$.ajax({
	       type:"post",
	       url:'/admin/console/get_users_list',
	       data: {id: id_value},
	       success: function(data){
	       	for (var i = 0; i < data.length; i++) {
	       		// {{-- Append Hidden Input to Form --}}
	       		var form = document.getElementById("formForUser")
	       		var hiddenInput = document.createElement("input");
	       		hiddenInput.value= data[i]['id'];
	       		hiddenInput.name="id";
	       		hiddenInput.type="hidden";
	       		form.appendChild(hiddenInput);
	       		// Masang value ke masing-masing input pada form
	       		form.elements["input_name"].value = data[i]['name']
	       		form.elements["input_username"].value = data[i]['username']
	       		form.elements["select_role_value"].value = data[i]['level']
	       		form.elements["select_role_value"].dispatchEvent(new Event('change'));
	       		form.elements["select_skill_value"].value = data[i]['skill']
	       		form.elements["select_skill_value"].dispatchEvent(new Event('change'));
	       		form.elements["select_leader_value"].value = data[i]['leader']
	       		form.elements["select_leader_value"].dispatchEvent(new Event('change'));
	       		form.elements["input_status"].value = data[i]['is_enabled']
	       		form.elements["input_status"].dispatchEvent(new Event('change'));
	       	}
	       },
	        error : function(data) {
	        }
	     }).done(function(){
			
	     });
		$('#modalForUser').modal('show');
	}
	
</script>
@endsection