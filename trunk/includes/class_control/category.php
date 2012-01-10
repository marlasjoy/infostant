<?php

  class category extends template{
      private $db;
      private $header; 
      private $footer; 
      private $info;
      private $total;
      private $limit;
      private $title;
      private $description;
      private $keyword;
      function category($db,$header,$footer,$info='')
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
      function pagination()
      {
          if($this->info['pagenumber'])
          {
             $page=$this->info['pagenumber']; 
          }else
          {
              $page=1;
          }
          $str="";
          $last = ceil($this->total/$this->limit);
          $str.='<li>Page '.$page.' of '.$last.'</li>';            
            for($k=1;$k<=$last;$k++){
            if($k==$page)$class='class="current"'; 
            else $class="";      
            $str.='<li '.$class.'><a href="'.homeinfo.'/'.$this->info['keyword'].'/page/'.$k.' ">'.$k.'</a></li>
             ';
            }
        return $str;
       
      }
      function showcat()
      {
          $sql='SELECT
                    tb_shop.shopurl,
                    tb_shop.shopname,
                    tb_shop.title,
                    tb_shop.description,
                    tb_province.proname,
                    tb_subcat.subcatname
                    FROM
                    tb_shop
                    INNER JOIN tb_province ON tb_shop.proid = tb_province.proid
                    INNER JOIN tb_subcat ON tb_shop.subcatid = tb_subcat.subcatid 
                    where   tb_shop.catid=16
                    and tb_subcat.subcatname="'.$this->info['keyword'].'"';
           $this->limit = 6;   
           
            
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
          $sql='SELECT
                    tb_shop.shopurl,
                    tb_shop.shopname,
                    tb_shop.title,
                    tb_shop.description,
                    tb_province.proname,
                    tb_subcat.subcatname
                    FROM
                    tb_shop
                    INNER JOIN tb_province ON tb_shop.proid = tb_province.proid
                    INNER JOIN tb_subcat ON tb_shop.subcatid = tb_subcat.subcatid 
                    where   tb_shop.catid=16
                    and tb_subcat.subcatname="'.$this->info['keyword'].'"
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
                   if(is_file(rootpath.'/images/shop_c/'.$valueshop['shopurl'].'/resize/thumb3.jpg'))
                    {
                      $pic=homeinfo.'/images/shop_c/'.$valueshop['shopurl'].'/resize/thumb3.jpg';  
                    }else
                    {
                      $pic=homeinfo.'/images/default/powerbee/120-90.jpg';    
                    } 
           if($k%3==0)$class='class="right"'; 
           else $class="";           
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
      function showcat2()
      {
          $sql='SELECT
                    tb_shop.shopurl,
                    tb_shop.shopname,
                    tb_shop.title,
                    tb_shop.description,
                    tb_province.proname,
                    tb_cat.catname
                    FROM
                    tb_shop
                    INNER JOIN tb_province ON tb_shop.proid = tb_province.proid
                    INNER JOIN tb_cat ON tb_shop.catid = tb_cat.catid 
                    where  tb_cat.catname="'.$this->info['keyword'].'"';
                    
                    

           $this->limit = 18;   
           
            
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
                    tb_province.proname,
                    tb_province.proname 
                    FROM
                    tb_shop
                    INNER JOIN tb_province ON tb_shop.proid = tb_province.proid
                    INNER JOIN tb_cat ON tb_shop.catid = tb_cat.catid 
                    where   tb_cat.catname="'.$this->info['keyword'].'"
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
                   if(is_file(rootpath.'/images/shop_c/'.$valueshop['shopurl'].'/resize/thumb3.jpg'))
                    {
                      $pic=homeinfo.'/images/shop_c/'.$valueshop['shopurl'].'/resize/thumb3.jpg';  
                    }else
                    {
                      $pic=homeinfo.'/images/default/no-image/120-90.jpg';    
                    } 
           if($k%3==0)$class='class="right"'; 
           else $class="";           
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
     function getcatname_en()
      {
          
           $sql='SELECT
                    * 
                    FROM
                    tb_cat
                    where tb_cat.catname="'.$this->info['keyword'].'"
                    ';
           
           $this->db->get_connect(); 
           $this->db->db_set_recordset($sql);
           $datacat=$this->db->db_get_recordset();
           $this->db->destory(); 
            
           if($datacat['0']['title'])$this->title=$datacat['0']['title'];
           if($datacat['0']['keyword'])$this->keyword=$datacat['0']['keyword'];
           if($datacat['0']['description'])$this->description=$datacat['0']['description']; 
           
           return       $datacat['0']['catname_en'];
           
           
      }
            function getsubcatall()
        {
              $this->db->get_connect(); 
              $sql='SELECT
count(tb_shop.subcatid) as countnumber,
tb_shop.subcatid,
tb_subcat.subcatname,
tb_cat.catname 
FROM
tb_shop
INNER JOIN tb_cat ON tb_shop.catid = tb_cat.catid
INNER JOIN tb_subcat ON tb_shop.subcatid = tb_subcat.subcatid 
WHERE  tb_cat.catname="'.$this->info['keyword'].'"
group by tb_shop.subcatid
order by tb_shop.subcatid asc';
              $this->db->db_set_recordset($sql);
              $data=$this->db->db_get_recordset();
              $this->db->destory();
              $this->db->closedb(); 
              if(count($data))
              {
                  $str='';
                  foreach($data as $value)
                  {
                     $str.='<li><a href="'.homeinfo.'/'.$value['catname'].'/'.$value['subcatname'].'">'.$value['subcatname'].' ('.$value['countnumber'].')</a></li>'; 
                  }
                  
              }
              
              return $str;
        }
      function view()
      {
        $databird['fulljs'][]=homeinfo.'/js/shop/libs/jquery-1.6.4.min.js';
        $databird['css'][]='html5reset.css';
        $databird['css'][]='style.css'; 
        $databird['catname_en']=$this->getcatname_en();  
        $databird['title']=$this->title; 
        $databird['keywords']=$this->keyword;
        $databird['description']=$this->description;
        

        
                    
        $this->header->set_data($databird);
        $this->header->get_header(); 
        
        if($this->info['sub']=="flood")
        $databird['cat']=$this->showcat();
        else
        $databird['cat']=$this->showcat2();
        
        
        
        $databird['catall']=$this->getsubcatall();   

        
        $databird['pagination']=$this->pagination(); 
        $this->set_data($databird);
        $this->load('category');
        
        
        $this->footer->get_footer();
         
      }
  }
?>
