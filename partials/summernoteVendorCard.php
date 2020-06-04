<div class="row" style="border-bottom: 2px solid #f5f5f5; padding-bottom: 10px;">
	<div class="col-md-5">
		<img src="<?php echo $res_article['image'] ?>" class="img-fluid">
		<div class="card bg-danger mt-2" style=" padding: 5px;">
			가입코드 : <?php echo $res_article['code'] ?>
		</div>
		<div class="card bg-dark mt-2" style=" padding: 5px;">
			<span>바로가기 :  <a href="//<?php echo $res_article['domainName'] ?>"><?php echo $res_article['domainName'] ?></a></span>
		</div>
	</div>
	<div class="col-md-7" style="color: black;">
		<h5 style="margin: 0; margin-bottom: 10px;"><?php echo $res_article['title'] ?> <button class="btn btn-sm btn-danger"> Mt-crime official certified company</button></h5>
		<p style="margin: 0;">바로가기 : <a href="//<?php echo $res_article['domainName'] ?>" style="text-decoration: none; color: red;"><strong style="color: red;"><?php echo $res_article['domainName'] ?></strong></a> </p>
		<p style="margin: 0;">보증금 : <strong style="color: red;"><?php echo $res_article['deposit']; ?>원</strong></p>
		<hr>
		<p style="margin: 0;">최고의 자본력!</p>
		<p style="color: #9a9494!important;"><?php echo $res_article['description']; ?></p>
	</div>
</div>