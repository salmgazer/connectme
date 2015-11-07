<?php
include_once("adb.php");

/**
 * Class to communicate with database for post related queries
 */
class Post extends adb {

  function __construct(argument)
  {
    # code...
  }


/**
* function to add a post
*/
function add_post($user_id, $content, $category) {
  $sql= "INSERT INTO post (user_id, content, category) VALUES ($user_id, '$content', '$category'";
  return $this->query($sql);
}

/**
* function to get posts from a specific user
*/
function get_user_post($user_id){
  $sql = "SELECT * FROM post WHERE user_id=$user_id";
  return $this->query($sql);
}

/**
* function to get all posts
*/
 function get_all_post(){
   $sql= "SELECT * FROM post";
   return $this->query($sql);
}

/*
* function to get all post in a category
*/
function get_post_by_category($category){
  $sql = "SELECT * FROM post WHERE category='$category'";
  return $this->query($sql);
}

/*
 * function to get a given amount of recent post
 */
function get_recent_post($num){
  $sql = "SELECT * FROM post ORDER BY post_date DESC LIMIT $num";
  return $this->query($sql);
}

?>
