<?php
// Recieving command
  $cmd = $_REQUEST['cmd'];

// Switch statement to handle different type of commands
  switch ($cmd) {

    // case 1 add a post
    case 1:
      add_post($_REQUEST['user'],$_REQUEST['content'],$_REQUEST['category']);
      break;

    // case 2 get post from a particular user
    case 2:
      get_user_post($_REQUEST['user']);
      break;

    // Get all post
    case 3:
      get_all_post();
      break;

    // Get a given amount of recent post
    case 4:
      $num = 10;
      get_recent_post($num);
      break;

    // Get all post from a given category
    case 5:
      get_post_by_category($category);
      break;

    default:
      break;
  }

/*
 * function to convert sql data into json format
 */

/*
 * function add a post
 */
function add_post($user_id,$content,$category){
  include_once("post.php");
  $post = new Post();
  // if post failed give error message
  if(!$post->add_post($user_id,$content,$category)){
    echo '{"result":0,"message":"Post not completed, try again"}';
    return;
  }
  // give feedback
  echo '{"result":1,"message":"Post successfully created"}';
  }

/*
 * function to get post from a given user
 */
function get_user_post($user_id){
  include_once("post.php");
  $post = new Post();
  $post->get_user_post($user_id);
  $row = $post->fetch();

  if(!$row) {
    echo '{"result":0,"message":"Could not get post from the user"}';
    return;
  }
  // send data in json format
  echo '{"result":1,"post["';
  while($row) {
    echo json_encode($row);
    $row = $post->fetch();
    if($row) {
      echo ',';
    }
  }
  echo ']}';
  return;
  }

/*
 * function to get all post
 */
function get_all_post(){
  include_once("post.php");
  $post = new Post();
  $post->get_all_post();
  $row = $post->fetch();

    if(!$row) {
      echo '{"result":0,"message":"Could not get post from the user"}';
      return;
    }
    // send data in json format
    echo '{"result":1,"post["';
    while($row) {
      echo json_encode($row);
      $row = $post->fetch();
      if($row) {
        echo ',';
      }
    }
    echo ']}';
    return;
  }

/*
 * function to get the recent number of post
*/
function get_recent_post($num){
  include_once("post.php");
  $post = new Post();
  $post->get_recent_post($num);
  $row = $post->fetch();

  if(!$row) {
    echo '{"result":0,"message":"Could not get post from the user"}';
    return;
  }
  // send data in json format
  echo '{"result":1,"post["';
  while($row) {
    echo json_encode($row);
    $row = $post->fetch();
    if($row) {
      echo ',';
    }
  }
  echo ']}';
  return;
  }

/*
 * function to get post from certain category
 */
function get_post_by_category($category){
  include_once("post.php");
  $post = new Post();
  $post->get_post_by_categoryt($category);
  $row = $post->fetch();

  if(!$row) {
    echo '{"result":0,"message":"Could not get post from the user"}';
    return;
  }
  // send data in json format
  echo '{"result":1,"post["';
  while($row) {
    echo json_encode($row);
    $row = $post->fetch();
    if($row) {
      echo ',';
    }
  }
  echo ']}';
  return;
}

 ?>
