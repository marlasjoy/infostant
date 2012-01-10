<?php
      class editmap extends template{
      private $db;
      private $header; 
      private $footer;     
      function editmap($db,$header,$footer,$info='')
      {
         $this->header=$header;
         $this->footer=$footer;
         $this->db=$db;  
         $this->info=$info;
         if($info['folder'])
         {
             $this->set_folder($info['folder']);
         }
         include(includepath.'/ajax.php');
         $this->ajax=new ajax($this->db,$this->header,$this->footer);
      }
      function getprovince()
      {
          
          $this->db->get_connect();
          $this->db->db_set_recordset('SELECT proid,proname FROM `tb_province`');
          $dataprovince=$this->db->db_get_recordset();
          $this->db->destory();
          $this->db->closedb();
          
          return $dataprovince;
          
      }
      function view()
      {
        $data=$this->ajax->checkandgetshop($this->info['target']);
        $databird['province']=$this->getprovince();
       $data['function']=$this->info['function'];
       $data['action']=$this->info['action'];
       $data['target']=$this->info['target'];  
       $this->header->set_data($data);
        $this->header->get_header();
        
       
       
        $this->set_data($databird);
        $this->load('editmap');
        
        //$this->footer->set_folder('map'); 
        $this->footer->get_footer(); 
      }
  }
?>
