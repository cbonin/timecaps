$(document).ready(function () {
    // Stockage de la date du jour
    var today = new Date, rayon = 0.00000012;
    today = today.getFullYear()+''+(today.getMonth()+1)+''+today.getDate();
/*
    latitude = 50.00007;
    longitude = 3.00007;
    createMarker(new google.maps.LatLng(latitude,longitude), 'test');
    console.log('CurrentX '+latitude);
    console.log('CurrentY '+longitude);
    console.log('distance X : '+Math.abs(latitude - boiteX));
    console.log('distance Y : '+Math.abs(longitude - boiteY));
    console.log(Number((boiteX-latitude)*(boiteX-latitude) + (boiteY-longitude)*(boiteY-longitude)));
    console.log('zboub');
    console.log(Number((boiteX-latitude)*(boiteX-latitude) + (boiteY-longitude)*(boiteY-longitude)) < 0.00000001);
    console.log(0.0000000098);
    console.log(0.0000000098 < 0.00000001);
*/


    // L'utilisateur doit posséder la geolocalisation
    if (navigator.geolocation){
        var watchId = navigator.geolocation.watchPosition(checkPosition, errorCallback, {enableHighAccuracy : true});
    }else{
        x.innerHTML="La géolocalisation n'est pas disponible sur votre navigateur.";
    }
    var latitude, longitude, marker = createMarker(), i=0;

    function checkPosition(position){
        latitude = position.coords.latitude;
        longitude = position.coords.longitude;
        i++;
        // cree marker à chaque check       createMarker(new google.maps.LatLng(latitude,longitude), i+'');
        marker.setPosition(new google.maps.LatLng(latitude,longitude));

        console.log('________'+i+'________');
        console.log('CurrentX '+latitude);
        console.log('CurrentY '+longitude);
        console.log('boiteX '+boiteX);
        console.log('boiteY '+boiteY);
        console.log('accuracy '+position.coords.accuracy);

        //distance entre 2 points AB = \sqrt{(x_B-x_A)^2 + (y_B-y_A)^2}
        console.log(Number((boiteX-latitude)*(boiteX-latitude) + (boiteY-longitude)*(boiteY-longitude)));
        
        if(Number((boiteX-latitude)*(boiteX-latitude) + (boiteY-longitude)*(boiteY-longitude)) < rayon && (today >= boiteDate)){
            navigator.geolocation.clearWatch(watchId);
            $.ajax({

                url: baseUrl+urlUpdate+boiteId,  
                cache: false,
                success: function(data){
                    var button = document.createElement('button');
                    button.setAttribute('type','button');
                    button.setAttribute('id','unlocker');
                    var valeur = document.createTextNode('Déterrer la boîte');
                    button.appendChild(valeur);
                    button.className = "submit deterer-btn";
                    document.getElementById('buttonContainer').appendChild(button);
                    button.onclick = function(){
                        window.location = baseUrl+urlDisplay+boiteId;
                        return false;
                    };
                    console.log('fin success');
                },
                error: function(data){
                    alert('Erreur lors du déverouillage de la boite.');
                }
            });
        }
    }

    function errorCallback(error){
        switch(error.code){
        case error.PERMISSION_DENIED:
            alert("Vous devez autoriser l'accès à la géolocalisation pour pouvoir utiliser le service.");
            break;     
        case error.POSITION_UNAVAILABLE:
            alert("Votre emplacement n'a pas pu être déterminé");
            break;
        case error.TIMEOUT:
            alert("Le service n'a pas répondu à temps");
            break;
        }
    };

});