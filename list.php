<?php 

//Je crée PDO
require 'inc/db.php';

// Je recupère les ses_id via GET
//http://localhost/toto/list.php?ses_id=XX
if (!empty($_GET['ses_id'])) {
	$sessionID = intval($_GET['ses_id']); // Type ? int
	//echo $sessionID;exit;

	// Nombre d'étudiants par page
	$currentOffset = 0;
	$currentPage=1;
	$nbPerPage=4;

	if(!empty($_GET['nbPerPage'])){
		$nbPerPage = intval($_GET['nbPerPage']);
	}
	/*if (array_key_exists('offset', $_GET)) { // équivaut à isset($_GET['offset'])
		$currentOffset = intval($_GET['offset']);
	}*/
	if(array_key_exists('page', $_GET)){
		$currentPage=intval($_GET['page']);
		$currentOffset=($currentPage-1)*$nbPerPage;
	}

	$sql = '
		SELECT stu_id, stu_name, stu_firstname, cou_name, cit_name, mar_name, stu_email, stu_birthdate AS birthdate
		FROM student
		LEFT OUTER JOIN country ON country.cou_id = student.cou_id
		LEFT OUTER JOIN city ON city.cit_id = student.cit_id
		LEFT OUTER JOIN marital_status ON marital_status.mar_id = student.mar_id
		WHERE ses_id = :sessionID
		LIMIT :offset,:nbPerPage
	';
	$pdoStatement = $pdo->prepare($sql);
	// je donne la valeur au paramètre de requete
	$pdoStatement->bindValue(':sessionID',$sessionID, PDO::PARAM_INT);
	$pdoStatement->bindValue(':nbPerPage', $nbPerPage, PDO::PARAM_INT);
	$pdoStatement->bindValue(':offset', $currentOffset, PDO::PARAM_INT);

	// Si erreur
	if ($pdoStatement ->execute()===false) {
		print_r($pdo->errorInfo());
	}
	else if ($pdoStatement->rowCount() > 0) {
		$etudiantListe = $pdoStatement->fetchAll();
	}
}
//J'affiche ma page
require 'inc/header.php';
require 'inc/list_view.php';
require 'inc/footer.php';