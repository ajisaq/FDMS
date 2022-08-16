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
                      <span class="text-xs text-secondary"> Category</span>
                    </a>
                    |
                    <a href="#" class="cursor-pointer text-secondary">
                        <span class="text-xs text-secondary">Add </span>
                      </a>
                </div>
                <h6 class="font-weight-bolder mb-0">Category</h6>
                <p> Add new Category</p>
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

    <div class="row">
      <div class="col-lg-12">
        <div class="multisteps-form">
            <div class="row">
              <div class="col-12 col-lg-8 mx-auto mt-4 mb-sm-5 mb-3">
                <div class="multisteps-form__progress">
                  <button class="multisteps-form__progress-btn js-active" type="button" title="Station Info">
                    <span>1. Category Info</span>
                  </button>
                </div>
              </div>
            </div>
            <!--form panels-->
            <div class="row">
              <div class="col-12 col-lg-8 m-auto">
                <form class="multisteps-form__form mb-8" style="height: 406px;" action="{{route('store_category')}}" method="post">
                  @csrf
                  <!--single form panel-->
                  <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active" data-animation="FadeIn">
                    <h5 class="font-weight-bolder">Information</h5>
                    <div class="multisteps-form__content">
                      <div class="row mt-3">
                        <div class="col-12 col-sm-12">
                          <label>Name</label>
                          <input name="name" class="multisteps-form__input form-control" type="text" placeholder="eg. Category name " onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                        <div class="col-12 col-sm-12">
                          <label>Type</label>
                          <input name="type" class="multisteps-form__input form-control" type="text" placeholder="eg. this is a cat... " onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                      </div>
                      <input type="hidden" name="p" value="main">
                      <div class="button-row d-flex mt-4">
                        <button class="btn bg-gradient-dark ms-auto mb-0" type="submit" title="Send">Create</button>
                        {{-- <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Next</button> --}}
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
