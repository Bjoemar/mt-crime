<?php 
	
	require 'connection.php';
	if (isset($_POST['username'])):
		$username = $_POST['username'];
		$sql = "SELECT * FROM credentials WHERE username = '$username'";
		$res = mysqli_query($conn,$sql);
		$res = mysqli_num_rows($res);
		echo $res;
	endif;

	if (isset($_POST['email'])):
		$email = $_POST['email'];
		$sql = "SELECT * FROM credentials WHERE email = '$email'";
		$res = mysqli_query($conn,$sql);
		$res = mysqli_num_rows($res);
		echo $res;
	endif;