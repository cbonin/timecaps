<div id="container">
	<section id="connexion">
		<h1>Ouvrir une boite sponsorisée</h1>
		<form method="POST" action="<?php echo base_url(); ?>boiteController/unlockBrand">
			<label for="code">Code :</label>
			<input type="text" id="code" name="code" />
			<input type="submit" class="button" value="Connexion" name=""/>
		</form>
	</section>
</div>