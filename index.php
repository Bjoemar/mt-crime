<?php require 'template.php'; ?>

<?php function getTitle(){
	echo "Mt-Crime";
} ?>

<?php function getContent(){ ?>
	<div class="container">
		<img class="mt-banner-img faded" src="assets/images/c01.jpg">
		<div class="row slick-list">
			<?php

				require 'lib/connection.php';
				$sql = "SELECT * FROM web_content WHERE type = 'MtCrimeSiteRecommendation' ORDER BY id DESC";
				$res = mysqli_query($conn,$sql) or die(mysqli_error($conn));
			 ?>
			 <?php if ($res): ?>


				 	<?php while($row = mysqli_fetch_assoc($res)): ?>

				 		<div class="mt-3" style="float: left">
				 			<div class="mb-3" style="max-width: 100%; text-align: center;">
				 			  	<div class="card-header" style="padding: 5px;">
				 			  		<img class="img-fluid vendor_img" src="<?php echo $row['thumbnail'] ?>">
				 			  	</div>
				 			  	<p style="font-weight: 600; margin: 0; margin-top: 10px;"><?php echo $row['title'] ?></p>
				 			  	<a href="#" style="font-weight: 900;"><?php echo $row['domainName'] ?></a>
				 			  	<p style="color: red; margin: 0;  color: red; font-weight: 900;">가입코드  : <?php echo $row['code'] ?></p>
				 			</div>		
				 		</div>

				 	<?php endwhile; ?>	
			 	<?php else: ?>



			 		<div class="col-md-4 col-lg-3 mt-3" style="float: left">
			 			<div class="mb-3" style="max-width: 100%; text-align: center;">
			 			  	<div class="card-header" style="padding: 5px;">
			 			  		<img class="img-fluid vendor_img" src="assets/images/i1.jpg">
			 			  	</div>
			 			  	<p style="font-weight: 600; margin: 0; margin-top: 10px;">Name</p>
			 			  	<a href="#" style="font-weight: 900;">www.website.com</a>
			 			  	<p style="color: red; margin: 0;  color: red; font-weight: 900;">가입코드 : 5454</p>
			 			</div>		
			 		</div>

			 		<div class="col-md-4 col-lg-3 mt-3" style="float: left">
			 			<div class="mb-3" style="max-width: 100%; text-align: center;">
			 			  	<div class="card-header" style="padding: 5px;">
			 			  		<img class="img-fluid vendor_img" src="assets/images/i1.jpg">
			 			  	</div>
			 			  	<p style="font-weight: 600; margin: 0; margin-top: 10px;">Name</p>
			 			  	<a href="#" style="font-weight: 900;">www.website.com</a>
			 			  	<p style="color: red; margin: 0;  color: red; font-weight: 900;">가입코드 : 5454</p>
			 			</div>		
			 		</div>

			 		<div class="col-md-4 col-lg-3 mt-3" style="float: left">
			 			<div class="mb-3" style="max-width: 100%; text-align: center;">
			 			  	<div class="card-header" style="padding: 5px;">
			 			  		<img class="img-fluid vendor_img" src="assets/images/i1.jpg">
			 			  	</div>
			 			  	<p style="font-weight: 600; margin: 0; margin-top: 10px;">Name</p>
			 			  	<a href="#" style="font-weight: 900;">www.website.com</a>
			 			  	<p style="color: red; margin: 0;  color: red; font-weight: 900;">가입코드 : 5454</p>
			 			</div>		
			 		</div>

			 		<div class="col-md-4 col-lg-3 mt-3" style="float: left">
			 			<div class="mb-3" style="max-width: 100%; text-align: center;">
			 			  	<div class="card-header" style="padding: 5px;">
			 			  		<img class="img-fluid vendor_img" src="assets/images/i1.jpg">
			 			  	</div>
			 			  	<p style="font-weight: 600; margin: 0; margin-top: 10px;">Name</p>
			 			  	<a href="#" style="font-weight: 900;">www.website.com</a>
			 			  	<p style="color: red; margin: 0;  color: red; font-weight: 900;">가입코드 : 5454</p>
			 			</div>		
			 		</div>

			 <?php endif; ?>

		</div>


		<div class="gif_holder">
			<hr>
			<?php 
				require 'lib/connection.php';
				$sql = "SELECT * FROM gif ORDER BY imageID DESC";
				$res = mysqli_query($conn,$sql);
			 ?>
			 <?php while ($row = mysqli_fetch_assoc($res)): ?>
			 		<a href="//<?php echo $row['link'] ?>" target="#_blank"><img src="<?php echo $row['image'] ?>"></a>
			 <?php endwhile; ?>
		</div>



		<div class="row mt-3">

			<div class="col-md-12 col-lg-6">
				<div class="row">
					<div class="col-md-12 col-lg-6">
						<img class="img-fluid mb-3 faded"	src="assets/images/c03.jpg">

						<div class="card bg-light mb-3" style="max-width: 100%; max-height: 400px; height : 400px;">
					  		<div class="card-body" style="padding-bottom : 0;">
					  			<ul>
					  				<?php 
					  					require 'lib/connection.php';
					  					$sql = "SELECT * FROM web_content WHERE type = 'MtCrimeSiteList' ORDER BY id DESC LIMIT 13";
					  					$res = mysqli_query($conn,$sql);
					  				 ?>

					  				 <?php while($row = mysqli_fetch_assoc($res)): ?>
					  				 	<li> <label class="elepsis"><a target="#_blank" href="article.php?type=MtCrimeSiteList&article_id=<?php echo $row['type_id']; ?>" style="color: black; text-decoration: none;"><?php echo $row['title'] ?></a></label></li>
					  				 <?php endwhile; ?>
					  			</ul>
					    		
					  		</div>
						</div>

					</div>	
					<div class="col-md-12 col-lg-6">
						<img class="img-fluid mb-3 faded"	src="assets/images/c04.jpg">

						<div class="card bg-light mb-3" style="max-width: 100%; max-height: 400px; height : 400px;">
					  		<div class="card-body">
					  			<ul>
					  				<?php 
					  					require 'lib/connection.php';
					  					$sql = "SELECT * FROM web_content WHERE type = 'MtCrimeHotStories' ORDER BY id DESC LIMIT 13";
					  					$res = mysqli_query($conn,$sql);
					  				 ?>

					  				 <?php while($row = mysqli_fetch_assoc($res)): ?>
					  				 	<li> <label class="elepsis"><a target="#_blank" href="article.php?type=MtCrimeHotStories&article_id=<?php echo $row['type_id']; ?>" style="color: black; text-decoration: none;"><?php echo $row['title'] ?></a></label></li>
					  				 <?php endwhile; ?>
					  			</ul>
					  		</div>
						</div>

					</div>	
				</div>
			</div>




			<div class="col-md-12 col-lg-6">
				<div class="row">
					<div class="col-md-12 col-lg-6">
						<img class="img-fluid mb-3 faded"	src="assets/images/c05.jpg">

						<div class="card bg-light mb-3" style="max-width: 100%; max-height: 400px; height : 400px;">
					  		<div class="card-body" style="padding-bottom : 0;">
					  			<ul>
					  				<?php 
					  					require 'lib/connection.php';
					  					$sql = "SELECT * FROM web_content WHERE type = 'MtCrimeGag' ORDER BY id DESC LIMIT 13";
					  					$res = mysqli_query($conn,$sql);
					  				 ?>

					  				 <?php while($row = mysqli_fetch_assoc($res)): ?>
					  				 	<li> <label class="elepsis"><a target="#_blank" href="article.php?type=MtCrimeGag&article_id=<?php echo $row['type_id']; ?>" style="color: black; text-decoration: none;"><?php echo $row['title'] ?></a></label></li>
					  				 <?php endwhile; ?>
					  			</ul>
					    		
					  		</div>
						</div>

					</div>	
					<div class="col-md-12 col-lg-6">
						<img class="img-fluid mb-3 faded"	src="assets/images/c06.jpg">

						<div class="card bg-light mb-3" style="max-width: 100%; max-height: 400px; height : 400px;">
					  		<div class="card-body" style="padding-bottom : 0;">
					  			<ul>
					  				<?php 
					  					require 'lib/connection.php';
					  					$sql = "SELECT * FROM web_content WHERE type = 'MtCrimeFree' ORDER BY id DESC LIMIT 13";
					  					$res = mysqli_query($conn,$sql);
					  				 ?>

					  				 <?php while($row = mysqli_fetch_assoc($res)): ?>
					  				 	<li> <label class="elepsis"><a target="#_blank" href="article.php?type=MtCrimeFree&article_id=<?php echo $row['type_id']; ?>" style="color: black; text-decoration: none;"><?php echo $row['title'] ?></a></label></li>
					  				 <?php endwhile; ?>
					  			</ul>
					  		</div>
						</div>
					</div>	
				</div>
			</div>
		</div>
	</div>

<?php } ?>
