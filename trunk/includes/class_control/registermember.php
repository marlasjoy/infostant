<?php
  include(pluginpath.'/general_pi.php');
  class registermember extends template{
      private $db;
      private $header; 
      private $footer; 
      private $info;
      function registermember($db,$header,$footer,$info='')
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

      function getuserbyfacebook()
      {
          if($this->info['userprofilefacebook']['email'])$databird['email']=$this->info['userprofilefacebook']['email'];
          if($this->info['userprofilefacebook']['username'])$databird['username']=$this->info['userprofilefacebook']['username'];
          if($this->info['userprofilefacebook']['id'])$databird['fid']=$this->info['userprofilefacebook']['id'];

          return $databird;
          
      }
      function view()
      {
         if($_COOKIE['userlogin'])
         {
             
             header("Location:".homeinfo.'/'.$_COOKIE['userlogin']);
             
         }

        

        $databird['noheader']=1;  
        $databird['js'][]='jquery.validate.js';
        $databird['js'][]='scriptajaxregister3.js';
        
        $this->header->set_data($databird);  
        $this->header->get_header();
         $databird['loginfacebook']=$this->info['loginfacebook']; 
        if(is_array($this->info['userprofilefacebook']))
        {
            $databird=$this->getuserbyfacebook();
        }
        
          

        $this->set_data($databird);
        $this->load('registermember');
        
        
        $this->footer->get_footer();
         
      }
  }
?>
