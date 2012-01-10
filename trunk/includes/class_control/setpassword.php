<?php

  class setpassword extends template{
      private $db;
      private $header; 
      private $footer; 
      private $info;
      private $total;
      private $limit;
      private $username;
      function setpassword($db,$header,$footer,$info='')
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
         {
               $this->username=$this->getuserbyforgetpassword($this->info['function']);
               if(!$this->username)
               {
                  include(includepath.'/ajax.php'); 
                  redirectto(homeinfo);  
               }
             
         }else
         {
             include(includepath.'/ajax.php'); 
           redirectto(homeinfo); 
         }
      
      
      }
      function getuserbyforgetpassword($forgetpassword)
      {
              $this->db->get_connect(); 
              $sql='SELECT
              tb_member.username
              FROM
              tb_member
              WHERE tb_member.forgetpassword="'.$forgetpassword.'" ';

              $this->db->db_set_recordset($sql);
              $data=$this->db->db_get_recordset();
              $this->db->destory();
              $this->db->closedb();
          
               return     $data['0']['username'];
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
          

          

        $databird['js'][]='jquery.validate.js';
        $databird['js'][]='setpassword.js';            
        $this->header->set_data($databird);
        $this->header->get_header(); 
        

        
        $databird['catall']= $this->getcatall(); 
//        
//        $databird['catname_en']=$this->getcatname_en();
//        
        $databird['forgetpassword']=$this->info['function'];
        $databird['username']=$this->username;   

        
     //   $databird['pagination']=$this->pagination(); 
        $this->set_data($databird);
        $this->load('setpassword');
        
        
        $this->footer->get_footer();
         
      }
  }
?>
