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
                        <span class="text-xs text-secondary">Cluster </span>
                      </a>
                      |
                    <a href="#" class="cursor-pointer text-secondary">
                        <span class="text-xs text-secondary">Type </span>
                      </a>
                </div>
                <h6 class="font-weight-bolder mb-0">Cluster Types</h6>
                <p> List of cluster Types</p>
                <div>
                    <a onclick="history.back()" class="btn btn-default border-radius-xs">Back</a>
                    <a href="{{route('show_add_cluster_type')}}" class="btn btn-default border-radius-xs">add</a>
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
              <h5 class="mb-0">Cluster Types</h5>
              <p class="text-sm mb-0">
                Below are the Types
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
                    <th data-sortable="" style="width: 24.3243%;">
                      <a href="#" class="dataTable-sorter">Action</a>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @if (count($cluster_types) > 0)
                  <?php $i =1; ?>
                  @foreach ($cluster_types as $c)
                  <tr>
                    <td class="text-sm font-weight-normal">{{$c->name}}</td>
                    <td class="text-sm font-weight-normal">
                       {{-- <a href="#" class="btn btn-primary">Open</a> --}}
                       <button type="button" class="btn btn-primary bg-gradient-primary mb-3" data-bs-toggle="modal" data-bs-target="#modal">Open</button>
                      </td>

                  </tr>
                  <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
                    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h6 class="modal-title" id="modal-title-default">Cluster Type</h6>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">X</span>
                          </button>
                        </div>
                        <form action="">
                          <div class="modal-body">
                            <div class="row mt-3">
                              <div class="col-12 col-sm-12">
                                <label>Name</label>
                                <input required name="name" value="{{$c->name}}" class="multisteps-form__input form-control" type="text" placeholder="eg. Cluster type name " onfocus="focused(this)" onfocusout="defocused(this)">
                              </div>
                            </div>
                            {{-- <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p> --}}
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn bg-gradient-primary">Update</button>
                            <button type="button" class="btn btn-link  ml-auto" data-bs-dismiss="modal">Delete</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                   <?php $i++; ?>
                  @endforeach
                  @else
                  <tr>
                    <td class="text-sm font-weight-normal" colspan="5" style="text-align: center;">NO cluster types yet. create type? <a href="{{route('show_add_cluster_type')}}">Click here</a></td>
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
