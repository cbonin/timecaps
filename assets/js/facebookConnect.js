$(document).ready(function(){
	//	FACEBOOK CONNECT

	$("#share").click(function(){
		shareFacebookAction();
		return false;
	});

	FB.Event.subscribe('auth.login', function(response) { // Si l'user n'est pas connecté
	    FB.api('/me', function(response) { //object reponse contient les donnée user 
	    	console.log(response);
			var profilePicUrl = 'http://graph.facebook.com/' + response.id + '/picture';
			$('#fb-profile-pic').html('<img src="' + profilePicUrl + '" alt="#" />');
			$('#fb-name').html('<p><a href="' + response.link + '"><strong>' + response.name + '</strong></a>');
			$('#logout').html('<a href="#" id="facebook-logout">Deconnexion</a>');
		});
	});
	
	FB.getLoginStatus(function(response) { //si l'user est deja connecté
		console.log(response);
	    if (response.status == "connected"){
	       var profilePicUrl = 'http://graph.facebook.com/' + response.id + '/picture';
	       $('#fb-profile-pic').html('<img src="' + profilePicUrl + '" alt="#" />');
	       $('#fb-name').html('<p><a href="' + response.link + '"><strong>' + response.name + '</strong></a>');
	       $('#facebook-logout').html('<a href="#" id="facebook-logout">Deconnexion</a>');
	       $('#fb-connect').slideToggle(500);
	       $('#qrcode').slideToggle(500);
	    }
	
	});
	
	$('#facebook-logout').live('click', function() { //bouton de déconnexion
	    FB.logout(function(response) {
	        document.location.href="http://localhost:8888/backwards";
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