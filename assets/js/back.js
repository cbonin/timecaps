$(document).ready(){
	google.maps.event.addListener(map, "click", function (e) { 
	    document.form1.waypointLog.value = e.latLng.lat().toFixed(6) 
	    + ' |' + e.latLng.lng().toFixed(6); 
	}); 
}