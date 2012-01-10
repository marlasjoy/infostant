<?php
  include(pluginpath.'/general_pi.php');
  class register extends template{
      private $db;
      private $header; 
      private $footer; 
      private $info;
      function register($db,$header,$footer,$info='')
      {
         $this->header=$header;
         $this->footer=$footer;
         $this->db=$db;
         $this->info=$info;
         if($info['folder'])
         {
             $this->set_folder($info['folder']);
         }
         
      }

      function view()
      {
         
        $this->header->get_header(); 
        $this->load('register');
        
        
        $this->footer->get_footer();
         
      }
  }
?>
