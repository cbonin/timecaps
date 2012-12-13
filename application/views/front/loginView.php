<?php echo validation_errors(); ?>

<form method="POST" action="<?php echo base_url();?>userController/signIn">
  <label for="email">Email</label>
  <input type="email" id="email" name="email" value="c@gmail.com" required >
  <label for="password">Mot de passe</label>
  <input type="password" id="password" name="password" value="zboub" required >
  <input type="submit" />
</form>