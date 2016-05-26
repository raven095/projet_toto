<?php
// je crée PDO
require 'inc/db.php';
$currentPage= 0;
//Mettre ici le code pour la recherche
if (!empty($_GET['search'])) {
	$research = $_GET['search']; //variable à remplir

	$etudiantListe= array();
	$sql='
		SELECT stu_id, stu_name, stu_firstname, cou_name, cit_name, mar_name, stu_email, stu_birthdate AS birthdate
		FROM student
		LEFT JOIN country ON country.cou_id = student.cou_id
		LEFT JOIN city ON city.cit_id = student.cit_id
		LEFT JOIN marital_status ON marital_status.mar_id = student.mar_id
		WHERE stu_name LIKE :search
		OR stu_firstname LIKE :search
		OR cou_name LIKE :search
		OR mar_name LIKE :search
		OR cit_name LIKE :search
		OR stu_email LIKE :search
	';
	$pdoStatement = $pdo->prepare($sql);
	$pdoStatement->bindValue(':search',"%$research%");

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