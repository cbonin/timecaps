<?php echo validation_errors();

echo form_open('boiteController/create')."<br />";

    echo form_label('Nom de la boite', 'Nom de la boite')."<br />";
    echo form_input('nomBoite', set_value('nomBoite'))."<br />";

    echo form_label('Coord X', 'coordX')."<br />";
    echo form_input('coordX', '48.851847')."<br />";

    echo form_label('Coord Y', 'coordY')."<br />";
    echo form_input('coordY', '2.420488')."<br />";

    echo form_label('Description', 'description')."<br />";
    echo form_textarea('description', set_value('description'))."<br />";

    echo form_label('Description', 'targetDate')."<br />";
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