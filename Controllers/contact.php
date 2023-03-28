<?php
$fullname = "";
$email = "";
$phonenumber = "";
$textcontent = "";

if (isset($_POST['fullname']) && isset($_POST['phonenumber']) && isset($_POST['email']) && isset($_POST['txtContent'])) {
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $phonenumber = $_POST['phonenumber'];
  $textcontent = $_POST['txtContent'];

  $contact = new Contact();
  $result = $contact->insertContact($fullname, $phonenumber, $email, $textcontent);
  if ($result) {
    echo "<script>alert('Send Contact Success')</script>";
  } else {
    echo "<script>alert('Send Contact Fail')</script>";
  }
}

include_once('Views/contact.php');
?>