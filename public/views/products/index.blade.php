<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GisCar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="resources/css/fontawesome.css">
    <link rel="stylesheet" href="resources/css/templatemo-plot-listing.css">
    <link rel="stylesheet" href="resources/css/animated.css">
    <link rel="stylesheet" href="resources/css/owl.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin=""/>
     <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>
    <style media:"screen">
        #map {
            height: 580px;
        }
    </style>
</head>
<body style+"background: lightgray;">
      <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.html" class="logo">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li><a href="index.html" class="active">Home</a></li>
              <li><a href="category.html">Category</a></li>
              <li><a href="listing.html">Listing</a></li>
              <li><a href="contact.html">Contact Us</a></li> 
              <li><div class="main-white-button"><a href="#"><i class="fa fa-plus"></i> Add Your Listing</a></div></li> 
            </ul>        
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

    <div class="main-banner">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="top-text header-text">
                <h6>----</h6>
                <h2>Find Nearby Car Seller</h2>
              </div>
            </div>
            <div class="col-lg-12">
              <form id="search-form" name="gs" method="submit" role="search" action="#">
                <div class="row">
                  <div class="col-lg-3 align-self-center">
                      <fieldset>
                          <select name="area" class="form-select" aria-label="Area" id="chooseCategory" onchange="this.form.click()">
                              <option selected>All Areas</option>
                              <option value="Bandung">Bandung</option>
                              <option value="Jakarta">Jakarta</option>
                              <option value="Tangerang">Tangerang</option>
                          </select>
                      </fieldset>
                  </div>
                  <div class="col-lg-3 align-self-center">
                      <fieldset>
                          <input type="address" name="address" class="searchText" placeholder="Enter a location" autocomplete="on" required>
                      </fieldset>
                  </div>
                  <div class="col-lg-3 align-self-center">
                      <fieldset>
                          <select name="price" class="form-select" aria-label="Default select example" id="chooseCategory" onchange="this.form.click()">
                              <option selected>Price Range</option>
                              <option value="$100 - $250">$100 - $250</option>
                              <option value="$250 - $500">$250 - $500</option>
                              <option value="$500 - $1000">$500 - $1,000</option>
                              <option value="$1000+">$1,000 or more</option>
                          </select>
                      </fieldset>
                  </div>
                  <div class="col-lg-3">                        
                      <fieldset>
                          <button class="main-button"><i class="fa fa-search"></i> Search Now</button>
                      </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">GisCar</h3>
                    <hr>  
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="map"></div>
                <script>
                    var map = L.map('map').setView([-6.9688419, 107.6346415], 15);
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    }).addTo(map);
            
                    var marker = L.marker([-6.9688419, 107.6346415]).addTo(map);
                    marker.bindPopup("<b>Hello world!</b><br>Pondok Rafina.").openPopup();
                </script>
            </div>
        </div>
    </div>

      <!-- Scripts -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="resources/js/owl-carousel.js"></script>
    <script src="resources/js/animation.js"></script>
    <script src="resources/js/imagesloaded.js"></script>
    <script src="resources/js/custom.js"></script>
  
</body>
</html>