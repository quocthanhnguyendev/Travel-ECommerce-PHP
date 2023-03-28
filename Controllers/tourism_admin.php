<?php
$tour = new Tourist();
$tourData = $tour->getTourist();

if (isset($_GET['page']) && isset($_GET['act'])) {
  switch ($_GET['act']) {
    case 'insert':
      $country = new Country();
      $transport = new Transport();

      $countryData = $country->getCountry();
      $transportData = $transport->getTransport();

      $name = "";
      $price = "";
      $sale = "";
      $quatity = "";
      $startdate = "";
      $enddate = "";
      $transport = "";
      $country = "";
      $trending = "";
      $desc = "";
      $uploadCheck = true;


      if (isset($_POST['name']) && isset($_POST['price']) && isset($_POST['sale']) && isset($_POST['quatity']) && isset($_POST['startdate']) && isset($_POST['enddate']) && isset($_POST['transport']) && isset($_POST['country']) && isset($_POST['trending']) && isset($_POST['desc'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $sale = $_POST['sale'];
        $quatity = $_POST['quatity'];
        $startdate = $_POST['startdate'];
        $enddate = $_POST['enddate'];
        $transport = $_POST['transport'];
        $country = $_POST['country'];
        $trending = $_POST['trending'];
        $desc = $_POST['desc'];
        $image = $_FILES['image'];

        $tour = new Tourist();

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

        $result = $tour->insertTourist($name, $price, $sale, $quatity, $startdate, $enddate, $transport, $country, $trending, $desc, $name_image);

        if ($result == true) {
          echo "<script>alert('Insert Tourism Success')</script>";
        } else {
          echo "<script>alert('Insert Tourism Fail')</script>";
        }
      }

      include_once('./Admin/Views/InsertTourism.php');
      break;

    case 'update':
      $tour = new Tourist();
      $transport = new Transport();
      $country = new Country();

      $countryData = $country->getCountry();
      $transportData = $transport->getTransport();

      $DataUpdate = "";
      $tour_id = "";
      $uploadCheck = true;
      if (isset($_GET['id'])) {
        $tour_id = $_GET['id'];
      }

      if ($tour_id != "") {
        $TourismData = $tour->getDetailsTourist($tour_id);
        $DataUpdate = $TourismData;

        if (isset($_POST['name']) && isset($_POST['price']) && isset($_POST['sale']) && isset($_POST['quatity']) && isset($_POST['startdate']) && isset($_POST['enddate']) && isset($_POST['transport']) && isset($_POST['country']) && isset($_POST['trending']) && isset($_POST['desc'])) {
          $name = $_POST['name'];
          $price = $_POST['price'];
          $sale = $_POST['sale'];
          $quatity = $_POST['quatity'];
          $startdate = $_POST['startdate'];
          $enddate = $_POST['enddate'];
          $transport = $_POST['transport'];
          $country = $_POST['country'];
          $trending = $_POST['trending'];
          $desc = $_POST['desc'];
          $image = $_FILES['image'];

          $tour = new Tourist();

          $target_dir = "Public/assets/images/";
          $target_image = $target_dir . basename($image['name']);
          $name_image = basename($image['name']);
          $imageFileType = strtolower(pathinfo($target_image, PATHINFO_EXTENSION));

          if ($name_image == "") {
            $name_image = $DataUpdate['IMAGE_TOUR'];
          } else {
            // // Check file size
            if ($image["size"] > 500000) {
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
              move_uploaded_file($image["tmp_name"], $target_image);
            }
          }
          ;

          $result = $tour->updateTourist($name, $price, $sale, $quatity, $startdate, $enddate, $transport, $country, $trending, $desc, $name_image, $tour_id);
          if ($result == true) {
            echo "<script>alert('Update Tourism Success')</script>";
            echo '<meta http-equiv="refresh" content="0; url=../TravelTourist/index.php?ctrl=admin&page=tourism" />';
          } else {
            echo "<script>alert('Update Tourism Fail')</script>";
            echo '<meta http-equiv="refresh" content="0; url=../TravelTourist/index.php?ctrl=admin&page=tourism&act=update" />';
          }
        }
      }




      include_once('./Admin/Views/UpdateTourism.php');
      break;

    case 'delete':
      if (isset($_GET['id'])) {
        $tour = new Tourist();
        $result = $tour->deleteTourist($_GET['id']);
        if ($result) {
          echo "<script>alert('Delete Tourism Success')</script>";
          echo '<meta http-equiv="refresh" content="0; url=../TravelTourist/index.php?ctrl=admin&page=tourism" />';
        } else {
          echo "<script>alert('Delete Tourism Fail')</script>";
          echo '<meta http-equiv="refresh" content="0; url=../TravelTourist/index.php?ctrl=admin&page=tourism" />';
        }
      }
      break;

    case 'deleteall':
      $tour = new Tourist();
      $result = $tour->deleteAllTourist();
      if ($result == 0) {
        echo "<script>alert('Delete All Tourism Success')</script>";
        echo '<meta http-equiv="refresh" content="0; url=../TravelTourist/index.php?ctrl=admin&page=tourism" />';
      } else {
        echo "<script>alert('Delete All Tourism Fail')</script>";
        echo '<meta http-equiv="refresh" content="0; url=../TravelTourist/index.php?ctrl=admin&page=tourism" />';
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
          $price = $csv[1];
          $sale = $csv[2];
          $quatity = $csv[3];
          $startdate = $csv[4];
          $enddate = $csv[5];
          $transport = $csv[6];
          $country = $csv[7];
          $trending = $csv[8];
          $desc = $csv[9];
          $image = $csv[10];

          $tour->insertTourist($name, $price, $sale, $quatity, $startdate, $enddate, $transport, $country, $trending, $desc, $image);
        }
        echo '<meta http-equiv="refresh" content="0; url=../TravelTourist/index.php?ctrl=admin&page=tourism" />';
      }
      break;

    default:
      include_once('./Admin/Views/TourismShow.php');
      break;
  }
} else {
  include_once('./Admin/Views/TourismShow.php');
}