<!doctype html>
<html class="no-js" lang="en"> 
    <head>
      <meta charset="utf-8">
    
      <title><?=$this->data['title']?$this->data['title']:title?></title>
      <meta content="<?=$this->data['description']?$this->data['description']:description?>" name="description">
      <meta content="<?=$this->data['keywords']?$this->data['keywords']:keywords?>" name="keywords">
      <meta name="author" content="">
    
          <meta name="viewport" content="width=1020,initial-scale=1">
    
          <link rel="stylesheet" href="<?=homeinfo?>/css/style.css">
          <? if($this->data['noindexcss']!=1){?>
          <link rel="stylesheet" href="<?=homeinfo?>/css/index.css">
          <?}?>
           <link rel="stylesheet" href="<?=homeinfo?>/css/royal-slider-6.0.min.css">
          <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> -->
          <script src="<?=homeinfo?>/js/libs/jquery-1.7.1.min.js"></script>
        <script src="<?=homeinfo?>/js/libs/css_browser_selector.js"></script>
          <script src="<?=homeinfo?>/js/libs/modernizr-2.0.6.min.js"></script>
          <!--[if (gte IE 6)&(lte IE 8)]>
              <script src="<?=homeinfo?>/js/libs/selectivizr.js"></script>
        <![endif]-->
        <? if(is_array($this->data['fulljs'])){
foreach($this->data['fulljs'] as $value){ ?>
<script src="<?=$value?>"></script>
<? 
}}?>
<? if(is_array($this->data['js'])){
foreach($this->data['js'] as $value){ ?>
<script src="<?=homeinfo?>/js/default/<?=$value?>"></script>
<? 
}}?>
<? if(is_array($this->data['option'])){
foreach($this->data['option'] as $value){ ?>
<?=$value?>
<? 
}}?> 
      <script type="text/javascript" src="<?=homeinfo?>/js/jquery.easing.1.3.min.js"></script> 
      <script type="text/javascript" src="<?=homeinfo?>/js/royal-slider-6.0.min.js"></script>    
        
    </head>

<body <?if($this->data['probody']){echo $this->data['probody']; }?>>
  <div class="container">
          <header>
              <h1><a href="<?=homeinfo?>" class="ir">infostant</a></h1>
              <h2 class="ir">Delight Your Information</h2>
              <h3 class="ir">Directory Yellow Pages <em>Information around the world</em></h3>
                   <? if(empty($_COOKIE['userlogin'])){ ?>
                     <form name="login" method="post" action="<?=homeinfo?>/ajax/loginuser">     
              <section id="login">
                  <p>    
                      <span class="placeholder"><label for="input-username"></label> <input type="text" name="username" id="input-username" /></span>
                      <span class="placeholder"><label for="input-password"></label> <input type="password" name="password" id="input-password" /></span>
                      <input type="submit" value="LOGIN" class="ir" />
                  </p>
                  <p>
                      <a href="<?=homeinfo?>/forgetpassword">Forgot password?</a> | <a href="<?=homeinfo?>/register">Register here!</a> 
                      <a href="<?=loginfacebook?>"><img src="<?=homeinfo?>/images/icon-facebook.png" alt="icon-facebook" /></a> 
                      <a href="javascript:void(0);"><img src="<?=homeinfo?>/images/icon-twitter.png" alt="icon-twitter" /></a> 
                      <a href="javascript:void(0);"><img src="<?=homeinfo?>/images/icon-like.png" alt="icon-like" /></a>
                </p>
              </section>
              </form>
                <?}else{?>
                             <form name="login" method="post" action="<?=homeinfo?>/ajax/logoutuser">    
                                <section id="login"> 
                                <p><div onmouseover="$('#at15s').show()" style="padding-right: 10px; float: left;"><? echo $_COOKIE['userlogin']?></div><div style=" float: left;"><input type="image" src="<?=homeinfo?>/images/logout.png" ></div></p>
                                 <div id="at15s"    style="z-index: 1000000; position: absolute; visibility: visible; top:20px; left: -200px; width: 250px;color: black; display: none; " >
<div id="at15s_inner">
<div id="at15s_head" style="padding-bottom: 10px"><span id="at15ptc"><strong><a href="<?=homeinfo?>/<?=$_COOKIE['userlogin']?>"> หน้าโปรไฟล์ของคุณ</a></strong></span><span id="at15s_brand" class="at15s_brandx"></span><a href="javascript:void(0);" onclick="$('#at15s').hide()"   id="at15sptx">X</a></div>
<?
if(count($this->data2['listshop']))
{
foreach($this->data2['listshop'] as $listshop)
{
    ?>
    <div style="padding-top: 10px"><a style="color:black;text-decoration: none;" href="http://<?=$listshop['shopurl']?>.<?=domain?>"><?=$listshop['shopname']?></a></div>
    <?
}
}
?>
<div style="padding-bottom: 10px;padding-top: 10px"><a style="color:red; text-decoration: none;" href="<?=homeinfo?>/register">สมัครเพิ่ม</a></div>
</div>
</div>
                                </section>  
                                      </form>      
          <?}?>
              
              <nav>
                <p><a href="<?=homeinfo?>">Home</a> | <a href="<?=homeinfo?>/package">Package</a> | <a href="<?=homeinfo?>/service">Service</a> | <a href="<?=homeinfo?>/promotion">Promotion</a> | <a href="<?=homeinfo?>/aboutus">About Us</a> | <a href="<?=homeinfo?>/contact">Contact Us</a></p>
            </nav>
            <div style="display:none;" id="homeinfo"><?=homeinfo?></div> 
          </header>
        <div id="webdir" style="display: none;"><?=homeinfo?></div>
<div id="subdir" style="display: none;"><?=domain?></div>