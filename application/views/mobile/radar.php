<?php if(isLogged()): 
	if(!empty($boite)): 
		if(boiteOpenable($boite)): ?>
            <div id='buttonContainer'></div>
			<div id="boiteMap"></div>

			<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
            <script>
                var boiteId = "<?php if($boite->isBoiteBrand == 1){echo $boite->idBoiteBrand;}else{echo $boite->idBoite;} ?>";
                var boiteX = Number("<?php echo $boite->coordX; ?>");
                var boiteY = Number("<?php echo $boite->coordY; ?>");
                var boiteDate = "<?php echo str_replace('-', '', $boite->targetDate); ?>";
                var baseUrl = "<?php echo base_url(); ?>";
                var mapOptions;
                var map;
                var isBoiteBrand = "<?php echo $boite->isBoiteBrand ?>";
                var urlUpdate = 'boiteController/updateStatus/';
                var urlDisplay = 'boiteController/displayBoite/';
                if(isBoiteBrand == 1){
                    urlUpdate = 'boiteController/updateStatusBrand/';
                    urlDisplay = 'boiteController/displayBoiteBrand/';
                }
               
                var coord = new google.maps.LatLng(boiteX,boiteY);

                mapOptions = {
                    zoom: 19,
                    center: coord,
                    mapTypeId: google.maps.MapTypeId.SATELLITE
                };
                map = new google.maps.Map(document.getElementById('boiteMap'), mapOptions);
                
                var circle = new google.maps.Circle({
                    center: coord,
                    radius: 25,
                    map: map,
                    fillColor: '#2e8d8d',
                    fillOpacity: 0.5,
                    strokeColor: '#288182',
                    strokeOpacity: 0.6
                });

                createMarker(coord, 'Déterre moi !');

                function createMarker(latLng, markerTitle){
                    marker = new google.maps.Marker({
                        position: latLng,
                        draggable: false,
                        map: map,
                        title: markerTitle
                    });
                    return marker;
                }

            </script>

		<?php else: ?>
			<p><center><img src="<?php echo base_url(); ?>/assets/css/img/Fin1.png" alt="Attnedre un peu" /></center></p>
			<p>Vous ne pouvez pas encore ouvrir la boite...</p>
		<?php endif; ?>

	<?php endif; ?>
<?php else: ?>
	<p>Vous devez vous connecter pour deterrer une boite.</p>
<?php endif; ?>