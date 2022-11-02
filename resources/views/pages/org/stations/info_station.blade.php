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
                      <span class="text-xs text-secondary"> Page</span>
                    </a>
                    |
                    <a href="#" class="cursor-pointer text-secondary">
                        <span class="text-xs text-secondary">Dashboard </span>
                      </a>
                      |
                      <a href="#" class="cursor-pointer text-secondary">
                        <span class="text-xs text-secondary"> Page</span>
                      </a>
                      |
                      <a href="#" class="cursor-pointer text-secondary">
                        <span class="text-xs text-secondary">Dashboard </span>
                      </a>
                      |
                      <a href="#" class="cursor-pointer text-secondary">
                        <span class="text-xs text-secondary"> Page</span>
                      </a>
                </div>
                <h6 class="font-weight-bolder mb-0">Station</h6>
                <p> Edit station</p>
                <div>
                    <a href="{{back()}}" class="btn btn-default border-radius-xs">Back</a>
                    <a href="{{route('show_add_inventory')}}" class="btn btn-primary border-radius-xs">Add Inventory</a>
                    <a href="{{route('list_station_inventories', ['id' => $station->id])}}" class="btn btn-secondary border-radius-xs">List Inventories</a>
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

<div class="row">
    <div class="col-lg-12">
        <form class="multisteps-form__form mb-8" style="height: 406px;" action="{{route('update_station_info', ['id'=>$station->id])}}" method="post">
            @csrf
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0">Station Profile</p>
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
              <p class="text-uppercase text-sm">clusters</p>
              {{-- @if (count($station->clusters) > 0)
              @foreach ($station->clusters as $c)
              <div class="row mt-3">
                <div class="col-6">
                  <label>cluster Info</label>
                      <input disabled class="form-control" type="text"  value="{{$c->name ?? "Not specified"}}">
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
              @endforeach
              @else
              <div class="row">
                <div class="col-12" align="center">
                  <span> No cluster found for this station. Want to create one? <a href="#">Click here</a></span>
                </div>
              </div>
              @endif --}}
              
            </div>
          </div>
        </form>
            
    </div>

    
</div>


@endsection