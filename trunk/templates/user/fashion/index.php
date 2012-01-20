<?php include(fullpathtemp2."/head.php"); ?> 
		<script  src="<?=homeinfo?>/js/shop/mylibs/Times_LT_Std_400.font.js"></script>
  		<script>Cufon.replace('#main h3', { fontFamily: 'Times LT Std', fontSize: '30px' });</script>
		<style>.cufon-loading #main h3 { visibility: hidden!important; }</style>
		
		<link rel="stylesheet" href="<?=homeinfo?>/css/shop/fashion/fashion.css" media="all" />
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
				<div class="d-220x90">
					<span class="label">220 X 90</span>
					<div id="220x90x0"></div>
                    <div id="textx220x90x0" style="display: none;" class="portfolioItemInfo"></div>
                    <a href="javascript:changeimage('220x90x0')" class="ir edit img">Edit Image</a>
				</div>
				<div id="social">
					<?php include(fullpathtemp2."/button.php"); ?>
					<ul class="h">
						<?php include(fullpathtemp2."/share.php"); ?>
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
                    <a href="javascript:changeimage('306x550x0','group1')" class="ir edit img">Edit Image</a>
				</div>
				<div class="d-306x550">
					<span class="label">306 X 550</span>
					<div id="306x550x1"></div>
                    <div id="textx306x550x1"  class="portfolioItemInfo"></div>
                    <a href="javascript:changeimage('306x550x1','group1')" class="ir edit img">Edit Image</a>
				</div>
				<div class="d-306x550">
					<span class="label">306 X 550</span>
					<div id="306x550x2"></div>
                    <div id="textx306x550x2"  class="portfolioItemInfo"></div>
                    <a href="javascript:changeimage('306x550x2','group1')" class="ir edit img">Edit Image</a>
				</div>
			</article>
		</section>	<!-- #two -->	
		
		<section id="three" class="clearfix">
			<article class="quote">
				<div class="inner">
					<div class="d-820x50 data">
						<p><div id="title" class="font title <?=$this->data['color']?>"><?=$this->data['title']?></div>
                         <a  href="javascript:changetitle()" class="ir edit text">Edit Text</a></p>
					</div>
					<div  class="d-820x70 data">
						<p> <div id="detail" class="font detail <?=$this->data['color']?>"><?=$this->data['description']?></div>
                        <a  href="javascript:changedetail()" class="ir edit text">Edit Text</a></p>
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
                                     
                                     <a href="javascript:changeimage('208x148x0','group2')" class="ir edit img">Edit Image</a>
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

                                     <a href="javascript:changeimage('208x148x0','group2')" class="ir edit img">Edit Image</a>
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

                                     <a href="javascript:changeimage('208x148x2','group2')" class="ir edit img">Edit Image</a>
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

                                     <a href="javascript:changeimage('208x148x3','group2')" class="ir edit img">Edit Image</a>
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

                                     <a href="javascript:changeimage('208x148x4','group2')" class="ir edit img">Edit Image</a>
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

                                     <a href="javascript:changeimage('208x148x5','group2')" class="ir edit img">Edit Image</a>
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

                                     <a href="javascript:changeimage('208x148x6','group2')" class="ir edit img">Edit Image</a>
									
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

                                     <a href="javascript:changeimage('208x148x7','group2')" class="ir edit img">Edit Image</a>
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

                                     <a href="javascript:changeimage('208x148x8','group2')" class="ir edit img">Edit Image</a>
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

                                     <a href="javascript:changeimage('208x148x9','group2')" class="ir edit img">Edit Image</a>
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

                                     <a href="javascript:changeimage('208x148x10','group2')" class="ir edit img">Edit Image</a>
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

                                     <a href="javascript:changeimage('208x148x11','group2')" class="ir edit img">Edit Image</a>
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
					<div id="daterange" class="font time <?=$this->data['color']?>"><?=$this->data['daterange']?></div>
  <a  href="javascript:changedaterange()" class="ir edit text">Edit Text</a>    

				</div>
				<a id="branch" href="javascript:changememorize();" class="button black2">Memorize</a>
			</article>
			
			<article class="right">
				<h3>Contact</h3>
				<div class="d-340x113">
					   <?php include(fullpathtemp2."/contact.php"); ?>
				</div>
			</article>
			
		</section> <!-- #five -->
		
		<section id="six" class="clearfix">
			<article class="left">
				<h3>Vdo And Gallery</h3>
<?php include(fullpathtemp2."/vdo.php"); ?>
                    
					
				
			</article>
			
			<article class="right">
				<h3>Map</h3>
				<?php include(fullpathtemp2."/map.php"); ?> 
                			</article>
		</section>
		        <?php include(fullpathtemp2."/footer.php"); ?> 
  	</div>
	

  <!-- JavaScript at the bottom for fast page loading -->
	   <?php include(fullpathtemp2."/script.php"); ?> 
  <!-- end scripts -->
</body>
</html>
