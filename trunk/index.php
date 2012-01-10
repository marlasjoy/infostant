<?php
// session_start();
  header("Access-Control-Allow-Origin: *");
  
  require_once('config.php');

  $facebook = new Facebook(array(
  'appId'  =>appid,
  'secret' => secret,
   ));  
   
$user = $facebook->getUser();

if ($user) {
  try {
    // Proceed knowing you have a logged in user who's authenticated.
    $user_profile = $facebook->api('/me');
  } catch (FacebookApiException $e) {
   // echo '<pre>'.htmlspecialchars(print_r($e, true)).'</pre>';
    $user = null;
  }
}
// Login or logout url will be needed depending on current user state.

if ($user) {
   $logoutUrl = $facebook->getLogoutUrl(array('next' => $_SERVER['HTTP_REFERER']));
   $info['userprofilefacebook']=$user_profile; 
   $info['logouturl']=$logoutUrl;


   if(empty($_COOKIE['userid']))
   {
       $db_exec->get_connect();
       $db_exec->db_set_recordset('SELECT mid,email,username  FROM `tb_member` where `fid`="'.$info['userprofilefacebook']['id'].'" and status="1"  ');
       $data=$db_exec->db_get_recordset();
       $db_exec->destory();
       $db_exec->closedb();
        if(count($data))
              {   
                  
                 
                  setcookie("userid", $data[0]['mid'], time()+3600000, "/", ".".domain);
                  setcookie("email", $data[0]['email'], time()+3600000, "/", ".".domain);
                  setcookie("userlogin", $data[0]['username'], time()+3600000, "/", ".".domain);
                  setcookie("fconnect", '1', time()+3600000, "/", ".".domain);
                  

                  $url='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                  header("Location: $url");
                  //setcookie("TestCookie", "1");
                  
              }else
              {
                     $params = array(
  'scope' => 'read_stream,email,user_about_me',
  'redirect_uri' =>homeinfo.'/',
);
  
  $loginUrl = $facebook->getLoginUrl($params);
  $info['loginfacebook']=$loginUrl;
   
  define('loginfacebook',$loginUrl) ;
              }
              
              
       
   }
} else {
$params = array(
  'scope' => 'read_stream,email,user_about_me',
  'redirect_uri' =>homeinfo,
);
  
  $loginUrl = $facebook->getLoginUrl($params);
  $info['loginfacebook']=$loginUrl;
   
  define('loginfacebook',$loginUrl) ;
  
}

 if($info['mobile']&&$info['class']!='ajax'&&$info['class']!='map')
 {
     $obj=new mobileinfostant($db_exec,$info);
     $obj->view();
     
 }else
 
 {

  
if(!in_array($info['class'],$pageobj))
{
  
  eval("\$obj = new ".$info['class']."(\$db_exec,\$header,\$footer,\$info);");  
  
  $obj->view();
}else
{
  eval("\$obj = new ".$info['class']."(\$db_exec,'','',\$info);");    
}
 }
//  $mem_usage = memory_get_usage(true); 
 // echo $mem_usage."<br>";
 // echo round($mem_usage/1024,2)." kilobytes<br>"; 
  
?>


