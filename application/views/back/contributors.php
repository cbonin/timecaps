<?php 
if(!empty($contributors)): ?>

<ul>
	<?php foreach($contributors as $contributor): ?>
	<li><?php echo $contributor->prenom." ".$contributor->nom; ?></li>
<?php endforeach; ?>
</ul>
<?php endif;?>
