<?php
if (isset($_GET['act'])) {
  $action = $_GET['act'];
} else {
  $action = "";
}



$tour = new Tourist();
$tourResult = $tour->getTourist();
$page = new Page();

$countTour = $tourResult->rowCount();
$limit = 4;
$allPage = $page->findPage($countTour, $limit);
$pageStart = $page->findStart($limit);
$tourData = $tour->getTouristLimitPage($pageStart, $limit);
$CurrentPage = (isset($_GET['page'])) ? $_GET['page'] : 1;

$country = new Country();
$countryData = $country->getCountry();

switch ($action) {

  case 'sort':
    if (isset($_POST['Location']) && isset($_POST['Price'])) {
      $location = $_POST['Location'];
      $tour = new Tourist();

      $price = $_POST['Price'];
      switch ($price) {
        case '249':
          $tourData = $tour->getSortPriceUnderTourist($location, 250);
          break;
        case '250':
          $tourData = $tour->getSortPriceAroundTourist($location, 250, 500);
          break;
        case '501':
          $tourData = $tour->getSortPriceOverTourist($location, 500);
          break;
      }
    }
    include_once('Views/tourist.php');
    break;

  case 'details':
    if (isset($_GET['id'])) {
      $tour = new Tourist();
      $tour->updateViewsTourById($_GET['id']);

      $set = $tour->getDetailsTourist($_GET['id']);
      $likes = new Likes();
      $numberLike = $likes->getNumberLikeByIdTour($set['ID_TOUR']);

      $comment = new Comment();
      $commentData = $comment->getComment($_GET['id']);
    }

    include_once('Views/details.php');
    break;

  case 'like':
    if ($_GET['userId'] && $_GET["tourId"]) {
      $tour_id = $_GET["tourId"];
      $user_id = $_GET['userId'];
      $likes = new Likes();
      $liked = $likes->getOneLike($user_id, $tour_id);
      if (!$liked) {
        $likes->Like($user_id, $tour_id);
      } else {
        $likes->unLike($user_id, $tour_id);
      }
      echo "<script>window.location.href='index.php?ctrl=tourist&act=details&id=$tour_id'</script>";
    }
    break;

  case 'comment':
    if (isset($_POST['userId']) && isset($_POST['tourId']) && isset($_POST['textcomment'])) {
      $tour_id = $_POST["tourId"];
      $user_id = $_POST['userId'];
      $text_comment = $_POST["textcomment"];

      $comment = new Comment();
      $comment->insertComment($user_id, $tour_id, $text_comment);
      echo "<script>window.location.href='index.php?ctrl=tourist&act=details&id=$tour_id'</script>";
    }
    break;

  case 'bookingpackage':
    $id_tour = "";
    $name_tour = "";
    $price_tour = "";
    $start_date = "";
    $end_date = "";
    $sale = "";
    $number_people = "";
    $image_tour = "";
    $name_country = "";
    $transport = "";
    $flag_exists = false;

    if (!isset($_SESSION['package'])) {
      $_SESSION['package'] = array();
    }

    if (isset($_GET['param'])) {
      $param = $_GET['param'];
      $id_tour = $_GET['id'];
      switch ($param) {
        case 'delete':
          $tour = new Tourist();
          foreach ($_SESSION['package'] as $key => $value) {
            if ($value['id'] == $id_tour) {
              $QuatityOld = $tour->getQuatityTourist($value['id']);
              $QuatityNew = $QuatityOld['QUATITY'] + 1;
              $tour->updateQuatity($value['id'], $QuatityNew);
              $package = new BookingPackage();
              $package->Delete_Item($key);
            }
          }
          break;

        case 'update':
          $new_list = $_POST['quantity'];
          foreach ($_POST['quantity'] as $key => $quantity) {
            if ($_SESSION['package'][$key]['numberpeople'] != $quantity) {
              $package = new BookingPackage();
              $package->Update_Item($key, $quantity);
            }
          }
          break;
        case 'usepoint':
          if (isset($_POST['point'])) {
            $user = new Users();

            $_SESSION['usePoint'] = $_POST['point'];
            if ($_SESSION['usePoint'] <= $_SESSION['auth']['point']) {
              $_SESSION['auth']['point'] -= $_SESSION['usePoint'];
              $user->updateColumnUser("point", $_SESSION['auth']['user_id'], $_SESSION['auth']['point']);
            } else {
              echo "<script>alert('Use Point is not valid')</script>";
            }

          }
          break;
      }
    }

    if (isset($_POST['id_tour']) && isset($_POST['name_tour']) && isset($_POST['price_tour']) && isset($_POST['sale']) && isset($_POST['number_people']) && isset($_POST['name_country'])) {
      $id_tour = $_POST['id_tour'];
      $name_tour = $_POST['name_tour'];
      $price_tour = $_POST['price_tour'];
      $sale = $_POST['sale'];
      $number_people = $_POST['number_people'];
      $image_tour = $_POST['image_tour'];
      $name_country = $_POST['name_country'];
      $package = new BookingPackage();
      $tour = new Tourist();

      $QuatityOld = $tour->getQuatityTourist($id_tour);
      $QuatityNew = $QuatityOld['QUATITY'] - $number_people;
      $tour->updateQuatity($id_tour, $QuatityNew);

      if (count($_SESSION['package']) > 0) {
        foreach ($_SESSION['package'] as $key => $value) {
          if ($value['id'] == $id_tour) {
            $package->Exists_Item($key, $number_people);
            $flag_exists = true;
          }
        }
      } else {
        $flag_exists = false;
      }

      if ($flag_exists == false) {
        $package->add_To_Package($id_tour, $name_tour, $price_tour, $sale, $number_people, $image_tour, $name_country);

        // Nếu không đăng nhập gán vào SESSION USER
        if (empty($_SESSION['auth'])) {
          if (empty($_SESSION['user'])) {
            if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['phonenumber']) && isset($_POST['email']) && isset($_POST['address'])) {

              $userLogout = array(
                "firstname" => $_POST['firstname'],
                "lastname" => $_POST['lastname'],
                "phonenumber" => $_POST['phonenumber'],
                "email" => $_POST['email'],
                "address" => $_POST['address'],
              );
              $_SESSION['user'] = $userLogout;
            }
          }
        }
      }
    }
    include_once 'Views/bookingpackage.php';
    break;


  case 'payment':
    if (!empty($_SESSION['auth'])) {
      $order = new Orders();
      $result = $order->insertOrder($_SESSION['auth']['user_id']);
      if ($result) {
        $id_order = $_SESSION['order_id']; //Model Order
        $package = new BookingPackage();
        $order_detail = new OrderDetails();
        $user = new Users();

        if (!empty($_SESSION['package'])) {
          foreach ($_SESSION['package'] as $key => $tour) {
            $order_detail->insertOrderDetail($id_order, $tour['id'], $tour['numberpeople'], $tour['totalitem'], $tour['transport'], $tour['startdate'], $tour['enddate']);
          }
          $_SESSION['auth']['point'] = $_SESSION['auth']['point'] + 1;
          $user->updateColumnUser("point", $_SESSION['auth']['user_id'], $_SESSION['auth']['point']);

          // water
          $_SESSION['auth']['water'] = $_SESSION['auth']['water'] + 25;
          $user->updateWater($_SESSION['auth']['water'], $_SESSION['auth']['user_id']);

          if (!empty($_SESSION['usePoint'])) {
            $order->usePointUpdateTotal($_SESSION['usePoint'], $id_order);
            unset($_SESSION['usePoint']);
          }
          unset($_SESSION['package']);
          echo "<script>alert('Payment Success')</script>";
          echo "<script>window.location.href='index.php?ctrl=tourist&act=order'</script>";
        }
      }
    } else {
      if (isset($_SESSION['user'])) {
        $firstname = $_SESSION['user']['firstname'];
        $lastname = $_SESSION['user']['lastname'];
        $phonenumber = $_SESSION['user']['phonenumber'];
        $email = $_SESSION['user']['email'];
        $address = $_SESSION['user']['address'];
        $order = new OrdersLogout();
        $result = $order->insertOrderLogout($firstname, $lastname, $email, $phonenumber, $address);
        if ($result) {
          $id_order = $_SESSION['order_id']; //Model Order
          $order_detail = new OrderDetailsLogout();
          foreach ($_SESSION['package'] as $key => $tour) {
            $order_detail->insertOrderDetailLogout($id_order, $tour['id'], $tour['numberpeople'], $tour['totalitem'], $tour['transport'], $tour['startdate'], $tour['enddate']);
          }
        }
        unset($_SESSION['user']);
        unset($_SESSION['package']);
        echo "<script>alert('Payment Success')</script>";
        echo "<script>window.location.href='index.php?ctrl=tourist&act=orderdetail&id=$id_order'</script>";
      }
    }
    break;

  case 'order':
    include_once('Views/order.php');
    break;


  case 'orderdetail':
    $format = new Format();
    if (!empty($_SESSION['auth'])) {
      if (isset($_GET['id'])) {
        $order_id = $_GET['id'];

        $order_user = new Orders();
        $order_detail = new OrderDetails();

        $totalOrder = $order_user->getTotalOrdersById($order_id);

        $order_user = $order_user->getOneOrderOfUser($_SESSION['auth']['user_id'], $order_id);


        $order_detail = $order_detail->getOrderDetailById($order_id);


      }
    } else {
      if (isset($_GET['id'])) {
        $order_id = $_GET['id'];

        $orderLogout = new OrdersLogout();
        $orderDetailLogout = new OrderDetailsLogout();

        $getOneOrder = $orderLogout->getOneOrderLogout($order_id);
        $totalOrder = $orderLogout->getTotalOrdersLogoutById($order_id);

        $getOneOrderDetailLogout = $orderDetailLogout->getOrderDetailLogoutById($order_id);

        if (empty($getOneOrder) || empty($getOneOrderDetailLogout)) {
          echo "<script>alert('Detail Order does not exists or wrong !')</script>";
          echo "<script>window.location.href='index.php?ctrl=tourist'</script>";

        }
      }
    }

    include_once('Views/orderdetail.php');
    break;

  case 'booking':

    $firstname = "";
    $lastname = "";
    $email = "";
    $tourismname = "";
    $startdate = "";
    $enddate = "";
    $quatity = "";
    $phone = "";
    $transport = "";
    $address = "";
    if (empty($_SESSION['auth'])) {
      if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['quatity']) && isset($_POST['transport']) && isset($_POST['tourismname']) && isset($_POST['startdate']) && isset($_POST['enddate']) && isset($_POST['phonenumber']) && isset($_POST['address'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $tourismname = $_POST['tourismname'];
        $startdate = $_POST['startdate'];
        $enddate = $_POST['enddate'];
        $quatity = $_POST['quatity'];
        $phone = $_POST['phonenumber'];
        $transport = $_POST['transport'];
        $address = $_POST['address'];

        $tour = new Tourist();
        $format = new Format();
        $tourData = $tour->getOneTouristById($tourismname);

        $countDay = $format->CountDay($tourData['START_DATE'], $tourData['END_DATE']);
        echo $countDay;
        $totalTour = ($tourData['PRICE_TOUR'] / $countDay) * $quatity;


        $order = new OrdersLogout();
        $result = $order->insertOrderLogout($firstname, $lastname, $email, $phone, $address);
        if ($result) {
          $id_order = $_SESSION['order_id']; //Model Order
          $order_detail = new OrderDetailsLogout();
          $order_detail->insertOrderDetailLogout($id_order, $tourismname, $quatity, $totalTour, $transport, $startdate, $enddate);
          echo "<script>alert('Booking Success')</script>";
          echo "<script>window.location.href='index.php?ctrl=tourist&act=orderdetail&id=$id_order'</script>";
        }

      }
    } else {
      if (isset($_POST['quatity']) && isset($_POST['transport']) && isset($_POST['tourismname']) && isset($_POST['startdate']) && isset($_POST['enddate'])) {
        $user_id = $_POST['user_id'];
        $tourismname = $_POST['tourismname'];
        $startdate = $_POST['startdate'];
        $enddate = $_POST['enddate'];
        $quatity = $_POST['quatity'];
        $transport = $_POST['transport'];

        $order = new Orders();
        $order_detail = new OrderDetails();
        $tour = new Tourist();
        $user = new Users();
        $format = new Format();
        $tourData = $tour->getOneTouristById($tourismname);

        // point
        $_SESSION['auth']['point'] = $_SESSION['auth']['point'] + 1;
        $user->updateColumnUser("point", $_SESSION['auth']['user_id'], $_SESSION['auth']['point']);

        // water
        $_SESSION['auth']['water'] = $_SESSION['auth']['water'] + 25;
        $user->updateWater($_SESSION['auth']['water'], $_SESSION['auth']['user_id']);

        $countDay = $format->CountDay($tourData['START_DATE'], $tourData['END_DATE']);
        $totalTour = ($tourData['PRICE_TOUR'] / $countDay) * $quatity;

        $result = $order->insertOrder($user_id);
        if ($result) {
          $id_order = $_SESSION['order_id']; //Model Order
          $order_detail->insertOrderDetail($id_order, $tourismname, $quatity, $totalTour, $transport, $startdate, $enddate);
          echo "<script>alert('Booking Success')</script>";
          echo "<script>window.location.href='index.php?ctrl=tourist&act=orderdetail&id=$id_order'</script>";
        }

      }

    }
    include_once('Views/booking.php');
    break;

  default:
    if (isset($_POST['idOrder'])) {
      $idOrder = $_POST['idOrder'];
      echo "<script>window.location.href='index.php?ctrl=tourist&act=orderdetail&id=$idOrder'</script>";
    }
    include_once('Views/tourist.php');
    break;

}
?>