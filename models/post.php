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
 $sql= "insert into post set user_id =$user_id content='$content' category='$category'";
     return $this->query($sql);
  }

/**
* function to get post from a specific user
*
*/
function get_user_post($user_id){
        $sql = "select  * from post where id=$user_id";
        return $this->query($sql);
    }
}
/**
function to get all post from post
*
*/
 function get_all_post(){
     $sql= "select * from post";
     return $this->query($sql);
 }
function get_post_by_category($category){
    $sql ="select * from post where category='$category'"
        return $this->query($sql);
}

/**
function to get post from a specific user
*/
function get_recent_post($num){
    $sql="select * from post limit $num order by post_date desc"
    return $this->query($sql);
}
 ?>
