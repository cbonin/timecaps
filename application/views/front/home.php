<h1>Backwards</h1>
<div>
	<?php
		if(isLogged()){
			echo '<a href="'.base_url().'boiteController">Mes boites</a><br />';
			echo '<div id="logout"><a href="'.base_url().'userController/logout">Deconexion</a></div>';
		}else{
			echo '<a href="'.base_url().'userController/signIn">Connexion</a>';
		}
	?>

	<a href="" id="share">PARTAGE BRO</a>
	<p>nbBoites : <?php echo($nbBoites) ?></p>
	<p>openBoites : <?php echo($openBoites) ?></p>

</div>