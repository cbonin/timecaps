<section id="boites-attente">
	<h1>Boîtes à déterrer</h1>
	<div id="liste-boites">
		<?php 
		if(isLogged()):
			if(!empty($boites)): 
				foreach($boites as $boite):
					if(boiteOpenable($boite)): ?>
						<a href="<?php echo base_url(); ?>boiteController/openBoiteMobile/<?php echo $boite->idBoite; ?>">
					<?php endif; ?>
					<div class="box clearfix <?php if(!boiteOpenable($boite)){echo "dateinvalid"; } ?>">
						<span class="boite"></span>
						<p><?php echo $boite->nomBoite; ?></p>
						<span class="date-open <?php if(boiteOpenable($boite)){echo "datevalid"; } ?>"><?php echo formatDate($boite->targetDate); ?></span>
					</div>
					<?php if(boiteOpenable($boite)): ?>
						</a>
					<?php endif; ?>
				<?php endforeach; 
			endif; ?>
		<?php else: ?>
			<p>Vous devez être connecté pour accèder à la boite</p>
		<?php endif; ?>
	</div>
</section>