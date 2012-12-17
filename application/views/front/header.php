<!doctype html>

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# backwards: http://ogp.me/ns/fb/backwards#">
	<meta property="fb:app_id" content="303205766457764" />
	<meta property="og:type"   content="backwards:boite" /> 
	<meta property="og:url"    content="http://localhost:8888/backwards/" />
	<meta property="og:title"  content="Une boite" />
	<meta property="og:image"  content="https://s-static.ak.fbcdn.net/images/devsite/attachment_blank.png" /> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title><?php echo $title; ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/front.css">
	<meta name="description" content="">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script>
		var baseUrl = "<?php echo base_url(); ?>";
		var connected = <?php if(isLogged()){echo "true";}else{echo "false";} ?>;
	</script>
</head>

<body>
<div id="fb-root"></div>
<fb:login-button show-faces="true" width="450" perms="user_groups,publish_stream,email,user_birthday,read_stream,publish_actions,read_friendlists"></fb:login-button>
<div id="#fb-profile-pic"></div>
<div id="#fb-name"></div>
