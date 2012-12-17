    <div id="boite_info">
        <h2>Informations sur le destinataire</h2>
        <p>Nom : <?php echo $user[0]["nom"]; ?></p>
        <p>Prénom : <?php echo $user[0]["prenom"]; ?></p>
        <p>Email : <?php echo $user[0]["email"]; ?></p>
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
    
        <input type="hidden" name="coordX" value="<?php echo $boite[0]["coordX"]; ?>" />
        <input type="hidden" name="coordY" value="<?php echo $boite[0]["coordY"]; ?>" />

        <p> Nom de la boite     : <?php echo $boite[0]["nomBoite"];?></p>
        <p> description         : <?php echo $boite[0]["description"];?></p>
        <p> Date de déblocage   : <?php echo $boite[0]["targetDate"];?></p>
        <p> Adresse de <?php $user[0]["prenom"];?> : <?php echo $boite[0]["adresse"];?></p>
        <p> Ville               : <?php echo $boite[0]["ville"];?></p>
        <p> Code postal : <?php echo $boite[0]["codePostal"];?></p>
        
    </div>
    
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
    <div class="alertUpload"></div>
    <script>
        var idBoite = "<?php echo $boite[0]['idBoite']; ?>";
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script src="<?php echo base_url(); ?>assets/js/ajaxfileupload.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/mapBoite.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/shadowbox/shadowbox.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/uploadBoite.js"></script>