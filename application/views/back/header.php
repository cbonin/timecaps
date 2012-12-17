<!doctype html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title><?php echo $title; ?></title>
	<meta name="description" content="">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/back.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/date.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/shadowbox/shadowbox.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
</head>
<body>
	<section>
		<header>
			<?php
				echo '<a href="'.base_url().'userController/editAccount">Mon compte</a> | ';
				echo '<a href="'.base_url().'userController/logout">Deconexion</a>';
			?>
		</header>