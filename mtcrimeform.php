<?php session_start();
	if (!isset($_SESSION['restriction'])) { ?>
		<script>
			open(location, '_self').close();
		</script>	
	<?php header('location: 404.php'); ?>	
<?php } ?>
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.css" rel="stylesheet">
<link rel="stylesheet" href="offline_lib/bootstrap.min.css" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
<link rel="stylesheet" href="offline_lib/summernote-lite.css" crossorigin="anonymous"> -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>


<?php

	if (isset($_SERVER['HTTP_REFERER'])) {
		parse_str(parse_url($_SERVER['HTTP_REFERER'], PHP_URL_QUERY), $queries);
		$type =  $queries['type'];
		$formName = '';

		if ($type == 'MtCrimeNotice') {
			$formName = '공지사항';
		} else if ($type == 'MtCrimeSiteRecommendation') {
			$formName = '인증업체';	
		} else if ($type == 'MtCrimeNewWebsite') {
			$formName = '신규사이트';
		} else if ($type == 'MtCrimeSiteList') {
			$formName = '먹튀사이트';
		} else if ($type == 'MtCrimeFree') {
			$formName = '자유게시판';
		} else if ($type == 'MtCrimeGag') {
			$formName = '고급유머';
		} else if ($type == 'MtCrimeEyeCleansing') {
			$formName = '안구정화';
		} else if ($type == 'MtCrimeExperience') {
			$formName = '경험담';
		} else if ($type == 'MtCrimeSavvy') {
			$formName = '노하우';
		} else if ($type == 'MtCrimeHotStories') {
			$formName = '야썰';
		}

	?>


	<div class="container">
		<?php echo "<h2>".$formName."</h2>" ?>
		<form action="lib/saveContent.php" method="post" id="mtForm" enctype="multipart/form-data">	
			<label>Title</label>
			<input required type="text" name="title" class="form-control mb-3" placeholder="Title">
			<input type="text" hidden name="type" value="<?php echo $type; ?>">
			<?php if ($type == 'MtCrimeSiteRecommendation'): ?>
				<label>Domain Name</label>
				<input required type="text" class="form-control" name="domain-name">
				<label>Code</label>
				<input required type="text" class="form-control" name="web-code">
				<label>Deposit</label>
				<input required type="text" class="form-control" name="deposit">
				<label>Description</label>
				<input required type="text" class="form-control" name="description">
			<?php endif ?>
			<?php if ($type == 'MtCrimeSiteList'): ?>
				<label>Domain Name</label>
				<input required type="text" class="form-control" name="domain-name">
			<?php endif ?>
			<label>Image</label>
			<input type="file" name="image" class="form-control mb-3">
			<label>Content</label>
			<textarea required name="content" id="addText"></textarea>
			<button class="btn btn-dark mt-3">Submit</button>
			<button type="button" class="btn btn-danger mt-3" id="cancel_mtcrimeform">Cancel</button>
		</form>
	</div>

<?php } ?>

<!-- <script src="offline_lib/jquery-3.4.1.slim.min.js" crossorigin="anonymous"></script>
<script src="offline_lib/popper.min.js"  crossorigin="anonymous"></script>
<script src="offline_lib/bootstrap.min.js" crossorigin="anonymous"></script>
<script src="offline_lib/summernote-lite.js"></script> -->


<script type="text/javascript">

	$(document).ready(function() {
	  $('#addText').summernote({
	  	height: 400,
	  	callbacks: {
	  	           onImageUpload: function(files, editor, welEditable) {
            		sendFile(files[0], this)
        			},
	  	        	onMediaDelete : function(target) {
	  	               alert(target);
	  	               removeFile(target[0].src);
	  	           }
	  	       }
	  });
	});

	$('#cancel_mtcrimeform').click(function(){
		window.close();
	});

	function removeFile(target) {
		alert(target)
		$.ajax({
			url : 'lib/onMediaDelete.php',
			method : 'post',
			data : {'target' : target},
			success:function(){
				$('input[value="'+target+'"]').remove();
			}
		})
	}

	function sendFile(file , editor){
		let formData = new FormData;
		formData.append('image',file);
		$.ajax({
       		url : 'lib/saveSummernoteImage.php',
       		method : 'post',
       		data : formData,
       		cache: false,
       		contentType: false,
       		processData: false,
       		success:function(url){
       			$(editor).summernote('editor.insertImage', url);
       			$('#mtForm').append('<input hidden type="text" value="'+url+'" name="summernote-image[]">');
       		}
       })
	}

</script>

