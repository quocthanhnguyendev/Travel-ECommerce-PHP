<?php
$coinfarm = new CoinFarm();
$TreeData = $coinfarm->getCoinFarmByUserId($_SESSION['auth']['user_id']);
switch ($_GET['act']) {
  case 'drills':
    if (isset($_GET['userid'])) {
      $user_id = $_GET['userid'];
      $coinfarm = new CoinFarm();
      $coinfarmData = $coinfarm->getCoinFarmByUserId($user_id);
      if (empty($coinfarmData)) {
        $result = $coinfarm->insertCoinFarm($_GET['userid']);
        if ($result) {
          echo '<meta http-equiv="refresh" content="0; url=../TravelTourist/index.php?ctrl=coinfarm"/>';
          echo '<script> alert("Đã gieo hạt thành công!")</script>';
        } else {
          echo '<meta http-equiv="refresh" content="0; url=../TravelTourist/index.php?ctrl=coinfarm"/>';
          echo '<script> alert("Đã gieo hạt không thành công!")</script>';
        }
      } else {
        echo '<meta http-equiv="refresh" content="0; url=../TravelTourist/index.php?ctrl=coinfarm"/>';
        echo '<script> alert("Bạn đã gieo hạt không thể gieo hạt thêm lần nữa!")</script>';
      }

    }

    break;

  case 'waterthetrees':
    if (isset($_GET['userid']) && isset($_GET['water'])) {
      $user_id = $_GET['userid'];
      $waterthetrees = $_GET['water'];
      $coinfarm = new CoinFarm();
      $coinfarmData = $coinfarm->getCoinFarmByUserId($user_id);
      $user = new Users();

      if ($coinfarmData['water_tree'] >= 25) {
        // update User
        if ($_SESSION['auth']['water'] > 0) {
          $user->updateWaterByUserId($waterthetrees, $user_id);
          $_SESSION['auth']['water'] = $_SESSION['auth']['water'] - $waterthetrees;

          //update CoinFarm
          $resultUpdateCoinFarm = $coinfarm->updateWaterTreeByUserId($waterthetrees, $user_id);
          if ($resultUpdateCoinFarm) {
            $coinfarmData = $coinfarm->getCoinFarmByUserId($user_id);
            $water_tree = $coinfarmData['water_tree'];
            $level = $coinfarmData['level_tree'];

            if ($water_tree >= 251 && $water_tree <= 300) {
              $level = 1;
            } else if ($water_tree >= 151 && $water_tree <= 250) {
              $level = 2;
            } else if ($water_tree >= 1 && $water_tree <= 150) {
              $level = 3;
            } else {
              $level = 4;
            }

            if ($coinfarmData['level_tree'] != $level) {
              $result = $coinfarm->updateLevelByUserId($level, $user_id);
              if ($result) {
                if ($level != 4) {
                  echo '<meta http-equiv="refresh" content="0; url=../TravelTourist/index.php?ctrl=coinfarm"/>';
                  echo '<script> alert("Chúc mừng cây của bạn đã thăng cấp ' . $level . ' !")</script>';
                } else {
                  echo '<meta http-equiv="refresh" content="0; url=../TravelTourist/index.php?ctrl=coinfarm"/>';
                  echo '<script> alert("Chúc mừng cây của bạn đã hoàn thành, hãy thu hoạch ngay!")</script>';
                }
              }
            }
          }
          echo '<meta http-equiv="refresh" content="0; url=../TravelTourist/index.php?ctrl=coinfarm"/>';
        } else {
          echo '<script> alert("Bạn đã hiết nước, hãy thu thập thêm nước !")</script>';
        }
      } else {
        if ($_SESSION['auth']['water'] > 0) {
          $coinfarmData = $coinfarm->getCoinFarmByUserId($user_id);
          $water_tree = $coinfarmData['water_tree'];
          $remainingWater = $waterthetrees - $water_tree;
          $_SESSION['auth']['water'] = $remainingWater;
          $user->updateWater($remainingWater, $user_id);

          $resultUpdateCoinFarm = $coinfarm->updateWaterTree(0, $user_id);
          if ($resultUpdateCoinFarm) {
            $coinfarmData = $coinfarm->getCoinFarmByUserId($user_id);
            $water_tree = $coinfarmData['water_tree'];
            $level = $coinfarmData['level_tree'];

            if ($water_tree >= 251 && $water_tree <= 300) {
              $level = 1;
            } else if ($water_tree >= 151 && $water_tree <= 250) {
              $level = 2;
            } else if ($water_tree >= 1 && $water_tree <= 150) {
              $level = 3;
            } else {
              $level = 4;
            }

            if ($coinfarmData['level_tree'] != $level) {
              $result = $coinfarm->updateLevelByUserId($level, $user_id);
              if ($result) {
                if ($level != 4) {
                  echo '<meta http-equiv="refresh" content="0; url=../TravelTourist/index.php?ctrl=coinfarm"/>';
                  echo '<script> alert("Chúc mừng cây của bạn đã thăng cấp ' . $level . ' !")</script>';
                } else {
                  echo '<meta http-equiv="refresh" content="0; url=../TravelTourist/index.php?ctrl=coinfarm"/>';
                  echo '<script> alert("Chúc mừng cây của bạn đã hoàn thành, hãy thu hoạch ngay!")</script>';
                }
              }
            }
          }
          echo '<meta http-equiv="refresh" content="0; url=../TravelTourist/index.php?ctrl=coinfarm"/>';
        } else {
          echo '<meta http-equiv="refresh" content="0; url=../TravelTourist/index.php?ctrl=coinfarm"/>';
          echo '<script> alert("Bạn đã hiết nước, hãy thu thập thêm nước !")</script>';
        }

      }
    }
    break;

  case 'harvest':
    if (isset($_GET['userid'])) {
      $point = 100;
      $user_id = $_GET['userid'];
      $_SESSION['auth']['point'] = $_SESSION['auth']['point'] + $point;
      $user = new Users();
      $user->updateColumnUser("point", $user_id, $_SESSION['auth']['point']);
      $result = $coinfarm->deleteCoinfarmByUserId($user_id);
      if ($result) {
        echo '<meta http-equiv="refresh" content="0; url=../TravelTourist/index.php?ctrl=coinfarm"/>';
        echo '<script> alert("Thu hoạch thành công bạn đã nhận được 100 đồng xu!")</script>';
      }
    }
    break;
}
include_once('Views/coinfarm.php');


?>