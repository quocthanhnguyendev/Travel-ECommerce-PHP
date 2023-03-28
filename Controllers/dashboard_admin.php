<?php

$user = new Users();
$like = new Likes();
$order = new Orders();
$orderLogout = new OrdersLogout();
$comment = new Comment();

$orderDetail = new OrderDetails();
$orderDetailLogout = new OrderDetailsLogout();

$quatityUser = $user->getQuatityUser();
$NumberOrder = $order->getNumberOrder() + $orderLogout->getQuatityOrderLogout();
$totalOrder = $order->getSumAmountOrder() + $orderLogout->getSumAmountOrderLogout();
$quatityLike = $like->getQuatityLike();
$quatityComment = $comment->getQuatityComment();

$tourismBought = $orderDetail->getQuatityTourismBought() + $orderDetailLogout->getQuatityTourismBought();


include_once('./Admin/Views/DashBoard.php');
?>