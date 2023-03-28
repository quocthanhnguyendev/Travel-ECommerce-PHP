<?php
class Comment
{

  function __construct()
  {
  }

  function insertComment($user_id, $tour_id, $text_comment)
  {
    $db = new Connection();
    $select = "insert INTO `comment`(`user_id`, `tour_id`, `textcomment`) VALUES ($user_id,$tour_id,'$text_comment')";
    return $db->Execute($select);
  }

  function getComment($tour_id)
  {
    $db = new Connection();
    $select = "select `comment_id`,`textcomment`, `comment_created`, users.firstname, users.lastname, users.avatar FROM `comment`, `users` WHERE tour_id = $tour_id and comment.user_id = users.user_id GROUP BY comment.comment_created DESC";
    return $db->SelectData($select);
  }

  function getQuatityComment()
  {
    $db = new Connection();
    $select = "select COUNT(comment_id) as quatity_comment FROM `comment`";
    return $db->SelectOneData($select);

  }

}
?>