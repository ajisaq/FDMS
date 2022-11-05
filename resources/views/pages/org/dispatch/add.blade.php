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
                        <span class="text-xs text-secondary">Open</span>
                      </a>
                </div>
                <h6 class="font-weight-bolder mb-0">Dispatch</h6>
                <p> Open new Dispatch</p>
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
    <h5>Add Dispatch Info</h5>
  </div>
  <div class="card-body pt-0">
    <form action="{{route('store_dispatch')}}" method="POST">
    @csrf
    <div class="row">
      <div class="col-6">
        <label class="form-label">Dispatcher Name</label>
        <div class="input-group">
          <input id="firstName" name="dispatcher_name" class="form-control" type="text" placeholder="Alex"
            required="required">
          </div>
          
          @error('dispatcher_name')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>
      <div class="col-6">
        <label class="form-label">Dispatch Company</label>
        <div class="input-group">
          <input id="lastName" name="dispatch_company" class="form-control" type="text" placeholder="Necodes"
            required="required">
        </div>
      </div>
      @error('dispatch_company')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
    </div>
    <div class="row">
      <div class="col-sm-6 col-6">
        <label class="form-label mt-4">Station</label>
        <select class="form-control station" name="station" id="station">
          <option disabled selected>Select Station</option>
          @if (count($stations) > 0)
          @foreach ($stations as $s)
          <option value="{{$s->id}}">{{$s->name}}</option>
          @endforeach
          @endif
        </select>
        @error('station')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
      </div>
      <div class="col-sm-6 col-6">
        <label class="form-label mt-4">Product</label>
        <select class="form-control inventory" name="inventory" id="inventory" disabled>
          <option disabled selected>Select Product</option>
        </select>
        @error('inventory')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
      </div>
    </div>
    <div class="row">
      <div class="col-4">
        <label class="form-label mt-4">Quantity</label>
        <div class="input-group">
          <input id="q" name="quantity_dispatched" class="form-control" type="number" placeholder="45000">
        </div>
        @error('quantity_dispatched')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
      </div>
      <div class="col-4">
        <label class="form-label mt-4">Vehicle plate Number</label>
        <div class="input-group">
          <input id="v" name="v_plate_number" class="form-control" type="text"
            placeholder="ABC123YZ">
        </div>
        @error('v_plate_number')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
      </div>
      <div class="col-4">
        <label class="form-label mt-4">Dispatch Date</label>
        <div class="input-group">
          <input id="v" name="dispatch_time" class="form-control datepicker" type="date"
            placeholder="mm/dd/yy eg. 24/01/2022" onfocus="focused(this)" onfocusout="defocused(this)">
        </div>
        @error('dispatch_time')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 align-self-center">
        <button class="btn bg-gradient-dark ms-auto mb-0 mt-3 " style="float: right;" type="submit" title="Open dispatch">Add</button>
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
