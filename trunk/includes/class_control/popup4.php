<?php
      class popup4 extends template{
      private $db;
      private $header; 
      private $footer;  
      private $info;   
      function popup4($db,$header,$footer,$info='')
      {
         $this->header=$header;
         $this->footer=$footer;
         $this->db=$db;  
         $this->info=$info;

        $this->set_folder("popup");
         include(includepath.'/ajax.php');
         $this->ajax=new ajax($this->db,$this->header,$this->footer);
      }
      function view()
      {
       
 

       $data=$this->ajax->checkandgetshop($this->info['target']);
       $data['function']=$this->info['function'];
       $data['action']=$this->info['action'];
       $data['target']=$this->info['target'];

       $this->set_data($data);
 
          
       
       $this->load('popup4');
        

      }
  }
?>
