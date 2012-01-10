<?php

   include(pluginpath.'/general_pi.php');
   include(pluginpath.'/idna.php');
   include(pluginpath.'/simplehtmldom_1_5/simple_html_dom.php');
        
  class ajax{
       private $db;
       private $header;
       private $footer;
       private $info;
       private $post;
       private $idna_convert;
       private $get;
       function ajax($db,$header,$footer,$info='')
      {
          $this->db=$db;
          $this->header=$header;
          $this->footer=$footer;
          $this->info=$info;
          $this->idna_convert=new idna_convert(); 
          if($_POST)$this->post=$_POST;
          if($_GET)$this->get=$_GET;

          if($this->info['function'])
          eval("\$this->".$this->info['function']."();");
          
          
          
      }
      function setpost($post)
      {
          $this->post=$post;
      }
      function testtest()
      {
             $password=md5(strtolower("admin") . "zxcv1234");   
             echo    $password;
      }
      function getdistrict()
      {
          
          $this->db->get_connect();
          if($this->post['proid'])
          {
             $proid=$this->post['proid']; 
          }else  if($this->get['proid'])
          {
             $proid=$this->get['proid']; 
          }
          $this->db->db_set_recordset('SELECT disid,disname FROM `tb_district` where proid="'.$proid.'" ');
          $arraydata=$this->db->db_get_recordset();
          $this->db->destory();
          $this->db->closedb();
          

          if(count($arraydata))
          {
             if($this->get['callback'])
             {
                header("content-type: text/javascript"); 
                //echo "callback=".$this->get['callback']; 
               echo $this->get['callback'].'(' . json_encode($arraydata) . ');';  
             }else
             {
              echo array2json($arraydata);   
             }
              
          }
          
          else
          {
              $data['error']=1;
              if($this->post['callback'])
             {
              header("content-type: text/javascript");    
              echo $this->get['callback'].'(' . json_encode($arraydata) . ');';    
             }else
             {
              echo array2json($arraydata);   
             }
          }
          
      }
      function getemailbyusername()
      {
          $str=$this->post['username'];
          $this->db->get_connect();
          $this->db->db_set_recordset('SELECT email,mid FROM `tb_member` where username="'.$str.'" ');
          $data=$this->db->db_get_recordset();
          $this->db->destory();
          $this->db->closedb();
          $this->post['mid']=$data['0']['mid'];  
          return $data['0']['email'];
      }
      function setforgetpassword($strcode)
      {
          if($this->post['mid'])
          {
         $this->db->get_connect();
         $arraymember['forgetpassword']=$strcode;
        $this->db->db_set($arraymember,'tb_member',' mid='.$this->post['mid']);

        $this->db->destory();
        $this->db->closedb();
        }
      }
      function setstatuscode($strcode)
      {
          if($this->post['mid'])
          {
         $this->db->get_connect();
         $arraymember['statuscode']=$strcode;
        $this->db->db_set($arraymember,'tb_member',' mid='.$this->post['mid']);

        $this->db->destory();
        $this->db->closedb();
        }
      }
        function getuserbyemail()
      {
          $str=$this->post['email'];
          $this->db->get_connect();
          $this->db->db_set_recordset('SELECT username,mid FROM `tb_member` where email="'.$str.'" ');
          $data=$this->db->db_get_recordset();
          $this->db->destory();
          $this->db->closedb();
          $this->post['mid']=$data['0']['mid']; 
          return $data['0']['username'];
      }
      function setpassword()
      {
           if($this->post['forgetpassword'])
          {
         $this->db->get_connect();
         $arraymember['forgetpassword']='';
         $arraymember['password']=md5(strtolower($this->post['username']) . $this->post['password1']); ; 
        $this->db->db_set($arraymember,'tb_member',' forgetpassword="'.$this->post['forgetpassword'].'"');
        
        $this->db->destory();
        $this->db->closedb();
        
        $arraydata['error']=0;    
         echo array2json($arraydata); 
        }else
        {
        $arraydata['error']="ผิดพลาด";    
         echo array2json($arraydata); 
        }
      }
      function sendcode()
      {
          global $config;
          $access=0;
          
          $this->post['username']=$this->post['setname']; 
          if(!$this->checkusername(1))
        {
        $username= $this->post['username'];  
        $email=$this->getemailbyusername();
       
        
        $access=1;
        }
        else
        {
        $this->post['email']=$this->post['setname']; 
        if(!$this->checkemail(1))
        {
         $email=$this->post['email'];
         $username=$this->getuserbyemail();    
         $access=1;    
        }
        }
        if($access)
        {
         
           $stringCode=md5($username.$email.date('ymdhis'));   
           $this->setforgetpassword($stringCode);  
            
          include(pluginpath.'/phpmailer/phpmailer.inc.php');   
          $mail             = new CI_Phpmailer($config);
          
          $body             ='เมล์นี้ถูกส่งมาเพราะฟังค์ชั่น \'ลืมรหัสผ่าน\' ได้ถูกใช้งานในชื่อผู้ใช้งานของคุณ  
              คุณสามารถกำหนดรหัสผ่านใหม่ได้โดยการคลิกลิ้งค์ต่อไปนี้:'."<br><br>".'
       '."<a href='".homeinfo."/setpassword/$stringCode/'>".homeinfo."/setpassword/$stringCode/</a><br><br>".'
     IP: '.$_SERVER['REMOTE_ADDR'].' '."<br><br>".'
      '."<br><br>".'

     ทีมงาน 2bsimple'; 

         $mail->From='doreply@infostant.com';
         $mail->FromName='Admin'; 
         $mail->Subject    = "รหัสผ่านใหม่สำหรับ infostant.com";
         $mail->MsgHTML($body);
       //  echo     $email;
         $mail->AddAddress($email, $username); 
         $mail->CharSet="utf-8";
         $mail->SMTPAuth=true;
         if(!$mail->Send()){
         $arraydata['error']="ไม่สามารถส่ง email นี้ได้";    
         echo array2json($arraydata);   
         
         } 
         else {
          $arraydata['error']=0;    
         echo array2json($arraydata);     
        // echo "Message sent!";
         }
          
          
          $str='';  
            
        }else
        {
         $arraydata['error']="ไม่มีข้อมูล user นี้";    
         echo array2json($arraydata);    
            
        }
        
       
          
          
      }
      function gettumbon()
      {
          
          $this->db->get_connect();
          if($this->post['disid'])
          {
             $disid=$this->post['disid']; 
          }else  if($this->get['disid'])
          {
             $disid=$this->get['disid']; 
          }
          $this->db->db_set_recordset('SELECT tumid,tumname FROM `tb_tumbon` where disid="'.$disid.'" ');
          $arraydata=$this->db->db_get_recordset();
          $this->db->destory();
          $this->db->closedb();
          if(count($arraydata))
          {
             if($this->get['callback'])
             {
                header("content-type: text/javascript"); 
                //echo "callback=".$this->get['callback']; 
               echo $this->get['callback'].'(' . json_encode($arraydata) . ');';  
             }else
             {
              echo array2json($arraydata);   
             }
              
          }
          
          else
          {
              $data['error']=1;
              if($this->post['callback'])
             {
              header("content-type: text/javascript");    
              echo $this->post['callback'].'(' . json_encode($arraydata) . ');';    
             }else
             {
              echo array2json($arraydata);   
             }
          }
          
          
      }
      
      function loginuser($noredirect=0)
      {
          $arraydata=$this->post;

//setcookie("userlogin", '', time()-3600, "/", ".".domain);
          unset($_COOKIE);
          if($arraydata['password1'])
          {
              $arraydata['password']=$arraydata['password1'];
          }
          if($arraydata['username']&&$arraydata['password']&&empty($_COOKIE['userlogin']))
          {
          
              $username=$arraydata['username'];
              $password=md5(strtolower($arraydata['username']) . $arraydata['password']);
              $this->db->get_connect();
              $this->db->db_set_recordset('SELECT mid,email  FROM `tb_member` where `username`="'.$username.'" and `password`="'.$password.'" and `status` ="1" ');
              
              $data=$this->db->db_get_recordset();
          
              $this->db->destory();
              $this->db->closedb();
              if(count($data))
              {   
                  
                 
                  setcookie("userid", $data[0]['mid'], time()+3600000, "/", ".".domain);
                  setcookie("email", $data[0]['email'], time()+3600000, "/", ".".domain);
                  setcookie("userlogin", $username, time()+3600000, "/", ".".domain);
                  

                  //setcookie("TestCookie", "1");
                  
              }
              
          }

          if($noredirect==0)redirectto($_SERVER['HTTP_REFERER']);
      }
      
      function checkloginuser()
      {
          if($_COOKIE['userid'])
          {
              return true;
          }else
          {
              return false;
              
          }
      }
       function logoutuser()
        {
         // $arraydata=$this->post;
          setcookie("userid", '', time()-3600000, "/", ".".domain);
          setcookie("email", '', time()-3600000, "/", ".".domain);
          setcookie("userlogin", '', time()-3600000, "/", ".".domain);
          if($_COOKIE['fconnect'])
          {
              $logouturl=$_COOKIE['fconnect'];
              setcookie("fconnect",'', time()-3600000, "/", ".".domain);
            //  echo $this->info['logouturl'];

          }


                 if($this->info['logouturl'])alert('',$this->info['logouturl']); 
                 else alert('',$_SERVER['HTTP_REFERER']);   
          
                        
              exit();
          
          
      }
        function savefav()
        {
          if($this->post['shopurl']&&$this->checkloginuser())
          {  
           
          $datashop=$this->getshop($this->post['shopurl']);
          $data['mid']=$_COOKIE['userid'];
          $data['sid']=$datashop[0]['sid'];
          $data['createdate']=date('Y-m-d H:i:s');
          $this->db->get_connect();
          $this->db->db_set($data,'tb_fav');
         // $this->db->db_set_recordset('SELECT subcatid,subcatname FROM `tb_subcat` where catid="'.$this->post['catid'].'" ');
          //$data=$this->db->db_get_recordset();
          $this->db->destory();
          $this->db->closedb();
          $arraydata['resposne']=1;
          echo array2json($arraydata); 
          
          }
            
        }
        function savelike()
        {
          if($this->post['shopurl']&&$this->checkloginuser())
          {  
           
          $datashop=$this->getshop($this->post['shopurl']);
          $data['mid']=$_COOKIE['userid'];
          $data['sid']=$datashop[0]['sid'];
          $data['ip']=$_SERVER['REMOTE_ADDR'];
          $data['createdate']=date('Y-m-d H:i:s');
          $this->db->get_connect();
          $this->db->db_set($data,'tb_like');
          $this->db->destory();
          $this->db->closedb();
          $arraydata['resposne']=1;
          echo array2json($arraydata); 
          
          }
            
        }
       function getsubcat()
       {
         
         if($this->post['catid'])
          {
             $catid=$this->post['catid']; 
          }else  if($this->get['catid'])
          {
             $catid=$this->get['catid']; 
          }
          
          $this->db->get_connect();
          $this->db->db_set_recordset('SELECT subcatid,subcatname FROM `tb_subcat` where catid="'.$catid.'" ');
          $arraydata=$this->db->db_get_recordset();
          $this->db->destory();
          $this->db->closedb();
           if(count($arraydata))
          {

             if($this->get['callback'])
             {
                header("content-type: text/javascript"); 
                //echo "callback=".$this->get['callback']; 
               echo $this->get['callback'].'(' . json_encode($arraydata) . ');';  
             }else
             {
              echo array2json($arraydata);   
             } 
          }
          
          else
          {
              $data['error']=1;
              echo array2json($arraydata);
          }
         // echo array2json($datasubcat);
          
      }
        function getlistshop($catid)
        {
              $this->db->get_connect();
    
           if($catid=='16')
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
        function getlatbycat($str2)
        {
         $this->db->get_connect();
          $this->db->db_set_recordset('SELECT
          tb_shop.lat,
          tb_shop.lng,
          tb_shop.shopname,
          tb_shop.shopurl,
          tb_shop.title,
          tb_shop.description,
          tb_shop.namepost,
          tb_shop.tel,
          tb_shop.emailshop,
          tb_shop.address,
          tb_cat.icon,
          tb_cat.size    
          FROM
          tb_shop
          INNER JOIN tb_cat ON tb_shop.catid = tb_cat.catid 
          where tb_cat.catid="'.$str2.'" ');

          $data=$this->db->db_get_recordset();
          $this->db->destory();
          $this->db->closedb(); 
          $datafile=array();
          if(count($data))
          {
              $k=1;
              foreach($data as $value)
              {
                  $arraylat[]=$value['lat'];
                  $arraylng[]=$value['lng'];
                  $str[]="['".mysql_escape_string($value['shopname'])."',".$value['lat'].",".$value['lng'].",".$k."]";
                  $arraydata[$k]['title']=$value['title'];
                  $arraydata[$k]['icon']=$value['icon'];
                  list($arraydata[$k]['width'],$arraydata[$k]['height'])= explode('x',$value['size']);  
                  $arraydata[$k]['description']=$value['description']; 
                  $arraydata[$k]['shopurl']='http://'.$value['shopurl'].'.'.domain;
                  $arraydata[$k]['shopname']=$value['shopname']; 
                  $arraydata[$k]['namepost']=$value['namepost'];
                  $arraydata[$k]['emailshop']=$value['emailshop'];
                  $arraydata[$k]['address']=$value['address'];
                  $arraydata[$k]['tel']=$value['tel'];
                   if(is_file(rootpath.'/images/shop_c/'.$value['shopurl'].'/resize/thumb4.jpg'))
                    {
                      $arraydata[$k]['pic']=homeinfo.'/images/shop_c/'.$value['shopurl'].'/resize/thumb4.jpg';  
                    }else
                    {
                      $arraydata[$k]['pic']=homeinfo.'/images/default/no-image/302-220.jpg';    
                    }   
                  $k++;
                  
              }
              $datafile['latnew']=array_sum($arraylat)/count($arraylat);
              $datafile['lngnew']=array_sum($arraylng)/count($arraylng);
              
             $newjson= join(",",$str);
             $datafile['json']=$newjson;
             $datafile['json2']=array2json($arraydata);
              
          }
          
          
          return $datafile;
            
        }
        function getlatbyshop($str2)
        {
         $this->db->get_connect();
          $this->db->db_set_recordset('SELECT
          tb_shop.lat,
          tb_shop.lng,
          tb_shop.shopname,
          tb_shop.shopurl,
          tb_shop.title,
          tb_shop.description,
          tb_shop.namepost,
          tb_shop.tel,
          tb_shop.emailshop,
          tb_shop.address,
          tb_cat.icon,
          tb_cat.size    
          FROM
          tb_shop
          INNER JOIN tb_cat ON tb_shop.catid = tb_cat.catid 
          where tb_shop.shopurl="'.$str2.'" ');
          $data=$this->db->db_get_recordset();
          $this->db->destory();
          $this->db->closedb(); 
          $datafile=array();
          if(count($data))
          {
              $k=1;
              foreach($data as $value)
              {
                  $arraylat[]=$value['lat'];
                  $arraylng[]=$value['lng'];
                  $str[]="['".mysql_escape_string($value['shopname'])."',".$value['lat'].",".$value['lng'].",".$k."]";
                  $arraydata[$k]['title']=$value['title'];
                  $arraydata[$k]['icon']=$value['icon'];
                  list($arraydata[$k]['width'],$arraydata[$k]['height'])= explode('x',$value['size']);  
                  $arraydata[$k]['description']=$value['description']; 
                  $arraydata[$k]['shopurl']='http://'.$value['shopurl'].'.'.domain;
                  $arraydata[$k]['shopname']=$value['shopname']; 
                  $arraydata[$k]['namepost']=$value['namepost'];
                  $arraydata[$k]['emailshop']=$value['emailshop'];
                  $arraydata[$k]['address']=$value['address'];
                  $arraydata[$k]['tel']=$value['tel'];
                   if(is_file(rootpath.'/images/shop_c/'.$value['shopurl'].'/resize/thumb4.jpg'))
                    {
                      $arraydata[$k]['pic']=homeinfo.'/images/shop_c/'.$value['shopurl'].'/resize/thumb4.jpg';  
                    }else
                    {
                      $arraydata[$k]['pic']=homeinfo.'/images/default/no-image/302-220.jpg';    
                    }   
                  $k++;
                  
              }
              $datafile['latnew']=array_sum($arraylat)/count($arraylat);
              $datafile['lngnew']=array_sum($arraylng)/count($arraylng);
              
             $newjson= join(",",$str);
             $datafile['json']=$newjson;
             $datafile['json2']=array2json($arraydata);
              
          }
          
          
          return $datafile;
            
        }
        
        function getlatbyshopforiphone()
        {
            if($this->post['shopurl'])
            {
          echo  array2json($this->getlatbyshop($this->post['shopurl']));   
            }else if($this->post['category'])
            {
                $catid=$this->getshopcat($this->post['category']) ;
          echo  array2json($this->getlatbycat($catid));       
            }
            
        }
        
        
        function getlaflood()
        {
         $this->db->get_connect();
          $this->db->db_set_recordset('SELECT
          tb_shop.lat,
          tb_shop.lng,
          tb_shop.shopname,
          tb_shop.shopurl,
          tb_shop.title,
          tb_shop.description,
          tb_shop.namepost,
          tb_shop.tel,
          tb_shop.emailshop,
          tb_shop.address    
          FROM
          tb_shop
          where tb_shop.catid="'.'16'.'" ');
          $data=$this->db->db_get_recordset();
          $this->db->destory();
          $this->db->closedb(); 
          $datafile=array();
          if(count($data))
          {
              $k=1;
              foreach($data as $value)
              {
                  $arraylat[]=$value['lat'];
                  $arraylng[]=$value['lng'];
                  $str[]="['".$value['shopname']."',".$value['lat'].",".$value['lng'].",".$k."]";
                  $arraydata[$k]['title']=$value['title'];
                  $arraydata[$k]['description']=$value['description']; 
                  $arraydata[$k]['shopurl']='http://'.$value['shopurl'].'.'.domain;
                  $arraydata[$k]['shopname']=$value['shopname']; 
                  $arraydata[$k]['namepost']=$value['namepost'];
                  $arraydata[$k]['emailshop']=$value['emailshop'];
                  $arraydata[$k]['address']=$value['address'];
                  $arraydata[$k]['tel']=$value['tel'];
                   if(is_file(rootpath.'/images/shop_c/'.$value['shopurl'].'/resize/thumb4.jpg'))
                    {
                      $arraydata[$k]['pic']=homeinfo.'/images/shop_c/'.$value['shopurl'].'/resize/thumb4.jpg';  
                    }else
                    {
                      $arraydata[$k]['pic']=homeinfo.'/images/default/powerbee/302-220.jpg';    
                    }   
                  $k++;
                  
              }
              $datafile['latnew']=array_sum($arraylat)/count($arraylat);
              $datafile['lngnew']=array_sum($arraylng)/count($arraylng);
              
             $newjson= join(",",$str);
             $datafile['json']=$newjson;
             $datafile['json2']=array2json($arraydata);
              
          }
          
          
          return $datafile;
            
        }
        function getshop($str,$table="tb_shop")
        {
          $this->db->get_connect();
          $this->db->db_set_recordset('SELECT
          '.$table.'.sid,
          '.$table.'.shopname,
          '.$table.'.namepost,
          '.$table.'.shopurl,
          '.$table.'.website,
          '.$table.'.title,
          '.$table.'.catid,
          '.$table.'.subcatid, 
          '.$table.'.keyword,
          '.$table.'.description,
          '.$table.'.address,
          '.$table.'.proid,
          '.$table.'.disid,
          '.$table.'.tumid,
          '.$table.'.postcode,
          '.$table.'.tel,
          '.$table.'.emailshop,
          '.$table.'.daterange,
          '.$table.'.lat,
          '.$table.'.lng,
          '.$table.'.mid,
          '.$table.'.info,  
          
          '.$table.'.activity1,
          '.$table.'.time1,
          '.$table.'.remark1,
          '.$table.'.remark2,
          '.$table.'.time2,
          '.$table.'.activity2,
          '.$table.'.refcode, 
          '.$table.'.pricerange,
          tb_cat.icon,
          tb_cat.size,
          tb_cat.catname_en,
          tb_cat.color,
          tb_template.tempath,
          tb_template.temname
            FROM
            '.$table.'
            INNER JOIN tb_cat ON '.$table.'.catid = tb_cat.catid   
            INNER JOIN tb_subcat ON '.$table.'.subcatid = tb_subcat.subcatid
            INNER JOIN tb_template ON '.$table.'.temid = tb_template.temid
            where '.$table.'.shopurl="'.$str.'" ');
            
            
          $data=$this->db->db_get_recordset();
          $this->db->destory();
          $this->db->closedb(); 
          return $data;
      }
      function getarea($proid)
      {
          $this->db->get_connect();
          $this->db->db_set_recordset('SELECT areaid FROM `tb_province` where proid="'.$proid.'" ');
          $data=$this->db->db_get_recordset();
          $this->db->destory();
          $this->db->closedb();
          return $data['0']['areaid'];
      }
      function replacebg($set)
      {
             if($set)
          {
              if($this->post['setdata']=="white")
              {
                  if(strpos($set,'black')!==false){
                     $set= str_replace('black',$this->post['setdata'],$set); 
                  }else
                  {
                      if(strpos($set,'white')===false){
                    $set =$set.' '.$this->post['setdata']; 
                     }
                  }
                 
              }else if($this->post['setdata']=="black")
              {
                 if(strpos($set,'white')!==false){
                     $set= str_replace('white',$this->post['setdata'],$set); 
                  }else
                  {
                      if(strpos($set,'black')===false){
                    $set =$set.' '.$this->post['setdata']; 
                     }
                  }
                  
              }
              return $set;
          }
      }
      function savebg()
      {
          if($this->checkuserwithshop($this->post['shopurl']))
          {
          
          $file=fullpathtemp.$this->post['shopurl'].'/'.$this->post['filename'].'.php';
          $html=file_get_html($file);
         // list($text1,$text2)=explode(" ",$html->find('body',0)->class);
           if($html->find('body',0)->class)
           $html->find('body',0)->class=$this->replacebg($html->find('body',0)->class);
           if($html->find('div#title',0)->class)
          $html->find('div#title',0)->class=$this->replacebg($html->find('div#title',0)->class);
          if($html->find('div#detail',0)->class)
          $html->find('div#detail',0)->class=$this->replacebg($html->find('div#detail',0)->class);
           if($html->find('div#daterange',0)->class)
          $html->find('div#daterange',0)->class=$this->replacebg($html->find('div#daterange',0)->class);
          if($html->find('div#contact',0)->class)
          $html->find('div#contact',0)->class=$this->replacebg($html->find('div#contact',0)->class);
            
          // echo $html;
          $fp = fopen($file, 'w');
          fwrite($fp, $html);
          fclose($fp);
          $arraydata['resposne']=1;
          echo array2json($arraydata); 
          
          }
         // $data=$this->getshopbymid($_COOKIE['userid']);
          

          //$this->post['setdata']
          //$this->post;
          
          
      }
      function checkuserwithshop($shopurl,$userid='')
      {
         if($userid)
         {
            $_COOKIE['userid']=$userid; 
         }
         
          
          if($_COOKIE['userid'])
         {
             $this->db->get_connect();
          $this->db->db_set_recordset('SELECT
          tb_shop.sid
            FROM
            tb_shop
            where tb_shop.mid="'.$_COOKIE['userid'].'"
            and tb_shop.shopurl="'.$shopurl.'"
            
             ');
          $data=$this->db->db_get_recordset();
          
          
          $this->db->destory();
          $this->db->closedb();  
          
          if($data['0']['sid'])
          {
              
              return $data['0']['sid'];
          }else
          {
              
            return false;  
          }
          
             
             
         }else
         {
             return false;  
         }
      }
      function savemap()
      {
             if($this->post['mid'])
          {
            $_COOKIE['userid']=$this->post['mid'];  
          }
          if($this->checkuserwithshop($this->post['shopurl'],$this->post['mid']))
          {

          $this->db->get_connect();
          list($lat,$lng,$proid,$disid,$tumid)=explode("pp",$this->post['setdata']);
          $data['lat']=$lat;
          $data['lng']=$lng;
          if($proid)$data['proid']=$proid;
          if($disid)$data['disid']=$disid;
          if($tumid)$data['tumid']=$tumid;
          
          $this->db->db_set($data,'tb_shop'," tb_shop.mid='".$_COOKIE['userid']."' and tb_shop.shopurl='".$this->post['shopurl']."' " );
          
          $this->db->destory();
          $this->db->closedb(); 
          $arraydata['resposne']=1;
          echo array2json($arraydata); 
          
          }
          
      }
      function savevideo()
      {
             if($this->post['mid'])
          {
            $_COOKIE['userid']=$this->post['mid'];  
          }
          if($this->checkuserwithshop($this->post['shopurl'],$this->post['mid']))
          {
              
          $file=fullpathtemp.$this->post['shopurl'].'/'.$this->post['filename'].'.php';
          $html=file_get_html($file);
          
           $html->find('div#'.$this->post['target'].'text',0)->innertext='<iframe width="446" height="300" id="video"  src="http://www.youtube.com/embed/'.trim($this->post['setdata']).'?wmode=transparent" frameborder="0" allowfullscreen></iframe>';
           $fp = fopen($file, 'w');
          fwrite($fp, $html);
          fclose($fp);
          $arraydata['resposne']=1;
          echo array2json($arraydata); 
          }
      }
      
      function savetext()
      {
          if($this->post['mid'])
          {
            $_COOKIE['userid']=$this->post['mid'];  
          }
          if($this->checkuserwithshop($this->post['shopurl'],$this->post['mid']))
          {

           $this->db->get_connect();
          if($this->post['target']=="title"||$this->post['target']=="detail"||$this->post['target']=="namepost"||$this->post['target']=="daterange"||$this->post['target']=="pricerange")
          {
            
          if($this->post['target']=="title")$data['title']=$this->post['setdata'];
          if($this->post['target']=="detail")$data['description']=$this->post['setdata'];
          if($this->post['target']=="namepost")$data['namepost']=$this->post['setdata'];  
          if($this->post['target']=="daterange")$data['daterange']=$this->post['setdata'];   
          if($this->post['target']=="pricerange")$data['pricerange']=$this->post['setdata'];      
              
          }else{

              $arraytarget=explode("-",$this->post['target']);
               foreach($arraytarget as $valuetarget)
               {
              if(isset($this->post['text-'.$valuetarget]))
              {
                             if($valuetarget=="namepost2")
                             {
                              $data['namepost']=$this->post['text-'.$valuetarget];    
                             }else
                             {
                              $data[$valuetarget]=$this->post['text-'.$valuetarget];   
                             }
                             
              }
               }
               
          }
               list($name,$lang)=explode("_",$this->post['filename']);
              if($lang=="th")
              $table="tb_shop";
              else
              $table="tb_shop_".$lang; 
             
             $this->db->db_set($data,$table," $table.mid='".$_COOKIE['userid']."' and $table.shopurl='".$this->post['shopurl']."'  " );
             $this->db->destory();
             $this->db->closedb(); 
              
       
          
          $arraydata['data']=$data;
          $arraydata['resposne']=1;
          echo array2json($arraydata); 
          }
      }
      function getlang($selected)
      {
          global $langobj,$langtitle;
          $str="";
          $k=0;
          foreach($langobj as $valuelang)
          {
              if($selected==$valuelang)
              $str.='<option selected value="'.$valuelang.'">'.$langtitle[$k].'</option>';
              else
              $str.='<option  value="'.$valuelang.'">'.$langtitle[$k].'</option>';
              
              $k++;
          }
          return $str;
      }
      function saveimagefile()
      {
         if($this->post['filename']&&$this->post['shopurl'])
         {
          if($this->checkuserwithshop($this->post['shopurl']))
          { 
          
          $file=fullpathtemp.$this->post['shopurl'].'/'.$this->post['filename'].'.php';
          
          
          $html=file_get_html($file);
          $html->find('div#'.$this->post['action'].'', 0)->innertext='<div style="width: '.$this->post['width'].'px;height: '.$this->post['height'].'px;background-image: url('.homeinfo.'/images/shop_c/'.$this->post['shopurl'].'/resize/'.$this->post['imagesrc'].');background-repeat: no-repeat;-moz-border-radius: 7px;-webkit-border-radius: 7px;border-radius: 7px;">
          <a class="galleryimg" rel="'.$this->post['group'].'" href="'.homeinfo.'/images/shop_c/'.$this->post['shopurl'].'/'.$this->post['imageori'].'"><img style="opacity:0" alt="'.$this->post['alt'].'"  src="'.homeinfo.'/images/shop_c/'.$this->post['shopurl'].'/resize/'.$this->post['imagesrc'].'"></a></div>';
          $html->find('div[id=textx'.$this->post['action'].']', 0)->innertext=$this->post['alt'];
          $fp = fopen($file, 'w');
          fwrite($fp, $html);
          fclose($fp);
          $arraydata['resposne']=1;
          //$arraydata['html']=$html;
          echo array2json($arraydata); 
          }
          
         }
           
           
          
          
      }
      function gettablefile($shopurl)
      {
         $imagearray= $this->getimagebyshop($shopurl);
         $str='';
         $k=1;
         if(count($imagearray)&&isset($imagearray))
         {
         foreach($imagearray as $valueimage) 
         {
         list($name,$fileext)=explode(".",$valueimage); 
         $str.='<table id="table-'.$k.'" style="display: table;" class="slidetoggle describe startclosed">
        <thead class="media-item-info" id="media-head">
        <tr valign="top">
            <td width="50%" class="A1B1" id="thumbnail-head-'.$k.'">
            <p><a href="#" target="_blank"><img width="200" height="128" class="thumbnail" src="'.homeinfo.'/images/shop_c/'.$shopurl.'/resize/'.$name.'200x128.'.$fileext.'" alt="" style="margin-top: 3px"></a></p>

            </td>
            <td width="50%">
            <p><strong>ชื่อภาพ:</strong>'.$valueimage.'</p>
            <p><strong>ชนิดรูปภาพ:</strong> image/jpeg</p>
            <p><strong>คำอธิบาย:</strong> <input type="text" style="width: 150px;" id="alt-'.$k.'"  name="alt-'.$k.'" value="" ><input type="button" id="button2'.$k.'" onclick="insertimage(\''.$valueimage.'\',\''.$k.'\' )"   class="button" value="Update"> </p>
            <p><strong>ทำรูปนี้เป็น Thumbnail:</strong> <input type="checkbox"  id="check-'.$k.'"  name="check-'.$k.'" value="1" > </p>
</td></tr></thead>
        <tbody>

          <tr class="submit"><td></td><td class="savesend"><input type="button" id="button'.$k.'" onclick="insertimage(\''.$valueimage.'\',\''.$k.'\' )"   class="button" value="ใส่รูปภาพ">  <a href="#" class="del-link" onclick="deletefile(\''.$valueimage.'\' )">ลบรูปนี้ทิ้ง</a>
</div></td></tr>
    </tbody>
    </table>';
        $k++;
         }
         }
         return $str;
          
      }
      function uploadfile()
      {      
             // $this->isloginandmyshop();
              include(pluginpath.'/classupload/class.upload.php');
              $handle = new Upload($_FILES['Filedata']);
                 if ($handle->uploaded) {
                 $dir_dest = rootpath .'/'. $this->post['folder'] . '/';
                 $handle->Process($dir_dest);
                 if ($handle->processed) {
                     $arraydata['file_name']= $handle->file_dst_name;
                     chmod($dir_dest.$arraydata['file_name'],0777);
                     list($name,$fileext)=explode('.',$arraydata['file_name']);
                     
                   //  $fileext=$arrayfile[count($arrayfile)-1];
                     if(copy(homeinfo.'/plugins/showimages.php?width=200&height=128&source='.homeinfo .'/'. $this->post['folder'] . '/'.$arraydata['file_name'],$dir_dest.'resize/'.$name.'200x128.'.$fileext))
                     {
                       chmod($dir_dest.'resize/'.$name.'200x128.'.$fileext,0777);
                       $arraydata['resizename']=$name.'200x128.'.$fileext;  
                     }
                     $arrayfolder=explode("/", $this->post['folder']);
                     $shopurl=$arrayfolder['3'];
                     $arraydata['table']=$this->gettablefile($shopurl);
                 }else
                 {
                     $arraydata['error']= $handle->error;
                 }
                 }
                 $handle->Clean();
                 echo array2json($arraydata); 
               
      }
     
      function resizefile()
      {
          list($name,$fileext)=explode(".",$this->post['filename']); 
          list($width,$height)=explode("x",$this->post['resize']); 
          $resize=$width.'x'.$height;
          $dir_dest = rootpath .'/'. $this->post['folder'] . '/resize/';
          $newfile=$dir_dest.$name.$resize.'.'.$fileext;
          
          if(is_file($newfile))
          {
            $arraydata['filedata']=$name.$resize.'.'.$fileext;  
            $arraydata['width']=$width;
            $arraydata['height']=$height;
            $arraydata['fileorigi']=$this->post['filename'];
          }else
          {
               //list($width,$height)= explode("x",$resize);
             if(copy(homeinfo.'/plugins/showimages.php?width='.$width.'&height='.$height.'&source='.homeinfo .'/'. $this->post['folder'] . '/'.$this->post['filename'],$newfile))
                     {
                       chmod($newfile,0777);
                      // $arraydata['resizename']=$name.$resize.'.'.$fileext; 
                       $arraydata['filedata']=$name.$resize.'.'.$fileext;  
                       $arraydata['width']=$width;
                       $arraydata['height']=$height;
                       $arraydata['fileorigi']=$this->post['filename'];
                     } 
                     
          }
         $thumbfile1=$dir_dest.'thumb1'.'.'.$fileext; 
         $thumbfile2=$dir_dest.'thumb2'.'.'.$fileext; 
         $thumbfile3=$dir_dest.'thumb3'.'.'.$fileext;
         $thumbfile4=$dir_dest.'thumb4'.'.'.$fileext;
         $thumbfile5=$dir_dest.'thumb5'.'.'.$fileext;
         $thumbfile6=$dir_dest.'original'.'.'.$fileext;
         $thumbfile7=$dir_dest.'thumb7'.'.'.$fileext;
         $access=0;
         if(is_file($thumbfile1))
         {
               if($this->post['thumb']=="1")
               {
                   $access=1;
               }
             
         }else
         {
          $access=1;    
         }  
          if($access)
          {
          if(copy(homeinfo.'/plugins/showimages.php?width='.'269'.'&height='.'218'.'&source='.homeinfo .'/'. $this->post['folder'] . '/'.$this->post['filename'],$thumbfile1))
                     {
                       chmod($thumbfile1,0777);
                     }
         if(copy(homeinfo.'/plugins/showimages.php?width='.'176'.'&height='.'95'.'&source='.homeinfo .'/'. $this->post['folder'] . '/'.$this->post['filename'],$thumbfile2))
                     {
                       chmod($thumbfile2,0777);
                     }
          if(copy(homeinfo.'/plugins/showimages.php?width='.'120'.'&height='.'90'.'&source='.homeinfo .'/'. $this->post['folder'] . '/'.$this->post['filename'],$thumbfile3))
                     {
                       chmod($thumbfile3,0777);
                     }
          if(copy(homeinfo.'/plugins/showimages.php?width='.'302'.'&height='.'220'.'&source='.homeinfo .'/'. $this->post['folder'] . '/'.$this->post['filename'],$thumbfile4))
                     {
                       chmod($thumbfile4,0777);
                     }
          if(copy(homeinfo.'/plugins/showimages.php?width='.'200'.'&height='.'130'.'&source='.homeinfo .'/'. $this->post['folder'] . '/'.$this->post['filename'],$thumbfile5))
                     {
                       chmod($thumbfile5,0777);
                     }
          if(copy(homeinfo .'/'. $this->post['folder'] . '/'.$this->post['filename'],$thumbfile6))
                     {
                       chmod($thumbfile6,0777);
                     }
           if(copy(homeinfo.'/plugins/showimages.php?width='.'100'.'&height='.'80'.'&source='.homeinfo .'/'. $this->post['folder'] . '/'.$this->post['filename'],$thumbfile7))
                     {
                       chmod($thumbfile7,0777);
                     }
          }
          echo array2json($arraydata); 
      }
      function isloginandmyshop()
      {
           $arrayfolder=explode("/", $this->post['folder']);
           $shopurl=$arrayfolder['3'];
           if(isset($_COOKIE['userid']))  
          {
              $data=$this->getshopbymid($_COOKIE['userid'],$shopurl);
                if($data['0']['shopurl']) 
                {
                   return   true;   
                } else
                {
                   exit();     
                } 
          }else
          {
              exit();
          }
      }
     
      function deletefile()
      {
          //$this->isloginandmyshop();
          $dir_dest = rootpath .'/'. $this->post['folder'] . '/'.$this->post['filename'];
          $dir_resize = rootpath .'/'. $this->post['folder'] . '/resize/';
          if(unlink($dir_dest))
          {
           $arraysize=explode("&",size);  
           list($name,$fileext)=explode(".",$this->post['filename']); 
           foreach($arraysize as $valuesize)
           {
               
            if(@unlink($dir_resize.$name.$valuesize.'.'.$fileext))
            {
                
            }       
           
           }   
           $arrayfolder=explode("/", $this->post['folder']);
           $shopurl=$arrayfolder['3'];   
           $arraydata['table']=$this->gettablefile($shopurl);   
           $arraydata['resposne']="ลบสำเร็จ";
          }else
          {
            $arraydata['resposne']="ลบไม่สำเร็จ";  
          }
          
          echo array2json($arraydata); 
          
      }
      
      function getimagebyshop($shopurl)
      {
          
          $arrayfiles=getFilesFromDir2(rootpath.'/images/shop_c/'.$shopurl);
          return $arrayfiles;
       

      }
      function checkandgetshop($shopurl)
      {
          
            if(isset($_COOKIE['userid'])&&isset($shopurl))  
          {
          $data=$this->getshopbymid($_COOKIE['userid'],$shopurl);


              if(count($data['0']))
              {
                if($data['0']['shopurl']==$shopurl ) 
                {
                 return   $data;   
                } else
                {
                   exit();     
                } 
                
              }else
              {
               // redirectto(homeinfo.'/register') ; 
                  exit();
              }
 
         }
         else
           {
               exit();
           } 
      }
      function getshopbymid($str,$str2)
      {
          $this->db->get_connect();
          $this->db->db_set_recordset('SELECT
          tb_shop.sid,
          tb_shop.shopname,
          tb_shop.shopurl,
          tb_shop.website,
          tb_shop.title,
          tb_shop.keyword,
          tb_shop.description,
          tb_shop.address,
          tb_shop.proid,
          tb_shop.disid,
          tb_shop.tumid,
          tb_shop.postcode,
          tb_shop.tel,
          tb_shop.emailshop,
          tb_shop.daterange,
          tb_shop.lat,
          tb_shop.lng,
          tb_shop.info,
          tb_shop.mid,
          tb_template.tempath,
          tb_template.temname
            FROM
            tb_shop
            INNER JOIN tb_subcat ON tb_shop.subcatid = tb_subcat.subcatid
            INNER JOIN tb_template ON tb_subcat.temid = tb_template.temid
            where tb_shop.mid="'.$str.'" 
            and tb_shop.shopurl="'.$str2.'"
            
            ');
          $data=$this->db->db_get_recordset();
          $this->db->destory();
          $this->db->closedb(); 
          return $data;
      }
      
       function checkshopexit($str)
       {
                if(preg_match('/^[a-zก-๙0-9เ]+$/i',$str))$str=$this->changeidn($str);
           $this->db->get_connect();
          $this->db->db_set_recordset('SELECT mid FROM `tb_shop` where shopurl="'.$str.'" ');
          $data=$this->db->db_get_recordset();
          $this->db->destory();
          
            if(count($data)!=0)
          {
              $check=0;  
          }else
          {
              $check=1;  
              
          $this->db->db_set_recordset('SELECT catid FROM `tb_cat` where catname_en="'.$str.'" ');
          $data=$this->db->db_get_recordset();
          $this->db->destory(); 
          $this->db->closedb(); 
          
            if(count($data)!=0)
          {
              $check=0;
          }else
          {
              $check=1;
          }
              
               
          }
         
          
          
          return $check;
          
       }
       
       function  getshopcat($str)
       {
           $this->db->get_connect();  
          $this->db->db_set_recordset('SELECT catid FROM `tb_cat` where catname_en="'.$str.'" ');
          $data=$this->db->db_get_recordset();
          $this->db->destory(); 
          $this->db->closedb(); 
          
          if(isset($data['0']['catid']))
          {
               $catid=$data['0']['catid'];   
          }else
          {
               $catid=0;
          }
          
          
          return   $catid;
       }
       function checkshopurl($noecho="")
       {
          $str= $this->post['shopurl'];  
        //  echo $str;
         $role=array('webboard','www','shop','infostant','digidai','flood') ;       
           
        if(preg_match('/^[a-zก-๙0-9เ]+$/i',$str)&&!in_array($str,$role)){
          $check=$this->checkshopexit($str);
          }else{
         //  if(preg_match('/^[a00-9]+$/i',$str))   
          $check=0;
         }
         
         
         
          if($check){if($noecho) return true; else echo "true";}
          else{ if($noecho) return false; else echo "false";}
          
          
          

           
       }
       
       function checkusername($noecho="")
       {
          $role=array('webboard','www','shop','infostant','digidai','flood','kuy') ;  
          $str= $this->post['username'];  
        if(preg_match('/^[a-z0-9]+$/i',$str)&&!in_array($str,$role)){
            
          $check=1;
          
          $this->db->get_connect();
          $this->db->db_set_recordset('SELECT tb_member.mid,tb_cat.catname_en FROM `tb_member`,`tb_cat` where tb_member.username="'.$str.'" or tb_cat.catname_en="'.$str.'"  ');
          $data=$this->db->db_get_recordset();
          
            if(count($data)!=0)
          {
              $check=0;
          }
          $this->db->destory();
          $this->db->closedb(); 
          
         }else{
         //  if(preg_match('/^[a00-9]+$/i',$str))   
          $check=0;
         }
         
         
         
          if($check){if($noecho) return true; else echo "true";}
          else{ if($noecho) return false; else echo "false";}  
           
           
       }
       function changeidn($subdomain="")
       {
           
           $decode_url = $this->idna_convert->encode($subdomain);
           return $decode_url;
       }
       function savemember()
       {
        $arraydata=$this->post;
         if($arraydata['email'])
         {
        $arraymember['email']=$arraydata['email'];
        if(isset($arraydata['fid']))$arraymember['fid']=$arraydata['fid'];
        $arraymember['username']=$arraydata['username'];
        $arraymember['password']=md5(strtolower($arraydata['username']) . $arraydata['password1']);
        $arraymember['createdate']=date("Y-m-d H:i:s");
        $arraymember['updatedate']=date("Y-m-d H:i:s");
        $arraymember['ip']=$_SERVER['REMOTE_ADDR'];
        $this->db->get_connect();
        $this->db->db_set($arraymember,'tb_member');
        $mid= $this->db->db_get_last_number();
        $arraymember['mid']=$mid;
        $this->db->destory();
        $this->db->closedb();
        return $arraymember;
         }
        }
       function  savemember2()
       {
                   $arraydata=array();
        if(in_array('',$this->post))
        {
         
         if(is_array($this->post))
         {
             foreach($this->post as $key => $value)
             {
                          if($this->post[$key]==""&&$key!='website'&&$key!='fid'&&$key!='searchmap'&&$key!='emailshop'&&$key!='tel'&&$key!='postcode'&&$key!='refcode')
                          {
                          $arraydata[]=$key;   
                          }
             }

         }
         if(count($arraydata)>0)
         {
             
             $arraydata['error']="กรอกข้อมูลไม่ครบ";
             exit();
         }

       //  echo array2json($arraydata); 
        // exit();
        }
        if(empty($_COOKIE['userid']))
        {
        if( !preg_match('/^(?:[\w\d]+\.?)+@(?:(?:[\w\d]\-?)+\.)+\w{2,4}$/i', $this->post['email']))
        {
            $arraydata['error']=" email ไม่ถูกต้อง";
            echo array2json($arraydata); 
            exit();
        }
        if(!$this->checkemail(1))
        {
             $arraydata['error']=" email ซ้ำ";
            echo array2json($arraydata); 
            exit();
        }
        if(!$this->checkusername(1))
        {
            $arraydata['error']=" username ซ้ำ  หรือ มีตัวอักษรพิเศษ";
            echo array2json($arraydata); 
            exit();
        }
         if($this->post['password1']!=$this->post['repassword'])
        {
            $arraydata['error']=" password กรอก ไม่ตรงกัน";
            echo array2json($arraydata); 
            exit();
        }
        $arraymember= $this->savemember();
         $email=$arraymember['email'];
         $username=$arraymember['username']; 
        $arrayshop['mid']=$arraymember['mid'];
        $stringCode= md5($this->post['username']);
        $this->post['mid']=$arrayshop['mid'];
        $this->setstatuscode($stringCode);
         include(pluginpath.'/phpmailer/phpmailer.inc.php');   
          $mail             = new CI_Phpmailer($config);
          
          $body             ='เมล์นี้ถูกส่งมาเพราะฟังค์ชั่น \'ยืนยัน\' ได้ถูกใช้งานในชื่อผู้ใช้งานของคุณ  
              คุณสามารถยืนยันได้โดยการคลิกลิ้งค์ต่อไปนี้:'."<br><br>".'
       '."<a href='".homeinfo."/setaccept/$stringCode/'>".homeinfo."/setaccept/$stringCode/</a><br><br>".'
     IP: '.$_SERVER['REMOTE_ADDR'].' '."<br><br>".'
      '."<br><br>".'

     ทีมงาน 2bsimple'; 

         $mail->From='doreply@infostant.com';
         $mail->FromName='Admin'; 
         $mail->Subject    = "ยืนยันการเป็นสมาชิก infostant.com";
         $mail->MsgHTML($body);
       //  echo     $email;
         $mail->AddAddress($email, $username); 
         $mail->CharSet="utf-8";
         $mail->SMTPAuth=true;
         if(!$mail->Send()){
         $arraydata['error']="ไม่สามารถส่ง email นี้ได้";    
         echo array2json($arraydata);   
         
         } 
         else {
          $arraydata['error']=0;    
         echo array2json($arraydata);     
        // echo "Message sent!";
         }
        } 
       }
       function saveflood()
       {
          
       $arraydata=array();
        if(in_array('',$this->post))
        {
         
         if(is_array($this->post))
         {
             foreach($this->post as $key => $value)
             {
                          if($this->post[$key]==""&&$key!='website'&&$key!='fid'&&$key!='searchmap')
                          {
                          $arraydata[]=$key;   
                          }
             }

         }
         if(count($arraydata)>0)
         {
             
             $arraydata['error']="กรอกข้อมูลไม่ครบ";
             exit();
         }

       //  echo array2json($arraydata); 
        // exit();
        }
         if(empty($_COOKIE['userid']))
        {
        if( !preg_match('/^(?:[\w\d]+\.?)+@(?:(?:[\w\d]\-?)+\.)+\w{2,4}$/i', $this->post['email']))
        {
            $arraydata['error']=" email ไม่ถูกต้อง";
            echo array2json($arraydata); 
            exit();
        }
        
        if(!$this->checkemail(1))
        {
             $arraydata['error']=" email ซ้ำ";
            echo array2json($arraydata); 
            exit();
        }
       
        if(!$this->checkusername(1))
        {
            $arraydata['error']=" username ซ้ำ  หรือ มีตัวอักษรพิเศษ";
            echo array2json($arraydata); 
            exit();
        }
         if($this->post['password1']!=$this->post['repassword'])
        {
            $arraydata['error']=" password กรอก ไม่ตรงกัน";
            echo array2json($arraydata); 
            exit();
        }
        
        }
        if(!$this->checkshopurl(1))
        {
            $arraydata['error']=" shopurl ซ้ำ หรือ มีตัวอักษรพิเศษ";
            echo array2json($arraydata); 
            exit();
        }
        if( !preg_match('/^(?:[\w\d]+\.?)+@(?:(?:[\w\d]\-?)+\.)+\w{2,4}$/i', $this->post['emailshop']))
        {
            $arraydata['error']=" email ของชื่อสถานที่ ไม่ถูกต้อง";
            echo array2json($arraydata); 
            exit();
        }
        
        



        $arraydata2=$this->post;

                
                
         if(empty($_COOKIE['userid']))
        {
        $arraymember= $this->savemember();
       
        $arrayshop['mid']=$arraymember['mid'];
         }else
         {
          $arrayshop['mid']=$_COOKIE['userid'];   
         }
        
        $arrayshop['catid']=$arraydata2['cat'];
        $arrayshop['subcatid']=$arraydata2['subcat'];
        
        $arrayshop['shopname']=  $arraydata2['shopname'];
        
        $arrayshop['namepost']=$arraydata2['namepost'];
        $arrayshop['website']=$arraydata2['website'];
        $arrayshop['title']=$arraydata2['title'];
        $arrayshop['keyword']=$arraydata2['keyword'];
        $arrayshop['description']=$arraydata2['description'];
        $arrayshop['proid']=$arraydata2['province'];
        $arrayshop['disid']=$arraydata2['district'];
        $arrayshop['tumid']=$arraydata2['tumbon'];
        $arrayshop['postcode']=$arraydata2['postcode'];
        $arrayshop['address']=$arraydata2['address'];
        $arrayshop['tel']=$arraydata2['tel'];
        $arrayshop['emailshop']=$arraydata2['emailshop'];
        $arrayshop['daterange']=$arraydata2['daterange'];
        $arrayshop['lat']=$arraydata2['lat'];
        $arrayshop['lng']=$arraydata2['lng'];
        $arrayshop['createdate']=date("Y-m-d H:i:s");
        $arrayshop['updatedate']=date("Y-m-d H:i:s");
        if(preg_match('/^[a-zก-๙0-9เ]+$/i',$arraydata2['shopurl']))$arrayshop['shopurl']=strtolower($this->changeidn($arraydata2['shopurl']));
        else $arrayshop['shopurl']=$arraydata2['shopurl'];

        
        $this->db->get_connect();
        $this->db->db_set($arrayshop,'tb_shop');
        $mid= $this->db->db_get_last_number();
        $this->db->destory();
        $this->db->closedb();
        $arraydata['error']=0;
        $arraydata['shopurl']=$arrayshop['shopurl'];
       // $this->post=$arraymember;
        $this->loginuser(1);
        
          
       
         if(!is_dir(fullpathtemp.$arraydata['shopurl']))
         {
             mkdir(fullpathtemp.$arraydata['shopurl']);
             chmod(fullpathtemp.$arraydata['shopurl'],0777);
         }
         if(!is_dir(fullpathimages.$arraydata['shopurl']))
         {
             mkdir(fullpathimages.$arraydata['shopurl']);
             chmod(fullpathimages.$arraydata['shopurl'],0777);
         }
         if(!is_dir(fullpathimages.$arraydata['shopurl'].'/resize'))
         {
             mkdir(fullpathimages.$arraydata['shopurl'].'/resize');
             chmod(fullpathimages.$arraydata['shopurl'].'/resize',0777);
         }
         $data=$this->getshop($arraydata['shopurl']);
           
         if(copy(fullpathtemplates.$data['0']['temname'].'/'.$data['0']['tempath'].'.php',fullpathtemp.$arraydata['shopurl'].'/'.$data['0']['tempath'].'_th.php')){
             $file1=fullpathtemp.$arraydata['shopurl'].'/'.$data['0']['tempath'].'_th.php';
             chmod($file1,0777);
           
         
         
         
         }
         if(copy(fullpathtemplates.$data['0']['temname'].'/'.$data['0']['tempath'].'.php',fullpathtemp.$arraydata['shopurl'].'/'.$data['0']['tempath'].'_en.php'))
         {
             $file2=fullpathtemp.$arraydata['shopurl'].'/'.$data['0']['tempath'].'_en.php';
             chmod($file2,0777);
         }
         
         
         //if($arrayshop['catid']==16)
//           {
//               
//          
//             $html=file_get_html($file1);
//          
//               $html->find('div#postby',0)->innertext='<span style="color:#029fc1 ;">ผู้โพสต์ </span> : <span style="color:#ea9a01 ;">'.$arrayshop['namepost'].' </span>';
//              $html->find('div#title',0)->innertext=$arrayshop['title'];
//              $html->find('div#detail',0)->innertext=$arrayshop['description'];
//              $html->find('div#contact',0)->innertext='ชื่อผู้ติดต่อ : '.$arrayshop['namepost'].' <br>
//ชื่อสถานที่ : '.$arrayshop['shopname'].'<br>
//ที่อยู่ : '.$arrayshop['address'].'<br>
//เบอร์โทร: '.$arrayshop['tel'].'<br>
//อีเมล์ :'.$arrayshop['emailshop'].'<br>';
//           
//           
//              $fp = fopen($file1, 'w');
//              fwrite($fp, $html);
//              fclose($fp);
//              
//              $fp = fopen($file2, 'w');
//              fwrite($fp, $html);
//              fclose($fp);
//           
//            }
        
         
         
        
        
        
        //echo $arraydata['error'];
        echo array2json($arraydata); 
        
        

       }
       function saveregister()
       {
          
       $arraydata=array();
        if(in_array('',$this->post))
        {
         
         if(is_array($this->post))
         {
             foreach($this->post as $key => $value)
             {
                          if($this->post[$key]==""&&$key!='website'&&$key!='fid'&&$key!='searchmap'&&$key!='emailshop'&&$key!='tel'&&$key!='postcode'&&$key!='refcode')
                          {
                          $arraydata[]=$key;   
                          }
             }

         }
         if(count($arraydata)>0)
         {
             
             $arraydata['error']="กรอกข้อมูลไม่ครบ";
             exit();
         }

       //  echo array2json($arraydata); 
        // exit();
        }
        if(empty($_COOKIE['userid']))
        {
        if( !preg_match('/^(?:[\w\d]+\.?)+@(?:(?:[\w\d]\-?)+\.)+\w{2,4}$/i', $this->post['email']))
        {
            $arraydata['error']=" email ไม่ถูกต้อง";
            echo array2json($arraydata); 
            exit();
        }
        if(!$this->checkemail(1))
        {
             $arraydata['error']=" email ซ้ำ";
            echo array2json($arraydata); 
            exit();
        }
        if(!$this->checkusername(1))
        {
            $arraydata['error']=" username ซ้ำ  หรือ มีตัวอักษรพิเศษ";
            echo array2json($arraydata); 
            exit();
        }
         if($this->post['password1']!=$this->post['repassword'])
        {
            $arraydata['error']=" password กรอก ไม่ตรงกัน";
            echo array2json($arraydata); 
            exit();
        }
        }
        if(!$this->checkshopurl(1))
        {
            $arraydata['error']=" shopurl ซ้ำ หรือ มีตัวอักษรพิเศษ";
            echo array2json($arraydata); 
            exit();
        }
       // if( !preg_match('/^(?:[\w\d]+\.?)+@(?:(?:[\w\d]\-?)+\.)+\w{2,4}$/i', $this->post['emailshop']))
//        {
//            $arraydata['error']=" email ของร้านค้า ไม่ถูกต้อง";
//            echo array2json($arraydata); 
//            exit();
//        }
        
        



        $arraydata2=$this->post;

                
        if(empty($_COOKIE['userid']))
        {
        $arraymember= $this->savemember();
       
        $arrayshop['mid']=$arraymember['mid'];
         }else
         {
          $arrayshop['mid']=$_COOKIE['userid'];   
         }
        
        $arrayshop['catid']=$arraydata2['cat'];
        $arrayshop['subcatid']=$arraydata2['subcat'];
        $arrayshop['shopname']=$arraydata2['shopname'];

        
        $arrayshop['website']=$arraydata2['website'];
        $arrayshop['title']=$arraydata2['title'];
        $arrayshop['keyword']=$arraydata2['keyword'];
        $arrayshop['description']=$arraydata2['description'];
        $arrayshop['proid']=$arraydata2['province'];
        $arrayshop['temid']=$arraydata2['template'];
        $arrayshop['disid']=$arraydata2['district'];
        $arrayshop['tumid']=$arraydata2['tumbon'];
        $arrayshop['postcode']=$arraydata2['postcode'];
        $arrayshop['address']=$arraydata2['address'];
        $arrayshop['tel']=$arraydata2['tel'];
        $arrayshop['emailshop']=$arraydata2['emailshop'];
        $arrayshop['daterange']=$arraydata2['daterange'];
        $arrayshop['lat']=$arraydata2['lat'];
        $arrayshop['lng']=$arraydata2['lng'];
        $arrayshop['refcode']=$arraydata2['refcode'];
        $arrayshop['createdate']=date("Y-m-d H:i:s");
        $arrayshop['updatedate']=date("Y-m-d H:i:s");
        if(preg_match('/^[a-zก-๙0-9เ]+$/i',$arraydata2['shopurl']))$arrayshop['shopurl']=strtolower($this->changeidn($arraydata2['shopurl']));
        else $arrayshop['shopurl']=strtolower($arraydata2['shopurl']);

        
        $this->db->get_connect();
        $this->db->db_set($arrayshop,'tb_shop');
        $mid= $this->db->db_get_last_number();
        $this->db->db_set($arrayshop,'tb_shop_en'); 
        $this->db->destory();
        $this->db->closedb();
        $arraydata['error']=0;
        $arraydata['shopurl']=$arrayshop['shopurl'];
       // $this->post=$arraymember;
        $this->loginuser(1);
        
          
       
         if(!is_dir(fullpathtemp.$arraydata['shopurl']))
         {
             mkdir(fullpathtemp.$arraydata['shopurl']);
             chmod(fullpathtemp.$arraydata['shopurl'],0777);
         }
         if(!is_dir(fullpathimages.$arraydata['shopurl']))
         {
             mkdir(fullpathimages.$arraydata['shopurl']);
             chmod(fullpathimages.$arraydata['shopurl'],0777);
         }
         if(!is_dir(fullpathimages.$arraydata['shopurl'].'/resize'))
         {
             mkdir(fullpathimages.$arraydata['shopurl'].'/resize');
             chmod(fullpathimages.$arraydata['shopurl'].'/resize',0777);
         }
         $data=$this->getshop($arraydata['shopurl']);
         
         if(copy(fullpathtemplates.$data['0']['temname'].'/'.$data['0']['tempath'].'.php',fullpathtemp.$arraydata['shopurl'].'/'.$data['0']['tempath'].'_th.php')){
             $file=fullpathtemp.$arraydata['shopurl'].'/'.$data['0']['tempath'].'_th.php';
             chmod($file,0777);

         
         
         
         }
         if(copy(fullpathtemplates.$data['0']['temname'].'/'.$data['0']['tempath'].'.php',fullpathtemp.$arraydata['shopurl'].'/'.$data['0']['tempath'].'_en.php'))
         {
             chmod(fullpathtemp.$arraydata['shopurl'].'/'.$data['0']['tempath'].'_en.php',0777);
         }
        
         
         
        
        
        
        //echo $arraydata['error'];
        echo array2json($arraydata); 
        
        

       }
       
       function checkemail($noecho="")
       {
           
          $str= $this->post['email'];  
        if($str){
            
          $check=1;
          
          $this->db->get_connect();
          $this->db->db_set_recordset('SELECT mid FROM `tb_member` where email="'.$str.'" ');
          $data=$this->db->db_get_recordset();
          
            if(count($data)!=0)
          {
              $check=0;
          }
          $this->db->destory();
          $this->db->closedb(); 
          
         }else{
         //  if(preg_match('/^[a00-9]+$/i',$str))   
          $check=0;
         }
         
         
         
          if($check){if($noecho) return true; else echo "true";}
          else{ if($noecho) return false; else echo "false";}  
           
       }
       
       function checkcapcha($noecho="")
       {
       if(strtoupper($this->post['ct_captcha']) == $_SESSION['captcha_id'])
       {
           $str="true";
       }else
       {
           $str="false";
       }
           if($noecho) 
          {
              
          }else
          {
            echo $str;
          }
        
       }
       
       function randcapcha()
       {
           $char = strtoupper(substr(str_shuffle('abcdefghjkmnpqrstuvwxyz'), 0, 4));
           $str = rand(1, 7) . rand(1, 7) . $char;
           $_SESSION['captcha_id'] = $str;

           
           
           if($str)
           {
               echo true;
           }else
           {
              echo false; 
           }
         
       }
       function getimgcapcha()
       {
           echo '
           
           <a href="" id="refreshimg"   title="Click to refresh image"><img src="'.homeinfo.'/plugins/ajaxform/captcha/image.php?'. time() .'" alt="Captcha image" width="132" height="46" align="left" /></a><span>:</span>';
       }
       function getallcat()
       {
           header("content-type: text/javascript");
         //  if(isset($_GET['name']) && isset($_GET['callback']))
//    {
//        $obj->name = $_GET['name'];
//        $obj->message = "Hello " . $obj->name;
// 
//        echo $_GET['callback']. '(' . json_encode($obj) . ');';
//    }
          // exit();
          $where="";
          if($_GET['searchTxt'])
          {
              
              $where=" and tb_shop.shopname like '%".$_GET['searchTxt']."%' ";
          }
              $this->db->get_connect();
          $this->db->db_set_recordset('
                                    SELECT
                                                tb_shop.lat,
                                                tb_shop.lng,
                                                tb_shop.shopname,
                                                tb_shop.shopurl,
                                                tb_shop.title,
                                                tb_shop.description,
                                                tb_shop.namepost,
                                                tb_shop.tel,
                                                tb_shop.emailshop,
                                                tb_shop.address,
                                                tb_area.areaname,
                                                tb_area.areaid
                                    FROM
                                    tb_shop
                                    INNER JOIN tb_province ON tb_shop.proid = tb_province.proid
                                    INNER JOIN tb_area ON tb_province.areaid = tb_area.areaid
                                    where  tb_shop.catid="'.'16'.'"
                                    '.$where.'
                                     
                                    order by    tb_area.areaid asc
                                    
                                    ');
          $data=$this->db->db_get_recordset();
          $this->db->destory();
          $this->db->closedb(); 
          $datafile=array();
          if(count($data))
          {
              $k=1;
              foreach($data as $value)
              {
                //  $arraylat[]=$value['lat'];
                //  $arraylng[]=$value['lng'];
                  //$str[]="['".$value['shopname']."',".$value['lat'].",".$value['lng'].",".$k."]";
                  $arraydata[$k]['title']=$value['title'];
                  $arraydata[$k]['description']=strip_tags($value['description']); 
                  $arraydata[$k]['shopurl']='flood.html?shopurl='.$value['shopurl'];
                  $arraydata[$k]['shopname']=$value['shopname']; 
                  $arraydata[$k]['namepost']=$value['namepost'];
                  $arraydata[$k]['emailshop']=$value['emailshop'];
                  $arraydata[$k]['address']=$value['address'];
                  $arraydata[$k]['areaid']=$value['areaid'];
                  $arraydata[$k]['areaname']=$value['areaname'];
                  $arraydata[$k]['tel']=$value['tel'];
                   if(is_file(rootpath.'/images/shop_c/'.$value['shopurl'].'/resize/thumb5.jpg'))
                    {
                      $arraydata[$k]['pic']=homeinfo.'/images/shop_c/'.$value['shopurl'].'/resize/thumb5.jpg';  
                    }else
                    {
                      $arraydata[$k]['pic']=homeinfo.'/images/default/powerbee/115-115.jpg';    
                    }   
                  $k++;
                  
              }
              //$datafile['latnew']=array_sum($arraylat)/count($arraylat);
              //$datafile['lngnew']=array_sum($arraylng)/count($arraylng);
              
          //   $newjson= join(",",$str);
            // $datafile['json']=$newjson;
           ///  $datafile['json2']=array2json($arraydata);
              
          }
          
          
          echo        $_GET['callback'].'(' . json_encode($arraydata) . ');'; 
          exit();  
           
       }
       function getallcatbyname()
       {
           header("content-type: text/javascript");
         //  if(isset($_GET['name']) && isset($_GET['callback']))
//    {
//        $obj->name = $_GET['name'];
//        $obj->message = "Hello " . $obj->name;
// 
//        echo $_GET['callback']. '(' . json_encode($obj) . ');';
//    }
          // exit();
          $where="";
          if($_GET['catname'])
          {
              
              $where="  tb_cat.catname_en like '%".$_GET['catname']."%' ";
          }
              $this->db->get_connect();
          $this->db->db_set_recordset('
                                    SELECT
                                                tb_shop.shopname,
                                                tb_shop.shopurl,
                                                tb_shop.title,
                                                tb_shop.description,
                                                tb_shop.namepost,
                                                tb_shop.tel,
                                                tb_shop.emailshop,
                                                tb_shop.address,
                                                tb_shop.daterange
                                    FROM
                                    tb_shop
                                    INNER JOIN tb_province ON tb_shop.proid = tb_province.proid
                                    INNER JOIN tb_cat ON tb_shop.catid = tb_cat.catid
                                    where  
                                    '.$where.'
                                     
                                    order by    tb_shop.createdate desc
                                    
                                    ');
                              
          $data=$this->db->db_get_recordset();
          $this->db->destory();
          $this->db->closedb(); 
          $datafile=array();
          if(count($data))
          {
              $k=1;
              foreach($data as $value)
              {
                //  $arraylat[]=$value['lat'];
                //  $arraylng[]=$value['lng'];
                  //$str[]="['".$value['shopname']."',".$value['lat'].",".$value['lng'].",".$k."]";
                  $arraydata[$k]['title']=$value['title'];
                  $arraydata[$k]['description']=strip_tags($value['description']); 
                  $arraydata[$k]['shopurl']= 'http://'.$value['shopurl'].'.'.domain;
                  $arraydata[$k]['shopname']=$value['shopname']; 
                  $arraydata[$k]['namepost']=$value['namepost'];
                  $arraydata[$k]['emailshop']=$value['emailshop'];
                  $arraydata[$k]['address']=$value['address'];
                  $arraydata[$k]['daterange']=$value['daterange'];  
                  $arraydata[$k]['tel']=$value['tel'];
                //  $dir_dest = rootpath.'/'.'images/shop_c/'.$value['shopurl'] . '/resize/'; 
            //      $thumbfile5=$dir_dest.'thumb5'.'.jpg'; 
                   if(is_file(rootpath.'/images/shop_c/'.$value['shopurl'].'/resize/thumb5.jpg'))
                    {
                   // if(copy(homeinfo.'/plugins/showimages.php?width='.'200'.'&height='.'130'.'&source='.homeinfo .'/'.'images/shop_c/'.$value['shopurl'] . '/resize/thumb4.jpg',$thumbfile5))
//                     {
//                       chmod($thumbfile5,0777);
//                     }
                      $arraydata[$k]['pic']=homeinfo.'/images/shop_c/'.$value['shopurl'].'/resize/thumb5.jpg';
                      if(is_file(rootpath.'/images/shop_c/'.$value['shopurl'].'/resize/thumb4.jpg'))
                    {
                        $arraydata[$k]['pic2']=homeinfo.'/images/shop_c/'.$value['shopurl'].'/resize/thumb4.jpg';       
                      
                    }else
                    {
                        
                       $arraydata[$k]['pic2']=homeinfo.'/images/shop_c/'.$value['shopurl'].'/resize/original.jpg'; 
                    }  
                    
                    }else
                    {
                      $arraydata[$k]['pic']=homeinfo.'/images/default/no-image/200-130.jpg';    
                    }   
                  $k++;
                  
              }
              //$datafile['latnew']=array_sum($arraylat)/count($arraylat);
              //$datafile['lngnew']=array_sum($arraylng)/count($arraylng);
              
          //   $newjson= join(",",$str);
            // $datafile['json']=$newjson;
           ///  $datafile['json2']=array2json($arraydata);
              
          }
          
          
          echo        $_GET['callback'].'(' . json_encode($arraydata) . ');'; 
          exit();  
           
       }
       function getallcatbyname2()
       {
           header("content-type: text/javascript");
         //  if(isset($_GET['name']) && isset($_GET['callback']))
//    {
//        $obj->name = $_GET['name'];
//        $obj->message = "Hello " . $obj->name;
// 
//        echo $_GET['callback']. '(' . json_encode($obj) . ');';
//    }
          // exit();
          $where="";
          if($_GET['catname'])
          {
              
              $where="  tb_cat.catname_en like '%".$_GET['catname']."%' ";
          }
              $this->db->get_connect();
          $this->db->db_set_recordset('
                                    SELECT
                                                tb_shop.shopname,
                                                tb_shop.shopurl,
                                                tb_shop.title,
                                                tb_shop.description,
                                                tb_shop.namepost,
                                                tb_shop.tel,
                                                tb_shop.emailshop,
                                                tb_shop.address,
                                                tb_shop.daterange
                                    FROM
                                    tb_shop
                                    INNER JOIN tb_province ON tb_shop.proid = tb_province.proid
                                    INNER JOIN tb_cat ON tb_shop.catid = tb_cat.catid
                                    where  
                                    '.$where.'
                                     
                                    order by    tb_shop.createdate desc
                                    
                                    ');
                              
          $data=$this->db->db_get_recordset();
          $this->db->destory();
          $this->db->closedb(); 
          $datafile=array();
          if(count($data))
          {
              $k=1;
              foreach($data as $value)
              {
                //  $arraylat[]=$value['lat'];
                //  $arraylng[]=$value['lng'];
                  //$str[]="['".$value['shopname']."',".$value['lat'].",".$value['lng'].",".$k."]";
                  $arraydata[$k]['title']=$value['title'];
                  $arraydata[$k]['description']=strip_tags($value['description']); 
                  $arraydata[$k]['shopurl']= 'landing.html?shopurl='.$value['shopurl'];
                  $arraydata[$k]['shopname']=$value['shopname']; 
                  $arraydata[$k]['namepost']=$value['namepost'];
                  $arraydata[$k]['emailshop']=$value['emailshop'];
                  $arraydata[$k]['address']=$value['address'];
                  $arraydata[$k]['daterange']=$value['daterange'];  
                  $arraydata[$k]['tel']=$value['tel'];
                //  $dir_dest = rootpath.'/'.'images/shop_c/'.$value['shopurl'] . '/resize/'; 
            //      $thumbfile5=$dir_dest.'thumb5'.'.jpg'; 
                   if(is_file(rootpath.'/images/shop_c/'.$value['shopurl'].'/resize/thumb5.jpg'))
                    {
                   // if(copy(homeinfo.'/plugins/showimages.php?width='.'200'.'&height='.'130'.'&source='.homeinfo .'/'.'images/shop_c/'.$value['shopurl'] . '/resize/thumb4.jpg',$thumbfile5))
//                     {
//                       chmod($thumbfile5,0777);
//                     }
                      $arraydata[$k]['pic']=homeinfo.'/images/shop_c/'.$value['shopurl'].'/resize/thumb5.jpg';
                      if(is_file(rootpath.'/images/shop_c/'.$value['shopurl'].'/resize/thumb4.jpg'))
                    {
                        $arraydata[$k]['pic2']=homeinfo.'/images/shop_c/'.$value['shopurl'].'/resize/thumb4.jpg';       
                      
                    }else
                    {
                        
                       $arraydata[$k]['pic2']=homeinfo.'/images/shop_c/'.$value['shopurl'].'/resize/original.jpg'; 
                    }  
                    
                    }else
                    {
                      $arraydata[$k]['pic']=homeinfo.'/images/default/no-image/200-130.jpg';    
                    }   
                  $k++;
                  
              }
              //$datafile['latnew']=array_sum($arraylat)/count($arraylat);
              //$datafile['lngnew']=array_sum($arraylng)/count($arraylng);
              
          //   $newjson= join(",",$str);
            // $datafile['json']=$newjson;
           ///  $datafile['json2']=array2json($arraydata);
              
          }
          
          
          echo        $_GET['callback'].'(' . json_encode($arraydata) . ');'; 
          exit();  
           
       }
       function getallshopbyname()
       {
           header("content-type: text/javascript");
         //  if(isset($_GET['name']) && isset($_GET['callback']))
//    {
//        $obj->name = $_GET['name'];
//        $obj->message = "Hello " . $obj->name;
// 
//        echo $_GET['callback']. '(' . json_encode($obj) . ');';
//    }
          // exit();
          $where="";
          if($_GET['searchTxt'])
          {
             $keyword=$_GET['searchTxt']; 
              $where="  tb_shop.title like '%$keyword%'   or 
           tb_shop.shopname like '%$keyword%'  or 
           tb_shop.description like '%$keyword%' or
           tb_province.proname like '%$keyword%' or 
           tb_shop.keyword like '%$keyword%' 
            ";
          }
              $this->db->get_connect();
          $this->db->db_set_recordset('
                                    SELECT
                                                tb_shop.shopname,
                                                tb_shop.shopurl,
                                                tb_shop.title,
                                                tb_shop.description,
                                                tb_shop.namepost,
                                                tb_shop.tel,
                                                tb_shop.emailshop,
                                                tb_shop.address,
                                                tb_shop.daterange
                                    FROM
                                    tb_shop
                                    INNER JOIN tb_province ON tb_shop.proid = tb_province.proid
                                    INNER JOIN tb_cat ON tb_shop.catid = tb_cat.catid
                                    where  
                                    '.$where.'
                                     
                                    order by    tb_shop.createdate desc
                                    
                                    ');
                              
          $data=$this->db->db_get_recordset();
          $this->db->destory();
          $this->db->closedb(); 
          $datafile=array();
          if(count($data))
          {
              $k=1;
              foreach($data as $value)
              {
                //  $arraylat[]=$value['lat'];
                //  $arraylng[]=$value['lng'];
                  //$str[]="['".$value['shopname']."',".$value['lat'].",".$value['lng'].",".$k."]";
                  $arraydata[$k]['title']=$value['title'];
                  $arraydata[$k]['description']=strip_tags($value['description']); 
                  $arraydata[$k]['shopurl']= 'http://'.$value['shopurl'].'.'.domain;
                  $arraydata[$k]['shopname']=$value['shopname']; 
                  $arraydata[$k]['namepost']=$value['namepost'];
                  $arraydata[$k]['emailshop']=$value['emailshop'];
                  $arraydata[$k]['address']=$value['address'];
                  $arraydata[$k]['daterange']=$value['daterange'];  
                  $arraydata[$k]['tel']=$value['tel'];
                //  $dir_dest = rootpath.'/'.'images/shop_c/'.$value['shopurl'] . '/resize/'; 
            //      $thumbfile5=$dir_dest.'thumb5'.'.jpg'; 
                   if(is_file(rootpath.'/images/shop_c/'.$value['shopurl'].'/resize/thumb5.jpg'))
                    {
                   // if(copy(homeinfo.'/plugins/showimages.php?width='.'200'.'&height='.'130'.'&source='.homeinfo .'/'.'images/shop_c/'.$value['shopurl'] . '/resize/thumb4.jpg',$thumbfile5))
//                     {
//                       chmod($thumbfile5,0777);
//                     }
                      $arraydata[$k]['pic']=homeinfo.'/images/shop_c/'.$value['shopurl'].'/resize/thumb5.jpg';
                      if(is_file(rootpath.'/images/shop_c/'.$value['shopurl'].'/resize/thumb4.jpg'))
                    {
                        $arraydata[$k]['pic2']=homeinfo.'/images/shop_c/'.$value['shopurl'].'/resize/thumb4.jpg';       
                      
                    }else
                    {
                        
                       $arraydata[$k]['pic2']=homeinfo.'/images/shop_c/'.$value['shopurl'].'/resize/original.jpg'; 
                    }  
                    
                    }else
                    {
                      $arraydata[$k]['pic']=homeinfo.'/images/default/no-image/200-130.jpg';    
                    }   
                  $k++;
                  
              }
              //$datafile['latnew']=array_sum($arraylat)/count($arraylat);
              //$datafile['lngnew']=array_sum($arraylng)/count($arraylng);
              
          //   $newjson= join(",",$str);
            // $datafile['json']=$newjson;
           ///  $datafile['json2']=array2json($arraydata);
              
          }
          
          
          echo        $_GET['callback'].'(' . json_encode($arraydata) . ');'; 
          exit();  
           
       }
       function getallshopbyname2()
       {
           header("content-type: text/javascript");
         //  if(isset($_GET['name']) && isset($_GET['callback']))
//    {
//        $obj->name = $_GET['name'];
//        $obj->message = "Hello " . $obj->name;
// 
//        echo $_GET['callback']. '(' . json_encode($obj) . ');';
//    }
          // exit();
          $where="";
          if($_GET['searchTxt'])
          {
             $keyword=$_GET['searchTxt']; 
              $where="  tb_shop.title like '%$keyword%'   or 
           tb_shop.shopname like '%$keyword%'  or 
           tb_shop.description like '%$keyword%' or
           tb_province.proname like '%$keyword%' or 
           tb_shop.keyword like '%$keyword%' 
            ";
          }
              $this->db->get_connect();
          $this->db->db_set_recordset('
                                    SELECT
                                                tb_shop.shopname,
                                                tb_shop.shopurl,
                                                tb_shop.title,
                                                tb_shop.description,
                                                tb_shop.namepost,
                                                tb_shop.tel,
                                                tb_shop.emailshop,
                                                tb_shop.address,
                                                tb_shop.daterange
                                    FROM
                                    tb_shop
                                    INNER JOIN tb_province ON tb_shop.proid = tb_province.proid
                                    INNER JOIN tb_cat ON tb_shop.catid = tb_cat.catid
                                    where  
                                    '.$where.'
                                     
                                    order by    tb_shop.createdate desc
                                    
                                    ');
                              
          $data=$this->db->db_get_recordset();
          $this->db->destory();
          $this->db->closedb(); 
          $datafile=array();
          if(count($data))
          {
              $k=1;
              foreach($data as $value)
              {
                //  $arraylat[]=$value['lat'];
                //  $arraylng[]=$value['lng'];
                  //$str[]="['".$value['shopname']."',".$value['lat'].",".$value['lng'].",".$k."]";
                  $arraydata[$k]['title']=$value['title'];
                  $arraydata[$k]['description']=strip_tags($value['description']); 
                  $arraydata[$k]['shopurl']= 'landing.html?shopurl='.$value['shopurl'];   
                  $arraydata[$k]['shopname']=$value['shopname']; 
                  $arraydata[$k]['namepost']=$value['namepost'];
                  $arraydata[$k]['emailshop']=$value['emailshop'];
                  $arraydata[$k]['address']=$value['address'];
                  $arraydata[$k]['daterange']=$value['daterange'];  
                  $arraydata[$k]['tel']=$value['tel'];
                //  $dir_dest = rootpath.'/'.'images/shop_c/'.$value['shopurl'] . '/resize/'; 
            //      $thumbfile5=$dir_dest.'thumb5'.'.jpg'; 
                   if(is_file(rootpath.'/images/shop_c/'.$value['shopurl'].'/resize/thumb5.jpg'))
                    {
                   // if(copy(homeinfo.'/plugins/showimages.php?width='.'200'.'&height='.'130'.'&source='.homeinfo .'/'.'images/shop_c/'.$value['shopurl'] . '/resize/thumb4.jpg',$thumbfile5))
//                     {
//                       chmod($thumbfile5,0777);
//                     }
                      $arraydata[$k]['pic']=homeinfo.'/images/shop_c/'.$value['shopurl'].'/resize/thumb5.jpg';
                      if(is_file(rootpath.'/images/shop_c/'.$value['shopurl'].'/resize/thumb4.jpg'))
                    {
                        $arraydata[$k]['pic2']=homeinfo.'/images/shop_c/'.$value['shopurl'].'/resize/thumb4.jpg';       
                      
                    }else
                    {
                        
                       $arraydata[$k]['pic2']=homeinfo.'/images/shop_c/'.$value['shopurl'].'/resize/original.jpg'; 
                    }  
                    
                    }else
                    {
                      $arraydata[$k]['pic']=homeinfo.'/images/default/no-image/200-130.jpg';    
                    }   
                  $k++;
                  
              }
              //$datafile['latnew']=array_sum($arraylat)/count($arraylat);
              //$datafile['lngnew']=array_sum($arraylng)/count($arraylng);
              
          //   $newjson= join(",",$str);
            // $datafile['json']=$newjson;
           ///  $datafile['json2']=array2json($arraydata);
              
          }
          
          
          echo        $_GET['callback'].'(' . json_encode($arraydata) . ');'; 
          exit();  
           
       }
       function submitformiphone()
       { 

            if(is_array($this->post))
                                {
                                     foreach($this->post as $key => $value)
                                     {
                                                  if($this->post[$key]==""&&$key!='website'&&$key!='pic1'&&$key!='userid'&&$key!='refcode')
                                                  {
                                                  if($this->post['userid'])
                                                  {
                                                        if($key!='email'&&$key!='password1'&&$key!='repassword'&&$key!='username')
                                                        {
                                                         $arraydata[]=$key;      
                                                        }
                                                      
                                                  }else
                                                  {    
                                                  $arraydata[]=$key;   
                                                  }
                                                  }
                                     }
                                      
                                }
            if(count($arraydata)>0)
                                 {
                                     
                                     $arraydata['error']="กรอกข้อมูลไม่ครบ".$arraydata[0];
                                     echo array2json($arraydata); 
                                     exit();
                                 }
           
           
           if(empty($this->post['userid']))
        {
        if( !preg_match('/^(?:[\w\d]+\.?)+@(?:(?:[\w\d]\-?)+\.)+\w{2,4}$/i', $this->post['email']))
        {
            $arraydata['error']=" email ไม่ถูกต้อง ".$this->post['email'];
            echo array2json($arraydata); 
            exit();
        }
        
        if(!$this->checkemail(1))
        {
             $arraydata['error']=" email ซ้ำ";
            echo array2json($arraydata); 
            exit();
        }
       
        if(!$this->checkusername(1))
        {
            $arraydata['error']=" username ซ้ำ  หรือ มีตัวอักษรพิเศษ";
            echo array2json($arraydata); 
            exit();
        }
         if($this->post['password1']!=$this->post['repassword'])
        {
            $arraydata['error']=" password กรอก ไม่ตรงกัน";
            echo array2json($arraydata); 
            exit();
        }
        
        }
        if(!$this->checkshopurl(1))
        {
            $arraydata['error']=" shopurl ซ้ำ หรือ มีตัวอักษรพิเศษ";
            echo array2json($arraydata); 
            exit();
        }
        if( !preg_match('/^(?:[\w\d]+\.?)+@(?:(?:[\w\d]\-?)+\.)+\w{2,4}$/i', $this->post['emailshop']))
        {
            $arraydata['error']=" email ของชื่อสถานที่ ไม่ถูกต้อง";
            echo array2json($arraydata); 
            exit();
        }
           
       $arraydata2=$this->post;       

                
                
         if(empty($this->post['userid']))
        {
        $arraymember= $this->savemember();
       
        $arrayshop['mid']=$arraymember['mid'];
        $arraydata['username']=$arraymember['username'];
        $arraydata['mid']=$arraymember['mid']; 
         }else
         {
          $arrayshop['mid']=$this->post['userid'];
          $arraydata['username']=$arraymember['username'];
          $arraydata['mid']=$this->post['userid'];    
         }
        
        $arrayshop['catid']=$arraydata2['cat'];
        $arrayshop['subcatid']=$arraydata2['subcat'];
        $arrayshop['shopname']=urldecode($arraydata2['shopname']);

        $arrayshop['website']=urldecode($arraydata2['website']);
        $arrayshop['title']=urldecode($arraydata2['title']);
        $arrayshop['keyword']=$arraydata2['keyword'];
        $arrayshop['description']=urldecode($arraydata2['description']);
        $arrayshop['proid']=$arraydata2['province'];
        $arrayshop['disid']=$arraydata2['district'];
        $arrayshop['tumid']=$arraydata2['tumbon'];
        $arrayshop['postcode']=$arraydata2['postcode'];
        $arrayshop['address']=urldecode($arraydata2['address']);
        $arrayshop['tel']=$arraydata2['tel'];
        $arrayshop['temid']=$arraydata2['temid'];
        $arrayshop['refcode']=$arraydata2['refcode'];
        $arrayshop['emailshop']=$arraydata2['emailshop'];
        $arrayshop['daterange']=urldecode($arraydata2['daterange']);
        $arrayshop['lat']=$arraydata2['lat'];
        $arrayshop['lng']=$arraydata2['lng'];
        $arrayshop['createdate']=date("Y-m-d H:i:s");
        $arrayshop['updatedate']=date("Y-m-d H:i:s");
        if(preg_match('/^[a-zก-๙0-9เ]+$/i',$arraydata2['shopurl']))$arrayshop['shopurl']=$this->changeidn($arraydata2['shopurl']);
        else $arrayshop['shopurl']=$arraydata2['shopurl'];

        
        $this->db->get_connect();
        $this->db->db_set($arrayshop,'tb_shop');
        $mid= $this->db->db_get_last_number();
        $this->db->destory();
        $this->db->db_set($arrayshop,'tb_shop_en'); 
        $this->db->destory();
        
        $this->db->closedb();
        $arraydata['error']=0;
        $arraydata['shopurl']=$arrayshop['shopurl'];


          
       
         if(!is_dir(fullpathtemp.$arraydata['shopurl']))
         {
             mkdir(fullpathtemp.$arraydata['shopurl']);
             @chmod(fullpathtemp.$arraydata['shopurl'],0777);
         }
         if(!is_dir(fullpathimages.$arraydata['shopurl']))
         {
             mkdir(fullpathimages.$arraydata['shopurl']);
             @chmod(fullpathimages.$arraydata['shopurl'],0777);
         }
         if(!is_dir(fullpathimages.$arraydata['shopurl'].'/resize'))
         {
             mkdir(fullpathimages.$arraydata['shopurl'].'/resize');
             @chmod(fullpathimages.$arraydata['shopurl'].'/resize',0777);
         }
         $data=$this->getshop($arraydata['shopurl']);
           
         if(copy(fullpathtemplates.$data['0']['temname'].'/'.$data['0']['tempath'].'.php',fullpathtemp.$arraydata['shopurl'].'/'.$data['0']['tempath'].'_th.php')){
             $file1=fullpathtemp.$arraydata['shopurl'].'/'.$data['0']['tempath'].'_th.php';
             @chmod($file1,0777);
         }
         if(copy(fullpathtemplates.$data['0']['temname'].'/'.$data['0']['tempath'].'.php',fullpathtemp.$arraydata['shopurl'].'/'.$data['0']['tempath'].'_en.php'))
         {
             $file2=fullpathtemp.$arraydata['shopurl'].'/'.$data['0']['tempath'].'_en.php';
             @chmod($file2,0777);
         }

         

        echo array2json($arraydata); 
                               
                     
               
       }
       function getdatafromiphone()
       {
             $this->db->get_connect();
          $this->db->db_set_recordset('SELECT
          tb_shop.lat,
          tb_shop.lng,
          tb_shop.shopname,
          tb_shop.shopurl,
          tb_shop.title,
          tb_shop.description,
          tb_shop.namepost,
          tb_shop.tel,
          tb_shop.emailshop,
          tb_shop.address    
          FROM
          tb_shop
          where tb_shop.catid="'.'16'.'"
          and tb_shop.shopurl="'.$this->post['shopurl'].'" ');
          $data=$this->db->db_get_recordset();
          $this->db->destory();
          $this->db->closedb(); 
          $datafile=array();
          if(count($data))
          {
              $k=1;
              foreach($data as $value)
              {
                  $arraydata['lat']=$value['lat'];
                  $arraydata['lng']=$value['lng'];

                  $arraydata['title']=$value['title'];
                  $arraydata['description']=$value['description']; 
                  $arraydata['shopurl']='http://'.$value['shopurl'].'.'.domain;
                  $arraydata['shopname']=$value['shopname']; 
                  $arraydata['namepost']=$value['namepost'];
                  $arraydata['emailshop']=$value['emailshop'];
                  $arraydata['address']=$value['address'];
                  $arraydata['tel']=$value['tel'];
                   if(is_file(rootpath.'/images/shop_c/'.$value['shopurl'].'/resize/thumb4.jpg'))
                    {
                      $arraydata['pic']=homeinfo.'/images/shop_c/'.$value['shopurl'].'/resize/thumb4.jpg';  
                    }else
                    {
                      $arraydata['pic']=homeinfo.'/images/default/powerbee/302-220.jpg';    
                    }   
                  $k++;
                  
              }

              
            
           
              
          }
          
          
          echo  array2json($arraydata);
       } 
       function getshopbysub()
       {    
           header("content-type: text/javascript");
             $this->db->get_connect();
          $this->db->db_set_recordset('SELECT
          tb_shop.lat,
          tb_shop.lng,
          tb_shop.shopname,
          tb_shop.shopurl,
          tb_shop.title,
          tb_shop.description,
          tb_shop.namepost,
          tb_shop.tel,
          tb_shop.emailshop,
          tb_shop.address,
          tb_shop.daterange,
          tb_cat.icon,
          tb_cat.size,
          tb_shop.website   
          FROM
          tb_shop
          INNER JOIN tb_cat ON tb_shop.catid = tb_cat.catid
          where   
          tb_shop.shopurl="'.$this->get['shopurl'].'" ');              
          $data=$this->db->db_get_recordset();
          $this->db->destory();
          $this->db->closedb(); 
          $datafile=array();
          if(count($data))
          {
              
          $file=fullpathtemp.$data['0']['shopurl'].'/index_th.php';
          $html=file_get_html($file);
              $k=1;
              foreach($data as $value)
              {
                  $arraydata['lat']=$value['lat'];
                  $arraydata['lng']=$value['lng'];

                  $arraydata['title']=$value['title'];
                  $arraydata['description']=$value['description']; 
                  $arraydata['shopurl']='http://'.$value['shopurl'].'.'.domain;
                  $arraydata['shopname']=$value['shopname']; 
                  $arraydata['namepost']=$value['namepost'];
                  $arraydata['emailshop']=$value['emailshop'];
                  $arraydata['address']=$value['address'];
                  $arraydata['daterange']=$value['daterange'];
                  $arraydata['website']=$value['website']; 
                  $arraydata['tel']=$value['tel'];
                  $arraydata['icon']= $value['icon'];
                  list($width,$height)= explode('x',$value['size']); 
                  $arraydata['width']=$width; 
                  $arraydata['height']=$height;
                  
                  
                 //$html->find(''); 
                   if(is_file(rootpath.'/images/shop_c/'.$value['shopurl'].'/resize/thumb4.jpg'))
                    {
                        $arraydata['pic1']=homeinfo.'/images/shop_c/'.$value['shopurl'].'/resize/thumb4.jpg';       
                      
                    }else if(is_file(rootpath.'/images/shop_c/'.$value['shopurl'].'/resize/thumb4.jpg'))
                    {
                        
                       $arraydata['pic1']=homeinfo.'/images/shop_c/'.$value['shopurl'].'/resize/original.jpg'; 
                    }else
                    {
                      $arraydata['pic1']=homeinfo.'/images/shop_c/'.$value['shopurl'].'/no-image/302-220.jpg';  
                    } 
                    $html2=str_get_html($html->find('div#220x90x0',0)->innertext);
                    if(is_object($html2))
                    {
                      $arraydata['logo']=$html2->find('a[class=galleryimg]',0)->href;    
                    }
                    
                     
                     
                    $galleryimg=$html->find('a[class=galleryimg]');
                    $arraydata['video']=$html->find('iframe',0)->src;  
                    
                    foreach($galleryimg as $valueimg)
                    {
                       if($arraydata['logo']!=$valueimg->href)
                       $arraydata['gallery'][]=$valueimg->href; 
                        
                    }
                    
                    
                      
                  $k++;
                  
              }
             // $datafile['latnew']=array_sum($arraylat)/count($arraylat);
              //$datafile['lngnew']=array_sum($arraylng)/count($arraylng);
              
            
           
              
          }
          
          
          echo        $_GET['callback'].'(' . json_encode($arraydata) . ');'; 
          exit(); 
       } 
       
       function loginformiphone()
       {
        $arraydata=$this->post;   
       if($arraydata['username']&&$arraydata['password1'])
          {
             $username=$arraydata['username'];
              $password=md5(strtolower($arraydata['username']) . $arraydata['password1']);
              $this->db->get_connect();
              $this->db->db_set_recordset('SELECT mid,email  FROM `tb_member` where `username`="'.$username.'" and `password`="'.$password.'" ');
              
              $data=$this->db->db_get_recordset();
          
              $this->db->destory();
              $this->db->closedb();
              
          }
             if(count($data))
              {  $arraydata['error']=0;
                 $arraydata['mid']=$data[0]['mid'];
                 $arraydata['username']=$username;
              }else
              {
                 $arraydata['error']="ชื่อผู้ใช้หรือรหัสผ่านผิด"; 
              }
              echo  array2json($arraydata);  
       }
       
        function getshoptemplate()
      {
          header("content-type: text/javascript"); 
          $this->db->get_connect();
          $this->db->db_set_recordset('SELECT temid  FROM `tb_template` where temid<>8 ');
              
          $arraydata=$this->db->db_get_recordset();
          
          $this->db->destory();
          $this->db->closedb();
                //echo "callback=".$this->get['callback']; 
               echo $this->get['callback'].'(' . json_encode($arraydata) . ');';
      }
      function getshoplistbyuserid()
      {
          header("content-type: text/javascript");  
          $this->db->get_connect();
          $this->db->db_set_recordset('SELECT shopurl,shopname  FROM `tb_shop` where mid='.$this->get['mid']);
              
          $arraydata=$this->db->db_get_recordset();
          
          $this->db->destory();
          $this->db->closedb();
          echo $this->get['callback'].'(' . json_encode($arraydata) . ');';  
      }
      function getshopbyshopurlformobile()
      {
                     $shopurl=$this->post['shopurl'];
                      //  $shopurl='atchiangrairesort';
                       // $this->post['mid']=1;
                      
                  //    $_COOKIE['userid']=$this->post['mid'];
                           // echo "dfdf";
                       if($this->checkuserwithshop($shopurl,$this->post['mid']))
                      {   
                       // echo  "no";
                               
                           $html=file_get_html('http://'.$shopurl.'.'.domain);
                           $html->find('#checklogin',0)->innertext=1;
                           $html->find('#access',0)->innertext=1;
                           $html->find('div.inner',0)->innertext='';
                           $html->find('p',1)->innertext='';
                           foreach($html->find('a.ir') as $ele)
                           {
                             //  echo   $ele->href."<br>";
                               //echo   $ele->class."<br>"; 
                                // $class=$ele->class;

                               if($ele->class== "ir edit img")
                               {
                                     $arrayhref=explode("/",$ele->href) ;
                                     $ele->href="javascript:void(0);";
                                     $ele->onclick="capturePhoto('".$arrayhref[5]."','".$arrayhref[6]."','".$arrayhref[7]."')"  ;
                               }
                               else if($ele->class== "ir edit text")
                               {
                                    if(strpos($ele->href,'title')!==false)
                                    {
                                    $ele->title="title";    
                                    }
                                    else if(strpos($ele->href,'detail')!==false)
                                    {
                                    $ele->title="detail";    
                                    }
                                    else if(strpos($ele->href,'daterange')!==false)
                                    {
                                    $ele->title="daterange";    
                                    }
                                    else if(strpos($ele->href,'popup5')!==false)
                                    {
                                    $ele->title="popup5";    
                                    }
                                    $ele->href="javascript:void(0);";
                               }
                               else if($ele->class== "ir edit map")
                               {
                                    $ele->href="javascript:void(0);";
                               }
                               
                           }
                         $arraydata['bodyclass']   = $html->find('body',0)->class;   
                         $arraydata['setdata']='<div style="display: none;" id="subdir">'.$html->find('#subdir',0)->innertext.'</div>
                                                          <div style="display: none;" id="shopurl">'.$html->find('#shopurl',0)->innertext.'</div>
                                                           <div style="display: none;" id="homeinfo">'.$html->find('#homeinfo',0)->innertext.'</div>
                                                           <div style="display: none;" id="landingpage">'.$html->find('#landingpage',0)->innertext.'</div>
                                                           <div style="display: none;" id="lat">'.$html->find('#lat',0)->innertext.'</div>
                                                           <div style="display: none;" id="lng">'.$html->find('#lng',0)->innertext.'</div>
                                                           <div style="display: none;" id="access">'.$html->find('#access',0)->innertext.'</div>
                                                           <div style="display: none;" id="shopname">'.$html->find('#shopname',0)->innertext.'</div>
                                                           <div style="display: none;" id="checklogin">'.$html->find('#checklogin',0)->innertext.'</div>
                                                           <div style="display: none;" id="icon">'.$html->find('#icon',0)->innertext.'</div>
                                                           <div style="display: none;" id="width">'.$html->find('#width',0)->innertext.'</div>
                                                           <div style="display: none;" id="height">'.$html->find('#height',0)->innertext.'</div>';
                         $arraydata['html']   = $html->find('#main',0)->innertext; 
                         $arraydata['catename']   = $this->getcatebyshopurl($shopurl);
                         echo array2json($arraydata);       
                       }
                       
      }
      function getcatebyshopurl($shopurl)
      {
             $this->db->get_connect();
              
          $this->db->db_set_recordset(' SELECT
tb_template.temname
FROM
tb_shop
INNER JOIN tb_template ON tb_shop.temid = tb_template.temid
where tb_shop.shopurl="'.$shopurl.'"');
              
          $arraydata=$this->db->db_get_recordset();
          
          $this->db->destory();
          $this->db->closedb();
          return       $arraydata[0]['temname'] ;
      }
      function submitpicformiphone()
      {
           $shopurl=$this->post['shopurl'];
                      // $_COOKIE['userid']=$this->post['mid'];
           if($this->checkuserwithshop($shopurl,$this->post['mid']))
           {    

              if($this->post['pic1'])
              {
              $filename=mktime();
              $fileext='jpg'; 
              $filenow= $filename.'.'.$fileext;   
              $fp = fopen(fullpathimages.$this->post['shopurl'].'/'.$filenow, 'wb');
              fwrite($fp, base64_decode($this->post['pic1']));
              fclose($fp);
              
              chmod(fullpathimages.$this->post['shopurl'].'/'.$filenow,0777);
              $dir_dest = fullpathimages .$this->post['shopurl'].'/resize/';
              
               $this->post['folder']='images/shop_c/'.$this->post['shopurl'];
           //    $this->post['filename']=.'/'.$filenow;   
               list($width,$height)=explode("x",$this->post['size']);
               $resize=$width.'x'.$height;
               $newfile=$dir_dest.$filename.$resize.'.'.$fileext;
          
          
               //list($width,$height)= explode("x",$resize);
             if(copy(homeinfo.'/plugins/showimages.php?width='.$width.'&height='.$height.'&source='.homeinfo.'/'.$this->post['folder'].'/'.$filenow,$newfile))
                     {
                       chmod($newfile,0777);
                      // $arraydata['resizename']=$name.$resize.'.'.$fileext; 
                       $arraydata['filedata']=$filename.$resize.'.'.$fileext;  
                       $arraydata['width']=$width;
                       $arraydata['height']=$height;
                       $arraydata['fileorigi']=$filenow;
                     }
                     
              $resize2='200x128';       
              $newfile2=$dir_dest.$filename.$resize2.'.'.$fileext;
          
          
               //list($width,$height)= explode("x",$resize);
             if(copy(homeinfo.'/plugins/showimages.php?width='.'200'.'&height='.'128'.'&source='.homeinfo.'/'.$this->post['folder'].'/'.$filenow,$newfile2))
                     {
                       chmod($newfile2,0777);

                     }          
                     

              
              
             // $thumbfile0=$dir_dest.$filename.'200x128'.'.'.$fileext;
              $thumbfile1=$dir_dest.'thumb1'.'.'.$fileext; 
              $thumbfile2=$dir_dest.'thumb2'.'.'.$fileext; 
              $thumbfile3=$dir_dest.'thumb3'.'.'.$fileext;
              $thumbfile4=$dir_dest.'thumb4'.'.'.$fileext;
              $thumbfile5=$dir_dest.'thumb5'.'.'.$fileext;
              $thumbfile6=$dir_dest.'original'.'.'.$fileext; 
              
         if(copy(homeinfo.'/plugins/showimages.php?width='.'269'.'&height='.'218'.'&source='.homeinfo .'/'.$this->post['folder'].'/'.$filenow,$thumbfile1))
                     {
                       @chmod($thumbfile1,0777);
                     }
         if(copy(homeinfo.'/plugins/showimages.php?width='.'176'.'&height='.'95'.'&source='.homeinfo.'/'.$this->post['folder'].'/'.$filenow,$thumbfile2))
                     {
                       @chmod($thumbfile2,0777);
                     }
          if(copy(homeinfo.'/plugins/showimages.php?width='.'120'.'&height='.'90'.'&source='.homeinfo.'/'.$this->post['folder'].'/'.$filenow,$thumbfile3))
                     {
                       @chmod($thumbfile3,0777);
                     }
          if(copy(homeinfo.'/plugins/showimages.php?width='.'302'.'&height='.'220'.'&source='.homeinfo.'/'.$this->post['folder'].'/'.$filenow,$thumbfile4))
                     {
                       @chmod($thumbfile4,0777);
                     }
          if(copy(homeinfo.'/plugins/showimages.php?width='.'200'.'&height='.'130'.'&source='.homeinfo .'/'. $this->post['folder'].'/'.$filenow,$thumbfile5))
                     {
                       @chmod($thumbfile5,0777);
                     }
          if(copy(homeinfo .'/'. $this->post['folder'] . '/'.$filenow,$thumbfile6))
                     {
                       @chmod($thumbfile6,0777);
                     }
                     
                     
                      $file=fullpathtemp.$this->post['shopurl'].'/'.$this->post['filename'].'.php';
                     $this->post['width']=$width;
                     $this->post['height']=$height;
                     $this->post['action']=$this->post['size'];
                     $this->post['imageori']=$arraydata['fileorigi'];
                     $this->post['imagesrc']=$arraydata['filedata'];
                   //  $this->post['group']=$this->post['qroup']; 
          
                    $html=file_get_html($file);
                    $html->find('div#'.$this->post['action'].'', 0)->innertext='<div style="width: '.$this->post['width'].'px;height: '.$this->post['height'].'px;background-image: url('.homeinfo.'/images/shop_c/'.$this->post['shopurl'].'/resize/'.$this->post['imagesrc'].');background-repeat: no-repeat;-moz-border-radius: 7px;-webkit-border-radius: 7px;border-radius: 7px;">
          <a class="galleryimg" rel="'.$this->post['group'].'" href="'.homeinfo.'/images/shop_c/'.$this->post['shopurl'].'/'.$this->post['imageori'].'"><img style="opacity:0" alt="'.$this->post['alt'].'"  src="'.homeinfo.'/images/shop_c/'.$this->post['shopurl'].'/resize/'.$this->post['imagesrc'].'"></a></div>';
                    //$html->find('div[id=textx'.$this->post['action'].']', 0)->innertext=$this->post['alt'];
                    $fp = fopen($file, 'w');
                    fwrite($fp, $html);
                    fclose($fp);
                     
                     $this->getshopbyshopurlformobile();
                     
              } 
           
           
           }
      }
      
     // function testprogram()
//      {
//          $this->db->get_connect();
//          if($_POST['username'])
//          {
//             $arraytest['status']=1;
//              $this->db->db_set($arraytest,'tb_test');
              // $mid= $this->db->db_get_last_number();
//        
//              echo $_POST['username'];
//          }else
//          {
//              $arraytest['status']=2;
//              $this->db->db_set($arraytest,'tb_test');
//              echo "no post";
//          }
//          $this->db->destory();
//          $this->db->closedb();
//          
//      }
//      
      
      function testprogram()
      {
          if($this->post['photos'])
          {
              
               $fp = fopen(rootpath.'/uploads/'.'test.png', 'wb');
//               $this->post['photos']=str_replace(" ","",$this->post['photos']);
//               $this->post['photos']=str_replace(">","",$this->post['photos']);
//               $this->post['photos']=str_replace("<","",$this->post['photos']);
//               $this->post['photos']=trim($this->post['photos']);
              fwrite($fp, base64_decode($this->post['photos']));
              fclose($fp);
              $this->db->get_connect();
              $arraytest['status']=1;
              $arraytest['pic']= $this->post['photos'];
              $this->db->db_set($arraytest,'tb_test');
              $this->db->destory();
              $this->db->closedb();
              echo "http://www.infostant.com/uploads/test.png";
          }
          
      }
      
  }
?>
