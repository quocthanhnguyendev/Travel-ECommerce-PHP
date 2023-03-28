<?php
class OrdersLogout
{
  function __construct()
  {
  }

  function insertOrderLogout($firstname, $lastname, $email, $phonenumber, $address)
  {
    $db = new Connection();
    $query = "insert INTO `orders_logout`(`firstname`, `lastname`, `email`, `phone`, `address`) VALUES ('$firstname','$lastname','$email','$phonenumber','$address')";
    $result = $db->Execute($query);
    $_SESSION['order_id'] = $db->lastIdInsert(); //Lấy ID sau khi insert để insert vào bảng detail order
    return $result;
  }

  function updateStatus($id_order, $status)
  {
    $db = new Connection();
    $query = "update `orders_logout` SET `status`='$status' WHERE order_id = $id_order;";
    return $db->Execute($query);
  }

  function deleteOrder($id_order)
  {
    $db = new Connection();
    $query = "delete FROM `orders_logout` WHERE order_id = $id_order";
    return $db->Execute($query);
  }

  function deleteAllOrder()
  {
    $db = new Connection();
    $query = "TRUNCATE table `orders_logout`";
    return $db->Execute($query);
  }

  function getOrdersLogout()
  {
    $db = new Connection();
    $select = "select * FROM `orders_logout` GROUP BY orders_logout.created DESC";
    $result = $db->SelectData($select);
    return $result;
  }

  function getTotalOrdersLogoutById($id)
  {
    $db = new Connection();
    $select = "select `total` FROM `orders_logout` WHERE order_id = $id";
    $result = $db->SelectOneData($select);
    return $result;
  }

  function usePointUpdateTotal($point, $id_order)
  {
    $db = new Connection();
    $query = "update `orders` SET `total`= `total`- $point WHERE order_id = $id_order;";
    $db->Execute($query);
  }

  function getOneOrderLogout($id_order)
  {
    $db = new Connection();
    $select = "select * FROM `orders_logout` WHERE order_id = $id_order";
    $result = $db->SelectOneData($select);
    return $result;
  }

  function getQuatityOrderLogout()
  {
    $db = new Connection();
    $select = "select COUNT(order_id) as quatity_order FROM `orders_logout`";
    $result = $db->SelectOneData($select);
    return $result;
  }

  function getSumAmountOrderLogout()
  {
    $db = new Connection();
    $select = "select sum(orders_logout.total) as quatity_order FROM `orders_logout`";
    $result = $db->SelectOneData($select);
    return $result;
  }
}

?>