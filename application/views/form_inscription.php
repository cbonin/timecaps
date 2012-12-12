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
  
    <form action="<?php echo base_url(); ?>userController/signUp" method="POST">
      <label for="prenom">Votre prenom</label>
      <input type="text" id="prenom" name="prenom" required >
      <label for="nom">Votre nom</label>
      <input type="text" id="prenom" name="nom" required >
      <label for="email">Votre email</label>
      <input type="email" id="email" name="email" required >
      <label for="password">Votre Mot de passe</label>
      <input type="password" id="password" name="password" required >
      <label for="passwordConf">Confirmer mot de passe</label>
      <input type="password" id="passwordConf" name="passwordConf" required >
      <input type="submit" />
    </form>

</body>
</html>
