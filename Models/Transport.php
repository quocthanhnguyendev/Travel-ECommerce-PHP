<?php
class Transport
{
  function __construct()
  {
  }

  function getTransport()
  {
    $db = new Connection();
    $select = "select * FROM `transport`";
    return $db->SelectData($select);
  }


  function getTransportById($id)
  {
    $db = new Connection();
    $select = "select * FROM `transport` where ID_TRANSPORT = $id";
    return $db->SelectOneData($select);
  }

  function insertTransport($name, $icon)
  {
    $db = new Connection();
    $select = "insert INTO `transport`(`NAME_TRANSPORT`, `ICON`) VALUES ('$name','$icon')";
    return $db->SelectData($select);
  }

  function updateTransport($name, $icon, $id)
  {
    $db = new Connection();
    $select = "update `transport` SET `NAME_TRANSPORT`='$name',`ICON`='$icon' WHERE ID_TRANSPORT = $id";
    return $db->SelectData($select);
  }

  function deleteTransport($id)
  {
    $db = new Connection();
    $select = "delete FROM `transport` WHERE ID_TRANSPORT = $id";
    return $db->SelectData($select);
  }

  function deleteAllTransport()
  {
    $db = new Connection();
    $query = "TRUNCATE TABLE transport";
    $result = $db->Execute($query);
    return $result;
  }
}

?>