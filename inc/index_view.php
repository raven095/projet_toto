
<h3>Sessions à ESCH-BELVAL</h3>
<ul>
<?php foreach ($sessionList as $key => $value) : ?>
	<li><a href="list.php?ses_id=<?= $value['ses_id'] ?>">du <?= $value['ses_opening'] ?> au <?= $value['ses_ending'] ?></a>
	</li>
<?php endforeach; ?>
</ul>

<h3>Statistiques</h3>
		
<table>
	<thead>
		<tr>
			<td>Ville</td>
			<td>Nbre d'étudiants</td>
		</tr>
	</thead>
	<tbody>
<?php foreach ($statList as $key => $value) : ?>
	<tr>
		<td class="td1"><?=$value['cit_name']?></td>
		<td class="td2"><?=$value['nbStudent']?></td>
	</tr>

<?php endforeach; ?>
	</tbody>
</table>

