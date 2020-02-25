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
                            <button type="button" form="formTapping" class="btn btn-danger" id="resetBtn" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing">Reset <i class="fa fa-refresh"></i></button>
                        	<button type="submit" form="formTapping" class="btn btn-success" id="saveBtn" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing">Save <i class="fa fa-save"></i></button>
                        </span>
                    </div><!-- Input Group -->
                </form>
           </div>
        </div>
    </div>
    <div class="col-md-2">
        <ul class="list-unstyled mailbox-nav">
        	<li><a href="/qco/unconsume"><i class="fa fa-sign-in"></i>Unconsume <span class="badge badge-success pull-right" id="unconsume_daily">{{ $counting['unconsume_daily'] }}</span></a></li>
            <li><a href="/qco/consume/approved"><i class="fa fa-sign-in"></i>Approved <span class="badge badge-success pull-right" id="approved_daily">{{ $counting['approved_daily'] }}</span></a></li>
            <li><a href="/qco/consume/return"><i class="fa fa-sign-in"></i>Return <span class="badge badge-success pull-right" id="return_daily">{{ $counting['return_daily'] }}</span></a></li>
            <li style="margin-left:15px;"><a href="/qco/consume/returntoagree"><i class="fa fa-sign-in"></i><i class="fa fa-check"></i>Retrun to Agree <span class="badge badge-success pull-right" id="returntoagree_daily">{{ $counting['returntoagree_daily'] }}</span></a></li>
            <li style="margin-left:15px;"><a href="/qco/consume/returntodecline"><i class="fa fa-sign-in"></i><i class="fa fa-user-times"></i>Return to Decline <span class="badge badge-success pull-right" id="returntodecline_daily">{{ $counting['returntodecline_daily'] }}</span></a></li>
        </ul>
    </div>
    <div class="col-md-10">
        <div class="panel panel-white">
            <div class="panel-body mailbox-content">
		    	<div class="col-md-4">
		    		<div class="col-md-12">
		    			<h4 class="panel-title">Customer Information</h4>
		    		</div>
		    		<div class="col-sm-12 col-md-12">
		        		<div class="row hidden-div">
		        			<div class="col-sm-3">BRAND</div>
		        			<div class="col-sm-1"> : </div>
		        			<div class="" id="brand">
		        				{{ isset($counting['details_dapros']) ? $counting['details_dapros']->BRAND : '' }}
		        			</div>
		    			</div>
		    			<div class="row hidden-div">
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
		    			<div class="row hidden-div">
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
		    			<div class="row hidden-div">
		        			<div class="col-sm-3">CUSTOMER_SUBTYPE</div>
		        			<div class="col-sm-1"> : </div>
		        			<div class="" id="customer_subtype">
		        				{{ isset($counting['details_dapros']) ? $counting['details_dapros']->CUSTOMER_SUBTYPE : '' }}
		        			</div>
		    			</div>
		    			<div class="row hidden-div">
		        			<div class="col-sm-3">TOT_BILL_AMOUNT</div>
		        			<div class="col-sm-1"> : </div>
		        			<div class="" id="tot_bill_amount">
		        				{{ isset($counting['details_dapros']) ? $counting['details_dapros']->TOT_BILL_AMOUNT : '' }}
		        			</div>
		    			</div>
		    			<div class="row hidden-div">
		        			<div class="col-sm-3">TOTAL_REVENUE</div>
		        			<div class="col-sm-1"> : </div>
		        			<div class="" id="total_revenue">
		        				{{ isset($counting['details_dapros']) ? $counting['details_dapros']->TOTAL_REVENUE : '' }}
		        			</div>
		    			</div>
		    			<div class="row hidden-div">
		        			<div class="col-sm-3">DEVICE_TYPE</div>
		        			<div class="col-sm-1"> : </div>
		        			<div class="" id="device_type">
		        				{{ isset($counting['details_dapros']) ? $counting['details_dapros']->DEVICE_TYPE : '' }}
		        			</div>
		    			</div>
		    			<div class="row hidden-div">
		        			<div class="col-sm-3">VOL_BROADBAND</div>
		        			<div class="col-sm-1"> : </div>
		        			<div class="" id="vol_broadband">
		        				{{ isset($counting['details_dapros']) ? $counting['details_dapros']->VOL_BROADBAND : '' }}
		        			</div>
		    			</div>
		    			<div class="row hidden-div">
		        			<div class="col-sm-3">VOL_BROADBAND_PACKAGE</div>
		        			<div class="col-sm-1"> : </div>
		        			<div class="" id="vol_broadband_package">
		        				{{ isset($counting['details_dapros']) ? $counting['details_dapros']->VOL_BROADBAND_PACKAGE : '' }}
		        			</div>
		    			</div>
		    			<div class="row hidden-div">
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
		    		<div class="col-md-12">
		    			<h4 class="panel-title">Customer Interaction</h4>
		    		</div>
		    		<form class="form-horizontal" id="formInfoCall">
		    			{{-- Input by Agent --}}
                        <div class="form-group">
                        	<label for="input_k_kontak" class="col-sm-3 control-label">K-Kontak</label>
                        	<div class="col-sm-9">
                        		<textarea class="form-control  @error('input_k_kontak') is-invalid @enderror" name="input_k_kontak" id="input_k_kontak" rows="3" style="resize: none;" autocomplete="off" readonly>{{ isset($counting['details_call']) ? $counting['details_call']->input_k_kontak : '' }}</textarea>
                        		@error('input_k_kontak')
                                	<p class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>{{ $message }}</p>
                                @enderror
	                        </div>
                        </div>
                        <div class="form-group">
                        	<label for="input_cp_marshanda" class="col-sm-3 control-label">CP Marshanda</label>
                        	<div class="col-sm-9">
                        		<input type="text" class="form-control @error('input_cp_marshanda') is-invalid @enderror" id="input_cp_marshanda" name="input_cp_marshanda" autocomplete="off" readonly value="{{ isset($counting['details_call']) ? $counting['details_call']->input_cp_marshanda : '' }}">
                        		@error('input_cp_marshanda')
                                	<p class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>{{ $message }}</p>
                                @enderror
	                        </div>
                        </div>
                        <div class="form-group">
                        	<label for="input_an_pemasangan" class="col-sm-3 control-label">A.N Pemasangan</label>
                        	<div class="col-sm-9">
                        		<input type="text" class="form-control @error('input_an_pemasangan') is-invalid @enderror" id="input_an_pemasangan" name="input_an_pemasangan" autocomplete="off" readonly value="{{ isset($counting['details_call']) ? $counting['details_call']->input_an_pemasangan : '' }}">
                        		@error('input_an_pemasangan')
                                	<p class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>{{ $message }}</p>
                                @enderror
	                        </div>
                        </div>  

                        <div class="form-group">
                        	<label for="" class="col-sm-3 control-label">Manja</label>
                        	<div class="col-sm-9">
	                            <div class="input-group m-b-sm">
	                            	<span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
	                            	<input type="text" class="form-control date-picker  @error('am_date') is-invalid @enderror" id="am_date" readonly value="{{ isset($counting['details_call']) ? date('Y-m-d', strtotime($counting['details_call']->call_am_datetime)) : '' }}">
	                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-clock-o"></i></span>
	                                <input type="text" class="form-control time-picker  @error('am_time') is-invalid @enderror" id="am_time" autocomplete="off" readonly value="{{ isset($counting['details_call']) ? date('H:i:s', strtotime($counting['details_call']->call_am_datetime)) : '' }}">
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
                        	<label for="regional" class="col-sm-3 control-label">Regional</label>
                            <div class="col-sm-9">
                            	<input type="text" class="form-control @error('regional') is-invalid @enderror" id="regional" name="regional" autocomplete="off" readonly value="{{ isset($counting['details_call']) ? $counting['details_call']->regional : '' }}">

	                            @error('regional')
                                	<p class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                        	<label for="witel" class="col-sm-3 control-label">Witel</label>
                            <div class="col-sm-9">
                            	<input type="text" class="form-control @error('witel') is-invalid @enderror" id="witel" name="witel" autocomplete="off" readonly value="{{ isset($counting['details_call']) ? $counting['details_call']->witel : '' }}">
                                
	                            @error('witel')
                                	<p class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                        	<label for="paket" class="col-sm-3 control-label">Paket</label>
                            <div class="col-sm-9">
                            	<input type="text" class="form-control @error('paket') is-invalid @enderror" id="paket" name="paket" autocomplete="off" readonly value="{{ isset($counting['details_call']) ? $counting['details_call']->paket : '' }}">
                                
	                            @error('paket')
                                	<p class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                        	<label for="input_alamat_pemasangan" class="col-sm-3 control-label">Alamat Pemasangan</label>
                        	<div class="col-sm-9">
                        		<textarea class="form-control  @error('input_alamat_pemasangan') is-invalid @enderror" name="input_alamat_pemasangan" id="input_alamat_pemasangan" rows="3" style="resize: none;" autocomplete="off" readonly>{{ isset($counting['details_call']) ? $counting['details_call']->input_alamat_pemasangan : '' }}</textarea>
                        		@error('input_alamat_pemasangan')
                                	<p class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>{{ $message }}</p>
                                @enderror
	                        </div>
                        </div>
                        <div class="form-group">
                        	<label for="input_email" class="col-sm-3 control-label">Email</label>
                        	<div class="col-sm-9">
                        		<input type="text" class="form-control @error('input_email') is-invalid @enderror" id="input_email" name="input_email" autocomplete="off" readonly value="{{ isset($counting['details_call']) ? $counting['details_call']->input_email : '' }}">
                        		@error('input_email')
                                	<p class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>{{ $message }}</p>
                                @enderror
	                        </div>
                        </div>
                        <div class="form-group">
                        	<label for="via_by" class="col-sm-3 control-label">Via by</label>
                            <div class="col-sm-9">
                            	<input type="text" class="form-control @error('via_by') is-invalid @enderror" id="via_by" name="via_by" autocomplete="off" readonly value="{{ isset($counting['details_call']) ? $counting['details_call']->via_by : '' }}">
                                @error('via_by')
                                	<p class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                        	<label for="information" class="col-sm-3 control-label">Information/TIKOR</label>
                        	<div class="col-sm-9">
                        		<textarea class="form-control  @error('information') is-invalid @enderror" id="c_information" rows="3" style="resize: none;" required="required" autocomplete="off" readonly>{{ isset($counting['details_call']) ? $counting['details_call']->call_information : '' }}</textarea>
                        		@error('information')
                                	<p class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>{{ $message }}</p>
                                @enderror
	                        </div>
                        </div>
                        <div class="form-group">
                        	<label for="" class="col-sm-3 control-label">Consumed by Agent at</label>
                        	<div class="col-sm-9">
	                            <div class="input-group m-b-sm">
	                            	<span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
	                            	<input type="text" class="form-control date-picker  @error('consumed_date') is-invalid @enderror" id="consumed_date" readonly value="{{ isset($counting['details_call']) ? date('Y-m-d', strtotime($counting['details_call']->call_consume_datetime)) : '' }}">
	                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-clock-o"></i></span>
	                                <input type="text" class="form-control time-picker  @error('consumed_time') is-invalid @enderror" id="consumed_time" autocomplete="off" readonly value="{{ isset($counting['details_call']) ? date('H:i:s', strtotime($counting['details_call']->call_consume_datetime)) : '' }}">
	                            </div>

	                            @error('consumed_date')
                                	<p class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>{{ $message }}</p>
                                @enderror
                                @error('consumed_time')
                                	<p class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>{{ $message }}</p>
                                @enderror
	                        </div>
                        </div>
                	</form>
                	
		    	</div>
		    	<div class="col-md-4">
		    		<div class="col-md-12">
		    			<h4 class="panel-title">Form Tapping</h4>
		    		</div>
		    		<form action="/qco/save" method="POST" id="formTapping" class="form-horizontal">
                		@csrf
		    			<input type="hidden" class="@error('dapros_id') is-invalid @enderror" name="dapros_id" id="dapros_id" {{ isset($counting['details_dapros']) ? 'value='.$counting['details_dapros']->id : '' }}>
		    			@error('dapros_id')
                        	<p class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>{{ 'Please fetch data first!' }}</p>
                        @enderror
                        @if ($counting['data_is_return'])
                        	<input type="hidden" name="data_is_return" value="1">
                        @endif
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
                        	<label for="information" class="col-sm-3 control-label">Information</label>
                        	<div class="col-sm-9">
                        		<textarea class="form-control  @error('information') is-invalid @enderror" name="information" id="t_information" rows="3" style="resize: none;" required="required" autocomplete="off"></textarea>
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
<script src="{{ asset('plugins/moment/moment.js') }}" defer></script>
{{--<script src="{{ asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}" defer></script>
<script src="{{ asset('plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}" defer></script>--}}
<script type="text/javascript" defer>
	$('.hidden-div').hide();
	$('#get-data-form').on('submit', function(e){
        e.preventDefault();
        if ( $("#dapros_id").val() != '' ) {
        	notificationScript("warning", "Warning", "You still have data to tap first!");
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
		       url:'/qco/data',
		       //data: $( this ).serialize(),
		       success: function(data){
		       	if (data['message'] != null && data['message'] != '') {
		       		notificationScript(data['alert-class'], data['alert-title'], data['message']);
		       	}
		       	else{
			       	{{-- Fill Dapros Details --}}
			       	var valueTitles = ['BRAND','ROW_NUM','MSISDN_MASK','MSISDN','NAME_MASK','CUSTOMER_SUBTYPE','TOT_BILL_AMOUNT','TOTAL_REVENUE','DEVICE_TYPE','VOL_BROADBAND','VOL_BROADBAND_PACKAGE','CI','KABUPATEN','LONGITUDE','LATITUDE','ODP1','ODP2','ODP3'];
			       	var labelTitles = ['brand','row_num','msisdn_mask','msisdn','name_mask','customer_subtype','tot_bill_amount','total_revenue','device_type','vol_broadband','vol_broadband_package','ci','kabupaten','longitude','latitude','odp1','odp2','odp3'];
			        for (var i = 0; i < labelTitles.length; i++) {
			          $("#" + labelTitles[i]).html(data['details_dapros'][valueTitles[i]]);
			        }
			        {{-- Fill Call details --}}
			        $("#am_date").val(moment(data['details_call']['call_am_datetime']).format("YYYY-M-D"));
			        $("#am_time").val(moment(data['details_call']['call_am_datetime']).format("H:m"));
			        $("#c_information").val(data['details_call']['call_information']);
			        $("#consumed_date").val(moment(data['details_call']['call_consume_datetime']).format("YYYY-M-D"));
			        $("#consumed_time").val(moment(data['details_call']['call_consume_datetime']).format("H:m"));
			        {{-- Fill Customer Interaction --}}
			        var valueTitles1 =['input_cp_marshanda', 'input_an_pemasangan', 'regional', 'witel', 'paket', 'input_email', 'via_by'];
			        var labelTitles1 =['input_cp_marshanda', 'input_an_pemasangan', 'regional', 'witel', 'paket', 'input_email', 'via_by'];
			        for (var i = 0; i < valueTitles1.length; i++) {
			          $("#" + labelTitles1[i]).val(data['details_call'][valueTitles1[i]]);
			          console.log($("#" + labelTitles1[i]).val())
			        }
			        var valueTitles2 =['input_k_kontak', 'input_alamat_pemasangan'];
			        var labelTitles2 =['input_k_kontak', 'input_alamat_pemasangan'];
			        for (var i = 0; i < valueTitles2.length; i++) {
			          $("#" + labelTitles2[i]).val(data['details_call'][valueTitles2[i]]);
			        }
			        {{-- Fill Dapros ID --}}
			        $("#dapros_id").val(data['details_dapros']['id']);
			        {{-- Refresh Form --}}
			        notificationScript("success", "Success", "Success fetching Data");
			    }
		        $('#get-data-form .btn').button('reset');
		        //$('#resetBtn').click();
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
    $('#formTapping').on('submit', function(e){
        e.preventDefault();
        $('#saveBtn').button('loading');
        $.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
        $.ajax({
	       type:"post",
	       url:'/qco/save',
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
	        	window.location.replace("/qco/workspace");
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
	       url:'/qco/activity',
	       //data: $( this ).serialize(),
	       success: function(data){

	        var spanTitles = ['approved_daily', 'return_daily', 'returntoagree_daily', 'returntodecline_daily'];
	        var valueTitles = ['approved_daily', 'return_daily', 'returntoagree_daily', 'returntodecline_daily'];;
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
	    {{--$('.date-picker').datepicker({
	    	    	        orientation: "top auto",
	    	    	        autoclose: true,
	    	    	        format: 'yyyy-m-d'
	    	    	    });
	    	    	    $('.time-picker').timepicker({
	    	    	    	showMeridian: false
	    	    	    });--}}
	    chain1();
	    $('#resetBtn').click();
	});
	// Button On Click
	$('#resetBtn').click(function(){
	    $("#formTapping").trigger("reset");
	    $("#formInfoCall").trigger("reset");
	    $("select").val('').trigger('change');
	    
	});

</script>


@endsection