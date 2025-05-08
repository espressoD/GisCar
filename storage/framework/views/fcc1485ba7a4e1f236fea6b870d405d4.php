<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GisCar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="<?php echo e(asset('css/fontawesome.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/templatemo-plot-listing.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/animated.css')); ?> ">
    <link rel="stylesheet" href="<?php echo e(asset('css/owl.css')); ?>">
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
            <a href="/products" class="logo">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li><a href="/products" class="active">Home</a></li>
              <li><a href="category.html">Category</a></li>
              <li><a href="listing.html">Listing</a></li>
              <li><a href="contact.html">Contact Us</a></li>
              <?php if(auth()->guard()->check()): ?>
                  <li><a href="<?php echo e(route('profile')); ?>"><i class="fa fa-user"></i> Profile</a></li>
              <?php else: ?>
                  <li><div class="main-white-button"><a href="<?php echo e(route('login')); ?>"></i>Login</a></div></li> 
              <?php endif; ?>
              
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
            <h6>Find Your Dream Car</h6>
            <h2>What Car Are You Looking For?</h2>
          </div>
        </div>
        <div class="col-lg-12">
          <form id="search-form" method="GET" action="<?php echo e(url()->current()); ?>">
            <div class="row">
              <!-- Area -->
              <div class="col-lg-3 align-self-center">
                <fieldset>
                  <select name="area" class="form-select" onchange="this.form.submit()">
                    <option value="" <?php echo e(request('area') == '' ? 'selected' : ''); ?>>All Areas</option>
                    <?php $__currentLoopData = $areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($area->daerah); ?>" <?php echo e(request('area') == $area->daerah ? 'selected' : ''); ?>>
                        <?php echo e($area->daerah); ?>

                      </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </fieldset>
              </div>
              <div class="col-lg-3 align-self-center">
                <fieldset>
                  <select name="jenis" class="form-select" onchange="this.form.submit()">
                    <option value="" <?php echo e(request('jenis') == '' ? 'selected' : ''); ?>>All Car Types</option>
                    <?php $__currentLoopData = $carTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($type->jenis); ?>" <?php echo e(request('jenis') == $type->jenis ? 'selected' : ''); ?>>
                        <?php echo e($type->jenis); ?>

                      </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </fieldset>
              </div>
              <div class="col-lg-3 align-self-center">
                <fieldset>
                  <select name="brand" class="form-select" onchange="this.form.submit()">
                    <option value="" <?php echo e(request('brand') == '' ? 'selected' : ''); ?>>All Brands</option>
                    <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($brand->merk); ?>" <?php echo e(request('brand') == $brand->merk ? 'selected' : ''); ?>>
                        <?php echo e($brand->merk); ?>

                      </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </fieldset>
              </div>
              <div class="col-lg-3 align-self-center">
                <fieldset>
                  <select name="price" class="form-select" onchange="this.form.submit()">
                    <option value="" <?php echo e(request('price') == '' ? 'selected' : ''); ?>>All Price Ranges</option>
                    <option value="low" <?php echo e(request('price') == 'low' ? 'selected' : ''); ?>>Rp 100JT - Rp 250JT</option>
                    <option value="mid" <?php echo e(request('price') == 'mid' ? 'selected' : ''); ?>>Rp 250JT - Rp 500JT</option>
                    <option value="high" <?php echo e(request('price') == 'high' ? 'selected' : ''); ?>>Rp 500JT - Rp 1M</option>
                    <option value="luxury" <?php echo e(request('price') == 'luxury' ? 'selected' : ''); ?>>Rp 1M or more</option>
                  </select>
                </fieldset>
              </div>
            </div>
          </form>          
        </div>
      </div>
      <div class="container mt-5">
        <div class="row">
          <div class="col-md-12">
            <div id="map"></div>
                <script>
                  let map = L.map('map').setView([-2.466250, 117.99611], 5);
                  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '© OpenStreetMap'
                  }).addTo(map);
                
                  const allData = <?php echo json_encode($initialMarkers, 15, 512) ?>;
                  let markers = [];
              
                  function clearMarkers() {
                    markers.forEach(marker => map.removeLayer(marker));
                    markers = [];
                  }
                
                  function addMarkers(data) {
                    data.forEach(product => {
                      if (product.Lat && product.Long) {
                        const marker = L.marker([product.Lat, product.Long])
                          .addTo(map)
                          .bindPopup(`
                            <b>${product.judul}</b><br>
                            <b>Harga:</b> Rp ${Number(product.harga).toLocaleString()}<br>
                            <b>Daerah:</b> ${product.daerah}<br>
                            <b>ID:</b> ${product.id}<br>
                            <button class="btn btn-sm btn-primary mt-1" onclick='showProductDetail(${JSON.stringify(product)})'>Lihat Detail</button>
                          `);
                        markers.push(marker);
                      }
                    });
                  }
                
                  clearMarkers();
                  addMarkers(allData);

                  function showProductDetail(product) {
                    document.getElementById('modalImage').src = product.gambar;
                    document.getElementById('modalTitle').innerText = product.judul;
                    document.getElementById('modalPrice').innerText = `Rp ${Number(product.harga).toLocaleString()}`;
                    document.getElementById('modalDesc').innerText = product.deskripsi;
                    document.getElementById('modalAddress').innerText = product.alamat;
                    document.getElementById('modalContact').innerText = product.kontak;

                    const modal = new bootstrap.Modal(document.getElementById('productModal'));
                    modal.show();

                    setTimeout(() => {
                      const modalMap = L.map('modalMap').setView([product.Lat, product.Long], 15);
                      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '© OpenStreetMap'
                      }).addTo(modalMap);
                      L.marker([product.Lat, product.Long]).addTo(modalMap);
                    }, 500);
                  }
                </script>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="recent-listing">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <h2>Recent Listing</h2>
            <h6>Check Them Out</h6>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="owl-carousel owl-listing">
            <div class="item">
              <div class="row">
                <div class="col-lg-12">
                  <div class="listing-item">
                    <div class="left-image">
                      <a href="#"><img src="images/listing-01.jpg" alt=""></a>
                    </div>
                    <div class="right-content align-self-center">
                      <a href="#"><h4>1. First Apartment Unit</h4></a>
                      <h6>by: Sale Agent</h6>
                      <ul class="rate">
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li>(18) Reviews</li>
                      </ul>
                      <span class="price"><div class="icon"><img src="images/listing-icon-01.png" alt=""></div> $450 - $950 / month with taxes</span>
                      <span class="details">Details: <em>2760 sq ft</em></span>
                      <ul class="info">
                        <li><img src="images/listing-icon-02.png" alt=""> 4 Bedrooms</li>
                        <li><img src="images/listing-icon-03.png" alt=""> 4 Bathrooms</li>
                      </ul>
                      <div class="main-white-button">
                        <a href="contact.html"><i class="fa fa-eye"></i> Contact Now</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="listing-item">
                    <div class="left-image">
                      <a href="#"><img src="images/listing-02.jpg" alt=""></a>
                    </div>
                    <div class="right-content align-self-center">
                      <a href="#"><h4>2. Another House of Gaming</h4></a>
                      <h6>by: Top Sale Agent</h6>
                      <ul class="rate">
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li>(24) Reviews</li>
                      </ul>
                      <span class="price"><div class="icon"><img src="images/listing-icon-01.png" alt=""></div> $1,400 - $3,500 / month with taxes</span>
                      <span class="details">Details: <em>3650 sq ft</em></span>
                      <ul class="info">
                        <li><img src="images/listing-icon-02.png" alt=""> 4 Bedrooms</li>
                        <li><img src="images/listing-icon-03.png" alt=""> 3 Bathrooms</li>
                      </ul>
                      <div class="main-white-button">
                        <a href="contact.html"><i class="fa fa-eye"></i> Contact Now</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="listing-item">
                    <div class="left-image">
                      <a href="#"><img src="images/listing-03.jpg" alt=""></a>
                    </div>
                    <div class="right-content align-self-center">
                      <a href="#"><h4>3. Secret Place Hidden House</h4></a>
                      <h6>by: Best Property</h6>
                      <ul class="rate">
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li>(36) Reviews</li>
                      </ul>
                      <span class="price"><div class="icon"><img src="images/listing-icon-01.png" alt=""></div> $1,500 - $3,600 / month with taxes</span>
                      <span class="details">Details: <em>5500 sq ft</em></span>
                      <ul class="info">
                        <li><img src="images/listing-icon-02.png" alt=""> 4 Bedrooms</li>
                        <li><img src="images/listing-icon-03.png" alt=""> 3 Bathrooms</li>
                      </ul>
                      <div class="main-white-button">
                        <a href="contact.html"><i class="fa fa-eye"></i> Contact Now</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="row">
                <div class="col-lg-12">
                  <div class="listing-item">
                    <div class="left-image">
                      <a href="#"><img src="images/listing-04.jpg" alt=""></a>
                    </div>
                    <div class="right-content align-self-center">
                      <a href="#"><h4>4. Sunshine Fourth Apartment</h4></a>
                      <h6>by: Sale Agent</h6>
                      <ul class="rate">
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li>(24) Reviews</li>
                      </ul>
                      <span class="price"><div class="icon"><img src="images/listing-icon-01.png" alt=""></div> $3,600 / month with taxes</span>
                      <span class="details">Details: <em>3660 sq ft</em></span>
                      <ul class="info">
                        <li><img src="images/listing-icon-02.png" alt=""> 5 Bedrooms</li>
                        <li><img src="images/listing-icon-03.png" alt=""> 3 Bathrooms</li>
                      </ul>
                      <div class="main-white-button">
                        <a href="contact.html"><i class="fa fa-eye"></i> Contact Now</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="listing-item">
                    <div class="left-image">
                      <a href="#"><img src="images/listing-05.jpg" alt=""></a>
                    </div>
                    <div class="right-content align-self-center">
                      <a href="#"><h4>5. Best House Of the Town</h4></a>
                      <h6>by: Sale Agent</h6>
                      <ul class="rate">
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li>(32) Reviews</li>
                      </ul>
                      <span class="price"><div class="icon"><img src="images/listing-icon-01.png" alt=""></div> $5,600 / month with taxes</span>
                      <span class="details">Details: <em>1750 sq ft</em></span>
                      <ul class="info">
                        <li><img src="images/listing-icon-02.png" alt=""> 6 Bedrooms</li>
                        <li><img src="images/listing-icon-03.png" alt=""> 3 Bathrooms</li>
                      </ul>
                      <div class="main-white-button">
                        <a href="contact.html"><i class="fa fa-eye"></i> Contact Now</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="listing-item">
                    <div class="left-image">
                      <a href="#"><img src="images/listing-06.jpg" alt=""></a>
                    </div>
                    <div class="right-content align-self-center">
                      <a href="#"><h4>6. Amazing Pool Party Villa</h4></a>
                      <h6>by: Sale Agent</h6>
                      <ul class="rate">
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li>(40) Reviews</li>
                      </ul>
                      <span class="price"><div class="icon"><img src="images/listing-icon-01.png" alt=""></div> $3,850 / month with taxes</span>
                      <span class="details">Details: <em>3660 sq ft</em></span>
                      <ul class="info">
                        <li><img src="images/listing-icon-02.png" alt=""> 4 Bedrooms</li>
                        <li><img src="images/listing-icon-03.png" alt=""> 3 Bathrooms</li>
                      </ul>
                      <div class="main-white-button">
                        <a href="contact.html"><i class="fa fa-eye"></i> Contact Now</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="row">
                <div class="col-lg-12">
                  <div class="listing-item">
                    <div class="left-image">
                      <a href="#"><img src="images/listing-05.jpg" alt=""></a>
                    </div>
                    <div class="right-content align-self-center">
                      <a href="#"><h4>7. Sunny Apartment</h4></a>
                      <h6>by: Sale Agent</h6>
                      <ul class="rate">
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li>(24) Reviews</li>
                      </ul>
                      <span class="price"><div class="icon"><img src="images/listing-icon-01.png" alt=""></div> $5,450 / month with taxes</span>
                      <span class="details">Details: <em>1640 sq ft</em></span>
                      <ul class="info">
                        <li><img src="images/listing-icon-02.png" alt=""> 8 Bedrooms</li>
                        <li><img src="images/listing-icon-03.png" alt=""> 5 Bathrooms</li>
                      </ul>
                      <div class="main-white-button">
                        <a href="contact.html"><i class="fa fa-eye"></i> Contact Now</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="listing-item">
                    <div class="left-image">
                      <a href="#"><img src="images/listing-02.jpg" alt=""></a>
                    </div>
                    <div class="right-content align-self-center">
                      <a href="#"><h4>8. Third House of Gaming</h4></a>
                      <h6>by: Sale Agent</h6>
                      <ul class="rate">
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li>(15) Reviews</li>
                      </ul>
                      <span class="price"><div class="icon"><img src="images/listing-icon-01.png" alt=""></div> $5,520 / month with taxes</span>
                      <span class="details">Details: <em>1660 sq ft</em></span>
                      <ul class="info">
                        <li><img src="images/listing-icon-02.png" alt=""> 5 Bedrooms</li>
                        <li><img src="images/listing-icon-03.png" alt=""> 4 Bathrooms</li>
                      </ul>
                      <div class="main-white-button">
                        <a href="contact.html"><i class="fa fa-eye"></i> Contact Now</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="listing-item">
                    <div class="left-image">
                      <a href="#"><img src="images/listing-06.jpg" alt=""></a>
                    </div>
                    <div class="right-content align-self-center">
                      <a href="#"><h4>9. Relaxing BBQ Party Villa</h4></a>
                      <h6>by: Sale Agent</h6>
                      <ul class="rate">
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li>(20) Reviews</li>
                      </ul>
                      <span class="price"><div class="icon"><img src="images/listing-icon-01.png" alt=""></div> $4,760 / month with taxes</span>
                      <span class="details">Details: <em>2880 sq ft</em></span>
                      <ul class="info">
                        <li><img src="images/listing-icon-02.png" alt=""> 6 Bedrooms</li>
                        <li><img src="images/listing-icon-03.png" alt=""> 4 Bathrooms</li>
                      </ul>
                      <div class="main-white-button">
                        <a href="contact.html"><i class="fa fa-eye"></i> Contact Now</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="about">
            <div class="logo">
              <img src="images/black-logo.png" alt="Plot Listing">
            </div>
            <p>Giscar is platform for searching luxuresque used cars all-around Indonesia.</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="helpful-links">
            <h4>Helpful Links</h4>
            <div class="row">
              <div class="col-lg-6 col-sm-6">
                <ul>
                  <li><a href="#">Categories</a></li>
                  <li><a href="#">Reviews</a></li>
                  <li><a href="#">Listing</a></li>
                  <li><a href="#">Contact Us</a></li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul>
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Awards</a></li>
                  <li><a href="#">Useful Sites</a></li>
                  <li><a href="#">Privacy Policy</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="contact-us">
            <h4>Contact Us</h4>
            <p>27th Street of New Town, Digital Villa</p>
            <div class="row">
              <div class="col-lg-6">
                <a href="#">010-020-0340</a>
              </div>
              <div class="col-lg-6">
                <a href="#">090-080-0760</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="sub-footer">
            <p>Copyright © 2025 GisCar., Ltd. All Rights Reserved.
            </p>
          </div>
        </div>
      </div>
    </div>
  </footer> 
      <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="<?php echo e(asset('js/owl-carousel.js')); ?>"></script>
    <script src="<?php echo e(asset('js/animation.js')); ?>"></script>
    <script src="<?php echo e(asset('js/imagesloaded.js')); ?>"></script>
    <script src="<?php echo e(asset('js/custom.js')); ?>"></script>
    <script>
      <?php if(session('success')): ?>
      Swal.fire({
        icon: 'success',
        title: 'Success',
        text: '<?php echo e(session('success')); ?>'
        showConfirmButton: false,
        timer: 1500
      });
      <?php elseif(session('error')): ?>
      Swal.fire({
        icon: 'error',
        title: 'Error',
        text: '<?php echo e(session('error')); ?>'
        showConfirmButton: false,
        timer: 1500
      });
      <?php endif; ?>
    </script>
    <div id="productModal" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-body d-flex">
            <div class="col-md-6 p-3">
              <img id="modalImage" src="" alt="Mobil" class="img-fluid rounded w-100">
            </div>

            <div class="col-md-6 p-3">
              <h3 id="modalTitle"></h3>
              <p><strong>Harga:</strong> <span id="modalPrice"></span></p>
              <p><strong>Deskripsi:</strong> <span id="modalDesc"></span></p>
              <p><strong>Alamat:</strong> <span id="modalAddress"></span></p>
              <div id="modalMap" style="height: 200px;" class="my-3 rounded"></div>
              <p><strong>Kontak:</strong> <span id="modalContact"></span></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  
</body>
</html><?php /**PATH C:\xampp\htdocs\GisCar\resources\views/products/index.blade.php ENDPATH**/ ?>