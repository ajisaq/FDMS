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
                      <span class="text-xs text-secondary"> config</span>
                    </a>
                    |
                    <a href="#" class="cursor-pointer text-secondary">
                        <span class="text-xs text-secondary">Product </span>
                      </a>
                      |
                    <a href="#" class="cursor-pointer text-secondary">
                        <span class="text-xs text-secondary">Info </span>
                      </a>
                </div>
                <h6 class="font-weight-bolder mb-0">Product</h6>
                <p>Product Info</p>
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

<div class="row">
    <div class="col-lg-12">
        <form class="multisteps-form__form mb-8" style="height: 406px;" action="{{route('update_inventory_info', ['id'=>$inventory->id])}}" method="post">
            @csrf
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0 text-uppercase">device Info</p>
                <button class="btn btn-warning btn-sm ms-auto" type="submit">Delete</button>
                <button class="btn btn-primary btn-sm ms-auto" type="submit">Update</button>
              </div>
            </div>
            <div class="card-body">
              {{-- <p class="text-uppercase text-sm">device Information</p> --}}
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Name</label>
                    <input class="form-control" type="text" name="name" value="{{$inventory->name}}" >
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Unit</label>
                    <input class="form-control" type="text" name="unit" value="{{$inventory->unit}}" >
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Amount</label>
                    <input class="form-control" type="number" name="amount" value="{{$inventory->amount}}" >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-6 col-sm-6">
                  <label class="form-control-label">With Payer Name</label>
                      <select required class="form-control" name="w_p_n" id="choices-category">
                          @if ($inventory->with_payer_name == 1)
                            <option value="1">True</option>
                          @else
                            <option value="0">False</option>
                          @endif  
                            <option value="1">True</option>
                            <option value="0">False</option>
                      </select>
                </div>
                <div class="col-6 col-sm-6">
                  <label class="form-control-label">With Quantity</label>
                      <select required class="form-control" name="w_q" id="choices-category">
                          @if ($inventory->with_quantity == 1)
                            <option value="1">True</option>
                          @else
                            <option value="0">False</option>
                          @endif      
                            <option value="1">True</option>
                            <option value="0">False</option>
                      </select>
                </div>
              </div>

              <div class="row">
                <div class="col-6 col-md-6">
                    <label>Station</label>
                        <select disabled class="multisteps-form__select form-control" name="station" id="choices-category">
                          <option value="{{$inventory->station->id}}">{{$inventory->station->name}}</option>
                          @foreach ($stations as $s)
                              <option value="{{$s->id}}">
                                {{$s->name}}
                              </option>
                          @endforeach
                        </select>
                  </div>
                  <div class="col-6 col-md-6">
                    <label>Cluster</label>
                        <select  disabled class="multisteps-form__select form-control" name="cluster" id="choices-category">
                          <option value="{{$inventory->cluster->id}}">{{$inventory->cluster->cluster_type->name}}</option>
                          {{-- @foreach ($clusters as $s)
                              <option value="{{$s->id}}" @selected(old('version') == $s)>
                                {{$s->cluster_type->name}}
                              </option>
                          @endforeach --}}
                        </select>
                  </div>
                  <div class="col-6 col-md-6">
                    <label>Category</label>
                        <select class="multisteps-form__select form-control" name="category" id="choices-category">
                          <option value="{{$inventory->category->id}}">{{$inventory->category->name}}</option>
                          @foreach ($categories as $s)
                              <option value="{{$s->id}}">
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