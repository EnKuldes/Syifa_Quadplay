@extends('layouts.app')

@section('content')

<div class="panel panel-white">
	<div class="panel-heading">
		Dashboard
		<div class="panel-control">
			<a href="javascript:void(0);" data-toggle="modal" data-target="#modalForUploadDapros" title="Upload" data-original-title="Upload Data Dapros"><i class="fa fa-upload"></i></a>
			<a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Refresh" class="panel-reload" data-original-title="Reload" onclick="count_activity();"><i class="icon-reload"></i></a>
		</div>
	</div>
	<div class="panel-body">
		<div class="row">

			<div class="col-lg-2 col-md-4 col-lg-offset-1">
				<div class="panel info-box panel-white">
					<div class="panel-body">
						<div class="info-box-stats">
							<p class="counter" id="consume">0</p>
							<span class="info-box-title">Today Consume</span>
						</div>
						<div class="info-box-icon">
							<i class="icon-call-out"></i>
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
			<div class="col-lg-2 col-md-4">
				<div class="panel info-box panel-white">
					<div class="panel-body">
						<div class="info-box-stats">
							<p class="counter" id="contacted">0</p>
							<span class="info-box-title">Contacted</span>
						</div>
						<div class="info-box-icon">
							<i class="icon-user-following"></i>
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
			<div class="col-lg-2 col-md-4">
				<div class="panel info-box panel-white">
					<div class="panel-body">
						<div class="info-box-stats">
							<p class="counter" id="agree">0</p>
							<span class="info-box-title">Agree</span>
						</div>
						<div class="info-box-icon">
							<i class="icon-check"></i>
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
			<div class="col-lg-2 col-md-4">
				<div class="panel info-box panel-white">
					<div class="panel-body">
						<div class="info-box-stats">
							<p class="counter" id="approved">0</p>
							<span class="info-box-title">Approved</span>
						</div>
						<div class="info-box-icon">
							<i class="icon-like"></i>
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
			<div class="col-lg-2 col-md-4">
				<div class="panel info-box panel-white">
					<div class="panel-body">
						<div class="info-box-stats">
							<p class="counter" id="return">0</p>
							<span class="info-box-title">Return</span>
						</div>
						<div class="info-box-icon">
							<i class="icon-dislike"></i>
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
				<button type="submit" class="btn btn-success" form="formForUploadDapros" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing" onclick="$(this).button('loading');">Submit</button>
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
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	function count_activity() {
		$.ajax({
	       type:"post",
	       url:'/admin/activity',
	       //data: {id: id_value},
	       success: function(data){
	       	var spanTitles = ['consume', 'contacted', 'agree', 'approved', 'return'];
	        var valueTitles = ['consumed_daily', 'c_daily', 'agree_daily', 'approved_daily', 'return_daily'];
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
	$(document).ready(function() {
		count_activity();
		@if(Session::has('sukses'))
		notificationScript("success", "Success", "Successfully save data.");
		@endif
	});
</script>

@endsection