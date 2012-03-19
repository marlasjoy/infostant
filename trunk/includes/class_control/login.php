<?php
    class login extends template{
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


          if($_COOKIE['userlogin'])
          {
              $url=homeinfo.'/'.$_COOKIE['userlogin'];
              header("Location: $url");
          }
       // echo "<div align='center'><img src='http://www.infostant.com/images/comingsoon.jpg'> </div>";
//          exit();
//        $this->header->set_data();
//        $this->header->get_header(); 
//        

      $this->load('login');   
        
        
     //   $this->footer->get_footer();      
        

      }
  }
?>
