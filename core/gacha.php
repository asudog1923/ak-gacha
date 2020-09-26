<?php

Class Gacha{
	
	public $rareconv = [	
							"6s" => "six-stars",
		 					"5s" => "five-stars", 
							"4s" => "four-stars",
							"3s" => "three-stars"
						];
	public $ops;

	public function __construct(){
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
			$host = dirname(dirname(__FILE__));
			$get = file_get_contents($host.'/json/rate.json');
			$_SESSION['rate'] = json_decode($get, TRUE);
		}
		$host = $host = dirname(dirname(__FILE__));
		$get = file_get_contents($host.'/json/operator.json');
		$this->ops = json_decode($get, TRUE);
	}
	
	public function doGacha(){
		$rand = (float)rand()/(float)getrandmax();
		if($_SESSION['pull'] > 48){
			$compare = $_SESSION['pull'] - 48;
			$inc = 0.02;
			$_SESSION['pity'] = $compare * $inc;
			if($_SESSION['pity'] > 0.02){
				$_SESSION['rate']['6s'] = $_SESSION['pity'];
			}
		}
		foreach($_SESSION['rate'] as $rarity => $percentage){
			$res = "";
			if($rand < $percentage){
				if($rarity == "6s"){
					$_SESSION['last_pull'] = $_SESSION['pull'];
					$_SESSION['last_pity'] = $_SESSION['pity'];
					$_SESSION['pity'] = 0.02;
					$_SESSION['pull'] = 0;
					$_SESSION['rate']['6s'] = 0.02;
					$key = array_rand($this->ops['6s']);
					$res = $this->ops['6s'][$key];
					}
				if($rarity == "5s"){
					$key = array_rand($this->ops['5s']);
					$res = $this->ops['5s'][$key];
					}
				if($rarity == "4s"){
					$key = array_rand($this->ops['4s']);
					$res = $this->ops['4s'][$key];
					}
				if($rarity == "3s"){
					$key = array_rand($this->ops['3s']);
					$res = $this->ops['3s'][$key];
					}
				$result = $res;
				array_push($result,$rarity);
				break;
			}
		$rand -= $percentage;
		}
	$_SESSION['pull'] = ++$_SESSION['pull'];
	return $result;
	}

	public function singlePull(){
		$res = $this->doGacha();
		echo '	<div class="'.$this->rareconv[$res[3]].'">
					<img src="'.$res[2].'" class="img-fluid op-img" alt="'.$res[0].'">
					<img src="assets/img/class/'.$res[1].'.png" class="op-class">
				</div>
				'."\n";
	}
	
	public function tenPull(){
		$i=1;
		while($i <= 10){
			$res = $this->doGacha();
			echo '	<div class="'.$this->rareconv[$res[3]].'">
						<img src="'.$res[2].'" class="img-fluid op-img" alt="'.$res[0].'">
						<img src="assets/img/class/'.$res[1].'.png" class="op-class">
					</div>
					'."\n";
			$i++;
		}
	}
}