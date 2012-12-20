<html>
<head>


	<link rel="stylesheet" href="css/styles.css">
</head>

<body>

<h1><?php echo $boite->nomBoite; ?></h1>
<p><?php echo $boite->description; ?></p>
<?php
	foreach ($contributeurs as $c) {
	    echo '<li>'.$c->prenom.' '.$c->nom.'</li>';
	}
?>

<div id="files"></div>

<script type="text/javascript">
	var idBoite = "<?php echo $boite->idBoite; ?>";

	$.get(baseUrl+'uploadController/files/'+idBoite) // var idBoite se crée en php dans editBoite.php
		.success(function (data){
			$('#files').html(data);
		});
	var shareFB = true;
</script>

</body>