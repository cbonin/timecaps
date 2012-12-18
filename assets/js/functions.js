$(document).ready(function(){

	$('#retour-haut a').click(function(e) {
		e.preventDefault();
		$( 'html, body' ).animate( {scrollTop: 0}, 700 );
	});

	// Ouverture et fermeture des pop ups

	$(".connexion-btn").live('click', function(){
		$("#shadow-layer").fadeIn(500, function(){
			$("#connexion-box").slideDown(300, function(){
				$(document).keyup(function(e) {
					if (e.keyCode == 27) {
						$("#connexion-box").slideUp(500, function(){
							$("#shadow-layer").fadeOut(500);
						});
					}
				});
			});
		});
		return false;
	});

	$(".inscription-btn").live('click', function(){
		$("#shadow-layer").fadeIn(500, function(){
			$("#inscription-box").slideDown(300, function(){
				$(document).keyup(function(e) {
					if (e.keyCode == 27) {
						$("#inscription-box").slideUp(500, function(){
							$("#shadow-layer").fadeOut(500);
						});
					}
				});
			});
		});
		return false;
	});
});