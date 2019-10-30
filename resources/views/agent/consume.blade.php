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

                		@foreach ($datas as $data)
                			<tr>
                				@php
                					$customer_information = $data->dapros;
                					$call_status_detail = $data->call_status_detail;
                					if ($call_status_detail->value_call_status_detail == 1 OR $call_status_detail->value_call_status_detail == 3) {
                						$label_color = "success";
                					}
                					elseif ($call_status_detail->value_call_status_detail == 2 ) {
                						$label_color = "warning";
                					}
                					else{
                						$label_color = "danger";
                					}
                					$user = $data->call_agent;
                				@endphp
		                        <th scope="row">1</th>
		                        <td>{{ $customer_information->MSISDN_MASK }}</td>
		                        <td>{{ $customer_information->NAME_MASK }}</td>
		                        <td><span class="label label-{{ $label_color }}">{{ $call_status_detail->value_call_status_detail }}</span> </td>
		                        <td>{{ $data->call_am_datetime }}</td>
		                        <td>{{ $data->call_fu_datetime }}</td>
		                        <td>{{ $data->call_information }}</td>
		                        <td>{{ $data->call_attempts }}</td>
		                        <td>{{ $data->call_consume_datetime }}</td>
		                        <td>{{ $user->name }}</td>
		                        <td>ACTIONS</td>
		                    </tr>
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
</div>

@endsection
