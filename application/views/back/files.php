<?php
if (isset($files) && count($files))
{
   ?>
      <ul>
         <?php
         foreach ($files as $file)
         {
            ?>
            <li class="image_wrap">
               <a href="#" class="delete_file_link" data-file_id="<?php echo $file->idFile?>">Delete</a>
               <strong><?php echo $file->titre; ?></strong>
               <br />
               <?php echo $file->nom; ?>
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
