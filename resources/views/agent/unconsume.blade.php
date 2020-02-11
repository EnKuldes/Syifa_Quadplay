@extends('layouts.app')

@section('content')

<div class="row m-t-md">
	<div class="panel panel-white">
		<div class="panel-heading clearfix">
			<h4 class="panel-title">List Unconsume</h4>
		</div>
		<div class="panel-body">
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
						@if (count($datas) > 0)
						@php
						$idx = $datas->firstItem();
						@endphp
						@foreach ($datas as $data)
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
								<a href="/agent/workspace/recall/{{ $data->id }}" type="button" class="btn btn-default btn-xs"><i class="fa fa-phone"></i></a>
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

		<div class="panel-footer">
			{{ $datas->links() }}
		</div>


	</div>
</div>

</div>
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
			url:'/agent/view',
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
</script>

@endsection
