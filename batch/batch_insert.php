<?php
require '../inc/db.php';
require 'students_session2.php';
//require 'projet_toto/add.php';
/*
On veut insérer la liste complète des étudiants de la session 2 dans la table student.
On dispose de certaines informations dans le tableau se trouvant dans students_session2.php.
Cependant, des étudiants sont déjà renseignés dans la table student. Il ne faut donc ajouter que les étudiants n'y figurant pas.
Pour savoir si un étudiant est déjà dans la table, on se basera sur le champ "email".
D'ailleurs, pour plus de sécurité, on va ajouter un attribut d'unicité sur ce champ, dans la table student.

Copiez ces 2 fichiers dans un répertoire batch de votre projet Toto, puis éditez ce fichier pour effectuer les insertions en DB.
*/


$sql ='
	SELECT stu_email
	FROM student
';
$pdoStatement=$pdo->query($sql);

if ($pdoStatement===false) {
	print_r($pdo->errorInfo());
}
else if ($pdoStatement->rowCount() > 0) {
	
	$userMail=$pdoStatement->fetchAll();
	print_r($userMail);
}

if (!empty($_POST)) {
	// Je récupère tous les champs du formulaires
	
	$name = isset($_POST['name']) ? $_POST['name'] : '';
	$firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
	$birthdate = isset($_POST['birthdate']) ? $_POST['birthdate'] : '';
	$email = isset($_POST['email']) ? $_POST['email'] : '';
	$sex = isset($_POST['sex']) ? intval($_POST['sex']) : 0;
	$withExperience = isset($_POST['with_experience']) ? intval($_POST['with_experience']) : 0;
	$leader = isset($_POST['is_leader']) ? intval($_POST['is_leader']) : 0;

	$sqlIns='
		INSERT INTO student(stu_name,stu_firstname,stu_birthdate,stu_email,stu_sex, stu_with_experience, stu_is_leader)
		VALUES (:name,:firstname,:birthdate,:email,:sexe, :with_experience,:is_leader)
	';
			
	$pdoStatement = $pdo->prepare($sqlIns);
	$pdoStatement->bindValue(':name',$name);
	$pdoStatement->bindValue(':firstname',$firstname);
	$pdoStatement->bindValue(':birthdate',$birthdate);
	$pdoStatement->bindValue(':email',$email);
	$pdoStatement->bindValue(':sexe',$sex);
	$pdoStatement->bindValue(':with_experience',$withExperience);
	$pdoStatement->bindValue(':is_leader',$leader);

	if ($pdoStatement->execute()===false) {
		print_r($pdo->errorInfo());
	}
	else if ($pdoStatement->rowCount() > 0) {
		echo 'Etudiant ajouté<br />';
		print_r($pdoStatement);
	}
}
// A vous de jouer ^^