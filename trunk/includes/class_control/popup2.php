<?php
      class popup2 extends template{
      private $db;
      private $header; 
      private $footer; 
       private $info;    
      function popup2($db,$header,$footer,$info='')
      {
         $this->header=$header;
         $this->footer=$footer;
         $this->db=$db;  
         $this->info=$info;

       //  if($info['folder'])
      //   {
             $this->set_folder("popup");
         //}
         
         include(includepath.'/ajax.php');
         $this->ajax=new ajax($this->db,$this->header,$this->footer);
      }
      function view()
      {
       
     // $data=$this->ajax->checkandgetshop($this->info['target']);
   //    $data['file']=$this->ajax->getimagebyshop($data['0']['shopurl']);
      // $data['setlink']=$this->info['function'].'/'.$this->info['action'].'/'.$this->info['target'];

       $data['function']=$this->info['function'];
       $data['action']=$this->info['action'];
       $data['target']=$this->info['target'];
       
       $this->set_data($data);
       $this->load('popup2');
        
        
      }
  }
?>
