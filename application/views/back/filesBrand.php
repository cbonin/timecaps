<?php
if (isset($files) && count($files)):

   if(!empty($files['image'])): ?>
      <div id="photos">
         <div class="scroller">
            <?php foreach ($files['image'] as $file): ?>
            <div class="item">
               <a href="<?php echo base_url().'files/brand_'.$file->idBoiteBrand.'/'.$file->nom; ?>" rel="shadowbox[images]" title="<?php echo $file->nom; ?>">
                  <img src="<?php echo base_url().'files/brand_'.$file->idBoiteBrand.'/thumb/'.$file->nom; ?>" alt="<?php echo $file->nom; ?>"/>
               </a>
                  <span class="title-item"><?php echo $file->titre; ?></span>
                  <?php
                  foreach ($depots as $d) :
                     if (in_array($file->idFile, (array)$d)) : ?>  
                        <a href="#" class="delete-contenu delete_file_link" title="Supprimer"></a>
                  <?php endif; endforeach; ?>
               
            </div>
         <?php endforeach; ?>
         </div>
      </div>
   <?php endif;

   if(!empty($files['text'])): ?>
      <div id="textes">
         <div class="scroller">
            <?php foreach ($files['text'] as $file): ?>
               <div class="item">
                  <a href="#" title="">
                     <img src="<?php echo base_url(); ?>assets/css/img/dashboard/texte.jpg" alt=""/>
                     <span class="title-item"><?php echo $file->titre; ?></span>
                     <?php
                     foreach ($depots as $d) :
                        if (in_array($file->idFile, (array)$d)) : ?>  
                           <a href="#" class="delete-contenu delete_file_link" title="Supprimer"></a>
                     <?php endif; endforeach; ?>
                  </a>
               </div>
            <?php endforeach; ?>
         </div>
      </div>
   <?php endif;

   if(!empty($files['video'])): ?>
      <div id="videos">
         <div class="scroller">
            <?php foreach ($files['video'] as $file): ?>
               <div class="item">
                  <a href="#" title="">
                     <img src="<?php echo base_url(); ?>assets/css/img/dashboard/video.jpg" alt=""/>
                     <span class="title-item"><?php echo $file->titre; ?></span>
                     <?php
                     foreach ($depots as $d) :
                        if (in_array($file->idFile, (array)$d)) : ?>  
                           <a href="#" class="delete-contenu delete_file_link" title="Supprimer"></a>
                     <?php endif; endforeach; ?>
                  </a>
               </div>
            <?php endforeach; ?>
         </div>
      </div>
   <?php endif;

   if(!empty($files['son'])): ?>
      <div id="sons">
         <div class="scroller">
            <?php foreach ($files['son'] as $file): ?>
               <div class="item">
                  <a href="#" title="">
                     <img src="<?php echo base_url(); ?>assets/css/img/dashboard/son.jpg" alt=""/>
                     <span class="title-item"><?php echo $file->titre; ?></span>
                     <?php
                     foreach ($depots as $d) :
                        if (in_array($file->idFile, (array)$d)) : ?>  
                           <a href="#" class="delete-contenu delete_file_link" title="Supprimer"></a>
                     <?php endif; endforeach; ?>
                  </a>
               </div>
            <?php endforeach; ?>
         </div>
      </div>
   <?php endif;?>

<?php else: 
   echo "<p>".NO_FILES."</p>";
endif; ?>
