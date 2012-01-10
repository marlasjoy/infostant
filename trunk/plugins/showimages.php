<?php
require_once 'resize/ThumbLib.inc.php';

$thumb = PhpThumbFactory::create($_GET['source']);
$thumb->setOptions(array('bgcolor'=> array(255,255,255)));
// find width of image
foreach($thumb->getCurrentDimensions() as $key => $value)
$$key = $value;

if ($width < $_GET['width'])
$thumb->resize($_GET['width'], $_GET['height'],true);
else
$thumb->adaptiveResize($_GET['width'], $_GET['height']);

$thumb->show();

?>