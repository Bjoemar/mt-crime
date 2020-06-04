<?php 
	
	$contentID = [];


	require 'connection.php';


	if(isset($_POST['contentID'])):

		array_push($contentID, $_POST['contentID']);

		for ($i = 0; $i < count($contentID[0]); $i++) { 
			$id = $contentID[0][$i];
			echo $id;
			$sql = "SELECT image , thumbnail FROM web_content WHERE id = '$id'";
			$res = mysqli_query($conn,$sql);

			$result = mysqli_Fetch_assoc($res);

			if ($result['image']) {
				unlink('../'.$result['image']);
			}

			if ($result['thumbnail']) {
				unlink('../'.$result['thumbnail']);
			}

			$commentDELETE = "DELETE FROM comments WHERE type_id = '$id'";
			mysqli_query($conn,$commentDELETE);

			$replyDELETE = "DELETE FROM reply WHERE type_id = '$id'";
			mysqli_query($conn,$replyDELETE);

			$contentDELETE = "DELETE FROM web_content WHERE id = '$id'";
			mysqli_query($conn,$contentDELETE);

			$summernoteImage = "SELECT image from  summernoteImage WHERE type_id = '$id'";

			$summernoteRES = mysqli_query($conn,$summernoteImage);

			while ($row = mysqli_fetch_assoc($summernoteRES)):
				unlink('../'.$row['image']);
			endwhile;

			echo "done";
		}

	else:

		$id = $_POST['IDcontent'];
		$sql = "SELECT image , thumbnail FROM web_content WHERE id = '$id'";
		$res = mysqli_query($conn,$sql);

		$result = mysqli_Fetch_assoc($res);

		if ($result['image']) {
			unlink('../'.$result['image']);
		}

		if ($result['thumbnail']) {
			unlink('../'.$result['thumbnail']);
		}

		$commentDELETE = "DELETE FROM comments WHERE type_id = '$id'";
		mysqli_query($conn,$commentDELETE);

		$replyDELETE = "DELETE FROM reply WHERE type_id = '$id'";
		mysqli_query($conn,$replyDELETE);

		$contentDELETE = "DELETE FROM web_content WHERE id = '$id'";
		mysqli_query($conn,$contentDELETE);

		$summernoteImage = "SELECT image from  summernoteImage WHERE type_id = '$id'";

		$summernoteRES = mysqli_query($conn,$summernoteImage);

		while ($row = mysqli_fetch_assoc($summernoteRES)):
			unlink('../'.$row['image']);
		endwhile;

		echo "done";

	endif;	
	



	
 ?>