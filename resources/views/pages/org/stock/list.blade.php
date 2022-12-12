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
                      <span class="text-xs text-secondary"> Sales</span>
                    </a>
                    |
                      <a href="#" class="cursor-pointer text-secondary">
                        <span class="text-xs text-secondary"> Stocks</span>
                      </a>
                </div>
                <h6 class="font-weight-bolder mb-0">Stocks</h6>
                <p> List of Stocks</p>
                <div>
                    {{-- <a href="{{route('show_add_stations')}}" class="btn btn-default border-radius-xs">add</a> --}}
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
              <h5 class="mb-0">Stock</h5>
              <p class="text-sm mb-0">
                Below are the list of stocks by station.
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
                        <select class="dataTable-input station" name="station" id="station">
                          <option selected value="{{$station->id}}">{{$station->name}}</option>
                          @if (count($stations) > 0)
                          @foreach ($stations as $s)
                          <option value="{{$s->id}}">{{$s->name}}</option>
                          @endforeach
                          @endif
                        </select>
                      <input class="dataTable-input" placeholder="Search..." type="text">
                    </div>
                  </div>
                  <div class="dataTable-container" >
                  <table class="table dataTable-table" id="products-list">
                <thead class="thead-light">
                  <tr>
                    <th data-sortable="" style="width: 36.9369%;">
                      <a href="#" class="dataTable-sorter">Product</a>
                    </th>
                    <th data-sortable="" style="width: 51.1261%;">
                      <a href="#" class="dataTable-sorter">Quantity in Stock</a>
                    </th>
                    <th data-sortable="" style="width: 30.8559%;">
                      <a href="#" class="dataTable-sorter">Cluster</a> {{-- (sub-cluster if any) --}}
                    </th>
                    
                    <th data-sortable="" style="width: 24.3243%;">
                      <a href="#" class="dataTable-sorter">Expiry Date</a>
                    </th>
                    <th data-sortable="" style="width: 24.3243%;">
                      <a href="#" class="dataTable-sorter">Action</a>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @if (count($station->inventories) > 0)
                  @foreach ($station->inventories as $i)
                  <tr>
                    <td class="text-sm font-weight-normal">{{$i->name}}</td>
                    <td class="text-sm font-weight-normal">{{$i->stock->quantity ?? "No stock found"}}</td>
                    <td class="text-sm font-weight-normal">{{$i->cluster->cluster_type->name ?? "!Not specified"}}</td>
                    <td class="text-sm font-weight-normal">{{$i->stock->expiry_date ?? "!Not specified"}}</td>
                    <td class="text-sm font-weight-normal">
                      <a href="#" class="btn btn-primary">Update</a>
                    </td>
                  </tr>
                  @endforeach
                  @else
                  <tr>
                    <td class="text-sm font-weight-normal" colspan="5" style="text-align: center;">NO Products yet. create stations? <a href="{{route('show_add_inventory')}}">Click here</a></td>
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


@section('script')
<script src="{{ asset('/assets/js/plugins/datatables.js')}}"></script>
<script>
    if (document.getElementById('products-list')) {
      const dataTableSearch = new simpleDatatables.DataTable("#products-list", {
        searchable: true,
        fixedHeight: false,
        perPage: 7
      });

    //   document.querySelectorAll(".export").forEach(function(el) {
    //     el.addEventListener("click", function(e) {
    //       var type = el.dataset.type;

    //       var data = {
    //         type: type,
    //         filename: "soft-ui-" + type,
    //       };

    //       if (type === "csv") {
    //         data.columnDelimiter = "|";
    //       }

    //       dataTableSearch.export(data);
    //     });
    //   });
    };
</script>
    
@endsection