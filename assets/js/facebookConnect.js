$(document).ready(function(){
	//	FACEBOOK CONNECT

	if(connected){
		//do something
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
							document.location = baseUrl+'boiteController';
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
			$('.logout-btn').attr('id','facebook-logout');
			if(shareFB != undefined){
				shareFacebookAction();
			}
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

	$("#unlocker").live('click', function(){
		shareFacebookAction();
	});
	
	function shareFacebookAction(){
	  FB.api(
	    '/me/backwards_app:open',
	    'post',
	    { box: currentUrl },
	    function(response) {
	       if (!response || response.error) {
	          console.log(response.error);
	          alert('erreur');
	          return true;
	       } else {
	          alert('Cook was successful! Action ID: ' + response.id);
	          return true;
	       }
	    });
	}
});