<?php echo validation_errors(); ?>

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