<h1>Backwards</h1>
<div>
	<?php
		if(isLogged()){
			echo '<a href="'.base_url().'boiteController">Mes boites</a><br />';
			echo '<a href="'.base_url().'userController/logout">Deconexion</a>';
		}else{
			echo '<a href="'.base_url().'userController/signIn">Connexion</a><br/>';
			echo '<a href="'.base_url().'userController/signUp">Inscription</a>';
		}
	?>
</div>