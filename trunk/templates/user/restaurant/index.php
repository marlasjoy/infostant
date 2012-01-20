<?php include(fullpathtemp2."/head.php"); ?>
		<script  src="<?=homeinfo?>/js/shop/mylibs/steiner_300.font.js"></script>
  		<script>Cufon.replace('#main h3', { fontFamily: 'steiner', fontSize: '30px' });</script>
  		<style>.cufon-loading #main h3 { visibility: hidden!important; }</style>
  		
  		<link rel="stylesheet" href="<?=homeinfo?>/css/shop/restaurant/restaurant.css" media="all" />
</head>
<body class="backend <?=$this->data['color']?>">
  	<header>
		<?php include(fullpathtemp2."/header.php"); ?>  
		<section id="color">
			<div class="inner">
				<? include(fullpathtemp2."/changecolor.php");?>
			</div>
		</section>
	</header> 
  	<div id="main" role="main">
		<section id="one" class="clearfix">
			<article>
				<div class="d-940x350">
					<span class="label">940 X 350</span>
					 <div id="940x350x0"></div>
                    
                    <div id="textx940x350x0" style="display: none;" class="portfolioItemInfo"></div>
                    <a href="javascript:changeimage('940x350x0')" class="ir edit img">Edit Image</a>
				</div>
				<div class="d-220x90">
					<span class="label">220 X 90</span>
					<div id="220x90x0"></div>
                    <div id="textx220x90x0" style="display: none;" class="portfolioItemInfo"></div>
                    <a href="javascript:changeimage('220x90x0')" class="ir edit img">Edit Image</a>
				</div>
				
			</article>
		</section>	<!-- #one -->	
		
		<section id="two" class="clearfix">
			<article class="left">
				<h3>Special Menu</h3>
				<div class="d-220x160">
					<span class="label">220 X 160</span>
					 <div id="220x160x0"></div>
                    
                    <div id="textx220x160x0"  class="portfolioItemInfo"></div>
                    <a href="javascript:changeimage('220x160x0','group1')" class="ir edit img">Edit Image</a>
				</div>
				<div class="d-220x160">
					<span class="label">220 X 160</span>
					 <div id="220x160x1"></div>
                    
                    <div id="textx220x160x1"  class="portfolioItemInfo"></div>
                    <a href="javascript:changeimage('220x160x1','group1')" class="ir edit img">Edit Image</a>
				</div>
				<div class="d-220x160">
					<span class="label">220 X 160</span>
					 <div id="220x160x2"></div>
                    
                    <div id="textx220x160x2"  class="portfolioItemInfo"></div>
                    <a href="javascript:changeimage('220x160x2','group1')" class="ir edit img">Edit Image</a>
				</div>
				<div class="d-220x160">
					<span class="label">220 X 160</span>
					                     <div id="220x160x3"></div>
                    
                    <div id="textx220x160x3"  class="portfolioItemInfo"></div>
                    <a href="javascript:changeimage('220x160x3','group1')" class="ir edit img">Edit Image</a>
				</div>
				<div class="d-220x160">
					<span class="label">220 X 160</span>
					                     <div id="220x160x4"></div>
                    
                    <div id="textx220x160x4"  class="portfolioItemInfo"></div>
                    <a href="javascript:changeimage('220x160x4','group1')" class="ir edit img">Edit Image</a>
				</div>
				<div class="d-220x160">
					<span class="label">220 X 160</span>
					                     <div id="220x160x5"></div>
                    
                    <div id="textx220x160x5"  class="portfolioItemInfo"></div>
                    <a href="javascript:changeimage('220x160x5','group1')" class="ir edit img">Edit Image</a>
				</div>
				<div class="d-220x160">
					<span class="label">220 X 160</span>
					                     <div id="220x160x6"></div>
                    
                    <div id="textx220x160x6"  class="portfolioItemInfo"></div>
                    <a href="javascript:changeimage('220x160x6','group1')" class="ir edit img">Edit Image</a>
				</div>
				<div class="d-220x160">
					<span class="label">220 X 160</span>
                     <div id="220x160x7"></div>
                    
                    <div id="textx220x160x7"  class="portfolioItemInfo"></div>
                    <a href="javascript:changeimage('220x160x7','group1')" class="ir edit img">Edit Image</a>
				</div>
			</article>
			<article class="right quote">
				<div class="inner">
					<div class="d-340x70">
						<span class="label">Topic</span>
						<div id="title" class="font title <?=$this->data['color']?>"><?=$this->data['title']?></div>
                         <a  href="javascript:changetitle()" class="ir edit text">Edit Text</a>
					</div>
					<div class="d-340x190">
						<span class="label">Detail</span>
						<div id="detail" class="font detail <?=$this->data['color']?>"><?=$this->data['description']?></div>
                        <a  href="javascript:changedetail()" class="ir edit text">Edit Text</a>
					</div>
				</div>
				<?php include(fullpathtemp2."/button.php"); ?>
				<h3>Time Work</h3>
				<div class="d-340x60">
					<div id="daterange" class="font time <?=$this->data['color']?>"><?=$this->data['daterange']?></div>
                    <a  href="javascript:changedaterange()" class="ir edit text">Edit Text</a>
				</div>
				<h3>Contact</h3>
				<div class="d-340x113">
                    <?php include(fullpathtemp2."/contact.php"); ?>
                
				</div>
				<a id="branch" href="javascript:changememorize();" class="button black2">Memorize</a>
			</article>
		</section>	<!-- #three -->
		<section id="four" class="clearfix">
			<article class="left">
				<h3>Vdo And Gallery</h3>
				<?php include(fullpathtemp2."/vdo.php"); ?>
                			</article>
			
			<article class="right">
				<h3>Map</h3>
				<?php include(fullpathtemp2."/map.php"); ?> 
                			</article>
		</section>
		<section id="five" class="clearfix">
			<div id="social">
					<ul class="h">
					 <?php include(fullpathtemp2."/share.php"); ?>
                    
					</ul>
				</div>
		</section>
		<?php include(fullpathtemp2."/footer.php"); ?> 
  	</div>
	

  <!-- JavaScript at the bottom for fast page loading -->
	<?php include(fullpathtemp2."/script.php"); ?> 
  <!-- end scripts -->
</body>
</html>
