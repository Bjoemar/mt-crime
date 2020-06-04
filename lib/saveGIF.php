<?php 

	$link = $_POST['name'];
	// $gif = $_FILES['GIF']['name'];

	require 'connection.php';
	for ($i=0; $i < count($link); $i++): 
		$sql = "SELECT * FROM gif WHERE imageID = '$i'";
		$res = mysqli_query($conn,$sql);
		$len = mysqli_num_rows($res);
		$result = mysqli_fetch_assoc($res);
		$destination = $result['image'];
		$domain = $link[$i];

		if ($_FILES['GIF'.$i]['size'] > 0):

			$img = $_FILES['GIF'.$i]['name'];

			$img_name = uniqid(time());

			$extension =  pathinfo($img, PATHINFO_EXTENSION);
			
			$destination = 'assets/gif/'.$img_name.'.'.$extension;
			
			$image = $_FILES['GIF'.$i]['tmp_name'];
			
			move_uploaded_file($image, '../'.$destination);
		
		endif;
		if ($len > 0) {
	
			$update = "UPDATE gif SET link = '$domain' , image = '$destination' WHERE imageID = '$i'";
			mysqli_query($conn,$update) or die(mysqli_error($conn));
		} else {
			if (!$domain == '' && !$destination == null) {
				$put = "INSERT INTO gif(link,image,imageID) VALUES('$domain','$destination',$i)";
				mysqli_query($conn,$put) or die(mysqli_error($conn));
			}
		}
	endfor;
 ?>