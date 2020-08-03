<?php

require_once('data.php');

Class Gacha extends Data{
										
	public static function doGacha(){
		$rand = (float)rand()/(float)getrandmax();
		foreach(self::$rate as $rarity => $percentage){
			if($rand < $percentage){
				if($rarity == "6s"){
					$key = array_rand(self::$ops['6s']);
					$rarity = self::$ops['6s'][$key];
					}
				if($rarity == "5s"){
					$key = array_rand(self::$ops['5s']);
					$rarity = self::$ops['5s'][$key];
					}
				if($rarity == "4s"){
					$key = array_rand(self::$ops['4s']);
					$rarity = self::$ops['4s'][$key];
					}
				if($rarity == "3s"){
					$key = array_rand(self::$ops['3s']);
					$rarity = self::$ops['3s'][$key];
					}
				$result = $rarity;
				break;
			}
		$rand -= $percentage;
		}
	return $result;
	}

	public static function singlePull(){
		$res = self::doGacha();
		echo '<img src="'.$res[1].'" class="img-fluid imgg" alt="'.$res[0].'"></img>'."\n";
	}
	
	public static function tenPull(){
		$i=1;
		while($i <= 10){
			$res = self::doGacha();
			echo '<img src="'.$res[1].'" class="img-fluid imgg" alt="'.$res[0].'"></img>'."\n";
			$i++;
		}
	}
	
}
