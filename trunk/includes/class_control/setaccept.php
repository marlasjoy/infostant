<?php

  class setaccept extends template{
      private $db;
      private $header; 
      private $footer; 
      private $info;
      private $total;
      private $limit;
      private $username;
      function setaccept($db,$header,$footer,$info='')
      {
         $this->header=$header;
         $this->footer=$footer;
         $this->db=$db;
         $this->info=$info;
         if($info['folder'])
         {
             $this->set_folder($info['folder']);
         }
         if($_COOKIE['userid'])
         {
           include(includepath.'/ajax.php'); 
           redirectto(homeinfo);   
         }
         if($this->info['function'])
         {    include(includepath.'/ajax.php'); 
               $this->username=$this->getuserbystatuscode($this->info['function']);
               if(!$this->username)
               {
                  
                  redirectto(homeinfo);  
               }
             
         }else
         {
             include(includepath.'/ajax.php'); 
           redirectto(homeinfo); 
         }
      
      
      }
      function getuserbystatuscode($statuscode)
      {
              $this->db->get_connect(); 
              $sql='SELECT
              tb_member.mid,tb_member.email,tb_member.username
              FROM
              tb_member
              WHERE tb_member.statuscode="'.$statuscode.'" ';

              $this->db->db_set_recordset($sql);
              $data=$this->db->db_get_recordset();
              
              if(count($data))
              {
               $arraymember['status']=1;
               $arraymember['statuscode']='';
              $this->db->db_set($arraymember,'tb_member',' mid='.$data['0']['mid']);
              
              setcookie("userid", $data[0]['mid'], time()+3600000, "/", ".".domain);
              setcookie("email", $data[0]['email'], time()+3600000, "/", ".".domain);
              setcookie("userlogin", $data[0]['username'], time()+3600000, "/", ".".domain);   
              
              redirectto(homeinfo);
                  
              }
              
              
              //loginuser
              
              
              $this->db->destory();
              $this->db->closedb();
          
          
          
          
               return     $data['0']['username'];
      }



      function view()
      {
          

          

        
            
        $this->header->set_data($databird);
        $this->header->get_header(); 
        

        

    
        $databird['statuscode']=$this->info['function'];
        $databird['username']=$this->username;   

        

        $this->set_data($databird);
        $this->load('setaccept');
        
        
        $this->footer->get_footer();
         
      }
  }
?>
