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
                        <span class="text-xs text-secondary">Station </span>
                      </a>
                      |
                      <a href="#" class="cursor-pointer text-secondary">
                        <span class="text-xs text-secondary">Info </span>
                      </a>
                      |
                      <a href="#" class="cursor-pointer text-secondary">
                        <span class="text-xs text-secondary"> Page</span>
                      </a>
                </div>
                <h6 class="font-weight-bolder mb-0">Station</h6>
                <p> Info station</p>
                <div>
                    <a onclick="history.back()" class="btn btn-default border-radius-xs">Back</a>
                    <a href="{{route('show_add_inventory')}}" class="btn btn-primary border-radius-xs">Add Inventory</a>
                    <a href="{{route('list_station_inventories', ['id' => $station->id])}}" class="btn btn-secondary border-radius-xs">Inventories</a>
                    <a href="{{route('add_station_cluster', ['id' => $station->id])}}" class="btn btn-primary border-radius-xs">Add Business Point</a>
                    <a href="{{route('list_station_clusters', ['id' => $station->id])}}" class="btn btn-secondary border-radius-xs">Business Point</a>
                    {{-- <button type="button" class="btn btn-info border-radius-xs">Info</button>
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
<br>
@include('layouts.flash')

<div class="row">
    <div class="col-lg-12">
        <form class="multisteps-form__form mb-8" style="height: 406px;" action="{{route('update_station_info', ['id'=>$station->id])}}" method="post">
            @csrf
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0">Station Profile</p>
                  <i class="ni ni-button-power mb-0 mx-2 btn-tooltip" 
                  data-bs-toggle="tooltip" 
                  data-bs-placement="top" 
                  id="active"
                  title="{{$station->active == 1 ? 'Deactivate Station' : 'Activate Station'}}" 
                  data-container="body" data-animation="true" style="font-size: 18px;" 
                  {{-- onclick="argon.showSwal('auto-close');" --}}
                   ></i>
                
                  @if ($station->active == 1)
                    <span class="badge bg-gradient-success" id="ac">Active</span>
                  @else
                    <span class="badge bg-gradient-warning" id="inac">Inactive</span>
                  @endif
                  <button type="button" class="btn btn-dark btn-sm m-1" data-bs-toggle="modal" data-bs-target="#pendingSupply">
                    <span>Supplies on the way</span>
                    <span class="badge badge-primary">{{count($pending_supplies)}}</span>
                  </button>

                  {{-- @if ($supply_history)
                  <a href="" class="btn btn-dark btn-sm m-1">
                    <span>Supply History</span>
                  </a>
                  @endif --}}

                  <span class="badge bg-gradient-success d-none" id="ac">Active</span>
                  <span class="badge bg-gradient-warning d-none" id="inac">Inactive</span>
                  <button class="btn btn-primary btn-sm ms-auto" type="submit">Update</button>
                
              </div>
            </div>
            <div class="card-body">
              <p class="text-uppercase text-sm">Station Information</p>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Name</label>
                    <input class="form-control" type="text" name="name" value="{{$station->name}}" >
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Location</label>
                    <select class="multisteps-form__select form-control" name="location" required>
                        <option value="{{$station->loc->id}}">{{$station->loc->location->name}}</option>
                        @foreach (Auth::user()->org->locations as $l)
                            <option value="{{$l->id}}" @selected(old('location') == $l)>
                              {{$l->location->name}}
                            </option>
                        @endforeach
                    </select>
                  </div>
                </div>
            </div>
            <hr class="horizontal dark">
            <p class="text-uppercase text-sm">Contact Information</p>
            <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Address</label>
                      <input class="form-control" type="text" name="address" value="{{$station->address ?? "Not specified"}}">
                    </div>
                  </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Contact</label>
                    <input class="form-control" type="text" name="contact" value="{{$station->contact ?? "Not specified"}}">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Country</label>
                    <input class="form-control" type="text" value="Nigeria">
                  </div>
                </div>
              </div>
              <hr class="horizontal dark">
              <p class="text-uppercase text-sm">Staff's</p>
                
                <div class="row mt-3">
                  <div class="col-6">
                    <label>Choose station manager</label>
                        <select class="multisteps-form__select form-control" name="manager" id="choices-category">
                           <option value="{{$station->manager->id}}">{{$station->manager->name}}</option>
                          @foreach ($managers as $manager)
                              <option value="{{$manager->id}}">{{$manager->name}}</option>
                          @endforeach
                        </select>
                  </div>
                  <div class="col-6">
                    <label>Choose station manager</label>
                        <ul>
                          @foreach ($managers as $manager)
                              <li>{{$manager->name}}</li>
                          @endforeach
                        </ul>
                  </div>
                </div>

              <hr class="horizontal dark">
              <p class="text-uppercase text-sm">Business Points</p>
              @if (count($station->clusters) > 0)
              @foreach ($station->clusters as $c)
              <div class="row mt-3">
                <div class="col-6">
                  <label>cluster Info</label>
                      <input disabled class="form-control" type="text"  value="{{$c->cluster_type->name ?? "Not specified"}}">
                      <span>{{$c->supervisor->name}}</span>
                </div>
                @if ($c->type == 'tanks')
                <div class="col-6">
                  <label>sub cluster</label>
                    <ul>
                        @foreach ($c->tanks as $sub)
                            <li>{{$sub->name}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
              </div>
              <hr class="horizontal dark">
              @endforeach
              @else
              <div class="row">
                <div class="col-12" align="center">
                  <span> No Business Point found for this station. Want to create one? <a href="{{route('add_station_cluster', ['id' => $station->id])}}">Click here</a></span>
                </div>
              </div>
              @endif
              
            </div>
          </div>
        </form>
            
    </div>    
</div>

<!-- Modal pending supplies -->
<div class="modal fade" id="pendingSupply" tabindex="-1" role="dialog" aria-labelledby="pendingSupplyLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pending Supplies ({{count($pending_supplies)}})</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card">
          <div class="card-body pt-4 p-3">
            <ul class="list-group">
              @if (count($pending_supplies) > 0)
              @foreach ($pending_supplies as $ps)    
              <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                <div class="d-flex flex-column">
                  <h6 class="mb-3 text-sm">{{$ps->inventory->name}}</h6>
                  <span class="mb-1 text-xs">Company Name: <span class="text-dark font-weight-bold ms-sm-2">{{$ps->d_company->name}}</span></span>
                  <span class="mb-1 text-xs">Driver: <span class="text-dark ms-sm-2 font-weight-bold">{{$ps->dispatcher_name}}</span></span>
                  <span class="mb-1 text-xs">Plate Number: <span class="text-dark ms-sm-2 font-weight-bold">{{$ps->v_plate_number}}</span></span>
                  <span class="mb-1 text-xs">Quantity Dispatched: <span class="text-dark ms-sm-2 font-weight-bold">{{$ps->quantity_dispatched}} {{$ps->inventory->unit}}</span></span>
                  <span class="mb-1 text-xs">Dispatch Date: <span class="text-dark ms-sm-2 font-weight-bold">{{$ps->dispatch_time}}</span></span>
                </div>
                <div class="ms-auto text-end">
                  {{-- <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i
                      class="far fa-trash-alt me-2"></i>Delete</a> --}}
                  <a class="btn btn-link text-dark px-3 mb-0" href="{{route('show_update_dispatch', ['id'=>$ps->id])}}"><i class="fas fa-pencil-alt text-dark me-2"
                      aria-hidden="true"></i>Recieve Supply</a>
                </div>
              </li>
              @endforeach
              @else 
              <li class="list-group-item border-0 bg-gray-100 border-radius-lg">
                {{-- <div class="d-flex flex-column" style="text-align: center;"> --}}
                  <h6 class="text-sm">No Supply found on the way.</h6>
                  {{-- <span class="mb-1 text-xs">Dispatch Date: <span class="text-dark ms-sm-2 font-weight-bold">{{$ps->dispatch_time}}</span></span> --}}
                {{-- </div> --}}
              </li>
              @endif
            </ul>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
$(document).ready(function () {
            
	$('#active').on('click', function() {
        var req_value = {{$station->id}};
        argon.showSwal('auto-close');
        console.log(req_value);
        	    $.ajax({
        	        url:"{{ route('activation_station', ['id' => $station->id]) }}",
        	        type:"GET",
        	        data:{'data':req_value},
        	        success:function (data) {
                    location.reload();
        	        }
        	    })
    	});
});
</script>
@endsection