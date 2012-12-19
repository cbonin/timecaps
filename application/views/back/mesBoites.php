<a href="<?php echo base_url().'boiteController/create'; ?>">Creer une nouvelle boite</a>
<div>
	<h2><?php echo MES_BOITES; ?></h2>
	<?php if(!empty($boites)): ?>
	<ul>
		
		<?php foreach($boites as $boite): ?>
		<li>
			<h2><a href="<?php echo base_url().'boiteController/update/'.$boite['idBoite']; ?>"><?php echo $boite["nomBoite"]; ?></a></h2>
			<p><?php echo $boite["description"]; ?></p>
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