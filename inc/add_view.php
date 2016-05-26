<form action="" method="post">
	<fieldset>
		<legend>Ajout d'un étudiant</legend>
		
		<input type="text" name="studentName" value="" placeholder="Nom"><br/>
		<input type="text" name="studentFirstname" value="" placeholder="Prénom"><br/>
		<input type="email" name="studentEmail" value="" placeholder="E-mail"><br/>
		<input type="date" name="studentBirhtdate" value="" placeholder="Date de naissance (aaaa-mm-jj)"><br/>

		Session :<br/>
		<!--<input type="number" name="session" value="" placeholder="No_Session"><br/> -->
		<select name="session_id">
			<option value="0">choisissez :</option>
			<?php foreach ($sessionList as $key=>$value) :?>
			<option value="<?= $key ?>"><?= $value ?></option>
			<?php endforeach; ?>
		</select><br/>

		Localité :<br/>
		<select name="cit_id">
			<option value="0">choisissez :</option>
			<?php foreach ($citiesList as $key=>$value) :?>
			<option value="<?= $key ?>"><?= $value ?></option>
			<?php endforeach; ?>
		</select><br/>

		Pays :<br/>
		<select name="cou_id">
			<option value="0">choisissez :</option>
			<?php foreach ($countriesList as $key=>$value) :?>
			<option value="<?= $key ?>"><?= $value ?></option>
			<?php endforeach; ?>
		</select><br/>

		Statut :<br/>
		<select name="mar_id">
			<option value="0">choisissez :</option>
			<?php foreach ($maritalStatusList as $key=>$value) :?>
			<option value="<?= $key ?>"><?= $value ?></option>
			<?php endforeach; ?>
		</select><br />

		Sexe :<br/>
		<select name="stu_sex">
			<option value="0">choisissez :</option>
			<?php foreach ($sexeList as $key=>$value) :?>
			<option value="<?= $key ?>"><?= $value ?></option>
			<?php endforeach; ?>
		</select><br/>	
		<input type="submit" value="Ajouter"><br />
	</fieldset>
</form>
