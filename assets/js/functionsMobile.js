$(document).ready(function(){

	$('#retour-haut a').click(function(e) {
		e.preventDefault();
		$( 'html, body' ).animate( {scrollTop: 0}, 700 );
	});

	/* MAP Responsive */
	$('#map-mobile').fitMaps();

});