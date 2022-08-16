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
                        <span class="text-xs text-secondary">Info </span>
                      </a>
                </div>
                <h6 class="font-weight-bolder mb-0">Category</h6>
                <p>Category Info</p>
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
        <form class="multisteps-form__form mb-8" style="height: 406px;" action="{{route('update_category_info', ['id'=>$category->id])}}" method="post">
            @csrf
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0 text-uppercase">Category Info</p>
                <button class="btn btn-primary btn-sm ms-auto" type="submit">Update</button>
              </div>
            </div>
            <div class="card-body">
              {{-- <p class="text-uppercase text-sm">device Information</p> --}}
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Name</label>
                    <input class="form-control" type="text" name="name" value="{{$category->name}}" >
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Type</label>
                    <input class="form-control" type="text" name="type" value="{{$category->type}}" >
                  </div>
                </div>
            </div>
              
            </div>
          </div>
        </form> 
    </div>
    
</div>


@endsection