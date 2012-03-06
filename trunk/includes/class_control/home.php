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

      function view()
      {

       // echo "<div align='center'><img src='http://www.infostant.com/images/comingsoon.jpg'> </div>";
//          exit();
//        $this->header->set_data();
//        $this->header->get_header(); 
//        

        if($this->info['lang']=="th")
        {
         $this->load('demo');   
        }else
        {
          $this->load('demo_en');   
        }
        
        
     //   $this->footer->get_footer();      
        

      }
  }
?>
