<?php
  $cmd = $_REQUEST['cmd'];

  switch ($cmd) {
    case 1:
      add_post($user_id,$content,$category);
      break;
    case 2:
      get_user_post($user_id);
      break;
    case 3:
      get_all_post();
      break;
    case 4:
      get_recent_post($num);
      break;
    case 5:
      get_post_by_category($category);
      break;
    default:
      echo '{"cmd":"none","message":"No command issued"}';
      break;
  }


  function add_post($user_id,$content,$category){
    include_once("post.php");
    $post = new Post();

    if(!$post->add_post($user_id,$content,$category)){
      echo '{"result":0,"message":"Could not add the post"}';
      return;
    }

    echo '{"result":1,"message":"Succesfully added the post"}';
  }

  function get_user_post($user_id){
    include_once("post.php");
    $post = new Post();

    if(!$post->get_user_post($user_id)){
      echo '{"result":0,"message":"Could not get post from the user"}';
      return;
    }

    echo '{"result":1,"message":"Succesfully got the post"}';
  }

  function get_all_post(){
    include_once("post.php");
    $post = new Post();

    if(!$post->get_user_post()){
      echo '{"result":0,"message":"Could not get all the post"}';
      return;
    }

    echo '{"result":1,"message":"Succesfully got all posts"}';
  }

  function get_recent_post($num){
    include_once("post.php");
    $post = new Post();

    if(!$post->get_user_post($num)){
      echo '{"result":0,"message":"Could not get the recent posts"}';
      return;
    }

    echo '{"result":1,"message":"Succesfully got the recent posts"}';
  }

  function get_post_by_category($category){
    include_once("post.php");
    $post = new Post();

    if(!$post->get_user_post($category)){
      echo '{"result":0,"message":"Could not get the posts by category"}';
      return;
    }

    echo '{"result":1,"message":"Succesfully got posts by category"}';
  }


  // function
 ?>
