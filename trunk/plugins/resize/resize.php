<?php
define(rootdir,'C:/AppServ/www/ibuy');
//setup template engine
require_once rootdir.'/includes/resize/ThumbLib.inc.php';
$thumb = PhpThumbFactory::create(rootdir.'/product_images/'.$_GET['images']);
$thumb->setOptions(array('bgcolor'=> array (255, 255, 255)));
$thumb->Resize($_GET['width'], $_GET['height'], true);
$thumb->show();
?>