<?php
class Tourist
{
  public function __construct()
  {
  }
  public function getTourist()
  {

    //Can lay ra san pham moi nhat
    $db = new Connection();
    $select = "select ID_TOUR, NAME_TOUR, PRICE_TOUR, SALE, DESCRIPTION, QUATITY, TRENDING, VIEWS, CREATED_DATE, IMAGE_TOUR, START_DATE, END_DATE, transport.NAME_TRANSPORT, country.NAME_COUNTRY, transport.ICON FROM tourist, transport, country WHERE tourist.ID_COUNTRY = country.ID_COUNTRY and tourist.ID_TRANSPORT = transport.ID_TRANSPORT GROUP BY ID_TOUR DESC;";
    $result = $db->SelectData($select);
    return $result;
  }

  public function insertTourist(
    $name,
    $price,
    $sale,
    $quatity,
    $startdate,
    $enddate,
    $transport,
    $country,
    $trending,
    $desc,
    $image
  )
  {
    $db = new Connection();
    $query = "insert INTO `tourist`(`NAME_TOUR`, `PRICE_TOUR`, `SALE`, `DESCRIPTION`, `QUATITY`, `ID_COUNTRY`, `TRENDING`, `ID_TRANSPORT`, `IMAGE_TOUR`, `START_DATE`, `END_DATE`) VALUES ('$name',$price,$sale,'$desc',$quatity,$country,$trending,$transport,'$image','$startdate','$enddate')";
    $result = $db->Execute($query);
    return $result;
  }

  public function updateTourist(
    $name,
    $price,
    $sale,
    $quatity,
    $startdate,
    $enddate,
    $transport,
    $country,
    $trending,
    $desc,
    $image,
    $id,
  )
  {
    $db = new Connection();
    $query = "update `tourist` SET `NAME_TOUR`='$name',`PRICE_TOUR`= $price,`SALE`=$sale,`DESCRIPTION`='$desc',`QUATITY`=$quatity,`ID_COUNTRY`='$country',`TRENDING`= $trending,`ID_TRANSPORT`='$transport',`IMAGE_TOUR`='$image',`START_DATE`='$startdate',`END_DATE`='$enddate' WHERE ID_TOUR = $id";
    $result = $db->Execute($query);
    return $result;
  }

  public function deleteTourist($id)
  {
    $db = new Connection();
    $query = "delete FROM `tourist` WHERE ID_TOUR=$id";
    $result = $db->Execute($query);
    return $result;
  }


  public function getTouristLimitPage($start, $limit)
  {

    //Can lay ra san pham moi nhat
    $db = new Connection();
    $select = "select ID_TOUR, NAME_TOUR, PRICE_TOUR, SALE, DESCRIPTION, QUATITY, TRENDING, VIEWS, CREATED_DATE, IMAGE_TOUR, START_DATE, END_DATE, transport.NAME_TRANSPORT, country.NAME_COUNTRY, transport.ICON FROM `tourist`, `transport`, `country` WHERE country.ID_COUNTRY = tourist.ID_COUNTRY AND transport.ID_TRANSPORT = tourist.ID_TRANSPORT GROUP BY tourist.ID_TOUR DESC LIMIT $start,$limit";
    $result = $db->SelectData($select);
    return $result;
  }

  public function getTouristByNameCountry($name_country)
  {

    //Can lay ra san pham moi nhat
    $db = new Connection();
    $select = "select tourist.ID_TOUR, tourist.NAME_TOUR, country.NAME_COUNTRY FROM `tourist`, `country` where tourist.ID_COUNTRY = country.ID_COUNTRY AND country.NAME_COUNTRY = '$name_country'";
    $result = $db->SelectData($select);
    return $result;
  }

  public function getOneTourist($tour_id)
  {

    $db = new Connection();
    $select = "select NAME_TOUR, IMAGE_TOUR, NAME_TRANSPORT, country.NAME_COUNTRY, transport.ICON FROM tourist, transport, country WHERE tourist.ID_TRANSPORT = transport.ID_TRANSPORT AND tourist.ID_COUNTRY = country.ID_COUNTRY AND tourist.ID_TRANSPORT = $tour_id";
    $result = $db->SelectOneData($select);
    return $result;
  }

  public function getOneTouristById($tour_id)
  {

    $db = new Connection();
    $select = "select * FROM `tourist` WHERE ID_TOUR = 1";
    $result = $db->SelectOneData($select);
    return $result;
  }


  public function deleteAllTourist()
  {

    $db = new Connection();
    $query = "TRUNCATE TABLE tourist";
    $result = $db->Execute($query);
    return $result;
  }

  public function getTheMostViews()
  {

    //Can lay ra san pham nhieu luot xem nhat
    $db = new Connection();
    $select = "select ID_TOUR, NAME_TOUR, PRICE_TOUR, SALE, DESCRIPTION, QUATITY, TRENDING, VIEWS, CREATED_DATE, IMAGE_TOUR, START_DATE, END_DATE, transport.NAME_TRANSPORT, country.NAME_COUNTRY, transport.ICON FROM tourist, transport, country WHERE tourist.ID_COUNTRY = country.ID_COUNTRY and tourist.ID_TRANSPORT = transport.ID_TRANSPORT GROUP BY ID_TOUR DESC LIMIT 5;";
    $result = $db->SelectData($select);
    return $result;
  }

  public function getCountryTheMostTours()
  {

    //Can lay ra quoc gia co nhieu tour nhat
    $db = new Connection();
    $select = "select COUNT(tourist.ID_COUNTRY), country.NAME_COUNTRY, country.IMAGE_COUNTRY FROM `tourist`, country WHERE tourist.ID_COUNTRY = country.ID_COUNTRY GROUP BY tourist.ID_COUNTRY, country.NAME_COUNTRY ASC LIMIT 5;";
    $result = $db->SelectData($select);
    return $result;
  }

  public function getTrendingTours()
  {

    //Can lay ra tours trending
    $db = new Connection();
    $select = "select ID_TOUR, NAME_TOUR, PRICE_TOUR, SALE, DESCRIPTION, QUATITY, TRENDING, VIEWS, CREATED_DATE, IMAGE_TOUR, START_DATE, END_DATE, transport.NAME_TRANSPORT, country.NAME_COUNTRY, transport.ICON FROM tourist, transport, country WHERE tourist.ID_COUNTRY = country.ID_COUNTRY and tourist.ID_TRANSPORT = transport.ID_TRANSPORT AND TRENDING = TRUE";
    $result = $db->SelectData($select);
    return $result;
  }

  public function getTrendingToursLimit($start, $limit)
  {

    //Can lay ra tours trending
    $db = new Connection();
    $select = "select ID_TOUR, NAME_TOUR, PRICE_TOUR, SALE, DESCRIPTION, QUATITY, TRENDING, VIEWS, CREATED_DATE, IMAGE_TOUR, START_DATE, END_DATE, transport.NAME_TRANSPORT, country.NAME_COUNTRY, transport.ICON FROM tourist, transport, country WHERE tourist.ID_COUNTRY = country.ID_COUNTRY and tourist.ID_TRANSPORT = transport.ID_TRANSPORT AND TRENDING = TRUE GROUP BY ID_TOUR DESC LIMIT $start,$limit;";
    $result = $db->SelectData($select);
    return $result;
  }

  public function getDetailsTourist($id)
  {

    //Can lay ra tours trending
    $db = new Connection();
    $select = "select ID_TOUR, NAME_TOUR, PRICE_TOUR, SALE, DESCRIPTION, QUATITY, TRENDING, VIEWS, CREATED_DATE, IMAGE_TOUR, START_DATE, END_DATE, transport.NAME_TRANSPORT, country.NAME_COUNTRY, transport.ICON FROM tourist, transport, country WHERE tourist.ID_COUNTRY = country.ID_COUNTRY and tourist.ID_TRANSPORT = transport.ID_TRANSPORT AND ID_TOUR =$id;";
    $result = $db->SelectOneData($select);
    return $result;
  }

  public function updateViewsTourById($id)
  {

    //Can lay ra tours trending
    $db = new Connection();
    $query = "update `tourist` SET `VIEWS`= VIEWS+1 WHERE ID_TOUR = $id;";
    $db->Execute($query);
  }

  public function getSortPriceUnderTourist($id_country, $price)
  {
    //Dau == Dấu
    //Can lay ra san pham moi nhat
    $db = new Connection();
    $select = "select ID_TOUR, NAME_TOUR, PRICE_TOUR, SALE, DESCRIPTION, QUATITY, TRENDING, VIEWS, CREATED_DATE, IMAGE_TOUR, START_DATE, END_DATE, transport.NAME_TRANSPORT, country.NAME_COUNTRY, transport.ICON FROM tourist, transport, country WHERE tourist.ID_COUNTRY = country.ID_COUNTRY and tourist.ID_TRANSPORT = transport.ID_TRANSPORT AND tourist.ID_COUNTRY = $id_country AND tourist.PRICE_TOUR < $price;";
    $result = $db->SelectData($select);
    return $result;
  }

  public function getSortPriceOverTourist($id_country, $price)
  {
    //Dau == Dấu
    //Can lay ra san pham moi nhat
    $db = new Connection();
    $select = "select ID_TOUR, NAME_TOUR, PRICE_TOUR, SALE, DESCRIPTION, QUATITY, TRENDING, VIEWS, CREATED_DATE, IMAGE_TOUR, START_DATE, END_DATE, transport.NAME_TRANSPORT, country.NAME_COUNTRY, transport.ICON FROM tourist, transport, country WHERE tourist.ID_COUNTRY = country.ID_COUNTRY and tourist.ID_TRANSPORT = transport.ID_TRANSPORT AND tourist.ID_COUNTRY = $id_country AND tourist.PRICE_TOUR > $price;";
    $result = $db->SelectData($select);
    return $result;
  }

  public function getSortPriceAroundTourist($id_country, $priceover, $priceunder)
  {
    //Dau == Dấu
    //Can lay ra san pham moi nhat
    $db = new Connection();
    $select = "select ID_TOUR, NAME_TOUR, PRICE_TOUR, SALE, DESCRIPTION, QUATITY, TRENDING, VIEWS, CREATED_DATE, IMAGE_TOUR, START_DATE, END_DATE, transport.NAME_TRANSPORT, country.NAME_COUNTRY, transport.ICON FROM tourist, transport, country WHERE tourist.ID_COUNTRY = country.ID_COUNTRY and tourist.ID_TRANSPORT = transport.ID_TRANSPORT AND tourist.ID_COUNTRY = $id_country AND tourist.PRICE_TOUR >= $priceover AND tourist.PRICE_TOUR <= $priceunder;";
    $result = $db->SelectData($select);
    return $result;
  }

  public function updateQuatity($id, $quatity)
  {
    $db = new Connection();
    $query = "update `tourist` SET `QUATITY`=$quatity WHERE ID_TOUR = $id";
    $db->Execute($query);
  }

  public function getQuatityTourist($id)
  {
    $db = new Connection();
    $select = "select `QUATITY` FROM `tourist` WHERE ID_TOUR = $id";
    $result = $db->SelectOneData($select);
    return $result;
  }



}

?>