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
      function favorite()
      {
                   $databird['noindexcss']=1;
        $databird['option'][]='<link rel="stylesheet" href="'.homeinfo.'/css/login.css">';
        $databird['noheader']=1;

          $this->header->set_data($databird);
        $this->header->get_header(); 
       $databird['leftmenu']=$this->getleftmenu();
        $databird['recent']=$this->getrecent();
       $databird['tableshop']=$this->getfavoritelist(); 
        $databird['pagination']=$this->pagination(); 
        $databird['username']=$this->info['username'];
        
        
        $this->set_data($databird);
        $this->load('favorite');
        
        
        $this->footer->get_footer();
      }
      function getfavoritelist()
      {
           $sql='SELECT
                    tb_fav.sid
                    FROM
                    tb_fav
                    INNER JOIN tb_shop ON tb_shop.sid= tb_fav.sid
                    INNER JOIN tb_province ON tb_shop.proid = tb_province.proid
                    INNER JOIN tb_member ON tb_fav.mid = tb_member.mid
                    where  tb_member.username="'.$this->info['username'].'"
                    order by tb_fav.createdate desc  ';
                    
                    

           $this->limit = 10;   
           
            
           $this->db->get_connect(); 
           $this->db->db_set_recordset($sql);
          // $dataarea=$this->db->db_get_recordset();
           $this->total=$this->db->db_get_count(); 
           $this->db->destory(); 

           if(isset($this->info['pagenumber'])&&$this->info['pagenumber']!=1)
           {
              $pagenext=($this->limit*($this->info['pagenumber']-1)); 
              $row=$pagenext;
           }else
           {
               $pagenext=0;
               $row=$pagenext;
           }
          $sql='  SELECT
                    tb_shop.shopurl,
                    tb_shop.shopname,
                    tb_shop.title,
                    tb_shop.description,
                    tb_shop.createdate,
                    tb_province.proname
                    FROM
                    tb_fav
                    INNER JOIN tb_shop ON tb_shop.sid= tb_fav.sid
                    INNER JOIN tb_province ON tb_shop.proid = tb_province.proid
                    INNER JOIN tb_member ON tb_fav.mid = tb_member.mid
                    where  tb_member.username="'.$this->info['username'].'"
                    order by tb_shop.createdate desc
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

                      $thumbfile7=fullpathimages.$valueshop['shopurl'].'/resize/thumb7.jpg';  
                      if(copy(homeinfo.'/plugins/showimages.php?width='.'100'.'&height='.'80'.'&source='.homeinfo .'/images/shop_c/'. $valueshop['shopurl'] . '/resize/original.jpg',$thumbfile7))
                     {
                       chmod($thumbfile7,0777);
                       $pic=homeinfo.'/images/shop_c/'.$valueshop['shopurl'].'/resize/thumb7.jpg'; 
                     } 
                    }else
                    {
                       $pic=homeinfo.'/images/default/no-image/100-80.jpg';  
                    } 
                        
                        
                        
                         
                    }
           $mktime=strtotime($valueshop['createdate']) ;
          $row++;
           $str.='<tr>
                      <td>'.$row.'</td>
                                          <td>
                                              '.date('l',$mktime).' <br />
                                              '.date('d F Y',$mktime).' <br />
                                              '.date('H:i:s',$mktime).'
                                          </td>
                                          <td>
                                              <a target="_blank" href="http://'.$valueshop['shopurl'].'.'.domain.'"><img src="'.$pic.'" alt="thumb-01" /></a>
                                          </td>
                                          <td>
                                              <strong>Title:</strong> '.strip_tags($valueshop['title']).' <br />
                                              <strong>Description:</strong>  '.strip_tags($valueshop['description']).'  <br />
                                              <strong>Providence:</strong>  '.$valueshop['proname'].'
                                          </td>
                                          <td>
                                              <a href="javascript:void(0);" class="btn-edit">Edit</a>
                                              <a href="javascript:void(0);" class="btn-delete">Delete</a>
                                          </td>
                                      </tr>';
            
            
            
            
            
            $k++;
           }
           }
            $this->db->closedb();       
               return   $str; 
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

           $str.='<label for="page">Page  '.$page.' of  '.$last.'</label>';            
            for($k=1;$k<=$last;$k++){
            if($k==$page)$class='class="active"'; 
            else $class="";      
             $str.=' <a '.$class.' href="'.homeinfo.'/'.$this->info['username'].'/'.$this->info['function'].'/'.$k.' ">'.$k.'</a>
                                          ';
             
             
            }
            $str.='  <a href="'.homeinfo.'/'.$this->info['username'].'/'.$this->info['function'].'/'.($page+1).' ">&rsaquo;</a>';
        return $str;
       
      }
      function getshoplist()
      {
         $sql='SELECT
                    tb_shop.sid
                    FROM
                    tb_shop
                    INNER JOIN tb_province ON tb_shop.proid = tb_province.proid
                    INNER JOIN tb_member ON tb_shop.mid = tb_member.mid
                    where  tb_member.username="'.$this->info['username'].'"
                    order by tb_shop.createdate desc  ';
                    
                    

           $this->limit = 10;   
           
            
           $this->db->get_connect(); 
           $this->db->db_set_recordset($sql);
          // $dataarea=$this->db->db_get_recordset();
           $this->total=$this->db->db_get_count(); 
           $this->db->destory(); 

           if(isset($this->info['pagenumber'])&&$this->info['pagenumber']!=1)
           {
              $pagenext=($this->limit*($this->info['pagenumber']-1)); 
              $row=$pagenext;
           }else
           {
               $pagenext=0;
               $row=$pagenext;
           }
          $sql='  SELECT
                    tb_shop.shopurl,
                    tb_shop.shopname,
                    tb_shop.title,
                    tb_shop.description,
                    tb_shop.createdate,
                    tb_province.proname
                    FROM
                    tb_shop
                    INNER JOIN tb_province ON tb_shop.proid = tb_province.proid
                    INNER JOIN tb_member ON tb_shop.mid = tb_member.mid
                    where  tb_member.username="'.$this->info['username'].'"
                    order by tb_shop.createdate desc
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

                      $thumbfile7=fullpathimages.$valueshop['shopurl'].'/resize/thumb7.jpg';  
                      if(copy(homeinfo.'/plugins/showimages.php?width='.'100'.'&height='.'80'.'&source='.homeinfo .'/images/shop_c/'. $valueshop['shopurl'] . '/resize/original.jpg',$thumbfile7))
                     {
                       chmod($thumbfile7,0777);
                       $pic=homeinfo.'/images/shop_c/'.$valueshop['shopurl'].'/resize/thumb7.jpg'; 
                     } 
                    }else
                    {
                       $pic=homeinfo.'/images/default/no-image/100-80.jpg';  
                    } 
                        
                        
                        
                         
                    }
           $mktime=strtotime($valueshop['createdate']) ;
          $row++;
           $str.='<tr>
                      <td>'.$row.'</td>
                                          <td>
                                              '.date('l',$mktime).' <br />
                                              '.date('d F Y',$mktime).' <br />
                                              '.date('H:i:s',$mktime).'
                                          </td>
                                          <td>
                                              <a target="_blank" href="http://'.$valueshop['shopurl'].'.'.domain.'"><img src="'.$pic.'" alt="thumb-01" /></a>
                                          </td>
                                          <td>
                                              <strong>Title:</strong> '.strip_tags($valueshop['title']).' <br />
                                              <strong>Description:</strong>  '.strip_tags($valueshop['description']).'  <br />
                                              <strong>Providence:</strong>  '.$valueshop['proname'].'
                                          </td>
                                          <td>
                                              <a href="javascript:void(0);" class="btn-edit">Edit</a>
                                              <a href="javascript:void(0);" class="btn-delete">Delete</a>
                                          </td>
                                      </tr>';
            
            
            
            
            
            $k++;
           }
           }
            $this->db->closedb();       
               return   $str; 
      }
      function shop()
      {
                   $databird['noindexcss']=1;
        $databird['option'][]='<link rel="stylesheet" href="'.homeinfo.'/css/login.css">';
        $databird['noheader']=1;

          $this->header->set_data($databird);
        $this->header->get_header(); 
       $databird['leftmenu']=$this->getleftmenu();
        $databird['recent']=$this->getrecent();
       $databird['tableshop']=$this->getshoplist(); 
        $databird['pagination']=$this->pagination(); 
        $databird['username']=$this->info['username'];
        
        
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

      function getleftmenu()
      {
                     $str=' <li><a href="'.homeinfo.'/'.$this->info['username'].'" class="icon">Itenary</a></li>
                      <li><a href="'.homeinfo.'/'.$this->info['username'].'/favorite" class="icon">Favorite</a></li>
                      <li><a href="'.homeinfo.'/'.$this->info['username'].'/shop" class="icon">Shop</a></li>
                      <li><a href="'.homeinfo.'/'.$this->info['username'].'/memory" class="icon">Memory</a></li>
                      <li><a href="javascript:void(0);" class="icon">Send to Friend</a></li>
                      <li><a href="javascript:void(0);" class="icon">Share to Facebook</a></li>
                      <li><a href="javascript:void(0);" class="icon">Share to Twitter</a></li>
                      <li><a href="javascript:void(0);" class="icon">Share to Twitter</a></li>';
                      
                      return $str;
      }
      function memory()
      {
          
            $databird['noindexcss']=1;
        $databird['option'][]='<link rel="stylesheet" href="'.homeinfo.'/css/login.css">';
        $databird['noheader']=1;

          $this->header->set_data($databird);
        $this->header->get_header(); 
       $databird['leftmenu']=$this->getleftmenu();
        $databird['recent']=$this->getrecent();

        $databird['username']=$this->info['username'];
        
        
        $this->set_data($databird);
        $this->load('memory');
        
        
        $this->footer->get_footer();
          
      }
      
      function getrecent()
      {
          if($_COOKIE['recentsid'])
          {
                  
              $arrayshopurl=explode("&",$_COOKIE['recentshopurl']);
              krsort($arrayshopurl,SORT_NUMERIC);
              $arrayshopurl=array_unique($arrayshopurl);
              
              
              $str='<h3>Recent Views</h3>       
                       <p id="recent"> ';
                       $k=0;
             foreach($arrayshopurl as $valueshopurl)
             {
             if(is_file(rootpath.'/images/shop_c/'.$valueshopurl.'/resize/thumb7.jpg'))
                    {
                      $pic=homeinfo.'/images/shop_c/'.$valueshopurl.'/resize/thumb7.jpg';  
                    }else
                    {
                       if(is_file(rootpath.'/images/shop_c/'.$valueshopurl.'/resize/original.jpg'))
                    {

                      $thumbfile7=fullpathimages.$valueshopurl.'/resize/thumb7.jpg';  
                      if(copy(homeinfo.'/plugins/showimages.php?width='.'100'.'&height='.'80'.'&source='.homeinfo .'/images/shop_c/'. $valueshopurl . '/resize/original.jpg',$thumbfile7))
                     {
                       chmod($thumbfile7,0777);
                       $pic=homeinfo.'/images/shop_c/'.$valueshopurl.'/resize/thumb7.jpg'; 
                     } 
                    }else
                    {
                       $pic=homeinfo.'/images/default/no-image/100-80.jpg';  
                    }          
                 }
                 $str.= ' <a target="_blank" href="http://'.$valueshopurl.'.'.domain.'">
                          <img src="'.$pic.'" alt="thumb-01" width="100" height="80" /></a>';
                 if($k==5)
                 {
                     break;
                 }
                 $k++;
             
             }      
          
              
              $str.= '</p>';
              
          }
             

                      
                      return $str;
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
        $databird['leftmenu']=$this->getleftmenu();
        $databird['recent']=$this->getrecent();  
        $databird['username']=$this->info['username'];   
        $this->header->set_data($databird);
        $this->header->get_header(); 
        
  
        
        

        $this->set_data($databird);
        $this->load('profile');
        
        
        $this->footer->get_footer();
             
             
             
         }   
          

         
      }
  }
?>
