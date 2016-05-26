<?php

require 'inc/db.php';

$errorList = array();
// Si le formulaire a été soumis
if (!empty($_POST)) {
	// Je récupère tous les champs du formulaires
	
	$name = isset($_POST['studentName']) ? $_POST['studentName'] : '';
	$firstname = isset($_POST['studentFirstname']) ? $_POST['studentFirstname'] : '';
	$email = isset($_POST['studentEmail']) ? $_POST['studentEmail'] : '';
	$birthdate = isset($_POST['studentBirhtdate']) ? $_POST['studentBirhtdate'] : '';
	$citID = isset($_POST['cit_id']) ? intval($_POST['cit_id']) : 0;
	$couID = isset($_POST['cou_id']) ? intval($_POST['cou_id']) : 0;
	$marID = isset($_POST['mar_id']) ? intval($_POST['mar_id']) : 0;
	$sesID = isset($_POST['session_id']) ? intval($_POST['session_id']) : 0;
	$sexe = isset($_POST['stu_sex']) ? intval($_POST['stu_sex']) : 0;

	if (empty($name)) {
		$errorList[] = 'Le nom est vide';
	}
	if (empty($firstname)) {
		$errorList[] = 'Le prénom est vide';
	}
	if (empty($email)) {
		$errorList[] = 'L\'email est vide';
	}
	else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
		$errorList[] = 'L\'email est incorrect';
	}
	if (empty($birthdate)) {
		$errorList[] = 'La date de naissance est vide';
	}
	if (empty($citID)) {
		$errorList[] = 'La ville est manquante';
	}
	if (empty($couID)) {
		$errorList[] = 'La nationalité est manquante';
	}

	if (empty($errorList)) {
		$sqlIns='
			INSERT INTO student(mar_id,cit_id,cou_id,ses_id,stu_name,stu_firstname,stu_birthdate,stu_email,stu_sex)
			VALUES (:marID,:citID,:couID,:sesID,:name,:firstname,:birthdate,:email,:sexe)
		';
		
		$pdoStatement = $pdo->prepare($sqlIns);
		$pdoStatement->bindValue(':marID',$marID, PDO::PARAM_INT);
		$pdoStatement->bindValue(':citID',$citID, PDO::PARAM_INT);
		$pdoStatement->bindValue(':couID',$couID, PDO::PARAM_INT);
		$pdoStatement->bindValue(':sesID',$marID, PDO::PARAM_INT);
		$pdoStatement->bindValue(':name',$name);
		$pdoStatement->bindValue(':firstname',$firstname);
		$pdoStatement->bindValue(':birthdate',$birthdate);
		$pdoStatement->bindValue(':email',$email);
		$pdoStatement->bindValue(':sexe',$sexe);

		if ($pdoStatement->execute()===false) {
			print_r($pdo->errorInfo());
		}
		else if ($pdoStatement->rowCount() > 0) {
			echo 'Etudiant ajouté dans la DB<br />';
		}
	}
	// Sinon, afficher le contenu du tableau $errorList dans view.php

}
$etudiantListe = array();
$citiesList = array(
	1 => 'Arlon',
	2 => 'Luxembourg',
	3 => 'Verdun',
	4 => 'Longwy',
	5 => 'Rodange',
	6 => 'Pissange',
	7 => 'Pétange',
);
$countriesList = array(
	1 => 'France',
	2 => 'Luxembourg',
	3 => 'Belgique',
	4 => 'Chine',
	6 => 'Allemagne',
);
$maritalStatusList = array(
	1 => 'Célibataire',
	2 => 'Marié(e)',
	3 => 'Divorcé(e)',
	4 => 'Veuf/veuve',
);
$sexeList = array(
	1 => 'M',
	2 => 'F',
);
$sessionList = array(
	1 => '1',
	2 => '2',
	3 => '3',
);
$sql = '
	SELECT stu_id, stu_name, stu_firstname, cou_name, cit_name, mar_name, stu_email, stu_birthdate AS birthdate
	FROM student
	LEFT OUTER JOIN country ON country.cou_id = student.cou_id
	LEFT OUTER JOIN city ON city.cit_id = student.cit_id
	LEFT OUTER JOIN marital_status ON marital_status.mar_id = student.mar_id
';
$pdoStatement = $pdo->query($sql);

// Si erreur
if ($pdoStatement === false) {
	print_r($pdo->errorInfo());
}
else if ($pdoStatement->rowCount() > 0) {
	$etudiantListe = $pdoStatement->fetchAll();
}

require 'inc/header.php';
require 'inc/add_view.php';
require 'inc/footer.php';