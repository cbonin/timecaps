    <?php echo validation_errors();

    echo form_open('boiteController/create')."<br />"; ?>

        <input type="hidden" name="coordX" value="<?php set_value('coordX') ?>" />
        <input type="hidden" name="coordY" value="<?php set_value('coordY') ?>" />
        <?php
        echo form_label('Nom de la boite', 'Nom de la boite')."<br />";
        echo form_input('nomBoite', set_value('nomBoite'))."<br />";

        echo form_label('Description', 'description')."<br />";
        echo form_textarea('description', set_value('description'))."<br />";

        echo form_label('Date de débloquage', 'targetDate')."<br />";
        echo form_input('targetDate', set_value('targetDate'))."<br />";

        echo form_label('Email receveur', 'emailRecever')."<br />";
        echo form_input('emailRecever', set_value('emailRecever'))."<br />";

        echo form_label('Nom receveur', 'receverName')."<br />";
        echo form_input('receverName', set_value('receverName'))."<br />";

        echo form_label('Prénom receveur', 'receverLastName')."<br />";
        echo form_input('receverLastName', set_value('receverLastName'))."<br />";

        echo form_label('Adresse du gars', 'receverAddress')."<br />";
        echo form_input('receverAddress', set_value('receverAddress'))."<br />";

        echo form_label('Ville du gars', 'receverCity')."<br />";
        echo form_input('receverCity', set_value('receverCity'))."<br />";

        echo form_label('Code Postal du gars', 'receverZipCode')."<br />";
        echo form_input('receverZipCode', set_value('receverZipCode'))."<br />";
        
        echo form_submit('addBoite', 'Créer une boite');

    echo form_close();
    ?>

    <form id="addressMap">
        <input type="text" name="addressMap" placeholder="adresse, ville..." />
        <input type="submit" value="entrer adresse" />
    </form>
    <div id="boiteMap" style="width: 300px; height: 300px; display: block;"></div>

    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script>
        var marker;
        console.log(marker);
        var coordX = document.querySelector("input[name=coordX]");
        var coordY = document.querySelector("input[name=coordY]");

        var mapOptions = {
            zoom: 4,
            center: new google.maps.LatLng(47.15984,3.028931),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var map = new google.maps.Map(document.getElementById('boiteMap'),
        mapOptions);

        google.maps.event.addListenerOnce(map, 'click', function(e){
            var latLng = e.latLng;
            if(marker == undefined){
                createMarker(latLng);
            }
        });


        $("#addressMap").submit(function(){
            var address = document.querySelector("input[name='addressMap']");
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({"address":address.value}, function(data,status){
                if(status=='OK'){
                    map.setCenter(data[0].geometry.location);
                    map.setZoom(15);

                    if(marker == undefined){
                        createMarker(data[0].geometry.location);
                    }else{
                        updateMarker(data[0].geometry.location);
                    }
                    
                }else{

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

            coordX.value = marker.position.Za;
            coordY.value = marker.position.$a;

            google.maps.event.addListener(marker, 'dragend', function(){
                coordX.value = marker.position.Za;
                coordY.value = marker.position.$a;
            });
        }

        function updateMarker(latLng){
            marker.setPosition(latLng);
            coordX.value = marker.position.Za;
            coordY.value = marker.position.$a;
        }

        
    </script>