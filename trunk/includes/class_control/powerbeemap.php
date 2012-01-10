<?php
    class powerbeemap extends template{
      private $db;
      private $header; 
      private $footer;     
      function powerbeemap($db,$header,$footer,$info='')
      {
         $this->header=$header;
         $this->footer=$footer;
         $this->db=$db;  
         $this->info=$info;
         if($info['folder'])
         {
             $this->set_folder($info['folder']);
         }
         include(includepath.'/ajax.php');
         $this->ajax=new ajax($this->db,$this->header,$this->footer);
      }
      function view()
      {
       //   $this->header->get_header();
          $databird['flood']=$this->ajax->getlaflood();
          $this->set_data($databird);
          $this->load('map');
        //  $this->footer->get_footer(); 
      }
    }
?>
