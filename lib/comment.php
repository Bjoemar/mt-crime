<?php 
	require_once 'connection.php';
	session_start();

	$user_id = $_SESSION['user_id'];

	$user = "SELECT * FROM credentials WHERE id = '$user_id'";

	$res = mysqli_query($conn,$user);

	$res = mysqli_fetch_assoc($res);

	if (isset($_SESSION['restriction'])) {
		
		if (isset($_POST['comment'])):
			
			$comment = $_POST['comment'];
			$type_id = $_POST['type_id'];
			if (strlen($comment) > 0 && strlen($type_id) > 0) {
							
				$date = date('Y-m-d H:i:s',time());

				$sql = "INSERT INTO comments(comment,user_id,type_id,date) VALUES('$comment', '$user_id','$type_id','$date')";
				
				mysqli_query($conn,$sql) or die(mysqli_error($conn));
				
				$arr = [
					array(
						'comment' => $comment,
						'date' => $date,
						'name' => $res['username'],

					)
				];

				if (mysqli_error($conn)) {
					echo 0;
				} else {
					echo json_encode($arr);
				}
			} else {
				echo 0;
			}
		endif;

		if (isset($_POST['reply'])) :
			
			$reply = $_POST['reply'];
			
			$comment_id = $_POST['comment_id'];

			$type_id  = $_POST['type_id'];
				if (strlen($reply) > 0 && strlen($comment_id) > 0) {
					
				$date = date('Y-m-d H:i:s',time());

				$sql = "INSERT INTO reply(comment_id,reply,user_id,date,type_id) VALUES('$comment_id', '$reply','$user_id','$date','$type_id')";

				mysqli_query($conn,$sql) or die(mysqli_error($conn));
				
				$arr = [
					array(
						'reply' => $reply,
						'date' => $date,
						'name' => $res['username'],

					)
				];

				if (mysqli_error($conn)) {
					echo 0;
				} else {
					echo json_encode($arr);
				}
			} else {
				echo 0;
			}

		endif;

		if (isset($_POST['new_comment'])) {
			$new_comment = $_POST['new_comment'];
			$comment_id = $_POST['comment_id'];

			$sql = "UPDATE comments SET comment = '$new_comment' WHERE id = '$comment_id'";
			mysqli_query($conn,$sql);

			echo $new_comment;
		}


		if (isset($_POST['delete_id'])) {
			$comment_id = $_POST['delete_id'];

			$replies = "DELETE FROM reply WHERE comment_id = '$comment_id'";
			mysqli_query($conn,$replies);

			$sql = "DELETE FROM comments WHERE id = '$comment_id'";
			mysqli_query($conn,$sql);

		}
	}
 ?>