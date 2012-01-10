<?php include(fullpathtemp."/head.php"); ?> 
</head>
<body class="backend coffee">
    <link rel="stylesheet" href="<?=homeinfo?>/css/shop/coffee/coffee.css" media="all" />
      <header>
        <?php include(fullpathtemp."/header.php"); ?>
        <section id="color">
            <div class="inner">
                <h2 class="ir">Coffee &amp; Dessert</h2>
                <p >

                    <label for="bg">BG Colour</label>
                    <a href="javascript:void(0);" class="ir button white">White</a>
                    <a href="javascript:void(0);" class="ir button black">Black</a>
                    <label for="language">Add Language</label>
                    <select  name="language" id="language">
                        <?=$this->data['lang']?>
                    </select>

                </p>
            </div>
        </section>
    </header> 
      <div id="main" role="main">
        <section id="one" class="clearfix">
            <article class="left">
                <div    class="d-220x90">
                   <div id="220x90x0"></div>
                   <div id="textx220x90x0" style="display: none;" class="portfolioItemInfo"></div>
                    <span class="label">220 X 90</span>

                    <a href="<?=homeinfo.'/popup/'.$this->data['landingpage'].'/220x90x0/'.$this->data['shop']['shopurl']?>"  class="ir edit img">Edit Image</a>
                </div>
            </article>
            <article class="right">
                <div  class="d-100x110">
                   <div id="100x110x0"></div>
                     <div id="textx100x110x0" style="display: none;" class="portfolioItemInfo"></div>
                    <span class="label">100 X 110</span>
                    <a href="<?=homeinfo.'/popup/'.$this->data['landingpage'].'/100x110x0/'.$this->data['shop']['shopurl'].'/group1'?>"  class="ir edit img">Edit Image</a>
                </div>
                <div class="d-100x110">
                    <div id="100x110x1"></div>
                    <div id="textx100x110x1" style="display: none;" class="portfolioItemInfo"></div>
                    <span class="label">100 X 110</span>
                    <a href="<?=homeinfo.'/popup/'.$this->data['landingpage'].'/100x110x1/'.$this->data['shop']['shopurl'].'/group1'?>"  class="ir edit img">Edit Image</a>
                </div>
                <div class="d-100x110">
                    <div id="100x110x2"></div>
                    <div id="textx100x110x2" style="display: none;" class="portfolioItemInfo"></div>
                    <span class="label">100 X 110</span>
                    <a href="<?=homeinfo.'/popup/'.$this->data['landingpage'].'/100x110x2/'.$this->data['shop']['shopurl'].'/group1'?>"  class="ir edit img">Edit Image</a>
                </div>
                <div class="d-100x110">
                    <div id="100x110x3"></div>
                    <div id="textx100x110x3" style="display: none;" class="portfolioItemInfo"></div>
                    <span class="label">100 X 110</span>
                    <a href="<?=homeinfo.'/popup/'.$this->data['landingpage'].'/100x110x3/'.$this->data['shop']['shopurl'].'/group1'?>"  class="ir edit img">Edit Image</a>
                </div>
            </article>
        </section>    <!-- #one -->    
        
        <section id="two" class="clearfix">
            <article class="left quote">
                <div class="inner">
                    <div class="d-340x70">
                         <div id="title" class="font title black"><?=$this->data['title']?></div>
                        <span style="display: none;" class="label">Topic</span>
                        <a href="<?=homeinfo.'/popup3/'.$this->data['landingpage'].'/title/'.$this->data['shop']['shopurl']?>" class="ir edit text">Edit Text</a>
                    </div>
                    <div class="d-340x190">
                        <div id="detail" class="font detail black"><?=$this->data['description']?></div>
                        <span style="display: none;" class="label">Detail</span>
                        <a href="<?=homeinfo.'/popup3/'.$this->data['landingpage'].'/detail/'.$this->data['shop']['shopurl']?>" class="ir edit text">Edit Text</a>
                    </div>
                </div>
            </article>
            <article class="right">
                <div class="d-460x309">
                    <div id="460x309x0"></div>
                    <div id="textx460x309x0" class="portfolioItemInfo"></div>
                    <span class="label">460 X 309</span>
                    <a href="<?=homeinfo.'/popup/'.$this->data['landingpage'].'/460x309x0/'.$this->data['shop']['shopurl'].'/group1'?>"  class="ir edit img">Edit Image</a>
                </div>
            </article>
        </section>    <!-- #two -->    
        
        <section id="three" class="clearfix">
            <article class="left">
                <h3>Special Menu</h3>
                <div class="d-220x160">
                     <div id="220x160x0"></div>
                     <div id="textx220x160x0" class="portfolioItemInfo"></div>
                    <span class="label">220 X 160</span>
                    <a href="<?=homeinfo.'/popup/'.$this->data['landingpage'].'/220x160x0/'.$this->data['shop']['shopurl'].'/group2'?>"  class="ir edit img">Edit Image</a>

                </div>
                <div class="d-220x160">
                    <div id="220x160x1"></div>
                    <div id="textx220x160x1" class="portfolioItemInfo"></div>
                    <span class="label">220 X 160</span>
                    <a href="<?=homeinfo.'/popup/'.$this->data['landingpage'].'/220x160x1/'.$this->data['shop']['shopurl'].'/group2'?>"  class="ir edit img">Edit Image</a>

                </div>
                <div class="d-220x160">
                    <div id="220x160x2"></div>
                    <div id="textx220x160x2" class="portfolioItemInfo"></div>
                    <span class="label">220 X 160</span>
                    <a href="<?=homeinfo.'/popup/'.$this->data['landingpage'].'/220x160x2/'.$this->data['shop']['shopurl'].'/group2'?>"  class="ir edit img">Edit Image</a>

                </div>
                <div class="d-220x160">
                     <div id="220x160x3"></div>
                     <div id="textx220x160x3" class="portfolioItemInfo"></div>
                    <span class="label">220 X 160</span>
                    <a href="<?=homeinfo.'/popup/'.$this->data['landingpage'].'/220x160x3/'.$this->data['shop']['shopurl'].'/group2'?>"  class="ir edit img">Edit Image</a>

                </div>
                <div class="d-220x160">
                     <div id="220x160x4"></div>
                     <div id="textx220x160x4" class="portfolioItemInfo"></div>
                    <span class="label">220 X 160</span>
                    <a href="<?=homeinfo.'/popup/'.$this->data['landingpage'].'/220x160x4/'.$this->data['shop']['shopurl'].'/group2'?>"  class="ir edit img">Edit Image</a>

                </div>
                <div class="d-220x160">
                     <div id="220x160x5"></div>
                     <div id="textx220x160x5" class="portfolioItemInfo"></div>
                    <span class="label">220 X 160</span>
                    <a href="<?=homeinfo.'/popup/'.$this->data['landingpage'].'/220x160x5/'.$this->data['shop']['shopurl'].'/group2'?>"  class="ir edit img">Edit Image</a>

                </div>
            </article>
            <article class="right">
                <div id="social">
                    <p>
                        <a href="javascript:void(0);" id="fav" class="button black1">Add to Favorite</a>
                        <a href="javascript:void(0);" id="like" class="button black1">Send to Friend</a>
                    </p>
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
                
                <h3>Time work</h3>
                <div class="d-340x60">
                    <div id="daterange" class="font time black"><?=$this->data['daterange']?></div>
                    <a  href="<?=homeinfo.'/popup3/'.$this->data['landingpage'].'/daterange/'.$this->data['shop']['shopurl']?>" class="ir edit text">Edit Text</a>
                </div>
                
                <h3>Contact</h3>
                <div class="d-340x113">
                <div id="contact" class="font contact black"> <span id="title-address">Address</span> :<span id="address"><?=$this->data['address']?></span> <br>
                <span id="title-tel">Tel</span>:<span id="tel"><?=$this->data['tel']?></span><br>
               <span id="title-emailshop">Email</span> : <span id="emailshop"><?=$this->data['emailshop']?></span><br>
                <span id="title-website">Website</span> : <span id="website"><?=$this->data['website']?></span></div>
                    <a href="<?=homeinfo.'/popup5/'.$this->data['landingpage'].'/address-tel-emailshop-website/'.$this->data['shop']['shopurl']?>" class="ir edit text">Edit Text</a>
                </div>
                <a id="branch" href="javascript:void(0);" class="button black2">Branch</a>
            </article>
        </section>    <!-- #three -->
        
        <section id="four" class="clearfix">
            <article class="left">
                <h3>Clip Review </h3>
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
        </section>    <!-- #four -->
        <?php include(fullpathtemp."/footer.php"); ?> 
      </div>
    

  <!-- JavaScript at the bottom for fast page loading -->
    <?php include(fullpathtemp."/script.php"); ?> 
    <!-- end scripts -->
</body>
</html>
