<?php include(fullpathtemp2."/head.php"); ?> 
</head>
<body class="backend coffee <?=$this->data['color']?>">
    <link rel="stylesheet" href="<?=homeinfo?>/css/shop/coffee/coffee.css" media="all" />
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
            <article class="left">
                <div    class="d-220x90">
                   <div id="220x90x0"></div>
                   <div id="textx220x90x0" style="display: none;" class="portfolioItemInfo"></div>
                    <span class="label">220 X 90</span>

                    <a href="javascript:changeimage('220x90x0')"  class="ir edit img">Edit Image</a>
                </div>
            </article>
            <article class="right">
                <div  class="d-100x110">
                   <div id="100x110x0"></div>
                     <div id="textx100x110x0" style="display: none;" class="portfolioItemInfo"></div>
                    <span class="label">100 X 110</span>
                    <a href="javascript:changeimage('100x110x0','group1')"  class="ir edit img">Edit Image</a>
                </div>
                <div class="d-100x110">
                    <div id="100x110x1"></div>
                    <div id="textx100x110x1" style="display: none;" class="portfolioItemInfo"></div>
                    <span class="label">100 X 110</span>
                    <a href="javascript:changeimage('100x110x1','group1')"  class="ir edit img">Edit Image</a>
                </div>
                <div class="d-100x110">
                    <div id="100x110x2"></div>
                    <div id="textx100x110x2" style="display: none;" class="portfolioItemInfo"></div>
                    <span class="label">100 X 110</span>
                    <a href="javascript:changeimage('100x110x2','group1')"  class="ir edit img">Edit Image</a>
                </div>
                <div class="d-100x110">
                    <div id="100x110x3"></div>
                    <div id="textx100x110x3" style="display: none;" class="portfolioItemInfo"></div>
                    <span class="label">100 X 110</span>
                    <a href="javascript:changeimage('100x110x3','group1')"  class="ir edit img">Edit Image</a>
                </div>
            </article>
        </section>    <!-- #one -->    
        
        <section id="two" class="clearfix">
            <article class="left quote">
                <div class="inner">
                    <div class="d-340x70">
                         <div id="title" class="font title <?=$this->data['color']?>"><?=$this->data['title']?></div>
                        <span style="display: none;" class="label">Topic</span>
                        <a href="javascript:changetitle()" class="ir edit text">Edit Text</a>
                    </div>
                    <div class="d-340x190">
                        <div id="detail" class="font detail <?=$this->data['color']?>"><?=$this->data['description']?></div>
                        <span style="display: none;" class="label">Detail</span>
                        <a href="javascript:changedetail()" class="ir edit text">Edit Text</a>
                    </div>
                </div>
            </article>
            <article class="right">
                <div class="d-460x309">
                    <div id="460x309x0"></div>
                    <div id="textx460x309x0" class="portfolioItemInfo"></div>
                    <span class="label">460 X 309</span>
                    <a href="javascript:changeimage('460x309x0')"  class="ir edit img">Edit Image</a>
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
                    <a href="javascript:changeimage('220x160x0','group2')"  class="ir edit img">Edit Image</a>

                </div>
                <div class="d-220x160">
                    <div id="220x160x1"></div>
                    <div id="textx220x160x1" class="portfolioItemInfo"></div>
                    <span class="label">220 X 160</span>
                    <a href="javascript:changeimage('220x160x1','group2')"  class="ir edit img">Edit Image</a>

                </div>
                <div class="d-220x160">
                    <div id="220x160x2"></div>
                    <div id="textx220x160x2" class="portfolioItemInfo"></div>
                    <span class="label">220 X 160</span>
                    <a href="javascript:changeimage('220x160x2','group2')"  class="ir edit img">Edit Image</a>

                </div>
                <div class="d-220x160">
                     <div id="220x160x3"></div>
                     <div id="textx220x160x3" class="portfolioItemInfo"></div>
                    <span class="label">220 X 160</span>
                    <a href="javascript:changeimage('220x160x3','group2')"  class="ir edit img">Edit Image</a>

                </div>
                <div class="d-220x160">
                     <div id="220x160x4"></div>
                     <div id="textx220x160x4" class="portfolioItemInfo"></div>
                    <span class="label">220 X 160</span>
                    <a href="javascript:changeimage('220x160x4','group2')"  class="ir edit img">Edit Image</a>

                </div>
                <div class="d-220x160">
                     <div id="220x160x5"></div>
                     <div id="textx220x160x5" class="portfolioItemInfo"></div>
                    <span class="label">220 X 160</span>
                    <a href="javascript:changeimage('220x160x5','group2')"  class="ir edit img">Edit Image</a>

                </div>
            </article>
            <article class="right">
                <div id="social">
                    <p>
                     <?php include(fullpathtemp2."/button.php"); ?>
                    </p>
                    <ul class="h">
                      <?php include(fullpathtemp2."/share.php"); ?> 
                    </ul>
                </div>
                
                <h3>Time work</h3>
                <div class="d-340x60">
                    <div id="daterange" class="font time <?=$this->data['color']?>"><?=$this->data['daterange']?></div>
                    <a  href="javascript:changedaterange()" class="ir edit text">Edit Text</a>
                </div>
                

                <div class="d-340x113">
                
                <?php include(fullpathtemp2."/contact.php"); ?>
                </div>
                <a id="branch" href="javascript:changememorize();" class="button black2">Memorize</a>
            </article>
        </section>    <!-- #three -->
        
        <section id="four" class="clearfix">
            <article class="left">
                <h3>Vdo And Gallery</h3>
              <?php include(fullpathtemp2."/vdo.php"); ?>
            </article>
            
            <article class="right">
                <h3>Map</h3>
                
               <?php include(fullpathtemp2."/map.php"); ?> 
            </article>
        </section>    <!-- #four -->
        <?php include(fullpathtemp2."/footer.php"); ?> 
      </div>
    

  <!-- JavaScript at the bottom for fast page loading -->
    <?php include(fullpathtemp2."/script.php"); ?> 
    <!-- end scripts -->
</body>
</html>
