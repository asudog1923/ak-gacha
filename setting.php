<?php
header('Content-Type: application/json');
include('core/gacha.php');
$gacha = new Gacha();
$host = dirname(__FILE__);
if(isset($_GET)){
    if($_GET['action'] == 'debug'){
        if($_POST['data'] == 'enable'){
            $gacha->chparam('debug', TRUE);
        }elseif($_POST['data'] == 'disable'){
            $gacha->chparam('debug', FALSE);
        }
    }
    if($_GET['action'] == 'banner'){
        if(!empty($_POST['data'])) $gacha->chparam('banner', $_POST['data']);
        $_POST['act'] = 'fetch';
        if($_POST['act'] == 'fetch'){
            $get = file_get_contents($host.'/json/banner.json');
            $data = json_decode($get, TRUE);
            $store = [];
            foreach($data as $key => $val){
                $store[] = $key;
            }
            echo json_encode($store);
        }
    }
    if($_GET['action'] == 'reset'){
        $reset = $gacha->reset();
        if(is_array($reset)){
            echo json_encode($reset);
        }
    }
}