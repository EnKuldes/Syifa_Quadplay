@extends('layouts.app')

@section('content')
<div class="panel panel-white">
	<div class="panel-heading">
		<h3 class="panel-title">Console Data</h3>
		<div class="panel-control">
			<button type="button" class="btn btn-danger" id="resetBtn" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing">Reset <i class="fa fa-refresh"></i></button>
			<button type="submit" class="btn btn-success" id="saveBtn" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing">Save <i class="fa fa-save"></i></button>
		</div>
	</div>
	<div class="panel-body">
		<div class="row clearfix">
			<div class="col-md-6">
				<div class="col-sm-12 col-md-12">
					<div class="row hidden-div">
						<div class="col-sm-3">BRAND</div>
						<div class="col-sm-1"> : </div>
						<div class="" id="brand">
							{{ isset($datas['dapros_information']) ? $datas['dapros_information']->BRAND : '' }}
						</div>
					</div>
					<div class="row hidden-div">
						<div class="col-sm-3">ROW_NUM</div>
						<div class="col-sm-1"> : </div>
						<div class="" id="row_num">
							{{ isset($datas['dapros_information']) ? $datas['dapros_information']->ROW_NUM : '' }}
						</div>
					</div>
					<div class="row">
						<div class="col-sm-3">MSISDN_MASK</div>
						<div class="col-sm-1"> : </div>
						<div class="" id="msisdn_mask">
							{{ isset($datas['dapros_information']) ? $datas['dapros_information']->MSISDN_MASK : '' }}
						</div>
					</div>
					<div class="row hidden-div">
						<div class="col-sm-3">MSISDN</div>
						<div class="col-sm-1"> : </div>
						<div class="" id="msisdn">
							{{ isset($datas['dapros_information']) ? $datas['dapros_information']->MSISDN : '' }}
						</div>
					</div>
					<div class="row">
						<div class="col-sm-3">NAME_MASK</div>
						<div class="col-sm-1"> : </div>
						<div class="" id="name_mask">
							{{ isset($datas['dapros_information']) ? $datas['dapros_information']->NAME_MASK : '' }}
						</div>
					</div>
					<div class="row hidden-div">
						<div class="col-sm-3">CUSTOMER_SUBTYPE</div>
						<div class="col-sm-1"> : </div>
						<div class="" id="customer_subtype">
							{{ isset($datas['dapros_information']) ? $datas['dapros_information']->CUSTOMER_SUBTYPE : '' }}
						</div>
					</div>
					<div class="row hidden-div">
						<div class="col-sm-3">TOT_BILL_AMOUNT</div>
						<div class="col-sm-1"> : </div>
						<div class="" id="tot_bill_amount">
							{{ isset($datas['dapros_information']) ? $datas['dapros_information']->TOT_BILL_AMOUNT : '' }}
						</div>
					</div>
					<div class="row hidden-div">
						<div class="col-sm-3">TOTAL_REVENUE</div>
						<div class="col-sm-1"> : </div>
						<div class="" id="total_revenue">
							{{ isset($datas['dapros_information']) ? $datas['dapros_information']->TOTAL_REVENUE : '' }}
						</div>
					</div>
					<div class="row hidden-div">
						<div class="col-sm-3">DEVICE_TYPE</div>
						<div class="col-sm-1"> : </div>
						<div class="" id="device_type">
							{{ isset($datas['dapros_information']) ? $datas['dapros_information']->DEVICE_TYPE : '' }}
						</div>
					</div>
					<div class="row hidden-div">
						<div class="col-sm-3">VOL_BROADBAND</div>
						<div class="col-sm-1"> : </div>
						<div class="" id="vol_broadband">
							{{ isset($datas['dapros_information']) ? $datas['dapros_information']->VOL_BROADBAND : '' }}
						</div>
					</div>
					<div class="row hidden-div">
						<div class="col-sm-3">VOL_BROADBAND_PACKAGE</div>
						<div class="col-sm-1"> : </div>
						<div class="" id="vol_broadband_package">
							{{ isset($datas['dapros_information']) ? $datas['dapros_information']->VOL_BROADBAND_PACKAGE : '' }}
						</div>
					</div>
					<div class="row hidden-div">
						<div class="col-sm-3">CI</div>
						<div class="col-sm-1"> : </div>
						<div class="" id="ci">
							{{ isset($datas['dapros_information']) ? $datas['dapros_information']->CI : '' }}
						</div>
					</div>
					<div class="row">
						<div class="col-sm-3">KABUPATEN</div>
						<div class="col-sm-1"> : </div>
						<div class="" id="kabupaten">
							{{ isset($datas['dapros_information']) ? $datas['dapros_information']->KABUPATEN : '' }}
						</div>
					</div>
					<div class="row">
						<div class="col-sm-3">LONGITUDE</div>
						<div class="col-sm-1"> : </div>
						<div class="" id="longitude">
							{{ isset($datas['dapros_information']) ? $datas['dapros_information']->LONGITUDE : '' }}
						</div>
					</div>
					<div class="row">
						<div class="col-sm-3">LATITUDE</div>
						<div class="col-sm-1"> : </div>
						<div class="" id="latitude">
							{{ isset($datas['dapros_information']) ? $datas['dapros_information']->LATITUDE : '' }}
						</div>
					</div>
					<div class="row">
						<div class="col-sm-3">ODP1</div>
						<div class="col-sm-1"> : </div>
						<div class="" id="odp1">
							{{ isset($datas['dapros_information']) ? $datas['dapros_information']->ODP1 : '' }}
						</div>
					</div>
					<div class="row">
						<div class="col-sm-3">ODP2</div>
						<div class="col-sm-1"> : </div>
						<div class="" id="odp2">
							{{ isset($datas['dapros_information']) ? $datas['dapros_information']->ODP2 : '' }}
						</div>
					</div>
					<div class="row">
						<div class="col-sm-3">ODP3</div>
						<div class="col-sm-1"> : </div>
						<div class="" id="odp3">
							{{ isset($datas['dapros_information']) ? $datas['dapros_information']->ODP3 : '' }}
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<form class="form-horizontal">
					@csrf
					<input type="hidden" class="@error('id') is-invalid @enderror" name="id" id="id">
					@error('id')
					<p class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>{{ 'Please fetch data first!' }}</p>
					@enderror
					<div class="form-group">
						<label for="status_call" class="col-sm-3 control-label">Status Call</label>
						<div class="col-sm-9">
							<select class="form-control @error('status_call') is-invalid @enderror" name="status_call" id="status_call" tabindex="-1" required="required" style="width:100%;">
							</select>

							@error('status_call')
							<p class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>{{ $message }}</p>
							@enderror
						</div>
					</div>
					<div class="form-group">
						<label for="status_detail" class="col-sm-3 control-label">Status Detail</label>
						<div class="col-sm-9">
							<select class="form-control  @error('status_detail') is-invalid @enderror" name="status_detail" id="status_detail" tabindex="-1" required="required" style="width:100%;">
							</select>

							@error('status_detail')
							<p class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>{{ $message }}</p>
							@enderror
						</div>
					</div>
					<div class="form-group">
						<label for="status_detail_reason" class="col-sm-3 control-label">Detail Reason</label>
						<div class="col-sm-9">
							<select class="form-control  @error('status_detail_reason') is-invalid @enderror" name="status_detail_reason" id="status_detail_reason" tabindex="-1" required="required" style="width:100%;">
							</select>

							@error('status_detail_reason')
							<p class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>{{ $message }}</p>
							@enderror
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-sm-3 control-label">Appointment Management</label>
						<div class="col-sm-9">
							<div class="input-group m-b-sm">
								<span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
								<input type="text" class="form-control date-picker  @error('am_date') is-invalid @enderror" name="am_date" id="am_date" value="">
								<span class="input-group-addon" id="basic-addon1"><i class="fa fa-clock-o"></i></span>
								<input type="text" class="form-control time-picker  @error('am_time') is-invalid @enderror" name="am_time" id="am_time" value="" autocomplete="off">
							</div>

							@error('am_date')
							<p class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>{{ $message }}</p>
							@enderror
							@error('am_time')
							<p class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>{{ $message }}</p>
							@enderror
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-sm-3 control-label">Follow Up Call</label>
						<div class="col-sm-9">
							<div class="input-group m-b-sm">
								<span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
								<input type="text" class="form-control date-picker  @error('fu_date') is-invalid @enderror" name="fu_date" id="fu_date" autocomplete="off" value="">
								<span class="input-group-addon" id="basic-addon1"><i class="fa fa-clock-o"></i></span>
								<input type="text" class="form-control time-picker  @error('fu_time') is-invalid @enderror" name="fu_time" id="fu_time" autocomplete="off" value="">
							</div>

							@error('fu_date')
							<p class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>{{ $message }}</p>
							@enderror
							@error('fu_time')
							<p class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>{{ $message }}</p>
							@enderror
						</div>
					</div>
					<div class="form-group">
						<label for="c_information" class="col-sm-3 control-label">Information</label>
						<div class="col-sm-9">
							<textarea class="form-control  @error('c_information') is-invalid @enderror" name="c_information" id="c_information" rows="3" style="resize: none;" required="required" autocomplete="off"></textarea>
							@error('c_information')
							<p class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>{{ $message }}</p>
							@enderror
						</div>
					</div>
				</form>
			</div>
			<div class="col-md-3">
				<form class="form-horizontal">
					<div class="form-group">
						<label for="status_tapping" class="col-sm-3 control-label">Status Tapping</label>
						<div class="col-sm-9">
							<select class="form-control  @error('status_tapping') is-invalid @enderror" name="status_tapping" id="status_tapping" tabindex="-1" required="required" style="width:100%;">
							</select>

							@error('status_tapping')
							<p class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>{{ $message }}</p>
							@enderror
						</div>
					</div>
					<div class="form-group">
						<label for="t_information" class="col-sm-3 control-label">Information</label>
						<div class="col-sm-9">
							<textarea class="form-control  @error('t_information') is-invalid @enderror" name="t_information" id="t_information" rows="3" style="resize: none;" required="required" autocomplete="off"></textarea>
							@error('t_information')
							<p class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>{{ $message }}</p>
							@enderror
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script src="{{ asset('plugins/select2/js/select2.min.js') }}" defer></script>
<script src="{{ asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}" defer></script>
<script src="{{ asset('plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}" defer></script>
<script type="text/javascript">
	$('.hidden-div').hide();
	// Func Chaining
	function chain1() {
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
		$.ajax({
	       type:"post",
	       url:'/agent/status_call',
	       //data: {},
	       success: function(data){

	       	var ahtml = '<option></option>';
	       	for (var i = 0; i < data.length; i++) {
	       		ahtml+="<option value='"+data[i]['id']+"'>"+data[i]['value_call_status']+"</option>"
	       	}
	        $('#status_call').html(ahtml);
	       },
	        error : function(data) {

	        console.log("error chain1");
	        }
	     }).done(function(){
	     	$("#status_call").val('{{ isset($datas['dapros_stastics']) ? $datas['dapros_stastics']->call_status_id : '' }}').trigger('change');
	     });
	}
	function chain2(id) {
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
		$.ajax({
	       type:"post",
	       url:'/agent/status_detail_call',
	       data: {'id':id},
	       success: function(data){
	       	var ahtml = '<option></option>';
	       	for (var i = 0; i < data.length; i++) {
	       		ahtml+="<option value='"+data[i]['id']+"'>"+data[i]['value_call_status_detail']+"</option>"
	       	}
	        $('#status_detail').html(ahtml);

	       },
	        error : function(data) {

	        console.log("error chain2");

	        }
	     }).done(function(){
	     	$("#status_detail").val('{{ isset($datas['dapros_stastics']) ? $datas['dapros_stastics']->call_status_detail_id : '' }}').trigger('change');
	     });
	}
	function chain3(id) {
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
		$.ajax({
	       type:"post",
	       url:'/agent/status_detail_reason_call',
	       data: {'id':id},
	       success: function(data){
	       	var ahtml = '<option></option>';
	       	for (var i = 0; i < data.length; i++) {
	       		ahtml+="<option value='"+data[i]['id']+"'>"+data[i]['value_call_status_detail_reason']+"</option>"
	       	}
	        $('#status_detail_reason').html(ahtml);

	       },
	        error : function(data) {

	        console.log("error chain3");

	        }
	     }).done(function(){
	     	$("#status_detail_reason").val('{{ isset($datas['dapros_stastics']) ? $datas['dapros_stastics']->call_status_detail_reason_id : '' }}').trigger('change');
	     });
	}
	// Func Chaining
	function chain4() {
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
		$.ajax({
	       type:"post",
	       url:'/qco/status_tapping',
	       //data: {},
	       success: function(data){

	       	var ahtml = '<option></option>';
	       	for (var i = 0; i < data.length; i++) {
	       		ahtml+="<option value='"+data[i]['id']+"'>"+data[i]['value_tapping_status']+"</option>"
	       	}
	        $('#status_tapping').html(ahtml);
	       },
	        error : function(data) {

	        console.log("error chain1");
	        }
	     }).done(function(){
	     	$("#status_tapping").val('{{ isset($datas['dapros_stastics']) ? $datas['dapros_stastics']->tapping_status_id : '' }}').trigger('change');
	     });
	}
	// Func Chaining
	function chain5() {
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
		$.ajax({
	       type:"post",
	       url:'/agent/regional',
	       //data: {},
	       success: function(data){

	       	var ahtml = '<option></option>';
	       	for (var i = 0; i < data.length; i++) {
	       		ahtml+="<option value='"+data[i]['id']+"'>"+data[i]['regional_desc']+"</option>"
	       	}
	        $('#regional').html(ahtml);
	       },
	        error : function(data) {

	        console.log("error chain4");
	        }
	     }).done(function(){

	     });
	}
	function chain6(id) {
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
		$.ajax({
	       type:"post",
	       url:'/agent/witel',
	       data: {'id':id},
	       success: function(data){
	       	var ahtml = '<option></option>';
	       	for (var i = 0; i < data.length; i++) {
	       		ahtml+="<option value='"+data[i]['id']+"'>"+data[i]['witel_desc']+"</option>"
	       	}
	        $('#witel').html(ahtml);

	       },
	        error : function(data) {

	        console.log("error chain3");

	        }
	     }).done(function(){

	     });
	}
	function chain7() {
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
		$.ajax({
	       type:"post",
	       url:'/agent/paket',
	       data: {'skill':'Quadplay'},
	       success: function(data){

	       	var ahtml = '<option></option>';
	       	for (var i = 0; i < data.length; i++) {
	       		ahtml+="<option value='"+data[i]['id']+"'>"+data[i]['paket_desc']+"</option>"
	       	}
	        $('#paket').html(ahtml);
	       },
	        error : function(data) {

	        console.log("error chain4");
	        }
	     }).done(function(){

	     });
	}

	// Document Ready
	$(document).ready(function() {
	    $("select").select2({
			placeholder: "Please select option"
		});
	    $('.date-picker').datepicker({
	        orientation: "top auto",
	        autoclose: true,
	        format: 'yyyy-m-d'
	    });
	    $('.time-picker').timepicker({
	    	showMeridian: false
	    });
	    chain1();
	    chain4();
	    chain5();
	    chain7();
	    //$('#resetBtn').click();
	    $("#id").val('{{ isset($datas['dapros_stastics']) ? $datas['dapros_stastics']->id : '' }}');
	    
	    
	    
	    $("#am_date").val('{{ isset($datas['dapros_stastics']->call_am_datetime) ? date('Y-m-d', strtotime($datas['dapros_stastics']->call_am_datetime)) : '' }}');
	    $("#am_time").val('{{ isset($datas['dapros_stastics']->call_am_datetime) ? date('H:i:s', strtotime($datas['dapros_stastics']->call_am_datetime)) : '' }}');
	    $("#fu_date").val('{{ isset($datas['dapros_stastics']->call_fu_datetime) ? date('Y-m-d', strtotime($datas['dapros_stastics']->call_fu_datetime)) : '' }}');
	    $("#fu_time").val('{{ isset($datas['dapros_stastics']->call_fu_datetime) ? date('H:i:s', strtotime($datas['dapros_stastics']->call_fu_datetime)) : '' }}');
	    $("#c_information").val('{{ isset($datas['dapros_stastics']) ? $datas['dapros_stastics']->call_information : '' }}');
	    
	    $("#t_information").val('{{ isset($datas['dapros_stastics']) ? $datas['dapros_stastics']->tapping_information : '' }}');
	});
	// On Change Events
	$("#status_call").change(function() {
	    var id = $(this).val();
	    if (id != "" && id != null)
	    {
	      chain2(id);
	    }
	  });
	$("#status_detail").change(function() {
	    var id = $(this).val();
	    if (id != "" && id != null)
	    {
	      chain3(id);
	    }
	  });
	$("#regional").change(function() {
	    var id = $(this).val();
	    if (id != "" && id != null)
	    {
	      chain6(id);
	    }
	  });
	// Button On Click
	$('#resetBtn').click(function(){
		location.reload();
	    /*$("form").trigger("reset");
	    $("select").val('').trigger('change');
	    $("#status_detail").html('');
	    $("#status_detail_reason").html('');*/
	});
	$('#saveBtn').click(function(){
	    $(this).button('loading');
	    $.ajax({
	       type:"post",
	       url:'/admin/console/update_data',
	       data: $('form').serialize(),
	       success: function(data){
	       	if (data) {
	       		notificationScript("success", "Success!", 'Successfully saved data.');
	       		$('#saveBtn').button('reset');
	       		window.location = "/admin/report"
	       	}
	       },
	        error: function(jqXhr, json, errorThrown){// this are default for ajax errors
	        	$('#saveBtn').button('reset');
	            var errors = jqXhr.responseJSON;
	            var errorsHtml = '<div class="alert alert-danger alert-dismissible" role="alert" style="margin-bottom: 0;"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Error ' + jqXhr.status + ': ' + errorThrown + '</div>';
	            notificationScript("error", "Error " + jqXhr.status, errorThrown);
	            $.each(errors['errors'], function (index, value) {
	                errorsHtml += '<div class="alert alert-danger alert-dismissible" role="alert" style="margin-bottom: 0;><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' + value + '</div>';
	                notificationScript("error", "Error Field", value);
	            });

	        }
	     }).done(function(){
	     });
	});
</script>
@endsection