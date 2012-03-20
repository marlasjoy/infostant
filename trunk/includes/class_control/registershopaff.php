<?php
  include(pluginpath.'/general_pi.php');
  class registershopaff extends template{
      private $db;
      private $header; 
      private $footer; 
      private $info;
      function registershopaff($db,$header,$footer,$info='')
      {
         $this->header=$header;
         $this->footer=$footer;
         $this->db=$db;
         $this->info=$info;
         if($info['folder'])
         {
             $this->set_folder($info['folder']);
         }
         //if(isset($_COOKIE['userlogin']))
//         {
//             redirectto(homeinfo);
//         }
         
      }
      function getprovince()
      {
          
          $this->db->get_connect();
          $this->db->db_set_recordset('SELECT proid,proname FROM `tb_province`');
          $dataprovince=$this->db->db_get_recordset();
          $this->db->destory();
          $this->db->closedb();
          
          return $dataprovince;
          
      }
            function getcountries()
      {
          
          $this->db->get_connect();
          $this->db->db_set_recordset('SELECT contrid,country_name FROM `tb_countries`');
          $datacountries=$this->db->db_get_recordset();
          $this->db->destory();
          $this->db->closedb();
          
          return $datacountries;
          
      }
      function gettemplate()
      {
          
          $this->db->get_connect();
          $this->db->db_set_recordset('SELECT temid FROM `tb_template` where temid<>8');
          $datatemplate=$this->db->db_get_recordset();
          $this->db->destory();
          $this->db->closedb();
          
          return $datatemplate;
          
      }
      function getcat()
      {
          
          $this->db->get_connect();
          $this->db->db_set_recordset('SELECT catid,catname FROM `tb_cat` where catid<>16 ');
          $datacat=$this->db->db_get_recordset();
          $this->db->destory();
          $this->db->closedb();
          return $datacat;
          
      }
      function getuserbyfacebook()
      {
          if($this->info['userprofilefacebook']['email'])$databird['email']=$this->info['userprofilefacebook']['email'];
          if($this->info['userprofilefacebook']['username'])$databird['username']=$this->info['userprofilefacebook']['username'];
          if($this->info['userprofilefacebook']['id'])$databird['fid']=$this->info['userprofilefacebook']['id'];

          return $databird;
          
      }
      function view()
      {
         

            if(empty($_COOKIE['userlogin']))
            {
                            header("Location:".homeinfo.'/registermember');
            }
            
            if($_COOKIE['group']!=1)
            {
                            header("Location:".homeinfo.'/'.$_COOKIE['userlogin']);
            }
 
        
          
        $databird['fulljs'][]='http://maps.google.com/maps?file=api&v=2&key='.googleapikey;
        

       $databird['js'][]='jquery.validate.js';
        $databird['js'][]='scriptajaxregister7.js';
        $databird['js'][]='googlejs.js';

        $databird['noheader']=1;  
        $databird['probody']='onload="load()" onunload="GUnload()"';
        
        
        
        $this->header->set_data($databird);
        $this->header->get_header();
        $databird['loginfacebook']=$this->info['loginfacebook'];
        if(is_array($this->info['userprofilefacebook']))
        {
            $databird=$this->getuserbyfacebook();
        }
        $databird['countrie']=$this->getcountries();
        $databird['province']=$this->getprovince();
        $databird['template']=$this->gettemplate();
        $databird['cat']=$this->getcat();

        $this->set_data($databird);
        $this->load('registershopaff');
        
        
        $this->footer->get_footer();
         
      }
  }
?>
