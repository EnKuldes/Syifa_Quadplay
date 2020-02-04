@extends('layouts.app')

@section('content')

<div class="panel panel-white">
	<div class="panel-heading clearfix">
		<h4 class="panel-title">Basic example</h4>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table id="report" class="display table" style="width: 100%; cellspacing: 0;">
				<thead>
					<tr>
						{{--<th>No</th>--}}
						<th>BRAND</th>
						<th>ROW_NUM</th>
						<th>MSISDN_MASK</th>
						<th>MSISDN</th>
						<th>NAME_MASK</th>
						<th>CUSTOMER_SUBTYPE</th>
						<th>KABUPATEN</th>
						<th>ODP1</th>
						<th>ODP2</th>
						<th>ODP3</th>
						<th>Call Status</th>
						<th>Status Detail</th>
						<th>Detail Reason</th>
						<th>Appointment Management</th>
						<th>Follow Up Date</th>
						<th>Call Information</th>
						<th>Call Attempts</th>
						<th>Agent Username</th>
						<th>Agent Name</th>
						<th>Call Consume</th>
						<th>Tapping Status</th>
						<th>Tapping Information</th>
						<th>QCO</th>
						<th>QCO Name</th>
						<th>Tapping Consume</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						{{--<th>No</th>--}}
						<th>BRAND</th>
						<th>ROW_NUM</th>
						<th>MSISDN_MASK</th>
						<th>MSISDN</th>
						<th>NAME_MASK</th>
						<th>CUSTOMER_SUBTYPE</th>
						<th>KABUPATEN</th>
						<th>ODP1</th>
						<th>ODP2</th>
						<th>ODP3</th>
						<th>Call Status</th>
						<th>Status Detail</th>
						<th>Detail Reason</th>
						<th>Appointment Management</th>
						<th>Follow Up Date</th>
						<th>Call Information</th>
						<th>Call Attempts</th>
						<th>Agent Username</th>
						<th>Agent Name</th>
						<th>Call Consume</th>
						<th>Tapping Status</th>
						<th>Tapping Information</th>
						<th>QCO</th>
						<th>QCO Name</th>
						<th>Tapping Consume</th>
					</tr>
				</tfoot>
				<tbody>
					
				</tbody>
			</table>  
		</div>
	</div>
</div>
<script src="{{ asset('plugins/datatables/js/jquery.datatables.min.js')}}"></script>
<script type="text/javascript">
	$('#report').DataTable({
		searching: true,
		processing: true,
        serverSide: true,
        ajax: 'get_dapros_data',
        columnDefs: [
		    { "searchable": false, "targets": [0,1,2,3,4,5] }
		],
        columns: [
            {{-- { data: 'idx', name: 'No' }
                                     ,--}} 
			{ data: 'brand', name: 'BRAND' }
            , { data: 'row_number', name: 'ROW_NUM' }
            , { data: 'msisdn_mask', name: 'MSISDN_MASK' }
            , { data: 'msisdn', name: 'MSISDN' }
            , { data: 'name_mask', name: 'NAME_MASK' }
            , { data: 'customer_subtype', name: 'CUSTOMER_SUBTYPE' }
            , { data: 'kabupaten', name: 'KABUPATEN' }
            , { data: 'odp1', name: 'ODP1' }
            , { data: 'odp2', name: 'ODP2' }
            , { data: 'odp3', name: 'ODP3' }
            , { data: 'call_status', name: 'call_status' }
            , { data: 'call_status_detail', name: 'call_status_detail' }
            , { data: 'call_status_detail_reason', name: 'call_status_detail_reason' }
            , { data: 'am_datetime', name: 'am_datetime' }
            , { data: 'fu_datetime', name: 'fu_datetime' }
            , { data: 'call_information', name: 'call_information' }
            , { data: 'call_attempts', name: 'call_information' }
            , { data: 'call_agent', name: 'call_information' }
            , { data: 'call_agent_name', name: 'call_information' }
            , { data: 'call_consume', name: 'call_information' }
            , { data: 'tapping_status', name: 'call_information' }
            , { data: 'tapping_information', name: 'call_information' }
			, { data: 'tapping_agent_username', name: 'call_information' }
			, { data: 'tapping_agent_name', name: 'call_information' }
            , { data: 'tapping_consume', name: 'call_information' }
        ]
	});
</script>
@endsection