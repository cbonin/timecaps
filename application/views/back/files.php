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
               <a href="#" class="delete_file_link" data-file_id="<?php echo $file->idFile?>">Supprimer</a>
               <strong><?php echo $file->titre; ?></strong>
               <br />
               <?php
                  $pattern = '/^image/';
                  $result = preg_match($pattern, $file->type, $matches, PREG_OFFSET_CAPTURE);
                  if(!empty($result)){
                     echo '<img src="'.base_url().'files/'.$file->idBoite.'/'.$file->nom.'" alt="'.$file->nom.'" />';
                  }

               ?>
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
