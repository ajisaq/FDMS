<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('/assets/img/favicon.png') }}">
  <title>
    Organization name
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{ asset('/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('/assets/css/argon-dashboard.css?v=2.0.1') }}" rel="stylesheet" />
</head>
<body class="g-sidenav-show   bg-gray-100">
    <div class="min-height-200 bg-gradient-info position-absolute w-100"></div>
    @yield('menu')
    <main class="main-content position-relative border-radius-lg ">
      @yield('nav')
     
      @yield('content')
        <footer class="footer pt-3  ">
          <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
              <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="copyright text-center text-sm text-muted text-lg-start">
                  © <script>
                    document.write(new Date().getFullYear())
                  </script>,
                  
                  <a href="https://www.ajisaq.com" class="font-weight-bold" target="_blank">AJISAQ LIMITED</a>
                 
                </div>
              </div>
              
            </div>
          </div>
        </footer>
      </div>
    </main>


  <script src="{{ asset('/assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('/assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>

  <script src="{{ asset('/assets/js/plugins/dragula/dragula.min.js') }}"></script>
  <script src="{{ asset('/assets/js/plugins/jkanban/jkanban.js') }}"></script>
  <script src="{{ asset('/assets/js/plugins/chartjs.min.js') }}"></script>
   
   <script async defer src="https://buttons.github.io/buttons.js"></script>
   <script src="{{ asset('/assets/js/argon-dashboard.min.js?v=2.0.1')}}"></script>
</body>
</html>