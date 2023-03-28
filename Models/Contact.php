<?php
class Contact
{

  function __construct()
  {
  }

  function insertContact($fullname, $phonenumber, $email, $textcontent)
  {
    $db = new Connection();
    $query = "insert INTO `contact`(`fullname`, `phonenumber`, `email`, `textcontent`) VALUES ('$fullname', '$phonenumber', '$email', '$textcontent')";
    return $db->Execute($query);
  }
}

?>