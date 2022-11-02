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
                      <span class="text-xs text-secondary"> Locations</span>
                    </a>
                    |
                    <a href="#" class="cursor-pointer text-secondary">
                        <span class="text-xs text-secondary">List </span>
                      </a>
                </div>
                <h6 class="font-weight-bolder mb-0">Locations</h6>
                <p> List of Locations</p>
                <div>
                    <a href="{{route('show_add_location')}}" class="btn btn-default border-radius-xs">Add</a>
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
              <h5 class="mb-0">Locations</h5>
              <p class="text-sm mb-0">
                Below are the list of locations.
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
                    {{-- <th data-sortable="" style="width: 36.9369%;">
                      <a href="#" class="dataTable-sorter">S/N</a>
                    </th> --}}
                    <th data-sortable="" style="width: 36.9369%;">
                      <a href="#" class="dataTable-sorter">Name</a>
                    </th>
                   
                    <th data-sortable="" style="width: 24.3243%;">
                      <a href="#" class="dataTable-sorter">Action</a>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @if (count($locations) > 0)
                  <?php $i = 1; ?>
                  @foreach ($locations as $l)
                  <tr>
                    <td class="text-sm font-weight-normal">{{$l->location->name}}</td>
                    <td class="text-sm font-weight-normal"> 
                      <a onclick="event.preventDefault();
                          document.getElementById('delete-form[{{$i}}]').submit();" 
                          class="btn btn-warning">
                        Delete
                      </a>
                      <form id="delete-form[{{$i}}]" action="{{route('delete_location', ['id' => $l->id])}}" method="POST" class="d-none">
                          @csrf
                      </form>
                    </td>
                  </tr>
                  <?php $i++ ?>
                  @endforeach
                  @else
                  <tr>
                    <td class="text-sm font-weight-normal" colspan="3" style="text-align: center;">No locations added yet. want to add? <a href="{{route('show_add_location')}}">Click here</a> </td>
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
