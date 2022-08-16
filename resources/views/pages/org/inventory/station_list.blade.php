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
                      <span class="text-xs text-secondary"> Inventories</span>
                    </a>
                    |
                    <a href="#" class="cursor-pointer text-secondary">
                        <span class="text-xs text-secondary">List </span>
                      </a>
                </div>
                <h6 class="font-weight-bolder mb-0">Station ({{$station->name}})</h6>
                <p> List of Inventories</p>
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

    <div class="row mt-4">
      <div class="col-lg-12">
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
              <h5 class="mb-0">{{$station->name}} inventries</h5>
              <p class="text-sm mb-0">
                Below are the list of Inventories.
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
                      <a href="#" class="dataTable-sorter">Unit</a>
                    </th>
                    <th data-sortable="" style="width: 51.1261%;">
                      <a href="#" class="dataTable-sorter">Amount</a>
                    </th>
                    <th data-sortable="" style="width: 51.1261%;">
                      <a href="#" class="dataTable-sorter">Category</a>
                    </th>
                    {{-- <th data-sortable="" style="width: 24.3243%;">
                      <a href="#" class="dataTable-sorter">Action</a>
                    </th> --}}
                  </tr>
                </thead>
                <tbody>
                  @if (count($station->inventories) > 0)
                  @foreach ($station->inventories as $i)
                  <tr>
                    <td class="text-sm font-weight-normal">{{$i->name}}</td>
                    <td class="text-sm font-weight-normal">{{$i->unit}}</td>
                    <td class="text-sm font-weight-normal">{{$i->amount}}</td>
                    <td class="text-sm font-weight-normal">{{$i->category->name}}</td>
                    {{-- <td class="text-sm font-weight-normal"> <a href="{{route('show_device_info', ['id' => $d->id])}}" class="btn btn-primary">Open</a></td> --}}
                  </tr>
                  @endforeach
                  @else
                  <tr>
                    <td class="text-sm font-weight-normal" colspan="3" style="text-align: center;">NO Items yet. want to create Items? <a href="{{route('show_add_inventory', ['id' => $station->id])}}">Click here</a> </td>
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
