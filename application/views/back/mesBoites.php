<a href="<?php echo base_url().'boiteController/create'; ?>">Creer une nouvelle boite</a>
<?php if(!empty($boites)): ?>
<ul>
	<?php foreach($boites as $boite): ?>
	<li>
		<h2><a href="<?php echo base_url().'boiteController/update/'.$boite['idBoite']; ?>"><?php echo $boite["nomBoite"]; ?></a></h2>
		<p><?php echo $boite["description"]; ?></p>
	</li>
	<?php endforeach; ?>

</ul>

<?php else: echo "Cette boite n'existes pas"; endif; ?>