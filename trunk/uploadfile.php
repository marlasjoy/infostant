<?php
   //print_r($_FILES);
          if($_FILES["file"]["name"])
          {
          move_uploaded_file($_FILES["file"]["tmp_name"],'/home/infostant/domains/infostant.com/public_html/cache/'.$_FILES["file"]["name"]); 
          }
          echo "1";
?>
