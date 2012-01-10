<?php
  class flood extends template{
        
         function flood($db,$header,$footer,$info='')
       {
         $this->header=$header;
         $this->footer=$footer;
         $this->db=$db;
         $this->info=$info;
         
         $this->header->set_folder('flood');  
         $this->footer->set_folder('flood');
         include(includepath.'/ajax.php');


       }
       function getflood()
       {
           $this->db->get_connect(); 
            $sql='SELECT
                    tb_shop.shopurl,
                    tb_shop.shopname,
                    tb_shop.title
                    FROM
                    tb_shop
                    INNER JOIN tb_province ON tb_shop.proid = tb_province.proid
                    INNER JOIN tb_area ON tb_province.areaid = tb_area.areaid
                    where tb_shop.subcatid=138 and tb_shop.catid=16
                   
                    '; 

           $this->db->db_set_recordset($sql);
           $datashop=$this->db->db_get_recordset();
           $this->db->destory();
           
           $this->db->closedb();  
          
          return $datashop;
   
   
       }
           
       function view()
      {
          
        $this->header->set_data();  
        $this->header->get_header();
        $this->set_folder('flood');   
        $this->load('map');
        $this->footer->get_footer(); 

        
      }
      
  }
?>
