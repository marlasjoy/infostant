<?php
    class package extends template{


       function package($db,$header,$footer,$info='')  
       {
          $this->header=$header;
         $this->footer=$footer;
         $this->db=$db;
         $this->info=$info;

       }
       function view()
       {
            $databird['fulljs'][]=homeinfo.'/js/shop/libs/jquery-1.6.4.min.js';
            $databird['css'][]='html5reset.css';
            $databird['css'][]='style.css'; 
            //$databird['noheader']=1;            
            $this->header->set_data($databird);
            $this->header->get_header(); 
            $this->load('package');
            $this->footer->get_footer();
           
       }
  }
?>
