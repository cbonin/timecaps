Position de la boite
<span id='targetPosition'>X ; Y</span><br/>
Ta Position
<span id='currentPosition'>X ; Y</span>
<div id='buttonContainer'></div>
<script>
	var boiteId = "<?php echo $boite[0]['idBoite'] ?>"
	var boiteX = Number("<?php echo $boite[0]['coordX'] ?>");
	var boiteY = Number("<?php echo $boite[0]['coordY'] ?>");
	var boiteDate = "<?php echo str_replace('-', '', $boite[0]['targetDate']) ?>";
	var baseUrl = "<?php echo base_url(); ?>";
</script>
<script src="../../assets/js/radar.js"></script>