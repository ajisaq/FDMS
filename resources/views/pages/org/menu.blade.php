@section('menu')
<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0  my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="home.html">
          <img src="../assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
          <span class="ms-1 font-weight-bold">{{Auth::user()->organization->name}}</span>
        </a>
      </div>
      <hr class="horizontal dark mt-0">
      <div class="collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link " href="{{route('home')}}">
                  <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                    <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                  </div>
                  <span class="nav-link-text ms-1"><b>Dashboard</b></span>
                </a>
            </li>
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#station" class="nav-link " aria-controls="station" role="button" aria-expanded="false">
                  <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                    <i class="ni ni-shop text-primary text-sm opacity-10"></i>
                  </div>
                  <span class="nav-link-text ms-1"><b>Station</b></span>
                </a>
                <div class="collapse " id="station">
                  <ul class="nav ms-4">
                    <li class="nav-item ">
                      <a class="nav-link" href="{{route('list_stations')}}">
                        <span class="sidenav-mini-icon"> L </span>
                        <span class="sidenav-normal"> Locations </span>
                      </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link " href="{{route('list_clusters')}}">
                            <span class="sidenav-mini-icon"> U </span>
                            <span class="sidenav-normal"> Users </span>
                        </a>
                    </li>  
                    <li class="nav-item ">
                        <a class="nav-link " href="{{route('list_pos')}}">
                            <span class="sidenav-mini-icon"> P </span>
                            <span class="sidenav-normal"> Pos </span>
                        </a>
                    </li> 
                    <li class="nav-item ">
                        <a class="nav-link " href="{{route('list_devices')}}">
                            <span class="sidenav-mini-icon"> d </span>
                            <span class="sidenav-normal"> Device </span>
                        </a>
                    </li>
                  </ul>
                </div>
            </li> 
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#sales" class="nav-link " aria-controls="sales" role="button" aria-expanded="false">
                  <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                    <i class="ni ni-money-coins text-primary text-sm opacity-10"></i>
                  </div>
                  <span class="nav-link-text ms-1"><b>Sales</b></span>
                </a>
                <div class="collapse " id="sales">
                  <ul class="nav ms-4">
                    <li class="nav-item ">
                      <a class="nav-link" href="#">
                        <span class="sidenav-mini-icon"> S </span>
                        <span class="sidenav-normal"> Stocks </span>
                      </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link " href="#">
                            <span class="sidenav-mini-icon"> S </span>
                            <span class="sidenav-normal"> Stations </span>
                        </a>
                    </li>
                  </ul>
                </div>
            </li> 
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#report" class="nav-link " aria-controls="report" role="button" aria-expanded="false">
                  <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                    <i class="ni ni-single-copy-04 text-primary text-sm opacity-10"></i>
                  </div>
                  <span class="nav-link-text ms-1"><b>Reports</b></span>
                </a>
                <div class="collapse " id="report">
                  <ul class="nav ms-4">
                    <li class="nav-item ">
                      <a class="nav-link" href="#">
                        <span class="sidenav-mini-icon"> S </span>
                        <span class="sidenav-normal"> Sales </span>
                      </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link " href="#">
                            <span class="sidenav-mini-icon"> U </span>
                            <span class="sidenav-normal"> Usage </span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link " href="#">
                            <span class="sidenav-mini-icon"> A </span>
                            <span class="sidenav-normal"> Analytics </span>
                        </a>
                    </li>
                  </ul>
                </div>
            </li> 

            <li class="nav-item">
                <a href="{{route('list_categories')}}" class="nav-link ">
                  <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                    <i class="ni ni-single-copy-04 text-primary text-sm opacity-10"></i>
                  </div>
                  <span class="nav-link-text ms-1"><b>Category</b></span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('list_customers')}}" class="nav-link ">
                  <div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
                    <i class="ni ni-single-copy-04 text-primary text-sm opacity-10"></i>
                  </div>
                  <span class="nav-link-text ms-1"><b>Customers</b></span>
                </a>
            </li> 
        </ul>
      </div>

</aside>
@endsection
