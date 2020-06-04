		
  			<table class="table table-striped  view_table" style="overflow-x: scroll; text-align: center; font-size: 12px;">
  			

  				 <?php if ($count > 0): ?>

	  			  	<thead class="table-bordered" style="border-top: 2.5px solid #333;">
	  			    	<tr>
	  			      		<th scope="col">번호</th>
	  			      		<th class="elepsis" scope="col" style="text-align: left;">제목</th>
	  			      		<th class="td_sm_hidden" scope="col">글쓴이</th>
	  			      		<th class="td_sm_hidden" scope="col">날짜</th>
	  			      		<th scope="col">조회</th>
	  			    	</tr>
	  			  	</thead>

	  			  	<?php else: ?>

	  			  	<div class="jumbotron" style="text-align: center; background: transparent; color: black;">
	  			  	  <h1 class="display-4">NO POST YET</h1>

	  			  	 <?php if (isset($_SESSION['restriction'])): ?>

		  	 		 	<?php if ($query['restriction'] == $_SESSION['restriction']): ?>
		  	 				<button class="btn btn-dark " id="addContent" value="<?php echo $type; ?>">CREATE A POST</button>
		  	 				<?php else: ?>
		  	 				<button class="btn btn-dark " id="addContent" value="<?php echo $type; ?>">CREATE A POST</button>		
		  	 		 	<?php endif ?>

		  	 		<?php else: ?>

		  	 		 	 	<button class="btn btn-dark " data-toggle="modal" data-target="#loginForm">LOGIN TO CREATE A POST</button>	
		  	 		 	 	
		  	  		<?php endif ?>

	  			  	</div>	
  				 <?php endif; ?>
  			  
  			  	<tbody>

  			  		<?php while ($row = mysqli_fetch_assoc($res)): ?>
  			  			<?php 
  			  				$dateNow = date('Y-m-d H:i:s');
  			  				$datetime1 = new DateTime($row['date']);
  			  				$datetime2 = new DateTime($dateNow);
  			  				$interval = $datetime1->diff($datetime2);
  			  				$diff = $interval->format('%d');
  			  			 ?>
	  			    	<tr>
	  			      		<th scope="row" style="padding-left: 22px; padding-right: 22px;">

	  			      			<?php if (isset($_SESSION['restriction'])): ?>		

		  			      			<?php if ($_SESSION['restriction'] == 1): ?>
		  			      				
		  			      				<input type="checkbox" class="form-control delete-check-box" value="<?php echo $row['id'] ?>" name="delete-content[]">

		  			      			<?php endif ?>
	  			      			<?php endif ?>

	  			      			<?php echo $table_id--; ?>
	  			      		</th>
	  			      		<style type="text/css">
	  			      			.elepsis {
	  			      				width : 350px;
	  			      			}

	  			      			@media only screen and (max-width: 1000px) {
	  			      				.elepsis {
	  			      					width : 180px;
	  			      				}
	  			      			}


	  			      		</style>
	  			      		<td style="text-align: left;">
	  			      			<a style="color: black;" href="article.php?type=<?php echo $type ?>&article_id=<?php echo $row['type_id']; ?>">
		  			      			<label class="elepsis" style="cursor: pointer;">
		  			      				<?php if ($diff == 0) : ?>
		  			      					<span class="badge badge-danger">New</span>
		  			      				<?php endif; ?>
		  			      				 &nbsp;<strong><?php echo $row['title'] ?></strong>
		  			      			</label>
		  			      		</a>
		  			      	</td>
	  			      		<td class="td_sm_hidden"><label style="width: 50px;"><?php echo $row['username'] ?></label></td>

	  			      		<td class="td_sm_hidden"><label style="width: 80px;"><?php echo timeago($row['date']) ?></label></td>
	  			      		<td><label style="width: 50px;"><?php echo $row['views'] ?></label></td>
	  			    	</tr>




  			    	<?php endwhile; ?>
  			  	</tbody>
  			  	
  			</table>
