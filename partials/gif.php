<?php session_start();
	
	require '../lib/connection.php';
 ?>
<style type="text/css">
	.gif_holder input {
		width: 100%;
		padding: 10px;
		border:1px solid #c4c4c4;
		border-radius: 5px;
		margin-top: 5px;
		margin-bottom: 5px;
	}

	.gif_holder {
		width: 32%;
		/*float: left;*/
		display: inline-block;
		padding: 5px;
	}

	.gif_holder img {
		width: 100%;
		height: 200px;
	}

	.holder {
		text-align: center;
	}
</style>
<div class="holder">
	<form action="../lib/saveGIF.php" method="post" enctype="multipart/form-data"> 		
		<?php 
			require '../lib/connection.php';
			$sql = "SELECT * FROM gif WHERE imageID = 0";
			$res = mysqli_query($conn,$sql);
			$res = mysqli_fetch_assoc($res);
		 ?>
		<div class="gif_holder">
			<img src="../<?php echo $res['image'] ?>">
			<input type="text" name="name[]" value="<?php echo $res['link'] ?>" placeholder="Domain Link">
			<input type="file" name="GIF0">
		</div>
		<?php 
			require '../lib/connection.php';
			$sql = "SELECT * FROM gif WHERE imageID = 1";
			$res = mysqli_query($conn,$sql);
			$res = mysqli_fetch_assoc($res);
		 ?>
		<div class="gif_holder">
			<img src="../<?php echo $res['image'] ?>">
			<input type="text" name="name[]" value="<?php echo $res['link'] ?>" placeholder="Domain Link">
			<input type="file" name="GIF1">
		</div>
		<?php 
			require '../lib/connection.php';
			$sql = "SELECT * FROM gif WHERE imageID = 2";
			$res = mysqli_query($conn,$sql);
			$res = mysqli_fetch_assoc($res);
		 ?>
		<div class="gif_holder">
			<img src="../<?php echo $res['image'] ?>">
			<input type="text" name="name[]" value="<?php echo $res['link'] ?>" placeholder="Domain Link">
			<input type="file" name="GIF2">
		</div>
		<?php 
			require '../lib/connection.php';
			$sql = "SELECT * FROM gif WHERE imageID = 3";
			$res = mysqli_query($conn,$sql);
			$res = mysqli_fetch_assoc($res);
		 ?>
		<div class="gif_holder">
			<img src="../<?php echo $res['image'] ?>">
			<input type="text" name="name[]" value="<?php echo $res['link'] ?>" placeholder="Domain Link">
			<input type="file" name="GIF3">
		</div>
		<?php 
			require '../lib/connection.php';
			$sql = "SELECT * FROM gif WHERE imageID = 4";
			$res = mysqli_query($conn,$sql);
			$res = mysqli_fetch_assoc($res);
		 ?>
		<div class="gif_holder">
			<img src="../<?php echo $res['image'] ?>">
			<input type="text" name="name[]" value="<?php echo $res['link'] ?>" placeholder="Domain Link">
			<input type="file" name="GIF4">
		</div>
		<?php 
			require '../lib/connection.php';
			$sql = "SELECT * FROM gif WHERE imageID = 5";
			$res = mysqli_query($conn,$sql);
			$res = mysqli_fetch_assoc($res);
		 ?>
		<div class="gif_holder">
			<img src="../<?php echo $res['image'] ?>">
			<input type="text" name="name[]" value="<?php echo $res['link'] ?>" placeholder="Domain Link">
			<input type="file" name="GIF5">
		</div>
		<?php 
			require '../lib/connection.php';
			$sql = "SELECT * FROM gif WHERE imageID = 6";
			$res = mysqli_query($conn,$sql);
			$res = mysqli_fetch_assoc($res);
		 ?>
		<div class="gif_holder">
			<img src="../<?php echo $res['image'] ?>">
			<input type="text" name="name[]" value="<?php echo $res['link'] ?>" placeholder="Domain Link">
			<input type="file" name="GIF6">
		</div>
		<?php 
			require '../lib/connection.php';
			$sql = "SELECT * FROM gif WHERE imageID = 7";
			$res = mysqli_query($conn,$sql);
			$res = mysqli_fetch_assoc($res);
		 ?>
		<div class="gif_holder">
			<img src="../<?php echo $res['image'] ?>">
			<input type="text" name="name[]" value="<?php echo $res['link'] ?>" placeholder="Domain Link">
			<input type="file" name="GIF7">
		</div>
		<?php 
			require '../lib/connection.php';
			$sql = "SELECT * FROM gif WHERE imageID = 8";
			$res = mysqli_query($conn,$sql);
			$res = mysqli_fetch_assoc($res);
		 ?>
		<div class="gif_holder">
			<img src="../<?php echo $res['image'] ?>">
			<input type="text" name="name[]" value="<?php echo $res['link'] ?>" placeholder="Domain Link">
			<input type="file" name="GIF8">
		</div>
		<button style="padding: 10px; border:1px solid #c4c4c4; border-radius: 5px; cursor: pointer;">SUBMIT</button>
	</form>
</div>


