<?php 
	// TODO PUT A SESSION CHECK SO YOU CAN CHECK WHO WILL POST 
	session_start();

	$title = $_POST['title'];
	$content = $_POST['content'];
	$type = $_POST['type'];
	if (!isset($_SESSION['username'])) {
		echo "Access Denied! Credentials not detected.";
		session_destroy();
		return;
	}
	$domainName = null;
	$code = null;
	$deposit = null;
	$description  = null;
	if (isset($_POST['deposit'])) {
		$deposit = $_POST['deposit'];
	}
	
	if (isset($_POST['domain-name'])) {
		$domainName = $_POST['domain-name'];
	}

	if (isset($_POST['web-code'])) {
		$code = $_POST['web-code'];
	}

	if (isset($_POST['description'])) {
		$description = $_POST['description'];
	}

	$username = $_SESSION['username'];
	$date = date('Y-m-d H:i:s',time());
	$destination = null;
	$thumbnail = null;
	$user_id = $_SESSION['user_id'];
	if ($_FILES['image']['size'] > 0):
		$img = $_FILES['image']['name'];
		$img_name = uniqid(time());
		$extension =  pathinfo($img, PATHINFO_EXTENSION);

		$destination = 'assets/webImages/'.$img_name.'.'.$extension;

		$thumbnail = 'assets/thumbnail/'.$img_name.'.'.$extension;

		$thumb = $_FILES['image']['tmp_name'];
		$image = $_FILES['image']['tmp_name'];

		compressedImage($thumb,'../'.$thumbnail,6);
		move_uploaded_file($image, '../'.$destination);
		
	endif;

	require 'connection.php';

	$title = mysqli_real_escape_string($conn,$title);
	$content = mysqli_real_escape_string($conn,$content);

	$queryID = "SELECT * FROM web_content WHERE type = '$type' ORDER BY id DESC LIMIT 1 ";

	$res = mysqli_query($conn,$queryID);

	$res = mysqli_fetch_assoc($res);
	if ($res) {
		$type_id = $res['type_id'] + 1;
	} else {
		$type_id = 1;
	}

	$sql = "INSERT INTO web_content(title,content,type,type_id,username,views,date,image,thumbnail,user_id,domainName,code,deposit,description) VALUES ('$title' , '$content' , '$type' , $type_id , '$username' , 0 , '$date' , '$destination','$thumbnail','$user_id','$domainName','$code','$deposit','$description')";

	mysqli_query($conn,$sql) or die(mysqli_error($conn));

	$last_id = $conn->insert_id;


	$summernoteImage = $_POST['summernote-image'];

	for ($i=0; $i < count($summernoteImage); $i++) { 
		$summerImage = $summernoteImage[$i];
		$saveSummernoteImage = "INSERT INTO summernoteImage(image,type_id) VALUES ('$summerImage' , '$last_id')";
		mysqli_query($conn,$saveSummernoteImage);
	}
	
	if (mysqli_error($conn)) {
		echo 'There is something wrong please try again later. <br>';
		echo '1. Please login and try again.<br>';
		echo '2. Try to refresh this page<br>';
		echo '3. Try again later.';

		if ($thumbnail) {
			unlink('../'.$thumbnail);
		}

		if ($destination) {
			unlink('../'.$destination);
		}
	} else {

		echo "<script>window.close();</script>";
	}



	// Compress image
	function compressedImage($source, $path, $quality) {

	        $info = getimagesize($source);

	        if ($info['mime'] == 'image/jpeg') 
	            $image = imagecreatefromjpeg($source);

	        elseif ($info['mime'] == 'image/gif') 
	            $image = imagecreatefromgif($source);

	        elseif ($info['mime'] == 'image/png') 
	            $image = imagecreatefrompng($source);

	        imagejpeg($image, $path, $quality);

	}
 ?>