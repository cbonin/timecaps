$(document).ready(function () {
    

    function matchPosition(){
        
        if (navigator.geolocation){
            navigator.geolocation.getCurrentPosition(checkPosition);
        }else{
            x.innerHTML="Geolocation is not supported by this browser.";
        }
        
        function checkPosition(position){
            var latitude = Number((position.coords.latitude).toFixed(3));
            var longitude = Number((position.coords.longitude).toFixed(3));
            console.log('boiteX '+boiteX);
            console.log('boiteY '+boiteY);
            console.log('PosX '+latitude);
            console.log('PosY '+longitude);
            if((position.coords.latitude - boiteX < 0.2) && (position.coords.longitude - boiteY < 0.2)){
                console.log('zbooub victory');
                document.getElementById('position').innerHTML = position.coords.longitude + ' ' + position.coords.latitude;
                document.getElementById('unlocker').disabled = false;
                clearInterval(intervalId);
            }else{
                console.log('va niquer ta mere');
            }
        }
    }
    var intervalId = setInterval(matchPosition,5000);
    console.log(intervalId);

});