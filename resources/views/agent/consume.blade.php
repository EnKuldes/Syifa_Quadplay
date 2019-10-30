@extends('layouts.app')

@section('content')

<div class="row m-t-md">
	<div class="panel panel-white">
        <div class="panel-heading clearfix">
            <h4 class="panel-title">List Consume</h4>
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>MSISDN MASK</th>
                        <th>NAME MASK</th>
                        <th>CALL STATUS</th> {{-- disini 3 biji aja lgs dari call sampe detail reason call --}}
                        <th>APPOINTMENT MANAGEMENT</th>
                        <th>FOLLOW UP</th>
                        <th>INFORMATION</th>
                        <th>ATTEMPTS</th>
                        <th>CONSUMED</th>
                        <th>AGENT</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                	@if (count($datas) > 0)
                		@php
                		$idx = $datas->firstItem();
                		@endphp
                		@foreach ($datas as $data)
                			<tr>
                				@php
                					$customer_information = $data->dapros;
                					$call_status_detail = $data->call_status_detail;
                					if ($call_status_detail->id == 1 OR $call_status_detail->id == 3) {
                						$label_color = "success";
                					}
                					elseif ($call_status_detail->id == 2 ) {
                						$label_color = "warning";
                					}
                					else{
                						$label_color = "danger";
                					}
                					$user = $data->call_agent;
                				@endphp
		                        <th scope="row">{{ $idx }}</th>
		                        <td>{{ $customer_information->MSISDN_MASK }}</td>
		                        <td>{{ $customer_information->NAME_MASK }}</td>
		                        <td><span class="label label-{{ $label_color }}">{{ $call_status_detail->value_call_status_detail }}</span> </td>
		                        <td>{{ $data->call_am_datetime }}</td>
		                        <td>{{ $data->call_fu_datetime }}</td>
		                        <td>{{ $data->call_information }}</td>
		                        <td>{{ $data->call_attempts }}</td>
		                        <td>{{ $data->call_consume_datetime }}</td>
		                        <td>{{ $user->name }}</td>
		                        <td>
		                        	<button type="button" class="btn btn-default btn-xs" id="view_call" data-toggle="modal" data-target="#myModal" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing"><i class="icon-magnifier"></i></button>
		                        	@if ($call_status_detail->id != 1 AND $call_status_detail->id != 3)
		                        		<a href="/agent/workspace/recall/{{ $data->dapros_id }}" type="button" class="btn btn-default btn-xs"><i class="fa fa-phone"></i></a>
		                        	@endif
		                        </td>
		                    </tr>
	                    	@php
	                    	$idx++;
	                    	@endphp
                		@endforeach
                	@else
                		{{-- Kosong --}}
                		<tr>
                			<th colspan="11" rowspan="1" headers="" scope="row">No datas found.</th>
                		</tr>
                	@endif
                </tbody>
            </table>
        </div>

    	<div class="panel-footer">
    		{{ $datas->links() }}
    	</div>
        
        	
        </div>
    </div>

    {{-- Modal --}}
	<div class="modal fade in" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myLargeModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                    	<div class="col-md-8">
				    		<div class="col-sm-12 col-md-12">
				        		<div class="row">
				        			<div class="col-sm-3">BRAND</div>
				        			<div class="col-sm-1"> : </div>
				        			<div class="" id="brand"></div>
				    			</div>
				    			<div class="row">
				        			<div class="col-sm-3">ROW_NUM</div>
				        			<div class="col-sm-1"> : </div>
				        			<div class="" id="row_num"></div>
				    			</div>
				    			<div class="row">
				        			<div class="col-sm-3">MSISDN_MASK</div>
				        			<div class="col-sm-1"> : </div>
				        			<div class="" id="msisdn_mask"></div>
				    			</div>
				    			<div class="row">
				        			<div class="col-sm-3">MSISDN</div>
				        			<div class="col-sm-1"> : </div>
				        			<div class="" id="msisdn"></div>
				    			</div>
				    			<div class="row">
				        			<div class="col-sm-3">NAME_MASK</div>
				        			<div class="col-sm-1"> : </div>
				        			<div class="" id="name_mask"></div>
				    			</div>
				    			<div class="row">
				        			<div class="col-sm-3">CUSTOMER_SUBTYPE</div>
				        			<div class="col-sm-1"> : </div>
				        			<div class="" id="customer_subtype"></div>
				    			</div>
				    			<div class="row">
				        			<div class="col-sm-3">TOT_BILL_AMOUNT</div>
				        			<div class="col-sm-1"> : </div>
				        			<div class="" id="tot_bill_amount"></div>
				    			</div>
				    			<div class="row">
				        			<div class="col-sm-3">TOTAL_REVENUE</div>
				        			<div class="col-sm-1"> : </div>
				        			<div class="" id="total_revenue"></div>
				    			</div>
				    			<div class="row">
				        			<div class="col-sm-3">DEVICE_TYPE</div>
				        			<div class="col-sm-1"> : </div>
				        			<div class="" id="device_type"></div>
				    			</div>
				    			<div class="row">
				        			<div class="col-sm-3">VOL_BROADBAND</div>
				        			<div class="col-sm-1"> : </div>
				        			<div class="" id="vol_broadband"></div>
				    			</div>
				    			<div class="row">
				        			<div class="col-sm-3">VOL_BROADBAND_PACKAGE</div>
				        			<div class="col-sm-1"> : </div>
				        			<div class="" id="vol_broadband_package"></div>
				    			</div>
				    			<div class="row">
				        			<div class="col-sm-3">CI</div>
				        			<div class="col-sm-1"> : </div>
				        			<div class="" id="ci"></div>
				    			</div>
				    			<div class="row">
				        			<div class="col-sm-3">KABUPATEN</div>
				        			<div class="col-sm-1"> : </div>
				        			<div class="" id="kabupaten"></div>
				    			</div>
				    			<div class="row">
				        			<div class="col-sm-3">LONGITUDE</div>
				        			<div class="col-sm-1"> : </div>
				        			<div class="" id="longitude"></div>
				    			</div>
				    			<div class="row">
				        			<div class="col-sm-3">LATITUDE</div>
				        			<div class="col-sm-1"> : </div>
				        			<div class="" id="latitude"></div>
				    			</div>
				    			<div class="row">
				        			<div class="col-sm-3">ODP1</div>
				        			<div class="col-sm-1"> : </div>
				        			<div class="" id="odp1"></div>
				    			</div>
				    			<div class="row">
				        			<div class="col-sm-3">ODP2</div>
				        			<div class="col-sm-1"> : </div>
				        			<div class="" id="odp2"></div>
				    			</div>
				    			<div class="row">
				        			<div class="col-sm-3">ODP3</div>
				        			<div class="col-sm-1"> : </div>
				        			<div class="" id="odp3"></div>
				    			</div>
				        	</div>
				    	</div>
				    	<div class="col-lg-4">
			    			<div class="row">
			        			<div class="col-md-3">Status Call</div>
			        			<div class="col-md-1"> : </div>
			        			<div class="" id="status_call"></div>
			    			</div>
			    			<div class="row">
			        			<div class="col-md-3">Reason</div>
			        			<div class="col-md-1"> : </div>
			        			<div class="" id="reason_status_call"></div>
			    			</div>
			    			<div class="row">
			        			<div class="col-md-3">Detail Reason</div>
			        			<div class="col-md-1"> : </div>
			        			<div class="" id="detail_reason_status_call"></div>
			    			</div>
			    			<div class="row">
			        			<div class="col-md-3">AM</div>
			        			<div class="col-md-1"> : </div>
			        			<div class="" id="am"></div>
			    			</div>
			    			<div class="row">
			        			<div class="col-md-3">FU</div>
			        			<div class="col-md-1"> : </div>
			        			<div class="" id="fu"></div>
			    			</div>
			    			<div class="row">
			        			<div class="col-md-3">Information</div>
			        			<div class="col-md-1"> : </div>
			        			<div class="" id="information"></div>
			    			</div>
				    		
				    	</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</div>
<script type="text/javascript" defer>
	$('#view_call').on('click', function(e){
        e.preventDefault();
        $(this).button('loading');
        $.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
        $.ajax({
	       type:"post",
	       url:'/agent/view',
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

        /*if ( $("#dapros_id").val() != '' ) {
        	notificationScript("warning", "Warning", "You still have data to call first!");
        }
        else{
        	$('#get-data-form .btn').button('loading');
        
        }*/

    });
</script>
	
@endsection
