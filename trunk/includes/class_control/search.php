<?php
    class search extends template{
        private $total;
       private $limit;
      function search($db,$header,$footer,$info='')
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
          if($this->info['action'])
          {
             $page=$this->info['action']; 
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
            $str.='<li '.$class.'><a href="'.homeinfo.'/search/'.$this->info['function'].'/'.$k.' ">'.$k.'</a></li>
             ';
            }
        return $str;
       
      }
      function pagination2()
      {
          if($this->info['group4'])
          {
             $page=$this->info['group4']; 
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
            $str.='<li '.$class.'><a href="'.homeinfo.'/search/'.$this->info['function'].'/'.$this->info['action'].'/'.$this->info['target'].'/'.$this->info['group'].'/'.$this->info['group2'].'/'.$this->info['group3'].'/'.$k.' ">'.$k.'</a></li>
             ';
            }
        return $str;
       
      }

      
      function getsearch()
      {
              $keyword=$this->info['function'];
              $this->db->get_connect();
              $sql="select  tb_shop.shopurl,
                    tb_shop.shopname,
                    tb_shop.title,
                    tb_shop.description,
                    tb_province.proname,
                    tb_province.proname
                     from tb_shop 
              
              INNER JOIN tb_province ON tb_shop.proid = tb_province.proid 
              where 
              tb_shop.title like '%$keyword%'   or 
              tb_shop.shopname like '%$keyword%'  or 
              tb_shop.description like '%$keyword%' or
              tb_province.proname like '%$keyword%' or 
              tb_shop.keyword like '%$keyword%' 
              ";

              $this->db->db_set_recordset($sql);
             // $data=$this->db->db_get_recordset();
               $this->total=$this->db->db_get_count(); 
               $this->db->destory();
               $this->limit = 18;  
                if(isset($this->info['action'])&&$this->info['action']!=1)
           {
              $pagenext=($this->limit*($this->info['action']-1)); 
           }else
           {
               $pagenext=0;
           }
           $sql="select  tb_shop.shopurl,
                    tb_shop.shopname,
                    tb_shop.title,
                    tb_shop.description,
                    tb_province.proname,
                    tb_province.proname
                     from tb_shop
           INNER JOIN tb_province ON tb_shop.proid = tb_province.proid 
            where 
           tb_shop.title like '%$keyword%'   or 
           tb_shop.shopname like '%$keyword%'  or 
           tb_shop.description like '%$keyword%' or
           tb_province.proname like '%$keyword%' or 
           tb_shop.keyword like '%$keyword%' 
           order by   tb_shop.sid desc
           limit  $pagenext,".$this->limit." 
           ";
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
      function getsearch2()
      {
              $keyword=str_replace('+',' ',$this->info['function']) ;
              $catname=str_replace('+',' ',$this->info['action']);
              $subcatname=str_replace('+',' ',$this->info['target']);
              $provincname=$this->info['group'];
              $districtname=$this->info['group2'];
              $tumbonname=$this->info['group3'];
              $where="";
              $join.=" INNER JOIN tb_province ON tb_shop.proid = tb_province.proid";   
              $where2=array();
              if($keyword)
              {
               
              $where.="
              (tb_shop.title like '%$keyword%'   or 
              tb_shop.shopname like '%$keyword%'  or 
              tb_shop.description like '%$keyword%' or
              tb_shop.keyword like '%$keyword%')  ";
              
              
              }
              
              if($catname!="เลือกประเภทของร้านค้า"&&$catname)
              {
              $join.=" INNER JOIN tb_cat ON tb_shop.catid = tb_cat.catid";
              $where2[]="  tb_cat.catname='$catname'  ";    
              }
              if($subcatname!="เลือกหมวดหมู่ร้านค้า"&&$subcatname)
              {
              $join.=" INNER JOIN tb_subcat ON tb_shop.subcatid = tb_subcat.subcatid";
              $where2[]="  tb_subcat.subcatname='$subcatname'  ";    
              }
               if($provincname!="เลือกจังหวัด"&&$provincname)
              {
              
              $where2[]="  tb_province.proname = '$provincname'  ";    
              }
              if($districtname!="เลือกอำเภอ+เขต"&&$districtname)
              {
              $join.=" INNER JOIN tb_district ON tb_shop.disid = tb_district.disid";
              $where2[]="  tb_district.disname = '$districtname'  ";    
              }
              if($tumbonname!="เลือกตำบล+แขวง"&&$tumbonname)
              {
              $join.=" INNER JOIN tb_tumbon ON tb_shop.tumid = tb_tumbon.tumid";
              $where2[]="  tb_tumbon.tumname = '$tumbonname'  ";    
              }
              if(count($where2))
              {
                  $strwhere=join('and',$where2);
                  if($where=="")
                  {
                   $where.=$strwhere;   
                  }else
                  {
                   $where.=" and ($strwhere) ";   
                  }
                  
                  
              }
              
              $this->db->get_connect();
              $sql="select  tb_shop.shopurl,
                    tb_shop.shopname,
                    tb_shop.title,
                    tb_shop.description,
                    tb_province.proname
                     from tb_shop 
                  $join
                  where 
                  $where
              ";
              
              

              $this->db->db_set_recordset($sql);
             // $data=$this->db->db_get_recordset();
               $this->total=$this->db->db_get_count(); 
               $this->db->destory();
               $this->limit = 18;  
                if(isset($this->info['group4'])&&$this->info['group4']!=1)
           {
              $pagenext=($this->limit*($this->info['group4']-1)); 
           }else
           {
               $pagenext=0;
           }
           $sql="select  tb_shop.shopurl,
                    tb_shop.shopname,
                    tb_shop.title,
                    tb_shop.description,
                    tb_province.proname
                     from tb_shop 
                  $join
                  where 
                  $where
           order by   tb_shop.sid desc
           limit  $pagenext,".$this->limit." 
           ";
           
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
      function view()
      {
        $databird['fulljs'][]=homeinfo.'/js/shop/libs/jquery-1.6.4.min.js'; 
        $databird['css'][]='html5reset.css';
        $databird['css'][]='style.css';
         
        

         
        

        
        
        $this->header->set_data($databird);
        $this->header->get_header();
        //$databird2['loginfacebook']=$this->info['loginfacebook'];
        

        
        if(count($this->info)<8)
       {
        $databird2['cat']=$this->getsearch();

       
        
        $databird2['pagination']=$this->pagination();
        }else
        {
         $databird2['cat']=$this->getsearch2(); 
         $databird2['pagination']=$this->pagination2();  
        }
        
        
        
          
          $this->set_data($databird2); 

        $this->load('search');
        
        
        $this->footer->get_footer();
      }
  }
?>
