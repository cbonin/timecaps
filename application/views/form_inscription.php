<!doctype html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>Formulaire</title>
	<meta name="description" content="">
  <link rel="stylesheet" href="../../assets/css/form.css">
</head>
<body>
  
    <form method="POST" action="<?php echo base_url();?>userController/signUp">
      <label for="prenom">Votre prenom</label>
      <input type="text" id="prenom" name="prenom" value="Charles" required >
      <label for="nom">Votre nom</label>
      <input type="text" id="prenom" name="nom" value="ZBOUBI" required >
      <label for="email">Votre email</label>
      <input type="email" id="email" name="email" value="c@gmail.com" required >
      <label for="password">Votre Mot de passe</label>
      <input type="password" id="password" name="password" value="zboub" required >
      <label for="passwordConf">Confirmer mot de passe</label>
      <input type="password" id="passwordConf" name="passwordConf" value="zboub" required >
      <input type="submit" />
    </form>

</body>
</html>
