<!doctype html>
<html>
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# backwards_app: http://ogp.me/ns/fb/backwards_app#">
	<meta property="fb:app_id" content="303205766457764" /> 
	<meta property="og:type"   content="backwards_app:box" />
	<meta property="og:url"    content="<?php echo current_url(); ?>" />
	<meta property="og:title"  content="Boite " />
	<meta property="og:image"  content="<?php echo base_url(); ?>assets/css/images/fin3.png" /> 
  	<meta property="place:location:latitude"  content="<?php if(isset($boite)){echo $boite['coordX']; }?>" /> 
  	<meta property="place:location:longitude" content="<?php if(isset($boite)){echo $boite['coordY']; }?>" /> 
	<meta property="backwards_app:sender"     content="<?php if(isset($boite)){echo $boite['idOwnerFB']; }?>" />

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title><?php echo $title; ?></title>
	<meta name="description" content="Bienvenue sur Backwards. Venez découvrir ">

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/date.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/shadowbox/shadowbox.css">
	<link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>assets/css/img/favicon.png" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  	<script>
		var baseUrl = "<?php echo base_url(); ?>";
		var connected = <?php if(isLogged()){echo "true";}else{echo "false";} ?>;
		var currentUrl = "<?php echo current_url(); ?>";
	</script>
	<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
<<<<<<< HEAD
	<div id="fb-root"></div>

	<header>
		<section>
			<div id="logo">
				<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/css/img/logo.png" alt="Logo Backwards" title="Backwards" /></a>
			</div>
			<div id="espace-user">
				<?php if(isLogged()) :
				$userLogged = $this->session->userdata('user_data');
				?>
					<p>Bonjour <span id="username"><?php echo $userLogged['prenom']." ".$userLogged['nom']; ?></span></p>
					<div id="connect">
						<a href="<?php echo base_url(); ?>boiteController/" title="Boites">Mes boites</a>
						<a href="<?php echo base_url(); ?>userController/editAccount/<?php echo $userLogged['idUser']; ?>" title="mon compte">Mon compte</a>
						<a href="<?php echo base_url(); ?>userController/logout" title="Connexion" class="logout-btn">Déconnexion</a>
					</div>
				<?php else: ?>
					<div id="connect">
						<a href="#" title="Inscription" class="inscription-btn">Inscription</a>
						<a href="#" title="Connexion" class="connexion-btn">Connexion</a>
					</div>
				<?php endif; ?>
			</div>
			<span id="ellipse"><img src="<?php echo base_url(); ?>assets/css/img/ellipse-header.png" alt="Ellipse head"/></span>
		</section>
	</header>
	<div id="container" class="container">
=======
	<section>
		<header>
			<div id="fb-root"></div>
			<fb:login-button show-faces="true" width="450" perms="user_groups,publish_stream,email,user_birthday,read_stream,publish_actions,read_friendlists"></fb:login-button>
			<div id="#fb-profile-pic"></div>
			<div id="#fb-name"></div>
			<div class='droite'><a href="<?php echo base_url().'main_controller/setLanguage/fr'; ?>">fr</a> | <a id='en' href="<?php echo base_url().'main_controller/setLanguage/en'; ?>">en</a></div>
		</header>
>>>>>>> gestion multilangue ok
