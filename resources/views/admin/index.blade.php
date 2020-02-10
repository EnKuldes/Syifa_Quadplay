@extends('layouts.app')

@section('content')

<div class="panel panel-white">
	<div class="panel-heading">
		Dashboard
		<div class="panel-control">
			<a href="javascript:void(0);" data-toggle="modal" data-target="#modalForUploadDapros" title="Upload" data-original-title="Upload Data Dapros"><i class="fa fa-upload"></i></a>
			<a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Refresh" class="panel-reload" data-original-title="Reload"><i class="icon-reload"></i></a>
		</div>
	</div>
	<div class="panel-body">
		<div class="row">

			<div class="col-lg-3 col-md-6">
				<div class="panel info-box panel-white">
					<div class="panel-body">
						<div class="info-box-stats">
							<p class="counter">107,200</p>
							<span class="info-box-title">Today Consume</span>
						</div>
						<div class="info-box-icon">
							<i class="icon-users"></i>
						</div>
						<div class="info-box-progress">
							<div class="progress progress-xs progress-squared bs-n">
								<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="panel info-box panel-white">
					<div class="panel-body">
						<div class="info-box-stats">
							<p class="counter">340,230</p>
							<span class="info-box-title">Agree</span>
						</div>
						<div class="info-box-icon">
							<i class="icon-eye"></i>
						</div>
						<div class="info-box-progress">
							<div class="progress progress-xs progress-squared bs-n">
								<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="panel info-box panel-white">
					<div class="panel-body">
						<div class="info-box-stats">
							<p class="counter">340,230</p>
							<span class="info-box-title">Approved</span>
						</div>
						<div class="info-box-icon">
							<i class="icon-basket"></i>
						</div>
						<div class="info-box-progress">
							<div class="progress progress-xs progress-squared bs-n">
								<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="panel info-box panel-white">
					<div class="panel-body">
						<div class="info-box-stats">
							<p class="counter">47,500</p>
							<span class="info-box-title">Return</span>
						</div>
						<div class="info-box-icon">
							<i class="icon-envelope"></i>
						</div>
						<div class="info-box-progress">
							<div class="progress progress-xs progress-squared bs-n">
								<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!-- Row -->
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="panel panel-white">
					<div class="row">
						<div class="col-sm-9">
							<div class="visitors-chart">
								<div class="panel-heading">
									<h4 class="panel-title">Activty Calls</h4>
								</div>
								<div class="panel-body">
									<div id="flotchart1"></div>
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="col-sm-12">
								<div class="panel-heading">
									<h4 class="panel-title">Today Total Calls</h4>
								</div>
								<div class="panel info-box panel-white">
									<div class="panel-body">
										<div class="info-box-stats">
											<p class="counter">340,230</p>
											<span class="info-box-title">Contacted</span>
										</div>
										<div class="info-box-icon">
											<i class="icon-basket"></i>
										</div>
										<div class="info-box-progress">
											<div class="progress progress-xs progress-squared bs-n">
												<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="panel info-box panel-white">
									<div class="panel-body">
										<div class="info-box-stats">
											<p class="counter">340,230</p>
											<span class="info-box-title">Not Contacted</span>
										</div>
										<div class="info-box-icon">
											<i class="icon-basket"></i>
										</div>
										<div class="info-box-progress">
											<div class="progress progress-xs progress-squared bs-n">
												<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
	{{--<div class="col-lg-3 col-md-6">
				<div class="panel panel-white" style="height: 100%;">
					<div class="panel-heading">
						<h4 class="panel-title">Server Load</h4>
						<div class="panel-control">
							<a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Expand/Collapse" class="panel-collapse"><i class="icon-arrow-down"></i></a>
							<a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Reload" class="panel-reload"><i class="icon-reload"></i></a>
						</div>
					</div>
					<div class="panel-body">
						<div class="server-load">
							<div class="server-stat">
								<span>Total Usage</span>
								<p>67GB</p>
							</div>
							<div class="server-stat">
								<span>Total Space</span>
								<p>320GB</p>
							</div>
							<div class="server-stat">
								<span>CPU</span>
								<p>57%</p>
							</div>
						</div>
						<div id="flotchart2"></div>
					</div>
				</div>
			</div>--}}
		</div>
	</div>
</div>

<div class="modal fade" id="modalForUploadDapros" tabindex="-1" role="dialog" aria-labelledby="modalForUploadDaprosLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="modalForUploadDaprosLabel">Form Upload Dapros</h4>
			</div>
			<div class="modal-body">
				<form id="formForUploadDapros" method="post" action="/admin/console/import_dapros" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="file"></label>
						<input type="file" name="file" id="file" required="required" accept="application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success" form="formForUploadDapros">Submit</button>
			</div>
		</div>
	</div>
</div>

{{-- Scripts --}}
<script src="{{ asset('plugins/flot/jquery.flot.min.js') }}"></script>
<script src="{{ asset('plugins/flot/jquery.flot.time.min.js') }}"></script>
<script src="{{ asset('plugins/flot/jquery.flot.symbol.min.js') }}"></script>
<script src="{{ asset('plugins/flot/jquery.flot.resize.min.js') }}"></script>
<script src="{{ asset('plugins/flot/jquery.flot.tooltip.min.js') }}"></script>
<script type="text/javascript" defer>

	var flot1 = function () {
		var data = [[0, 65], [1, 59], [2, 80], [3, 81], [4, 56], [5, 55], [6, 40]];
		var data2 = [[0, 28], [1, 48], [2, 40], [3, 19], [4, 86], [5, 27], [6, 90]];
		var dataset =  [
		{
			data: data,
			color: "rgba(220,220,220,1)",
			lines: {
				show: true,
				fill: 0.2,
			},
			shadowSize: 0,
		}, {
			data: data,
			color: "#fff",
			lines: {
				show: false,
			},
			points: {
				show: true,
				fill: true,
				radius: 4,
				fillColor: "rgba(220,220,220,1)",
				lineWidth: 2
			},
			curvedLines: {
				apply: false,
			},
			shadowSize: 0
		}, {
			data: data2,
			color: "rgba(34,186,160,1)",
			lines: {
				show: true,
				fill: 0.2,
			},
			shadowSize: 0,
		},{
			data: data2,
			color: "#fff",
			lines: {
				show: false,
			},
			curvedLines: {
				apply: false,
			},
			points: {
				show: true,
				fill: true,
				radius: 4,
				fillColor: "rgba(34,186,160,1)",
				lineWidth: 2
			},
			shadowSize: 0
		}
		];

		var ticks = [[0, "1"], [1, "2"], [2, "3"], [3, "4"], [4, "5"], [5, "6"], [6, "7"], [7, "8"]];

		var plot1 = $.plot("#flotchart1", dataset, {
			series: {
				color: "#14D1BD",
				lines: {
					show: true,
					fill: 0.2
				},
				shadowSize: 0,
				curvedLines: {
					apply: true,
					active: true
				}
			},
			xaxis: {
				ticks: ticks,
			},
			legend: {
				show: false
			},
			grid: {
				color: "#AFAFAF",
				hoverable: true,
				borderWidth: 0,
				backgroundColor: '#FFF'
			},
			tooltip: true,
			tooltipOpts: {
				content: "%yK",
				defaultTheme: false
			}
		});

	};

	flot1();
	$(document).ready(function() {
		@if(Session::has('sukses'))
		notificationScript("success", "Success", "Successfully save data.");
		@endif
	});
</script>

@endsection