<?php
    //define('rootdir','/home/ibuy/public_html');
    //setup template engine
   
   
    require_once rootdir.'/includes/resize/ThumbLib.inc.php';
    $thumb = PhpThumbFactory::create(rootdir.'/assets/image/shop_product/'.$_GET['images']);
    list($width, $height) = getimagesize(rootdir.'/assets/image/shop_product/'.$_GET['images']); 
    if($width > $_GET['width']) {
        $thumb->setOptions(array('resizeUp'=>true));
        if($height >=1500)
        {
            $height = 1500;
        }
        $thumb->Resize($_GET['width'], $height, false);
    }
    $thumb->show();

?>