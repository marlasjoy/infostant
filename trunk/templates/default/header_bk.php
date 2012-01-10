<!DOCTYPE html>
<html xmlns:fb="http://www.facebook.com/2008/fbml" lang="<?=lang?>">
<head>
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
<meta content="<?=$this->data['description']?$this->data['description']:description?>" name="description">
<meta content="<?=$this->data['keywords']?$this->data['keywords']:keywords?>" name="keywords">


</head>
<body <?if($this->data['probody']){echo $this->data['probody']; }?>>
<header>
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
            	<li><a href="#">Forgot password?</a></li>
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
      <li style="color:#313131;"><div style="padding-right: 10px; float: left;"><? echo $_COOKIE['userlogin']?></div><div style=" float: left;"><input type="image" src="<?=homeinfo?>/images/logout.png" ></div></li>
      </ul>
      </div>
      </form>
      
      <?}?>
  </h1>
  <!-- begin nav -->
    <nav>
        <ul>
            <li>&nbsp;</li>
            <li>&nbsp;</li>
            <li><a href="#">Home</a></li>
            <li>|</li>
            <li><a href="#">Package</a></li>
            <li>|</li>
            <li><a href="#">Service</a></li>
            <li>|</li>
            <li><a href="#">Promotion</a></li>
            <li>|</li>
            <li><a href="#">Contact Us</a></li>
        </ul>
    </nav>
    <!-- end nav -->
</header>

<div id="headerbanner">
   	<img src="<?=homeinfo?>/images/default/header/header-banner.jpg" width="1000" height="288" alt="" />
</div>
<div id="webdir" style="display: none;"><?=homeinfo?></div>
<div id="subdir" style="display: none;"><?=domain?></div>