<?php
$country = new Country();
$transport = new Transport();

$uploadCheck = true;
$transportData = $transport->getTransport();
$countryData = $country->getCountry();
if (isset($_GET['page']) && isset($_GET['table'])) {
  $table = $_GET['table'];
  switch ($table) {
    case 'country':
      if (isset($_GET['action'])) {
        $action = $_GET['action'];
        switch ($action) {
          case 'insert':
            if (isset($_POST['name']) && isset($_FILES['image'])) {
              $country = new Country();
              $nameCountry = $_POST['name'];
              $image = $_FILES['image'];

              $target_dir = "Public/assets/images/";
              $target_image = $target_dir . basename($image['name']);
              $name_image = basename($image['name']);
              $imageFileType = strtolower(pathinfo($target_image, PATHINFO_EXTENSION));

              // // Check file size
              if ($image["size"] > 500000) {
                echo "<script>alert('Sorry, your file is too large.')</script>";
                $uploadCheck = false;
              }

              // // Check file type image
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
                move_uploaded_file($image["tmp_name"], $target_image);
              }

              $result = $country->insertCountry($nameCountry, $name_image);

              if ($result) {
                echo "<script>alert('Insert Country Success')</script>";
              } else {
                echo "<script>alert('Insert Country Fail')</script>";
              }
            }
            include_once('./Admin/Views/InsertCountry.php');
            break;
          case 'update':
            $image = "";
            $countryData = "";
            $country = new Country();
            $id_country = "";
            if (isset($_GET['id'])) {
              $id_country = $_GET['id'];
              $countryData = $country->getCountryById($id_country);
            }

            if (isset($_POST['name'])) {
              $country = new Country();
              $nameCountry = $_POST['name'];

              $image = $_FILES['image'];

              $target_dir = "Public/assets/images/";
              $target_image = $target_dir . basename($image['name']);
              $name_image = basename($image['name']);
              $imageFileType = strtolower(pathinfo($target_image, PATHINFO_EXTENSION));

              if ($name_image == "") {
                $name_image = $countryData['IMAGE_COUNTRY'];
              } else {


                // // Check file size
                if ($image["size"] > 500000) {
                  echo "<script>alert('Sorry, your file is too large.')</script>";
                  $uploadCheck = false;
                }

                // // Check file type image
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
                  move_uploaded_file($image["tmp_name"], $target_image);
                }
              }

              $result = $country->updateCountry($nameCountry, $name_image, $id_country);

              if ($result) {
                echo "<script>alert('Update Country Success')</script>";
                echo '<meta http-equiv="refresh" content="0; url=../TravelTourist/index.php?ctrl=admin&page=category" />';
              } else {
                echo "<script>alert('Update Country Fail')</script>";
              }
            }
            include_once('./Admin/Views/UpdateCountry.php');
            break;
          case 'delete':
            if (isset($_GET['id'])) {
              $result = $country->deleteCountry($_GET['id']);

              if ($result) {
                echo "<script>alert('Delete Country Success')</script>";
                echo '<meta http-equiv="refresh" content="0; url=../TravelTourist/index.php?ctrl=admin&page=category" />';
              } else {
                echo "<script>alert('Delete Country Fail')</script>";
              }
            }
            break;
          case 'deleteall':
            $result = $country->deleteAllCountry();

            if ($result == false) {
              echo "<script>alert('Delete All Country Success')</script>";
              echo '<meta http-equiv="refresh" content="0; url=../TravelTourist/index.php?ctrl=admin&page=category" />';
            } else {
              echo "<script>alert('Delete All Country Fail')</script>";
            }
            break;

          case 'uploadcsv':
            if (isset($_FILES['csvfile'])) {
              // echo "<script>alert('Delete All Country Fail')</script>";

              $country = new Country();
              $file = $_FILES['csvfile']['tmp_name'];

              // echo $file;
              file_put_contents($file, str_replace("\xEF\xBB\xBF", "", file_get_contents($file)));

              $file_open = fopen($file, "r");

              while (($csv = fgetcsv($file_open, 1000, ",")) !== false) {
                $name = $csv[0];
                $image = $csv[1];
                $country->insertCountry($name, $image);
              }

              echo '<meta http-equiv="refresh" content="0; url=../TravelTourist/index.php?ctrl=admin&page=category" />';
            }
            break;
        }
      }
      break;

    case 'transport':
      if (isset($_GET['action'])) {
        $action = $_GET['action'];
        switch ($action) {
          case 'insert':
            $transport = new Transport();
            $name = "";
            $icon = "";
            if (isset($_POST['name']) && isset($_POST['icon'])) {
              $name = $_POST['name'];
              $icon = $_POST['icon'];
              $result = $transport->insertTransport($name, $icon);
              if ($result) {
                echo "<script>alert('Insert Transport Success')</script>";
              } else {
                echo "<script>alert('Insert Transport Fail')</script>";
              }
            }
            include_once('./Admin/Views/InsertTransport.php');

            break;
          case 'update':
            $transport = new Transport();
            $transportData = "";
            $name = "";
            $icon = "";
            $id = "";
            if (isset($_GET['id'])) {
              $id = $_GET['id'];
              $transportData = $transport->getTransportById($id);
            }
            if (isset($_POST['name']) && isset($_POST['icon']) && isset($_POST['idTransport'])) {
              $name = $_POST['name'];
              $icon = $_POST['icon'];
              $id_Transport = $_POST['idTransport'];
              $result = $transport->updateTransport($name, $icon, $id_Transport);
              if ($result) {
                echo "<script>alert('Update Transport Success')</script>";
                echo '<meta http-equiv="refresh" content="0; url=../TravelTourist/index.php?ctrl=admin&page=category" />';
              } else {
                echo "<script>alert('Update Transport Fail')</script>";
              }
            }
            include_once('./Admin/Views/UpdateTransport.php');
            break;
          case 'delete':
            $id = "";
            $transport = new Transport();
            if (isset($_GET['id'])) {
              $id = $_GET['id'];
              $result = $transport->deleteTransport($id);

              if ($result) {
                echo "<script>alert('Delete Transport Success')</script>";
                echo '<meta http-equiv="refresh" content="0; url=../TravelTourist/index.php?ctrl=admin&page=category" />';
              } else {
                echo "<script>alert('Delete Transport Fail')</script>";
              }
            }
            break;
          case 'deleteall':
            $transport = new Transport();
            $result = $transport->deleteAllTransport();
            if ($result == 0) {
              echo "<script>alert('Delete All Transport Success')</script>";
              echo '<meta http-equiv="refresh" content="0; url=../TravelTourist/index.php?ctrl=admin&page=category" />';
            } else {
              echo "<script>alert('Delete All Transport Fail')</script>";
            }
            break;

          case 'uploadcsv':
            if (isset($_FILES['csvfile'])) {

              $transport = new Transport();
              $file = $_FILES['csvfile']['tmp_name'];

              file_put_contents($file, str_replace("\xEF\xBB\xBF", "", file_get_contents($file)));

              $file_open = fopen($file, "r");

              while (($csv = fgetcsv($file_open, 1000, ",")) !== false) {
                $name = $csv[0];
                $icon = $csv[1];
                $transport->insertTransport($name, $icon);
              }
              echo '<meta http-equiv="refresh" content="0; url=../TravelTourist/index.php?ctrl=admin&page=category" />';
            }
            break;
        }
      }
      break;
  }
} else {
  include_once('./Admin/Views/Category.php');
}