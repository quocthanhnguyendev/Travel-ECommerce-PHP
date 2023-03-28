<?php
class OrderDetailsLogout
{
  function __construct()
  {
  }
  function insertOrderDetailLogout($order_id, $tour_id, $quatity, $totalitem, $transport, $start_date, $end_date)
  {

    $db = new Connection();
    $query = "insert INTO `order_details_logout`(`order_id`, `tour_id`, `quatity`, `amount`,`transport`, `start_date`, `end_date`) VALUES ($order_id,$tour_id,$quatity,$totalitem,'$transport','$start_date', '$end_date')";
    $db->Execute($query);
  }

  function getOrderDetailLogoutById($order_id)
  {
    $db = new Connection();
    $select = "select order_details_logout.order_id, order_details_logout.tour_id, order_details_logout.quatity, order_details_logout.amount, order_details_logout.transport, order_details_logout.start_date, order_details_logout.end_date, transport.ICON, tourist.NAME_TOUR, tourist.IMAGE_TOUR, country.NAME_COUNTRY 
    FROM order_details_logout, transport, tourist, country 
    WHERE country.ID_COUNTRY = tourist.ID_COUNTRY and tourist.ID_TOUR = order_details_logout.tour_id and transport.NAME_TRANSPORT = order_details_logout.transport and order_id=$order_id;";
    $result = $db->SelectData($select);
    return $result;
  }


  public function getChartOrderLogout($month, $year)
  {

    $db = new Connection();
    if ($month != 0 && $year != 0) {
      $result = "select tourist.NAME_TOUR as 'tourism_name',SUM( `tour_id`) as 'number_booking' FROM `order_details_logout`,orders_logout, tourist WHERE tour_id = tourist.ID_TOUR AND order_details_logout.order_id = orders_logout.order_id and MONTH(orders_logout.created) = $month AND YEAR(orders_logout.created) = $year GROUP BY tourist.NAME_TOUR";
      $result = $db->SelectData($result);
      return $result;
    } else {
      $result = "select tourist.NAME_TOUR as 'tourism_name',SUM( `tour_id`) as 'number_booking' FROM `order_details_logout`, tourist WHERE tour_id = tourist.ID_TOUR GROUP BY tourist.NAME_TOUR;";
      $result = $db->SelectData($result);
      return $result;
    }
  }

  public function getQuatityTourismBought()
  {
    $db = new Connection();
    $select = "select sum(quatity) as sum_tourism FROM `order_details_logout`";
    return $db->SelectOneData($select);
  }
}
?>