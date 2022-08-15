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
                    <input class="form-control" type="text" name="location" value="{{$station->location}}">
                  </div>
                </div>
            </div>
            <div class="row mt-3">
              <div class="col-16 col-sm-6">
                <label>Number Of Clusters</label>
                <input name="no_of_clusters" value="{{$station->no_of_clusters}}" class="multisteps-form__input form-control" type="text" placeholder="eg. 50" onfocus="focused(this)" onfocusout="defocused(this)">
              </div>
              <div class="col-6 col-sm-6 mt-3 mt-sm-0">
                <label>Number Of POS</label>
                <input name="no_of_pos" value="{{$station->no_of_pos}}" class="multisteps-form__input form-control" type="text" placeholder="eg. 100" onfocus="focused(this)" onfocusout="defocused(this)">
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
              <p class="text-uppercase text-sm">About me</p>
                <div class="row mt-3">
                  <div class="col-12">
                    <label>Choose station supervisor</label>
                        <select class="multisteps-form__select form-control" name="supervisor" id="choices-category">
                          <option value="{{$station->supervisor->id}}">{{$station->supervisor->name}}</option>
                          @foreach ($supervisors as $supervisor)
                              <option value="{{$supervisor->id}}" @selected(old('version') == $version)>
                                {{$supervisor->name}}
                              </option>
                          @endforeach
                        </select>
                    {{-- <input class="multisteps-form__input form-control" type="text" placeholder="@argon" onfocus="focused(this)" onfocusout="defocused(this)"> --}}
                  </div>
                </div>
                <div class="row mt-3">
                        <div class="col-12">
                          <label>Choose station manager</label>
                              <select class="multisteps-form__select form-control" name="manager" id="choices-category">
                                 <option value="{{$station->manager->id}}">{{$station->manager->name}}</option>
                                @foreach ($managers as $manager)
                                    <option value="{{$manager->id}}">{{$manager->name}}</option>
                                @endforeach
                              </select>
                          {{-- <input class="multisteps-form__input form-control" type="text" placeholder="@argon" onfocus="focused(this)" onfocusout="defocused(this)"> --}}
                        </div>
                      </div>
              
            </div>
          </div>
        </form>
            
    </div>

    
</div>


@endsection