<?php
$detailOut = new OrderDetailsLogout();
$detail = new OrderDetails();
$detailData = "";
if (isset($_GET['order']) && isset($_GET['id'])) {

  $table = $_GET['order'];
  $id = $_GET['id'];


  if ($table == "member") {
    $detailData = $detail->getOrderDetailById($id);
    // foreach ($detailData as $key => $value) {
    //   echo $value['order_id'];
    // }
  } else {
    $detailData = $detailOut->getOrderDetailLogoutById($id);
    // foreach ($detailData as $key => $value) {
    //   echo $value['order_id'];
    // }

  }

}
include_once('./Admin/Views/DetailShow.php');
?>