<?
require_once '../ThumbLib.inc.php';

$thumb = PhpThumbFactory::create('test.jpg');
$thumb->setOptions(array('bgcolor'=> array(0,0,0)));
$thumb->Resize(200, 400, true);
$thumb->show();

?>