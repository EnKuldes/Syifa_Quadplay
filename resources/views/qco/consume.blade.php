@extends('layouts.app')

@section('content')

<div class="row m-t-md">
	<div class="panel panel-white">
		<div class="panel-heading clearfix">
			<h4 class="panel-title">List Consume</h4>
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
							<th>TAPPING STATUS</th>
							<th>CALL STATUS</th> {{-- disini 3 biji aja lgs dari call sampe detail reason call --}}
							<th>CALL INFORMATION</th>
							<th>CALL ATTEMPTS</th>
							<th>CALL CONSUMED</th>
							<th>CALL AGENT</th>
							<th>TAPPING INFORMATION</th>
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

							$tapping_status = $data->tapping_status;
							if ($tapping_status->id == 1) {
								$label_color1 = "success";
							}
							elseif ($tapping_status->id == 2 ) {
								$label_color1 = "warning";
							}
							else{
								$label_color1 = "danger";
							}
							@endphp
							<th scope="row">{{ $idx }}</th>
							<td>{{ $customer_information->MSISDN_MASK }}</td>
							<td>{{ $customer_information->NAME_MASK }}</td>
							<td><span class="label label-{{ $label_color1 }}">{{ $tapping_status->value_tapping_status }}</span> </td>
							<td><span class="label label-{{ $label_color }}">{{ $call_status_detail->value_call_status_detail }}</span> </td>
							<td>{{ $data->call_information }}</td>
							<td>{{ $data->call_attempts }}</td>
							<td>{{ $data->call_consume_datetime }}</td>
							<td>{{ $user->name }}</td>
							<td>{{ $data->tapping_information }}</td>
							<td>
								<button type="button" class="btn btn-default btn-xs" onclick="view_data({{ $data->id }})" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="icon-magnifier"></i></button>
								@if ( ($call_status_detail->id == 1) AND (/*($data->data_condition == '-') OR */($data->data_condition == 'returned to qco')) )
								<a href="/qco/retapping/1/{{ $data->id }}" type="button" class="btn btn-default btn-xs"><i class="icon-earphones-alt"></i></a>
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
		</div>

		<div class="panel-footer field-1">
			{{ 
				$datas['data_quadplay']->links() 
			}}
		</div>
		<div class="panel-body field-2">
			<div class="col-lg-12 col-md-12">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>POTS</th>
							<th>NAME CUSTOMER</th>
							<th>TAPPING STATUS</th>
							<th>CALL STATUS</th> {{-- disini 3 biji aja lgs dari call sampe detail reason call --}}
							<th>CALL INFORMATION</th>
							<th>CALL ATTEMPTS</th>
							<th>CALL CONSUMED</th>
							<th>CALL AGENT</th>
							<th>TAPPING INFORMATION</th>
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
							$call_status_detail = $data->call_status_detail;
							if ($call_status_detail->id == 11 OR $call_status_detail->id == 13) {
								$label_color = "success";
							}
							elseif ($call_status_detail->id == 12 ) {
								$label_color = "warning";
							}
							else{
								$label_color = "danger";
							}
							$user = $data->call_agent;

							$tapping_status = $data->tapping_status;
							if ($tapping_status->id == 1) {
								$label_color1 = "success";
							}
							elseif ($tapping_status->id == 2 ) {
								$label_color1 = "warning";
							}
							else{
								$label_color1 = "danger";
							}
							@endphp
							<th scope="row">{{ $idx }}</th>
							<td>{{ $customer_information->pots }}</td>
							<td>{{ $customer_information->nama_customer }}</td>
							<td><span class="label label-{{ $label_color1 }}">{{ $tapping_status->value_tapping_status }}</span> </td>
							<td><span class="label label-{{ $label_color }}">{{ $call_status_detail->value_call_status_detail }}</span> </td>
							<td>{{ $data->call_information }}</td>
							<td>{{ $data->call_attempts }}</td>
							<td>{{ $data->call_consume_datetime }}</td>
							<td>{{ $user->name }}</td>
							<td>{{ $data->tapping_information }}</td>
							<td>
								<button type="button" class="btn btn-default btn-xs" onclick="view_data({{ $data->id }})" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="icon-magnifier"></i></button>
								@if ( ($call_status_detail->id == 11) AND (/*($data->data_condition == '-') OR */($data->data_condition == 'returned to qco')) )
								<a href="/qco/retapping/2/{{ $data->id }}" type="button" class="btn btn-default btn-xs"><i class="icon-earphones-alt"></i></a>
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
		</div>

		<div class="panel-footer field-2">
			{{ 
				$datas['data_regional']->links() 
			}}
		</div>

	</div>
</div>
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" style="width:90%;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myLargeModalLabel">Call Status & Information</h4>
			</div>
			<div class="modal-body">
				<div class="row">
                    <div class="col-lg-2">
                        <div class="well well-sm">
                            <p class="field-1">
                                <strong>MSISDN MASK</strong>
                                <br>
                                <span id="msisdn_mask"></span>
                                <br>

                                <strong>NAME MASK</strong>
                                <br>
                                <span id="name_mask"></span>
                                <br>

                                <strong>KABUPATEN</strong>
                                <br>
                                <span id="kabupaten">asdfsa</span>
                                <br>

                                <strong>LONGITUDE</strong>
                                <br>
                                <span id="longitude">asdfsa</span>
                                <br>

                                <strong>LATITUDE</strong>
                                <br>
                                <span id="latitude">asdfsa</span>
                                <br>

                                <strong>ODP1</strong>
                                <br>
                                <span id="odp1">asdfsa</span>
                                <br>

                                <strong>ODP2</strong>
                                <br>
                                <span id="odp2">asdfsa</span>
                                <br>

                                <strong>ODP3</strong>
                                <br>
                                <span id="odp3">asdfsa</span>
                                <br>
                            </p>
                            <p class="field-2">
                                    <strong>POTS</strong>
                                    <br>
                                    <span id="pots"></span>
                                    <br>

                                    <strong>WITEL</strong>
                                    <br>
                                    <span id="witel_info"></span>
                                    <br>

                                    <strong>NAMA_CUSTOMER</strong>
                                    <br>
                                    <span id="nama_customer">asdfsa</span>
                                    <br>

                                    <strong>KLASIFIKASI REVENUE</strong>
                                    <br>
                                    <span id="klasifikasi_revenue">asdfsa</span>
                                    <br>

                                    <strong>PRIORITAS 1</strong>
                                    <br>
                                    <span id="prioritas_1">asdfsa</span>
                                    <br>

                                    <strong>PRIORITAS 2</strong>
                                    <br>
                                    <span id="prioritas_2">asdfsa</span>
                                    <br>

                                    <strong>ODPPRIORITAS 3</strong>
                                    <br>
                                    <span id="prioritas_3">asdfsa</span>
                                    <br>
                                </p>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="well well-sm">
                            <div class="row">
                                <div class="col-sm-3">Status Call</div>
                                <div class="col-sm-8"> : &nbsp;&nbsp; <span id="status_call"></span></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">Reason</div>
                                <div class="col-sm-8"> : &nbsp;&nbsp; <span id="reason_status_call"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">Detail</div>
                                <div class="col-sm-8"> : &nbsp;&nbsp; <span id="detail_reason_status_call"></div>
                            </div>
                            {{-- Input dari Agent Start --}}
                            <div class="row">
                                <div class="col-sm-3">K-Kontak</div>
                                <div class="col-sm-8"> : &nbsp;&nbsp; <span id="k_kontak"></div>
                            </div>
                            {{-- Field Quadplay --}}
                            <div class="row field-1">
                                <div class="col-sm-3">CP</div>
                                <div class="col-sm-8"> : &nbsp;&nbsp; <span id="cp_marshanda"></div>
                            </div>
                            <div class="row field-1">
                                <div class="col-sm-3">Atas Nama</div>
                                <div class="col-sm-8"> : &nbsp;&nbsp; <span id="an_pemasangan"></div>
                            </div>
                            {{-- ENd --}}
                            {{-- Field Regional --}}
                            <div class="row field-2">
                                <div class="col-sm-3">PSTN</div>
                                <div class="col-sm-8"> : &nbsp;&nbsp; <span id="pstn"></div>
                            </div>
                            <div class="row field-2">
                                <div class="col-sm-3">Dial To</div>
                                <div class="col-sm-8"> : &nbsp;&nbsp; <span id="dial_to"></div>
                            </div>
                            <div class="row field-2">
                                <div class="col-sm-3">Nama Pelanggan</div>
                                <div class="col-sm-8"> : &nbsp;&nbsp; <span id="nama_pelanggan"></div>
                            </div>
                            {{-- ENd --}}
                            {{-- Input dari Agent End --}}
                            <div class="row">
                                <div class="col-sm-3">Manja</div>
                                <div class="col-sm-8"> : &nbsp;&nbsp; <span id="am_call"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">FU</div>
                                <div class="col-sm-8"> : &nbsp;&nbsp; <span id="fu_call"></div>
                            </div>
                            {{-- Input dari Agent Start --}}
                            <div class="row">
                                <div class="col-sm-3">Regional</div>
                                <div class="col-sm-8"> : &nbsp;&nbsp; <span id="regional"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">Witel</div>
                                <div class="col-sm-8"> : &nbsp;&nbsp; <span id="witel"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">Paket</div>
                                <div class="col-sm-8"> : &nbsp;&nbsp; <span id="paket"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">Alamat</div>
                                <div class="col-sm-8"> : &nbsp;&nbsp; <span id="alamat_pemasangan"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">Email</div>
                                <div class="col-sm-8"> : &nbsp;&nbsp; <span id="email"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">Via by</div>
                                <div class="col-sm-8"> : &nbsp;&nbsp; <span id="via_by"></div>
                            </div>

                            {{-- Input dari Agent End --}}
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="well well-sm">
                            <div class="row">
                                <div class="col-sm-3">Call Info</div>
                                <div class="col-sm-8"> : &nbsp;&nbsp; <span id="information_call"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">Attempts</div>
                                <div class="col-sm-8"> : &nbsp;&nbsp; <span id="attempts_call"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">Agent Call</div>
                                <div class="col-sm-8"> : &nbsp;&nbsp; <span id="agent_call"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">Consumed</div>
                                <div class="col-sm-8"> : &nbsp;&nbsp; <span id="consume_call"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">Status Tapping</div>
                                <div class="col-sm-8"> : &nbsp;&nbsp; <span id="status_tapping"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">Tapping Info</div>
                                <div class="col-sm-8"> : &nbsp;&nbsp; <span id="information_tapping"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">Agent Tapping</div>
                                <div class="col-sm-8"> : &nbsp;&nbsp; <span id="agent_tapping"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">Tapping Consumed</div>
                                <div class="col-sm-8"> : &nbsp;&nbsp; <span id="consume_tapping"></div>
                            </div>
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
	$('.hidden-div').hide();
	function view_data(id) {
		//$(this).button('loading');
		var value_data_skill = $('#select_data_skill').val();
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			type:"post",
			url:'/qco/view',
			data: {'id': id, 'data_skill': value_data_skill},
			success: function(data){
				if ( value_data_skill == 1 ) {
					var valueCallTitles = ['status_call', 'reason_status_call', 'detail_reason_status_call', 'am_call', 'fu_call', 'information_call', 'attempts_call', 'agent_call', 'consume_call', 'status_tapping', 'information_tapping', 'agent_tapping', 'consume_tapping', 'k_kontak', 'regional', 'witel', 'paket', 'alamat_pemasangan', 'email', 'via_by', 'cp_marshanda', 'an_pemasangan'];
					var labelCallTitles = ['status_call', 'reason_status_call', 'detail_reason_status_call', 'am_call', 'fu_call', 'information_call', 'attempts_call', 'agent_call', 'consume_call', 'status_tapping', 'information_tapping', 'agent_tapping', 'consume_tapping', 'k_kontak', 'regional', 'witel', 'paket', 'alamat_pemasangan', 'email', 'via_by', 'cp_marshanda', 'an_pemasangan'];
					var valueDaprosTitles = ['BRAND','ROW_NUM','MSISDN_MASK','MSISDN','NAME_MASK','CUSTOMER_SUBTYPE','TOT_BILL_AMOUNT','TOTAL_REVENUE','DEVICE_TYPE','VOL_BROADBAND','VOL_BROADBAND_PACKAGE','CI','KABUPATEN','LONGITUDE','LATITUDE','ODP1','ODP2','ODP3'];
					var labelDaprosTitles = ['brand','row_num','msisdn_mask','msisdn','name_mask','customer_subtype','tot_bill_amount','total_revenue','device_type','vol_broadband','vol_broadband_package','ci','kabupaten','longitude','latitude','odp1','odp2','odp3'];
				}
				else if( value_data_skill == 2 ) {
					var valueCallTitles = ['status_call', 'reason_status_call', 'detail_reason_status_call', 'am_call', 'fu_call', 'information_call', 'attempts_call', 'agent_call', 'consume_call', 'status_tapping', 'information_tapping', 'agent_tapping', 'consume_tapping', 'k_kontak', 'regional', 'witel', 'paket', 'alamat_pemasangan', 'email', 'via_by', 'pstn','dial_to','nama_pelanggan'];
					var labelCallTitles = ['status_call', 'reason_status_call', 'detail_reason_status_call', 'am_call', 'fu_call', 'information_call', 'attempts_call', 'agent_call', 'consume_call', 'status_tapping', 'information_tapping', 'agent_tapping', 'consume_tapping', 'k_kontak', 'regional', 'witel', 'paket', 'alamat_pemasangan', 'email', 'via_by', 'pstn','dial_to','nama_pelanggan'];
					var valueDaprosTitles = ['pots','witel','nama_customer','klasifikasi_revenue','prioritas_1','prioritas_2','prioritas_3'];
					var labelDaprosTitles = ['pots','witel_info','nama_customer','klasifikasi_revenue','prioritas_1','prioritas_2','prioritas_3'];
				}
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
