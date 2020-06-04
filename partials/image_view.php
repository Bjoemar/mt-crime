		  			

		 <?php if ($count === 0): ?>
		 
		  	<div class="jumbotron" style="text-align: center; background: transparent; color: black;">
		  	  	<h1 class="display-4">NO POST YET</h1>
		  	  	<?php if (isset($_SESSION['restriction'])): ?>
		  	 		 	<?php if ($query['restriction'] == $_SESSION['restriction']): ?>
		  	 				<button class="btn btn-light " id="addContent" value="<?php echo $type; ?>">CREATE A POST</button>	
		  	 		 	<?php endif ?>
		  	 		<?php else: ?>

		  	 		 	 	<button class="btn btn-light " data-toggle="modal" data-target="#loginForm" >LOGIN TO CREATE A POST</button>	

		  	  	<?php endif ?>
		  	 
		  	</div>

		 <?php endif; ?>
	  
	 	<div class="row" style="overflow: hidden;">
	 	
  			<?php while ($row = mysqli_fetch_assoc($res)): ?>
  				<div class="col-sm-12 col-md-6 col-lg-4">
  					<a style="text-decoration: none;" href="article.php?type=<?php echo $type ?>&article_id=<?php echo $row['type_id']; ?>">
  						<?php if ($type == 'MtCrimeSiteList' || $type == 'MtCrimeSiteRecommendation'): ?>
  									<div class="card bg-light mb-3" style="max-width: 100%">

                      <?php if (isset($_SESSION['restriction'])): ?>
                        
    										<?php if ($_SESSION['restriction'] == 1): ?>
    											
    											<input type="checkbox" class="form-control delete-check-box" value="<?php echo $row['id'] ?>" name="delete-content[]">

    										<?php endif ?>
                      <?php endif ?>

  									  	<div class="card-header" style="padding: 5px;">
                          <?php if ($type == 'MtCrimeSiteRecommendation'): ?>
                            <img class="img-fluid vendor_img" style="width: 100%; object-fit: cover;" src="assets/images/logo.png">
                          <?php endif ?>
  									  		<img class="img-fluid vendor_img" style="height: 120px; object-fit: cover;" src="<?php echo $row['thumbnail'] ?>">
  									  	</div>
  								  		<div class="card-body mt-3" style="padding: 5px;">
  								    		<table style="width:100%;">
  								    			<tr>
  								    				<td class="td_short">사이트</td>
  								    				<td class="td_long"><?php echo $row['title'] ?></td>
  								    			</tr>
  								    			<tr>
  								    				<td class="td_short">도메인</td>
  								    				<td class="td_long"><?php echo $row['domainName'] ?></td>
  								    			</tr>
                            <?php if ($row['code']): ?>
                              <tr>
                                <td class="td_short">코드</td>
                                <td class="td_long"><?php echo $row['code'] ?></td>
                              </tr>
                              <tr>
                                <td class="td_short">보증금</td>
                                <td class="td_long"><?php echo $row['deposit'] ?></td>
                              </tr>
                            <?php endif ?>
  								    		</table>
  								  		</div>
  									</div>		
  							<?php else: ?>
  								 <div class="card text-white mb-3" style="overflow: hidden;">
  								 	
  								 	<?php if ($_SESSION['restriction'] == 1): ?>
  								 		
  								 		<input type="checkbox" class="form-control delete-check-box" value="<?php echo $row['id'] ?>" name="delete-content[]">

  								 	<?php endif ?>
  								 	<div class="card-body" style="padding: 0;">
  								 	    <img class="img-fluid" style="height: 120px; object-fit: cover;" src="<?php echo $row['thumbnail'] ?>">

  								 	</div>
  								 	
  								 	<div class="card-header" style="padding: 10px;">

  								 	  	<label class="elepsis" style="font-size: 12px; color: black; margin: 0;"><?php echo $row['title'] ?></label>
  								 	  	<small style="font-size: 12px; float: left; color: black;"><?php echo $row['username'] ?></small>
  								 	  	<small style="float: right; font-size: 12px; color: black;"><?php echo $row['views'] ?></small>
  								 	</div>
  									</div>
  						<?php endif ?>
		  			   
  					</a>
  				</div>
  			<?php endwhile; ?>

	 	</div>