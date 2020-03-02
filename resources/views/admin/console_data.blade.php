@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="row mailbox-header">
        <div class="col-md-8">
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
            {{ isset($datas['dapros_information']) ? 'value='.$datas['dapros_information']->id : '' }}>
          @error('dapros_id')
          <p class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert"
              aria-label="Close"><span aria-hidden="true">×</span></button>{{ 'Please fetch data first!' }}</p>
          @enderror
          {{-- @if ($datas['data_is_return'])
          <input type="hidden" name="data_is_return" value="1">
          @endif --}}
      <div class="panel panel-white">
        <div class="panel-body">
          <div class="weather-widget">
            <div class="row">
              <div class="col-md-3">
                  <legend>Cust Info</legend>
                  <ul class="list-unstyled weather-info">
                    <li>MSISDN MASK <span class="pull-right"><b id="msisdn_mask">{{ isset($datas['dapros_information']) ? $datas['dapros_information']->MSISDN_MASK : '' }}</b></span></li>
                    <li>NAME MASK <span class="pull-right"><b id="name_mask">{{ isset($datas['dapros_information']) ? $datas['dapros_information']->NAME_MASK : '' }}</b></span></li>
                    <li>KABUPATEN <span class="pull-right"><b id="kabupaten">{{ isset($datas['dapros_information']) ? $datas['dapros_information']->KABUPATEN : '' }}</b></span></li>
                    <li>LONGITUDE <span class="pull-right"><b id="longitude">{{ isset($datas['dapros_information']) ? $datas['dapros_information']->LONGITUDE : '' }}</b></span></li>
                    <li>LATITUDE <span class="pull-right"><b id="latitude">{{ isset($datas['dapros_information']) ? $datas['dapros_information']->LATITUDE : '' }}</b></span></li>
                    <li>ODP1 <span class="pull-right"><b id="odp1">{{ isset($datas['dapros_information']) ? $datas['dapros_information']->ODP1 : '' }}</b></span></li>
                    <li>ODP2 <span class="pull-right"><b id="odp2">{{ isset($datas['dapros_information']) ? $datas['dapros_information']->ODP2 : '' }}</b></span></li>
                    <li>ODP3 <span class="pull-right"><b id="odp3">{{ isset($datas['dapros_information']) ? $datas['dapros_information']->ODP3 : '' }}</b></span></li>
                  </ul>
                </div>
              <div class="col-md-7">
                  <legend>Cust Interaction</legend>
                  <div class="row">
                    <div class="col-lg-6">
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
                    <div class="col-lg-6">
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
                  </div>

              </div>
              <div class="col-md-2">
                <legend>Tapping Form</legend>
                <form action="/qco/save" method="POST" id="formTapping" class="form-horizontal">
                  @csrf
                  <input type="hidden" class="@error('dapros_id') is-invalid @enderror" name="dapros_id" id="dapros_id"
                    {{ isset($datas['dapros_information']) ? 'value='.$datas['dapros_information']->id : '' }}>
                  @error('dapros_id')
                  <p class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert"
                      aria-label="Close"><span aria-hidden="true">×</span></button>{{ 'Please fetch data first!' }}</p>
                  @enderror
                  {{-- @if ($datas['data_is_return'])
                  <input type="hidden" name="data_is_return" value="1">
                  @endif --}}
                <div class="form-group">
                    <label for="Information">Tapping Information</label>
                    <textarea class="form-control  @error('information') is-invalid @enderror" name="information"
                      id="t_information" rows="12" style="resize: none;" required="required" autocomplete="off"></textarea>
                    @error('information')
                    <p class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert"
                        aria-label="Close"><span aria-hidden="true">×</span></button>{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="Information">Tapping Status</label>
                    <select class="form-control  @error('status_tapping') is-invalid @enderror" name="status_tapping"
                      id="status_tapping" tabindex="-1" required="required" style="width:100%;">
                    </select>

                    @error('status_tapping')
                    <p class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert"
                        aria-label="Close"><span aria-hidden="true">×</span></button>{{ $message }}</p>
                    @enderror
                </div>
                </form>
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
