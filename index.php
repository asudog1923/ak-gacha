<?php session_start(); ob_start('ob_gzhandler'); ?>
<!DOCTYPE html>
<html>
	<head>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
		<link rel="stylesheet" href="assets/style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
	<div class="container-fullwidth" id="zaWarappa">
		<!-- Banner -->
		<div id="Banner">
			<img src="assets/img/banner/dummy.png" class="banner img-fluid">
			<a href="roll.php?roll=10" class="gacha-x10 float-right">Headhunt x10</a>
			<a href="roll.php?roll=1" class="gacha-x1 float-right">Headhunt x1</a>
		</div>
	<section id="Summary" class="text-center">
			<p class="mt-5">Current Pity Rate : <?php echo $_SESSION['pity'] * 100 ?>%</p>
			<p class="mt-2">Current Total Pull : <?php echo $_SESSION['pull'] ?></p>
		<?php
			if(!is_null($_SESSION['last_pity']) && !is_null($_SESSION['last_pull'])){
				echo "You got 6* operator in <strong>".$_SESSION['last_pull']."</strong> pulls with <strong>".$_SESSION['last_pity'] * 100 ."%</strong> pity rate.";
				$_SESSION['last_pull'] = NULL;
				$_SESSION['last_pity'] = NULL;
            }
		?>
	</section>
	<script type="text/javascript">
		$(document).ready(function(){
			$('img').attr('draggable', 'false');
		});
	</script>
	</div>
	<div id="zaBulokku">
		<p>Minimum device width is 600 pixels and landscape view on mobile in order to give you the best experince, well yea the ui still suck tho...lol.</p>
	</div>
	<footer>
		Find me on <a href="https://github.com/ookamiiixd/ak-gacha" target="_blank">github</a>.
	</footer>
</body>
</html>
