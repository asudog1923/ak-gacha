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
    <title>Arknights Gacha Simulator</title>
    <script type="text/javascript">
        var banner = "<?php echo $_SESSION['banner-name'] ?>";
        var debug = "<?php echo $_SESSION['debug'] == 1 ? 'enable' : 'disable' ?>";
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
                    <a class="navbar-brand" href="index.php">Arknights Gacha Simulator</a>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="https://github.com/ookamiiixd/ak-gacha" target="_blank" data-toggle="tooltip" title="Github repository"><i class="fab fa-github mr-1"></i>Github</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://demo.teamxproject.online/akgacha/about.html" data-toggle="tooltip" title="About this project"><i class="fas fa-info-circle mr-1"></i>About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://demo.teamxproject.online/akgacha/contact.html" data-toggle="tooltip" title="Found a bug? report now"><i class="fas fa-bug mr-1"></i>Report bug</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <div id="debug-wrap" class="form-inline" data-toggle="tooltip"  title="By enabling debug mode, the gacha result will be detailed explained">
                                <span id="debug-label" class="mr-2">Debug Mode</span>
                                <input type="checkbox" class="form-control" id="debug-mode">
                            </div>
                        </li>
                    </ul>
                </nav>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-4 col-md-3 col-lg-2 mt-2">Select Banner</div>
                        <select id="banner-select" class="col-sm-8 col-md-9 col-lg-10 form-control">
                            <option value="newbie_banner">Newbie Banner</option>
                            <option value="standard_pool_21_en">Standard Pool 21 (EN) [LIVE]</option>
                        </select>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-1 border-top" id="banner-wrapper">
                    <div class="banner">
                        <img src="assets/img/cloader.gif" id="bloader">
                        <img src="assets/img/banner/newbie_banner.jpeg" id="banner" class="img-fluid mt-1">
                        <div class="roll float-right">
                            <a class="roll1x" href="roll.php?roll=1">Headhunt 1x</a>
                            <a class="roll10x" href="roll.php?roll=10">Headhunt 10x</a>
                        </div>
                    </div>
                </div>
                <div class="summary">
                    <a class="btn btn-dark mb-1" id="summary-toggle" href="#">Summary<i class="fas fa-caret-down ml-2"></i></a>
                    <a class="btn btn-dark mb-1" id="debug-toggle" href="#">Debug Output<i class="fas fa-caret-down ml-2"></i></a>
                    <a class="btn btn-primary mb-1" id="reset" href="#">Reset<i class="fas fa-power-off ml-2"></i></a>
                    <div id="summary" class="result">
                        <h5 class="mb-2">Summary</h5>
                        <div class="row">
                            <div class="col-sm-4">Current Pity Rate :</div>
                            <div class="col-sm-8"><?php echo $_SESSION['pity'] * 100 ?>%</div>
                            <div class="col-sm-4">Current Total Pull :</div>
                            <div class="col-sm-8"><?php echo $_SESSION['pull'] ?> pulls</div>
                            <div class="text-center col-sm-12 mt-4">
                            <?php
                                if(!is_null($_SESSION['last_pity']) && !is_null($_SESSION['last_pull'])){
                                    echo "You got 6* operator in <strong>".$_SESSION['last_pull']."</strong> pulls with <strong>".$_SESSION['last_pity'] * 100 ."%</strong> pity rate.";
                                    $_SESSION['last_pull'] = NULL;
                                    $_SESSION['last_pity'] = NULL;
                                }
                            ?>
                            </div>
                        </div>
                    </div>
                    <div id="debug" class="result">
                        <h5 class="mb-2" id="debug-title">Disabled</h5>
                        <?php if($_SESSION['debug'] == 1) $gacha->sdebug($_SESSION['debug-data']) ?>
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