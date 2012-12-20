			<section id="dash-home">
				<h1 class="ribbon"><?php echo MES_BOITES; ?></h1>
				<div id="newbox">
					<img src="<?php echo base_url(); ?>assets/css/img/dashboard/picto-newbox.png" alt="Nouvelle boîte" />
					<p><a href="<?php echo base_url(); ?>boiteController/createBoiteBrand" title="Créer une nouvelle boîte" class="button"><?php echo NOUVELLE_BOITE; ?></a></p>
				</div>

				<section id="boites-encours">
					<h2 class="bandeau"><?php echo BOITES_ENTERREES; ?></h2>
					<div>
						<div class="scroller">
							<?php if(!empty($boites)): ?>
							<?php foreach($boites as $boite): ?>
								<div class="box">
									<a href="<?php echo base_url().'boiteController/updateBoiteBrand/'.$boite->idBoiteBrand; ?>" title="">
										<span class="img-box"></span>
										<span class="title-box"><?php echo $boite->nomBoite; ?></span>
										<span class="createur collab"></span>
									</a>
									<a href="<?php echo base_url().'boiteController/deleteBoiteBrand /'.$boite->idBoiteBrand; ?>" class="delete-box" title="Supprimer"></a>
								</div>
							<?php endforeach; 
							else: 
								echo NO_BOITES; 
							endif; ?>
						</div>
					</div>
				</section>
			</section>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/scrollbar/jquery.mousewheel.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assetsjs/scrollbar/jquery.mCustomScrollbar.js"></script>
