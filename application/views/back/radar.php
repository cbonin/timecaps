<button type='button' id='unlocker' disabled>déverrouiller la boite</button>
<span id='position'>Ici les position</span>
<script>
	var boiteX = Number("<?php echo $boite[0]['coordX'] ?>");
	boiteX = boiteX.toFixed(3);
	var boiteY = Number("<?php echo $boite[0]['coordY'] ?>");
	boiteY = boiteY.toFixed(3);
</script>
<script src="../../assets/js/radar.js"></script>