@extends('layouts.app')
@include('pages.station.menu')
@include('pages.station.nav')
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
                <span class="font-weight-normal text-secondary text-sm"><span class="font-weight-bolder">+$213</span> since last month</span>
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