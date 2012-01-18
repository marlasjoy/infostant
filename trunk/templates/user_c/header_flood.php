<div class="inner clearfix" >
	<h1><a href="http://flood.<?=domain?>" class="ir">Digitdi</a></h1>
	<h2>Digital Directory</h2>
    <div style="background: url('<?=homeinfo?>/images/default/home/jitasa.png') no-repeat scroll 0 0 transparent;
    float: left;
    height: 58px;
    width: 141px;"></div>

	
    <? 
    
    if(empty($_COOKIE['userlogin'])){ ?>
     <form name="login" method="post" action="<?=homeinfo?>/ajax/loginuser">
	<section id="login">
		<p>
			<!-- <label class="inner" for="username">username</label> --> <input type="text" name="username" id="username" placeholder="username" /> 
			<!-- <label class="inner" for="password">password</label> --> <input type="password" name="password" id="password" placeholder="password" />
			<input type="submit" value="LOGIN" class="button login" id="buttonLogin" name="buttonLogin" /> <br>
			<a href="javascript:void(0);" class="first">Forgot password?</a> | <a href="http://flood.<?=domain?>/register">Register here!</a>
		</p>
	</section>
    </form>
    <?}else{?>
    <form name="login" method="post" action="<?=homeinfo?>/ajax/logoutuser">
    <section id="login">
    <p style="padding-top: 10px;">
      <div id="divuser" onmouseover="$('#at15s').show()"  style="padding-right: 10px; float: left;"><? echo $_COOKIE['userlogin']?></div><div style=" float: left;"><input type="image" src="<?=homeinfo?>/images/logout.png" ></div>
      </p>
      
<div id="at15s"    style="z-index: 1000000; position: absolute; visibility: visible; top: 50px; left: 754px; width: 250px;color: black; display: none; " >
<div id="at15s_inner">
<div id="at15s_head" style="padding-bottom: 10px"><span id="at15ptc"><strong> รายชื่อเว็บที่ได้ขอความช่วยเหลือไว้</strong></span><span id="at15s_brand" class="at15s_brandx"></span><a onclick="$('#at15s').hide()" href="#" id="at15sptx">X</a></div>
<?
if(count($this->data['listshop']))
{
foreach($this->data['listshop'] as $listshop)
{
    ?>
    <div style="padding-top: 10px"><a style="color:black;" href="http://<?=$listshop['shopurl']?>.<?=domain?>"><?=$listshop['shopname']?></a></div>
    <?
}
}

?>
<div style="padding-bottom: 10px;padding-top: 10px"><a style="color:red;" href="http://flood.<?=domain?>/register">สมัครเพิ่ม</a></div>
</div>
</div>
      
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


