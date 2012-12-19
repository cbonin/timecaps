<?php echo validation_errors();

  echo form_open('userController/editAccount');

  echo form_label('Prénom : ', 'prenom')."<br />";
  echo form_input('prenom', $user->prenom)."<br />";

  echo form_label('Nom : ', 'nom')."<br />";
  echo form_input('nom', $user->nom)."<br />";

  echo form_label('Email : ', 'email')."<br />";
  echo form_input('email', $user->email)."<br />";

  echo form_label('Mot de passe : ', 'password')."<br />";
  echo form_password('password', '')."<br />";

  echo form_label(MDP_CONFIRMATION, 'passwordConf')."<br />";
  echo form_password('passwordConf', '')."<br />";

  echo form_submit('saveModif', 'Enregistrer les modifications');

  echo form_close();

?>