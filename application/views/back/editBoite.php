    <?php echo validation_errors(); ?>

    <div id="boite_info">
        <h2>Informations sur le destinataire</h2>
        <p>Nom : <?php echo $user[0]["nom"]; ?></p>
        <p>Prénom : <?php echo $user[0]["prenom"]; ?></p>
        <p>Email : <?php echo $user[0]["email"]; ?></p>
    </div>

    <?php
    echo form_open('boiteController/update/'.$boite[0]["idBoite"]); ?>

        <input type="hidden" name="coordX" value="<?php echo $boite[0]["coordX"]; ?>" />
        <input type="hidden" name="coordY" value="<?php echo $boite[0]["coordY"]; ?>" />

        <?php
        echo form_label('Nom de la boite', 'Nom de la boite')."<br />";
        echo form_input('nomBoite', $boite[0]["nomBoite"])."<br />";

        echo form_label('Description', 'description')."<br />";
        echo form_textarea('description', $boite[0]["description"])."<br />";

        echo form_label('Date de débloquage', 'targetDate')."<br />";
        echo form_input('targetDate', $boite[0]["targetDate"])."<br />";

        echo form_label('Adresse du gars', 'receverAddress')."<br />";
        echo form_input('receverAddress', $boite[0]["adresse"])."<br />";

        echo form_label('Ville du gars', 'receverCity')."<br />";
        echo form_input('receverCity', $boite[0]["ville"])."<br />";

        echo form_label('Code Postal du gars', 'receverZipCode')."<br />";
        echo form_input('receverZipCode', $boite[0]["codePostal"])."<br />";
        
        echo form_submit('updateBoite', 'Modifier la boite');

    echo form_close();
    ?>

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
      <input type="hidden" name="idBoite" value="<?php echo $boite[0]['idBoite']; ?>" />
      <input type="submit" name="submit" id="submit" />
    </form>
    <h2>Files</h2>
    <div id="files"></div>

    <script>
        var idBoite = "<?php echo $boite[0]['idBoite']; ?>";
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script src="<?php echo base_url(); ?>assets/js/ajaxfileupload.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/mapBoite.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/uploadBoite.js"></script>