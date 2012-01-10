<?php
    class map extends template{
      private $db;
      private $header; 
      private $footer; 
      private $title;
      private $description;
      private $keyword;    
      function map($db,$header,$footer,$info='')
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
         $this->ajax=new ajax($this->db,$this->header,$this->footer,$this->info);
         $this->validateshop();
      }
        function validateshop()
       {
            if($this->ajax->checkshopexit($this->info['subdomain']))redirectto(homeinfo.'/search');
       
       }
       function getcatbyid($catid)
      {
          
           $sql='SELECT
                    * 
                    FROM
                    tb_cat
                    where tb_cat.catid="'.$catid.'"
                    ';
           
           $this->db->get_connect(); 
           $this->db->db_set_recordset($sql);
           $datacat=$this->db->db_get_recordset();
           $this->db->destory(); 
            
           if($datacat['0']['title'])$this->title=$datacat['0']['title'];
           if($datacat['0']['keyword'])$this->keyword=$datacat['0']['keyword'];
           if($datacat['0']['description'])$this->description=$datacat['0']['description']; 
           
          // return       $datacat['0']['catname_en'];
           
           
      }
      function view()
      {
         if($this->info['lang']=="th")
          $data=$this->ajax->getshop($this->info['subdomain']);
          else
          $data=$this->ajax->getshop($this->info['subdomain'],'tb_shop_'.$this->info['lang']); 
          
          $catid=$this->ajax->getshopcat($this->info['subdomain']);
          if($catid)
          {
          $databird['flood']=$this->ajax->getlatbycat($catid);  
          $this->getcatbyid($catid);
          $databird['title']=$this->title; 
          $databird['keywords']=$this->keyword;
          $databird['description']=$this->description;  
          $databird['zoom']=8;  
          } else
          {
          $databird['flood']=$this->ajax->getlatbyshop($this->info['subdomain']);
          $databird['zoom']=20;     
              
          }
       //   $this->header->get_header();
          
          $this->set_data($databird);
           $this->load('map');
        //  $this->footer->get_footer(); 
      }
    }
?>
