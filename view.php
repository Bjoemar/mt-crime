<?php require_once 'template.php'; ?>

<?php function getTItle(){
	echo "Mt-Crime";
} ?>

<?php function getContent(){ ?>
	
	<div class="container">
		<?php
			if (isset($_GET['type'])):
			 	$valid_page = false;
			 	$type = $_GET['type'];

			 	$type_arr = [
					array(
			 			'name' => 'MtCrimeNotice',
			 			'restriction' => 1,
			 			'view' => 0,
			 		),
			 		array(
			 			'name' => 'MtCrimeNotice',
			 			'restriction' => 1,
			 			'view' => 0,
			 		),
			 		array(
			 			'name' => 'MtCrimeSiteRecommendation',
			 			'restriction' => 1,
			 			'view' => 1,
			 		),
			 		array(
			 			'name' => 'MtCrimeNewWebsite',
			 			'restriction' => 1,
			 			'view' => 1,
			 		),
			 		array(
			 			'name' => 'MtCrimeSiteList',
			 			'restriction' => 1,
			 			'view' => 1,
			 		),
			 		array(
			 			'name' => 'MtCrimeFree',
			 			'restriction' => 0,
			 			'view' => 0,
			 		),
			 		array(
			 			'name' => 'MtCrimeGag',
			 			'restriction' => 0,
			 			'view' => 0,
			 		),
			 		// array(
			 		// 	'name' => 'MtCrimeEyeCleansing',
			 		// 	'restriction' => 1,
			 		// 	'view' => 1,
			 		// ),
			 		// array(
			 		// 	'name' => 'MtCrimeExperience',
			 		// 	'restriction' => 0,
			 		// 	'view' => 0,
			 		// ),
			 		// array(
			 		// 	'name' => 'MtCrimeSavvy',
			 		// 	'restriction' => 0,
			 		// 	'view' => 0,
			 		// ),
			 		array(
			 			'name' => 'MtCrimeHotStories',
			 			'restriction' => 0,
			 			'view' => 0,
			 		),
			 	];

			 	for ($i=0; $i < count($type_arr); $i++):

			 		if ($type === $type_arr[$i]['name']):

			 			$valid_page = true;

			 			require_once 'partials/table.php';

			 			getQuery($type_arr[$i]);

			 			break;
			 		endif;

			 	endfor;

			 	if (!$valid_page):
			 		require_once '404.php';
			 	endif;

			else:

				require_once '404.php';

			endif;
		?>

	</div>


	<script type="text/javascript">
		
		window.scrollTo(0,550);


	</script>
<?php } ?>
