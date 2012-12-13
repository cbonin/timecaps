<button type='button' id='unlocker' disabled>déverrouiller la boite</button>
<span id='position'>Ici les position</span>
<script>
	var boiteX = Number("<?php echo $boite[0]['coordX'] ?>");
	var boiteY = Number("<?php echo $boite[0]['coordY'] ?>");
	var boiteDate = "<?php echo str_replace('-', '', $boite[0]['targetDate']) ?>";
</script>
<script src="../../assets/js/radar.js"></script>