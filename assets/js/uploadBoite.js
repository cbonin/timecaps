$(document).ready(function(){
	
  // Init de la gallerie images
  Shadowbox.init(); 

  // UPLOAD VIA AJAX
	refresh_files();
  refresh_contributors();
    $(function() {
       $('#upload_file').submit(function(e) {
          e.preventDefault();
          $.ajaxFileUpload({
             url         : baseUrl+'uploadController/upload_file/',
             secureuri      :false,
             fileElementId  :'userfile',
             dataType    : 'json',
             data        : {
                'title' : $('#title').val(),
                'idBoite' : $('input[name=idBoite]').val()
             },
             success  : function (data, status)
             {
                if(data.status != 'error')
                {
                   $('#files').html('<p>Rechargement des fichiers</p>');
                   showAlert(data.status, data.msg);
                   refresh_files();
                   $('#title').val('');
                }else{
                   showAlert(data.status, data.msg);
                }
             }
          });
          return false;
       });
    });

    function refresh_files()
    {
       $.get(baseUrl+'uploadController/files/'+idBoite) // var idBoite se crée en php dans editBoite.php
       .success(function (data){
          $('#files').html(data);
       });
    }

    $('.delete_file_link').live('click', function(e) {
       e.preventDefault();
       if (confirm('Voulez-vous vraiment supprimer ce fichier ?'))
       {
          var link = $(this);
          $.ajax({
             url         : baseUrl+'uploadController/delete_file/' + link.data('file_id')+'/'+link.data('boite-id'),
             dataType : 'json',
             success     : function (data)
             {
                files = $("#files");
                if (data.status === "success")
                {
                   link.parents('li').fadeOut('fast', function() {
                      $(this).remove();
                      if (files.find('li').length == 0)
                      {
                         files.html('<p>Aucun fichier présent</p>');
                      }
                   });
                   showAlert(data.status, data.msg);
                   refresh_files();
                   
                }
                else
                {
                   showAlert(data.status, data.msg);
                }
             }
          });
       }
    });

    function showAlert(status, message){
        $(".alertUpload").addClass(status);
        $(".alertUpload").html(message);
        $(".alertUpload").slideToggle().delay(2000).fadeOut(500, function(){
            $(this).removeClass(status);
        });
    }

    function refresh_contributors(){
        $.get(baseUrl+'boiteController/getContributors/'+idBoite) // var idBoite se crée en php dans editBoite.php
         .success(function (data){
            $('#contributors').html(data);
         });
    }
});