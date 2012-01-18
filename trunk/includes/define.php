<?php
define('lang',$info['lang']);
$arraydataweb=array(
'th'=>
        array('title'=>'Infostant Thailand Infostant Directory สมุดหน้าเหลืองบนโลกดิจิตอล',
              'description'=>'Directory ออนไลน์ ที่รวบรวมรายชื่อธุรกิจไว้มากที่สุด ทั้ง ห้างร้านต่าง ๆ ร้านค้า ร้านอาหาร โรงแรม ที่พัก รีสอร์ต ท่องเที่ยว สปา เสริมความงาม บริการต่างๆ การศึกษา การขนส่ง ฯลฯ ค้นหาอะไรก็เจอ',
              'keywords'=>' ร้านค้า,ร้านอาหาร,โรงแรม,ที่พัก,รีสอร์ต,ท่องเที่ยว,สปา,เสริมความงาม,บริการต่างๆ,การศึกษา,การขนส่ง',
              'email'=>'อีเมล์'
              
              
              )


);

if($arraydataweb[lang])
{
   $dataset=$arraydataweb[lang]; 
}else
{
   $dataset=$arraydataweb['th'];  
}
define('title',$dataset['title']);
define('description',$dataset['description']);
define('keywords',$dataset['keywords']);
define('publickey','6LdyzsgSAAAAAEA1cFXfkoYPMFzgIolfPdLMm7_U');
define('privatekey','6LdyzsgSAAAAAOePpWOxgieA7sST-V0KfUsu7Akb');
define('appid','128612640576486');
define('secret','15208777d8dc2e91595a1375f42ece94');
define('googleapikey','ABQIAAAAe63NT2Mx7h3NnoiZlmjW2BT5gYv8D7uc6rL81EaZ43ebbB3MtRRBgZ9WOBon3m0ueaMZH_XcT0Dj7g');
define('size','200x128&220x90&110x110&460x309&676x316&940x310&306x550&208x148&460x477&208x148&940x360&460x260&940x350&100x110&940x370&940x400&676x402&220x160&940x440&940x308&460x162&313x440&75x75&500x500');


//ini_set('session.cookie_domain',domain);
 


?>
