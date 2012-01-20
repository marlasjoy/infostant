<?php include(fullpathtemp2."/head.php"); ?>         
        <script  src="<?=homeinfo?>/js/shop/mylibs/Trade_Gothic_400.font.js"></script>
          <script>Cufon.replace('#main h3', { fontFamily: 'Trade Gothic', fontSize: '34px' });</script>
        <style>.cufon-loading #main h3 { visibility: hidden!important; }</style>
        
        <link rel="stylesheet" href="<?=homeinfo?>/css/shop/seminar/seminar.css" media="all" />
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
            <div class="d-940x308">
                <span class="label">940 X 308</span>

                     <div id="940x308x0"></div>
                    
                    <div id="textx940x308x0"  class="portfolioItemInfo"></div>
                    <a href="javascript:changeimage('940x308x0')" class="ir edit img">Edit Image</a>
            </div>
            <div class="d-220x90">
                    <span class="label">220 X 90</span>
                    <div id="220x90x0"></div>
                    <div id="textx220x90x0" style="display: none;" class="portfolioItemInfo"></div>
                    <a href="javascript:changeimage('220x90x0')" class="ir edit img">Edit Image</a>
                </div>
        </section>    <!-- #one -->    
        
        <section id="two" class="clearfix">
            <article class="left">
                <div class="d-460x162">
                    <span class="label">460 X 162</span>
                    <div id="460x162x0"></div>
                    <div id="textx460x162x0"  class="portfolioItemInfo"></div>
                    <a href="javascript:changeimage('460x162x0','group1')" class="ir edit img">Edit Image</a>
                </div>
            </article>
            <article class="right">
                <div class="d-460x162">
                    <span class="label">460 X 162</span>
                    <div id="460x162x1"></div>
                    <div id="textx460x162x1"  class="portfolioItemInfo"></div>
                    <a href="javascript:changeimage('460x162x1','group1')" class="ir edit img">Edit Image</a>
                </div>
            </article>
        </section>
        
        <section id="three" class="clearfix">
            <article class="quote">
                <div class="inner">
                    <div id="topic" class="d-820x50">
                        <span class="label">Topic</span>
                        <div id="title" class="font title <?=$this->data['color']?>"><?=$this->data['title']?></div>
                         <a  href="javascript:changetitle()" class="ir edit text">Edit Text</a>
                    </div>
                    <div id="detail" class="d-820x70">
                        <span class="label">Detail</span>
                        <div id="detail" class="font detail <?=$this->data['color']?>"><?=$this->data['description']?></div>
                        <a  href="javascript:changedetail()" class="ir edit text">Edit Text</a>
                    </div>
                </div>
            </article>
        </section>    <!-- #two -->    
        
        <section id="three" class="clearfix">
            <article>
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <div class="d-208x148">
                                    
                                    <span class="label">208 X 148</span>
                                    <div id="208x148x0"></div>

                                    <a href="javascript:changeimage('208x148x0','group2')" class="ir edit img">Edit Image</a>
                                </div>
                                <div class="d-220x38">
                                    <div id="textx208x148x0"  class="portfolioItemInfo"></div> 
                                </div>
                            </td>
                            <td>
                                <div class="d-208x148">
                                    
                                    <span class="label">208 X 148</span>
                                    <div id="208x148x1"></div>

                                    <a href="javascript:changeimage('208x148x1','group2')" class="ir edit img">Edit Image</a>
                                </div>
                                <div class="d-220x38">
                                    <div id="textx208x148x1"  class="portfolioItemInfo"></div>  
                                </div>
                            </td>
                            <td>
                                <div class="d-208x148">
                                    
                                    <span class="label">208 X 148</span>
                                    <div id="208x148x2"></div>

                                    <a href="javascript:changeimage('208x148x2','group2')" class="ir edit img">Edit Image</a>
                                </div>
                                <div class="d-220x38">
                                    <div id="textx208x148x2"  class="portfolioItemInfo"></div>
                                </div>
                            </td>
                            <td>
                                <div class="d-208x148">
                                    
                                    <span class="label">208 X 148</span>
                                    <div id="208x148x3"></div>

                                    <a href="javascript:changeimage('208x148x3','group2')" class="ir edit img">Edit Image</a>
                                </div>
                                <div class="d-220x38">
                                    <div id="textx208x148x3"  class="portfolioItemInfo"></div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </article>
        </section>    <!-- #three -->
        
      
        
        <section id="five" class="clearfix">
            <article class="left">
                <h3>Vdo And Gallery</h3>
<?php include(fullpathtemp2."/vdo.php"); ?>
                <div id="social">
                    <p>
<?php include(fullpathtemp2."/button.php"); ?>
                    </p>
                    <ul class="h">
                        <?php include(fullpathtemp2."/share.php"); ?>
                    </ul>
                </div>
            </article>
            
            <article class="right">
                <h3>Contact</h3>
                <div class="d-340x113">
                 <?php include(fullpathtemp2."/contact.php"); ?>
                                 </div>
                <a id="branch" href="javascript:changememorize();" class="button black2">Memorize</a>
                
                <h3>Map</h3>
<?php include(fullpathtemp2."/map.php"); ?>
                
            </article>
        </section>    <!-- #five -->
        
        <section id="five" class="clearfix">
            <article class="left">
                
                
            </article>
            <article class="right">
                
            </article>
        </section> <!-- #five -->
        
        <?php include(fullpathtemp2."/footer.php"); ?>   
      </div>
    

  <!-- JavaScript at the bottom for fast page loading -->
    <?php include(fullpathtemp2."/script.php"); ?> 
    
  <!-- end scripts -->
</body>
</html>
