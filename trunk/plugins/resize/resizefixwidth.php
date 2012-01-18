<?php
//define('rootdir','/home/ibuy/public_html');
//setup template engine
require_once rootdir.'/includes/resize/ThumbLib.inc.php';
$thumb = PhpThumbFactory::create($_GET['images']);
list($width, $height) = getimagesize($_GET['images']); 
if($width > $_GET['width']) {
$thumb->setOptions(array('bgcolor'=> array (255, 255, 255), 'resizeUp'=>true));
$thumb->Resize($_GET['width'], $height, false);
}
$thumb->show();

?>