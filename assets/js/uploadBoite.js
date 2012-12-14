$(document).ready(function(){
	// UPLOAD VIA AJAX

  var baseUrl = "http://localhost:8888/backwards/";
	refresh_files();
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
             url         : baseUrl+'uploadController/delete_file/' + link.data('file_id'),
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
                   refresh_files();
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