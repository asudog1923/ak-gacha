<?php

Class Gacha{
	
	public $rareconv = [	
		"6s" => "six-stars",
		"5s" => "five-stars", 
		"4s" => "four-stars",
		"3s" => "three-stars"
	];

	public $raretconv = [
		"6s" => "6 Stars (&#9733;&#9733;&#9733;&#9733;&#9733;&#9733;)",
		"5s" => "5 Stars (&#9733;&#9733;&#9733;&#9733;&#9733;)",
		"4s" => "4 Stars (&#9733;&#9733;&#9733;&#9733;)",
		"3s" => "3 Stars (&#9733;&#9733;&#9733;)",
	];

	public $ops, $banner = 'newbie_banner', $debug = FALSE;

	//prepare parameter
	public function __construct(){
		$host = dirname(dirname(__FILE__));
		if(!isset($_SESSION)){
			session_start();
		}
		if(!isset($_SESSION['pity']) && !isset($_SESSION['pull'])){
			$_SESSION['pity'] = 0.02;
			$_SESSION['pull'] = 0;
		}
		if(!isset($_SESSION['last_pull']) && !isset($_SESSION['last_pity'])){
			$_SESSION['last_pull'] = NULL;
			$_SESSION['last_pity'] = NULL;
		}
		if(!isset($_SESSION['rate'])){
			$get = file_get_contents($host.'/json/rate.json');
			$_SESSION['rate'] = json_decode($get, TRUE);
		}
		if(!isset($_SESSION['debug'])) $_SESSION['debug'] = $this->debug;
		if(!isset($_SESSION['banner-name'])) $_SESSION['banner-name'] = $this->banner;
		if(!isset($_SESSION['banner'])){
			$get = file_get_contents($host.'/json/banner.json');
			$prep = json_decode($get, TRUE);
			$_SESSION['banner'] = $prep[$this->banner];
		}
		$get = file_get_contents($host.'/json/operator.json');
		$this->ops = json_decode($get, TRUE);
	}
	
	//function gacha
	public function doGacha(){
		$rand = (float)rand()/(float)getrandmax();
		$rand2 = (float)rand()/(float)getrandmax();
		if($_SESSION['pull'] > 48){
			$compare = $_SESSION['pull'] - 48;
			$inc = 0.02;
			$_SESSION['pity'] = $compare * $inc;
			if($_SESSION['pity'] > 0.02){
				$_SESSION['rate']['6s'] = $_SESSION['pity'];
			}
		}
		foreach($_SESSION['rate'] as $rarity => $percentage){
			$result = [];
			if($rand < $percentage){
				if($rarity == "6s"){
					$_SESSION['last_pull'] = $_SESSION['pull'];
					$_SESSION['last_pity'] = $_SESSION['pity'];
					$_SESSION['pity'] = 0.02;
					$_SESSION['pull'] = 0;
					$_SESSION['rate']['6s'] = 0.02;
					foreach($_SESSION['banner']['6s'][0] as $key => $val){
						if($rand2 < $val){
							if($key == 'normal'){
								$r = array_rand($this->ops['6s']);
								$res = $this->ops['6s'][$r];
								$res['featured'] = FALSE;
							}elseif($key == 'featured'){
								$r = array_combine($_SESSION['banner']['6s'][1], $_SESSION['banner']['6s'][1]);
								$re = array_rand($r);
								$res = $this->ops['6s'][$re];
								$res['featured'] = TRUE;
							}
							$result = $res;
							break;
						}
						$rand2 -= $val;
					}
				}
				elseif($rarity == "5s"){
					foreach($_SESSION['banner']['5s'][0] as $key => $val){
						if($rand2 < $val){
							if($key == 'normal'){
								$r = array_rand($this->ops['5s']);
								$res = $this->ops['5s'][$r];
								$res['featured'] = FALSE;
							}elseif($key == 'featured'){
								$r = array_combine($_SESSION['banner']['5s'][1], $_SESSION['banner']['5s'][1]);
								$re = array_rand($r);
								$res = $this->ops['5s'][$re];
								$res['featured'] = TRUE;
							}
							$result = $res;
							break;
						}
						$rand2 -= $val;
					}
				}
				elseif($rarity == "4s"){
					foreach($_SESSION['banner']['4s'][0] as $key => $val){
						if($rand2 < $val){
							if($key == 'normal'){
								$r = array_rand($this->ops['4s']);
								$res = $this->ops['4s'][$r];
								$res['featured'] = FALSE;
							}elseif($key == 'featured'){
								$r = array_combine($_SESSION['banner']['4s'][1], $_SESSION['banner']['4s'][1]);
								$re = array_rand($r);
								$res = $this->ops['4s'][$re];
								$res['featured'] = TRUE;
							}
							$result = $res;
							break;
						}
						$rand2 -= $val;
					}
				}
				elseif($rarity == "3s"){
					$key = array_rand($this->ops['3s']);
					$res = $this->ops['3s'][$key];
					$result = $res;
				}
				array_push($result,$rarity);
				break;
			}
			$rand -= $percentage;
		}
		$_SESSION['pull'] = ++$_SESSION['pull'];
		return $result;
	}

	//single pull gacha
	public function singlePull(){
		unset($_SESSION['debug-data']);
		$res = $this->doGacha();
		echo '	<div class="wrap '.$this->rareconv[$res[4]].'">
					<img src="'.$res[2].'" style="display: none;" class="op-load">
					<div class="operator" style="background-position: '.$res[3].';"></div>
					<img src="assets/img/class/'.$res[1].'.png" class="op-class">
				</div>
				'."\n";
		if($_SESSION['debug'] == 1){
			$_SESSION['debug-data'] = $res;
		}
	}
	
	//ten pull gacha
	public function tenPull(){
		unset($_SESSION['debug-data']);
		for($i=1; $i <= 10; $i++){
			$res = $this->doGacha();
			/**
			 * Newbie banner guarantee 1 5 star and 1 6 star,
			 * don't really understand how it works, tell me if you have any suggestion.
			 */
			if($_SESSION['banner-name'] == 'newbie_banner'){
				if($i == 8){
					$_SESSION['rate']['5s'] = 1;
				}else{
					$_SESSION['rate']['5s'] = 0.08;
				}
				if($i == 9){
					$_SESSION['rate']['6s'] = 1;
				}else{
					$_SESSION['rate']['6s'] = 0.02;
				}
			}
			echo '	<div class="wrap '.$this->rareconv[$res[4]].'">
						<img src="'.$res[2].'" style="display: none;" class="op-load">
						<div class="operator" style="background-position: '.$res[3].';"></div>
						<img src="assets/img/class/'.$res[1].'.png" class="op-class">
					</div>
					'."\n";
			if($_SESSION['debug'] == 1){
				$_SESSION['debug-data'][$i] = $res;
			}
		}
	}

	//change parameter data
	public function chparam($var, $data){
		if($var == 'debug'){
			$_SESSION['debug'] = $data;
		}elseif($var == 'banner'){
			$_SESSION['banner-name'] = $data;
			$host = dirname(dirname(__FILE__));
			$get = file_get_contents($host.'/json/banner.json');
			$prep = json_decode($get, TRUE);
			$_SESSION['banner'] = $prep[$data];
		}
	}

	//show debug information
	public function sdebug($data){
		if($_SESSION['debug'] == 1){
			if(count($data) > 5){
				$i = 1;
				foreach($data as $key){
					echo '	<span class="mt-1">Result #'.$i.'</span>
							<div class="row">
								<div class="col-sm-5">Operator Name :</div>
								<div class="col-sm-6">'.ucwords($key[0]).(isset($key['featured']) && $key['featured'] == 1 ? '&nbsp;(Featured)': '').'</div>
								<div class="col-sm-5">Operator Rarity :</div>
								<div class="col-sm-6">'.$this->raretconv[$key[4]].'</div>
								<div class="col-sm-5">Operator Class :</div>
								<div class="col-sm-6">'.ucwords($key[1]).'</div>
								<div class="col-sm-5">Operator Image Path :</div>
								<div class="col-sm-6">'.$key[2].'</div>
							</div>
							';
					$i++;
				}
			}else{
				echo '	<span>Result #1</span>
						<div class="row">
							<div class="col-sm-5">Operator Name :</div>
							<div class="col-sm-6">'.ucwords($data[0]).(isset($data['featured']) && $data['featured'] == 1 ? '&nbsp;(Featured)': '').'</div>
							<div class="col-sm-5">Operator Rarity :</div>
							<div class="col-sm-6">'.$this->raretconv[$data[4]].'</div>
							<div class="col-sm-5">Operator Class :</div>
							<div class="col-sm-6">'.ucwords($data[1]).'</div>
							<div class="col-sm-5">Operator Image Path :</div>
							<div class="col-sm-6">'.$data[2].'</div>
						</div>
						';
			}
		}
	}

	//reset data
	public function reset(){
		unset($_SESSION);
		session_destroy();
		return ['message' => 'redirect'];
	}
}