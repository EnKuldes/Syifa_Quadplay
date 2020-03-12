@extends('layouts.app')

@section('content')

<div class="row m-t-md">
	<div class="panel panel-white">
		<div class="panel-heading clearfix">
			<h4 class="panel-title">List Unconsume</h4>
			<div class="panel-control">
				<div class="form-group">
					<label class="sr-only" for="select_data_skill">Source Data</label>
					<select class="form-control  @error('select_data_skill') is-invalid @enderror" name="select_data_skill"
					id="select_data_skill" tabindex="-1" required="required" style="width:100%;">
				</select>
				</div>
			</div>
		</div>
		<div class="panel-body field-1">
			<div class="col-lg-12 col-md-12">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>MSISDN MASK</th>
							<th>NAME MASK</th>
							<th>CALL STATUS</th> {{-- disini 3 biji aja lgs dari call sampe detail reason call --}}
							<th>INFORMATION</th>
							<th>ATTEMPTS</th>
							<th>CONSUMED</th>
							<th>AGENT</th>
							<th>ACTIONS</th>
						</tr>
					</thead>
					<tbody>
						@if (count($datas['data_quadplay']) > 0)
						@php
						$idx = $datas['data_quadplay']->firstItem();
						@endphp
						@foreach ($datas['data_quadplay'] as $data)
						<tr>
							@php
							$customer_information = $data->dapros;
							$call_status_detail = "Uncosumed";
							$label_color = "danger";
							$user = $data->call_agent;
							@endphp
							<th scope="row">{{ $idx }}</th>
							<td>{{ $customer_information->MSISDN_MASK }}</td>
							<td>{{ $customer_information->NAME_MASK }}</td>
							<td><span class="label label-{{ $label_color }}">{{ $call_status_detail }}</span> </td>
							<td>{{ $data->call_information }}</td>
							<td>{{ $data->call_attempts }}</td>
							<td>{{ $data->call_consume_datetime }}</td>
							<td>{{ $user->name }}</td>
							<td>
								<a href="/qco/retapping/1/{{ $data->id }}" type="button" class="btn btn-default btn-xs"><i class="icon-earphones-alt"></i></a>
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
		</div>

		<div class="panel-footer field-1">
			{{ $datas['data_quadplay']->links() }}
		</div>

		<div class="panel-body field-2">
			<div class="col-lg-12 col-md-12">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>POTS</th>
							<th>NAME CUSTOMER</th>
							<th>CALL STATUS</th>
							<th>INFORMATION</th>
							<th>ATTEMPTS</th>
							<th>CONSUMED</th>
							<th>AGENT</th>
							<th>ACTIONS</th>
						</tr>
					</thead>
					<tbody>
						@if (count($datas['data_regional']) > 0)
						@php
						$idx = $datas['data_regional']->firstItem();
						@endphp
						@foreach ($datas['data_regional'] as $data)
						<tr>
							@php
							$customer_information = $data->dapros;
							$call_status_detail = "Uncosumed";
							$label_color = "danger";
							$user = $data->call_agent;
							@endphp
							<th scope="row">{{ $idx }}</th>
							<td>{{ $customer_information->pots }}</td>
							<td>{{ $customer_information->nama_customer }}</td>
							<td><span class="label label-{{ $label_color }}">{{ $call_status_detail }}</span> </td>
							<td>{{ $data->call_information }}</td>
							<td>{{ $data->call_attempts }}</td>
							<td>{{ $data->call_consume_datetime }}</td>
							<td>{{ $user->name }}</td>
							<td>
								<a href="/qco/retapping/2/{{ $data->id }}" type="button" class="btn btn-default btn-xs"><i class="icon-earphones-alt"></i></a>
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
		</div>

		<div class="panel-footer field-2">
			{{ 
				$datas['data_regional']->links() 
			}}
		</div>

	</div>
</div>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myLargeModalLabel">Call Status & Information</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-12">
						
						<div class="row">
							<div class="col-sm-4">BRAND</div>
							<div class="col-sm-1"> : </div>
							<div class="" id="brand"></div>
						</div>
						<div class="row">
							<div class="col-sm-4">ROW_NUM</div>
							<div class="col-sm-1"> : </div>
							<div class="" id="row_num"></div>
						</div>
						<div class="row">
							<div class="col-sm-4">MSISDN_MASK</div>
							<div class="col-sm-1"> : </div>
							<div class="" id="msisdn_mask"></div>
						</div>
						<div class="row">
							<div class="col-sm-4">MSISDN</div>
							<div class="col-sm-1"> : </div>
							<div class="" id="msisdn"></div>
						</div>
						<div class="row">
							<div class="col-sm-4">NAME_MASK</div>
							<div class="col-sm-1"> : </div>
							<div class="" id="name_mask"></div>
						</div>
						<div class="row">
							<div class="col-sm-4">CUSTOMER_SUBTYPE</div>
							<div class="col-sm-1"> : </div>
							<div class="" id="customer_subtype"></div>
						</div>
						<div class="row">
							<div class="col-sm-4">TOT_BILL_AMOUNT</div>
							<div class="col-sm-1"> : </div>
							<div class="" id="tot_bill_amount"></div>
						</div>
						<div class="row">
							<div class="col-sm-4">TOTAL_REVENUE</div>
							<div class="col-sm-1"> : </div>
							<div class="" id="total_revenue"></div>
						</div>
						<div class="row">
							<div class="col-sm-4">DEVICE_TYPE</div>
							<div class="col-sm-1"> : </div>
							<div class="" id="device_type"></div>
						</div>
						<div class="row">
							<div class="col-sm-4">VOL_BROADBAND</div>
							<div class="col-sm-1"> : </div>
							<div class="" id="vol_broadband"></div>
						</div>
						<div class="row">
							<div class="col-sm-4">VOL_BROADBAND_PACKAGE</div>
							<div class="col-sm-1"> : </div>
							<div class="" id="vol_broadband_package"></div>
						</div>
						<div class="row">
							<div class="col-sm-4">CI</div>
							<div class="col-sm-1"> : </div>
							<div class="" id="ci"></div>
						</div>
						<div class="row">
							<div class="col-sm-4">KABUPATEN</div>
							<div class="col-sm-1"> : </div>
							<div class="" id="kabupaten"></div>
						</div>
						<div class="row">
							<div class="col-sm-4">LONGITUDE</div>
							<div class="col-sm-1"> : </div>
							<div class="" id="longitude"></div>
						</div>
						<div class="row">
							<div class="col-sm-4">LATITUDE</div>
							<div class="col-sm-1"> : </div>
							<div class="" id="latitude"></div>
						</div>
						<div class="row">
							<div class="col-sm-4">ODP1</div>
							<div class="col-sm-1"> : </div>
							<div class="" id="odp1"></div>
						</div>
						<div class="row">
							<div class="col-sm-4">ODP2</div>
							<div class="col-sm-1"> : </div>
							<div class="" id="odp2"></div>
						</div>
						<div class="row">
							<div class="col-sm-4">ODP3</div>
							<div class="col-sm-1"> : </div>
							<div class="" id="odp3"></div>
						</div>
						


						<div class="row">
							<div class="col-sm-4">Status Call</div>
							<div class="col-sm-1"> : </div>
							<div class="" id="status_call"></div>
						</div>
						<div class="row">
							<div class="col-sm-4">Reason</div>
							<div class="col-sm-1"> : </div>
							<div class="" id="reason_status_call"></div>
						</div>
						<div class="row">
							<div class="col-sm-4">Detail Reason</div>
							<div class="col-sm-1"> : </div>
							<div class="" id="detail_reason_status_call"></div>
						</div>
						<div class="row">
							<div class="col-sm-4">AM</div>
							<div class="col-sm-1"> : </div>
							<div class="" id="am_call"></div>
						</div>
						<div class="row">
							<div class="col-sm-4">FU</div>
							<div class="col-sm-1"> : </div>
							<div class="" id="fu_call"></div>
						</div>
						<div class="row">
							<div class="col-sm-4">Call Information</div>
							<div class="col-sm-1"> : </div>
							<div class="" id="information_call"></div>
						</div>
						<div class="row">
							<div class="col-sm-4">Attempts</div>
							<div class="col-sm-1"> : </div>
							<div class="" id="attempts_call"></div>
						</div>
						<div class="row">
							<div class="col-sm-4">Agent Call</div>
							<div class="col-sm-1"> : </div>
							<div class="" id="agent_call"></div>
						</div>
						<div class="row">
							<div class="col-sm-4">Call Consumed</div>
							<div class="col-sm-1"> : </div>
							<div class="" id="consume_call"></div>
						</div>
						<div class="row">
							<div class="col-sm-4">Status Tapping</div>
							<div class="col-sm-1"> : </div>
							<div class="" id="status_tapping"></div>
						</div>
						<div class="row">
							<div class="col-sm-4">Tapping Information</div>
							<div class="col-sm-1"> : </div>
							<div class="" id="information_tapping"></div>
						</div>
						<div class="row">
							<div class="col-sm-4">Agent Tapping</div>
							<div class="col-sm-1"> : </div>
							<div class="" id="agent_tapping"></div>
						</div>
						<div class="row">
							<div class="col-sm-4">Tapping Consumed</div>
							<div class="col-sm-1"> : </div>
							<div class="" id="consume_tapping"></div>
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
<script src="{{ asset('plugins/select2/js/select2.min.js') }}" defer></script>
<script type="text/javascript" defer>
	function view_data(id) {
		//$(this).button('loading');
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			type:"post",
			url:'/qco/view',
			data: {'id': id},
			success: function(data){
				var valueCallTitles = ['status_call', 'reason_status_call', 'detail_reason_status_call', 'am_call', 'fu_call', 'information_call', 'attempts_call', 'agent_call', 'consume_call', 'status_tapping', 'information_tapping', 'agent_tapping', 'consume_tapping'];
				var labelCallTitles = ['status_call', 'reason_status_call', 'detail_reason_status_call', 'am_call', 'fu_call', 'information_call', 'attempts_call', 'agent_call', 'consume_call', 'status_tapping', 'information_tapping', 'agent_tapping', 'consume_tapping'];
				var valueDaprosTitles = ['BRAND','ROW_NUM','MSISDN_MASK','MSISDN','NAME_MASK','CUSTOMER_SUBTYPE','TOT_BILL_AMOUNT','TOTAL_REVENUE','DEVICE_TYPE','VOL_BROADBAND','VOL_BROADBAND_PACKAGE','CI','KABUPATEN','LONGITUDE','LATITUDE','ODP1','ODP2','ODP3'];
				var labelDaprosTitles = ['brand','row_num','msisdn_mask','msisdn','name_mask','customer_subtype','tot_bill_amount','total_revenue','device_type','vol_broadband','vol_broadband_package','ci','kabupaten','longitude','latitude','odp1','odp2','odp3'];
				for (var i = 0; i < labelCallTitles.length; i++) {
					$("#" + labelCallTitles[i]).html(data['details_call'][valueCallTitles[i]]);
				}
				for (var i = 0; i < labelDaprosTitles.length; i++) {
					$("#" + labelDaprosTitles[i]).html(data['details_dapros'][valueDaprosTitles[i]]);
				}
				//console.log(data)

				//notificationScript("success", "Success", "Success fetching Data");
				console.log('Success fetching Data')
	        //$('#btnView').button('reset');
	    },
	        error: function(jqXhr, json, errorThrown){// this are default for ajax errors
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
	     });//
	}
	// Onchange Events
    $("#select_data_skill").change(function() {
      var id = $(this).val();
      if (id != "" && id != null)
      {
        if (id == 1) {
          $('.field-1').show();
          $('.field-2').hide();
        }
        else if (id == 2) {
          $('.field-1').hide();
          $('.field-2').show(); 
        }
      }
    });
    function chain2() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
         type:"post",
         url:'/qco/skill_list',
         //data: {},
         success: function(data){

          var ahtml = '<option></option>';
          //var list_options = [];
          for (var i = 0; i < data.length; i++) {
            ahtml+="<option value='"+data[i]['id']+"'>"+data[i]['skill_desc']+"</option>"
            //option = {id: data[i]['id'], text: data[i]['skill_desc']};
            //list_options.push(option);
          }
          $('#select_data_skill').html(ahtml);
          /*$("#select_data_skill").select2({
            //dropdownParent: $("#modalForPaket"), 
            data: list_options
          });*/
          @php
	  		$current_params = Request::query();
	  		if ( isset($current_params['regional']) ) { echo ("$('#select_data_skill').val(2).trigger('change');"); }
	  		else{ echo ("$('#select_data_skill').val(1).trigger('change');");}
	  	@endphp
         },
          error : function(data) {
          }
       }).done(function(){
      /*$("#select_call_status_detail").select2({
        dropdownParent: $("#modalForDetailReason")
      });*/
       });
  }
  $(document).ready(function() {
  	$("select").select2({
  		placeholder: "Please select option"
  	});
  	chain2();
  });
</script>

@endsection
