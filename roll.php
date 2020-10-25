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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="assets/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Simple Arknights Gacha Simulator</title>
    <script type="text/javascript">
    var single = "<?php if($_GET['roll'] == '1') echo 'true'; ?>";
    </script>
</head>

<body>
    <div class="loader">
        <div class="d-flex justify-content-center">
            <img src="assets/img/loader.gif">
        </div>
    </div>
    <div class="block">
        <div class="text-center">
            <p>Small device detected, the page require device with atleast 600 pixels screen width and landscape view in
                mobile device to ensure you get best perfomance.</p>
            <p>But even so, 600 pixels is not enough thought, reccommended screen width is atleast 768 pixels.</p>
        </div>
    </div>
    <main>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <nav class="navbar navbar-expand navbar-dark bg-dark mb-1">
                    <a class="navbar-brand" href="#">Arknights Gacha Simulator</a>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="https://github.com/ookamiiixd/ak-gacha" target="_blank" data-toggle="tooltip" title="Github repository"><i class="fab fa-github mr-1"></i>Github</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#" data-toggle="tooltip" title="About this project"><i class="fas fa-info-circle mr-1"></i>About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#" data-toggle="tooltip" title="Found a bug? report now"><i class="fas fa-bug mr-1"></i>Report bug</a>
                        </li>
                    </ul>
                </nav>
                <div id="result">
                <?php
                    if($_GET['roll'] == "1"){
                        $gacha->singlePull();
                    }elseif($_GET['roll'] == "10"){
                        $gacha->tenPull();
                    }
                ?>
                </div>
                <div class="bag-bg container-fluid d-flex justify-content-center" id="bag">
                    <div id="bag-container">
                        <img src="assets/img/bag_top.png" class="bag img-fluid">
                        <input type="range" min="1" max="100" value="100" id="bar">
                        <img src="assets/img/bag_bottom.png" class="bag img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        Find me on <a href="https://github.com/ookamiiixd" target="_blank">github</a>.
    </footer>
    <script type="text/javascript" src="assets/main.js"></script>
</body>

</html>