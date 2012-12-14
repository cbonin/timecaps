$(document).ready(function(){

    var baseUrl = "http://localhost:8888/backwards/";
    refresh_files();

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
    }else{
        mapOptions = {
            zoom: 4,
            center: new google.maps.LatLng(47.15984,3.028931),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById('boiteMap'), mapOptions);
    }

    if(coordX == '' && coordY == ''){
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

    function updateMarker(LatLng){
        
    }

    function updateMarker(latLng){
        map.setCenter(latLng);
        map.setZoom(15);
        marker.setPosition(latLng);
        coordX.value = marker.position.Za;
        coordY.value = marker.position.$a;
    }


    // UPLOAD VIA AJAX

    $(function() {
       $('#upload_file').submit(function(e) {
          e.preventDefault();
          $.ajaxFileUpload({
             url         : baseUrl+'/uploadController/upload_file/',
             secureuri      :false,
             fileElementId  :'userfile',
             dataType    : 'json',
             data        : {
                'title'           : $('#title').val()
             },
             success  : function (data, status)
             {
                if(data.status != 'error')
                {
                   $('#files').html('<p>Reloading files...</p>');
                   refresh_files();
                   $('#title').val('');
                }
                alert(data.msg);
             }
          });
          return false;
       });
    });

    function refresh_files()
    {
       $.get('./upload/files/')
       .success(function (data){
          $('#files').html(data);
       });
    }

    $('.delete_file_link').live('click', function(e) {
       e.preventDefault();
       if (confirm('Are you sure you want to delete this file?'))
       {
          var link = $(this);
          $.ajax({
             url         : './upload/delete_file/' + link.data('file_id'),
             dataType : 'json',
             success     : function (data)
             {
                files = $(#files);
                if (data.status === "success")
                {
                   link.parents('li').fadeOut('fast', function() {
                      $(this).remove();
                      if (files.find('li').length == 0)
                      {
                         files.html('<p>No Files Uploaded</p>');
                      }
                   });
                }
                else
                {
                   alert(data.msg);
                }
             }
          });
       }
    });























});