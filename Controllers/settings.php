<?php

switch ($_GET['act']) {
  case 'changepassword':
    if (isset($_POST['password']) && isset($_POST['newpassword'])) {
      $oldpassword = md5($_POST['password']);
      $newpassword = md5($_POST['newpassword']);
      if ($_SESSION['auth']['password'] === $oldpassword) {
        $user = new Users();
        $result = $user->updateUserPassword($_SESSION['auth']['user_id'], $newpassword);
        if ($result) {
          $_SESSION['auth']['password'] = $newpassword;
          echo "<script>alert('Updated Password Success')</script>";
        } else {
          echo "<script>alert('Updated Password Fail')</script>";
        }
      }
    }
    include_once("Views/changepassword.php");
    break;

  case 'general':
    $firstname = "";
    $lastname = "";
    $email = "";
    $password = "";
    $phone = "";
    $gender = "";
    $address = "";
    if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['phonenumber']) && isset($_POST['gender']) && isset($_POST['address'])) {
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $phone = $_POST['phonenumber'];
      $gender = $_POST['gender'];
      $address = $_POST['address'];
      $id = $_SESSION['auth']['user_id'];
      $user = new Users();
      $result = $user->updateUser($id, $firstname, $lastname, $phone, $gender, $address);
      if ($result) {
        $_SESSION['auth']['firstname'] = $firstname;
        $_SESSION['auth']['lastname'] = $lastname;
        $_SESSION['auth']['phone'] = $phone;
        $_SESSION['auth']['gender'] = $gender;
        $_SESSION['auth']['address'] = $address;
        echo '<meta http-equiv="refresh" content="0; url=../TravelTourist/index.php?ctrl=settings&act=general" />';
        echo "<script>alert('Updated Profile Success')</script>";
      } else {
        echo "<script>alert('Updated Profile Fail')</script>";
      }
    }
    include_once("Views/updateprofile.php");
    break;

  case 'changeavatar':
    $avatar = "";
    $uploadCheck = true;
    $id = $_SESSION['auth']['user_id'];

    if (isset($_FILES['avatar'])) {
      $avatar = $_FILES['avatar'];
      $target_dir = "Public/assets/images/avatar/";
      $target_image = $target_dir . basename($_FILES['avatar']['name']);
      $name_image = basename($_FILES['avatar']['name']);
      $imageFileType = strtolower(pathinfo($target_image, PATHINFO_EXTENSION));

      // Check if file already exists
      // if (file_exists($target_image)) {
      //   echo "<script>alert('Sorry, file already exists.')</script>";
      //   $uploadCheck = false;
      // }

      // Check file size
      if ($_FILES["avatar"]["size"] > 500000) {
        echo "<script>alert('Sorry, your file is too large.')</script>";
        $uploadCheck = false;
      }

      // Check file type image
      if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
      ) {
        echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
        $uploadCheck = false;
      }

      if ($uploadCheck == false) {
        echo "<script>alert('Sorry, your file was not uploaded.')</script>";
        // if everything is ok, try to upload file
      } else {
        if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_image)) {
          $user = new Users();
          $result = $user->updateAvatar($id, $name_image);
          if ($result) {
            $_SESSION['auth']['avatar'] = $name_image;
            echo '<meta http-equiv="refresh" content="0; url=../TravelTourist/index.php?ctrl=settings&act=changeavatar" />';
          }
          echo "<script>alert('Change Avatar Success')</script>";
        } else {
          echo "<script>alert('Sorry, there was an error uploading your file.')</script>";

        }
      }

    }
    include_once("Views/changeavatar.php");
    break;

  default:
    include_once("Views/settings.php");
    break;
}

?>