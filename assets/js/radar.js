$(document).ready(function () {
    // Stockage de la date du jour
    var today = new Date;
    today = today.getFullYear()+''+(today.getMonth()+1)+''+today.getDate();

    
        
    // L'utilisateur doit posséder la geolocalisation
    if (navigator.geolocation){
        var spanCurrent = document.getElementById('currentPosition');
        document.getElementById('targetPosition').innerHTML = boiteX + ' ' +   boiteY;
        var watchId = navigator.geolocation.watchPosition(checkPosition, errorCallback);
    }else{
        x.innerHTML="La géolocalisation n'est pas disponible sur votre navigateur.";
    }
    var latitude, longitude, marker = createMarker();

    function checkPosition(position){
        latitude = position.coords.latitude;
        longitude = position.coords.longitude;
        marker.setPosition(new google.maps.LatLng(latitude,longitude));

        console.log('CurrentX '+latitude);
        console.log('CurrentY '+longitude);
        console.log('boiteX '+boiteX);
        console.log('boiteY '+boiteY);

        spanCurrent.innerHTML = position.coords.latitude + ' ' + position.coords.longitude;
        if((position.coords.latitude - boiteX < 0.0002) && (position.coords.longitude - boiteY < 0.0002) && (today >= boiteDate)){
            navigator.geolocation.clearWatch(watchId);
            $.ajax({
                url: baseUrl+'boiteController/updateStatus/'+boiteId,
                cache: false,
                success: function(data){
                    var button = document.createElement('button');
                    button.setAttribute('type','button');
                    button.setAttribute('id','unlocker');
                    var valeur = document.createTextNode('Déterrer la boîte');
                    button.appendChild(valeur);
                    document.getElementById('buttonContainer').appendChild(button);
                    button.click(function (){
                        document.location.href = baseUrl;
                    });
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