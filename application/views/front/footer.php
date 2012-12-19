	</div>
	<footer>
		<section>
			<div id="reseaux">
				<a href="http://www.facebook.com/BackwardsInc" target="_blank" title="Page Facebook"></a>
				<a href="#" title="Page Twitter"></a>
			</div>
			<ul id="navig-footer">
				<li><a href="#" title="Charte de confidentialité"><?php echo CGU; ?></a></li>
				<li><a href="#" title="À propos"><?php echo A_PROPOS; ?></a></li>
				<li class="last"><a href="#" title="Contact"><?php echo CONTACT; ?></a></li>
			</ul>
			<p>© Backwards - 2012</p>
			<div id="retour-haut">
				<span id="ellipse2"><a href="#" title="Retour en haut de la page"></a><img src="<?php echo base_url(); ?>assets/css/img/ellipse-footer.png" alt="Ellipse foot" /></span>
			</div>
		</section>
	</footer>

	<div id="shadow-layer">
		<div id="connexion-box" class="popup-container">
				<span class="popup-title"><?php echo CONNEXION; ?></span>
				<div class="popup-left">
					<p><?php echo TXT_CO_BW; ?></p>
					<form method="POST" action="<?php echo base_url();?>userController/signIn">
						<label><?php echo EMAIL; ?></label>
						<input type="text" name="email" value="" placeholder="ex : marie.durand@mail.com" />
						<label><?php echo MDP; ?></label>
						<input type="password" name="password" value="" placeholder="motdepasse" />
						<input type="submit" value="<?php echo CONNEXION; ?>" class="submit"/>
					</form>
				</div>
				<div class="popup-right">
					<p><?php echo TXT_IN_FB; ?></p>
					<div class="fb-button-container">
						<div id="fb-root"></div>
						<fb:login-button show-faces="true" width="250" perms="user_groups,publish_stream,email,user_birthday,read_stream,publish_actions,read_friendlists"></fb:login-button>
						<div id="#fb-profile-pic"></div>
						<div id="#fb-name"></div>
					</div>
				</div>
		</div>

		<div id="inscription-box" class="popup-container">
			<span class="popup-title"><?php echo INSCRIPTION; ?></span>
				<div class="popup-left">
					<p><?php echo TXT_IN_BW; ?></p>
					<form method="POST" action="<?php echo base_url();?>userController/signUp">
						<label><?php echo PRENOM; ?></label>
						<input type="text" name="prenom" value="" placeholder="ex : Marie" />
						<label><?php echo NOM; ?></label>
						<input type="text" name="nom" value="" placeholder="ex : Dupond" />
						<label><?php echo EMAIL; ?></label>
						<input type="text" name="email" value="" placeholder="ex : marie.durand@mail.com" />
						<label><?php echo MDP; ?></label>
						<input type="password" name="password" value="" placeholder="motdepasse" />
						<label><?php echo MDP_CONFIRMATION; ?></label>
						<input type="password" name="passwordConf" value="" placeholder="motdepasse" />
						<input type="submit" value="<?php echo INSCRIPTION; ?>" class="submit" />
					</form>
				</div>
				<div class="popup-right">
					<p><?php echo TXT_IN_FB; ?></p>
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