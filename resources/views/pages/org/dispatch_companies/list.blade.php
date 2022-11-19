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
                        <span class="text-xs text-secondary"> Dispatch Companies</span>
                      </a>
                      |
                    <a href="#" class="cursor-pointer text-secondary">
                        <span class="text-xs text-secondary">List </span>
                      </a>
                </div>
                <h6 class="font-weight-bolder mb-0">Dispatch Companies</h6>
                <p> List of Dispatch Companies</p>
                <div>
                    <a onclick="history.back()" class="btn btn-default border-radius-xs">Back</a>
                    <a href="{{route('show_add_d_company')}}" class="btn btn-default border-radius-xs">Add Company</a>
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
              <h5 class="mb-0">Dispatch Companies</h5>
              <p class="text-sm mb-0">
                Below are the list of Dispatch Companies
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
                      <a href="#" class="dataTable-sorter">Location</a>
                    </th>
                    <th data-sortable="" style="width: 24.3243%;">
                      <a href="#" class="dataTable-sorter">phone</a>
                    </th>
                    <th data-sortable="" style="width: 24.3243%;">
                      <a href="#" class="dataTable-sorter">Action</a>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @if (count($dispatch_companies) > 0)
                  <?php $i =1; ?>
                  @foreach ($dispatch_companies as $d)
                  <tr>
                    <td class="text-sm font-weight-normal">{{$d->name}}</td>
                    <td class="text-sm font-weight-normal">{{$d->location->location->name}}</td>
                    <td class="text-sm font-weight-normal">{{$d->phone ?? "Not Specified!"}}</td>
                    <td class="text-sm font-weight-normal">
                       {{-- <a href="#" class="btn btn-primary">Open</a> --}}
                       <button type="button" class="btn btn-primary bg-gradient-primary mb-3" data-bs-toggle="modal<?php echo $i;?>" data-bs-target="#modal<?php echo $i;?>">Open</button>
                      </td>

                  </tr>
                  <div class="modal fade" id="modal<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="modal<?php echo $i;?>" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h6 class="modal-title" id="modal-title-default">Company Info</h6>
                          <button type="button" class="btn-close" data-bs-dismiss="modal<?php echo $i;?>" aria-label="Close">
                            <span aria-hidden="true">X</span>
                          </button>
                        </div>
                        <form action="{{route('update_d_company', ['id'=>$d->id])}}" method="POST">
                          <div class="modal-body">
                            <div class="row mt-3">
                              <div class="col-12 col-sm-12">
                                <label>Name</label>
                                <input required name="name" value="{{$d->name}}" class="multisteps-form__input form-control" type="text" placeholder="eg. Necodes " onfocus="focused(this)" onfocusout="defocused(this)">
                              </div>
                            </div>
                            <div class="row mt-3">
                              <div class="col-12 col-sm-12">
                                <label>Phone</label>
                                <input required name="phone" value="{{$d->phone}}" class="multisteps-form__input form-control" type="text" placeholder="eg. 2348167236629 " onfocus="focused(this)" onfocusout="defocused(this)">
                              </div>
                            </div>
                            <div class="row mt-3">
                              <div class="col-12 col-sm-12">
                                <label>Location</label>
                                <select class="multisteps-form__input form-control station" name="location" id="location">
                                  <option value="{{$d->location->id}}" >{{$d->location->location->name}}</option>
                                  @if (count($locations) > 0)
                                  @foreach ($locations as $s)
                                  <option value="{{$s->id}}">{{$s->name}}</option>
                                  @endforeach
                                  @endif
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn bg-gradient-primary">Update</button>
                            <button type="button" class="btn btn-link  ml-auto" onclick="event.preventDefault(); document.getElementById('delete_company<?php echo $i; ?>').submit();">Delete</button>
                          </div>
                        </form>
                        <form action="{{route('delete_d_company', ['id'=>$d->id])}}" method="POST" id="delete_company<?php echo $i; ?>">
                          @csrf
                        </form>
                      </div>
                    </div>
                  </div>
                   <?php $i = $i+1; ?>
                  @endforeach
                  @else
                  <tr>
                    <td class="text-sm font-weight-normal" colspan="5" style="text-align: center;">NO cluster types yet. create type? <a href="{{route('show_add_d_company')}}">Click here</a></td>
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
