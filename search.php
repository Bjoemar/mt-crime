<?php require_once 'template.php'; ?>

<?php function getTitle(){
	echo "Mt-Crime | Result of ".$_GET['keyword'];
} ?>

<?php function getContent() { ?>
	<div class="container">
	<?php if (isset($_GET['keyword'])): ?>
		<?php 
			require 'lib/connection.php';
			$query = $_GET['keyword'];
			
			$sql = "SELECT * FROM web_content WHERE content LIKE '%".$query."%' || title LIKE '%".$query."%' || domainName LIKE '%".$query."%'";
			$result = mysqli_query($conn,$sql);
			$len = mysqli_num_rows($result);
			$keyword = $_GET['keyword'];
			if ($keyword == null) {
				$len = 0;	
			}
		 ?>
		
			<h1>Search Word : "<i style="color: #333;"><?php echo $query; ?></i>" </h1>
			<hr>
			<?php if ($len > 0): ?>
				<?php while ($row = mysqli_fetch_assoc($result)): ?>
					<div class="card">
					  <div class="card-header">
					    <?php 
					    	echo preg_replace("/\b([a-z]*${keyword}[a-z]*)\b/i","<b>$1</b>",$row['title']);
					     ?>
					  </div>
					  <div class="card-body">
					    <blockquote class="blockquote mb-0">

					      	<?php 
					      		$content = strip_tags($row['content'], '<p>style</span>');
					      		$cutString = substr($content, 0, 120);
		
					      	 ?>
					      	 <label ><?php echo $cutString ?>...</label>
					
					      <div class="clear"></div>
					      <hr>
					      <a class="btn btn-danger" href="article.php?type=<?php echo $row['type'] ?>&article_id=<?php echo $row['type_id'] ?>">READ MORE</a>
					    </blockquote>
					  </div>
					</div>
				<?php endwhile; ?>

				<?php else: ?>
				<div style="text-align: center; margin-top: 50px; margin-bottom : 50px;color: #c4c4c4;">
					
					<h2>NO RESULT FOUND</h2>
				</div>

			<?php endif ?>
			
			
		
	<?php else: ?>
		<?php require '404.php'; ?>
	<?php endif ?>
	</div>
	
	<script type="text/javascript">
		
		window.scrollTo(0,550);


	</script>
<?php } ?>


