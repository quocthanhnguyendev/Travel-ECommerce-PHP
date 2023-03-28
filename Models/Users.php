<?php
class Users
{
  function __construct()
  {
  }
  function addNewUser($firstname, $lastname, $email, $password, $phonenumber, $gender, $address)
  {
    $db = new Connection();
    $bravePass = md5($password);
    $query = "insert INTO `users`(`firstname`, `lastname`, `email`, `password`, `phone`, `gender`,`address`) VALUES ('$firstname', '$lastname', '$email', '$bravePass', '$phonenumber', $gender,'$address')";
    $db->Execute($query);
  }

  function getOneUser($email, $password)
  {
    $bravePass = md5($password);
    $db = new Connection();
    $select = "select * FROM `users` WHERE email = '$email' AND password = '$bravePass'";
    $result = $db->SelectOneData($select);
    return $result;
  }

  function getUsers()
  {
    $db = new Connection();
    $select = "select * FROM `users`";
    $result = $db->SelectData($select);
    return $result;
  }

  function getUserByEmail($email)
  {
    $db = new Connection();
    $select = "select * FROM `users` WHERE email = '$email'";
    $result = $db->SelectOneData($select);
    return $result;
  }

  function updateRoleUser($role, $id)
  {
    $db = new Connection();
    $query = "update `users` SET `role`=$role WHERE user_id = $id";
    return $db->Execute($query);
  }

  function updateUser($id, $firstname, $lastname, $phonenumber, $gender, $address)
  {
    $db = new Connection();
    $query = "update `users` SET `firstname`='$firstname',`lastname`='$lastname',`phone`='$phonenumber',`address`='$address',`gender`=$gender WHERE user_id=$id";
    return $db->Execute($query);
  }

  function updateUserPassword($id, $newpassword)
  {
    $db = new Connection();
    $query = "update `users` SET `password`='$newpassword' WHERE user_id = $id";
    return $db->Execute($query);
  }

  function updateUserPasswordByEmail($email, $newpassword)
  {
    $db = new Connection();
    $passwordHash = md5($newpassword);
    $query = "update `users` SET `password`='$passwordHash' WHERE md5(email) = '$email'";
    return $db->Execute($query);
  }

  function updateAvatar($id, $name_image)
  {
    $db = new Connection();
    $query = "update `users` SET `avatar`='$name_image' WHERE user_id = $id;";
    return $db->Execute($query);
  }

  function updateColumnUser($nameColumn, $id, $value)
  {
    $db = new Connection();
    $query = "update `users` SET `$nameColumn`='$value' WHERE user_id = $id;";
    return $db->Execute($query);
  }

  function updateWater($water, $userid)
  {
    $db = new Connection();
    $query = "update `users` SET `water`= $water WHERE user_id = $userid";
    return $db->Execute($query);
  }

  function updateWaterByUserId($waterlost, $userid)
  {
    $db = new Connection();
    $query = "update `users` SET `water`= water-$waterlost WHERE user_id = $userid";
    return $db->Execute($query);
  }

  function getQuatityUser()
  {
    $db = new Connection();
    $select = "select COUNT(`user_id`) as quatity_user FROM `users`";
    $result = $db->SelectOneData($select);
    return $result;
  }

}


?>