<?php session_start(); ob_start('ob_gzhandler'); ?>
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
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-4 col-md-3 col-lg-2 mt-2">Select Banner</div>
                        <select id="banner-select" class="col-sm-8 col-md-9 col-lg-10 form-control" disabled>
                            <option value="newbie_banner">Not ready yet</option>
                        </select>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-1 border-top" id="banner-wrapper">
                    <div class="banner">
                        <img src="assets/img/cloader.gif" id="bloader">
                        <img src="assets/img/banner/standard_pool_21_en.jpeg" id="banner" class="img-fluid mt-1">
                        <div class="roll float-right">
                            <a class="roll1x" href="roll.php?roll=1">Headhunt 1x</a>
                            <a class="roll10x" href="roll.php?roll=10">Headhunt 10x</a>
                        </div>
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