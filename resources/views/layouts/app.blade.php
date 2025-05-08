<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ config('app.name', 'Laravel App') }}</title>

  <!-- Stylesheets -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/templatemo-plot-listing.css') }}">
  <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
  <link rel="stylesheet" href="{{ asset('css/owl.css') }}">
  <link rel="stylesheet" href="{{ asset('css/animated.css') }}">
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" crossorigin="anonymous"/>

  <!-- Scripts -->
  <script src="https://unpkg.com/leaflet/dist/leaflet.js" crossorigin="anonymous"></script>
</head>

<body style="background: lightgray;">

<!-- Preloader Start -->
<div id="js-preloader" class="js-preloader">
  <div class="preloader-inner">
    <span class="dot"></span>
    <div class="dots">
      <span></span><span></span><span></span>
    </div>
  </div>
</div>
<!-- Preloader End -->

<!-- Header Start -->
<header id="header" class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <nav class="main-nav">
          <a href="/products" class="logo"></a>

          <ul class="nav">
            <li><a href="/products" class="{{ Request::is('products') ? 'active' : '' }}">Home</a></li>
            @auth
              <li><a href="{{ route('profile') }}"><i class="fa fa-user"></i> Profile</a></li>
              @if(Auth::user()->role == 'admin')
                <li><a href="{{ route('admin.dashboard') }}">Admin</a></li>
              @elseif(Auth::user()->role == 'penjual')
                <li><a href="{{ route('seller.dashboard') }}">Penjual</a></li>
              @endif
              <li>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button class="btn btn-sm btn-danger">Logout</button>
                </form>
              </li>
            @else
              <li><div class="main-white-button"><a href="{{ route('login') }}">Login</a></div></li>
              <li><div class="main-white-button"><a href="{{ route('register') }}">Register</a></div></li>
            @endauth
          </ul>

          <a class="menu-trigger">
            <span>Menu</span>
          </a>
        </nav>
      </div>
    </div>
  </div>
</header>
<!-- Header End -->

<!-- Main Section -->
<div class="main-banner">
  <div class="page-section">
    @yield('content')
  </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('js/owl-carousel.js') }}"></script>
<script src="{{ asset('js/animation.js') }}"></script>
<script src="{{ asset('js/imagesloaded.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>

<!-- SweetAlert Notifications -->
<script>
  @if(session('success'))
    Swal.fire({
      icon: 'success',
      title: 'Success',
      text: '{{ session('success') }}',
      showConfirmButton: false,
      timer: 1500
    });
  @elseif(session('error'))
    Swal.fire({
      icon: 'error',
      title: 'Error',
      text: '{{ session('error') }}',
      showConfirmButton: false,
      timer: 1500
    });
  @endif
</script>

<!-- Header Background Scroll Change -->
<script>
  $(window).on('scroll', function() {
    if ($(window).scrollTop() > 80) {
      $('#header').addClass('background-header');
    } else {
      $('#header').removeClass('background-header');
    }
  });
</script>

</body>
</html>
