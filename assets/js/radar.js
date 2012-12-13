$(document).ready(function () {
    var today = new Date;
    today = today.getFullYear()+''+(today.getMonth()+1)+''+today.getDate();

    function matchPosition(){
        
        if (navigator.geolocation){
            navigator.geolocation.getCurrentPosition(checkPosition);
        }else{
            x.innerHTML="Geolocation is not supported by this browser.";
        }
        
        function checkPosition(position){
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
            console.log('boiteX '+boiteX);
            console.log('boiteY '+boiteY);
            console.log('PosX '+latitude);
            console.log('PosY '+longitude);
            if((position.coords.latitude - boiteX < 0.2) && (position.coords.longitude - boiteY < 0.2) && today >= boiteDate){
                console.log('zbooub victory');
                document.getElementById('position').innerHTML = position.coords.longitude + ' ' + position.coords.latitude;
                document.getElementById('unlocker').disabled = false;
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