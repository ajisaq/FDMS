@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong> {{ $message }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
      </button>
  </div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error!</strong> {{ $message }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
  </div>
@endif


@if ($message = Session::get('warning'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Warning!</strong> {{ $message }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif


@if ($message = Session::get('info'))
<div class="alert alert-info alert-dismissible fade show" role="alert">
      <strong>Info!</strong> {{ $message }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
  </div>
@endif


@if ($errors->any())

<div class="alert alert-danger alert-dismissible fade show">

<button type="button" class="close" data-dismiss="alert">×</button>

Please check the form below for errors

</div>

@endif