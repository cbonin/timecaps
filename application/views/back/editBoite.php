    <?php echo validation_errors(); ?>

    <div id="boite_info">
        <h2>Informations sur le destinataire</h2>
        <p>Nom : <?php echo $user->nom; ?></p>
        <p>Prénom : <?php echo $user->prenom; ?></p>
        <p>Email : <?php echo $user->email; ?></p>
    </div>

    <div id="contributors">
        <h2>Contributeurs</h2>
        <ul>
    <?php
    foreach ($contributors as $c) {
        echo '<li>'.$c->prenom.' '.$c->nom.'</li>';
    }
    ?>
        </ul>
    </div>

    <div>
        <h2>Informations sur la boite</h2>
    <?php
    echo form_open('boiteController/update/'.$boite->idBoite); ?>

        <input type="hidden" name="coordX" value="<?php echo $boite->coordX; ?>" />
        <input type="hidden" name="coordY" value="<?php echo $boite->coordY; ?>" />

        <?php
        echo form_label('Nom de la boite', 'Nom de la boite')."<br />";
        echo form_input('nomBoite', $boite->nomBoite)."<br />";

        echo form_label('Description', 'description')."<br />";
        echo form_textarea('description', $boite->description)."<br />";

        echo form_label('Date de débloquage', 'targetDate')."<br />";
        echo form_input('targetDate', $boite->targetDate)."<br />";

        echo form_label('Adresse du gars', 'receverAddress')."<br />";
        echo form_input('receverAddress', $boite->adresse)."<br />";

        echo form_label('Ville du gars', 'receverCity')."<br />";
        echo form_input('receverCity', $boite->ville)."<br />";

        echo form_label('Code Postal du gars', 'receverZipCode')."<br />";
        echo form_input('receverZipCode', $boite->codePostal)."<br />";

        echo form_label('Ajouter un contributeur', 'emailContributor')."<br />";
        echo form_input('emailContributor', set_value('emailContributor'))."<br />";
        
        echo form_submit('updateBoite', 'Modifier la boite');

    echo form_close();
    ?>
    </div>
    
    <form id="addressMap">
        <input type="text" name="addressMap" placeholder="adresse, ville..." />
        <input type="submit" value="entrer adresse" />
    </form>
    <div id="boiteMap" style="width: 300px; height: 300px; display: block;"></div>

    <h2>Uploads</h2>

    <form method="post" action="" id="upload_file">
      <label for="title">Title</label>
      <input type="text" name="title" id="title" value="" />
      <label for="userfile">File</label>
      <input type="file" name="userfile" id="userfile" size="20" />
      <input type="hidden" name="idBoite" value="<?php echo $boite->idBoite; ?>" />
      <input type="submit" name="submit" id="submit" />
    </form>
    <h2>Files</h2>
    <div id="files"></div>
    <div class="alertUpload"></div>
    <script>
        var idBoite = "<?php echo $boite->idBoite; ?>";
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script src="<?php echo base_url(); ?>assets/js/ajaxfileupload.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/mapBoite.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/shadowbox/shadowbox.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/uploadBoite.js"></script>