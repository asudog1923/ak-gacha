<?php include('core/gacha.php'); ?>
<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="assets/jquery.min.js"></script>
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="assets/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
<div class="container-fullwidth">
<div id="widthChecker">
<img src="https://www.pinclipart.com/picdir/big/210-2104646_please-rotate-your-device-clipart.png" class="width-check img-fluid mx-auto" width="90px"></img>
<span class="width-check text-center">Small device detected.</span>
<span class="width-check text-center">Please switch your orientation to landscape to view the page.</span>
<span class="width-check text-center">This page require atleast 850pixels of width to work perfectly.</span>
</div>
<div class="imgg-container text-center">
<?php
if($_GET['roll'] == "1"){
Gacha::singlePull();
}elseif($_GET['roll'] == "10"){
Gacha::tenPull();
}
?>
<script>
var baseUrl = window.location.href.split("?")[0];
window.history.pushState('name', '', baseUrl);
</script>
</div>
<hr>
<div class="text-center">
<a href="?roll=1" class="btn btn-primary">1x Roll</a>&nbsp;<a href="?roll=10" class="btn btn-primary">10x Roll</a>
</div>
</div>
</body>
</html>
