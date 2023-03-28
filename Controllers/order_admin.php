<?php

$order = new Orders();
$orderOut = new OrdersLogout();

$orderData = $order->getOrders();
$orderLogoutData = $orderOut->getOrdersLogout();

// include_once('./Admin/Views/OrderShow.php');

if (isset($_GET['id']) && isset($_GET['status']) && isset($_GET['order'])) {
  $status = $_GET['status'];
  $id = $_GET['id'];
  $table = $_GET['order'];
  if ($status > 0) {
    if ($table == "member") {
      $result = $order->updateStatus($id, $status);
    } else {
      $result = $orderOut->updateStatus($id, $status);
    }
    if ($result) {
      // echo "<script>alert('Confirm Order Success')</script>";
      echo '<meta http-equiv="refresh" content="0; url=../TravelTourist/index.php?ctrl=admin&page=order" />';
    } else {
      // echo "<script>alert('Confirm Order Fail')</script>";
      echo '<meta http-equiv="refresh" content="0; url=../TravelTourist/index.php?ctrl=admin&page=order" />';
    }
  }
  if ($status < 0) {
    if ($table == "member") {
      $result = $order->updateStatus($id, $status);
    } else {
      $result = $orderOut->updateStatus($id, $status);
    }
    if ($result) {
      // echo "<script>alert('Cancel Order Success')</script>";
      echo '<meta http-equiv="refresh" content="0; url=../TravelTourist/index.php?ctrl=admin&page=order" />';
    } else {
      // echo "<script>alert('Cancel Order Fail')</script>";
      echo '<meta http-equiv="refresh" content="0; url=../TravelTourist/index.php?ctrl=admin&page=order" />';
    }
  }
}


if (isset($_GET['act'])) {
  $order = new Orders();
  $orderOut = new OrdersLogout();
  $action = $_GET['act'];

  switch ($action) {
    case 'update':

      break;
    case 'delete':
      if (isset($_GET['order']) && isset($_GET['id'])) {
        if ($_GET['order'] == "member") {
          $result = $order->deleteOrder($_GET['id']);
          if ($result) {
            echo "<script>alert('Delete Order Success')</script>";
            echo '<meta http-equiv="refresh" content="0; url=../TravelTourist/index.php?ctrl=admin&page=order" />';
          } else {
            echo "<script>alert('Delete Order Fail')</script>";
            echo '<meta http-equiv="refresh" content="0; url=../TravelTourist/index.php?ctrl=admin&page=order" />';
          }
        } else {
          $result = $orderOut->deleteOrder($_GET['id']);
          if ($result) {
            echo "<script>alert('Delete Order Success')</script>";
            echo '<meta http-equiv="refresh" content="0; url=../TravelTourist/index.php?ctrl=admin&page=order" />';
          } else {
            echo "<script>alert('Delete Order Fail')</script>";
            echo '<meta http-equiv="refresh" content="0; url=../TravelTourist/index.php?ctrl=admin&page=order" />';
          }
        }
      }
      break;

    case 'deleteall':
      if (isset($_GET['order'])) {
        if ($_GET['order'] == "member") {
          $result = $order->deleteAllOrder();
          if ($result == 0) {
            echo "<script>alert('Delete Order Success')</script>";
            echo '<meta http-equiv="refresh" content="0; url=../TravelTourist/index.php?ctrl=admin&page=order" />';
          } else {
            echo "<script>alert('Delete Order Fail')</script>";
            echo '<meta http-equiv="refresh" content="0; url=../TravelTourist/index.php?ctrl=admin&page=order" />';
          }
        } else {
          $result = $orderOut->deleteAllOrder();
          if ($result == 0) {
            echo "<script>alert('Delete Order Success')</script>";
            echo '<meta http-equiv="refresh" content="0; url=../TravelTourist/index.php?ctrl=admin&page=order" />';
          } else {
            echo "<script>alert('Delete Order Fail')</script>";
            echo '<meta http-equiv="refresh" content="0; url=../TravelTourist/index.php?ctrl=admin&page=order" />';
          }
        }
      }
      break;
  }
}
include_once('./Admin/Views/OrderShow.php');
?>