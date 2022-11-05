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
                        <span class="text-xs text-secondary">Product </span>
                      </a>
                      |
                    <a href="#" class="cursor-pointer text-secondary">
                        <span class="text-xs text-secondary">Add </span>
                      </a>
                </div>
                <h6 class="font-weight-bolder mb-0">Product</h6>
                <p> Add new Product</p>
                <div> 
                    <a onclick="history.back()" class="btn btn-default border-radius-xs">Back</a>
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

    <div class="row">
      <div class="col-lg-12">
        <div class="multisteps-form">
            <div class="row">
              <div class="col-12 col-lg-8 mx-auto mt-4 mb-sm-5 mb-3">
                <div class="multisteps-form__progress">
                  <button class="multisteps-form__progress-btn js-active" type="button" title="Station Info">
                    <span>1. Product Info</span>
                  </button>
                  <button class="multisteps-form__progress-btn" type="button" title="Supervisor">2. Station & Cartegory</button>

                </div>
              </div>
            </div>
            <!--form panels-->
            <div class="row">
              <div class="col-12 col-lg-8 m-auto">
                <form class="multisteps-form__form mb-8" style="height: 406px;" action="{{route('store_inventory')}}" method="post">
                  @csrf
                  <!--single form panel-->
                  <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active" data-animation="FadeIn">
                    <h5 class="font-weight-bolder">Information</h5>
                    <div class="multisteps-form__content">
                      <div class="row mt-3">
                        <div class="col-12 col-sm-12">
                          <label>Name</label>
                          <input required name="name" class="multisteps-form__input form-control" type="text" placeholder="eg. Item name " onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                        <div class="col-6 col-sm-6">
                          <label>Unit</label>
                          <input required name="unit" class="multisteps-form__input form-control" type="text" placeholder="eg. NGN " onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                        <div class="col-6 col-sm-6">
                          <label>Amount</label>
                          <input required name="amount" class="multisteps-form__input form-control" type="text" placeholder="eg. 999999 " onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>

                        <div class="col-6 col-sm-6">
                          <label>With Payer Name</label>
                              <select required class="multisteps-form__select form-control" name="w_p_n" id="choices-category">
                                    <option value="1">True</option>
                                    <option value="0">False</option>
                              </select>
                        </div>
                        <div class="col-6 col-sm-6">
                          <label>With Quantity</label>
                              <select required class="multisteps-form__select form-control" name="w_q" id="choices-category">
                                    <option value="1">True</option>
                                    <option value="0">False</option>
                              </select>
                        </div>
                      </div>
                      <div class="button-row d-flex mt-4">
                        <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Next</button>
                      </div>
                    </div>
                  </div>
                  <!--single form panel-->
                  <div class="card multisteps-form__panel p-3 border-radius-xl bg-white" data-animation="FadeIn">
                    <h5 class="font-weight-bolder">Station</h5>
                    <div class="multisteps-form__content">
                      <div class="row mt-3">
                        <div class="col-12">
                          <label>Choose station</label>
                          <select required class="multisteps-form__select form-control station" name="station" id="choices-category">
                                <option disabled selected>Select station</option>
                                @foreach ($stations as $station)
                                  <option value="{{$station->id}}">{{$station->name}}</option>
                                @endforeach
                          </select>
                        </div>
                        <div class="col-12">
                          <label>Select Cluster</label>
                          <select required class="multisteps-form__select form-control cluster" name="cluster" id="cluster">
                                <option disabled selected>Select cluster</option>
                          </select>
                        </div>
                      </div>
                       <div class="row mt-3">
                        <div class="col-12 col-md-8 col-sm-8">
                          <label>Choose category</label>
                              <select required class="multisteps-form__select form-control" name="category" id="choices-category">
                                @if ($categories)
                                  @foreach ($categories as $c)
                                      <option value="{{$c->id}}">{{$c->name}}</option>
                                  @endforeach
                                @else
                                  <option>Category not found</option>
                                @endif
                              </select>
                        </div>
                        <div class="col-md-4 col-sm-4">
                          <label>Create?</label>
                          <button data-toggle="modal" data-target="#exampleModal" class="btn bg-gradient-light ms-auto mb-0" type="button" title="Add category">Create Category</button>
                        </div>
                      </div>
                      <div class="row">
                        <div class="button-row d-flex mt-4 col-12">
                          <button class="btn bg-gradient-secondary mb-0 js-btn-prev" type="button" title="Prev">Prev</button>
                          <button class="btn bg-gradient-dark ms-auto mb-0" type="submit" title="Send">Add</button>
                          {{-- <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Next</button> --}}
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
      </div>
    </div>

    
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{route('store_category')}}" method="POST">
      @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-12 col-sm-12">
            <label>Name</label>
            <input name="name" class="multisteps-form__input form-control" type="text" placeholder="eg. Category name " onfocus="focused(this)" onfocusout="defocused(this)">
          </div>
          <div class="col-12 col-sm-12">
            <label>Type</label>
            <input name="type" class="multisteps-form__input form-control" type="text" placeholder="eg. type of cat... " onfocus="focused(this)" onfocusout="defocused(this)">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Create</button>
      </div>
    </div>
    </form>
  </div>
</div>


@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
$(document).ready(function () {
            
	$('.station').on('change', function() {
        var req_value = this.value;
        console.log(req_value);
        	    $.ajax({
		
        	        url:"{{ route('get_cluster_by_station', ['id'=> "req_value"]) }}",
		
        	        type:"GET",
		
        	        data:{'data':req_value},
		
        	        success:function (data) {
                    console.log(data);
        	            $('#cluster').html(data);
                      $('#inventory').removeAttr('disabled');

        	        }
        	    })

    	});
});
</script>
@endsection
