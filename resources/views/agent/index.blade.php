@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="row mailbox-header">
      <div class="col-md-1">
        <form id="get-data-form">
          @csrf
          <button type="submit" class="btn btn-success btn-block"
            data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing Order"><i
              class="fa fa-download"></i> Get Data</button>
        </form>
      </div>
      <div class="col-md-7">
      </div>
      <div class="col-md-4">
        <form action="#" method="POST">
          <div class="input-group text-right">
            <span class="input-group-btn">
              <button type="button" form="formCall" class="btn btn-danger" id="resetBtn"
                data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing">Reset <i
                  class="fa fa-refresh"></i></button>
              <button type="submit" form="formCall" class="btn btn-success" id="saveBtn"
                data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing">Save <i
                  class="fa fa-save"></i></button>
            </span>
          </div><!-- Input Group -->
        </form>
      </div>
    </div>
    <form id="formCall" method="POST" action="/agent/save">
        @csrf
        <input type="hidden" class="@error('dapros_id') is-invalid @enderror" name="dapros_id" id="dapros_id"
          {{ isset($counting['details_dapros']) ? 'value='.$counting['details_dapros']->id : '' }}>
        @error('dapros_id')
        <p class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert"
            aria-label="Close"><span aria-hidden="true">×</span></button>{{ 'Please fetch data first!' }}</p>
        @enderror
        @if ($counting['data_is_return'])
        <input type="hidden" name="data_is_return" value="1">
        @endif
    <div class="panel panel-white">
      <div class="panel-body">
        <div class="weather-widget">
          <div class="row">
            <div class="col-md-4">
                <legend>Cust Info</legend>
                <ul class="list-unstyled weather-info">
                  <li>MSISDN MASK <span class="pull-right"><b id="msisdn_mask">{{ isset($counting['details_dapros']) ? $counting['details_dapros']->MSISDN_MASK : '' }}</b></span></li>
                  <li>NAME MASK <span class="pull-right"><b id="name_mask">{{ isset($counting['details_dapros']) ? $counting['details_dapros']->NAME_MASK : '' }}</b></span></li>
                  <li>KABUPATEN <span class="pull-right"><b id="kabupaten">{{ isset($counting['details_dapros']) ? $counting['details_dapros']->KABUPATEN : '' }}</b></span></li>
                  <li>LONGITUDE <span class="pull-right"><b id="longitude">{{ isset($counting['details_dapros']) ? $counting['details_dapros']->LONGITUDE : '' }}</b></span></li>
                  <li>LATITUDE <span class="pull-right"><b id="latitude">{{ isset($counting['details_dapros']) ? $counting['details_dapros']->LATITUDE : '' }}</b></span></li>
                  <li>ODP1 <span class="pull-right"><b id="odp1">{{ isset($counting['details_dapros']) ? $counting['details_dapros']->ODP1 : '' }}</b></span></li>
                  <li>ODP2 <span class="pull-right"><b id="odp2">{{ isset($counting['details_dapros']) ? $counting['details_dapros']->ODP2 : '' }}</b></span></li>
                  <li>ODP3 <span class="pull-right"><b id="odp3">{{ isset($counting['details_dapros']) ? $counting['details_dapros']->ODP3 : '' }}</b></span></li>
                </ul>
              </div>
            <div class="col-md-4">
                <legend>Cust Interaction</legend>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-5">
                                <select class="form-control @error('status_call') is-invalid @enderror input-sm" name="status_call" data-placeholder="Status Call"
                                id="status_call" tabindex="-1" required="required" style="width:100%;">
                                </select>

                                @error('status_call')
                                <p class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert"
                                    aria-label="Close"><span aria-hidden="true">×</span></button>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-7">
                                <select class="form-control  @error('status_detail') is-invalid @enderror" name="status_detail" data-placeholder="Reason Call"
                                  id="status_detail" tabindex="-1" required="required" style="width:100%;">
                                </select>

                                @error('status_detail')
                                <p class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert"
                                    aria-label="Close"><span aria-hidden="true">×</span></button>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <select class="form-control  @error('status_detail_reason') is-invalid @enderror"
                                name="status_detail_reason" id="status_detail_reason" tabindex="-1" required="required" data-placeholder="Detail Reason Call"
                                style="width:100%;">
                                </select>

                                @error('status_detail_reason')
                                <p class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert"
                                    aria-label="Close"><span aria-hidden="true">×</span></button>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <textarea class="form-control  @error('input_k_kontak') is-invalid @enderror" name="input_k_kontak" placeholder="Insert K-Contact"
                                id="input_k_kontak" rows="2" style="resize: none;" autocomplete="off"></textarea>
                                @error('input_k_kontak')
                                <p class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert"
                                    aria-label="Close"><span aria-hidden="true">×</span></button>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control @error('input_cp_marshanda') is-invalid @enderror" placeholder="Contact Person"
                                  id="input_cp_marshanda" name="input_cp_marshanda" autocomplete="off">
                                @error('input_cp_marshanda')
                                <p class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert"
                                    aria-label="Close"><span aria-hidden="true">×</span></button>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control @error('input_an_pemasangan') is-invalid @enderror" placeholder="Atas Nama Pemasangan"
                                  id="input_an_pemasangan" name="input_an_pemasangan" autocomplete="off">
                                @error('input_an_pemasangan')
                                <p class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert"
                                    aria-label="Close"><span aria-hidden="true">×</span></button>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="input-group m-b-sm">
                                  <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                                  <input type="text" class="form-control date-picker  @error('am_date') is-invalid @enderror" placeholder="Manja Pemasangan"
                                    name="am_date" id="am_date" autocomplete="off">
                                  <span class="input-group-addon" id="basic-addon1"><i class="fa fa-clock-o"></i></span>
                                  <input type="text" class="form-control time-picker  @error('am_time') is-invalid @enderror"
                                    name="am_time" id="am_time" autocomplete="off">
                                </div>

                                @error('am_date')
                                <p class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert"
                                    aria-label="Close"><span aria-hidden="true">×</span></button>{{ $message }}</p>
                                @enderror
                                @error('am_time')
                                <p class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert"
                                    aria-label="Close"><span aria-hidden="true">×</span></button>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <textarea class="form-control  @error('input_alamat_pemasangan') is-invalid @enderror" placeholder="Alamat Pemasangan"
                                  name="input_alamat_pemasangan" id="input_alamat_pemasangan" rows="2" style="resize: none;"
                                  autocomplete="off"></textarea>
                                @error('input_alamat_pemasangan')
                                <p class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert"
                                    aria-label="Close"><span aria-hidden="true">×</span></button>{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-md-4">
                <legend>&nbsp;</legend>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group m-b-sm">
                              <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                              <input type="text" class="form-control date-picker  @error('fu_date') is-invalid @enderror" placeholder="Follow Up Date"
                                name="fu_date" id="fu_date" autocomplete="off">
                              <span class="input-group-addon" id="basic-addon1"><i class="fa fa-clock-o"></i></span>
                              <input type="text" class="form-control time-picker  @error('fu_time') is-invalid @enderror"
                                name="fu_time" id="fu_time" autocomplete="off">
                            </div>

                            @error('fu_date')
                            <p class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert"
                                aria-label="Close"><span aria-hidden="true">×</span></button>{{ $message }}</p>
                            @enderror
                            @error('fu_time')
                            <p class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert"
                                aria-label="Close"><span aria-hidden="true">×</span></button>{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <select class="form-control  @error('regional') is-invalid @enderror" name="regional" id="regional" data-placeholder="Regional"
                              tabindex="-1" style="width:100%;">
                            </select>

                            @error('regional')
                            <p class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert"
                                aria-label="Close"><span aria-hidden="true">×</span></button>{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-8">
                            <select class="form-control  @error('witel') is-invalid @enderror" name="witel" id="witel" tabindex="-1" data-placeholder="Witel"
                              style="width:100%;">
                            </select>

                            @error('witel')
                            <p class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert"
                                aria-label="Close"><span aria-hidden="true">×</span></button>{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <select class="form-control  @error('paket') is-invalid @enderror" name="paket" id="paket" tabindex="-1" data-placeholder="Paket Berlangganan"
                              style="width:100%;">
                            </select>

                            @error('paket')
                            <p class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert"
                                aria-label="Close"><span aria-hidden="true">×</span></button>{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <input type="text" class="form-control @error('input_email') is-invalid @enderror" id="input_email" placeholder="Email Pelanggan"
                              name="input_email" autocomplete="off">
                            @error('input_email')
                            <p class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert"
                                aria-label="Close"><span aria-hidden="true">×</span></button>{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <select class="form-control  @error('via_by') is-invalid @enderror" name="via_by" id="via_by" data-placeholder="Dihubungi Via"
                              tabindex="-1" style="width:100%;">
                              <option></option>
                              <option value="Telpon">Telpon</option>
                              <option value="Whatsapp">Whatsapp</option>
                              <option value="Email">Email</option>
                            </select>

                            @error('via_by')
                            <p class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert"
                                aria-label="Close"><span aria-hidden="true">×</span></button>{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Information">Information</label>
                        <textarea class="form-control  @error('information') is-invalid @enderror" name="information"
                          id="information" rows="4" style="resize: none;" required="required" autocomplete="off"></textarea>
                        @error('information')
                        <p class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert"
                            aria-label="Close"><span aria-hidden="true">×</span></button>{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="timeline-options list-unstyled weather-days text-center">
                    <a href="/agent/unconsume"><i class="icon-basket-loaded"></i> Unconsume (<span id="unconsumed_daily">{{ $counting['unconsumed_daily'] }}</span>)</a>
                    <a href="/agent/consume/all"><i class="icon-call-out"></i> Consume (<span id="consumed_daily">{{ $counting['consumed_daily'] }}</span>)</a>
                    <a href="/agent/consume/contacted"><i class="icon-user-following"></i> Contacted (<span id="c_daily">{{ $counting['c_daily'] }}</span>)</a>
                    <a href="/agent/consume/agree"><i class="icon-check"></i> Agree (<span id="agree_daily">{{ $counting['agree_daily'] }}</span>)</a>
                    <a href="/agent/consume/follow_up"><i class="icon-refresh"></i> Follow Up (<span id="fu_daily">{{ $counting['fu_daily'] }}</span>)</a>
                    <a href="/agent/consume/decline"><i class="icon-close"></i> Decline (<span id="decline_daily">{{ $counting['decline_daily'] }}</span>)</a>
                    <a href="/agent/consume/not_contacted"><i class="icon-user-unfollow"></i> Not Contacted (<span id="nc_daily">{{ $counting['nc_daily'] }}</span>)</a>
                    <a href="/agent/consume/approved"><i class="icon-like"></i> Approved (<span id="approved_daily">{{ $counting['approved_daily'] }}</span>)</a>
                    <a href="/agent/consume/return"><i class="icon-dislike"></i> Return (<span id="return_daily">{{ $counting['return_daily'] }}</span>)</a>
                    <a href="/agent/consume/returntoagree"><i class="icon-action-undo"></i><i class="icon-like"></i> Retrun to Agree (<span id="returntoagree_daily">{{ $counting['returntoagree_daily'] }}</span>)</a>
                    <a href="/agent/consume/returntodecline"><i class="icon-action-undo"></i><i class="icon-dislike"></i> Return to Decline (<span id="returntodecline_daily">{{ $counting['returntodecline_daily'] }}</span>)</a>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </form>
</div><!-- Row -->
<script src="{{ asset('plugins/select2/js/select2.min.js') }}" defer></script>
<script src="{{ asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}" defer></script>
<script src="{{ asset('plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}" defer></script>
<script type="text/javascript" defer>
  $('.hidden-div').hide();
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
		       	if (data['message'] != null && data['message'] != '') {
		       		notificationScript(data['alert-class'], data['alert-title'], data['message']);
		       	}
		       	else{
			       	var valueTitles = ['BRAND','ROW_NUM','MSISDN_MASK','MSISDN','NAME_MASK','CUSTOMER_SUBTYPE','TOT_BILL_AMOUNT','TOTAL_REVENUE','DEVICE_TYPE','VOL_BROADBAND','VOL_BROADBAND_PACKAGE','CI','KABUPATEN','LONGITUDE','LATITUDE','ODP1','ODP2','ODP3'];
			       	var labelTitles = ['brand','row_num','msisdn_mask','msisdn','name_mask','customer_subtype','tot_bill_amount','total_revenue','device_type','vol_broadband','vol_broadband_package','ci','kabupaten','longitude','latitude','odp1','odp2','odp3'];
			        for (var i = 0; i < labelTitles.length; i++) {
			          $("#" + labelTitles[i]).html(data[valueTitles[i]]);
			        }
			        $("#dapros_id").val(data['id']);
			        notificationScript("success", "Success", "Success fetching Data");
		       	}
		       	$('#get-data-form .btn').button('reset');
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
	        {{-- Jika di direct dari Recall maka redirect Workpsace --}}
	        @if ( isset($counting['details_dapros']) )
	        	window.location.replace("/agent/workspace");
	        @endif
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
	function chain4() {
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
	function chain5(id) {
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
	function chain6() {
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

	        var spanTitles = ['unconsumed_daily', 'consumed_daily', 'c_daily', 'agree_daily', 'fu_daily', 'decline_daily', 'nc_daily', 'approved_daily', 'return_daily', 'returntoagree_daily', 'returntodecline_daily'];
	        var valueTitles = ['unconsumed_daily', 'consumed_daily', 'c_daily', 'agree_daily', 'fu_daily', 'decline_daily', 'nc_daily', 'approved_daily', 'return_daily', 'returntoagree_daily', 'returntodecline_daily'];;
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
	    chain4();
	    chain6();
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
	$("#regional").change(function() {
	    var id = $(this).val();
	    if (id != "" && id != null)
	    {
	      chain5(id);
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
