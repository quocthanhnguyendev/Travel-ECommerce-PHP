<?php
class CoinFarm
{

  function __construct()
  {
  }

  function insertCoinFarm($user_id)
  {
    $db = new Connection();
    $query = "insert INTO `coinfarm`(`user_id`) VALUES ($user_id)";
    return $db->Execute($query);
  }

  function getCoinFarmByUserId($user_id)
  {
    $db = new Connection();
    $select = "select * FROM `coinfarm` WHERE user_id = $user_id";
    return $db->SelectOneData($select);
  }

  function updateLevelByUserId($level, $user_id)
  {
    $db = new Connection();
    $query = "update `coinfarm` SET `level_tree`=$level WHERE $user_id";
    return $db->Execute($query);
  }

  function updateWaterTree($waterthetrees, $user_id)
  {
    $db = new Connection();
    $query = "update `coinfarm` SET `water_tree`= $waterthetrees WHERE user_id = $user_id";
    return $db->Execute($query);
  }

  function updateWaterTreeByUserId($waterthetrees, $user_id)
  {
    $db = new Connection();
    $query = "update `coinfarm` SET `water_tree`= `water_tree` - $waterthetrees WHERE user_id = $user_id";
    return $db->Execute($query);
  }

  function deleteCoinfarmByUserId($user_id)
  {
    $db = new Connection();
    $query = "delete FROM `coinfarm` WHERE user_id = $user_id";
    return $db->Execute($query);
  }
}

?>