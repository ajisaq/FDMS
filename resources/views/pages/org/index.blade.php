@extends('layouts.app')
@include('pages.org.menu')
@include('pages.org.nav')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-sm-4">
        <div class="card border-radius-xs">
          <div class="card-body p-3 position-relative">
            <div class="row">
              <div class="col-7 text-start">
                <p class="text-sm mb-1 text-uppercase font-weight-bold">Sales</p>
                <h5 class="font-weight-bolder mb-0">
                  NGN 230,220
                </h5>
                <span class="text-sm text-end text-success font-weight-bolder mt-auto mb-0">+55% <span class="font-weight-normal text-secondary">since last month</span></span>
              </div>
              <div class="col-5">
                <div class="dropdown text-end">
                  <a href="javascript:;" class="cursor-pointer text-secondary" id="dropdownUsers1" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="text-xs text-secondary">6 May - 7 May</span>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end px-2 py-3" aria-labelledby="dropdownUsers1">
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Last 7 days</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Last week</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Last 30 days</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-4 mt-sm-0 mt-4">
        <div class="card border-radius-xs">
          <div class="card-body p-3 position-relative">
            <div class="row">
              <div class="col-7 text-start">
                <p class="text-sm mb-1 text-uppercase font-weight-bold">Customers</p>
                <h5 class="font-weight-bolder mb-0">
                  3200
                </h5>
                <span class="text-sm text-end text-success font-weight-bolder mt-auto mb-0">+12% <span class="font-weight-normal text-secondary">since last month</span></span>
              </div>
              <div class="col-5">
                <div class="dropdown text-end">
                  <a href="javascript:;" class="cursor-pointer text-secondary" id="dropdownUsers2" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="text-xs text-secondary">6 May - 7 May</span>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end px-2 py-3" aria-labelledby="dropdownUsers2">
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Last 7 days</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Last week</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Last 30 days</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-4 mt-sm-0 mt-4">
        <div class="card border-radius-xs">
          <div class="card-body p-3 position-relative">
            <div class="row">
              <div class="col-7 text-start">
                <p class="text-sm mb-1 text-uppercase font-weight-bold">Avg. Revenue</p>
                <h5 class="font-weight-bolder mb-0">
                  NGN 1,200
                </h5>
                <span class="font-weight-normal text-secondary text-sm"><span class="font-weight-bolder">+$213</span>last month</span>
              </div>
              <div class="col-5">
                <div class="dropdown text-end">
                  <a href="javascript:;" class="cursor-pointer text-secondary" id="dropdownUsers3" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="text-xs text-secondary">6 May - 7 May</span>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end px-2 py-3" aria-labelledby="dropdownUsers3">
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Last 7 days</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Last week</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Last 30 days</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="row mt-4">
        <div class="col-lg-7 mb-lg-0 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize">Sales overview</h6>
              <p class="text-sm mb-0">
                <i class="fa fa-arrow-up text-success"></i>
                <span class="font-weight-bold">4% more</span> in 20222
              </p>
            </div>
            <div class="card-body p-3">
              <div class="chart">
                <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-5">
          <div class="card">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0">Categories</h6>
            </div>
            <div class="card-body p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                      <i class="ni ni-mobile-button text-white opacity-10"></i>
                    </div>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Devices</h6>
                      <span class="text-xs">250 in stock</span>
                    </div>
                  </div>
                  <div class="d-flex">
                    <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                      <i class="ni ni-tag text-white opacity-10"></i>
                    </div>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Stations</h6>
                      <span class="text-xs">123 open, <span class="font-weight-bold">15 closed</span></span>
                    </div>
                  </div>
                  <div class="d-flex">
                    <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                      <i class="ni ni-mobile-button text-white opacity-10"></i>
                    </div>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Pos</h6>
                      <span class="text-xs font-weight-bold">+ 430</span>
                    </div>
                  </div>
                  <div class="d-flex">
                    <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                      <i class="ni ni-satisfied text-white opacity-10"></i>
                    </div>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Happy users</h6>
                      <span class="text-xs font-weight-bold">+ 430</span>
                    </div>
                  </div>
                  <div class="d-flex">
                    <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                      <i class="ni ni-box-2 text-white opacity-10"></i>
                    </div>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Error logs</h6>
                      <span class="text-xs">1 is active, <span class="font-weight-bold">40 closed</span></span>
                    </div>
                  </div>
                  <div class="d-flex">
                    <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                  </div>
                </li>
                
              </ul>
            </div>
          </div>
        </div>
    </div>


    <div class="row mt-4">
      <div class="col-lg-12">
        <div class="card h-100 border-radius-xs">
          <div class="card-header pb-0 p-3">
            <div class="d-flex justify-content-between">
              <h6 class="mb-0">Page</h6>
            </div>
          </div>
          <div class="card-body p-3">
            <div class="chart">
             <h1>Content</h1>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection