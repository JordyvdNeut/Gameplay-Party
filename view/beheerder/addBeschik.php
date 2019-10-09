<?php require_once('view/beheerder/header.php') ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="infocontent bewerken">
				<form class='form-contact' action='index.php?op=addBeschik' method='POST'>
					<h1 class='heading'>Voeg uw beschikbaarheid toe</h1>
					<label>Zaal</label><br>
					<?= $radioButtons; ?>
					<label>Datum</label><br>
					<input type='date' name='datum' id='date' class='form-control' required>
					<label>Begin tijd</label><br>
					<input type='time' name='beg_tijd' id='beg_tijd' class='form-control' required>
					<label>Eind tijd</label><br>
					<input type='time' name='eind_tijd' id='eind_tijd' class='form-control' required><br>
					<input class='btn' type='submit' value='Toevoegen'>
				</form>
			</div>
		</div>
	</div>
</div>