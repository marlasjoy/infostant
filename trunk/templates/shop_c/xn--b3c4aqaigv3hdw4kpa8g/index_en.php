<?php include(fullpathtemp."/head.php"); ?> 
		<script  src="<?=homeinfo?>/js/shop/mylibs/Times_LT_Std_400.font.js"></script>
  		<script>Cufon.replace('#main h3', { fontFamily: 'Times LT Std', fontSize: '30px' });</script>
		<style>.cufon-loading #main h3 { visibility: hidden!important; }</style>
		
		<link rel="stylesheet" href="<?=homeinfo?>/css/shop/fashion/fashion.css" media="all" />
</head>
<body class="backend">
  	<header>
		<?php include(fullpathtemp."/header.php"); ?>
		<section id="color">
			<div class="inner">
				<h2 class="ir">Fashion &amp; Accessory</h2>
				<p>
					<label for="bg">BG Colour</label>
					<a href="javascript:void(0);" class="ir button white">White</a>
					<a href="javascript:void(0);" class="ir button black">Black</a>
					<label for="language">Add Language</label>
					<select name="language" id="language">
						<?=$this->data['lang']?>
					</select>
				</p>
			</div>
		</section>
	</header> 
  	<div id="main" role="main">
		<section id="one" class="clearfix">
			<article>
				<div class="d-220x90">
					<span class="label">220 X 90</span>
					<div id="220x90x0"></div>
                    <div id="textx220x90x0" style="display: none;" class="portfolioItemInfo"></div>
                    <a href="<?=homeinfo.'/popup/'.$this->data['landingpage'].'/220x90x0/'.$this->data['shop']['shopurl']?>" class="ir edit img">Edit Image</a>
				</div>
				<div id="social">
					<a href="javascript:void(0);" id="fav" class="button black1">Add to Favorite</a>
                    <a href="javascript:void(0);" id="like" class="button black1">Send to Friend</a>
					<ul class="h">
						<li><a  href="javascript:void(window.open('http://www.facebook.com/sharer/sharer.php?v=4&src=bm&u='+encodeURIComponent(document.location.toString()),'Facebook','height=450,width=550').focus())"><img src="<?=homeinfo?>/images/shop/icon-social-01.png" alt="Facebook" width="29" height="29" /></a></li>
                        <li><a  href="javascript:void(window.open('http://twitter.com/intent/tweet?source=webclient&text='+encodeURIComponent(document.location.toString()),'Twitter','height=450,width=550').focus())"><img src="<?=homeinfo?>/images/shop/icon-social-02.png" alt="Twitter" width="29" height="29" /></a></li>
                        <li><a  href="javascript:void(0);"><img src="<?=homeinfo?>/images/shop/icon-social-03.png" alt="RSS Feed" width="29" height="29" /></a></li>
                        <li><a  href="javascript:void(window.open('http://www.myspace.com/Modules/PostTo/Pages/?u='+encodeURIComponent(document.location.toString()),'My Space','height=450,width=550').focus())"><img src="<?=homeinfo?>/images/shop/icon-social-04.png" alt="My Space" width="29" height="29" /></a></li>
                        <li><a  href="javascript:void(window.open('http://www.linkedin.com/shareArticle?mini=true&url=CONTENT-URL&title=web&summary=web&source='+encodeURIComponent(document.location.toString()),'Linkedin','height=450,width=550').focus())"><img src="<?=homeinfo?>/images/shop/icon-social-05.png" alt="Linkedin" width="29" height="29" /></a></li>
                        <li><a  href="javascript:void(window.open('https://m.google.com/app/plus/x/?v=compose&content='+encodeURIComponent(document.location.toString()),'Google +','height=450,width=550').focus())"><img src="<?=homeinfo?>/images/shop/icon-social-06.png" alt="Google +" width="29" height="29" /></a></li>
                        <li><a  href="mailto:?subject=&body=Link="><img src="<?=homeinfo?>/images/shop/icon-social-07.png" alt="Email" width="29" height="29" /></a></li>
					</ul>
				</div>
			</article>
		</section>	<!-- #one -->	
		
		<section id="two" class="clearfix">
			<article>
				<div class="d-306x550">
					<span class="label">306 X 550</span>
					<div id="306x550x0"></div>
                    
                    <div id="textx306x550x0"  class="portfolioItemInfo"></div>
                    <a href="<?=homeinfo.'/popup/'.$this->data['landingpage'].'/306x550x0/'.$this->data['shop']['shopurl'].'/group1'?>" class="ir edit img">Edit Image</a>
				</div>
				<div class="d-306x550">
					<span class="label">306 X 550</span>
					<div id="306x550x1"></div>
                    <div id="textx306x550x1"  class="portfolioItemInfo"></div>
                    <a href="<?=homeinfo.'/popup/'.$this->data['landingpage'].'/306x550x1/'.$this->data['shop']['shopurl'].'/group1'?>" class="ir edit img">Edit Image</a>
				</div>
				<div class="d-306x550">
					<span class="label">306 X 550</span>
					<div id="306x550x2"></div>
                    <div id="textx306x550x2"  class="portfolioItemInfo"></div>
                    <a href="<?=homeinfo.'/popup/'.$this->data['landingpage'].'/306x550x2/'.$this->data['shop']['shopurl'].'/group1'?>" class="ir edit img">Edit Image</a>
				</div>
			</article>
		</section>	<!-- #two -->	
		
		<section id="three" class="clearfix">
			<article class="quote">
				<div class="inner">
					<div class="d-820x50 data">
						<p><div id="title" class="font title black"><?=$this->data['title']?></div>
                         <a  href="<?=homeinfo.'/popup3/'.$this->data['landingpage'].'/title/'.$this->data['shop']['shopurl']?>" class="ir edit text">Edit Text</a></p>
					</div>
					<div  class="d-820x70 data">
						<p> <div id="detail" class="font detail black"><?=$this->data['description']?></div>
                        <a  href="<?=homeinfo.'/popup3/'.$this->data['landingpage'].'/detail/'.$this->data['shop']['shopurl']?>" class="ir edit text">Edit Text</a></p>
					</div>
				</div>
			</article>
		</section>	<!-- #three -->
		
		<section id="four" class="clearfix">
			<article>
				<h3>Hot Products</h3>
				<table>
					<tbody>
						<tr>
							<td>
								<div class="d-208x148">
									<span class="new">New !</span>
									<span class="label">208 X 148</span>
									<div id="208x148x0"></div>
                                     
                                     <a href="<?=homeinfo.'/popup/'.$this->data['landingpage'].'/208x148x0/'.$this->data['shop']['shopurl'].'/group2'?>" class="ir edit img">Edit Image</a>
								</div>
                               <div class="d-220x38">
                                    <div id="textx208x148x0"  ></div>
                                </div>
							</td>
							<td>
								<div class="d-208x148">
									<span class="new">New !</span>
									<span class="label">208 X 148</span>
									<div id="208x148x1"></div>

                                     <a href="<?=homeinfo.'/popup/'.$this->data['landingpage'].'/208x148x1/'.$this->data['shop']['shopurl'].'/group2'?>" class="ir edit img">Edit Image</a>
								</div>
                                <div class="d-220x38">
                                    <div id="textx208x148x1"  ></div>
                                </div>

							</td>
							<td>
								<div class="d-208x148">
									<span class="new">New !</span>
									<span class="label">208 X 148</span>
									<div id="208x148x2"></div>

                                     <a href="<?=homeinfo.'/popup/'.$this->data['landingpage'].'/208x148x2/'.$this->data['shop']['shopurl'].'/group2'?>" class="ir edit img">Edit Image</a>
								</div>
                                <div class="d-220x38">
                                    <div id="textx208x148x2"  ></div>
                                </div>
							</td>
							<td>
								<div class="d-208x148">
									<span class="new">New !</span>
									<span class="label">208 X 148</span>
									<div id="208x148x3"></div>

                                     <a href="<?=homeinfo.'/popup/'.$this->data['landingpage'].'/208x148x3/'.$this->data['shop']['shopurl'].'/group2'?>" class="ir edit img">Edit Image</a>
								</div>
                                <div class="d-220x38">
                                    <div id="textx208x148x3"  ></div>
                                </div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="d-208x148">
									<span class="new">New !</span>
									<span class="label">208 X 148</span>
									<div id="208x148x4"></div>

                                     <a href="<?=homeinfo.'/popup/'.$this->data['landingpage'].'/208x148x4/'.$this->data['shop']['shopurl'].'/group2'?>" class="ir edit img">Edit Image</a>
								</div>
                                <div class="d-220x38">
                                    <div id="textx208x148x4"  ></div>
                                </div>

							</td>
							<td>
								<div class="d-208x148">
									<span class="new">New !</span>
									<span class="label">208 X 148</span>
									<div id="208x148x5"></div>

                                     <a href="<?=homeinfo.'/popup/'.$this->data['landingpage'].'/208x148x5/'.$this->data['shop']['shopurl'].'/group2'?>" class="ir edit img">Edit Image</a>
								</div>
                                <div class="d-220x38">
                                    <div id="textx208x148x5"  ></div>
                                </div>
							</td>
							<td>
								<div class="d-208x148">
									<span class="new">New !</span>
									<span class="label">208 X 148</span>
                                    <div id="208x148x6"></div>

                                     <a href="<?=homeinfo.'/popup/'.$this->data['landingpage'].'/208x148x6/'.$this->data['shop']['shopurl'].'/group2'?>" class="ir edit img">Edit Image</a>
									
								</div>
                                <div class="d-220x38">
                                    <div id="textx208x148x6"  ></div>
                                </div>

							</td>
							<td>
								<div class="d-208x148">
									<span class="new">New !</span>
									<span class="label">208 X 148</span>
									 <div id="208x148x7"></div>

                                     <a href="<?=homeinfo.'/popup/'.$this->data['landingpage'].'/208x148x7/'.$this->data['shop']['shopurl'].'/group2'?>" class="ir edit img">Edit Image</a>
								</div>
                                 <div class="d-220x38">
                                    <div id="textx208x148x7"  ></div>
                                </div>
								
							</td>
						</tr>
						<tr>
							<td>
								<div class="d-208x148">
									<span class="new">New !</span>
									<span class="label">208 X 148</span>
									<div id="208x148x8"></div>

                                     <a href="<?=homeinfo.'/popup/'.$this->data['landingpage'].'/208x148x8/'.$this->data['shop']['shopurl'].'/group2'?>" class="ir edit img">Edit Image</a>
								</div>
                                <div class="d-220x38">
                                    <div id="textx208x148x8"  ></div>
                                </div>

							</td>
							<td>
								<div class="d-208x148">
									<span class="new">New !</span>
									<span class="label">208 X 148</span>
									<div id="208x148x9"></div>

                                     <a href="<?=homeinfo.'/popup/'.$this->data['landingpage'].'/208x148x9/'.$this->data['shop']['shopurl'].'/group2'?>" class="ir edit img">Edit Image</a>
								</div>
                                     <div class="d-220x38">
                                    <div id="textx208x148x9"  ></div>
                                </div>
							</td>
							<td>
								<div class="d-208x148">
									<span class="new">New !</span>
									<span class="label">208 X 148</span>
									<div id="208x148x10"></div>

                                     <a href="<?=homeinfo.'/popup/'.$this->data['landingpage'].'/208x148x10/'.$this->data['shop']['shopurl'].'/group2'?>" class="ir edit img">Edit Image</a>
								</div>
                                <div class="d-220x38">
                                    <div id="textx208x148x10"  ></div>
                                </div>

							</td>
							<td>
								<div class="d-208x148">
									<span class="new">New !</span>
									<span class="label">208 X 148</span>
									<div id="208x148x11"></div>

                                     <a href="<?=homeinfo.'/popup/'.$this->data['landingpage'].'/208x148x11/'.$this->data['shop']['shopurl'].'/group2'?>" class="ir edit img">Edit Image</a>
								</div>
                                <div class="d-220x38">
                                    <div id="textx208x148x11"  ></div>
                                </div>

							</td>
						</tr>
					</tbody>
				</table>
			</article>
		</section>	<!-- #four -->
		
		<section id="five" class="clearfix">
			<article class="left">
				<h3>Time Work</h3>
				<div class="d-340x60">
					<div id="daterange" class="font time black"><?=$this->data['daterange']?></div>
  <a  href="<?=homeinfo.'/popup3/'.$this->data['landingpage'].'/daterange/'.$this->data['shop']['shopurl']?>" class="ir edit text">Edit Text</a>    
				</div>
				<a id="branch" href="javascript:void(0);" class="button black2">Branch</a>
			</article>
			
			<article class="right">
				<h3>Contact</h3>
				<div class="d-340x113">
					    <div id="contact" class="font contact black"> <span id="title-address">Address</span> :<span id="address"><?=$this->data['address']?></span> <br>
                <span id="title-tel">Tel</span>:<span id="tel"><?=$this->data['tel']?></span><br>
               <span id="title-emailshop">Email</span> : <span id="emailshop"><?=$this->data['emailshop']?></span><br>
                <span id="title-website">Website</span> : <span id="website"><?=$this->data['website']?></span></div>
                    <a href="<?=homeinfo.'/popup5/'.$this->data['landingpage'].'/address-tel-emailshop-website/'.$this->data['shop']['shopurl']?>" class="ir edit text">Edit Text</a>
                
				</div>
			</article>
			
		</section> <!-- #five -->
		
		<section id="six" class="clearfix">
			<article class="left">
				<h3>Clip Review</h3>
                                       <div id="clip">
                <div id="videotext">
                  
                </div>
                    <span class="label">Upload Clip VDO</span>
                    <a href="javascript:void(0);" class="ir edit vdo">Edit VDO</a>
                </div>
                    
					
				
			</article>
			
			<article class="right">
				<h3>Map</h3>
				<div>
                <div id="map">
                    <span class="label">Add address apply to Google Map</span>
                    
                </div>
                <a href="javascript:void(0);" class="ir edit map">Edit Text</a>
                </div>
			</article>
		</section>
		        <?php include(fullpathtemp."/footer.php"); ?> 
  	</div>
	

  <!-- JavaScript at the bottom for fast page loading -->
	   <?php include(fullpathtemp."/script.php"); ?> 
  <!-- end scripts -->
</body>
</html>
