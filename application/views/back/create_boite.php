    <?php echo validation_errors();

    echo form_open('boiteController/create')."<br />"; ?>

        
        <?php
        echo form_label('Nom de la boite', 'Nom de la boite')."<br />";
        echo form_input('nomBoite', set_value('nomBoite'))."<br />";

        echo form_label('Description', 'description')."<br />";
        echo form_textarea('description', set_value('description'))."<br />";

        echo form_label('Date de débloquage', 'targetDate')."<br />";
        echo form_input('targetDate', set_value('targetDate'))."<br />";

        echo form_label('Email receveur', 'emailRecever')."<br />";
        echo form_input('emailRecever', set_value('emailRecever'))."<br />";

        echo form_label('Nom receveur', 'receverName')."<br />";
        echo form_input('receverName', set_value('receverName'))."<br />";

        echo form_label('Prénom receveur', 'receverLastName')."<br />";
        echo form_input('receverLastName', set_value('receverLastName'))."<br />";

        echo form_label('Adresse du gars', 'receverAddress')."<br />";
        echo form_input('receverAddress', set_value('receverAddress'))."<br />";

        echo form_label('Ville du gars', 'receverCity')."<br />";
        echo form_input('receverCity', set_value('receverCity'))."<br />";

        echo form_label('Code Postal du gars', 'receverZipCode')."<br />";
        echo form_input('receverZipCode', set_value('receverZipCode'))."<br />";

        echo form_submit('addBoite', 'Créer une boite');

    echo form_close();
    ?>

    <form id="addressMap">
        <input type="text" name="addressMap" placeholder="adresse, ville..." />
        <input type="submit" value="entrer adresse" />
    </form>
    <div id="boiteMap" style="width: 300px; height: 300px; display: block;"></div>

    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script src="<?php echo base_url(); ?>assets/js/mapBoite.js"></script>

    <section id="edit-boite">
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
                                    <label for="prenom"><span class="picto-form"></span>Prénom : <span class="asterix">*</span></label>
                                    <input type="text" id="prenom" name="receverName" value="<?php echo set_value('receverName'); ?>" />
                                </p><p class="right">
                                    <label for="nom"><span class="picto-form"></span>Nom : <span class="asterix">*</span></label>
                                    <input type="text" id="nom" name="receverLastName" value="<?php echo set_value('receverLastName'); ?>" />
                                </p>
                                <p class="left">
                                    <label for="email"><span class="picto-form"></span>Adresse e-mail : <span class="asterix">*</span></label>
                                    <input type="text" id="email" name="emailRecever" />
                                </p>
                            </form>
                        </section>
        
                        <section id="infos-boite">
                            <h2 class="bandeau">Informations boîte</h2>
                            <form>
                                <p class="left">
                                    <label for="titre-boite"><span class="picto-form"></span>Titre : <span class="asterix">*</span></label>
                                    <input type="text" id="titre-boite" name="nomBoite" />
                                </p>
                                <span>
                                    <label for="description-boite"><span class="picto-form"></span>Description :</label>
                                    <textarea id="description-boite" name="description"></textarea>
                                </span>
                                <span>
                                    <label for="adresse-user"><span class="picto-form"></span>Adresse postale du destinataire :</label>
                                    <textarea id="adresse-user" name="receverAddress"></textarea>
                                </span>
                                <p class="left">
                                    <label for="codep-user"><span class="picto-form"></span>Code postal :</label>
                                    <input type="text" id="codep-user" name="receverZipCode" />
                                </p><p class="right">
                                    <label for="ville-user"><span class="picto-form"></span>Ville :</label>
                                    <input type="text" id="ville-user" name="receverCity" />
                                </p>
                            </form>
                        </section>
                    </div>

                    <section id="map-boite">
                        <form>
                            <span class="left">
                                <label for="date-boite"><span class="picto-form"></span>Date d'ouverture : <span class="asterix">*</span></label>
                                <input type="text" id="date-boite" name="" />
                            </span>
                            <span>
                                <label for="adresse-boite"><span class="picto-form"></span>Lieu d'ouverture :</label>
                                <input type="text" id="adresse-boite" name="" />
                            </span>
                            <input type="hidden" name="coordX" value="<?php echo set_value('coordX') ?>" />
                            <input type="hidden" name="coordY" value="<?php echo set_value('coordY') ?>" />
                            <div id="map">
                                MAP
                            </div>
                        </form>
                    </section>
                </div>
                <div id="bouton-creer">
                    <a href="#" title="Créer la boîte" class="button">Créer la boîte</a>
                </div>
            </section>
