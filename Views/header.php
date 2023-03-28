<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet" />

  <link rel="icon" href="Public/assets/images/logo_itc.png">
  <title>ITC Travel</title>

  <!-- Bootstrap core CSS -->
  <link href="Public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css" rel="stylesheet" />
  <!--

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="Public/assets/css/fontawesome.css" />
  <link rel="stylesheet" href="Public/assets/css/templatemo-woox-travel.css" />
  <link rel="stylesheet" href="Public/assets/css/owl.css" />
  <link rel="stylesheet" href="Public/assets/css/animate.css" />
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  <link rel="stylesheet" href="Public/assets/css/style.css">
  <link rel="stylesheet" href="Public/assets/css/details.css">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />

  -->
</head>

<body>
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
  <header class="header-area header-sticky">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.html" class="logo">
              <img src="Public/assets/images/logo_itc.png" style="width: 40px;" alt="" />
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav m-0" style="line-height: 50px;">
              <li><a href="index.php?ctrl=home">Home</a></li>
              <li><a href="index.php?ctrl=tourist">Tourism</a></li>
              <li><a href="index.php?ctrl=tourist&act=booking">Booking</a></li>
              <li><a href="index.php?ctrl=contact">Contact</a></li>
              <li><a href="index.php?ctrl=tourist&act=bookingpackage">Package</a></li>
              <?php
              if (!empty($_SESSION['auth'])):
                ?>
                <li>
                  <div class="btn-group" style="box-shadow: none; cursor: pointer;">
                    <a class="navbar-brand" data-mdb-toggle="dropdown" aria-expanded="false">

                      <img src="Public/assets/images/avatar/<?php if (!empty($_SESSION['auth']['avatar'])) {
                        echo $_SESSION['auth']['avatar'];
                      } else {
                        echo "avatardefault.png";
                      } ?>" alt="Avatar Logo"
                        style="width:40px; height: 40px; border: 3px solid white; object-fit: cover;"
                        class="rounded-pill">
                    </a>
                    <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu text-center">
                      <li><a class="dropdown-item text-dark rounded-0" href="index.php?ctrl=profile">
                          <?php echo $_SESSION['auth']['lastname'] . " " . $_SESSION['auth']['firstname'] ?>
                        </a></li>
                      <li><a class="dropdown-item text-dark" href="index.php?ctrl=tourist&act=order">Order Tourism</a>
                      </li>
                      <li>

                      <li><a class="dropdown-item text-dark" href="index.php?ctrl=coinfarm">Coin Farm</a></li>
                      <li>

                      <li><a class="dropdown-item text-dark" href="index.php?ctrl=settings">Settings</a></li>
                      <li>

                        <hr class="dropdown-divider" />
                      </li>
                      <?php
                      if (!empty($_SESSION['auth']['role']) && $_SESSION['auth']['role'] != 0):
                        ?>
                        <li><a class="dropdown-item text-dark" href="index.php?ctrl=admin">Back to admin</a></li>
                        <li>
                        <?php
                      endif;
                      ?>
                      <li><a class="dropdown-item text-dark rounded-0" href="index.php?ctrl=auth&act=logout">Logout</a>
                      </li>
                    </ul>
                  </div>
                </li>
                <?php
              else:
                ?>
                <li>
                  <a href="index.php?ctrl=auth&act=login">Login</a>
                </li>
                <?php
              endif;
              ?>
            </ul>
            <a class="menu-trigger">
              <span>Menu</span>
            </a>
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->