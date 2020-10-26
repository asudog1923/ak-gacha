<?php
header('Content-Type: application/json');
include('core/gacha.php');
$gacha = new Gacha();
if(isset($_GET)){
    if($_GET['action'] == 'debug'){
        if($_POST['data'] == 'enable'){
            $gacha->chparam('debug', TRUE);
        }elseif($_POST['data'] == 'disable'){
            $gacha->chparam('debug', FALSE);
        }
    }
    if($_GET['action'] == 'banner'){
        $gacha->chparam('banner', $_POST['data']);
    }
    if($_GET['action'] == 'reset'){
        $reset = $gacha->reset();
        if(is_array($reset)){
            echo json_encode($reset);
        }
    }
}