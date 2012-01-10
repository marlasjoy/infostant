<?php
    class head extends template{
       private $header; 
       private $db;
       private $info;
       function set_header($header)
       {
           $this->header=$header;
       }
       function set_db($db)
       {
           $this->db=$db;
       }
       function head($header='header',$info='')
       {
           $this->header=$header;
            if($info['folder'])
            {
             $this->set_folder($info['folder']);
             }
             $this->info=$info;
           
       }
        function getlistshop()
        {
              $this->db->get_connect();
              
            
            if($this->info['sub']=="flood")
            {
              $sql='SELECT
              tb_shop.shopname,
              tb_shop.shopurl      
               FROM
               tb_shop
            where tb_shop.mid="'.$_COOKIE['userid'].'" and tb_shop.catid=16    ';  
            }else
            {
             $sql='SELECT
              tb_shop.shopname,
              tb_shop.shopurl      
               FROM
               tb_shop
            where tb_shop.mid="'.$_COOKIE['userid'].'" and tb_shop.catid <>16    ';   
            }
            
              $this->db->db_set_recordset($sql);
          $data=$this->db->db_get_recordset();
          $this->db->destory();
          $this->db->closedb(); 
          
          
          
          return $data;
            
        }

       function get_header()
       {
           
           if($_COOKIE['userid'])
           {
               $databird['listshop']=$this->getlistshop();
               $this->set_data2($databird);
               
           }
           
           $this->load($this->header);
       }
    }
?>
