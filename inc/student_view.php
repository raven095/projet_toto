<h3>Information about students</h3>

<?php foreach ($studentInfo as $currentEtudiant) : ?>

<ul id="studentlist">
	<li>Le nom est: <?=$currentEtudiant['stu_name'] ?></li>
	<li>Le prénom est: <?=$currentEtudiant['stu_firstname'] ?></li>
	<li>La date de naissance est: <?=$currentEtudiant['stu_birthdate'] ?></li>
	<li>L'adresse Email est: <?=$currentEtudiant['stu_email'] ?> </li>
	<li>Le sexe est: <?=$currentEtudiant['stu_sex'] ?> </li>
	<li>L'expérience est à: <?=$currentEtudiant['stu_with_experience'] ?> </li>
	<li>L'étudiant est leader: <?=$currentEtudiant['stu_is_leader'] ?> </li>
	<li>Le signe zodiaque est: <?=$zodiacfr[$zodiacSign] ?> </li>
</ul>
<?php endforeach; ?>
	