<?php 
	require 'connection.php';
	session_start();
	if (isset($_POST['reg_email'])):
			
		$username = $_POST['reg_username'];
		$email = $_POST['reg_email'];
		$password = sha1($_POST['reg_password']);

		$start =  stripos($email,'@');

		$link = '';

		for ($i = $start + 1; $i < strlen($email); $i++) { 

			$link .= $email[$i];
		};

		$sql = "INSERT INTO credentials(username , email , password , restriction ) VALUES ('$username' , '$email' , '$password',0)";

		mysqli_query($conn,$sql);

		if (mysqli_error($conn)) {
			echo 'Something is not right, please try again later.';
		} else {
			echo 'Successfully Register User <strong style="color : skyblue">'.$email.'</strong> Check your email in <a target="#_blank" href="https://'.$link.'">'.$link.'</a> to activate your account!';
		};

	endif;

	if (isset($_POST['log_username'])):
		
		$username = $_POST['log_username'];
		$password = sha1($_POST['log_password']);

		$sql = "SELECT * FROM credentials";

		$res = mysqli_query($conn,$sql);

		$login = false;

		if (mysqli_error($conn)) {
			echo 'Something is not right, please try again later.';

		} else {

			while ($row = mysqli_fetch_assoc($res)):
				if ($row['username'] == $username && $row['password'] == $password):
					
					$_SESSION['restriction'] = $row['restriction'];
					
					$_SESSION['user_id'] = $row['id'];

					$_SESSION['username'] = $row['username'];

					$_SESSION['email'] = $row['email'];

					echo 0;

					$login = true;
					break;
				endif;
			endwhile;

			if (!$login) {
				echo "credentials not found!";	
			}
		}
	
	endif;
