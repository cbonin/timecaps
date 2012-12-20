<h1><?php echo $boite->nomBoite; ?></h1>
<p><?php echo $boite->description; ?></p>

<div id="files"></div>

<script type="text/javascript">
	var idBoite = "<?php echo $boite->idBoiteBrand; ?>";

	$.get(baseUrl+'uploadController/filesBrand/'+idBoite) // var idBoite se crée en php dans editBoite.php
		.success(function (data){
			$('#files').html(data);
		});
	var shareFB = false;
</script>