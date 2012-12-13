<div id="boiteMap" style="width: 300px; height: 300px; display: block;"></div>
Position de la boite
<span id='targetPosition'>X ; Y</span><br/>
Ta Position
<span id='currentPosition'>X ; Y</span>
<div id='buttonContainer'></div>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script>
	var boiteId = "<?php echo $boite[0]['idBoite'] ?>"
	var boiteX = Number("<?php echo $boite[0]['coordX'] ?>");
	var boiteY = Number("<?php echo $boite[0]['coordY'] ?>");
	var boiteDate = "<?php echo str_replace('-', '', $boite[0]['targetDate']) ?>";
	var baseUrl = "<?php echo base_url(); ?>";
	var mapOptions;
    var map;

	mapOptions = {
        zoom: 16,
        center: new google.maps.LatLng(boiteX, boiteY),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById('boiteMap'), mapOptions);
    var coord = new google.maps.LatLng(boiteX,boiteY);
	createMarker(coord, 'La boite !');

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
<script src="../../assets/js/radar.js"></script>