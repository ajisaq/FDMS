@extends('layouts.app')
@include('pages.org.menu')
@include('pages.org.nav')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-sm-4">
        <div class="card border-radius-xs">
          <div class="card-body p-3 position-relative">
            <div class="row">
              <div class="col-7 text-start">
                <p class="text-sm mb-1 text-uppercase font-weight-bold">Sales</p>
                <h5 class="font-weight-bolder mb-0">
                  NGN 0
                </h5>
                <span class="text-sm text-end text-success font-weight-bolder mt-auto mb-0">+55% <span class="font-weight-normal text-secondary">since last month</span></span>
              </div>
              <div class="col-5">
                {{-- <div class="dropdown text-end">
                  <a href="javascript:;" class="cursor-pointer text-secondary" id="dropdownUsers1" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="text-xs text-secondary">6 May - 7 May</span>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end px-2 py-3" aria-labelledby="dropdownUsers1">
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Last 7 days</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Last week</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Last 30 days</a></li>
                  </ul>
                </div> --}}
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-4 mt-sm-0 mt-4">
        <div class="card border-radius-xs">
          <div class="card-body p-3 position-relative">
            <div class="row">
              <div class="col-7 text-start">
                <p class="text-sm mb-1 text-uppercase font-weight-bold">Customers</p>
                <h5 class="font-weight-bolder mb-0">
                  3200
                </h5>
                <span class="text-sm text-end text-success font-weight-bolder mt-auto mb-0">+12% <span class="font-weight-normal text-secondary">since last month</span></span>
              </div>
              <div class="col-5">
                <div class="dropdown text-end">
                  <a href="javascript:;" class="cursor-pointer text-secondary" id="dropdownUsers2" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="text-xs text-secondary">6 May - 7 May</span>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end px-2 py-3" aria-labelledby="dropdownUsers2">
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Last 7 days</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Last week</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Last 30 days</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-4 mt-sm-0 mt-4">
        <div class="card border-radius-xs">
          <div class="card-body p-3 position-relative">
            <div class="row">
              <div class="col-7 text-start">
                <p class="text-sm mb-1 text-uppercase font-weight-bold">Staff's</p>
                <h5 class="font-weight-bolder mb-0">
                  ..
                </h5>
                <span class="font-weight-normal text-secondary text-sm"><span class="font-weight-bolder">+$213</span> last month</span>
              </div>
              <div class="col-5">
                <div class="dropdown text-end">
                  <a href="javascript:;" class="cursor-pointer text-secondary" id="dropdownUsers3" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="text-xs text-secondary">6 May - 7 May</span>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end px-2 py-3" aria-labelledby="dropdownUsers3">
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Last 7 days</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Last week</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Last 30 days</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    {{-- <div class="row mt-4">
        <div class="col-lg-7 mb-lg-0 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize">Sales overview</h6>
              <p class="text-sm mb-0">
                <i class="fa fa-arrow-up text-success"></i>
                <span class="font-weight-bold">4% more</span> in 20222
              </p>
            </div>
            <div class="card-body p-3">
              <div class="chart">
                <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-5">
          <div class="card">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0">Categories</h6>
            </div>
            <div class="card-body p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                      <i class="ni ni-mobile-button text-white opacity-10"></i>
                    </div>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Devices</h6>
                      <span class="text-xs">250 in stock</span>
                    </div>
                  </div>
                  <div class="d-flex">
                    <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                      <i class="ni ni-tag text-white opacity-10"></i>
                    </div>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Stations</h6>
                      <span class="text-xs">123 open, <span class="font-weight-bold">15 closed</span></span>
                    </div>
                  </div>
                  <div class="d-flex">
                    <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                      <i class="ni ni-mobile-button text-white opacity-10"></i>
                    </div>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Pos</h6>
                      <span class="text-xs font-weight-bold">+ 430</span>
                    </div>
                  </div>
                  <div class="d-flex">
                    <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                      <i class="ni ni-satisfied text-white opacity-10"></i>
                    </div>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Happy users</h6>
                      <span class="text-xs font-weight-bold">+ 430</span>
                    </div>
                  </div>
                  <div class="d-flex">
                    <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                      <i class="ni ni-box-2 text-white opacity-10"></i>
                    </div>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Error logs</h6>
                      <span class="text-xs">1 is active, <span class="font-weight-bold">40 closed</span></span>
                    </div>
                  </div>
                  <div class="d-flex">
                    <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                  </div>
                </li>
                
              </ul>
            </div>
          </div>
        </div>
    </div> --}}

    @include('layouts.flash')
    <div class="row mt-4">
      <div class="col-lg-12">
        {{-- <form class="multisteps-form__form mb-8" style="height: 406px;" action="{{route('update_station_info', ['id'=>$station->id])}}" method="post"> --}}
            {{-- @csrf --}}
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0">Station Profile </p>
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

                  <div class="ms-auto">
                    @if ($ocstation)
                      @if ($ocstation->action == '1')
                        <button class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#Modal_c">Close</button>
                      @else
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#Modal_o">Open</button>
                      @endif
                    @else
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#Modal_o">Open</button>
                    @endif
                  </div>
                
              </div>
            </div>
            <div class="card-body">
              <p class="text-uppercase text-sm">Station Information</p>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Name</label>
                    <input class="form-control" type="text" disabled value="{{$station->name}}" >
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Location</label>
                    <select class="multisteps-form__select form-control" disabled>
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
                      <input class="form-control" type="text" disabled value="{{$station->address ?? "Not specified"}}">
                    </div>
                  </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Contact</label>
                    <input class="form-control" type="text" disabled value="{{$station->contact ?? "Not specified"}}">
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
                    <label>Station manager</label>
                    <input disabled class="form-control" type="text" value="{{$station->manager->name}}">
                  </div>
                  <div class="col-6">
                    <label>Supervisors</label>
                        <ul>
                          {{-- @foreach ($managers as $manager)
                              <li>{{$manager->name}}</li>
                          @endforeach --}}
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
        {{-- </form> --}}

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


<!--Opening of station Modal -->
<div class="modal fade" id="Modal_o" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{route('open_station', ['id'=> $station->id])}}" method="POST">
      @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Open Station</h5>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-12 col-sm-12 mb-3">
            <label>Date - Time</label>
            <span id="time" class="multisteps-form__input form-control"> </span>
            <input name="time" id="input_time" class="multisteps-form__input form-control" type="hidden">
          </div>
          <label for="ccc">Clusters</label>
          @foreach ($station->clusters as $c)
          @if ($c->type == 'tanks')
          <input name="cluster[{{$c->id}}]" value="{{$c->id}}" type="hidden">
          <div class="col-12 col-sm-12">
            <label>{{$c->cluster_type->name}}</label>
                <div>
                  <small>Sub Clusters</small>
                    <ul>
                        @foreach ($c->tanks as $sub)
                            <div class="row mb-1">
                              <div class="col-3">
                                <input name="sub_cluster[{{$c->id}}][{{$sub->id}}]" value="{{$sub->id}}" type="hidden">
                                <p style="float: right;">{{$sub->name}}: </p>
                              </div>
                              <div class="col-9">
                                <input name="meter_r[{{$c->id}}][{{$sub->id}}]" value="" class="multisteps-form__input form-control" type="number" placeholder="Meter Reading">
                              </div>
                            </div>
                        @endforeach
                    </ul>
                </div>
                {{-- <small><label for="">{{}}</label></small> --}}
                {{-- <input name="cluster[{{$c}}]" class="multisteps-form__input form-control" type="hidden" placeholder="eg. time"> --}}
          </div>
          @endif
          @endforeach
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Open Now</button>
      </div>
    </div>
    </form>
  </div>
</div>


<!--Closing of station Modal -->
<div class="modal fade" id="Modal_c" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{route('close_station', ['id'=> $station->id])}}" method="POST">
      @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Close Station</h5>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-12 col-sm-12 mb-3">
            <label>Date - Time</label>
            <span id="time_c" class="multisteps-form__input form-control"> </span>
            <input name="time" id="input_time_c" class="multisteps-form__input form-control" type="hidden">
          </div>
          <label for="ccc">Clusters</label>
          @foreach ($station->clusters as $c)
          @if ($c->type == 'tanks')
          <input name="cluster[{{$c->id}}]" value="{{$c->id}}" type="hidden">
          <div class="col-12 col-sm-12">
            <label>{{$c->cluster_type->name}}</label>
                <div>
                  <small>Sub Clusters</small>
                    <ul>
                        @foreach ($c->tanks as $sub)
                            <div class="row mb-1">
                              <div class="col-3">
                                <input name="sub_cluster[{{$c->id}}][{{$sub->id}}]" value="{{$sub->id}}" type="hidden">
                                <p style="float: right;">{{$sub->name}}: </p>
                              </div>
                              <div class="col-9">
                                <input name="meter_r[{{$c->id}}][{{$sub->id}}]" value="" class="multisteps-form__input form-control" type="number" placeholder="Meter Reading">
                              </div>
                            </div>
                        @endforeach
                    </ul>
                </div>
          </div>
          @endif
          @endforeach
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Close</button>
      </div>
    </div>
    </form>
  </div>
</div>
@endsection

@section('script')
    <script>
      function refreshTime() {
        const timeDisplay = document.getElementById("time");
        const inputTime = document.getElementById("input_time");
        const timeDisplayc = document.getElementById("time_c");
        const inputTimec = document.getElementById("input_time_c");
        const dateString = new Date().toISOString();
        const date = new Date().toDateString();
        const time = new Date().toLocaleTimeString();
        const formattedString = date+" - "+time; 

        timeDisplay.textContent = formattedString;
        inputTime.value = dateString;

        timeDisplayc.textContent = formattedString;
        inputTimec.value = dateString;
      }

      setInterval(refreshTime, 1000);
    </script>
@endsection