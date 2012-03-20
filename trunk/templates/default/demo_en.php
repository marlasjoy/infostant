<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">

<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Infostant.com : Delight your ifomation</title>

    <!-- Framework CSS -->
    <link rel="stylesheet" href="/css/blueprint/screen.css" type="text/css" media="screen, projection">
    <link rel="stylesheet" href="/css/blueprint/print.css" type="text/css" media="print">
    <link rel="stylesheet" href="/css/blueprint/style.css" type="text/css" media="screen, projection">

    <!--[if IE]><link rel="stylesheet" href="blueprint/ie.css" type="text/css" media="screen, projection"><![endif]-->


    <!-- Import fancy-type plugin for the sample page. -->
    <link rel="stylesheet" href="/css/blueprint/plugins/fancy-type/screen.css" type="text/css" media="screen, projection">
    <script src="http://www.infostant.com/js/libs/jquery-1.7.1.min.js"></script>
      <script src="http://www.infostant.com/js/default/jquery.validate.js"></script>
      <script src="http://www.infostant.com/js/default/scriptajaxregister6.js"></script>
        <style>
	  .buttonblue {
		  cursor:pointer;
		  margin-top:10px;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	color: #ffffff;
	padding: 5px 13px;
	border-radius: 4px;
	-moz-border-radius: 4px;
	-webkit-border-radius: 4px;
	border: 1px solid #14a5b6;
	-moz-box-shadow:
		0px 1px 5px rgba(000,000,000,0.2),
		inset 0px 0px 3px rgba(255,255,255,0);
	-webkit-box-shadow:
		0px 1px 5px rgba(000,000,000,0.2),
		inset 0px 0px 3px rgba(255,255,255,0);
	text-shadow:
		0px -1px 0px rgba(000,000,000,0.1),
		0px 1px 3px rgba(0,0,0,0.4);
		background:#1ea9ba !important;
}


.buttonblue:hover {
	background: -moz-linear-gradient(
		top,
		#14a5b6 0%,
		#1ea9ba);
	background: -webkit-gradient(
		linear, left top, left bottom, 
		from(#14a5b6),
		to(#1ea9ba);
	}
      </style>	
  </head>
  <body>

<div class="top">
    <div class="container">
        <img src="/images/demo/index_top.png" border="0" usemap="#Map" >
        <map name="Map">
          <area shape="rect" coords="890,0,916,40" href="/">
          <area shape="rect" coords="926,0,950,40" href="/en">
          <area shape="rect" coords="389,295,422,329" href="#" alt="App for iPhone and Ipad">
          <area shape="rect" coords="439,295,473,328" href="#" alt="App for android">
          <area shape="rect" coords="490,295,524,330" href="#" alt="Comming soon">
          <area shape="rect" coords="540,297,571,332" href="#" alt="Comming soon">
        </map>
    </div>
</div>


    <div class="container content">
        <form method="post" action="" id="dummy">


          <p>
            <label for="dummy1">Username</label>
            <input type="text" name="username" id="username" class="text">
            </p>
            
          <p>
            <label for="dummy1">Password</label>
            <input type="password" name="password1" id="password1" class="text">
            </p>

            
          <p>
            <label for="dummy1">Re-Password</label>
            <input type="password" name="repassword" id="repassword" class="text">
            </p>
            
          <p>
            <label for="dummy1">E-mail</label>
            <input type="text" name="email" id="email" class="text">
            </p>





            <p>
            <label for=""></label>
              <input class="css3button" type="submit" value="Register">
               <input class="buttonblue" type="button" onclick="location.href='<?=homeinfo?>/login'" value="Login">
            </p>

        </form>
    </div>



<div class="footer">
    <div class="container">
        <img src="/images/demo/index_bottom.png" border="0" usemap="#Map2" >
        <map name="Map2">
          <area shape="rect" coords="384,99,416,131" href="#">
          <area shape="rect" coords="434,99,467,133" href="#">
          <area shape="rect" coords="484,100,517,132" href="#">
          <area shape="rect" coords="533,100,570,133" href="#">
        </map>
    </div>
</div>

  </body>
</html>
