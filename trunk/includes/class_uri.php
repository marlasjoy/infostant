<?/**
* db_config Class
*	
* This class is used to make a database connection
* with MySQL, it should be used as the Super Class
* to other database classes.
*
* @subpackage   connection
* @package      Database
* @copyright    as GPL
* @version      1.0
* @author       Stuart Cochrane - stuartc1@users.sourceforge.net
* @link			http://sourceforge.net/projects/php-cmc/
*    
*/
class class_uri {
    private $uri;
    private $arraydata=array();
    private $arrayuri=array();
    function class_uri($pageconfig,$langobj,$subconfig,$db_exec){

         $host=$_SERVER['HTTP_HOST'];
         list($sub,$b)=explode(".".domain,$host);
         if($sub=="www")
         {
             list($sub3,$b3,$b4)=explode(".",$host);  
             if($b4=="infostant")
             {
                 
             }else
             {
              // $sub= $b3; 
             }
         }

         
         if($sub=="www"||empty($sub)||$sub==domain||$sub=="flood")
         {
         if($sub=="flood")
         {
             $this->arraydata['folder']="flood";
             $this->arraydata['sub']="flood";
         }    
         $this->uri=$_SERVER['REDIRECT_URL'];
         $this->arrayuri=explode("/",$this->uri);
         if(in_array($this->arrayuri['1'],$langobj)) 
           {


               $this->arraydata['lang']=$this->arrayuri['1'];
               array_shift($this->arrayuri);
              // $this->arrayuri['1']=$this->arrayuri['2'];
           }else
           {
               $this->arraydata['lang']='th';
           } 
         
         if(count($this->arrayuri)>1)
         { 

           if(in_array($this->arrayuri['1'],$pageconfig))
           {
               
            $this->arraydata['class']=$this->arrayuri['1']; 
            if($this->arrayuri['2'])$this->arraydata['function']=$this->arrayuri['2']; 
            if($this->arrayuri['3'])$this->arraydata['action']=$this->arrayuri['3']; 
            if($this->arrayuri['4'])$this->arraydata['target']=$this->arrayuri['4']; 
            if($this->arrayuri['5'])$this->arraydata['group']=$this->arrayuri['5']; 
            if($this->arrayuri['6'])$this->arraydata['group2']=$this->arrayuri['6'];
            if($this->arrayuri['7'])$this->arraydata['group3']=$this->arrayuri['7'];
            if($this->arrayuri['8'])$this->arraydata['group4']=$this->arrayuri['8'];
            $arraykey=array_keys($pageconfig,$this->arrayuri['1']);
            
            
            if(!is_numeric($arraykey[0]))
            {
            $this->arraydata['folder']=$arraykey[0];    
            }  
           }
           else
           {
               
               
               $db_exec->get_connect();
               $sql="select catname from tb_cat";
               $db_exec->db_set_recordset($sql); 
               $datacat=$db_exec->db_get_recordset(); 
               $arraycat=array();
               foreach($datacat as $valuecat)
               {
                   
                    $arraycat[]=$valuecat['catname'];
                   
               }
               
               
               $db_exec->destory();
               $db_exec->closedb(); 
                                               //   echo "<pre>";
//                                                  print_r($this->arrayuri['1']);
//                                                  echo "</pre>";
//                                                  
//                                                  echo "<pre>";
//                                                  print_r($arraycat);
//                                                  echo "</pre>";

             if(in_array($this->arrayuri['1'],$arraycat))
             {
               
             if($this->arrayuri['1']&&$this->arrayuri['2']=="page"&&is_numeric($this->arrayuri['3']))
             {
                
              if($this->arrayuri['2']=="page")$this->arraydata['page']=1;  
              if(is_numeric($this->arrayuri['3']))$this->arraydata['pagenumber']=$this->arrayuri['3'];     
              
                 
             $this->arraydata['class']='category';      
             }
             else if($this->arrayuri['1']&&empty($this->arrayuri['2']))
             {
             $this->arraydata['class']='category';      
             }
             else if($this->arrayuri['1']&&$this->arrayuri['2']&&$this->arrayuri['3']=="page"&&is_numeric($this->arrayuri['4']))
             {
             if($this->arrayuri['3']=="page")$this->arraydata['page']=1;  
              if(is_numeric($this->arrayuri['4']))$this->arraydata['pagenumber']=$this->arrayuri['4'];      
                 
             $this->arraydata['class']='subcategory';     
             }else
             {
             $this->arraydata['class']='subcategory';    
             }  
                                       
             if($this->arrayuri['1'])$this->arraydata['keyword']=trim($this->arrayuri['1']);
             if($this->arrayuri['2']!="page")$this->arraydata['keyword2']=trim($this->arrayuri['2']);    
              
             }
             else
             {
                $this->arraydata['username']=$this->arrayuri['1']; 
                $this->arraydata['class']='profile';
                $this->arraydata['function']=$this->arrayuri['2']; 
             }
           
           }
             

         }else
         {
           $this->arraydata['class']='home';  
         }
         }else
         {
           

            $this->arraydata['class']='shop';    
            $this->arraydata['subdomain']=$sub;     
           $this->uri=$_SERVER['REDIRECT_URL'];
           $this->arrayuri=explode("/",$this->uri);
           if(in_array($this->arrayuri['1'],$langobj)) 
           {


               $this->arraydata['lang']=$this->arrayuri['1'];
               array_shift($this->arrayuri);
              // $this->arrayuri['1']=$this->arrayuri['2'];
           }else
           {
               $this->arraydata['lang']='th';
           } 
           
           if((in_array($this->arrayuri['1'],$subconfig)))
           {
               $this->arraydata['class']=$this->arrayuri['1'];
               
           $arraykey=array_keys($subconfig,$this->arrayuri['1']);
            
            
            if(!is_numeric($arraykey[0]))
            {
            $this->arraydata['folder']=$arraykey[0];    
            }  
                 
           }
             //echo $this->arrayuri['1'];
         
         }


         
         
    }
    function getdata()
    {
        return $this->arraydata;
    }
   
} 
?>
