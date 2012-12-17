<?php
if (isset($files) && count($files))
{
   ?>

      <h2>Images</h2>
      <ul>
         <?php
         foreach ($files['image'] as $file)
         {
            ?>
            <li class="image_wrap">
               
               <?php
               foreach ($depots as $d) :
                  if (in_array($file->idFile, (array)$d)) : ?>  
                     <a href="#" class="delete_file_link" data-file_id="<?php echo $file->idFile?>" data-boite-id="<?php echo $file->idBoite; ?>">Supprimer</a>
                  <?php endif;
               endforeach; ?>
               
               <strong><?php echo $file->titre; ?></strong>
               <br />
               <a href="<?php echo base_url().'files/'.$file->idBoite.'/'.$file->nom; ?>" rel="shadowbox[images]" title="<?php echo $file->nom; ?>"><img src="<?php echo base_url().'files/'.$file->idBoite.'/thumb/'.$file->nom; ?>" alt="<?php echo $file->nom; ?>" /></a>
            </li>
            <?php
         }
         ?>
      </ul>

      <h2>Texte</h2>
      <ul>
         <?php
         foreach ($files['text'] as $file)
         {
            ?>
            <li class="image_wrap">
               <a href="#" class="delete_file_link" data-file_id="<?php echo $file->idFile?>" data-boite-id="<?php echo $file->idBoite; ?>">Supprimer</a>
               <strong><?php echo $file->titre; ?></strong>
               <br />
               <a href="<?php echo base_url().'files/'.$file->idBoite.'/'.$file->nom; ?>" title="<?php echo $file->nom; ?>"><?php echo $file->nom; ?></a>
            </li>
            <?php
         }
         ?>
      </ul>

      <h2>Sons</h2>
      <ul>
         <?php
         foreach ($files['son'] as $file)
         {
            ?>
            <li class="image_wrap">
               <a href="#" class="delete_file_link" data-file_id="<?php echo $file->idFile?>" data-boite-id="<?php echo $file->idBoite; ?>">Supprimer</a>
               <strong><?php echo $file->titre; ?></strong>
               <br />
               <a href="<?php echo base_url().'files/'.$file->idBoite.'/'.$file->nom; ?>" title="<?php echo $file->nom; ?>"><?php echo $file->nom; ?></a>
            </li>
            <?php
         }
         ?>
      </ul>

      <h2>Vidéos</h2>
      <ul>
         <?php
         foreach ($files['video'] as $file)
         {
            ?>
            <li class="image_wrap">
               <a href="#" class="delete_file_link" data-file_id="<?php echo $file->idFile?>" data-boite-id="<?php echo $file->idBoite; ?>">Supprimer</a>
               <strong><?php echo $file->titre; ?></strong>
               <br />
               <a href="<?php echo base_url().'files/'.$file->idBoite.'/'.$file->nom; ?>" title="<?php echo $file->nom; ?>"><?php echo $file->nom; ?></a>
            </li>
            <?php
         }
         ?>
      </ul>


   </form>
   <?php
}
else
{
   ?>
   <p>Aucun fichier pour le moment</p>
   <?php
}
