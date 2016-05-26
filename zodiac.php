<?php

//Inclus automatiquement tous les packages de Composer
require_once __DIR__.'/vendor/autoload.php';

use Whatsma\ZodiacSign;

$calculator = new ZodiacSign\Calculator();

try {
  $zodiacSign = $calculator->calculate(29,5);
  echo $zodiacSign . "\n";
} catch (ZodiacSign\InvalidDayException $e) {
  echo "ERROR: Invalid Day";
} catch (ZodiacSign\InvalidMonthException $e) {
  echo "ERROR: Invalid Month";
}
//facon1
$zodiacfr = array(
	"aries"=>"bélier",
	"taurus"=>"taureau",
	"gemini"=>"gémeaux",
	"cancer"=>"cancer",
	"leo"=>"lion",
	"virgo"=>"vierge",
	"libra"=>"balance",
	"scorpio"=>"scorpion",
	"sagittarius"=>"sagittaire",
	"capricorn"=>"capricorne",
	"aquarius"=>"verseau",
	"pisces"=>"poissons"
	);
echo $zodiacfr[$zodiacSign].'<br/>';

/*façon 2
switch($zodiacSign){
	case 'aries':
		$zodiacfr='bélier';
		break;
	case 'taurus':
		$zodiacfr='taureau';
		break;
	case 'gemini':
		$zodiacfr='gémeaux';
		break;
	case 'cancer':
		$zodiacfr='cancer';
		break;
	case 'leo':
		$zodiacfr='lion';
		break;
	case 'virgo':
		$zodiacfr='vierge';
		break;
	case 'libra':
		$zodiacfr='balance';
		break;
	case 'scorpio':
		$zodiacfr='scorpion';
		break;
	case 'sagittarius':
		$zodiacfr='sagittaire';
		break;
	case 'capricorn':
		$zodiacfr='capricorne';
		break;
	case 'aquarius':
		$zodiacfr='verseau';
		break;
	case 'pisces':
		$zodiacfr='poissons';
		break; 

}*/
