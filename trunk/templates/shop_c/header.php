<div class="inner clearfix" >
	<h1><a href="<?=homeinfo?>" class="ir">Digitdi</a></h1>
	<h2>Digital Directory</h2>
	<h3 class="ir">
		Directory Yellow Pages <br>
		Information around the world
	</h3>	
    <? 
    
    if(empty($_COOKIE['userlogin'])){ ?>
     <form name="login" method="post" action="<?=homeinfo?>/ajax/loginuser">
	<section id="login">
		<p>
			<!-- <label class="inner" for="username">username</label> --> <input type="text" name="username" id="username" placeholder="username" /> 
			<!-- <label class="inner" for="password">password</label> --> <input type="password" name="password" id="password" placeholder="password" />
			<input type="submit" value="LOGIN" class="button login" id="buttonLogin" name="buttonLogin" /> <br>
			<a href="javascript:void(0);" class="first">Forgot password?</a> | <a href="<?=homeinfo?>/register">Register here!</a>
		</p>
	</section>
    </form>
    <?}else{?>
    <form name="login" method="post" action="<?=homeinfo?>/ajax/logoutuser">
    <section id="login">
    <p style="padding-top: 10px;">
       <div id="divuser"   style="padding-right: 10px; float: left;"><a href="<?=homeinfo?>/<?=$_COOKIE['userlogin']?>"><? echo $_COOKIE['userlogin']?></a></div><div style=" float: left;"><input type="image" src="<?=homeinfo?>/images/logout.png" ></div>
      </p>

    </section>
    </form>
    <?}?>
</div>
<div id="subdir" style="display: none;"><?=domain?></div>
<div id="shopurl" style="display: none;"><?=$this->data['shop']['shopurl']?></div>
<div id="homeinfo" style="display: none;"><?=homeinfo?></div>
<div id="landingpage" style="display: none;"><?=$this->data['landingpage']?></div>
<div id="lat" style="display: none;"><?=$this->data['shop']['lat']?></div>
<div id="lng" style="display: none;"><?=$this->data['shop']['lng']?></div>
<div id="access" style="display: none;"><?=$this->data['access']?></div>
<div id="shopname" style="display: none;"><?=$this->data['shop']['shopname']?></div>
<div id="checklogin" style="display: none;"><?=$this->data['login']?></div>
<div id="icon" style="display: none;"><?=$this->data['icon']?></div>
<div id="width" style="display: none;"><?=$this->data['width']?></div>
<div id="height" style="display: none;"><?=$this->data['height']?></div>


