$(document).ready(function(){
	//	FACEBOOK CONNECT

	$("#share").click(function(){
		shareFacebookAction();
		return false;
	});

	if(connected){
		
	}else{
		FB.Event.subscribe('auth.login', function(response)
		{
		    FB.api('/me', function(response) { //object reponse contient les donnée user .log(response);
				var profilePicUrl = 'http://graph.facebook.com/' + response.id + '/picture';
				$('#fb-profile-pic').html('<img src="' + profilePicUrl + '" alt="#" />');
				$('#fb-name').html('<p><a href="' + response.link + '"><strong>' + response.name + '</strong></a>');
				$('#logout').html('<a href="#" id="facebook-logout">Deconnexion</a>');
				$.ajax({
					type: "POST",
					url: baseUrl+"userController/signInFB",
					data: { prenom: response.first_name, nom: response.last_name, email: response.email, id: response.id },
					success : function(data){
						console.log(data);
						if(data.status != 'already connected'){
							document.location = baseUrl;
						}
					}
				});
			});
		});
	}

	
	
	FB.getLoginStatus(function(response) { //si l'user est deja connecté
		console.log(response);
	    if (response.status == "connected"){
			var profilePicUrl = 'http://graph.facebook.com/' + response.id + '/picture';
			$('#fb-profile-pic').html('<img src="' + profilePicUrl + '" alt="#" />');
			$('#fb-name').html('<p><a href="' + response.link + '"><strong>' + response.name + '</strong></a>');
			$('#logout').html('<a href="#" id="facebook-logout">Déconnexion</a>');
	    }else{
			$('#logout').html('<a href="'+baseUrl+'userController/logout">Deconnexion</a>');
	    }
	
	});
	
	$('#facebook-logout').live('click', function() { //bouton de déconnexion
	    FB.logout(function(response) {
	        $.ajax({
				url: baseUrl+"userController/logout",
				success : function(data){
					document.location = baseUrl;
				}
			});
	    });
	    return false;
	});
	
	function shareFacebookAction(){
	  FB.api(
	    '/me/backwards:Creer',
	    'post',
	    { boite: 'http://localhost:8888/backwards/' },
	    function(response) {
	       if (!response || response.error) {
	          console.log(response.error);
	          alert('erreur');
	       } else {
	          alert('Cook was successful! Action ID: ' + response.id);
	       }
	    });
	}
});