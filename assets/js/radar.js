$(document).ready(function () {
    var today = new Date;
    today = today.getFullYear()+''+(today.getMonth()+1)+''+today.getDate();

    function matchPosition(){
        
        if (navigator.geolocation){
            var spanCurrent = document.getElementById('currentPosition');
            document.getElementById('targetPosition').innerHTML = boiteX + ' ' +   boiteY;
            navigator.geolocation.getCurrentPosition(checkPosition);
        }else{
            x.innerHTML="Geolocation is not supported by this browser.";
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
                
                var button = document.createElement('button');
                button.setAttribute('type','button');
                button.setAttribute('id','unlocker');
                var valeur = document.createTextNode('Déterrer la boîte');
                button.appendChild(valeur);
                document.getElementById('buttonContainer').appendChild(button);

                $.ajax({
                    url: base_url+'controllers/updateStatus/'+boiteId, //Obtenir en ajax la liste des chops les plus proche... Triés par distance et notes
                    cache: false,
                    success: function(data){
                        alert('Ajax ok du zboub');
                    },
                    error: function(data){
                        alert('Ajax failed');
                    }
                });

                clearInterval(intervalId);
            }else{
                console.log('va niquer ta mere');
            }
        }
    }
    matchPosition();
    var intervalId = setInterval(matchPosition,5000);
    console.log(intervalId);

});