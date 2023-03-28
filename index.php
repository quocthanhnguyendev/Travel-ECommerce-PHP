<?php
session_start();

// Model
// include_once('./Models/Connection.php');
// include_once('./Models/Tourist.php');
// include_once('./Models/Format.php');
// include_once('./Models/BookingPackage.php');
// include_once('./Models/Users.php');
// include_once('./Models/Orders.php');
// include_once('./Models/OrderDetails.php');
// include_once("./Models/OrdersLogout.php");
// include_once("./Models/OrderDetailsLogout.php");
// include_once("./Models/Transport.php");
// include_once("./Models/Country.php");
// include_once("./Models/Likes.php");
// include_once("./Models/Contact.php");
// include_once("./Models/Comment.php");

set_include_path(get_include_path() . PATH_SEPARATOR . "Models/");
spl_autoload_extensions(".php");
spl_autoload_register();

if (isset($_GET['ctrl'])) {
  $controller = strtolower($_GET['ctrl']);
} else {
  $controller = "home";
}
$format = new Format();
if ($controller == "admin") {
  if (isset($_SESSION['auth'])) {
    if ($_SESSION['auth']['role'] != 0) {
      include_once('./Admin/Views/Header.php');
      if (isset($_GET['page'])) {
        $page = $_GET['page'];
      } else {
        $page = 'dashboard';
      }
      switch ($page) {
        case 'dashboard':
          include_once('Controllers/dashboard_admin.php');
          break;

        case 'chart':
          include_once('Controllers/chart_admin.php');
          break;

        case 'tourism':
          include_once('Controllers/tourism_admin.php');
          break;

        case 'category':
          include_once('Controllers/category_admin.php');
          break;

        case 'order':
          include_once('Controllers/order_admin.php');
          break;

        case 'order-detail':
          include_once('Controllers/detail_order_admin.php');
          break;
        case 'member':
          include_once('Controllers/user_admin.php');
          break;
      }
      include_once('./Admin/Views/Footer.php');
    } else {
      echo '<script> alert("Your account is not admin !")</script>';
      echo '<meta http-equiv="refresh" content="0; url=../TravelTourist/index.php?ctrl=home" />';
    }
  } else {
    echo '<script> alert("You have not login, you must login to Travel Admin!")</script>';
    echo '<meta http-equiv="refresh" content="0; url=../TravelTourist/index.php?ctrl=auth&act=login" />';
  }
} else {
  //General
  include_once('./Views/header.php');

  //Controller
  switch ($controller) {
    case 'home':
      include_once('Controllers/home.php');
      break;
    case 'tourist':
      include_once('Controllers/tourist.php');
      break;
    case 'contact':
      include_once('Controllers/contact.php');
      break;
    case 'about':
      include_once('Controllers/about.php');
      break;
    case 'details':
      include_once('Controllers/details.php');
      break;
    case 'auth':
      include_once('Controllers/auth.php');
      break;
    case 'profile':
      include_once('Controllers/profile.php');
      break;
    case 'settings':
      include_once('Controllers/settings.php');
      break;
    case 'coinfarm':
      include_once('Controllers/coinfarm.php');
      break;
    default:
      include_once('Controllers/home.php');
      break;
  }

  include_once('./Views/footer.php');
}
?>