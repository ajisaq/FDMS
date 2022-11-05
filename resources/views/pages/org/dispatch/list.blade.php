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
                      <span class="text-xs text-secondary"> Supply</span>
                    </a>
                      |
                    <a href="#" class="cursor-pointer text-secondary">
                        <span class="text-xs text-secondary">Info </span>
                      </a>
                </div>
                <h6 class="font-weight-bolder mb-0">Supplies</h6>
                <p> List of All Supplies</p>
                <div>
                    <a onclick="history.back()" class="btn btn-default border-radius-xs">Back</a>
                    <a href="{{route('add_new_dispatch')}}" class="btn btn-default border-radius-xs">New Supply</a>
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
      <div class="col-lg-6 mb-3">
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
              <h5 class="mb-0">Pending Supplies</h5>
              <p class="text-sm mb-0">
                Below are the list of dispatches that are on the way.
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
                    <th data-sortable="" style="width: 24.3243%;">
                      <a href="#" class="dataTable-sorter">ID</a>
                    </th>
                    <th data-sortable="" style="width: 36.9369%;">
                      <a href="#" class="dataTable-sorter">Driver</a>
                    </th>
                    <th data-sortable="" style="width: 51.1261%;">
                      <a href="#" class="dataTable-sorter">Dispatch Company</a>
                    </th>
                    <th data-sortable="" style="width: 51.1261%;">
                      <a href="#" class="dataTable-sorter">Dispatch Location</a>
                    </th>
                    <th data-sortable="" style="width: 24.3243%;">
                      <a href="#" class="dataTable-sorter">Product</a>
                    </th>
                    <th data-sortable="" style="width: 24.3243%;">
                      <a href="#" class="dataTable-sorter">Station<small><br>(To be delivered)</small></a>
                    </th>
                    <th data-sortable="" style="width: 24.3243%;">
                      <a href="#" class="dataTable-sorter">Status</a>
                    </th>
                    <th data-sortable="" style="width: 24.3243%;">
                      <a href="#" class="dataTable-sorter">Date</a>
                    </th>
                    <th data-sortable="" style="width: 24.3243%;">
                      <a href="#" class="dataTable-sorter">Action</a>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @if (count($p_dispatches) > 0)
                  @foreach ($p_dispatches as $d)
                  <tr>
                    <td class="text-sm font-weight-normal">{{$d->ref_id}}</td>
                    <td class="text-sm font-weight-normal">{{$d->dispatcher_name}}</td>
                    <td class="text-sm font-weight-normal">{{$d->d_company->name}}</td>
                    <td class="text-sm font-weight-normal">{{$d->d_company->location->location->name}}</td>
                    <td class="text-sm font-weight-normal">{{$d->inventory->name}}</td>
                    <td class="text-sm font-weight-normal">{{$d->station->name ?? "!Not specified"}}</td>
                    <td class="text-sm font-weight-normal"><span class="badge badge-dot me-4">
                        <i class="bg-dark"></i>
                        <span class="text-dark text-xs">{{$d->status == 1 ? 'Arrived':'On the way'}}</span></span>
                    </td>
                    <td class="text-sm font-weight-normal">{{$d->dispatch_time}}</td>
                    <td class="text-sm font-weight-normal"> <a href="#" class="btn btn-primary">Open</a></td>
                  </tr>
                  @endforeach
                  @else
                  <tr>
                    <td class="text-sm font-weight-normal" colspan="5" style="text-align: center;">No supply found. Want to add one? <a href="#">Click here</a></td>
                  </tr>
                  @endif
                  </tbody>
              </table>
            </div>
          </div>
       
      </div>

    </div>
  </div>

  {{-- Arrived Arived ones --}}
  <div class="col-lg-6 mb-3">
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
              <h5 class="mb-0">successful Supplies </h5>
              <p class="text-sm mb-0">
                Below are the list of dispatches that has arrived and was confirmed.
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
                    <th data-sortable="" style="width: 24.3243%;">
                      <a href="#" class="dataTable-sorter">ID</a>
                    </th>
                    <th data-sortable="" style="width: 36.9369%;">
                      <a href="#" class="dataTable-sorter">Driver</a>
                    </th>
                    <th data-sortable="" style="width: 51.1261%;">
                      <a href="#" class="dataTable-sorter">Dispatch Company</a>
                    </th>
                    <th data-sortable="" style="width: 51.1261%;">
                      <a href="#" class="dataTable-sorter">Dispatch Location</a>
                    </th>
                    <th data-sortable="" style="width: 24.3243%;">
                      <a href="#" class="dataTable-sorter">Product</a>
                    </th>
                    <th data-sortable="" style="width: 24.3243%;">
                      <a href="#" class="dataTable-sorter">Station<small><br>(Delivered)</small></a>
                    </th>
                    <th data-sortable="" style="width: 24.3243%;">
                      <a href="#" class="dataTable-sorter">Comfirmed by<small><br>(station manager)</small></a>
                    </th>
                    <th data-sortable="" style="width: 24.3243%;">
                      <a href="#" class="dataTable-sorter">Status</a>
                    </th>
                    <th data-sortable="" style="width: 24.3243%;">
                      <a href="#" class="dataTable-sorter">Dispatch Date</a>
                    </th>
                    <th data-sortable="" style="width: 24.3243%;">
                      <a href="#" class="dataTable-sorter">Recieved Date</a>
                    </th>
                    <th data-sortable="" style="width: 24.3243%;">
                      <a href="#" class="dataTable-sorter">Action</a>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @if (count($a_dispatches) > 0)
                  @foreach ($a_dispatches as $d)
                  <tr>
                    <td class="text-sm font-weight-normal">{{$d->ref_id}}</td>
                    <td class="text-sm font-weight-normal">{{$d->dispatcher_name}}</td>
                    <td class="text-sm font-weight-normal">{{$d->d_company->name}}</td>
                    <td class="text-sm font-weight-normal">{{$d->d_company->location->location->name}}</td>
                    <td class="text-sm font-weight-normal">{{$d->inventory->name}}</td>
                    <td class="text-sm font-weight-normal">{{$d->station->name ?? "!Not specified"}}</td>
                    <td class="text-sm font-weight-normal">{{$d->manager->name ?? "!Not specified"}}</td>
                    <td class="text-sm font-weight-normal"><span class="badge badge-dot me-4">
                        <i class="bg-info"></i>
                        <span class="text-dark text-xs">{{$d->status == 1 ? 'Arrived':'On the way'}}</span></span>
                    </td>
                    <td class="text-sm font-weight-normal">{{$d->dispatch_time}}</td>
                    <td class="text-sm font-weight-normal">{{$d->arival_time}}</td>
                    <td class="text-sm font-weight-normal"> <a href="#" class="btn btn-primary">Open</a></td>
                  </tr>
                  @endforeach
                  @else
                  <tr>
                    <td class="text-sm font-weight-normal" colspan="5" style="text-align: center;">You don't any successful supply.</td>
                  </tr>
                  @endif
                  </tbody>
              </table>
            </div>
          </div>

      </div>

    </div>
  </div>

</div>

@endsection
