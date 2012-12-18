	</div>
	<footer>
		<section>
			<div id="reseaux">
				<a href="http://www.facebook.com/BackwardsInc" target="_blank" title="Page Facebook"></a>
				<a href="#" title="Page Twitter"></a>
			</div>
			<ul id="navig-footer">
				<li><a href="#" title="Charte de confidentialité">Charte de confidentialité</a></li>
				<li><a href="#" title="À propos">À propos</a></li>
				<li class="last"><a href="#" title="Contact">Contact</a></li>
			</ul>
			<p>© Backwards - 2012</p>
			<div id="retour-haut">
				<span id="ellipse2"><a href="#" title="Retour en haut de la page"></a><img src="<?php echo base_url(); ?>assets/css/img/ellipse-footer.png" alt="Ellipse foot" /></span>
			</div>
		</section>
	</footer>

	<div id="shadow-layer">
		<div id="connexion-box" class="popup-container">
				<span class="popup-title">Connexion</span>
				<div class="popup-left">
					<p>Avec votre compte Backwards ...</p>
					<form method="POST" action="<?php echo base_url();?>userController/signIn">
						<label>Email : </label>
						<input type="text" name="email" value="" placeholder="ex : marie.durand@mail.com" />
						<label>Mot de passe : </label>
						<input type="password" name="password" value="" placeholder="motdepasse" />
						<input type="submit" value="Connexion" class="submit"/>
					</form>
				</div>
				<div class="popup-right">
					<p>... Ou gagnez du temps en vous inscrivant grâce à Facebook :</p>
					<div class="fb-button-container">
						<div id="fb-root"></div>
						<fb:login-button show-faces="true" width="250" perms="user_groups,publish_stream,email,user_birthday,read_stream,publish_actions,read_friendlists"></fb:login-button>
						<div id="#fb-profile-pic"></div>
						<div id="#fb-name"></div>
					</div>
				</div>
		</div>

		<div id="inscription-box" class="popup-container">
			<span class="popup-title">Inscription</span>
				<div class="popup-left">
					<p>Pour utiliser Backwards, inscrivez-vous simplement en remplissant le formulaire...</p>
					<form method="POST" action="<?php echo base_url();?>userController/signUp">
						<label for="prenom">Prénom : </label>
						<input type="text" name="prenom" value="" placeholder="ex : Marie" required/>
						<label for="nom">Nom : </label>
						<input type="text" name="nom" value="" placeholder="ex : Dupond" required/>
						<label for="email">Email : </label>
						<input type="text" name="email" value="" placeholder="ex : marie.durand@mail.com" required/>
						<label>Mot de passe : </label>
						<input type="password" name="password" value="" placeholder="motdepasse" required/>
						<label>Confirmez le pass : </label>
						<input type="password" name="passwordConf" value="" placeholder="motdepasse" required/>
						<input type="submit" value="Inscription" class="submit" />
					</form>
				</div>
				<div class="popup-right">
					<p>... Ou gagnez du temps avec Facebook</p>
					<div class="fb-button-container">
						<fb:login-button show-faces="true" width="250" perms="user_groups,publish_stream,email,user_birthday,read_stream,publish_actions,read_friendlists"></fb:login-button>
						<div id="#fb-profile-pic"></div>
						<div id="#fb-name"></div>
					</div>
				</div>
		</div>
	</div>

	<script src="<?php echo base_url(); ?>assets/js/jqueryUI.js"></script>
	<script>
	$(function() {
	    $("input[name=targetDate]").datepicker();
	});
	</script>
	<script src="http://connect.facebook.net/fr_FR/all.js"></script>
		<script>
		    FB.init({
		        appId  : '303205766457764',
		        status : true, // verifie le statut de la connexion
		        cookie : true, // active les cookies pour que le serveur puisse accéder à la session
		        xfbml  : true  // active le XFBML (HTML de Facebook)
		    });
		</script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/facebookConnect.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/functions.js"></script>
</body>
</html>