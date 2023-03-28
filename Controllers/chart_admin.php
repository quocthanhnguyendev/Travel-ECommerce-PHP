<?php
$month = 0;
$year = 0;

$orderDetail = new OrderDetails();
$orderDetailLogout = new OrderDetailsLogout();
if (isset($_POST['month']) && isset($_POST['year'])) {
  $month = $_POST['month'];
  $year = $_POST['year'];
}
$resultLogin = $orderDetail->getChartOrder($month, $year);
$resultLogout = $orderDetailLogout->getChartOrderLogout($month, $year);
include_once('./Admin/Views/Chart.php');
?>