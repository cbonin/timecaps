    <?php echo validation_errors(); ?>
    <section id="edit-boite">
        <form method="POST" action="<?php echo base_url(); ?>boiteController/createBoiteBrand">
            <div id="button-ribbon">
                <h1 class="ribbon">Titre boîte</h1>
                <a href="#" title="Retour à Mes Boîtes" class="button retour">Retour</a>
                <a href="#" title="Enregistrer les modifications" class="button enregistrer">Enregistrer les modifications</a>
            </div>
            <div class="contenu clearfix">

                <div class="left">
                    <section id="destinataire-boite">
                        <h2 class="bandeau">Destinataire</h2>
                        <form>
                            <p class="left">
                                <label for="email"><span class="picto-form"></span>Adresse e-mail : <span class="asterix">*</span></label>
                                <input type="text" id="email" name="emailRecever" value="<?php echo set_value('emailRecever'); ?>" />
                            </p>
                        
                    </section>
    
                    <section id="infos-boite">
                        <h2 class="bandeau">Informations boîte</h2>
                    
                            <p class="left">
                                <label for="titre-boite"><span class="picto-form"></span>Titre : <span class="asterix">*</span></label>
                                <input type="text" id="titre-boite" name="nomBoite" value="<?php echo set_value('nomBoite'); ?>" />
                            </p>
                            <span>
                                <label for="description-boite"><span class="picto-form"></span>Description :</label>
                                <textarea id="description-boite" name="description" value="<?php echo set_value('description'); ?>"></textarea>
                            </span>
                            <span>
                                <label for="code"><span class="picto-form"></span>Code :</label>
                                <textarea id="code" name="code" value="<?php echo set_value('code'); ?>"></textarea>
                            </span>
                        
                    </section>
                </div>

                <section id="map-boite">
                        <span class="left">
                            <label for="date-boite"><span class="picto-form"></span>Date d'ouverture : <span class="asterix">*</span></label>
                            <input type="text" id="date-boite" name="targetDate" />
                        </span>
                        <span>
                            <label for="adresse-boite"><span class="picto-form"></span>Lieu d'ouverture :</label>
                            <input type="text" name="addressMap" placeholder="adresse, ville..." />
                            <button id="searchMaps" class="submit">Rechercher</button>
                        </span>
                        <input type="hidden" name="coordX" value="<?php echo set_value('coordX') ?>" />
                        <input type="hidden" name="coordY" value="<?php echo set_value('coordY') ?>" />
                        <div id="boiteMap"></div>
                </section>
            </div>
            <div id="bouton-creer">
                <input type="submit" value="Créer la boite" class="button" />
            </div>
        </form>
    </section>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script src="<?php echo base_url(); ?>assets/js/mapBoite.js"></script>
