<div class="jumbotron bg-light" style="text-align: center; background: transparent; ">
  <?php if (isset($_SERVER['HTTP_REFERER'])): ?>
  		<h1>IT SEEM YOU'RE LOST ?</h1>
  		<a href="<?php echo $_SERVER['HTTP_REFERER'] ?>">GO BACK</a>
  	<?php else: ?>
  		<h1 class="display-4">404 PAGE IS NOT FOUND</h1>
  		<a href="index.php">GO HOME</a>
  <?php endif ?>
</div>