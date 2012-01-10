<?php

  class category extends template{
      private $db;
      private $header; 
      private $footer; 
      private $info;
      function category($db,$header,$footer,$info='')
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
        //$databird['fulljs'][]='http://maps.google.com/maps?file=api&v=2&key=ABQIAAAAmD0nQgsgxkNGkE1W1IhK1xQCOnEhiqA9FGkGd5zMqeztJTcEuBTGbCtcKKNFQBF8UrBgIEefQkb_gQ';
       // $databird['js'][]='jquery-1.6.4.js';
      //  $databird['js'][]='jquery.validate.js';
     //   $databird['js'][]='scriptajaxregister.js';
      //  $databird['js'][]='googlejs.js';
        $databird['css'][]='html5reset.css';
        $databird['css'][]='style.css';
     //   $databird['probody']='onload="load()" onunload="GUnload()"';
        
        
        
        $this->header->set_data($databird);
        $this->header->get_header();
        $databird['loginfacebook']=$this->info['loginfacebook'];

        
        
        

       // $this->set_data($databird);
        $this->load('category');
        
        
        $this->footer->get_footer();
         
      }
  }
?>
