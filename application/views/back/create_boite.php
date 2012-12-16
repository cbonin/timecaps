    <?php echo validation_errors();

    echo form_open('boiteController/create')."<br />"; ?>

        <input type="hidden" name="coordX" value="<?php echo set_value('coordX') ?>" />
        <input type="hidden" name="coordY" value="<?php echo set_value('coordY') ?>" />
        <?php
        echo form_label('Nom de la boite', 'Nom de la boite')."<br />";
        echo form_input('nomBoite', set_value('nomBoite'))."<br />";

        echo form_label('Description', 'description')."<br />";
        echo form_textarea('description', set_value('description'))."<br />";

        echo form_label('Date de débloquage', 'targetDate')."<br />";
        echo form_input('targetDate', set_value('targetDate'))."<br />";

        echo form_label('Email receveur', 'emailRecever')."<br />";
        echo form_input('emailRecever', set_value('emailRecever'))."<br />";

        echo form_label('Nom receveur', 'receverName')."<br />";
        echo form_input('receverName', set_value('receverName'))."<br />";

        echo form_label('Prénom receveur', 'receverLastName')."<br />";
        echo form_input('receverLastName', set_value('receverLastName'))."<br />";

        echo form_label('Adresse du gars', 'receverAddress')."<br />";
        echo form_input('receverAddress', set_value('receverAddress'))."<br />";

        echo form_label('Ville du gars', 'receverCity')."<br />";
        echo form_input('receverCity', set_value('receverCity'))."<br />";

        echo form_label('Code Postal du gars', 'receverZipCode')."<br />";
        echo form_input('receverZipCode', set_value('receverZipCode'))."<br />";

        echo form_submit('addBoite', 'Créer une boite');

    echo form_close();
    ?>

    <form id="addressMap">
        <input type="text" name="addressMap" placeholder="adresse, ville..." />
        <input type="submit" value="entrer adresse" />
    </form>
    <div id="boiteMap" style="width: 300px; height: 300px; display: block;"></div>

    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script src="<?php echo base_url(); ?>assets/js/mapBoite.js"></script>
