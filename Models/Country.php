<?php
class Country
{
  function __construct()
  {
  }

  function getCountry()
  {
    $db = new Connection();
    $select = "select * FROM `country`";
    return $db->SelectData($select);
  }

  function getCountryById($id)
  {
    $db = new Connection();
    $select = "select * FROM `country` where ID_COUNTRY = $id";
    return $db->SelectOneData($select);
  }

  function insertCountry($name, $image)
  {
    $db = new Connection();
    $query = "insert INTO `country`(`NAME_COUNTRY`, `IMAGE_COUNTRY`) VALUES ('$name','$image')";
    return $db->Execute($query);
  }

  function updateCountry($name, $image, $id)
  {
    $db = new Connection();
    $query = "update `country` SET `NAME_COUNTRY`='$name',`IMAGE_COUNTRY`='$image' WHERE ID_COUNTRY = $id";
    return $db->Execute($query);
  }

  function deleteCountry($id)
  {
    $db = new Connection();
    $query = "delete FROM `country` WHERE ID_COUNTRY = $id";
    return $db->Execute($query);
  }

  public function deleteAllCountry()
  {

    $db = new Connection();
    $query = "TRUNCATE TABLE country";
    $result = $db->Execute($query);
    return $result;
  }
}

?>