<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="<?=lang?>"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="<?=lang?>"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="<?=lang?>"> <![endif]-->
<!-- Consider adding a manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" lang="<?=lang?>"> <!--<![endif]-->
<head>
  <meta charset="utf-8">

  <title><?=$this->data['shop']['title']?></title>
  <meta name = "format-detection" content = "telephone=no">
  <meta name="description" content="<?=$this->data['shop']['description']?>">
  <meta name="keywords" content="<?=$this->data['shop']['keyword']?>">
  <meta name="author" content="">

  <!-- Mobile viewport optimized: j.mp/bplateviewport -->
  <meta name="viewport" content="width=980,height=device-height,initial-scale=1">
  
  <!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->
  <link rel="stylesheet" href="<?=homeinfo?>/css/shop/addon.css">
  <link rel="stylesheet" href="<?=homeinfo?>/css/shop/style.css">
    <link rel="stylesheet" href="<?=homeinfo?>/css/shop/dropkick.css" media="all" />
  <? if(is_array($this->data['fullcss'])){
foreach($this->data['fullcss'] as $value){ ?>

<link rel="stylesheet" href="<?=$value?>" />
<? 
}}?>
  <link rel="stylesheet" href="<?=homeinfo?>/css/shop/default.css">
  
  <!-- More ideas for your <head> here: h5bp.com/d/head-Tips -->
   <script type="text/javascript" src="<?=homeinfo?>/js/default/google-stat.js"></script>
  <!-- All JavaScript at the bottom, except this Modernizr build incl. Respond.js
       Respond is a polyfill for min/max-width media queries. Modernizr enables HTML5 elements & feature detects; 
       for optimal performance, create your own custom Modernizr build: www.modernizr.com/download/ -->
  		<script src="<?=homeinfo?>/js/shop/libs/modernizr-2.0.6.min.js"></script>
  		<script src="<?=homeinfo?>/js/shop/libs/css_browser_selector.js"></script>
	  	<script src="<?=homeinfo?>/js/shop/libs/respond.min.js"></script>
	  <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
	  <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script> -->
	  <script>window.jQuery || document.write('<script src="<?=homeinfo?>/js/shop/libs/jquery-1.6.4.min.js"><\/script>')</script>
 <? if(is_array($this->data['fulljs'])){
foreach($this->data['fulljs'] as $value){ ?>
<script src="<?=$value?>"></script>
<? 
}}?>     
<? if(is_array($this->data['js'])){
foreach($this->data['js'] as $value){ ?>
<script src="<?=homeinfo?>/js/shop/<?=$value?>"></script>
<? 
}}?>

<script src="<?=homeinfo?>/js/shop/mylibs/jquery.dropkick-1.0.0.js"></script>
        <!--   Cufon for Special Font -->
<script  src="<?=homeinfo?>/js/shop/libs/cufon-yui.js"></script>

