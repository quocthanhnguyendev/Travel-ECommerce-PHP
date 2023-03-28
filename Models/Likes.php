<?php
class Likes
{
  function __construct()
  {
  }

  function getLikes()
  {
    $db = new Connection();
    $select = "select * FROM `likes`";
    return $db->SelectData($select);
  }

  function getOneLike($user_id, $tour_id)
  {
    $db = new Connection();
    $query = "select * FROM `likes` WHERE user_id = $user_id AND tour_id = $tour_id";
    return $db->SelectOneData($query);

  }

  function Like($user_id, $tour_id)
  {
    $db = new Connection();
    $query = "insert INTO `likes`(`user_id`, `tour_id`) VALUES ($user_id,$tour_id)";
    return $db->Execute($query);

  }
  function unLike($user_id, $tour_id)
  {
    $db = new Connection();
    $query = "delete FROM `likes` WHERE user_id = $user_id AND tour_id = $tour_id";
    return $db->Execute($query);
  }

  function getNumberLikeByIdTour($tour_id)
  {
    $db = new Connection();
    $select = "select COUNT(user_id) as likeNumber FROM `likes` WHERE tour_id = $tour_id";
    return $db->SelectOneData($select);

  }


  function getQuatityLike()
  {
    $db = new Connection();
    $select = "select COUNT(like_id)as quatity_like FROM `likes`";
    return $db->SelectOneData($select);

  }

}

?>