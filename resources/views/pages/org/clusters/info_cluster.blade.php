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
                </div>
                <h6 class="font-weight-bolder mb-0">Cluster</h6>
                <p>Cluster Info</p>
                <div>
                    <a href="{{back()}}" class="btn btn-default border-radius-xs">Back</a>
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
<br>

<div class="row">
    <div class="col-lg-12">
        <form class="multisteps-form__form mb-8" style="height: 406px;" action="{{route('update_cluster_info', ['id'=>$cluster->id])}}" method="post">
            @csrf
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0">Cluster Info</p>
                <button class="btn btn-primary btn-sm ms-auto" type="submit">Update</button>
              </div>
            </div>
            <div class="card-body">
              <p class="text-uppercase text-sm">Cluster Information</p>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Name</label>
                    <input class="form-control" type="text" name="name" value="{{$cluster->name}}" >
                  </div>
                </div>
                {{-- <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Description</label>
                    <input class="form-control" type="text" name="description" value="{{$cluster->description}}">
                  </div>
                </div> --}}
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">type</label>
                    <input class="form-control" type="text" name="type" value="{{$cluster->type}}" disabled>
                  </div>
                </div>
                <div class="col-md-6">
                  <?php if ($cluster->type == "tanks") {
                        $sub_clusters = $cluster->tanks;
                      } else{
                          $sub_clusters = $cluster->others;
                      }
                  ?>
                  <label for="example-text-input" class="form-control-label">Name's</label>
                  @if ($cluster->type == "tanks")
                  <button onclick="remove_sub()" class="btn btn-secondary btn-sm" style="float: right" type="button">clean</button>
                  <button onclick="add_sub()" class="btn btn-primary btn-sm" style="float: right" type="button">add</button>
                  @endif
                  
                  <ul class="sub_cluster">
                    @foreach ($sub_clusters as $sc)  
                      <li>{{$sc->name}}</li>
                    @endforeach
                    {{-- <li class=""> <input type="text"> </li> --}}
                  </ul>
                </div>
            </div>
              <hr class="horizontal dark">
              <p class="text-uppercase text-sm">Station</p>
                <div class="row mt-3">
                  <div class="col-6 col-md-4">
                    <label>Choose station</label>
                        <select class="multisteps-form__select form-control" name="station" id="choices-category">
                          <option value="{{$cluster->station->id}}">{{$cluster->station->name}}</option>
                          @foreach ($stations as $station)
                              <option value="{{$station->id}}" @selected(old('version') == $station)>
                                {{$station->name}}
                              </option>
                          @endforeach
                        </select>
                    {{-- <input class="multisteps-form__input form-control" type="text" placeholder="@argon" onfocus="focused(this)" onfocusout="defocused(this)"> --}}
                  </div>
                  <div class="col-md-4">
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Supervisor</label>
                        {{-- <input class="form-control" type="text" disabled value="{{$cluster->supervisor->name ?? "Not specified"}}"> --}}
                        <select class="multisteps-form__select form-control" name="supervisor" id="choices-category">
                          <option value="{{$cluster->supervisor->id}}">{{$cluster->supervisor->name ?? "Not specified"}}</option>
                          @foreach ($supervisors as $supervisor)
                              <option value="{{$supervisor->id}}" @selected(old('version') == $version)>
                                {{$supervisor->name}}
                              </option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">station manager</label>
                        <input class="form-control" type="text" disabled value="{{$cluster->station->manager->name ?? "Not specified"}}">
                      </div>
                    </div>
                </div>
              
            </div>
          </div>
        </form>
            
    </div>

</div>
@endsection

@section('script')
    <script>
    // Create a break line element
    var br = document.createElement("br");
    var c = 1;
    function add_sub() {

    // Create an input element for Full Name
    var FN = document.createElement("input");
    FN.setAttribute("type", "text");
    FN.setAttribute("name", "tname["+c+"]");
    FN.setAttribute("placeholder", "eg. Tank"+c+" name");
    FN.setAttribute("class", "form-control ddd");
    FN.setAttribute("id", "dd");

    document.getElementsByClassName("sub_cluster")[0]
   .appendChild(FN);
    c=c+1;
    }

    function remove_sub() {
      // Get the child element node
      var child = document.getElementsByClassName("ddd");
      // Remove the child element from the document
      child[c-2].parentNode.removeChild(child[c-2]);
      c=c-1;
    }
    </script>
@endsection