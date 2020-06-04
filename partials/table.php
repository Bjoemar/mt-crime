<?php function getQuery($query){ ?>

	
	<div class="row">
		<div class="col-lg-8 col-md-12 mb-3">
			<div class=" mb-3" style="max-width: 100%; color: black;">

				<?php 
						require 'functions.php';
						require 'lib/connection.php';

						$page = 1;
						
						if (isset($_GET['page'])) {
							$page = $_GET['page'];
						}

						// $page;
						$skipper = ($page - 1) * 15;

						$type = $query['name'];

					 	$sql = "SELECT * FROM web_content WHERE type = '$type' ORDER BY type_id DESC LIMIT $skipper,15";

					 	$res = mysqli_query($conn,$sql);

					 	$count = mysqli_num_rows($res);



					 	$max = "SELECT *  FROM web_content WHERE type = '$type'";
					 	
					 	$max = mysqli_query($conn,$max);

				 		$count_max  = mysqli_num_rows($max);

				 		$table_id = ($page - 1) * 15;
				 		
				 		$table_id = $count_max - $table_id;

				 		if ($query['view'] == 0) {

				 			require_once 'table_view.php';

				 		} else if ($query['view'] == 1) {

				 			require_once 'image_view.php';

				 		} else if($query['view'] == 2) {
				 			// LAYOUT TODO
				 		}
				 ?>


			</div>


			<?php if ($count > 0): ?>

				<?php 


					$type = $query['name'];


					$max_count = mysqli_num_rows($max);

					$max_count = ceil($max_count /= 15);
					$limit = 10;

					if(isMobileDevice()){
						$limit = 5;
					}
			
					$start = ceil($page / $limit) * $limit - ($limit - 1);

					$last = ceil($page / $limit) * $limit;

					$prev = 1;

					$next = (ceil($page / $limit) * $limit) + 1;

					if ($page > $limit) {
						$prev = $last - ($limit + 1);
					} 


					if ($last >= $max_count) {
						$next = $max_count;
						$last = $max_count;
					}
				 ?>
				<nav aria-label="Page navigation mt-3">

					<ul class="pagination justify-content-center mt-3">

					    <li class="page-item">
					    	<a class=" ml-1 btn-outline-dark btn" href="view.php?type=<?php echo $type ?>&page=<?php echo $prev ?>"><</a>
					    </li>

					    <?php for ($i = $start; $i <= $last; $i++): ?>

					    		<li class="page-item">
					    			<a class=" ml-1 btn-outline-dark btn" href="view.php?type=<?php echo $type ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
					    		</li>
					    		
					    <?php endfor; ?>
					  
					    <li class="page-item">
					    	<a class=" ml-1 btn-outline-dark btn" href="view.php?type=<?php echo $type ?>&page=<?php echo $next ?>">></a>
					    </li>

					</ul>

					<?php if (isset($_SESSION['restriction'])): ?>
						<?php if ($_SESSION['restriction'] == 1): ?>
							
						  	<button class="btn btn-dark" id="check-all-delete-content">전체선택</button>
						  	<button class="btn btn-dark" id="delete-checked-content">삭제</button>
						<?php endif ?>

						<?php if ($_SESSION['restriction'] == $query['restriction'] || $_SESSION['restriction'] == 1): ?>
						  	<button class="btn btn-danger " id="addContent" value="<?php echo $type; ?>" style="float: right;">글쓰기</button>
						<?php endif ?>
					<?php endif ?>

				</nav>

			<?php endif; ?>


		</div>

		<div class="col-lg-4 col-md-12">
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

<?php } ?>

