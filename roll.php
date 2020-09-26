<?php
	session_start();
	ob_start('ob_gzhandler');
	include('core/gacha.php');
	$gacha = new Gacha();
?>
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
		<div id="zaWarappa">
		<div class="bag-bg container-fluid d-flex justify-content-center" id="gachaBag">
			<div id="bagContainer">
				<img src="assets/img/bag_top.png" class="bag img-fluid">
				<input type="range" min="1" max="100" value="100" id="gachaBar">
				<img src="assets/img/bag_bottom.png" class="bag img-fluid">
			</div>
		</div>
		<div class="bag-bg container-fluid res-container pb-4" id="gachaResult">
		<?php
			if($_GET['roll'] == "1"){
				$gacha->singlePull();
			}elseif($_GET['roll'] == "10"){
				$gacha->tenPull();
			}
		?>
		</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$('img').attr('draggable', 'false');
			$('#gachaResult').hide();
			$('#gachaBar').change(function(){
				var gachaval = $("#gachaBar").val();
				if(gachaval == "1"){
					$('#gachaBag').hide();
					$('#bagContainer').hide();
					$('#gachaBag').removeClass('bag-bg');
					$('#gachaResult').show();
				}
			});
		$('#gachaResult').click(function(){
		window.location.href = "index.php";
		});
	});	
	</script>
	<section id="Summary" class="text-center">
			<p class="mt-5">Current Pity Rate : <?php echo $_SESSION['pity'] * 100 ?>%</p>
			<p class="mt-2">Current Total Pull : <?php echo $_SESSION['pull'] ?></p>
		<?php
			if(!is_null($_SESSION['last_pity']) && !is_null($_SESSION['last_pull'])){
				echo "You got 6* operator in <strong>".++$_SESSION['last_pull']."</strong> pulls with <strong>".$_SESSION['last_pity'] * 100 ."%</strong> pity rate.";
            }
		?>
	</section>
	</div>
	<div id="zaBulokku">
		<p>Minimum device width is 600 pixels and landscape view on mobile in order to give you the best experince, well yea the ui still suck tho...lol.</p>
	</div>
	<footer>
		Find me on <a href="https://github.com/ookamiiixd/ak-gacha" target="_blank">github</a>.
	</footer>
	</body>
</html>
