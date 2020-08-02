<?php
error_reporting(0);
ob_start('ob_gzhandler');
Class Gacha{

//Operators data was fetch from https://github.com/Aceship/AN-EN-Tags
public static $ops = [ "6s" => [ "siege" => [ "siege", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Siege.png"],
								 "shining" => [ "shining", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Shining.png"],
								 "chen" => [ "chen", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Ch'en.png"],
								 "silverash" => [ "silverash", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/SilverAsh.png"],
								 "hoshiguma" => [ "hoshiguma", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Hoshiguma.png"],
								 "hellagur" => [ "hellagur", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/avatars/char_188_helage.png"],
								 "mostima" => [ "mostima", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/avatars/char_213_mostma.png"],
								 "blaze" => [ "blaze", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/avatars/char_017_huang.png"],
								 "ifrit" => [ "ifrit", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Ifrit.png"],
								 "eyjafjalla" => [ "eyjafjalla", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/avatars/char_180_amgoat.png"],
								 "exusiai" => [ "exusiai", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Exusiai.png"],
								 "saria" => [ "saria", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Saria.png"],
								 "skadi" => [ "skadi", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Skadi.png"],
								 "nightingale" => [ "nightingale", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Nightingale.png"],
								 "magallan" => [ "magallan", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/avatars/char_248_mgllan.png"],
								 "schwarz" => [ "schwarz", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/avatars/char_340_shwaz.png"],
								 "angelina" => [ "angelina", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/avatars/char_291_aglina.png"],
								],
					   "5s" => [ "lappland" => [ "lappland", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/avatars/char_140_whitew.png"],
								 "texas" => [ "texas", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Texas.png"],
								 "ptilopsis" => [ "ptilopsis", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Ptilopsis.png"],
								 "warfarin" => [ "warfarin", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Warfarin.png"],
								 "zima" => [ "zima", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/avatars/char_115_headbr.png"],
								 "nearl" => [ "nearl", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Nearl.png"],
								 "silence" => [ "silence", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Silence.png"],
								 "broca" => [ "broca", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/avatars/char_356_broca.png"],
								 "reed" => [ "reed", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/avatars/char_261_sddrag.png"],
								 "nightmare" => [ "nightmare", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Nightmare.png"],
								 "skyfire" => [ "skyfire", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/avatars/char_166_skfire.png"],
								 "projektred" => [ "projektred", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/avatars/char_144_red.png"],
								 "manticore" => [ "manticore", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Manticore.png"],
								 "cliffheart" => [ "cliffheart", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Cliffheart.png"],
								 "provence" => [ "provence", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Provence.png"],
								 "feater" => [ "feater", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/avatars/char_241_panda.png"],
								 "bluepoison" => [ "bluepoison", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/avatars/char_129_bluep.png"],
								 "firewatch" => [ "firewatch", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Firewatch.png"],
								 "meteorite" => [ "meteorite", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Meteorite.png"],
								 "platinum" => [ "platinum", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Platinum.png"],
								 "pramanix" => [ "pramanix", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Pramanix.png"],
								 "istina" => [ "istina", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/avatars/char_195_glassb.png"],
								 "mayer" => [ "mayer", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Mayer.png"],
								 "sora" => [ "sora", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/avatars/char_101_sora.png"],
								 "franka" => [ "franka", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/avatars/char_106_franka.png"],
								 "specter" => [ "specter", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Specter.png"],
								 "liskarm" => [ "liskarm", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Liskarm.png"],
								 "croissant" => [ "croissant", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Croissant.png"],
								 "swire" => [ "swire", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Swire.png"],
								 "glaucus" => [ "glaucus", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/avatars/char_326_glacus.png"],
								 "greythroat" => [ "greythroat", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/avatars/char_367_swllow.png"],
								 "waaifu" => [ "waaifu", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/avatars/char_243_waaifu.png"],
								 "executor" => [ "executor", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/avatars/char_279_excu.png"],
								 "astesia" => [ "astesia", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/avatars/char_274_astesi.png"],
								],
					   "4s" => [ "gavial" => [ "gavial", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/avatars/char_187_ccheal.png"],
								 "perfumer" => [ "perfumer", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Perfumer.png"],
								 "scavanger" => [ "scavanger", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/avatars/char_149_scave.png"],
								 "vigna" => [ "vigna", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Vigna.png"],
								 "myrrh" => [ "myrrh", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Myrrh.png"],
								 "haze" => [ "haze", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Haze.png"],
								 "gitano" => [ "gitano", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Gitano.png"],
								 "rope" => [ "rope", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Rope.png"],
								 "gravel" => [ "gravel", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Gravel.png"],
								 "shaw" => [ "shaw", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Shaw.png"],
								 "shirayuki" => [ "shirayuki", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/avatars/char_118_yuki.png"],
								 "meteor" => [ "meteor", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Meteor.png"],
								 "jessica" => [ "jessica", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Jessica.png"],
								 "deepcolor" => [ "deepcolor", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/avatars/char_110_deepcl.png"],
								 "earthspirit" => [ "earthspirit", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Earthspirit.png"],
								 "dobbermann" => [ "dobbermann", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/avatars/char_130_doberm.png"],
								 "estelle" => [ "estelle", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Estelle.png"],
								 "beehunter" => [ "beehunter", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Beehunter.png"],
								 "frostleaf" => [ "frostleaf", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Frostleaf.png"],
								 "mousse" => [ "mousse", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Mousse.png"],
								 "matoimaru" => [ "matoimaru", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Matoimaru.png"],
								 "cuora" => [ "cuora", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Cuora.png"],
								 "gummy" => [ "gummy", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/avatars/char_196_sunbr.png"],
								 "matterhorn" => [ "matterhorn", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Matterhorn.png"],
								 "greyy" => [ "grey", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Greyy.png"],
								 "sussurro" => [ "sussurro", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/avatars/char_298_susuro.png"],
								 "myrtle" => [ "myrtle", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/avatars/char_151_myrtle.png"],
								 "vermeil" => [ "vermeil", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/avatars/char_190_clour.png"],
								 "may" => [ "may", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/avatars/char_133_mm.png"],
								 "ambriel" => [ "ambriel", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/avatars/char_302_glaze.png"],
								],
					   "3s" => [ "ansel" => [ "ansel", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Ansel.png"],
								 "midnight" => [ "midnight", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Midnight.png"],
								 "fang" => [ "fang", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Fang.png"],
								 "vanilla" => [ "vanilla", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Vanilla.png"],
								 "plume" => [ "plum", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/avatars/char_192_falco.png"],
								 "hibiscus" => [ "hibiscus", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Hibiscus.png"],
								 "catapult" => [ "catapult", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Catapult.png"],
								 "adnachiel" => [ "adnachiel", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Adnachiel.png"],
								 "lava" => [ "lava", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Lava.png"],
								 "steward" => [ "steward", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Steward.png"],
								 "kroos" => [ "kroos", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Kroos.png"],
								 "orchid" => [ "orchid", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Orchid.png"],
								 "melantha" => [ "melantha", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Melantha.png"],
								 "beagle" => [ "beagle", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Beagle.png"],
								 "cardigan" => [ "cardigan", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/avatars/char_209_ardign.png"],
								 "popukar" => [ "popukar", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Popukar.png"],
								 "spot" => [ "spot", "https://github.com/Aceship/AN-EN-Tags/raw/master/img/chara/Spot.png"],
								],
						];

//Standard rate						
public static $rate = [ "6s" => 0.02,
						"5s" => 0.08,
						"4s" => 0.50,
						"3s" => 0.40
						];

//Banner list, not ready yet				
public static $rateup = [ "earthborn metal" => [ "6s" => [ "nian" => 0.35,
														   "aak" => 0.35
														  ],
											   "5s" => [ "hung" => 0.5 ],
												 ],
						  "standard pull 15" => [ "6s" => [ "silverash" => 0.25,
															"chen" => 0.25
														   ],
											     "5s" => [ "liskarm" => 0.16,
														   "swire" => 0.16,
														   "astesia" => 0.16
														   ],
												 ],
						 ];
						
				  
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
?>
<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="../assets/jquery.min.js"></script>
<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
<script type="text/javascript" src="../assets/bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../assets/style.css">
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