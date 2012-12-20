<? echo validation_errors(); ?>
    <section id="edit-boite">
        <form method="POST" action="<?php echo base_url(); ?>boiteController/updateBoiteBrand/<?php echo $boite->idBoiteBrand; ?>"  enctype="multipart/form-data">
            <div id="button-ribbon">
                <h1 class="ribbon"><?php echo $boite->nomBoite;?></h1>
                <a href="<?php echo base_url(); ?>/boiteController" title="Retour à Mes Boîtes" class="button retour"><?php echo BTN_RETOUR; ?></a>
                <input type="submit" class="button enregistrer" value="<?php echo BTN_ENREGISTRER; ?>" />
            </div>
            <div class="contenu clearfix">

                <div class="left">
                    <section id="destinataire-boite">
                        <h2 class="bandeau"><?php echo DESTINATAIRE;?></h2>
                        <div class="boite-container">
                            <p class="left">
                                <label for="mailing"><span class="picto-form"></span><?php echo 'mailing list'; ?><span class="asterix">*</span></label>
                                <input type="file" name="mailing" id="mailing" size="20" />
                            </p>
                        </div>
                    </section>
    
                    <section id="infos-boite">
                        <h2 class="bandeau"><?php echo INFORMATION_BOITE; ?></h2>
                        <div class="boite-container">
                            <p class="left">
                                <label for="titre-boite"><span class="picto-form"></span><?php echo TITRE; ?><span class="asterix">*</span></label>
                                <input type="text" id="titre-boite" name="nomBoite" value="<?php echo $boite->nomBoite; ?>" />
                            </p>
                            <span>
                                <label for="description-boite"><span class="picto-form"></span><?php echo DESCRIPTION; ?></label>
                                <textarea id="description-boite" name="description" value=""><?php echo $boite->description; ?></textarea>
                            </span>
                        </div>
                    </section>
                </div>

                <section id="map-boite">
                    <span class="left">
                        <label for="date-boite"><span class="picto-form"></span><?php echo DATE_OUVERTURE; ?><span class="asterix">*</span></label>
                        <input type="text" id="date-boite" name="targetDate" value="<?php echo $boite->targetDate; ?>"/>
                    </span>
                    <span>
                        <label for="adresse-boite"><span class="picto-form"></span><?php echo LIEU; ?></label>
                        <input type="text" name="addressMap" value="" placeholder="Entrez une adresse pour modifier le marqueur"/>
                        <button id="searchMaps" class="submit"><?php echo RECHERCHER; ?></button>
                    </span>
                    <input type="hidden" name="coordX" value="<?php echo $boite->coordX; ?>" />
                    <input type="hidden" name="coordY" value="<?php echo $boite->coordY; ?>" />
                    <div id="boiteMap"></div>
                </section>
            </form>

            <section id="contenu-boite">
                <h2 class="bandeau"><?php echo CONTENU; ?></h2>
                <div class="boite-container">
                    <form method="post" action="" id="upload_file">
                        <input type="text" name="title" id="title" value="" placeholder="<?php echo TITRE; ?>" />
                        <input type="file" name="userfile" id="userfile" size="20" />
                        <input type="hidden" name="idBoite" value="<?php echo $boite->idBoiteBrand; ?>" />
                        <input type="submit" name="submit" id="submit" class="submit" />
                    </form>
                    <div id="files"></div>
                </div>
            </section>

            </div>

        
    </section>
    <div class="alertUpload"></div>
    <script>
        var idBoite = "<?php echo $boite->idBoiteBrand; ?>";
        var isBrand = true;
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script src="<?php echo base_url(); ?>assets/js/mapBoite.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/ajaxfileupload.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/shadowBox/shadowbox.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/uploadBoiteBrand.js"></script>
