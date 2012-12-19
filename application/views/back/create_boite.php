    <section id="edit-boite">
        <form method="POST" action="<?php echo base_url(); ?>boiteController/create">

            <div id="button-ribbon">
                <h1 class="ribbon"><?php echo BTN_CREER;?></h1>
                <a href="#" title="Retour à Mes Boîtes" class="button retour"><?php echo BTN_RETOUR; ?></a>
            </div>
            <div class="contenu clearfix">

                <div class="left">
                    <section id="destinataire-boite">
                        <h2 class="bandeau"><?php echo DESTINATAIRE;?></h2>
                            <p class="left">
                                <label for="prenom"><span class="picto-form"></span><?php echo PRENOM;?><span class="asterix">*</span></label>
                                <input type="text" id="prenom" name="receverName" value="<?php echo set_value('receverName'); ?>" />
                            </p><p class="right">
                                <label for="nom"><span class="picto-form"></span><?php echo NOM;?><span class="asterix">*</span></label>
                                <input type="text" id="nom" name="receverLastName" value="<?php echo set_value('receverLastName'); ?>" />
                            </p>
                            <p class="left">
                                <label for="email"><span class="picto-form"></span><?php echo EMAIL;?><span class="asterix">*</span></label>
                                <input type="text" id="email" name="emailRecever" value="<?php echo set_value('emailRecever'); ?>" />
                            </p>
                    </section>
    
                    <section id="infos-boite">
                        <h2 class="bandeau"><?php echo INFORMATION_BOITE; ?></h2>
                            <p class="left">
                                <label for="titre-boite"><span class="picto-form"></span><?php echo TITRE; ?><span class="asterix">*</span></label>
                                <input type="text" id="titre-boite" name="nomBoite" value="<?php echo set_value('nomBoite'); ?>" />
                            </p>
                            <span>
                                <label for="description-boite"><span class="picto-form"></span><?php echo DESCRIPTION; ?></label>
                                <textarea id="description-boite" name="description" value="<?php echo set_value('description'); ?>"></textarea>
                            </span>
                            <span>
                                <label for="adresse-user"><span class="picto-form"></span><?php echo ADRESSE; ?></label>

                                <textarea id="adresse-user" name="receverAddress" value="<?php echo set_value('receverAddress'); ?>"></textarea>
                            </span>
                            <p class="left">
                                <label for="codep-user"><span class="picto-form"></span><?php echo CODE_POSTAL; ?></label>
                                <input type="text" id="codep-user" name="receverZipCode" value="<?php echo set_value('receverZipCode'); ?>" />
                            </p><p class="right">
                                <label for="ville-user"><span class="picto-form"></span><?php echo VILLE; ?></label>
                                <input type="text" id="ville-user" name="receverCity" value="<?php echo set_value('receverCity'); ?>" />
                            </p>
                    </section>
                </div>

                <section id="map-boite">
                        <span class="left">
                            <label for="date-boite"><span class="picto-form"></span><?php echo DATE_OUVERTURE; ?><span class="asterix">*</span></label>
                            <input type="text" id="date-boite" name="targetDate" />
                        </span>
                        <span>
                            <label for="adresse-boite"><span class="picto-form"></span><?php echo LIEU; ?></label>
                            <input type="text" name="addressMap" placeholder="adresse, ville..." />
                            <button id="searchMaps" class="submit"><?php echo RECHERCHER; ?></button>
                        </span>
                        <input type="hidden" name="coordX" value="<?php echo set_value('coordX') ?>" />
                        <input type="hidden" name="coordY" value="<?php echo set_value('coordY') ?>" />
                        <div id="boiteMap"></div>
                </section>
            </div>
            <div id="bouton-creer">
                <input type="submit" value="<?php echo BTN_CREER; ?>" class="button" />
            </div>
        </form>
    </section>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script src="<?php echo base_url(); ?>assets/js/mapBoite.js"></script>
