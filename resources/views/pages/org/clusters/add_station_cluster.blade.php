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
                        <span class="text-xs text-secondary">Business Point </span>
                      </a>
                      |
                    <a href="#" class="cursor-pointer text-secondary">
                        <span class="text-xs text-secondary">Add </span>
                      </a>
                </div>
                <h6 class="font-weight-bolder mb-0">Business Point</h6>
                <p> Add a new Business Point to {{$station->name}}</p>
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
                  <button class="multisteps-form__progress-btn js-active" type="button" title="Add Cluster Info">
                    <span>1. Business Point Info</span>
                  </button>
                  <button class="multisteps-form__progress-btn" type="button" title="What type of cluster?">2. Category Type</button>
                  <button class="multisteps-form__progress-btn" type="button" title="Supervisor">3. Supevisor</button>
                </div>
              </div>
            </div>
            <!--form panels-->
            <div class="row">
              <div class="col-12 col-lg-8 m-auto">
                <form class="multisteps-form__form mb-8" style="height: 406px;" action="{{route('store_cluster')}}" method="post">
                  @csrf
                  <!--single form panel info-->
                  <div class="card multisteps-form__panel p-3 border-radius-xl bg-white js-active" data-animation="FadeIn">
                    <h5 class="font-weight-bolder">Information</h5>
                    <div class="multisteps-form__content">
                      <div class="row mt-3">
                        <div class="col-12 col-sm-12">
                          <label>Type:</label>
                          <select required class="multisteps-form__select form-control" name="name" id="choices-category">
                            <option disabled selected>Select Type of Business Point</option>
                            @foreach ($cluster_types as $ct)
                                <option value="{{$ct->id}}">{{$ct->name}}</option>
                            @endforeach
                          </select>
                          {{-- <input required name="name" class="multisteps-form__input form-control" type="text" placeholder="eg. Cluster name " onfocus="focused(this)" onfocusout="defocused(this)"> --}}
                        </div>
                        
                      </div>
                      <div class="button-row d-flex mt-4">
                        <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Next</button>
                      </div>
                    </div>
                  </div>

                  <!--single form panel type of-->
                  <div class="card multisteps-form__panel p-3 border-radius-xl bg-white" data-animation="FadeIn">
                    <h5 class="font-weight-bolder">Business Point category type</h5>
                    <div class="multisteps-form__content">
                      <div class="row mt-3">
                        <div class="col-12 col-sm-9">
                          <label>Type</label>
                            <select required class="multisteps-form__select form-control" name="type" id="type">
                                    <option value="tanks">With Sub-Cluster</option>
                                    <option value="others">Other(s)</option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-3 mt-3 mt-sm-0" id="show_input">
                          <label>...<small>(add a dynamic sub.)</small></label>
                          <button onClick="GFG_Fun()" id="add_field" class="btn bg-gradient-secondary mb-0 multisteps-form__select form-control" type="button" title="Add">Add sub</button>
                        </div>
                      </div>
                      <div id="sub_c" class="row mt-3 sub_cluster">
                        {{-- <div class="col-12 col-sm-12">
                          <label> Tank Name</label>
                          <input required name="tname" class="multisteps-form__input form-control" type="text" placeholder="eg. Tank1 name " onfocus="focused(this)" onfocusout="defocused(this)">
                        </div> --}}
                      </div>
                      <div class="button-row d-flex mt-4">
                        <button class="btn bg-gradient-secondary mb-0 js-btn-prev" type="button" title="Prev">Prev</button>
                        <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Next</button>
                      </div>
                    </div>
                  </div>

                  <input type="hidden" name="station" value="{{$station->id}}">
                  
                  
                  <!--single form panel-->
                  <div class="card multisteps-form__panel p-3 border-radius-xl bg-white" data-animation="FadeIn">
                    <h5 class="font-weight-bolder">Supervisor</h5>
                    <div class="multisteps-form__content">
                      <div class="row mt-3">
                        <div class="col-12">
                          <label>Choose station supervisor</label>
                              <select class="multisteps-form__select form-control" name="supervisor" id="choices-category">
                                @foreach ($supervisors as $supervisor)
                                    <option value="{{$supervisor->id}}">{{$supervisor->name}}</option>
                                @endforeach
                              </select>
                          {{-- <input class="multisteps-form__input form-control" type="text" placeholder="@argon" onfocus="focused(this)" onfocusout="defocused(this)"> --}}
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
    <script>
    // Create a break line element
    var br = document.createElement("br");
    var c = 1;
    function GFG_Fun() {
 
    // Create an input element for Full Name
    var FN = document.createElement("input");
    FN.setAttribute("type", "text");
    FN.setAttribute("name", "tname["+c+"]");
    FN.setAttribute("placeholder", "eg. Tank"+c+" name");
    FN.setAttribute("class", "multisteps-form__input form-control mb-3 ml-2 mr-2 ddd");
    FN.setAttribute("required", "required");
    FN.setAttribute("id", "dd");
                 
    document.getElementsByClassName("sub_cluster")[0]
   .appendChild(FN);
   document.getElementsByClassName("sub_cluster")[0]
   .appendChild(br);
    c=c+1;
    }

$(document).ready(function () {        
	$('#type').on('change', function() {
        var req_value = this.value;
          if (req_value == "others" ) {
            $('#show_input').css('display', 'none');
            $('.ddd').css('display', 'none');
          }else{
            $('#show_input').css('display', 'block');
            $('.ddd').css('display', 'block');
	        }
    	});
});
</script>
@endsection
