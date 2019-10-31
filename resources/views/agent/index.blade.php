@extends('layouts.app')

@section('content')
<div class="row m-t-md">
    <div class="col-md-12">
        <div class="row mailbox-header">
            <div class="col-md-2">
                <form id="get-data-form">
		        	@csrf
		        	<button type="submit" class="btn btn-success btn-block" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing Order"><i class="fa fa-random"></i> Fetch Data</button>
		        </form>
            </div>
            <div class="col-md-6">
                <h2>Data Call</h2>
            </div>
            <div class="col-md-4">
                <form action="#" method="POST">
                    <div class="input-group text-right">
                    	<span class="input-group-btn">
                            <button type="button" form="formCall" class="btn btn-danger" id="resetBtn" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing">Reset <i class="fa fa-refresh"></i></button>
                        	<button type="submit" form="formCall" class="btn btn-success" id="saveBtn" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing">Save <i class="fa fa-save"></i></button>
                        </span>
                    </div><!-- Input Group -->
                </form>
           </div>
        </div>
    </div>
    <div class="col-md-2">
        <ul class="list-unstyled mailbox-nav">
            <li><a href="/agent/consume/all"><i class="fa fa-inbox"></i>Consumed <span class="badge badge-success pull-right" id="consumed_daily">{{ $counting['consumed_daily'] }}</span></a></li>
            <li><a href="/agent/consume/contacted"><i class="fa fa-bullhorn"></i>Contacted <span class="badge badge-success pull-right" id="consumed_daily">{{ $counting['contacted_daily'] }}</span></a></li>
            <li style="margin-left:15px;"><a href="/agent/consume/agree"><i class="fa fa-check"></i>Agree <span class="badge badge-success pull-right" id="agree_daily">{{ $counting['agree_daily'] }}</span></a></li>
            <li style="margin-left:15px;"><a href="/agent/consume/follow_up"><i class="fa fa-refresh"></i>Follow Up <span class="badge badge-success pull-right" id="fu_daily">{{ $counting['fu_daily'] }}</span></a></li>
            <li style="margin-left:15px;"><a href="/agent/consume/decline"><i class="fa fa-user-times"></i>Decline <span class="badge badge-success pull-right" id="decline_daily">{{ $counting['decline_daily'] }}</span></a></li>
            <li><a href="/agent/consume/not_contacted"><i class="fa fa-exclamation-circle"></i>Not Contacted <span class="badge badge-success pull-right" id="nc_daily">{{ $counting['nc_daily'] }}</span></a></li>
            <li><a href="/agent/consume/return"><i class="fa fa-sign-in"></i>Return <span class="badge badge-success pull-right" id="return_daily">{{ $counting['return_daily'] }}</span></a></li>
            <li style="margin-left:15px;"><a href="/agent/consume/returntoagree"><i class="fa fa-sign-in"></i><i class="fa fa-check"></i>Retrun to Agree <span class="badge badge-success pull-right" id="agree_daily">{{ $counting['returntoagree_daily'] }}</span></a></li>
            <li style="margin-left:15px;"><a href="/agent/consume/returntodecline"><i class="fa fa-sign-in"></i><i class="fa fa-user-times"></i>Return to Decline <span class="badge badge-success pull-right" id="decline_daily">{{ $counting['returntodecline_daily'] }}</span></a></li>
        </ul>
    </div>
    <div class="col-md-10">
        <div class="panel panel-white">
        	<div class="panel-heading clearfix">
        		<div class="col-md-8">
        			<h4 class="panel-title">Customer Information</h4>
        		</div>
        		<div class="col-md-4">
        			<h4 class="panel-title">Form Call</h4>
        		</div>
            </div>
            <div class="panel-body mailbox-content">
		    	<div class="col-md-8">
		    		<div class="col-sm-12 col-md-12">
		        		<div class="row">
		        			<div class="col-sm-3">BRAND</div>
		        			<div class="col-sm-1"> : </div>
		        			<div class="" id="brand">
		        				{{ isset($counting['details_dapros']) ? $counting['details_dapros']->BRAND : '' }}
		        			</div>
		    			</div>
		    			<div class="row">
		        			<div class="col-sm-3">ROW_NUM</div>
		        			<div class="col-sm-1"> : </div>
		        			<div class="" id="row_num">
		        				{{ isset($counting['details_dapros']) ? $counting['details_dapros']->ROW_NUM : '' }}
		        			</div>
		    			</div>
		    			<div class="row">
		        			<div class="col-sm-3">MSISDN_MASK</div>
		        			<div class="col-sm-1"> : </div>
		        			<div class="" id="msisdn_mask">
		        				{{ isset($counting['details_dapros']) ? $counting['details_dapros']->MSISDN_MASK : '' }}
		        			</div>
		    			</div>
		    			<div class="row">
		        			<div class="col-sm-3">MSISDN</div>
		        			<div class="col-sm-1"> : </div>
		        			<div class="" id="msisdn">
		        				{{ isset($counting['details_dapros']) ? $counting['details_dapros']->MSISDN : '' }}
		        			</div>
		    			</div>
		    			<div class="row">
		        			<div class="col-sm-3">NAME_MASK</div>
		        			<div class="col-sm-1"> : </div>
		        			<div class="" id="name_mask">
		        				{{ isset($counting['details_dapros']) ? $counting['details_dapros']->NAME_MASK : '' }}
		        			</div>
		    			</div>
		    			<div class="row">
		        			<div class="col-sm-3">CUSTOMER_SUBTYPE</div>
		        			<div class="col-sm-1"> : </div>
		        			<div class="" id="customer_subtype">
		        				{{ isset($counting['details_dapros']) ? $counting['details_dapros']->CUSTOMER_SUBTYPE : '' }}
		        			</div>
		    			</div>
		    			<div class="row">
		        			<div class="col-sm-3">TOT_BILL_AMOUNT</div>
		        			<div class="col-sm-1"> : </div>
		        			<div class="" id="tot_bill_amount">
		        				{{ isset($counting['details_dapros']) ? $counting['details_dapros']->TOT_BILL_AMOUNT : '' }}
		        			</div>
		    			</div>
		    			<div class="row">
		        			<div class="col-sm-3">TOTAL_REVENUE</div>
		        			<div class="col-sm-1"> : </div>
		        			<div class="" id="total_revenue">
		        				{{ isset($counting['details_dapros']) ? $counting['details_dapros']->TOTAL_REVENUE : '' }}
		        			</div>
		    			</div>
		    			<div class="row">
		        			<div class="col-sm-3">DEVICE_TYPE</div>
		        			<div class="col-sm-1"> : </div>
		        			<div class="" id="device_type">
		        				{{ isset($counting['details_dapros']) ? $counting['details_dapros']->DEVICE_TYPE : '' }}
		        			</div>
		    			</div>
		    			<div class="row">
		        			<div class="col-sm-3">VOL_BROADBAND</div>
		        			<div class="col-sm-1"> : </div>
		        			<div class="" id="vol_broadband">
		        				{{ isset($counting['details_dapros']) ? $counting['details_dapros']->VOL_BROADBAND : '' }}
		        			</div>
		    			</div>
		    			<div class="row">
		        			<div class="col-sm-3">VOL_BROADBAND_PACKAGE</div>
		        			<div class="col-sm-1"> : </div>
		        			<div class="" id="vol_broadband_package">
		        				{{ isset($counting['details_dapros']) ? $counting['details_dapros']->VOL_BROADBAND_PACKAGE : '' }}
		        			</div>
		    			</div>
		    			<div class="row">
		        			<div class="col-sm-3">CI</div>
		        			<div class="col-sm-1"> : </div>
		        			<div class="" id="ci">
		        				{{ isset($counting['details_dapros']) ? $counting['details_dapros']->CI : '' }}
		        			</div>
		    			</div>
		    			<div class="row">
		        			<div class="col-sm-3">KABUPATEN</div>
		        			<div class="col-sm-1"> : </div>
		        			<div class="" id="kabupaten">
		        				{{ isset($counting['details_dapros']) ? $counting['details_dapros']->KABUPATEN : '' }}
		        			</div>
		    			</div>
		    			<div class="row">
		        			<div class="col-sm-3">LONGITUDE</div>
		        			<div class="col-sm-1"> : </div>
		        			<div class="" id="longitude">
		        				{{ isset($counting['details_dapros']) ? $counting['details_dapros']->LONGITUDE : '' }}
		        			</div>
		    			</div>
		    			<div class="row">
		        			<div class="col-sm-3">LATITUDE</div>
		        			<div class="col-sm-1"> : </div>
		        			<div class="" id="latitude">
		        				{{ isset($counting['details_dapros']) ? $counting['details_dapros']->LATITUDE : '' }}
		        			</div>
		    			</div>
		    			<div class="row">
		        			<div class="col-sm-3">ODP1</div>
		        			<div class="col-sm-1"> : </div>
		        			<div class="" id="odp1">
		        				{{ isset($counting['details_dapros']) ? $counting['details_dapros']->ODP1 : '' }}
		        			</div>
		    			</div>
		    			<div class="row">
		        			<div class="col-sm-3">ODP2</div>
		        			<div class="col-sm-1"> : </div>
		        			<div class="" id="odp2">
		        				{{ isset($counting['details_dapros']) ? $counting['details_dapros']->ODP2 : '' }}
		        			</div>
		    			</div>
		    			<div class="row">
		        			<div class="col-sm-3">ODP3</div>
		        			<div class="col-sm-1"> : </div>
		        			<div class="" id="odp3">
		        				{{ isset($counting['details_dapros']) ? $counting['details_dapros']->ODP3 : '' }}
		        			</div>
		    			</div>
		        	</div>
		    	</div>
		    	<div class="col-md-4">
		    		<form class="form-horizontal" id="formCall" method="POST" action="/agent/save">
		    			@csrf
		    			<input type="hidden" class="@error('dapros_id') is-invalid @enderror" name="dapros_id" id="dapros_id" {{ isset($counting['details_dapros']) ? 'value='.$counting['details_dapros']->id : '' }}>
		    			@error('dapros_id')
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
	                            	<input type="text" class="form-control date-picker  @error('am_date') is-invalid @enderror" name="am_date" id="am_date">
	                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-clock-o"></i></span>
	                                <input type="text" class="form-control time-picker  @error('am_time') is-invalid @enderror" name="am_time" id="am_time" autocomplete="off">
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
	                            	<input type="text" class="form-control date-picker  @error('fu_date') is-invalid @enderror" name="fu_date" id="fu_date" autocomplete="off">
	                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-clock-o"></i></span>
	                                <input type="text" class="form-control time-picker  @error('fu_time') is-invalid @enderror" name="fu_time" id="fu_time" autocomplete="off">
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
                        	<label for="information" class="col-sm-3 control-label">Information</label>
                        	<div class="col-sm-9">
                        		<textarea class="form-control  @error('information') is-invalid @enderror" name="information" id="information" rows="3" style="resize: none;" required="required" autocomplete="off"></textarea>
                        		@error('information')
                                	<p class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>{{ $message }}</p>
                                @enderror
	                        </div>
                        </div>
                    </form>
		    	</div>
            </div>
        </div>
    </div>
</div><!-- Row -->
<script src="{{ asset('plugins/select2/js/select2.min.js') }}" defer></script>
<script src="{{ asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}" defer></script>
<script src="{{ asset('plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}" defer></script>
<script type="text/javascript" defer>
	$('#get-data-form').on('submit', function(e){
        e.preventDefault();

        if ( $("#dapros_id").val() != '' ) {
        	notificationScript("warning", "Warning", "You still have data to call first!");
        }
        else{
        	$('#get-data-form .btn').button('loading');
	        $.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});
	        $.ajax({
		       type:"post",
		       url:'/agent/data',
		       //data: $( this ).serialize(),
		       success: function(data){
		       	var valueTitles = ['BRAND','ROW_NUM','MSISDN_MASK','MSISDN','NAME_MASK','CUSTOMER_SUBTYPE','TOT_BILL_AMOUNT','TOTAL_REVENUE','DEVICE_TYPE','VOL_BROADBAND','VOL_BROADBAND_PACKAGE','CI','KABUPATEN','LONGITUDE','LATITUDE','ODP1','ODP2','ODP3'];
		       	var labelTitles = ['brand','row_num','msisdn_mask','msisdn','name_mask','customer_subtype','tot_bill_amount','total_revenue','device_type','vol_broadband','vol_broadband_package','ci','kabupaten','longitude','latitude','odp1','odp2','odp3'];
		        for (var i = 0; i < labelTitles.length; i++) {
		          $("#" + labelTitles[i]).html(data[valueTitles[i]]);
		        }
		        $("#dapros_id").val(data['id']);
		        $('#get-data-form .btn').button('reset');
		        notificationScript("success", "Success", "Success fetching Data");
		        $('#resetBtn').click();
		       },
		        error: function(jqXhr, json, errorThrown){// this are default for ajax errors
				$('#get-data-form .btn').button('reset');
				//notificationScript("error", "Error", "Error while trying fetching data.");
				var errors = jqXhr.responseJSON;
				var errorsHtml = '<div class="alert alert-danger alert-dismissible" role="alert" style="margin-bottom: 0;"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Error ' + jqXhr.status + ': ' + errorThrown + '</div>';
				notificationScript("error", "Error " + jqXhr.status, errorThrown);
				$.each(errors['errors'], function (index, value) {
				    errorsHtml += '<div class="alert alert-danger alert-dismissible" role="alert" style="margin-bottom: 0;><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' + value + '</div>';
				    notificationScript("error", "Error Field", value);
				});
		        }
		     }).done(function(data){
		     	//
		     });
        }

    });
    $('#formCall').on('submit', function(e){
        e.preventDefault();
        $('#saveBtn').button('loading');
        $.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
        $.ajax({
	       type:"post",
	       url:'/agent/save',
	       data: $( this ).serialize(),
	       success: function(data){
	        $('#saveBtn').button('reset');
	        notificationScript("success", "Success", "Successfully submit form.");
	        $('#resetBtn').click();
	        var labelTitles = ['brand','row_num','msisdn_mask','msisdn','name_mask','customer_subtype','tot_bill_amount','total_revenue','device_type','vol_broadband','vol_broadband_package','ci','kabupaten','longitude','latitude','odp1','odp2','odp3'];
	        for (var i = 0; i < labelTitles.length; i++) {
	          $("#" + labelTitles[i]).html('');
	        }
	        $("#dapros_id").removeAttr('value');
	        activity();
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

	     });
	}

	// Func Counting
	function activity() {
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
        $.ajax({
	       type:"post",
	       url:'/agent/activity',
	       //data: $( this ).serialize(),
	       success: function(data){
	        /*$('#saveBtn').button('reset');
	        notificationScript("success", "Success", "Successfully submit form.");
	        $('#resetBtn').click();
	        var labelTitles = ['brand','row_num','msisdn_mask','msisdn','name_mask','customer_subtype','tot_bill_amount','total_revenue','device_type','vol_broadband','vol_broadband_package','ci','kabupaten','longitude','latitude','odp1','odp2','odp3'];
	        for (var i = 0; i < labelTitles.length; i++) {
	          $("#" + labelTitles[i]).html('');
	        }
	        $("#dapros_id").removeAttr('value');*/

	        var spanTitles = ['consumed_daily', 'agree_daily', 'fu_daily', 'decline_daily', 'nc_daily', 'return_daily'];
	        var valueTitles = ['consumed_daily', 'agree_daily', 'fu_daily', 'decline_daily', 'nc_daily', 'return_daily'];
	        for (var i = 0; i < spanTitles.length; i++) {
	          $("#" + spanTitles[i]).html(data[valueTitles[i]]);
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
	    $('#resetBtn').click();
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
	// Button On Click
	$('#resetBtn').click(function(){
	    $("#formCall").trigger("reset");
	    $("select").val('').trigger('change');
	    $("#status_detail").html('');
	    $("#status_detail_reason").html('');
	});

</script>
@endsection
