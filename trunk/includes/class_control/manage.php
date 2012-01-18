<?php
      class manage extends template{
      private $db;
      private $header; 
      private $footer;  
      private $info;   
      function manage($db,$header,$footer,$info='')
      {
         $this->header=$header;
         $this->footer=$footer;
         $this->db=$db;  
         $this->info=$info;

         if($info['folder'])
         {
             $this->set_folder($info['folder']);
         }
         include(includepath.'/ajax.php');
         $this->ajax=new ajax($this->db,$this->header,$this->footer);
      }
      function image()
      {
          if($_COOKIE['userlogin'])
          {

          $databird['username']=$_COOKIE['userlogin']; 
          $databird['meid']=$this->info['group'];
           $databird['target']=$this->info['target'];
           list($action,$group)=explode("&",$this->info['action']);
           $databird['resize']=$action;
           $databird['group']=$group;
          
          $databird['table']=$this->ajax->gettablefile2($databird['meid'],$databird['username']);
          if($this->info['target']=="memory")$databird['folder']='/images/user_c/'.$databird['username'].'/'.$databird['meid'].'';   
           
           $this->set_data($databird);   
           $this->load('image');   
              
          }

          
      }
      function writetitle()
      {
          if($_COOKIE['userlogin'])
          {
              
              $databird['username']=$_COOKIE['userlogin']; 
              $databird['meid']=$this->info['target'];
              $databird['userid']=$_COOKIE['userid'];
              
              if($this->info['action']=="memory")$databird['folder']='/images/user_c/'.$databird['username'].'/'.$databird['meid'].''; 
              
              

              
           $this->set_data($databird);     
           $this->load('writetitle');     
              
          }
      }
      function writemap()
      {
          if($_COOKIE['userlogin'])
          {
              
              $databird['username']=$_COOKIE['userlogin']; 
              $databird['meid']=$this->info['target'];
              $databird['userid']=$_COOKIE['userid'];
              
              if($this->info['action']=="memory")$databird['folder']='/images/user_c/'.$databird['username'].'/'.$databird['meid'].''; 
              
              $databird['province']=$this->getprovince();

              
           $this->set_data($databird);     
           $this->load('writemap');     
              
          }
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
      function writevdo()
      {
          if($_COOKIE['userlogin'])
          {
              
              $databird['username']=$_COOKIE['userlogin']; 
              $databird['meid']=$this->info['target'];
              $databird['userid']=$_COOKIE['userid'];
              
              
              
              
             
              
              

              
           $this->set_data($databird);     
           $this->load('writevdo');     
              
          }
      }
      function writegallery()
      {
          if($_COOKIE['userlogin'])
          {
              
              $databird['username']=$_COOKIE['userlogin']; 
              $databird['meid']=$this->info['target'];
              $databird['userid']=$_COOKIE['userid'];
              if($this->info['action']=="memory")$databird['folder']='/images/user_c/'.$databird['username'].'/'.$databird['meid'].''; 
              if(!is_dir(rootpath.$databird['folder'].'/gallery'))
              {
                  mkdir(rootpath.$databird['folder'].'/gallery');
                  chmod(rootpath.$databird['folder'].'/gallery',0777);
              }
              $databird['table']=$this->ajax->gettablefile3($databird['meid'],$databird['username']);
             
              
              

              
           $this->set_data($databird);     
           $this->load('writegallery');     
              
          }
      }
      function writedescription()
      {
          if($_COOKIE['userlogin'])
          {
              
              $databird['username']=$_COOKIE['userlogin']; 
              $databird['meid']=$this->info['target'];
              $databird['userid']=$_COOKIE['userid'];
              
              if($this->info['action']=="memory")$databird['folder']='/images/user_c/'.$databird['username'].'/'.$databird['meid'].''; 
              
              

              
           $this->set_data($databird);     
           $this->load('writedescription');     
              
          }
      }
      function writedaterange()
      {
          if($_COOKIE['userlogin'])
          {
              
              $databird['username']=$_COOKIE['userlogin']; 
              $databird['meid']=$this->info['target'];
              $databird['userid']=$_COOKIE['userid'];
              
              if($this->info['action']=="memory")$databird['folder']='/images/user_c/'.$databird['username'].'/'.$databird['meid'].''; 
              
              

              
           $this->set_data($databird);     
           $this->load('writedaterange');     
              
          }
      }
      function writecontact()
      {
          if($_COOKIE['userlogin'])
          {
              
              $databird['username']=$_COOKIE['userlogin']; 
              $databird['meid']=$this->info['target'];
              $databird['userid']=$_COOKIE['userid'];
              
              if($this->info['action']=="memory")$databird['folder']='/images/user_c/'.$databird['username'].'/'.$databird['meid'].''; 
              
              

              
           $this->set_data($databird);     
           $this->load('writecontact');     
              
          }
      }
      function view()
      {
       
 

      // $data=$this->ajax->checkandgetshop($this->info['target']);
      // $data['table']=$this->ajax->gettablefile($data['0']['shopurl']);

       
       
       if(isset($this->info['function']))
         {
          //   $methodVariable = array($this,$this->info['function']);
             if(is_callable(array($this,$this->info['function'])))
             {
                 call_user_func(array($this,$this->info['function']));
             }else
             {
                 header("Location:".homeinfo);
                 
             }
         }else
         {
             
                header("Location:".homeinfo);
             
         }
       
       
       
  //     $this->set_data($data);
 
          
       
    //   $this->load('popup');
        

      }
  }
?>
