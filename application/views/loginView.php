<!doctype html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>Formulaire</title>
	<meta name="description" content="">
  <link rel="stylesheet" href="../../assets/css/form.css">
</head>
<body>
    
    <?php echo validation_errors(); ?>

    <form method="POST" action="<?php echo base_url();?>userController/signIn">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" value="c@gmail.com" required >
      <label for="password">Mot de passe</label>
      <input type="password" id="password" name="password" value="zboub" required >
      <input type="submit" />
    </form>

</body>
</html>
