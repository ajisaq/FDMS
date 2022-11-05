@extends('layouts.app')
@include('pages.org.menu')
@include('pages.org.nav')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col">
        <div class="card border-radius-xs">
          <div class="card-body p-3 position-relative">
            <div class="row">
            <div class="col text-start">
                <div class="dropdown text-end">
                     <a href="#" class="cursor-pointer text-secondary">
                      <span class="text-xs text-secondary">Dashboard </span>
                    </a>
                    |
                    <a href="#" class="cursor-pointer text-secondary">
                      <span class="text-xs text-secondary"> Supply</span>
                    </a>
                      |
                    <a href="#" class="cursor-pointer text-secondary">
                        <span class="text-xs text-secondary">Update</span>
                      </a>
                </div>
                <h6 class="font-weight-bolder mb-0">Recieve Supply</h6>
                <p> Confirm Delivery</p>
                <div> 
                  <a onclick="history.back()" class="btn btn-default border-radius-xs">Back</a>
                    {{-- <button type="button" class="btn btn-primary border-radius-xs">Primary</button>
                    <button type="button" class="btn btn-secondary border-radius-xs">Secondary</button>
                    <button type="button" class="btn btn-info border-radius-xs">Info</button>
                    <button type="button" class="btn btn-success border-radius-xs">Success</button>
                    <button type="button" class="btn btn-danger border-radius-xs">Danger</button>
                    <button type="button" class="btn btn-warning border-radius-xs">Warning</button> --}}
                </div>

            </div>

            </div>
          </div>
        </div>
      </div>
     
    </div>

    <div class="row">
    </div>


<div class="card mt-4" id="basic-info">
  <div class="card-header">
    <h5> Supply Info</h5>
  </div>
  <div class="card-body pt-0">
    <form action="{{route('update_dispatch', ['id'=>$supply->id])}}" method="POST">
    @csrf
    <div class="row">
      <div class="col-6">
        <label class="form-label">Dispatcher Name</label>
        <div class="input-group">
          <input disabled id="dispatcher_name" value="{{$supply->dispatcher_name}}" class="form-control" type="text" placeholder="Alex"
            required="required">
          </div>
          
      </div>
      <div class="col-6">
        <label class="form-label">Dispatch Company</label>
        <div class="input-group">
          <input disabled value="{{$supply->d_company->name}}" class="form-control" type="text" placeholder="Necodes"
            required="required">
        </div>
      </div>
    </div>
    {{-- <div class="row">
      <div class="col-sm-6 col-6">
        <label class="form-label mt-4">Station</label>
        <select disabled class="form-control station" name="station" id="station">
          <option value="{{$supply->station->id}}">{{$supply->station->name}}</option>
         
        </select>
      </div>
      <div class="col-sm-6 col-6">
        <label class="form-label mt-4">Product</label>
        <select disabled class="form-control inventory" name="inventory" id="inventory" disabled>
          <option value="{{$supply->inventory->id}}" selected>{{$supply->inventory->name}}</option>
        </select>
      </div>
    </div> --}}
    <div class="row">
      <div class="col-sm-4 col-6">
        <label class="form-label mt-4">Location <small>(*1)</small></label>
        <select class="form-control " disabled>
          <option>{{$supply->station->loc->location->name}}</option>          
        </select>
      </div>
      <div class="col-sm-4 col-6">
        <label class="form-label mt-4">Station <small>(*2)</small></label>
        <select class="form-control" name="station" disabled>
          <option value="{{$supply->station->id}}">{{$supply->station->name}}</option>
        </select>
      </div>
      <div class="col-sm-4 col-6">
        <label class="form-label mt-4">Product <small>(*4)</small></label>
        <select class="form-control" disabled>
          <option value="{{$supply->inventory->id}}" selected>{{$supply->inventory->name}}</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-4">
        <label class="form-label mt-4">Dispatch Quantity</label>
        <div class="input-group">
          <input disabled id="q" value="{{$supply->quantity_dispatched}}" class="form-control" type="number" placeholder="45000">
        </div>
      </div>
      <div class="col-4">
        <label class="form-label mt-4">Vehicle plate Number</label>
        <div class="input-group">
          <input disabled id="v" value="{{$supply->v_plate_number}}" class="form-control" type="text"
            placeholder="ABC123YZ">
        </div>
      </div>
      <div class="col-4">
        <label class="form-label mt-4">Dispatch Date</label>
        <div class="input-group">
          <input disabled id="v" value="{{$supply->dispatch_time}}" class="form-control datepicker" type="date"
            placeholder="mm/dd/yy eg. 24/01/2022">
        </div>
      </div>
    </div>

    {{-- comfime mation by manager --}}
    <div class="row">
      <div class="col-4">
        <label class="form-label mt-4">Quantity Recieved</label>
        <div class="input-group">
          <input id="q" name="quantity_recieved" class="form-control" type="number" placeholder="eg. 45000">
        </div>
      </div>
      <div class="col-4">
        <label class="form-label mt-4">Remark</label>
        <div class="input-group">
          <textarea id="t" name="remark" class="form-control" 
            placeholder="eg. I like the Rider...."></textarea>
        </div>
      </div>
      <div class="col-4">
        <label class="form-label mt-4">Arrival Date</label>
        <div class="input-group">
          <input id="v" name="arival_time" class="form-control datepicker" type="date"
            placeholder="mm/dd/yy eg. 24/01/2022">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 align-self-center">
        <button class="btn bg-gradient-dark ms-auto mb-0 mt-3 " style="float: right;" type="submit" title="Open dispatch">Update</button>
      </div>
    </div>
    </form>
  </div>
</div>
    
</div>


@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
$(document).ready(function () {
            
	$('.station').on('change', function() {
        var req_value = this.value;
        console.log(req_value);
        	    $.ajax({
		
        	        url:"{{ route('get_inventory_by_station', ['id'=> "req_value"]) }}",
		
        	        type:"GET",
		
        	        data:{'data':req_value},
		
        	        success:function (data) {
                    console.log(data);
        	            $('#inventory').html(data);
                      $('#inventory').removeAttr('disabled');

        	        }
        	    })

    	});
});
</script>
@endsection
