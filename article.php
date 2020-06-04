<?php require_once 'template.php'; ?>

<?php function getTitle(){
	require 'lib/connection.php';
	$article_id = $_GET['article_id'];
	$type = $_GET['type'];
	$sql = "SELECT title FROM web_content where type_id = $article_id AND type = '$type'";
	$res = mysqli_query($conn,$sql);
	$res = mysqli_fetch_assoc($res);
	if ($res) {
	
		echo "Mt-Crime | ".$res['title'];
	} else {
		echo "Mt-crime | 404";
	}
} ?>

<?php function getContent(){ ?>
	<?php 
		require 'partials/functions.php';
		require 'lib/connection.php';

		function check($article_id,$type , $name) {
			require 'lib/connection.php';
			$getNext = "SELECT * FROM web_content where type_id = $article_id AND type = '$type'";
			$next = mysqli_query($conn,$getNext);
			$last_data = mysqli_num_rows($next);

			$getMax = "SELECT * FROM web_content where type = '$type' ORDER BY id DESC LIMIT 1 ";
			$max = mysqli_query($conn,$getMax) or die(mysqli_error($conn));

			$maxnum = mysqli_fetch_assoc($max);

			$last_id = $maxnum['type_id'];

			if ($last_data == 0) {
				if ($name == 0) {
					if ($last_data < $article_id) {

						$article_id = $last_data;	

					} else {

						$article_id ++;
					}
					$name = 0;
				} else {
					if ($article_id == 0) {

						$article_id = 1;

					} else {

						$article_id --;
					}

					$name = 1;
				};

				if ($last_id > $article_id){
					return check($article_id, $type , $name);
				} else {
					return $article_id;
				}
			} else {
				if ($article_id <= 1) {
					return 1;
				} else if ($article_id >= $last_id) {
					return $last_id;
				} else {
					return $article_id;
				};
			};
		};

		$article_id = $_GET['article_id'];
		$type = $_GET['type'];
		$sql = "SELECT * FROM web_content where type_id = $article_id AND type = '$type'";
		$res = mysqli_query($conn,$sql);
		$res_article = mysqli_fetch_assoc($res);


		$next = check(($article_id + 1) ,$type , 0);
		$prev = check(($article_id - 1) ,$type , 1);
		// $prev = 1;


		$views = $res_article['views'] + 1;
		$update_views = "UPDATE web_content SET views = '$views' where type_id = $article_id AND type = '$type'";
		mysqli_query($conn,$update_views) or die(mysqli_error($conn));
	 ?>

	 <?php if ($res_article): ?>

		<style type="text/css">
		 	.card-body p {
		 		color: black!important;
		 	}

		 	small {
		 		margin: 0;
		 		padding-right: 20px;
		 		color: black;
		 	}

		 	.functionButton {
		 		float: right;
		 	}

		 	.headtitle {
		 		width: 100%;
		 	}

		</style>

		<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-12">
						<div class="headtitle">
							<h4 class="elepsis2" style="color: black; float: left;"><label style="font-weight: 900;"><?php echo $res_article['title'] ?></label></h4>
							<div class="functionButton">

								<a href="article.php?type=<?php echo $type ?>&article_id=<?php echo $prev?>" class="btn btn-dark mb-2"><i class="far fa-caret-square-left"></i> Prev</a>
		
								<a href="article.php?type=<?php echo $type ?>&article_id=<?php echo $next  ?>" class="btn btn-dark mb-2">Next <i class="far fa-caret-square-right"></i></a>	
								
							</div>
							<?php if (isset($_SESSION['restriction'])): ?>

								<?php if ($_SESSION['user_id'] == $res_article['user_id'] || $_SESSION['restriction'] == 1): ?>
									
									<button class="btn btn-dark btn-sm mb-3 " id="delete-IDcontent" value="<?php echo $res_article['id'] ?>"><i class="fas fa-trash"></i> DELETE</button>
									
									<button class="btn btn-dark btn-sm mb-3" id="update-content"><i class="fas fa-edit"></i>UPDATE</button>

								<?php endif; ?>

							<?php endif; ?>
							
							<div class="clear"></div>
						</div>

						<div class="card text-white bg-default mb-3" >
						  <div class="card-header">
						  	<ul class="nav" style=" color: black;">
						  	  <li class="nav-item">
						  	   <small><i class="far fa-user"></i> <?php echo $res_article['username'] ?></small>
						  	  </li>
						  	  <li class="nav-item">
						  	   <small><i class="far fa-eye"></i> <?php echo $res_article['views'] ?></small>
						  	  </li>
						  	  <li class="nav-item">
						  	    <small><i class="fas fa-comment"></i> 0</small>
						  	  </li>
						  	  <li class="nav-item">
						  	   <small><i class="fas fa-clock"></i> <?php echo timeago($res_article['date']) ?></small>
						  	  </li>
						  	</ul>
						  </div>

						  <div class="card-body article_content">
						  	<?php if ($res_article['image'] && $type != 'MtCrimeSiteRecommendation'): ?>	
						  		<img src="<?php echo $res_article['image']; ?>" class="img-fluid" alt="MT Crime Image of <?php echo $res_article['title'] ?>">
						  	<?php endif ?>
						  	<div class="summernoteContent">
						  		<?php if ($type == 'MtCrimeSiteRecommendation'): ?>
						  			<?php require_once 'partials/summernoteVendorCard.php'; ?>
						  		<?php endif ?>
						  		<div class="summernoteImageChange">
						    		<?php echo $res_article['content'] ?>
						  		</div>
						  	</div>
						  </div>
						  
						</div>
					</div>

					<div class="col-md-4 col-sm-12">
							<a href="https://t.me/hero888" target="#_blank">
								<div class="card text-white mb-3" style="max-width: 100%; min-height: 192px; background: url('assets/images/content-img.jpg'); background-size : contain; background-repeat: no-repeat; background-position: center;">
								</div>
							</a>

							<div class="card text-white bg-light mb-3" style="max-width: 100%; min-height: 400px;">
						  		<div id="root" class="card-body mt-4" style="padding: 5px;">
						  		</div>
							</div>
					</div>

				</div>
				

				<?php 

				require_once 'partials/comment.php'; ?>

			</div>
			
		<script type="text/javascript">
			
			window.scrollTo(0,700)

		</script>
		
	<?php else: ?>
		<div class="container">
			<?php require_once '404.php'; ?>
		</div>
	<?php endif ?>	
<?php } ?>


