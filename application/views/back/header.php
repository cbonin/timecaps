<!doctype html>

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# backwards_app: http://ogp.me/ns/fb/backwards_app#">
	<meta property="fb:app_id" content="303205766457764" /> 
	<meta property="og:type"                  content="backwards_app:box" />
	<meta property="og:url"    content="<?php echo current_url(); ?>" />
	<meta property="og:title"  content="Boite " />
	<meta property="og:image"  content="<?php echo base_url(); ?>assets/css/images/fin3.png" /> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title><?php echo $title; ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="description" content="">
  	<meta property="place:location:latitude"  content="<?php if(isset($boite)){echo $boite['coordX']; }?>" /> 
  	<meta property="place:location:longitude" content="<?php if(isset($boite)){echo $boite['coordY']; }?>" /> 
	<meta property="backwards_app:sender"     content="<?php if(isset($boite)){echo $boite['idOwnerFB']; }?>" />


	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/back.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/date.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/shadowbox/shadowbox.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  	<script>
		var baseUrl = "<?php echo base_url(); ?>";
		var connected = <?php if(isLogged()){echo "true";}else{echo "false";} ?>;
		var currentUrl = "<?php echo current_url(); ?>";
	</script>
</head>
<body>
	<div id="fb-root"></div>
	<fb:login-button show-faces="true" width="450" perms="user_groups,publish_stream,email,user_birthday,read_stream,publish_actions,read_friendlists"></fb:login-button>
	<div id="#fb-profile-pic"></div>
	<div id="#fb-name"></div>
	<section>
		<header>
			<?php
				echo '<a href="'.base_url().'userController/editAccount">Mon compte</a> | ';
				echo '<div id="logout"><a href="'.base_url().'userController/logout">Deconexion</a></div>';
			?>
		</header>