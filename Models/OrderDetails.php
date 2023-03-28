<?php
class OrderDetails
{
  function __construct()
  {
  }
  function insertOrderDetail($order_id, $tour_id, $quatity, $totalitem, $transport, $start_date, $end_date)
  {

    $db = new Connection();
    $query = "insert INTO `orderdetails`(`order_id`, `tour_id`, `quatity`, `amount`, `transport`, `start_date`, `end_date`) VALUES ($order_id,$tour_id,$quatity,$totalitem,'$transport','$start_date', '$end_date')";
    $db->Execute($query);
  }

  function getOrderDetailById($order_id)
  {
    $db = new Connection();
    $select = "select orderdetails.order_id, orderdetails.tour_id, orderdetails.quatity, orderdetails.amount, orderdetails.transport, orderdetails.start_date, orderdetails.end_date, transport.ICON, tourist.NAME_TOUR, tourist.IMAGE_TOUR, country.NAME_COUNTRY FROM orderdetails, transport, tourist, country WHERE country.ID_COUNTRY = tourist.ID_COUNTRY and tourist.ID_TOUR = orderdetails.tour_id and transport.NAME_TRANSPORT = orderdetails.transport and order_id=$order_id;";
    $result = $db->SelectData($select);
    return $result;
  }

  public function getChartOrder($month, $year)
  {
    $db = new Connection();
    if ($month != 0 && $year != 0) {
      $result = "select tourist.NAME_TOUR as 'tourism_name',SUM( `tour_id`) as 'number_booking' FROM `orderdetails`,orders, tourist WHERE tour_id = tourist.ID_TOUR AND orderdetails.order_id = orders.order_id and MONTH(orders.created) = $month AND YEAR(orders.created) = $year GROUP BY tourist.NAME_TOUR";
      $result = $db->SelectData($result);
      return $result;
    } else {
      $result = "select tourist.NAME_TOUR as 'tourism_name',SUM( `tour_id`) as 'number_booking' FROM `orderdetails`, tourist WHERE tour_id = tourist.ID_TOUR GROUP BY tourist.NAME_TOUR";
      $result = $db->SelectData($result);
      return $result;
    }

  }

  public function getQuatityTourismBought()
  {
    $db = new Connection();
    $select = "select sum(quatity) as sum_tourism FROM `orderdetails`";
    return $db->SelectOneData($select);
  }
}
?>