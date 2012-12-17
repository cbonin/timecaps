<?php echo validation_errors();

  echo form_open('userController/editAccount');

  echo form_label('Prénom : ', 'prenom')."<br />";
  echo form_input('prenom', $user[0]['prenom'])."<br />";

  echo form_label('Nom : ', 'nom')."<br />";
  echo form_input('nom', $user[0]['nom'])."<br />";

  echo form_label('Email : ', 'email')."<br />";
  echo form_input('email', $user[0]['email'])."<br />";

  echo form_label('Mot de passe : ', 'password')."<br />";
  echo form_password('password', '')."<br />";

  echo form_label('Confirmation du mot de passe : ', 'passwordConf')."<br />";
  echo form_password('passwordConf', '')."<br />";

  echo form_submit('saveModif', 'Enregistrer les modifications');

  echo form_close();

?>