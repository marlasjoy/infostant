<?php
    class footer extends template{
       private $footer; 
       function set_footer($footer)
       {
           $this->footer=$footer;
       }
       function footer($footer='footer',$info='')
       {
           $this->footer=$footer;
            if($info['folder'])
         {
             $this->set_folder($info['folder']);
         }
       }
       function get_footer()
       {
           
           $this->load($this->footer);
       }
  }
?>
