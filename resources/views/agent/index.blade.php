@extends('layouts.app')

@section('content')
<div class="row">
    <div class="row">
    	<div class="col-md-4">
    		<div class="panel panel-white">
	            <div class="panel-body">
	                <form id="get-data-form">
	                	@csrf
                    	<button type="submit" class="btn btn-primary">Sampling Data dulu</button>
                    </form>
	            </div>
	        </div>
    	</div>
    	<div class="col-md-8">
    		<div class="panel panel-white">
	            <div class="panel-body">
	            	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
	            		<label for="brand" class="col-sm-2">Brand</label>
	            		<input type="text" name="brand" id="brand" class="form-control" value="" readonly="readonly" pattern="" title="">
	            	</div>
	            	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
	            		<label for="row_num" class="col-sm-2">ROW_NUM</label>
	            		<input type="text" name="row_num" id="row_num" class="form-control" value="" readonly="readonly" pattern="" title="">
	            	</div>
	            	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
	            		<label for="row_num" class="col-sm-2">MSISDN_MASK</label>
	            		<input type="text" name="msisdn_mask" id="msisdn_mask" class="form-control" value="" readonly="readonly" pattern="" title="">
	            	</div>
	            	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
	            		<label for="row_num" class="col-sm-2">MSISDN</label>
	            		<input type="text" name="msisdn" id="msisdn" class="form-control" value="" readonly="readonly" pattern="" title="">
	            	</div>
	            	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
	            		<label for="row_num" class="col-sm-2">NAME_MASK</label>
	            		<input type="text" name="name_mask" id="name_mask" class="form-control" value="" readonly="readonly" pattern="" title="">
	            	</div>
	            	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
	            		<label for="row_num" class="col-sm-2">CUSTOMER_SUBTYPE</label>
	            		<input type="text" name="customer_subtype" id="customer_subtype" class="form-control" value="" readonly="readonly" pattern="" title="">
	            	</div>
	            	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
	            		<label for="row_num" class="col-sm-2">TOT_BILL_AMOUNT</label>
	            		<input type="text" name="tot_bill_amount" id="tot_bill_amount" class="form-control" value="" readonly="readonly" pattern="" title="">
	            	</div>
	            	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
	            		<label for="row_num" class="col-sm-2">TOTAL_REVENUE</label>
	            		<input type="text" name="total_revenue" id="total_revenue" class="form-control" value="" readonly="readonly" pattern="" title="">
	            	</div>
	            	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
	            		<label for="row_num" class="col-sm-2">DEVICE_TYPE</label>
	            		<input type="text" name="device_type" id="device_type" class="form-control" value="" readonly="readonly" pattern="" title="">
	            	</div>
	            	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
	            		<label for="row_num" class="col-sm-2">VOL_BROADBAND</label>
	            		<input type="text" name="vol_broadband" id="vol_broadband" class="form-control" value="" readonly="readonly" pattern="" title="">
	            	</div>
	            	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
	            		<label for="row_num" class="col-sm-2">VOL_BROADBAND_PACKAGE</label>
	            		<input type="text" name="vol_broadband_package" id="vol_broadband_package" class="form-control" value="" readonly="readonly" pattern="" title="">
	            	</div>
	            	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
	            		<label for="row_num" class="col-sm-2">CI</label>
	            		<input type="text" name="ci" id="ci" class="form-control" value="" readonly="readonly" pattern="" title="">
	            	</div>
	            	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
	            		<label for="row_num" class="col-sm-2">KABUPATEN</label>
	            		<input type="text" name="kabupaten" id="kabupaten" class="form-control" value="" readonly="readonly" pattern="" title="">
	            	</div>
	            	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
	            		<label for="row_num" class="col-sm-2">LONGITUDE</label>
	            		<input type="text" name="longitude" id="longitude" class="form-control" value="" readonly="readonly" pattern="" title="">
	            	</div>
	            	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
	            		<label for="row_num" class="col-sm-2">LATITUDE</label>
	            		<input type="text" name="latitude" id="latitude" class="form-control" value="" readonly="readonly" pattern="" title="">
	            	</div>
	            	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
	            		<label for="row_num" class="col-sm-2">ODP1</label>
	            		<input type="text" name="odp1" id="odp1" class="form-control" value="" readonly="readonly" pattern="" title="">
	            	</div>
	            	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
	            		<label for="row_num" class="col-sm-2">ODP2</label>
	            		<input type="text" name="odp2" id="odp2" class="form-control" value="" readonly="readonly" pattern="" title="">
	            	</div>
	            	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
	            		<label for="row_num" class="col-sm-2">ODP3</label>
	            		<input type="text" name="odp3" id="odp3" class="form-control" value="" readonly="readonly" pattern="" title="">
	            	</div>
	            </div>
	        </div>
    	</div>
    </div>
</div>
<script type="text/javascript" defer>
	$('#get-data-form').on('submit', function(e){
        e.preventDefault();
        $.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
        $.ajax({
	       type:"post",
	       url:'/agent/data',
	       //data: $( this ).serialize(),
	       success: function(data){
	        console.log(data);
	       },
	        error : function(data) {
	        console.log(data);
	        }
	     }).done(function(){
	     	console.log('done')
	     });

    });
</script>
@endsection
