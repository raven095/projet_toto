<form method="get">
	<input type="hidden" name="ses_id" value="<?=$sessionID?>">
	<select name="nbPerPage">
		<option value="1">1 par page</option>
		<option value="2">2 par page</option>
		<option value="3">3 par page</option>
		<option value="4">4 par page</option>
		<option value="5">5 par page</option>
		<option value="6">6 par page</option>
	</select>
	<input type="submit" value="OK">
</form>

<nav>
	<ul>
		<li><button class="homebutton"><a href="index.php">Home</a></button></li>
		
	</ul>
</nav>

<h3>Liste des étudiants</h3>

<?php if (isset($etudiantListe) && sizeof($etudiantListe) > 0) : ?>
	<table>
		<thead>
			<tr>
				<td>Nom</td>
				<td>Prénom</td>
				<td>Email</td>
				<td>Ville</td>
				<td>Nationalité</td>
				<td>Statut marital</td>
				<td>Date de naissance</td>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($etudiantListe as $currentEtudiant) : ?>
				<tr>
					<td><a href='student.php?stu_id=<?= $currentEtudiant['stu_id']?>'><?= $currentEtudiant['stu_name'] ?> </a></td>
					<td><a href='student.php?stu_id=<?= $currentEtudiant['stu_id']?>'><?= $currentEtudiant['stu_firstname'] ?> </a></td>
					<td><?= $currentEtudiant['stu_email'] ?></td>
					<td><?= $currentEtudiant['cit_name'] ?></td>
					<td><?= $currentEtudiant['cou_name'] ?></td>
					<td><?= $currentEtudiant['mar_name'] ?></td>
					<td><?= $currentEtudiant['birthdate'] ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	
		<button class = "button" ><a href="add.php"type="button">Ajouter des étudiants</button>
		
	</table>
	
	<button class = "button1" ><a href="list.php?ses_id=<?= $sessionID ?>&nbPerPage=<?=$nbPerPage ?>&page=<?= ($currentPage+1) ?>">suivant</a></button>

	<?php

	if($currentPage!==0){?>
		<button class = "button2" ><a href="list.php?ses_id=<?= $sessionID ?>&nbPerPage=<?=$nbPerPage ?>&page=<?= ($currentPage-1) ?>">précédent</a></button>
	<?php }?>

	<button class="button3"><a href="list.php?ses_id=<?= $sessionID ?>">retour</a></button>
	
<?php else :?>
	aucun étudiant
<?php endif; ?>

