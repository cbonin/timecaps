$(document).ready(function () {
    // Stockage de la date du jour
    var today = new Date;
    today = today.getFullYear()+''+(today.getMonth()+1)+''+today.getDate();

    function matchPosition(){
        
        // L'utilisateur doit posséder la geolocalisation
        if (navigator.geolocation){
            var spanCurrent = document.getElementById('currentPosition');
            document.getElementById('targetPosition').innerHTML = boiteX + ' ' +   boiteY;
            navigator.geolocation.getCurrentPosition(checkPosition, errorCallback);
        }else{
            x.innerHTML="La géolocalisation n'est pas disponible sur votre navigateur.";
        }
        
        function checkPosition(position){
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
            console.log('PosX '+latitude);
            console.log('PosY '+longitude);
            console.log('boiteX '+boiteX);
            console.log('boiteY '+boiteY);
            spanCurrent.innerHTML = position.coords.latitude + ' ' + position.coords.longitude;
            if((position.coords.latitude - boiteX < 0.2) && (position.coords.longitude - boiteY < 0.2) && (today >= boiteDate)){
                console.log('zbooub victory');
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
                    },
                    error: function(data){
                        alert('Erreur lors du déverouillage de la boite.');
                    }
                });
                clearInterval(intervalId);
            }else{
                console.log('va niquer ta mere');
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
            navigator.geolocation.getCurrentPosition(checkPosition, errorCallback);
        };
    }
    matchPosition();
    var intervalId = setInterval(matchPosition,5000);
    console.log(intervalId);

});