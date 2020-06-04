<?php 
	header('Access-Control-Allow-Origin: http://localhost:3000');

	header('Access-Control-Allow-Methods: GET, POST');

	header("Access-Control-Allow-Headers: X-Requested-With");

	if (isset($_SESSION['user_id'])) {
		$email = $_SESSION['email'];
		$username = $_SESSION['username'];
		$site = 'mt-crime';
		$user = array('status' => true , 'email' => $email, 'user' => $username , 'site'  => $site);
		?>
		<script type="text/javascript">
			localStorage.setItem('username', '<?php echo $username ?>')
			localStorage.setItem('site', '<?php echo $site ?>')
			localStorage.setItem('email', '<?php echo $email ?>')
		</script>
		<?php 
	} else { ?>
		<script type="text/javascript">
			localStorage.removeItem('username')
			localStorage.removeItem('site')
			localStorage.removeItem('email')
		</script>
		<?php 
		$user = array('status' => false);
	}
 ?>