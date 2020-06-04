<?php 
	
	if ($_FILES['image']['size'] > 0):

		$img = $_FILES['image']['name'];

		$img_name = uniqid(time());

		$extension =  pathinfo($img, PATHINFO_EXTENSION);
		
		$destination = 'assets/summernoteImages/'.$img_name.'.'.$extension;
		
		$image = $_FILES['image']['tmp_name'];
		
		move_uploaded_file($image, '../'.$destination);
		

		echo $destination;
	endif;

 ?>