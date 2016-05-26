<?php

require 'inc/db.php';
//print_r($_GET);
if(!empty($_GET['stu_id'])){
	$studentID = $_GET['stu_id'];

	$sql = '
			SELECT *, stu_birthdate
			FROM student
			LEFT OUTER JOIN country ON country.cou_id = student.cou_id
			LEFT OUTER JOIN city ON city.cit_id = student.cit_id
			LEFT OUTER JOIN marital_status ON marital_status.mar_id = student.mar_id
			WHERE stu_id = :studentID
	';
	$pdoStatement = $pdo->prepare($sql);
	// je donne la valeur au paramètre de requete
	$pdoStatement->bindValue(':studentID',$studentID, PDO::PARAM_INT);

	// Si erreur
	if ($pdoStatement ->execute()===false) {
		print_r($pdo->errorInfo());
	}
	else if ($pdoStatement->rowCount() > 0) {
		$studentInfo = $pdoStatement->fetchAll();
	}
}

//Inclus automatiquement tous les packages de Composer
require_once __DIR__.'/vendor/autoload.php';

use Whatsma\ZodiacSign;

$calculator = new ZodiacSign\Calculator();

$maDateFromDb = $studentInfo[0]['stu_birthdate'];
$jour = intval(substr($maDateFromDb, 8, 2));
$mois = intval(substr($maDateFromDb, 5, 2));

//echo $jour.'<br/>';
//echo $mois.'<br/>';

try {
  $zodiacSign = $calculator->calculate($jour,$mois);
 // echo $zodiacSign . "\n";
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
//echo $zodiacfr[$zodiacSign].'<br/>';

require 'inc/header.php';
require 'inc/student_view.php';
require 'inc/footer.php';