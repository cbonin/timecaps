<!doctype html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>Formulaire</title>
	<meta name="description" content="">
  <link rel="stylesheet" href="../../assets/css/form.css">
</head>
<body>
    
    <?php echo validation_errors(); 


    echo form_open('boiteController/create')."<br />";
    echo form_label('Nom de la boite', 'Nom de la boite')."<br />";
    echo form_input('nomBoite', 'Boite numéro 1')."<br />";
    echo form_label('coordX', 'Coord X')."<br />";
    echo form_input('coordX', '48.851847')."<br />";
    echo form_label('coordY', 'Coord Y')."<br />";
    echo form_input('coordY', '2.420488')."<br />";
    echo form_label('description', 'Description')."<br />";
    echo form_textarea('description', 'Mettre ici la description')."<br />";
    echo form_label('targetDate', 'Description')."<br />";
    echo form_input('targetDate', '12/12/12')."<br />";
    echo form_label('emailRecever', 'Email receveur')."<br />";
    echo form_input('emailRecever', 'bastien.penalba@gmail.com')."<br />";
    echo form_label('receverName', 'Nom receveur')."<br />";
    echo form_input('receverName', 'Penalba')."<br />";
    echo form_label('receverLastName', 'Prénom receveur')."<br />";
    echo form_input('receverLastName', 'Bastien')."<br />";

    echo form_label('receverAddress', 'Adresse du gars')."<br />";
    echo form_input('receverAddress', '18 boulevard Joliot Curie')."<br />";

    echo form_label('receverCity', 'Ville du gars')."<br />";
    echo form_input('receverCity', 'Martigues')."<br />";

    echo form_label('receverZipCode', 'Code Postal du gars')."<br />";
    echo form_input('receverZipCode', '13500')."<br />";
    
    echo form_submit('addBoite', 'créer une boite');
    echo form_close();
    ?>

</body>
</html>
