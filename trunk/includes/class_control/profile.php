<?php

  class profile extends template{
      private $db;
      private $header; 
      private $footer; 
      private $info;
      private $total;
      private $limit;
      function profile($db,$header,$footer,$info='')
      {
         $this->header=$header;
         $this->footer=$footer;
         $this->db=$db;
         $this->info=$info;
         if($info['folder'])
         {
             $this->set_folder($info['folder']);
         }
      
         
        
         if($this->checkuserexit($this->info['username']))
         {
             
         }else
         {
             header("Location:".homeinfo.'/');
         }
         
        
      
      }
      function itenary()
      {

          //echo "sss";
      }
      function getshoplist()
      {
         $sql='SELECT
                    tb_shop.shopurl,
                    tb_shop.shopname,
                    tb_shop.title,
                    tb_shop.description,
                    tb_province.proname
                    FROM
                    tb_shop
                    INNER JOIN tb_province ON tb_shop.proid = tb_province.proid
                    INNER JOIN tb_member ON tb_shop.mid = tb_member.mid
                    where  tb_member.username="'.$this->info['username'].'" ';
                    
                    

           $this->limit = 10;   
           
            
           $this->db->get_connect(); 
           $this->db->db_set_recordset($sql);
          // $dataarea=$this->db->db_get_recordset();
           $this->total=$this->db->db_get_count(); 
           $this->db->destory(); 

           if(isset($this->info['pagenumber'])&&$this->info['pagenumber']!=1)
           {
              $pagenext=($this->limit*($this->info['pagenumber']-1)); 
           }else
           {
               $pagenext=0;
           }
          $sql='  SELECT
                    tb_shop.shopurl,
                    tb_shop.shopname,
                    tb_shop.title,
                    tb_shop.description,
                    tb_province.proname
                    FROM
                    tb_shop
                    INNER JOIN tb_province ON tb_shop.proid = tb_province.proid
                    INNER JOIN tb_member ON tb_shop.mid = tb_member.mid
                    where  tb_member.username="'.$this->info['username'].'"
                    limit  '.$pagenext.','.$this->limit;


                     
                     $this->db->db_set_recordset($sql);
                     $datashop=$this->db->db_get_recordset();
                     $this->db->destory(); 
                     
           if(count($datashop))
           {
               $str="";
           $k=1;    
           foreach($datashop as $valueshop)
           {
                   if(is_file(rootpath.'/images/shop_c/'.$valueshop['shopurl'].'/resize/thumb7.jpg'))
                    {
                      $pic=homeinfo.'/images/shop_c/'.$valueshop['shopurl'].'/resize/thumb7.jpg';  
                    }else
                    {
                       if(is_file(rootpath.'/images/shop_c/'.$valueshop['shopurl'].'/resize/original.jpg'))
                    {
                    
                    } 
                        
                        
                        
                      $pic=homeinfo.'/images/thumb-01.jpg';    
                    } 
          
           $str.='<li  '.$class.'>
                <h3><a href="http://'.$valueshop['shopurl'].'.'.domain.'" target="_blank"><img src="'.$pic.'" border="0" width="120" height="90" ></a></h3>
                <p class="cat-title"><strong>Title:</strong> '.strip_tags($valueshop['title']).'</p>
                <p class="cat-description"><strong>Description:</strong> '.strip_tags($valueshop['description']).'</p>
                <p class="cat-pro"><strong>Providence:</strong> '.$valueshop['proname'].'</p>
            </li>';
            
            
            
            
            
            $k++;
           }
           }
            $this->db->closedb();       
               return   $str; 
      }
      function shop()
      {
          $databird['option'][]='<link rel="stylesheet" href="'.homeinfo.'/css/login.css">';
          $this->header->set_data($databird);
        $this->header->get_header(); 
        
        
        
        
        $this->set_data($databird);
        $this->load('shopprofile');
        
        
        $this->footer->get_footer();
      }
      function checkuserexit($username)
      {
          
          $this->db->get_connect();

          $this->db->db_set_recordset('SELECT mid FROM `tb_member` where tb_member.username="'.$username.'"');
          $datamember=$this->db->db_get_recordset();
          $this->db->destory();
          $this->db->closedb();
          
          return $datamember['0']['mid'];
          
      }



      function view()
      {

         if(isset($this->info['function']))
         {
          //   $methodVariable = array($this,$this->info['function']);
             if(is_callable(array($this,$this->info['function'])))
             {
                 call_user_func(array($this,$this->info['function']));
             }else
             {
                 header("Location:".homeinfo.'/'.$this->info['username']);
                 
             }
         }else
         {
             
         $databird['noindexcss']=1;
        $databird['option'][]='<link rel="stylesheet" href="'.homeinfo.'/css/login.css">';
        $databird['noheader']=1;
        $databird['js'][]='jMonthCalendar-1.0.0.js'; 
        $databird['js'][]='profile.js';              
        $this->header->set_data($databird);
        $this->header->get_header(); 
        
  
        
        

        $this->set_data($databird);
        $this->load('profile');
        
        
        $this->footer->get_footer();
             
             
             
         }   
          

         
      }
  }
?>
