<?php
    class promotion extends template{


       function promotion($db,$header,$footer,$info='')  
       {
          $this->header=$header;
         $this->footer=$footer;
         $this->db=$db;
         $this->info=$info;

       }
       function view()
       {

            //$databird['noheader']=1;            
            $this->header->set_data($databird);
            $this->header->get_header(); 
            $this->load('promotion');
            $this->footer->get_footer();
           
       }
  }
?>
