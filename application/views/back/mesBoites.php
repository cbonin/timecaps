<a href="<?php echo base_url().'boiteController/create'; ?>">Creer une nouvelle boite</a>
<div>
	<h2><?php echo MES_BOITES; ?></h2>
	<?php if(!empty($boites)): ?>
	<ul>
		
		<?php foreach($boites as $boite): ?>
		<li>
			<h2><a href="<?php echo base_url().'boiteController/update/'.$boite->idBoite; ?>"><?php echo $boite->nomBoite; ?></a></h2>
			<p><?php echo $boite->description; ?></p>
		</li>
		<?php endforeach; ?>

	</ul>
	<?php else: echo "Cette boite n'existes pas"; endif; ?></div>
</div>
	
<div>
	<h2>Boites où je contribue</h2>
	<?php if(!empty($boitesContributor)): ?>
	<ul>
		
		<?php foreach($boitesContributor as $bc): ?>
		<li>
			<h2><a href="<?php echo base_url().'boiteController/update/'.$bc->idBoite; ?>"><?php echo $bc->nomBoite; ?></a></h2>
			<p><?php echo $bc->description; ?></p>
		</li>
		<?php endforeach; ?>

	</ul>
	<?php else: echo "Vous ne contribuez à aucune boite pour le moment."; endif; ?></div>
</div>

<div>
	<h2>Boites à ouvrir</h2>
	<?php if(!empty($boitesReceiver)): ?>
	<ul>
		<?php foreach($boitesReceiver as $boite): ?>
		<li>
			<h2><a href="<?php echo base_url().'boiteController/openBoite/'.$boite->idBoite; ?>"><?php echo $boite->nomBoite; ?></a></h2>
			<p><?php echo $boite->description; ?></p>
		</li>
		<?php endforeach; ?>
	</ul>

	<?php else: echo "Vous n'avez aucune boite à ouvrir pour le moment."; endif; ?>

</div>

<section id="dash-home">
				<h1 class="ribbon"><?php echo MES_BOITES; ?></h1>
				<div id="newbox">
					<img src="img/dashboard/picto-newbox.png" alt="Nouvelle boîte" />
					<p><a href="#" title="Créer une nouvelle boîte" class="button">+ Nouvelle boîte</a></p>
				</div>

				<section id="boites-encours">
					<h2 class="bandeau">Boîtes en cours</h2>
					<div>
						<div class="scroller">
							<?php if(!empty($boites)): ?>
							<?php foreach($boites as $boite): ?>
								<div class="box">
									<a href="<?php echo base_url().'boiteController/update/'.$boite->idBoite; ?>" title="">
										<span class="img-box"></span>
										<span class="title-box"><?php echo $boite->nomBoite; ?></span>
										<span class="createur collab"></span>
									</a>
									<a href="<?php echo base_url().'boiteController/delete/'.$boite->idBoite; ?>" class="delete-box" title="Supprimer"></a>
								</div>
							<?php endforeach; 
							else: 
								echo NO_BOITES; 
							endif; ?>
						</div>
					</div>
				</section>

				<section id="boites-locked">
					<h2 class="bandeau">Boîtes enterrées</h2>
					<div>
						<div class="scroller">
							<div class="box">
								<a href="#" title="">
									<span class="img-box"></span>
									<span class="title-box">Titre boîte 1</span>
									<span class="createur collab"></span>
								</a>
								<a href="#" class="delete-box" title="Supprimer"></a>
							</div>
						</div>
					</div>
				</section>

				<section id="boites-open">
					<h2 class="bandeau">Boîtes ouvertes</h2>
					<div>
						<div class="scroller">
							<div class="box">
								<a href="#" title="">
									<span class="img-box"></span>
									<span class="title-box">Titre boîte 1</span>
									<span class="createur collab"></span>
								</a>
								<a href="#" class="delete-box" title="Supprimer"></a>
							</div>
							<div class="box">
								<a href="#" title="">
									<span class="img-box"></span>
									<span class="title-box">Titre boîte 1</span>
									<span class="createur collab"></span>
								</a>
								<a href="#" class="delete-box" title="Supprimer"></a>
							</div>
							<div class="box">
								<a href="#" title="">
									<span class="img-box"></span>
									<span class="title-box">Titre boîte 1</span>
									<span class="createur collab"></span>
								</a>
								<a href="#" class="delete-box" title="Supprimer"></a>
							</div>
							<div class="box">
								<a href="#" title="">
									<span class="img-box"></span>
									<span class="title-box">Titre boîte 1</span>
									<span class="createur collab"></span>
								</a>
								<a href="#" class="delete-box" title="Supprimer"></a>
							</div>
						</div>
					</div>
				</section>

			</section>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/scrollbar/jquery.mousewheel.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assetsjs/scrollbar/jquery.mCustomScrollbar.js"></script>
