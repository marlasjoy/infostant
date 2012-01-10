<?php
    class home extends template{
      function home($db,$header,$footer,$info='')
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
      function showcat()
      {
          
          
          
      }
      function view()
      {

        $databird['css'][]='html5reset.css';
        $databird['css'][]='style.css';
         
        
        
        
        $this->header->set_data($databird);
        $this->header->get_header();
        $databird['loginfacebook']=$this->info['loginfacebook'];

        
        
        


        $this->load('home');
        
        
        $this->footer->get_footer();
      }
  }
?>
