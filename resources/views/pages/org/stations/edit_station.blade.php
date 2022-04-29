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

    {{-- <div class="row mt-4">
      <div class="col-lg-12">
        <div class="card h-100 border-radius-xs">
          <div class="card-header pb-0 p-3">
            <div class="d-flex justify-content-between">
              <h6 class="mb-0">Stations</h6>
            </div>
          </div>
          <div class="card-body p-3">
            <div class="chart">
             <h1>Content</h1>
            </div>
          </div>
        </div>
      </div>

    </div> --}}

    <div class="row">
      <div class="col-lg-12">
        <div class="multisteps-form">
            <div class="row">
              <div class="col-12 col-lg-8 mx-auto mt-4 mb-sm-5 mb-3">
                <div class="multisteps-form__progress">
                  <button class="multisteps-form__progress-btn js-active" type="button" title="Station Info">
                    <span>1. Station Info</span>
                  </button>
                  <button class="multisteps-form__progress-btn" type="button" title="Others">2.Othes</button>
                  <button class="multisteps-form__progress-btn" type="button" title="Supervisor">3. Superisor</button>
                  <button class="multisteps-form__progress-btn" type="button" title="manager">4.Manager</button>

                </div>
              </div>
            </div>
            <!--form panels-->
            <div class="row">
              <div class="col-12 col-lg-8 m-auto">
                <form class="multisteps-form__form mb-8" style="height: 406px;" action="{{route('update_station_info', ['id'=>$station->id])}}" method="post">
                  @csrf
                  <!--single form panel-->
                  <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active" data-animation="FadeIn">
                    <h5 class="font-weight-bolder">Station Information</h5>
                    <div class="multisteps-form__content">
                      <div class="row mt-3">
                        <div class="col-12 col-sm-6">
                          <label>Name</label>
                          <input name="name" value="{{$station->name}}" class="multisteps-form__input form-control" type="text" placeholder="eg. Station name " onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                          <label>Location</label>
                          <input name="location" value="{{$station->location}}" class="multisteps-form__input form-control" type="text" placeholder="eg. Abuja" onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-12 col-sm-6">
                          <label>Address</label>
                          <input name="address" value="{{$station->address ?? "Not specified"}}" class="multisteps-form__input form-control" type="text" placeholder="eg. 123 example street" onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                          <label>contact</label>
                          <input name="contact" value="{{$station->contact ?? "Not specified"}}" class="multisteps-form__input form-control" type="text" placeholder="eg. phone or email" onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                      </div>
                      <div class="button-row d-flex mt-4">
                        <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Next</button>
                      </div>
                    </div>
                  </div>
                  <!--single form panel-->
                  <div class="card multisteps-form__panel p-3 border-radius-xl bg-white" data-animation="FadeIn">
                    <h5 class="font-weight-bolder">Others</h5>
                    <div class="multisteps-form__content">
                      <div class="row mt-3">
                        <div class="col-12 col-sm-6">
                          <label>Number Of Clusters</label>
                          <input name="no_of_clusters" value="{{$station->no_of_clusters}}" class="multisteps-form__input form-control" type="text" placeholder="eg. 50" onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                          <label>Number Of POS</label>
                          <input name="no_of_pos" value="{{$station->no_of_pos}}" class="multisteps-form__input form-control" type="text" placeholder="eg. 100" onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                      </div>
                      <div class="button-row d-flex mt-4">
                        <button class="btn bg-gradient-secondary mb-0 js-btn-prev" type="button" title="Prev">Prev</button>
                        <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Next</button>
                      </div>
                    </div>
                  </div>
                  <!--single form panel-->
                  <div class="card multisteps-form__panel p-3 border-radius-xl bg-white" data-animation="FadeIn">
                    <h5 class="font-weight-bolder">Supervisor</h5>
                    <div class="multisteps-form__content">
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
                      <div class="row">
                        <div class="button-row d-flex mt-4 col-12">
                          <button class="btn bg-gradient-secondary mb-0 js-btn-prev" type="button" title="Prev">Prev</button>
                          <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Next</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--single form panel-->
                  <div class="card multisteps-form__panel p-3 border-radius-xl bg-white h-100" data-animation="FadeIn">
                    <h5 class="font-weight-bolder">Manager</h5>
                    <div class="multisteps-form__content mt-3">
                      
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
                      <div class="button-row d-flex mt-4">
                        <button class="btn bg-gradient-secondary mb-0 js-btn-prev" type="button" title="Prev">Prev</button>
                        <button class="btn bg-gradient-dark ms-auto mb-0" type="submit" title="Send">Add</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
      </div>
    </div>

    
</div>


@endsection
