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
                <p class="text-sm mb-1 text-uppercase font-weight-bold">Revenue</p>
                <h5 class="font-weight-bolder mb-0" style="font-size: 15px">
                  ₦ {{number_format($revenue,'2')}}
                </h5>
                <span class="text-sm text-end text-success font-weight-bolder mt-auto mb-0">+₦ 130055 <span class="font-weight-normal text-secondary"> last month</span></span>
              </div>
              <div class="col-5">
                <div class="dropdown text-end">
                  <a href="javascript:;" class="cursor-pointer text-secondary" id="dropdownUsers1" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="text-xs text-secondary">{{date('d M', strtotime($sale_summary_date['start']))}} - {{date('d M', strtotime($sale_summary_date['end']))}}</span>
                  </a>
                  {{-- <ul class="dropdown-menu dropdown-menu-end px-2 py-3" aria-labelledby="dropdownUsers1">
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Last 7 days</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Last week</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Last 30 days</a></li>
                  </ul> --}}
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
                <p class="text-sm mb-1 text-uppercase font-weight-bold">Litres Sold</p>
                <h5 class="font-weight-bolder mb-0" style="font-size: 15px">
                  {{number_format($litres,'2')}} Ltrs
                </h5>
                <span class="text-sm text-end text-success font-weight-bolder mt-auto mb-0">+12% <span class="font-weight-normal text-secondary">since last month</span></span>
              </div>
              <div class="col-5">
                <div class="dropdown text-end">
                  <a href="javascript:;" class="cursor-pointer text-secondary" id="dropdownUsers2" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="text-xs text-secondary">{{date('d M', strtotime($sale_summary_date['start']))}} - {{date('d M', strtotime($sale_summary_date['end']))}}</span>
                  </a>
                  {{-- <ul class="dropdown-menu dropdown-menu-end px-2 py-3" aria-labelledby="dropdownUsers2">
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Last 7 days</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Last week</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Last 30 days</a></li>
                  </ul> --}}
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
                <p class="text-sm mb-1 text-uppercase font-weight-bold">No. Customers</p>
                <h5 class="font-weight-bolder mb-0" style="font-size: 15px">
                  {{number_format(count($transaction),'2')}}
                </h5>
                <span class="font-weight-normal text-secondary text-sm"><span class="font-weight-bolder">+20</span> last month</span>
              </div>
              <div class="col-5">
                <div class="dropdown text-end">
                  <a href="javascript:;" class="cursor-pointer text-secondary" id="dropdownUsers3" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="text-xs text-secondary">{{date('d M', strtotime($sale_summary_date['start']))}} - {{date('d M', strtotime($sale_summary_date['end']))}}</span>
                  </a>
                  {{-- <ul class="dropdown-menu dropdown-menu-end px-2 py-3" aria-labelledby="dropdownUsers3">
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Last 7 days</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Last week</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Last 30 days</a></li>
                  </ul> --}}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

{{-- Sales overview --}}
    {{-- <div class="row mt-4">
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
      </div> --}}
      
      <div class="row mt-4">
      <div class="col-lg-7">
        <div class="card">
          <div class="card-header pb-0 p-3">
            <h6 class="mb-0">Station Operation Status</h6>
          </div>
          <div class="card-body p-3">
            <div class="table-responsive">
              <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-height fixed-columns">
                {{-- <div class="dataTable-top">
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
                  </div> --}}
                  <div class="dataTable-container" >
                  <table class="table dataTable-table" id="datatable-search">
                <thead class="thead-light">
                  <tr>
                    <th data-sortable="" style="width: 50%;">
                      <a href="#" class="dataTable-sorter">Station</a>
                    </th>
                    <th data-sortable="" style="width: 25%;">
                      <a href="#" class="dataTable-sorter">Open</a>
                    </th>
                    <th data-sortable="" style="width: 25%;">
                      <a href="#" class="dataTable-sorter">Curent status</a>
                    </th>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @if (count($stations) > 0)
                  @foreach ($stations as $s)
                  <tr>
                    <td class="text-sm font-weight-normal">{{$s->name}}</td>
                    <?php $ocs = \App\Models\OCStation::where('station_id', $s->id)->orderBy('created_at', 'desc')->first();
                          $ocs_o = \App\Models\OCStation::where(['station_id'=> $s->id, 'action'=>'1'])->orderBy('created_at', 'desc')->first(); 
                    ?>
                    <td class="text-sm font-weight-normal">
                      @if ($ocs_o) 
                        {{date('H:i a', strtotime($ocs_o->time))}}
                      @else
                        {{"Null"}}
                      @endif
                    </td>
                    <td class="text-sm font-weight-normal">
                      @if ($ocs) 
                        <span class="badge badge-dot me-4">
                        <i class="bg-dark"></i>
                        <span class="text-dark text-xs">{{$ocs->action == 1 ? 'Opened':'Closed'}}</span>
                        </span>
                      @else
                        {{"Null"}}
                      @endif
                    </td>
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
      </div>

      <div class="col-lg-5">
          <div class="card">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0">Sales by Stations</h6>
            </div>
            <div class="card-body p-3">
              <ul class="list-group" >
                @if (count($stations)>0)
                <?php 
                  $station_tansaction_amounts=[];

                  foreach ($stations as $key => $ss) {
                    $trans = $ss->transactions;
                    $a=0;
                    foreach ($trans as $key => $tt) {
                      $a = $a + $tt->amount;
                    }
                    $station_transaction_amounts[$ss->id] = $a;
                    // array_push($station_transaction_amounts, $a);
                  }

                  asort($station_transaction_amounts);
                  $s_t_a = array_reverse($station_transaction_amounts, true);

                ?>
                
                @foreach ($s_t_a as $key => $s)
                <?php 
                  $station = \App\Models\Station::where(['org_id'=>Auth::user()->org_id, 'id'=>$key])->get();
                  $station = $station[0];
                  $q=0;
                  if (count($station->transactions)>0) {
                    foreach ($station->transactions as $ttt) {
                      $q=$q+$ttt->quantity;
                    }
                  }
                ?>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                      <i class="ni ni-tag text-white opacity-10"></i>
                    </div>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">{{$station->name}}</h6>
                      <span class="text-xs">{{number_format($q, '2')}} Litres, <span class="font-weight-bold"> NGN {{number_format($s)}} Revenue</span></span>
                    </div>
                  </div>
                  <div class="d-flex">
                    <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                  </div>
                </li>
                @endforeach
                @endif
              </ul>
            </div>
          </div>
        </div>

    </div>

    <div class="row mt-4">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header pb-0 p-3">
            <h6 class="mb-0">Recent Supplies</h6>
          </div>
          <div class="card-body p-3">
            <div class="table-responsive">
              <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-height fixed-columns">
                
                  <div class="dataTable-container" >
                  <table class="table dataTable-table" id="datatable-search">
                <thead class="thead-light">
                  <tr>
                    <th data-sortable="" style="width: 10%;">
                      <a href="#" class="dataTable-sorter">ID</a>
                    </th>
                    <th data-sortable="" style="width: 15%;">
                      <a href="#" class="dataTable-sorter">Dispatch Company</a>
                    </th>
                    <th data-sortable="" style="width: 15%;">
                      <a href="#" class="dataTable-sorter">From</a>
                    </th>
                    <th data-sortable="" style="width: 10%;">
                      <a href="#" class="dataTable-sorter">Product</a>
                    </th>
                    <th data-sortable="" style="width: 10%;">
                      <a href="#" class="dataTable-sorter">Station</a>
                    </th>
                    <th data-sortable="" style="width: 20%;">
                      <a href="#" class="dataTable-sorter">Manager<small><br>(phone)</small></a>
                    </th>
                    <th data-sortable="" style="width: 5%;">
                      <a href="#" class="dataTable-sorter">Status</a>
                    </th>
                    <th data-sortable="" style="width: 5%;">
                      <a href="#" class="dataTable-sorter">Recieved Date</a>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @if (count($supplies) > 0)
                  @foreach ($supplies as $d)
                  <tr>
                    <td class="text-sm font-weight-normal">{{$d->ref_id}}</td>
                    <td class="text-sm font-weight-normal">{{$d->d_company->name}}</td>
                    <td class="text-sm font-weight-normal">{{$d->d_company->location->location->name}}</td>
                    <td class="text-sm font-weight-normal">{{$d->inventory->name}}</td>
                    <td class="text-sm font-weight-normal">{{$d->station->name ?? "!Not specified"}}</td>
                    <td class="text-sm font-weight-normal">{{$d->manager->name ?? "!Not specified"}}({{$d->manager->phone ?? "null"}})</td>
                    <td class="text-sm font-weight-normal"><span class="badge badge-dot me-4">
                        <i class="bg-info"></i>
                        <span class="text-dark text-xs">{{$d->status == 1 ? 'Arrived':'On the way'}}</span></span>
                    </td>
                    <td class="text-sm font-weight-normal">{{date('d M, y', strtotime($d->arival_time)) ?? "Not Confirmed"}}</td>
                  </tr>
                  @endforeach
                  @else
                  <tr>
                    <td class="text-sm font-weight-normal" colspan="5" style="text-align: center;">You don't supplies.</td>
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
    </div>

{{-- 
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
    </div> --}}

    {{-- <div class="col-lg-6">
        <div class="card">
          <div class="card-header pb-0 p-3">
            <h6 class="mb-0">Recent Supplies</h6>
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
      </div> --}}

@endsection