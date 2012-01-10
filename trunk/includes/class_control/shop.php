<?php
  class shop extends template{
        
         function shop($db,$header,$footer,$info='')
       {
         $this->header=$header;
         $this->footer=$footer;
         $this->db=$db;
         $this->info=$info;
         

         include(includepath.'/ajax.php');
         $this->ajax=new ajax($this->db,$this->header,$this->footer,$this->info);
         $this->validateshop();
         
       }
       function validateshop()
       {
            if($this->ajax->checkshopexit($this->info['subdomain']))redirectto(homeinfo.'/search');
       
       }
           
       function view()
      {
           if($this->info['lang']=="th")
          $data=$this->ajax->getshop($this->info['subdomain']);
          else
          $data=$this->ajax->getshop($this->info['subdomain'],'tb_shop_'.$this->info['lang']);
          

           
          if($this->ajax->checkuserwithshop($this->info['subdomain']))
          {
              $databird['access']=1;
          }
          
          if($this->ajax->checkloginuser())
          {
              $databird['login']=1;
              
          }
          
          $databird['fulljs'][]='http://maps.googleapis.com/maps/api/js?sensor=false&key='.googleapikey;
          
          $databird['js'][]='jquery.fancybox-1.3.4/fancybox/jquery.mousewheel-3.0.4.pack.js';
          $databird['js'][]='jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.js';
          $databird['js'][]='youtube-player/jquery.swfobject.1-1-1.min.js';
          $databird['js'][]='youtube-player/youTubeEmbed/youTubeEmbed-jquery-1.0.js';
          

          
          $databird['js'][]='googlejs.js';
          $databird['fullcss'][]=homeinfo.'/js/shop/youtube-player/youTubeEmbed/youTubeEmbed-jquery-1.0.css';
          $databird['fullcss'][]=homeinfo.'/js/shop/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.css';
        //   $databird['probody']='onload="load()" onunload="GUnload()"';
          $this->set_folder('shop_c/'.$this->info['subdomain'].'/');
          
          
          $databird['shop']=$data['0'];
          
          if($_COOKIE['userlogin'])
          {
             $databird['listshop']= $this->ajax->getlistshop($databird['shop']['catid']);
              
          }
          
          $databird['namepost']=$databird['shop']['namepost'];  
          $databird['title']=$databird['shop']['title']; 
          $databird['tel']=$databird['shop']['tel'];
          $databird['refcode']=$databird['shop']['refcode']; 
          $databird['daterange']=$databird['shop']['daterange']; 
          $databird['website']=$databird['shop']['website'];    
          $databird['description']=$databird['shop']['description']; 
          $databird['shopname']= $databird['shop']['shopname']; 
          $databird['address']= $databird['shop']['address'];
          $databird['emailshop']= $databird['shop']['emailshop'];
          $databird['icon']= $databird['shop']['icon'];
          $databird['address']= $databird['shop']['address'];
          $databird['emailshop']= $databird['shop']['emailshop'];
          $databird['pricerange']= $databird['shop']['pricerange'];
          $databird['time1']= $databird['shop']['time1'];
          $databird['activity1']= $databird['shop']['activity1'];
          $databird['remark1']= $databird['shop']['remark1'];
          $databird['remark2']= $databird['shop']['remark2'];
          $databird['activity2']= $databird['shop']['activity2'];
          $databird['time2']= $databird['shop']['time2'];
          $databird['color']= $databird['shop']['color'];
          $databird['catname_en']= $databird['shop']['catname_en'];
          
          
         list($width,$height)= explode('x',$databird['shop']['size']); 
          $databird['width']=$width; 
          $databird['height']=$height;
    //      $databird['areaid']=$this->ajax->getarea($data['0']['proid']);
         $databird['areaid']=$databird['shop']['subcatid'];
          $databird['lang']=$this->ajax->getlang($this->info['lang']);
          $databird['landingpage']=$data['0']['tempath'].'_'.$this->info['lang'];
         //$databird['langnow']=$this->info['lang']; 
          
          
         // $databird['shopurl']=$this->info['subdomain'];
          $this->set_data($databird);

          $this->load($databird['landingpage']);    
       
          
     

        
      }
      
  }
?>
