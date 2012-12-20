<section id="edit-boite">
	<div id="button-ribbon">
		<h1 class="ribbon"><?php echo $boite->nomBoite;?></h1>
	</div>

	<div class="contenu clearfix">
		<div class="left">
			<div class="boite-container">
				<h2>Contributeurs</h2>
				<ul>
					<?php
						foreach ($contributeurs as $c) {
						    echo '<li>'.$c->prenom.' '.$c->nom.'</li>';
						}
					?>
				</ul>
				<h2>Description</h2>
				<section id="destinataire-boite">
					<p><?php echo $boite->description; ?></p>
				</section>
				<h2>Fichiers</h2>
				<div id="files"></div>
			</div>
		</div>
	</div>
</section>

<script type="text/javascript">
	var idBoite = "<?php echo $boite->idBoite; ?>";

	$.get(baseUrl+'uploadController/files/'+idBoite) // var idBoite se crée en php dans editBoite.php
		.success(function (data){
			$('#files').html(data);
		});
	var shareFB = true;
</script>
<script src="<?php echo base_url(); ?>assets/js/shadowbox/shadowbox.js"></script>
<script>
$(document).ready(function(){
	Shadowbox.init();
});
</script>

</body>