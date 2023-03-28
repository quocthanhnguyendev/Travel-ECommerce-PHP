<?php
$user = new Users();
$UserData = $user->getUsers();
if (isset($_GET['role']) && isset($_GET['id'])) {
  $role = $_GET['role'];
  $id = $_GET['id'];
  $result = $user->updateRoleUser($role, $id);
  if ($result) {
    if ($_SESSION['auth']['user_id'] == $id) {
      $_SESSION['auth']['role'] = $role;
    }
    echo '<meta http-equiv="refresh" content="0; url=../TravelTourist/index.php?ctrl=admin&page=member" />';
  } else {
    echo '<meta http-equiv="refresh" content="0; url=../TravelTourist/index.php?ctrl=admin&page=member" />';
  }
}
include_once('./Admin/Views/UserShow.php');
?>