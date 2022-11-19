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
                        <span class="text-xs text-secondary"> Config</span>
                      </a>
                      |
                    <a href="#" class="cursor-pointer text-secondary">
                        <span class="text-xs text-secondary"> Dispatch Company</span>
                      </a>
                      |
                    <a href="#" class="cursor-pointer text-secondary">
                        <span class="text-xs text-secondary">Add </span>
                      </a>
                </div>
                <h6 class="font-weight-bolder mb-0">Dispatch Company</h6>
                <p> Add new Dispatch Company</p>
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
      <div class="col-lg-12">
        <div class="multisteps-form">
            <div class="row">
              <div class="col-12 col-lg-8 mx-auto mt-4 mb-sm-5 mb-3">
                {{-- <div class="multisteps-form__progress">
                  <button class="multisteps-form__progress-btn js-active" type="button" title="Add Cluster Info">
                    <span>1. cluster Type</span>
                  </button>
                </div> --}}
              </div>
            </div>
            <!--form panels-->
            <div class="row">
              <div class="col-12 col-lg-8 m-auto">
                <form class="multisteps-form__form mb-8" style="height: 406px;" action="{{route('store_d_company')}}" method="post">
                  @csrf
                  <!--single form panel info-->
                  <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active" data-animation="FadeIn">
                    <h5 class="font-weight-bolder">Information</h5>
                    <div class="multisteps-form__content">
                      <div class="row mt-3">
                        <div class="col-6 col-sm-6">
                          <label>Name</label>
                          <input required name="name" class="multisteps-form__input form-control" type="text" placeholder="eg. Cluster type name " onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                        <div class="col-6 col-sm-6">
                          <label>Phone</label>
                          <input required name="phone" class="multisteps-form__input form-control" type="number" placeholder="eg. 2348167236629" onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                      </div>
                      <div class="col-12 col-sm-12">
                        <label>Location</label>
                        <select class="multisteps-form__input form-control station" name="location" id="location">
                          <option disabled selected>Select Location</option>
                          @if (count($locations) > 0)
                          @foreach ($locations as $l)
                          <option value="{{$l->id}}">{{$l->location->name}}</option>
                          @endforeach
                          @endif
                        </select>
                      </div>
                      <div class="row">
                        <div class="button-row d-flex mt-4 col-12">
                          <button class="btn bg-gradient-dark ms-auto mb-0" type="submit" title="Send">Add</button>
                        </div>
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

