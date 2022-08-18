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
                      <span class="text-xs text-secondary"> Customer</span>
                    </a>
                    |
                    <a href="#" class="cursor-pointer text-secondary">
                        <span class="text-xs text-secondary">List </span>
                      </a>
                </div>
                <h6 class="font-weight-bolder mb-0">Customer</h6>
                <p> List of Customer's</p>
                <div>
                    <a href="{{route('show_add_customer')}}" class="btn btn-default border-radius-xs">add</a>
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

    <div class="row mt-4">
      <div class="col-lg-12">
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
              <h5 class="mb-0">Customer</h5>
              <p class="text-sm mb-0">
                Below are the list of Customer.
              </p>
            </div>
            <div class="table-responsive">
              <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-height fixed-columns">
                <div class="dataTable-top">
                  <div class="dataTable-dropdown">
                    <label>
                      <select class="dataTable-selector">
                        <option value="5">5</option>
                        <option value="10" selected="">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                        <option value="25">25</option>
                      </select> entries per page</label>
                    </div>
                    <div class="dataTable-search">
                      <input class="dataTable-input" placeholder="Search..." type="text">
                    </div>
                  </div>
                  <div class="dataTable-container" >
                  <table class="table dataTable-table" id="datatable-search">
                <thead class="thead-light">
                  <tr>
                    <th data-sortable="" style="width: 36.9369%;">
                      <a href="#" class="dataTable-sorter">Name</a>
                    </th>
                    <th data-sortable="" style="width: 51.1261%;">
                      <a href="#" class="dataTable-sorter">Contact</a>
                    </th>
                    <th data-sortable="" style="width: 24.3243%;">
                      <a href="#" class="dataTable-sorter">Email</a>
                    </th>
                    <th data-sortable="" style="width: 24.3243%;">
                      <a href="#" class="dataTable-sorter">Phone</a>
                    </th>
                    <th data-sortable="" style="width: 24.3243%;">
                      <a href="#" class="dataTable-sorter">Action</a>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @if (count($customers) > 0)
                  @foreach ($customers as $c)
                  <tr>
                    <td class="text-sm font-weight-normal">{{$c->name}}</td>
                    <td class="text-sm font-weight-normal">{{$c->contact}}</td>
                    <td class="text-sm font-weight-normal">{{$c->email}}</td>
                    <td class="text-sm font-weight-normal">{{$c->phone ?? "!Not specified"}}</td>
                    <td class="text-sm font-weight-normal"> <a href="{{route('show_customers_info', ['id' => $c->id])}}" class="btn btn-primary">Open</a></td>
                  </tr>
                  @endforeach
                  @else
                  <tr>
                    <td class="text-sm font-weight-normal" colspan="5" style="text-align: center;">NO Customers yet. create Customer? <a href="{{route('show_add_customer')}}">Click here</a></td>
                  </tr>
                  @endif
                  </tbody>
              </table>
            </div>
          </div>
       
      </div>

    </div>
  </div>

@endsection
