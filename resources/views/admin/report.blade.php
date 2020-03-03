@extends('layouts.app')

@section('content')

<div class="panel panel-white">
	<div class="panel-heading clearfix">
		<h4 class="panel-title">Report</h4>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table id="report" class="display table" style="width: 100%; cellspacing: 0;">
				<thead>
					<tr>
						<th>Action</th>
						<th>No</th>
						<th>MSISDN_MASK</th>
						<th>NAME_MASK</th>
						<th>KABUPATEN</th>
						<th>LONGITUDE</th>
						<th>LATITUDE</th>
						<th>ODP1</th>
						<th>ODP2</th>
						<th>ODP3</th>
						<th>Call Status</th>
						<th>Status Detail</th>
						<th>Detail Reason</th>
						<th>Manja</th>
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
				<tbody>

				</tbody>
			</table>
		</div>
	</div>
</div>
<script src="{{ asset('plugins/datatables/js/jquery.datatables.min.js')}}"></script>
<script src="{{ asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
<script type="text/javascript">
	var oTable = $('#report').DataTable({
		searching: true,
		processing: true,
        serverSide: true,
        ajax: {
        	url: 'get_dapros_data',
        	data: function(data) {
        		data.from_date = $("#from_date").val();
        		data.to_date = $("#to_date").val();
        	},
        },
        columnDefs: [
		    { "searchable": false, "targets": [0,1,2,3,4,5] }
		],
		buttons: [
		    'copy', 'excel', 'pdf'
		],
        columns: [
            {{-- { data: 'idx', name: 'No' }
                                     ,--}}
			{ data: 'action', name: 'action' }
			, { data: 'i', name: 'i' }
			, { data: 'msisdn_mask', name: 'MSISDN_MASK' }
            , { data: 'name_mask', name: 'NAME_MASK' }
            , { data: 'kabupaten', name: 'KABUPATEN' }
            , { data: 'longitude', name: 'LONGITUDE' }
            , { data: 'latitude', name: 'LATITUDE' }
            , { data: 'odp1', name: 'ODP1' }
            , { data: 'odp2', name: 'ODP2' }
            , { data: 'odp3', name: 'ODP3' }
            , { data: 'call_status', name: 'call_status' }
            , { data: 'call_status_detail', name: 'call_status_detail' }
            , { data: 'call_status_detail_reason', name: 'call_status_detail_reason' }
            , { data: 'am_datetime', name: 'am_datetime' }
            , { data: 'fu_datetime', name: 'fu_datetime' }
            , { data: 'call_information', name: 'call_information' }
            , { data: 'call_attempts', name: 'call_attempts' }
            , { data: 'call_agent', name: 'call_agent' }
            , { data: 'call_agent_name', name: 'call_agent_name' }
            , { data: 'call_consume', name: 'call_consume' }
            , { data: 'tapping_status', name: 'tapping_status' }
            , { data: 'tapping_information', name: 'tapping_information' }
			, { data: 'tapping_agent_username', name: 'tapping_agent_username' }
			, { data: 'tapping_agent_name', name: 'tapping_agent_name' }
            , { data: 'tapping_consume', name: 'tapping_consume' }
        ],
        language: {
            processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '
        },
        dom:
        "<'row'<'col-md-2'l><'col-md-4 col-md-offset-6'<'daterange_filter float-right'>>>trip",
	});
	$(`<div class="row">
			<div class="col-md-12">
				<div class="form-inline">
					<div class="form-group">
						<label class="sr-only" for="from_date">From Date</label>
						<input type="text" class="form-control date-picker" name="from_date" id="from_date" placeholder="From Date" autocomplete="off" required>
					</div>
					<div class="form-group">
						<label class="sr-only" for="to_date">To Date</label>
						<input type="text" class="form-control date-picker" name="to_date" id="to_date" placeholder="To Date" autocomplete="off" required>
					</div>
					<button type="button" class="btn btn-primary " onclick="filterDate()"><i class="fa fa-filter"></i> </button>
                	<button type="button" class="btn btn-success " onclick="resetSearch()"><i class="fa fa-repeat"></i> </button>
                	<button type="button" class="btn btn-default " onclick="refreshTable()"><i class="fa fa-refresh"></i> </button>
                	<button type="button" class="btn btn-info " onclick="downloadReport()"><i class="fa fa-download"></i> </button>
				</div>
			</div>
		</div>`).appendTo('#report_wrapper  div.daterange_filter');
	function resetSearch() {
		$('input').val('');
		oTable
		.search( '' )
		.columns().search( '' )
		.draw();
	}
	function refreshTable() {
		oTable.ajax.reload(null, false);
	}
	function filterDate() {
		var from_date_val = $('#from_date').val();
		var to_date_val = $('#to_date').val();
		if ((from_date_val != null && from_date_val != '') && (to_date_val != null && to_date_val != '')) {
			//oTable.ajax.data(data: {from_date: from_date_val, to_date: to_date_val},).load();
			oTable.ajax.reload();
		}
		else{
			notificationScript("warning", "Warning", "Both Date is required!");
		}
	}
	function downloadReport() {
		var from_date_val = $('#from_date').val();
		var to_date_val = $('#to_date').val();
		if ((from_date_val != null && from_date_val != '') && (to_date_val != null && to_date_val != '')) {
		     var form = document.createElement("form");
		     var efdate = document.createElement("input");
		     var eldate = document.createElement("input");
		     var ecsrf = document.createElement("input");
		     form.method = "POST";
		     form.id = "formtemp";
		     form.action = "/admin/download_report";
		     efdate.value= from_date_val;
		     efdate.name="from_date";
		     form.appendChild(efdate);
		     eldate.value= to_date_val;
		     eldate.name="to_date";
		     form.appendChild(eldate);
		     document.body.appendChild(form);

		     ecsrf.value= '{{ csrf_token() }}';
		     ecsrf.name="_token";
		     ecsrf.type="hidden";
		     form.appendChild(ecsrf);

		     document.body.appendChild(form);
		     form.submit();
		     // loadings
		     $("#formtemp").remove();
		}
		else{
			notificationScript("warning", "Warning", "Both Date is required!");
		}
	}
	$('.date-picker').datepicker({
        orientation: "top auto",
        autoclose: true,
        format: 'yyyy-mm-dd',
    });
    function modifyDataConsume(id) {
    	window.location = "/admin/console/data-consume/" + id
    }
</script>
@endsection
