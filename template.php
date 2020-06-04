<!DOCTYPE html>
<html>
<head>
	<title><?php getTitle(); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php require_once 'partials/localhostStyle.php'; ?>

</head>
<body>
	<?php session_start(); ?>
	<?php require_once 'lib/account.php' ?>
	<div class="container">
		<ul class="nav justify-content-end bg-light bot-round light-border" >
			<?php if (!isset($_SESSION['restriction'])): ?>
				
			  	<li class="nav-item">
			    	<a class="nav-link a-white" href="#" data-toggle="modal" data-target="#loginForm">로그인</a>
			  	</li>

				<li class="nav-item">
				  	<a class="nav-link a-white" href="#" data-toggle="modal" data-target="#registerForm">회원가입</a>
				</li>

			<?php else: ?>
				<?php if ($_SESSION['restriction'] == 1): ?>
						
					 <li class="nav-item">
				    	<button class="nav-link a-white btn" id="open-gif-setting">GIF</button>
				  	</li>
				<?php endif ?>

				<li class="nav-item">
			    	<a class="nav-link a-white" href="lib/destroyAccount.php">Logout</a>
			  	</li>			

			 		
			<?php endif ?>
		</ul>

		<nav class="navbar navbar-expand-lg navbar-light ">

			<div class=" navbar-collapse" id="mt-nav">
			    
			    <a class="navbar-brand" href="index.php"><img src="assets/images/logo.png"></a>

				<form class="form-inline my-2 ml-auto my-lg-0" action="search.php">
			      	<div class="input-group mb-3 mt-3 ml-3 mt_nav_search">
			      	  	<input type="text" name="keyword" class="form-control" placeholder="Search" aria-label="Recipient's username" aria-describedby="basic-addon2">
			      	  	<div class="input-group-append">
			      	    	<button class="input-group-text btn-light" type="submit" id="basic-addon2">Find</button>
			      	  	</div>
			      	</div>
			    </form>
			
			</div>
		</nav>
	</div>

	<img src="assets/images/banner.jpg" class="banner" alt="Responsive image">

	<div class="container mt-3 mb-3 parent_mt_nav " style="overflow-x: scroll;">
		<nav id="mt_main_nav" class="nav nav-pills flex-column flex-sm-row bg-light light-border">
			 <a href="view.php?type=MtCrimeNotice" class=" flex-sm-fill text-sm-center a-white">
				<img class="main_nav_img mb-3" src="assets/images/1-1.png">
				<br>
				<strong>공지사항</strong>
			</a>
			 <a href="view.php?type=MtCrimeSiteRecommendation" class=" flex-sm-fill text-sm-center  a-white">
				<img class="main_nav_img mb-3" src="assets/images/1-2.png">
				<br>
				<strong>인증업체</strong>
			</a>
			 <a href="view.php?type=MtCrimeSiteList" class=" flex-sm-fill text-sm-center  a-white">
				<img class="main_nav_img mb-3" src="assets/images/1-3.png">
				<br>
				<strong>먹튀사이트</strong>
			</a>
			 <a href="#" class=" flex-sm-fill text-sm-center  a-white">
				<img class="main_nav_img mb-3" src="assets/images/TV-Icon.png">
				<br>
				<strong>실시간중계</strong>
			</a>
			 <a href="mtframe.php" class=" flex-sm-fill text-sm-center  a-white">
				<img class="main_nav_img mb-3" src="assets/images/pick.png">
				<br>
				<strong>경기분석</strong>
			</a>
			 <a href="#" class=" flex-sm-fill text-sm-center  a-white">
				<img class="main_nav_img mb-3" src="assets/images/popcorn.png">
				<br>
				<strong>최신영화</strong>
			</a>
			 <a href="view.php?type=MtCrimeHotStories" class=" flex-sm-fill text-sm-center  a-white">
				<img class="main_nav_img mb-3" src="assets/images/3-4.png">
				<br>
				<strong>야썰</strong>
			</a>
			 <a href="view.php?type=MtCrimeGag" class=" flex-sm-fill text-sm-center  a-white">
				<img class="main_nav_img mb-3" src="assets/images/2-2.png">
				<br>
				<strong>고급유머</strong>
			</a>
			 <a href="view.php?type=MtCrimeFree" class=" flex-sm-fill text-sm-center  a-white">
				<img class="main_nav_img mb-3" src="assets/images/2-1.png">
				<br>
				<strong>자유게시판</strong>
			</a>
		</nav>
	</div>

	<?php getContent(); ?>


	<?php if (!isset($_SESSION['restriction'])): ?>

		<!-- Login Modal -->
		<div class="modal fade" id="registerForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
			    <div class="modal-content bg-light">
			      	<div class="modal-header bg-light">
			        	<h5 class="modal-title" id="exampleModalCenterTitle" style="color: black;">회원가입</h5>
			        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          		<span aria-hidden="true">&times;</span>
			        	</button>
			      	</div>
			      	
			      	<div class="modal-body bg-light" style="color: black;">
			      		<small class="error reg_error"></small>
			        	<label>닉네임</label>
			        	<small class="error"></small>
			        	<input id="regUsername" type="text" class="form-control   mb-2">
			        	<label>이메일</label>
			        	<small class="error"></small>
			        	<input id="regEmail" type="text" class="form-control   mb-2">
			        	<label>비밀번호</label>
			        	<small class="error"></small>
			        	<input id="regPassword" type="password" class="form-control   mb-2">
			        	<label>비밀번호 확인</label>
			        	<input id="regPassword2" type="password" class="form-control   mb-2">

			      	</div>
			      	
			      	<div class="modal-footer bg-light">
			        	<button type="button" class="btn " data-dismiss="modal">Close</button>
			        	<button type="button" class="btn btn-primary" id="registerButton">가입완료</button>
			      	</div>
			    </div>
			</div>
		</div>

		<!-- Modal -->
		<div class="modal fade" id="loginForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
			    <div class="modal-content">
			      	<div class="modal-header bg-light">
			        	<h5 class="modal-title" id="exampleModalCenterTitle" style="color: black;">로그인</h5>
			        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          		<span aria-hidden="true">&times;</span>
			        	</button>
			      	</div>
			      	
			      	<div class="modal-body bg-light" style="color: black;">
			      		<small class="error log_error"></small>
			        	<label>닉네임</label>
			        	<input id="logUsername" type="text" class="form-control   mb-2" >
			        	<label>비밀번호 </label>
			        	<input id="logPassword" type="password" class="form-control   mb-2" >
			      	
			      	</div>
			      	
			      	<div class="modal-footer bg-light">
			        	<button type="button" class="btn " data-dismiss="modal">Close</button>
			        	<button type="button" class="btn btn-primary" id="signinbutton">Login</button>
			      	</div>
			    </div>
			</div>
		</div>

	<?php endif ?>	

	<div class="container">
		<?php require_once 'partials/footer.php'; ?>
	</div>
	
</body>


	<?php require_once 'partials/localhostScript.php'; ?>
	<script type="text/javascript" src="assets/js/script.js"></script>

	<?php if (!isset($_SESSION['restriction'])): ?>
			
		<script>

			let _register = false;

			$(document).on('change','#regUsername',function(){
			    let username = $(this).val();
			    $.ajax({
			        url : 'lib/check.php',
			        method : 'post',
			        data : {'username' : username},
			        success:function(data){
			            if (data == 0) {
			            	_register = true;
			            } else {
			            	_register = false;
			            	$('#regUsername').prev().html('Username is already taken');
			            	hideError();
			            }
			        }
			    });
			});



			$(document).on('change','#regEmail',function(){
			    let email = $(this).val();
			    $.ajax({
			        url : 'lib/check.php',
			        method : 'post',
			        data : {'email' : email},
			        success:function(data){
			            if (data == 0) {
			            	_register = true;
			            } else {
			            	_register = false;
			            	$('#regEmail').prev().html('Email is already taken');
			            	hideError();
			            }
			        }
			    });
			});


			$(document).on('change','#regPassword2',function(){
			    let password = $(this).val();
			    let main_password = $('#regPassword').val();
			    if (password != main_password) {
			    	$('#regPassword').prev().html('Password not Match!');
			    	hideError();
			    }
			});




			$(document).ready(()=>{
				$('#registerButton').click(()=> {
					let username = $('#regUsername').val();
					let email = $('#regEmail').val();
					let password = $('#regPassword').val();
					let password2 = $('#regPassword2').val();

					if (username.length > 0 && email.length > 0 && password.length > 0) {
						$.ajax({
							url : 'lib/auth.php',
							method : 'post',
							data : {'reg_username' : username , 'reg_email' : email , 'reg_password' : password},
							success : function(data){
								let username = data;
								$('#registerForm').find('.modal-footer').remove();
								$('#registerForm').find('.modal-body').html('<h5>Registerd Success.</h5>')
							}
						})
					} else {
						$('.reg_error').html('Please complete the form.');
						hideError();
					}
				});
			});



			$(document).ready(()=>{
				$('#signinbutton').click(()=> {
					let username = $('#logUsername').val();
					let password = $('#logPassword').val();

					if (username.length > 0 && password.length > 0) {
						$.ajax({
							url : 'lib/auth.php',
							method : 'post',
							data : {'log_username' : username , 'log_password' : password},
							success : function(data){
								if (data == 0) {
									location.reload();
								} else {
									$('.log_error').html(data);
									hideError();
								}
							}
						})
					} else {
						$('.log_error').html('Please complete the form.');
						hideError();
					}
				});
			});


			
		</script>
	<?php endif ?>
	
    <script src="http://192.168.1.107:3000/static/js/bundle.js"></script>
    <script src="http://192.168.1.107:3000/static/js/1.chunk.js"></script>
    <script src="http://192.168.1.107:3000/static/js/main.chunk.js"></script>
</html>