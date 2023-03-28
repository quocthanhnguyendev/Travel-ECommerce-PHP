<?php
class Orders
{
  function __construct()
  {
  }

  function insertOrder($id_user)
  {
    $db = new Connection();
    $query = "insert INTO `orders`(`user_id`) VALUES ('$id_user')";
    $result = $db->Execute($query);
    $_SESSION['order_id'] = $db->lastIdInsert(); //Lấy ID sau khi insert để insert vào bảng detail order
    return $result;
  }

  function usePointUpdateTotal($point, $id_order)
  {
    $db = new Connection();
    $query = "update `orders` SET `total`= `total`- $point WHERE order_id = $id_order;";
    $db->Execute($query);
  }

  function updateStatus($id_order, $status)
  {
    $db = new Connection();
    $query = "update `orders` SET `status`='$status' WHERE order_id = $id_order;";
    return $db->Execute($query);
  }

  function deleteOrder($id_order)
  {
    $db = new Connection();
    $query = "delete FROM `orders` WHERE order_id = $id_order";
    return $db->Execute($query);
  }

  function deleteAllOrder()
  {
    $db = new Connection();
    $query = "TRUNCATE table `orders`";
    return $db->Execute($query);
  }

  function getOrders()
  {
    $db = new Connection();
    $select = "select * FROM `orders`, `users` GROUP BY orders.created DESC";
    $result = $db->SelectData($select);
    return $result;
  }

  function getTotalOrdersById($id)
  {
    $db = new Connection();
    $select = "select `total` FROM `orders` WHERE order_id = $id";
    $result = $db->SelectOneData($select);
    return $result;
  }

  function getOrderOfUser($user_id)
  {
    $db = new Connection();
    $select = "select * FROM `orders`, `users` WHERE orders.user_id = $user_id and users.user_id = $user_id GROUP BY orders.created DESC";
    $result = $db->SelectData($select);
    return $result;
  }

  function getQuatityOrder($user_id)
  {
    $db = new Connection();
    $select = "select COUNT(orders.order_id) as quatity FROM `orders` WHERE orders.user_id = $user_id";
    $result = $db->SelectOneData($select);
    return $result;
  }

  function getOneOrderOfUser($user_id, $order_id)
  {
    $db = new Connection();
    $select = "select * FROM orders, users WHERE order_id = $order_id AND users.user_id=$user_id;";
    $result = $db->SelectOneData($select);
    return $result;
  }

  function getNumberOrder()
  {
    $db = new Connection();
    $select = "select COUNT(order_id) as quatity_order FROM `orders`";
    $result = $db->SelectOneData($select);
    return $result;
  }

  function getSumAmountOrder()
  {
    $db = new Connection();
    $select = "select sum(orders.total) as sum_order FROM `orders`";
    $result = $db->SelectOneData($select);
    return $result;
  }
}

?>