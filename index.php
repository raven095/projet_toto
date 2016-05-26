<pre>
<?php
require 'inc/db.php';

// J'écris ma requête
$sql='
	SELECT ses_opening, ses_ending, ses_id
	FROM session
';
$pdoStatement = $pdo->query($sql);

// Si erreur
if ($pdoStatement === false){
	//print_r($pdo->errorInfo());
}
// sinon
else{
	// Je récupère toutes les données
	$sessionList = $pdoStatement->fetchAll();
	//print_r($sessionList);
}

$sqlStat='
	SELECT COUNT(stu_id) AS nbStudent, city.cit_name
	FROM student
	INNER JOIN city ON city.cit_id = student.cit_id
	GROUP BY cit_name
';
$pdoStatement = $pdo->query($sqlStat);

// Si erreur
if ($pdoStatement === false){
	//print_r($pdo->errorInfo());
}
// sinon
else{
	// Je récupère toutes les données
	$statList = $pdoStatement->fetchAll();
	//print_r($sessionList);
}

?>
</pre>
<?php

//J'affiche ma page
require 'inc/header.php';
require 'inc/index_view.php';
require 'inc/footer.php';