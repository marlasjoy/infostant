<?php include(fullpathtemp2."/head.php"); ?> 
        <script  src="<?=homeinfo?>/js/shop/mylibs/stone_sans_450.font.js"></script>
        <script>Cufon.replace('#main h3', { fontFamily: 'stone sans', fontSize: '30px' });</script>
        <style>.cufon-loading #main h3 { visibility: hidden!important; }</style>
        
        <link rel="stylesheet" href="<?=homeinfo?>/css/shop/home/home.css" media="all" />
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
            <article class="left clearfix">
                <div class="d-220x90">
                    <span class="label">220 X 90</span>
                    <div id="220x90x0"></div>
                    <div id="textx220x90x0" style="display: none;" class="portfolioItemInfo"></div>
                    <a href="javascript:changeimage('220x90x0')" class="ir edit img">Edit Image</a>
                </div>
                    <?php include(fullpathtemp2."/button.php"); ?>
            </article>
            <article class="right">
                <div id="social">
                    <ul class="h">
                        <?php include(fullpathtemp2."/share.php"); ?>
                    </ul>
                </div>
            </article>
        </section>    <!-- #one -->    
        
        <section id="two" class="clearfix">
            <article class="left">
                <div class="d-460x477">
                    <span class="label">460 X 477</span>
                    <div id="460x477x0"></div>
                    
                    <div id="textx460x477x0"  class="portfolioItemInfo"></div>
                    <a href="javascript:changeimage('460x477x0')" class="ir edit img">Edit Image</a>
                </div>    
            </article>
            <article class="right">
                <h3>Special Menu</h3>
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <div class="d-208x148">
                                    <span class="label">208 X 148</span>
                                    <div id="208x148x0"></div>
                                    
                                    <a href="javascript:changeimage('208x148x0','group1')" class="ir edit img">Edit Image</a>
                                </div>
                                <div class="d-220x38">
                                     <div id="textx208x148x0"  ></div>
                                </div>
                            </td>
                            <td>
                                <div class="d-208x148">
                                    <span class="label">208 X 148</span>
                                    <div id="208x148x1"></div>
                            
                                    <a href="javascript:changeimage('208x148x1','group1')" class="ir edit img">Edit Image</a>
                                </div>
                                <div class="d-220x38">
                                     <div id="textx208x148x1" ></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-208x148">
                                    <span class="label">208 X 148</span>
                                    <div id="208x148x2"></div>
                                    
                                    <a href="javascript:changeimage('208x148x2','group1')" class="ir edit img">Edit Image</a>
                                </div>
                                <div class="d-220x38">
                                     <div id="textx208x148x2"  ></div>
                                </div>
                            </td>
                            <td>
                                <div class="d-208x148">
                                    <span class="label">208 X 148</span>
                                    <div id="208x148x3"></div>
                                   
                                    <a href="javascript:changeimage('208x148x3','group1')" class="ir edit img">Edit Image</a>
                                </div>
                                <div class="d-220x38">
                                     <div id="textx208x148x3" ></div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </article>
        </section>    <!-- #two -->    
        
        <section id="three" class="clearfix">
            <article class="left quote">
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
            </article>
                <article class="right">
                <h3>Vdo And Gallery</h3>
               <?php include(fullpathtemp2."/vdo.php"); ?>
            </article>
        </section>    <!-- #three -->
        
        <section id="four" class="clearfix">
            <article class="left">
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
