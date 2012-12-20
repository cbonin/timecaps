    <section id="edit-boite">
        <form method="POST" action="<?php echo base_url(); ?>boiteController/update/<?php echo $boite->idBoite; ?>">
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
                                <label for="prenom"><span class="picto-form"></span><?php echo PRENOM;?><span class="asterix">*</span></label>
                                <input type="text" id="prenom" name="receverName" disabled value="<?php echo $user->prenom; ?>" />
                            </p><p class="right">
                                <label for="nom"><span class="picto-form"></span><?php echo NOM;?><span class="asterix">*</span></label>
                                <input type="text" id="nom" name="receverLastName" disabled value="<?php echo $user->nom; ?>" />
                            </p>
                            <p class="left">
                                <label for="email"><span class="picto-form"></span><?php echo EMAIL;?><span class="asterix">*</span></label>
                                <input type="text" id="email" name="emailRecever" disabled value="<?php echo $user->email; ?>" />
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
                            <span>
                                <label for="adresse-user"><span class="picto-form"></span><?php echo ADRESSE; ?></label>
                                <textarea id="adresse-user" name="receverAddress" value=""><?php echo $boite->adresse; ?></textarea>
                            </span>
                            <p class="left">
                                <label for="codep-user"><span class="picto-form"></span><?php echo CODE_POSTAL; ?></label>
                                <input type="text" id="codep-user" name="receverZipCode" value="<?php echo $boite->codePostal; ?>" />
                            </p><p class="right">
                                <label for="ville-user"><span class="picto-form"></span><?php echo VILLE; ?></label>
                                <input type="text" id="ville-user" name="receverCity" value="<?php echo $boite->ville; ?>" />
                            </p>
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
                        <input type="hidden" name="idBoite" value="<?php echo $boite->idBoite; ?>" />
                        <input type="submit" name="submit" id="submit" class="submit" />
                    </form>
                    <div id="files"></div>
                </div>
            </section>

            <section id="contributeurs">
                <h2 class="bandeau"><?php echo CONTRIBUTEURS; ?></h2>
                <div class="boite-container">
                    <p>
                        <span class="num-contributeur">Contributeur n°1</span>
                        <label for="email"><span class="picto-form"></span>Adresse e-mail : <span class="asterix">*</span></label>
                        <input type="text" id="email" name="" />
                    </p>
                    <p>
                        <span class="num-contributeur">Contributeur n°2</span>
                        <label for="email"><span class="picto-form"></span>Adresse e-mail : <span class="asterix">*</span></label>
                        <input type="text" id="email" name="" />
                    </p>
                    <p class="bouton-ajouter"><a href="#" title="Ajouter un contributeur" class="button">+ Ajouter</a></p>
                </div>
            </section>

            </div>
            <div id="bouton-creer">
                <input type="submit" value="<?php echo BTN_ENREGISTRER; ?>" class="button" />
            </div>
        
    </section>
    <div class="alertUpload"></div>
    <script>
        var idBoite = "<?php echo $boite->idBoite; ?>";
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script src="<?php echo base_url(); ?>assets/js/mapBoite.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/ajaxfileupload.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/shadowBox/shadowbox.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/uploadBoite.js"></script>
