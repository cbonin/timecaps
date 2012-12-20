<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Titre boîte ⎪ Backwards</title>
    <meta name="description" content="Bienvenue sur Backwards. Venez découvrir ">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/stylesMobile.css">
    <script type="text/javascript" language="javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    
    <link rel="shortcut icon" type="image/png" href="img/favicon.png" />
    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
</head>
<body>

<?php if(!isLogged()): 
    
?>

    <header>
        <section>
            <div id="logo">
                <a href="index.php"><img src="<?php echo base_url(); ?>assets/css/img/logo.png" alt="Logo Backwards" title="Backwards" /></a>
            </div>
            <div id="connect">
                <a href="#" title="Connexion">Déconnexion</a>
            </div>
            <p id="user"><?php echo $user['prenom']; ?> <?php echo $user['nom']; ?></p>
            <span id="ellipse"><img src="<?php echo base_url(); ?>assets/css/img/ellipse-header.png" alt="Ellipse head"/></span>
        </section>
    </header>



    <p>Vous devez être connecté pour voir le contenu de la boite</p>
<?php else: 
    if(!empty($boite)):
        if(boiteOpenable($boite)): ?>

            <div id="boiteMap" style="width: 300px; height: 300px; display: block;"></div>
            Position de la boite
            <span id='targetPosition'>X ; Y</span><br/>
            Ta Position
            <span id='currentPosition'>X ; Y</span>
            <div id='buttonContainer'></div>
            <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
            <script>
                var boiteId = "<?php echo $boite->idBoite; ?>";
                var boiteX = Number("<?php echo $boite->coordX; ?>");
                var boiteY = Number("<?php echo $boite->coordY; ?>");
                var boiteDate = "<?php echo str_replace('-', '', $boite->targetDate); ?>";
                var baseUrl = "<?php echo base_url(); ?>";
                var mapOptions;
                var map;
                /*
                boiteX = 50;
                boiteY = 3;
                */
                var coord = new google.maps.LatLng(boiteX,boiteY);

                mapOptions = {
                    zoom: 19,
                    center: coord,
                    mapTypeId: google.maps.MapTypeId.SATELLITE
                };
                map = new google.maps.Map(document.getElementById('boiteMap'), mapOptions);
                
                var circle = new google.maps.Circle({
                    center: coord,
                    radius: 25,
                    map: map,
                    fillColor: '#2e8d8d',
                    fillOpacity: 0.5,
                    strokeColor: '#288182',
                    strokeOpacity: 0.6
                });

                createMarker(coord, 'Déterre moi !');

                function createMarker(latLng, markerTitle){
                    marker = new google.maps.Marker({
                        position: latLng,
                        draggable: false,
                        map: map,
                        title: markerTitle
                    });
                    return marker;
                }
            </script>
        <?php else: ?>
            <p><img src="<?php echo base_url(); ?>/assets/css/img/Fin1.png" alt="Attnedre un peu" /></p>
            <p>Il est trop tôt pour ouvrir la boîte, veuillez réessayer après le <?php echo date("d/m/Y", strtotime($boite->targetDate)); ?></p>
        <?php endif; ?>
    <?php else: ?>
        <p>Cette boite n'existe pas...</p>
    <?php endif; 
endif; ?>
<script src="http://connect.facebook.net/fr_FR/all.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/redirection-mobile.js"></script>
<script>
    FB.init({
        appId  : '303205766457764',
        status : true, // verifie le statut de la connexion
        cookie : true, // active les cookies pour que le serveur puisse accéder à la session
        xfbml  : true  // active le XFBML (HTML de Facebook)
    });
    SA.redirection_mobile ({
        tablet_redirection : "true",
        mobile_url : baseUrl+"boiteController/openBoiteMobile/<?php echo $boite->idBoite; ?>",
    });
</script>
<script src="<?php echo base_url(); ?>assets/js/facebookConnect.js"></script>
<script src="<?php echo base_url(); ?>assets/js/radar.js"></script>