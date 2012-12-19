$(document).ready(function(){

    var baseUrl = "http://localhost:8888/backwards/";

	var marker;
    var coordX = document.querySelector("input[name=coordX]");
    var coordY = document.querySelector("input[name=coordY]");
    var mapOptions;
    var map;

    if(coordX.value != '' && coordY.value != ''){
        mapOptions = {
            zoom: 15,
            center: new google.maps.LatLng(coordX.value,coordY.value),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById('boiteMap'), mapOptions);
        var coord = new google.maps.LatLng(coordX.value,coordY.value)
        createMarker(coord);

        var circle = new google.maps.Circle({
            center: coord,
            radius: 10,
            map: map,
            fillColor: 'red',
            fillOpacity: 0.5,
            strokeColor: 'blue',
            strokeOpacity: 0.6
        });
    }else{
        mapOptions = {
            zoom: 4,
            center: new google.maps.LatLng(47.15984,3.028931),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById('boiteMap'), mapOptions);
    }




    if(coordX.value == '' && coordY.value == ''){

        google.maps.event.addListenerOnce(map, 'click', function(e){
            var latLng = e.latLng;
            if(marker == undefined){
                createMarker(latLng);
            }
        }); 
    }

    $("#addressMap").submit(function(){
        var address = document.querySelector("input[name='addressMap']");
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({"address":address.value}, function(data,status){
            if(status=='OK'){
                if(marker == undefined){
                    createMarker(data[0].geometry.location);
                }else{
                    updateMarker(data[0].geometry.location);
                }
            }
        });
        return false;
    });

    function createMarker(latLng){
        marker = new google.maps.Marker({
            position: latLng,
            draggable: true,
            map: map,
            title: 'Lieu ouverture'
        });
        map.setCenter(latLng);
        map.setZoom(15);
        coordX.value = marker.position.Za;
        coordY.value = marker.position.$a;

        google.maps.event.addListener(marker, 'dragend', function(){
            coordX.value = marker.position.Za;
            coordY.value = marker.position.$a;
        });
    }

    function updateMarker(latLng){
        map.setCenter(latLng);
        map.setZoom(15);
        marker.setPosition(latLng);
        coordX.value = marker.position.Za;
        coordY.value = marker.position.$a;
    }
});