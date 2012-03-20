<?php
    class webdirectory extends template{
      function webdirectory($db,$header,$footer,$info='')
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
      function showcat()
      {
        $this->db->get_connect(); 
        $sql="SELECT * FROM tb_subcat where tb_subcat.catid=16";
        $this->db->db_set_recordset($sql);
        $dataarea=$this->db->db_get_recordset($sql);
        $this->db->destory();
           $str='';
         foreach($dataarea as  $valuearea){
         $sql='SELECT
                    tb_shop.shopurl,
                    tb_shop.shopname,
                    tb_shop.title ,
                    tb_subcat.subcatname,
                    tb_shop.subcatid
                    FROM
                    tb_shop
                    INNER JOIN tb_subcat ON tb_shop.subcatid = tb_subcat.subcatid
                    where   tb_shop.catid=16
                    and tb_shop.subcatid='.$valuearea['subcatid'].'
                    limit 0,7'; 
                    
   $this->db->db_set_recordset($sql);
   $datashop=$this->db->db_get_recordset();
   $this->db->destory();

   if(count($datashop['0']))
   {    
       $pic="";
         if(is_file(rootpath.'/images/shop_c/'.$datashop[0]['shopurl'].'/resize/thumb1.jpg'))
                    {
                      $pic=homeinfo.'/images/shop_c/'.$datashop[0]['shopurl'].'/resize/thumb1.jpg';  
                    }else
                    {
                      $pic=homeinfo.'/images/default/powerbee/269-218.jpg';    
                    }
       
       
             $str.='<li>
                <p>
                    <h3><img src="'.homeinfo.'/images/default/area/flood-'.$valuearea['subcatid'].'.png" border="0"  ></h3>
                    <span>
                        <a target="_blank"  class="more-'.$valuearea['subcatid'].'" href="'.homeinfo.'/'.$valuearea['subcatname'].' ">More</a>
                    </span>
                </p>
                <div class="featuredbox" style=" ">
                    <h4><a target="_blank" href="http://'.$datashop[0]['shopurl'].'.'.domain.'"><img src="'.$pic.'" border="0" width="269" height="218" ></a><br>
                        <span>
                            <strong>'.$datashop['0']['shopname'].'</strong><br>
                            '.$datashop['0']['title'].'
                            
                            <span class="text-plus"><a target="_blank" href="http://'.$datashop['0']['shopurl'].'.'.domain.'">+</a></span>
                        </span>
                        <div  style="" class="img-area'.$valuearea['subcatid'].'"><p>Bee Help Flood</p></div>
                    </h4>
                    <ul>';
                   for($k=1;$k<8;$k++)
                   { 
                    if($datashop[$k]['shopname'])
                    {
                       $pic="";
                       if(is_file(rootpath.'/images/shop_c/'.$datashop[$k]['shopurl'].'/resize/thumb2.jpg'))
                    {
                      $pic=homeinfo.'/images/shop_c/'.$datashop[$k]['shopurl'].'/resize/thumb2.jpg';  
                    }else
                    {
                      $pic=homeinfo.'/images/default/powerbee/176-95.jpg';    
                    }
                        
                       if($k%3==0)$class='class="right"'; 
                       else $class=""; 
                        $str.= '<li '.$class.' >
                            <p><a target="_blank" href="http://'.$datashop[$k]['shopurl'].'.'.domain.'"><img src="'.$pic.'" border="0" width="176" height="95" ></a>
                            </p>
                            <p><strong>'.$datashop[$k]['shopname'].'</strong><br>
                           '.$datashop[$k]['title'].' <span class="text-plus"><a target="_blank" href="http://'.$datashop[$k]['shopurl'].'.'.domain.'">+</a></span></p>
                        </li>';
                    }
                   }    
                        
                        $str.='</ul>
                </div>
            </li>';
            }
         }

   $this->db->closedb();       
          
        return   $str;
          
          
      }
      function showcat2()
      {
        $this->db->get_connect(); 
        $sql="SELECT * FROM tb_cat where catid <> 16  ";
        $this->db->db_set_recordset($sql);
        $dataarea=$this->db->db_get_recordset($sql);
        $this->db->destory();
           $str='';
         foreach($dataarea as  $valuearea){
         $sql='SELECT
                    tb_shop.shopurl,
                    tb_shop.shopname,
                    tb_shop.title ,
                    tb_shop.description ,
                    tb_subcat.subcatname,
                    tb_shop.subcatid
                    FROM
                    tb_shop
                    INNER JOIN tb_subcat ON tb_shop.subcatid = tb_subcat.subcatid
                    where   tb_shop.catid='.$valuearea['catid'].'
                    order by sid   DESC
                    limit 0,7'; 
            
   $this->db->db_set_recordset($sql);
   $datashop=$this->db->db_get_recordset();
   $this->db->destory();

   if(count($datashop['0']))
   {    
       $pic="";
         if(is_file(rootpath.'/images/shop_c/'.$datashop[0]['shopurl'].'/resize/thumb1.jpg'))
                    {
                      $pic=homeinfo.'/images/shop_c/'.$datashop[0]['shopurl'].'/resize/thumb1.jpg';  
                    }else
                    {
                      $pic=homeinfo.'/images/default/no-image/269-218.jpg';    
                    }
       
        $sql="SELECT * FROM tb_subcat where catid =".$valuearea['catid']."  ";
        $this->db->db_set_recordset($sql);
        $datasubcat=$this->db->db_get_recordset($sql);
        $this->db->destory();
        $arraysubcat=array();
        foreach($datasubcat as $vasluesubcat)
        {
            
              $arraysubcat[]='<a  target="_blank" href="'.homeinfo.'/'.$valuearea['catname'].'/'.$vasluesubcat['subcatname'].'">'.$vasluesubcat['subcatname'].'</a>';
            
        }
          
       
       
             $str.='<li>
                <p>
                    <h3><a  target="_blank" href="'.homeinfo.'/'.$valuearea['catname'].'/"><img src="'.homeinfo.'/images/default/home/'.$valuearea['catname_en'].'.png" border="0"  ></a></h3>
                    <span>
                        '.join(" | ",$arraysubcat).'
                    </span>
                </p>
                <div class="featuredbox" style=" ">
                    <h4><a target="_blank" href="http://'.$datashop[0]['shopurl'].'.'.domain.'"><img src="'.$pic.'" border="0" width="269" height="218" ></a><br>
                        <span style="display:block;width:269px; height:150px;overflow:hidden;" >
                            <strong>'.$datashop['0']['shopname'].'</strong><span class="text-plus"><a target="_blank" href="http://'.$datashop['0']['shopurl'].'.'.domain.'">+</a></span> <br>
                            '.$datashop['0']['description'].'
                            
                            
                        </span>

                    </h4>
                    <ul>';
                   for($k=1;$k<8;$k++)
                   { 
                    if($datashop[$k]['shopname'])
                    {
                       $pic="";
                       if(is_file(rootpath.'/images/shop_c/'.$datashop[$k]['shopurl'].'/resize/thumb2.jpg'))
                    {
                      $pic=homeinfo.'/images/shop_c/'.$datashop[$k]['shopurl'].'/resize/thumb2.jpg';  
                    }else
                    {
                      $pic=homeinfo.'/images/default/no-image/176-95.jpg';    
                    }
                        
                       if($k%3==0)$class='class="right"'; 
                       else $class=""; 
                        $str.= '<li '.$class.' >
                            <p><a target="_blank" href="http://'.$datashop[$k]['shopurl'].'.'.domain.'"><img src="'.$pic.'" border="0" width="176" height="95" ></a>
                            </p>
                            <p style="display:block;width:176px; height:45px;overflow:hidden;"><strong>'.$datashop[$k]['shopname'].'</strong><span class="text-plus"><a target="_blank" href="http://'.$datashop[$k]['shopurl'].'.'.domain.'">+</a></span><br>
                           '.$datashop[$k]['description'].' </p>
                        </li>';
                    }
                   }    
                        
                        $str.='</ul>
                </div>
            </li>';
            }
         }

   $this->db->closedb();       
          
        return   $str;
          
          
      }
      function getcatall()
      {
              $this->db->get_connect(); 
              $sql='SELECT
count(tb_shop.catid) as countnumber,
tb_shop.catid,
tb_cat.catname,
tb_cat.catname_en 
FROM
tb_shop
INNER JOIN tb_cat ON tb_shop.catid = tb_cat.catid 
group by tb_shop.catid
order by tb_shop.catid asc';
              $this->db->db_set_recordset($sql);
              $data=$this->db->db_get_recordset();
              $this->db->destory();
              $this->db->closedb(); 
              if(count($data))
              {
                  $str='';
                  foreach($data as $value)
                  {
                     $str.='<li><a target="_blank" href="http://'.$value['catname_en'].'.'.domain.'/map">'.$value['catname'].' ('.$value['countnumber'].')</a></li>'; 
                  }
                  
              }
              
              return $str;
        }
      function view()
      {

      //  $databird['css'][]='html5reset.css';
        $databird['css'][]='style.css';
         
        $databird['fulljs'][]=homeinfo.'/js/shop/libs/jquery-1.6.4.min.js';
       // $databird['fulljs'][]=homeinfo.'/js/shop/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.js';
       // $databird['fullcss'][]=homeinfo.'/js/shop/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.css';
       $databird['option'][]= '<link rel="stylesheet" href="'.homeinfo.'/css/default/html5reset.css">'  ;
       $databird['option'][]= '<link rel="stylesheet" href="'.homeinfo.'/css/default/style.css">'  ;
        
        
        $this->header->set_data($databird);
        $this->header->get_header();
        $databird['loginfacebook']=$this->info['loginfacebook'];
        

          $databird2['cat']=$this->showcat2();
          $databird2['catall']= $this->getcatall();   
 
        
        
        
        

        $this->set_data($databird2) ;
        
        
        


        $this->load('home_bk2');
        
        
        $this->footer->get_footer();
      }
  }
?>
