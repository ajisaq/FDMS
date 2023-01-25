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
                      <span class="text-xs text-secondary"> Station</span>
                    </a>
                    |
                    <a href="#" class="cursor-pointer text-secondary">
                        <span class="text-xs text-secondary">Device </span>
                      </a>
                      |
                    <a href="#" class="cursor-pointer text-secondary">
                        <span class="text-xs text-secondary">Info </span>
                      </a>
                </div>
                <h6 class="font-weight-bolder mb-0">Device</h6>
                <p>Device Info</p>
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
<br>
@include('layouts.flash')
<div class="row">
    <div class="col-lg-12">
        <form class="multisteps-form__form mb-8" style="height: 406px;" action="{{route('update_device_info', ['id'=>$device->id])}}" method="post">
            @csrf
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0 text-uppercase">device Info <b>({{$device->mac_number}})</b></p>
                <div class="ms-auto">
                  <a href="{{route('show_reset_device', ['device'=>$device->id])}}" class="btn btn-secondary btn-sm ms-auto" type="submit">Reset</a>
                  <button class="btn btn-primary btn-sm ms-auto" type="submit">Update</button>
                </div>
              </div>
            </div>
            <div class="card-body">
              {{-- <p class="text-uppercase text-sm">device Information</p> --}}
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Name</label>
                    <input class="form-control" type="text" name="name" value="{{$device->name}}" >
                  </div>
                </div>
                <div class="col-6 col-md-6">
                    <label>Choose Cluster</label>
                        <select class="multisteps-form__select form-control" name="station" id="choices-category">
                          <option value="{{$device->station->id}}">{{$device->station->name}}</option>
                          @foreach ($stations as $s)
                              <option value="{{$s->id}}" @selected(old('version') == $s)>
                                {{$s->name}}
                              </option>
                          @endforeach
                        </select>
                  </div>
            </div>
              
            </div>
          </div>
        </form> 
    </div>
    
</div>


@endsection