<?php     
require_once('includes/cmc_db_config.inc.php'); // configuration class (parent)
require_once('includes/cmc_db_recordset.inc.php'); // recordset class (sub)
require_once('includes/cmc_db_execute.inc.php'); // execute class (sub)  
require_once('includes/mobile_device_detect.php'); // execute class (sub)  
require_once('includes/class_uri.php'); // execute class (sub)  

$pageconfig=array('register'
,'registermember'
,'registershop'
,'editmap'=>'editmap'
,'powerbeemap'=>'powerbeemap'
,'ajax'=>'ajax','search'
,'popup'=>'popup'
,'popup2'=>'popup2'
,'popup3'=>'popup3'
,'popup4'=>'popup4'
,'popup5'=>'popup5'
,'service'
,'package'
,'promotion'
,'package'
,'profile'
,'forgetpassword'
,'setpassword'
,'setaccept'
,'aboutus'
,'contact'
,'login'
,'webdirectory'
,'registershopaff'
,'manage'=>'manage'
);
$subconfig=array('map'=>'map');
$pageobj=array('ajax');
$langobj=array('en','th');
$langtitle=array('English','ไทย');
$db_exec = new db_execute();
$db_exec->set_host("localhost");
$db_exec->set_user("infostant_db");
$db_exec->set_pass("infostant1234"); 
$db_exec->set_database("infostant_db");  





//$db_exec->set_user("root");
//$db_exec->set_pass("chaibird"); 
//$db_exec->set_database("infostant");

require_once('dir.php');
define('fullpathtemp',rootpath.'/templates/shop_c/'); 
define('fullpathimages',rootpath.'/images/shop_c/');  
define('fullpathtemplates',rootpath.'/templates/shop/'); 



define('fullpathtemp2',rootpath.'/templates/user_c/'); 
define('fullpathimages2',rootpath.'/images/user_c/');
define('fullpathtemplates2',rootpath.'/templates/user/');   



define('charset','UTF-8');

//$mobile =mobile_device_detect();




$class_uri =new class_uri($pageconfig,$langobj,$subconfig,$db_exec);

$info=$class_uri->getdata();

if($info['sub']=="flood")
{
    define('homeinfo','http://flood.infostant.com');
}else
{
    define('homeinfo','http://www.infostant.com'); 
}


define('imginfo','http://www.infostant.com');
if($mobile&&$info['class']!='ajax'&&$info['class']!='map')
{
  $info['mobile']=1;
  $info['class']='mobileinfostant';  
} 

require_once('includes/define.php');
require_once(pluginpath.'/facebook-sdk/src/facebook.php');


if(!in_array($info['class'],$pageobj))
{
require_once('includes/class_control/template.php');
require_once('includes/class_control/head.php');
require_once('includes/class_control/footer.php');


  $header=new head('header',$info);
  $header->set_db($db_exec);
  $footer=new footer('footer',$info);
  
}
require_once('includes/class_control/'.$info['class'].'.php');



?>
