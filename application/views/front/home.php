
			<section id="intro">
				<p><?php echo TXT_PRINCIPE;?>
					<!--Avec Backwards, permettez à n'importe qui de revivre les moments forts qui ont marqué leur vie.--></p>
				<p style="margin:5px 0;font-size:1.1em;"><?php echo OFFREZ; ?></p>
				<div id="intro-num">
					<p><span><?php echo($nbBoites); ?></span> <?php echo BOITES_ENTERREES; ?></p>
					<p class="middle"><span><?php echo($openBoites); ?></span> <?php echo BOITES_OUVERTES; ?></p>
					<p class="last"><span>100%</span> <?php echo SOUVENIRS; ?></p>
				</div>
				<?php if(!isLogged()){ ?>
					<a href="#" title="Inscription" class="button inscription-btn"><?php echo INSCRIVEZ_VOUS; ?></a>
				<?php } ?>
			</section>
			<section id="schema-home">
				<h1 class="ribbon"><?php echo BACKWARDS_TITLE; ?></h1>
				<div class="content-main">
					<div class="bloc" id="schema1">
						<div class="texte-bloc">
							<span class="num">1</span>
							<div>
								<h2><?php echo CREEZ; ?></h2>
								<p><?php echo TXT_CREEZ; ?></p>
							</div>
						</div>
						<img src="<?php echo base_url(); ?>assets/css/img/schema-picto1.png" alt="Création d'une boîte" />
					</div>
					<div class="bloc" id="schema2">
						<div class="texte-bloc">
							<span class="num">2</span>
							<div>
								<h2><?php echo CADEAU; ?></h2>
								<p><?php echo TXT_CADEAU; ?></p>
							</div>
						</div>
						<img src="<?php echo base_url(); ?>assets/css/img/schema-picto2.png" alt="Ouverture d'une boîte" />
					</div>
					<div class="bloc" id="schema3">
						<div class="texte-bloc">
							<span class="num">3</span>
							<div>
								<h2><?php echo EMOTIONS; ?></h2>
							</div>
						</div>
						<img src="<?php echo base_url(); ?>assets/css/img/schema-picto3.png" alt="Une boîte pleine d'émotions" />
					</div>
					<div class="center">
						<a href="#" title="Créer sa première boîte"><?php echo COMMENCER; ?></a>
					</div>
				</div>
			</section>
		