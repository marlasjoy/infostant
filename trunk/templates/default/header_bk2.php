<!DOCTYPE html>
<html xmlns:fb="http://www.facebook.com/2008/fbml" lang="<?=lang?>">
<head>
<script type="text/javascript" src="<?=homeinfo?>/js/default/google-stat.js"></script> 
<base href="<?=homeinfo?>">
<meta charset="<?=charset?>" />
<title><?=$this->data['title']?$this->data['title']:title?></title>
<? if(is_array($this->data['css'])){
foreach($this->data['css'] as $value){ ?>

<link rel="stylesheet" href="<?=homeinfo?>/css/default/<?=$value?>" />
<? 
}}?>
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
<?=$value?>"
<? 
}}?>
<script src="<?=homeinfo?>/js/default/search.js"></script>
<meta content="<?=$this->data['description']?$this->data['description']:description?>" name="description">
<meta content="<?=$this->data['keywords']?$this->data['keywords']:keywords?>" name="keywords">
<div style="display:none;" id="homeinfo"><?=homeinfo?></div>

</head>
<body <?if($this->data['probody']){echo $this->data['probody']; }?>>
<header>
<div id="header"> 
  <h1>
     <? 

     
     if(empty($_COOKIE['userlogin'])){ ?>
     <form name="login" method="post" action="<?=homeinfo?>/ajax/loginuser">
      <div id="form-login">
            <ul style="padding-top:20px;">
            	<li><input type="text" id="username" name="username" maxlength="15" value=""></li>
                <li><input type="password" id="password" name="password" maxlength="15" value=""></li>
                <li><input type="image" src="<?=homeinfo?>/images/default/button/button-login.jpg" id="buttonLogin" name="buttonLogin"></li>
            </ul>
            <ul>
            	<li><a href="<?=homeinfo?>/forgetpassword">Forget password?</a></li>
                <li>|</li>
                <li><a href="<?=homeinfo?>/register">Register here!</a></li>
                <li>
                	<img src="<?=homeinfo?>/images/default/button/icon-twitter.jpg" border="0" height="17"><img src="<?=homeinfo?>/images/default/button/icon-facebook.jpg" border="0" height="17"><img src="<?=homeinfo?>/images/default/button/icon-like.jpg" border="0" height="17">
                </li>
            </ul>
      </div>
      </form>
      <?}else{?>
             <form name="login" method="post" action="<?=homeinfo?>/ajax/logoutuser">
       <div id="form-login">
      <ul style="padding-top:40px; padding-right: 50px;">
      <li style="color:#313131;"><div onmouseover="$('#at15s').show()" style="padding-right: 10px; float: left;"><? echo $_COOKIE['userlogin']?></div><div style=" float: left;"><input type="image" src="<?=homeinfo?>/images/logout.png" ></div></li>
      </ul>
      <div id="at15s"    style="z-index: 1000000; position: absolute; visibility: visible; top: 50px; left: 754px; width: 250px;color: black; display: none; " >
<div id="at15s_inner">
<div id="at15s_head" style="padding-bottom: 10px"><span id="at15ptc"><strong><a href="<?=homeinfo?>/profile"> รายชื่อเว็บที่ได้สมัครกับทางเรา</a></strong></span><span id="at15s_brand" class="at15s_brandx"></span><a href="javascript:void(0);" onclick="$('#at15s').hide()"   id="at15sptx">X</a></div>
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
      </div>
      </form>
      
      <?}?>
  </h1>
  <!-- begin nav -->
    <nav>
    <div id="nav">
        <ul>
        
            <li>&nbsp;</li>
            <li>&nbsp;</li>
            <li><a href="<?=homeinfo?>">Home</a></li>
            <li>|</li>
            <li><a href="<?=homeinfo?>/package">Package</a></li>
            <li>|</li>
            <li><a href="<?=homeinfo?>/service">Service</a></li>
            <li>|</li>
            <li><a href="<?=homeinfo?>/promotion">Promotion</a></li>
            <li>|</li>
            <li><a href="<?=homeinfo?>/contact-us">Contact Us</a></li>

            <ul style="float: right;">

            <li>
                <form name="searchform" id="searchform">
                    
                    <input type="image" id="sa" name="sa" src="<?=homeinfo?>/images/default/button/button_search-05.jpg">

                    <input style="padding-right: 5px;" type="text" id="textSearch" name="textSearch" maxlength="50" placeholder="" value=""> 
                    <input style="padding-right: 5px;" type="image" id="search" name="search" src="<?=homeinfo?>/images/default/button/button_search-03.jpg">
                    <!--<input style="padding-right: 20px;" type="image" id="search2" name="sa" src="<?=homeinfo?>/images/default/button/button_search-04.jpg"> -->
                    
                </form>


            </li>
        </ul>
        </ul>
     </div>   
    </nav>
    <!-- end nav -->
    </div>
</header>
  <? if($this->data['noheader']!=1){?>
<div id="headerbanner">

 
 <object data="<?=homeinfo?>/flash/banner-infostant.swf" type="application/x-shockwave-flash" width="1000" height="288" id="menu" align="middle"><param name="allowScriptAccess" value="sameDomain">
        <param name="quality" value="best">
        <param name="wmode" value="transparent">
        <param name="bgcolor" value="#ffffff" />
        <param name="movie" value="<?=homeinfo?>/flash/banner-infostant.swf" />
        <embed src="" quality="high" wmode="transparent" pluginspage="http://www.adobe.com/go/getflash" type="application/x-shockwave-flash" width="1000" height="288"></embed>
         <!--[if !IE]>--> <object type="application/x-shockwave-flash" data="<?=homeinfo?>/flash/banner-infostant.swf" width="1000" height="288">
 <!--<![endif]--><img src="<?=homeinfo?>/images/default/header/banner-infostant5.jpg" width="1000" height="288" alt="" />  <!--[if !IE]>--> 
 </object> <!--<![endif]--> 
</object>


<?}?>
<div id="webdir" style="display: none;"><?=homeinfo?></div>
<div id="subdir" style="display: none;"><?=domain?></div>