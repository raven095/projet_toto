<?php

//Je me connecte à la DB
$dsn = 'mysql:host=localhost;dbname=formation;charset=utf8';

try{
$pdo = new PDO($dsn, 'root', 'webforce3');
}
catch(Exception $e){
	//emailAlerte($e->getMessage());
	echo 'connecion impossible';
	exit;
}