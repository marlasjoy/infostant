<?php
    class mobileinfostant extends template{ 
       private $info;
      function mobileinfostant($db,$info='')
      {
      
               $this->info=$info;
      }
      function view()
      {
             
              $this->set_folder('mobile');
              
              
              if($this->info['subdomain'])
              {
                $this->load2('landing.html');   
              }else
             {
                 
            
              $this->load2('index.html');
              }
      }  
        
        
    }
?>
