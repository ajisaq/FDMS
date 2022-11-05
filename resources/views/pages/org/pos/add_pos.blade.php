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
                        <span class="text-xs text-secondary">pos </span>
                      </a>
                      |
                    <a href="#" class="cursor-pointer text-secondary">
                        <span class="text-xs text-secondary">Add </span>
                      </a>
                </div>
                <h6 class="font-weight-bolder mb-0">POS</h6>
                <p> Add new point of sale</p>
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
                    <span>1. POS Info</span>
                  </button>
                  <button class="multisteps-form__progress-btn" type="button" title="Supervisor">2. Cluster</button>

                </div>
              </div>
            </div>
            <!--form panels-->
            <div class="row">
              <div class="col-12 col-lg-8 m-auto">
                <form class="multisteps-form__form mb-8" style="height: 406px;" action="{{route('store_pos')}}" method="post">
                  @csrf
                  <!--single form panel-->
                  <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active" data-animation="FadeIn">
                    <h5 class="font-weight-bolder">Information</h5>
                    <div class="multisteps-form__content">
                      <div class="row mt-3">
                        <div class="col-12 col-sm-6">
                          <label>Name</label>
                          <input name="name" class="multisteps-form__input form-control" type="text" placeholder="eg. POS name " onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                        {{-- <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                          <label>Description</label>
                          <input name="description" class="multisteps-form__input form-control" type="text" placeholder="eg. This is a POS...." onfocus="focused(this)" onfocusout="defocused(this)">
                        </div> --}}
                        <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                          <label>Type of service</label>
                          <input name="service_type" class="multisteps-form__input form-control" type="text" placeholder="eg. This is a POS...." onfocus="focused(this)" onfocusout="defocused(this)">
                        </div>
                      </div>
                      <div class="button-row d-flex mt-4">
                        <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Next</button>
                      </div>
                    </div>
                  </div>
                  <!--single form panel-->
                  <div class="card multisteps-form__panel p-3 border-radius-xl bg-white" data-animation="FadeIn">
                    <h5 class="font-weight-bolder">Cluster</h5>
                    <div class="multisteps-form__content">
                      <div class="row mt-3">
                        <div class="col-12">
                          <label>Choose Cluster</label>
                              <select class="multisteps-form__select form-control cluster_id" name="cluster" id="choices-category">
                                <option disabled selected>--Select</option>
                                @foreach ($clusters as $c)
                                    <option value="{{$c->id}}">{{$c->cluster_type->name}}</option>
                                @endforeach
                              </select>
                        </div>
                      </div>

                      <div class="row mt-3">
                        <div class="col-12" id="data_list"> 
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
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
$(document).ready(function () {
            
	$('.cluster_id').on('change', function() {
        var req_value = this.value;
        console.log(req_value);
        	    $.ajax({
		
        	        url:"{{ route('search_tank') }}",
		
        	        type:"GET",
		
        	        data:{'data':req_value},
		
        	        success:function (data) {
                    console.log(data);
        	            $('#data_list').html(data);

        	        }
        	    })

    	});
});
</script>
@endsection
