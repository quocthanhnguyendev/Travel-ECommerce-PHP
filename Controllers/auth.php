<?php
$user = new Users();

switch ($_GET['act']) {
  case 'login':
    include_once('Views/login.php');
    $email = "";
    $password = "";
    if (isset($_POST['email']) && isset($_POST['password'])) {
      $email = $_POST['email'];
      $password = $_POST['password'];
      $userLogin = $user->getOneUser($email, $password);
      if ($userLogin) {
        $_SESSION['auth'] = $userLogin;
        if ($_SESSION['auth']['role'] == true) {
          echo '<script> alert("Welcome to travel admin !")</script>';
          echo '<meta http-equiv="refresh" content="0; url=../TravelTourist/index.php?ctrl=admin" />';
        } else {
          echo '<script> alert("Login Success")</script>';
          echo '<meta http-equiv="refresh" content="0; url=../TravelTourist/index.php?ctrl=home" />';
        }

      } else {
        echo '<script> alert("Login Fail")</script>';
      }

    }

    break;

  case 'register':
    include_once('Views/signup.php');

    $firstname = "";
    $lastname = "";
    $email = "";
    $password = "";
    $phone = "";
    $gender = "";
    $address = "";

    if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['phonenumber']) && isset($_POST['gender']) && isset($_POST['address'])) {
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $phone = $_POST['phonenumber'];
      $gender = $_POST['gender'];
      $address = $_POST['address'];
      $user->addNewUser($firstname, $lastname, $email, $password, $phone, $gender, $address);
      echo '<script> alert("Register Success")</script>';
      echo '<meta http-equiv="refresh" content="0; url=../TravelTourist/index.php?ctrl=auth&act=login" />';
    }
    break;

  case 'verify':
    include_once('Views/verify.php');

    if (isset($_POST['btnSubmit'])) {
      if (isset($_POST['email'])) {
        $email = $_POST['email'];
        $_SESSION['emailforgot'] = $email;
        $user = new Users();
        $result = $user->getUserByEmail($email);
        if (!empty($result)) {
          $title = "Forgot Password";
          $code = rand(1000, 9999);
          $_SESSION['verifycode'] = $code;
          $hashEmail = md5($email);
          $content = "<div style='font-size: 20px;text-align: center; width: 500px;'>Hi, Someone tried to sign up for an <b>ITC Travel</b> account with $email. If it was you, enter this confirmation code in the app:</div>
        <div style='font-size: 30px; font-weight: bolder;text-align: center; width: 500px;'>$code</div><div>Or You Can Click To Link To New Password: <a href='http://localhost/TravelTourist/index.php?ctrl=auth&act=newpassword&user=$hashEmail'>http://localhost/TravelTourist/index.php?ctrl=auth&act=newpassword&user=$hashEmail</a></div>";
          $mailer = new Mailer();
          $mailer->SendMail($title, $content, $email);
        } else {
          echo '<script> alert("Email does not exists or wrong !")</script>';
          echo '<meta http-equiv="refresh" content="0; url=../TravelTourist/index.php?ctrl=auth&act=login" />';
        }
      }
    }

    if (isset($_POST['btnVerify'])) {
      if (isset($_POST['verifycode']) && isset($_SESSION['emailforgot'])) {
        $code = $_POST['verifycode'];
        $emailHash = md5($_SESSION['emailforgot']);
        if ($code == $_SESSION['verifycode']) {
          echo '<script> alert("Verify Code Success!")</script>';
          echo '<meta http-equiv="refresh" content="0; url=../TravelTourist/index.php?ctrl=auth&act=newpassword&user=' . $emailHash . '" />';
        } else {
          echo '<script> alert("Verify Code is wrong! Please try again")</script>';
          echo '<meta http-equiv="refresh" content="0; url=../TravelTourist/index.php?ctrl=auth&act=verify" />';
        }
      }
    }

    break;

  case 'newpassword':

    if (isset($_POST['btnNewPass'])) {
      if (isset($_POST['newpassword']) & isset($_POST['emailforgot'])) {
        $password = $_POST['newpassword'];
        $email = $_POST['emailforgot'];
        $user = new Users();
        $result = $user->updateUserPasswordByEmail($email, $password);
        if ($result) {
          echo '<script> alert("New Password Success")</script>';
          echo '<meta http-equiv="refresh" content="0; url=../TravelTourist/index.php?ctrl=auth&act=login" />';
        } else {
          echo '<script> alert("New Password Fail")</script>';
          echo '<meta http-equiv="refresh" content="0; url=../TravelTourist/index.php?ctrl=auth&act=newpassword&user=' . $email . '" />';
        }
      }
    }


    include_once('Views/forgotpassword.php');
    break;

  case 'logout':
    session_destroy();
    echo '<meta http-equiv="refresh" content="0; url=../TravelTourist/index.php?ctrl=auth&act=login" />';
    break;

  default:
    # code...
    break;
}
?>