<?php
if(isset($_REQUEST['cmd'])){
	$cmd=$_REQUEST['cmd'];

	function getAllPosts(){
		include_once("postToDb.php");

		$post=new postToDb();

		if(!$post->getPosts()){
			echo '{"result":0,"message":"Could not get posts"}';
			return;
		}
		$row=$post->fetchArray();
		echo '{"result":1,"posts":[';
		while($row){
			echo json_encode($row);
			if($row=$post->fetchArray()){
				echo ',';
			}

		}
		echo ']}';
	}

	function getByCategory(){
		include_once("postToDb.php");
		$post=new postToDb();
		$categ=$_REQUEST['categ'];

		if(!$post->getPostByCategory($categ)){
			echo '{"result":0,"message":"Could not get posts"}';
			return;
		}
		$row=$post->fetchArray();
		echo '{"result":1,"posts":[';
		while($row){
			echo json_encode($row);
			if($row=$post->fetchArray()){
				echo ',';
			}

		}
		echo ']}';
	}

	function getPostById(){
		include_once("postToDb.php");
		$post=new postToDb();
		$fid=$_REQUEST['fid'];

		echo json_encode($post->getPostById($fid));

			}

	function deleteProduct(){
		include_once("postToDb.php");
		$post=new postToDb();
		$fid=$_REQUEST['fid'];

		if($post->deletePost($fid)){
			echo '{"result":0,"message":"Post not deleted"}';
			return;
		}
		echo '{"result":1,"message":"Post deleted"}';

	}

	function searchPost(){
		include_once("postToDb.php");
		$post=new postToDb();
		$txt=$_REQUEST['txt'];

		if(!$post->searchPost($txt)){
			echo '{"result":0,"message":"Could not get posts"}';
			return;
		}
		$row=$post->fetchArray();
		echo '{"result":1,"posts":[';
		while($row){
			echo json_encode($row);
			if($row=$post->fetchArray()){
				echo ',';
			}

		}
		echo ']}';

	}

	function addPost(){
		include_once("postToDb.php");
		$post=new postToDb();
		$title=$_REQUEST['title'];
		$content=$_REQUEST['content'];
		$mentorId=$_REQUEST['mentorId'];
		$category=$_REQUEST['category'];

		if(!$post->addPost($title,$content,$mentorId,$category)){
			echo '{"result":0,"message":"Could not add the post"}';
			return;
		}

		echo '{"result":1,"message":"Succesfully added the post"}';
	}

	function updatePost(){
		include_once("postToDb.php");
		$post=new postToBd();
		$title=$_REQUEST['title'];
		$content=$_REQUEST['content'];
		$mentorId=$_REQUEST['mentorId'];
		$category=$_REQUEST['category'];

		if(!$post->updatePost($title,$content,$mentorId,$category)){
			echo '{"result":0,"message":"Could not update the post"}';
			return;
		}

		echo '{"result":1,"message":"Succesfully updated the post"}';
	}

	switch ($cmd) {
		case 1:
			addPost();
			break;
		case 2:
			updatePost();
			break;
		case 3:
			getAllPosts();
			break;
		case 4:
			getByCategory();
			break;
		case 5:
			getPostById();
			break;
		case 6:
			deletePost();
			break;
		case 7:
			searchPost();
			break;
		default:
			echo '{"cmd":"none","message":"No command issued"}';
			break;
	}

}

?>
