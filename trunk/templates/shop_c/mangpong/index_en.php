<?php include(fullpathtemp."/head.php"); ?> 
        <script  src="<?=homeinfo?>/js/shop/mylibs/spring_italic_400.font.js"></script>
          <script>Cufon.replace('#main h3', { fontFamily: 'spring', fontSize: '34px' });</script>
        <style>.cufon-loading #main h3 { visibility: hidden!important; }</style>
        
        <link rel="stylesheet" href="<?=homeinfo?>/css/shop/service/service.css" media="all" />
</head>
<body class="backend">
      <header>
        <?php include(fullpathtemp."/header.php"); ?>
        <section id="color">
            <div class="inner">
                <h2 class="ir">Service</h2>
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
            <div class="d-460x260">
                <span class="label">460 X 260</span>
                   <div id="460x260x0"></div>
                    <div id="textx460x260x0" class="portfolioItemInfo"></div>
                    <a href="<?=homeinfo.'/popup/'.$this->data['landingpage'].'/460x260x0/'.$this->data['shop']['shopurl']?>/group1" class="ir edit img">Edit Image</a>
            </div>
            <div class="d-460x260">
                <span class="label">460 X 260</span>
                <div id="460x260x1"></div>
                    <div id="textx460x260x1"  class="portfolioItemInfo"></div>
                    <a href="<?=homeinfo.'/popup/'.$this->data['landingpage'].'/460x260x1/'.$this->data['shop']['shopurl']?>/group1" class="ir edit img">Edit Image</a>
            </div>
            <div class="d-460x260">
                <span class="label">460 X 260</span>
                <div id="460x260x2"></div>
                    <div id="textx460x260x2"  class="portfolioItemInfo"></div>
                    <a href="<?=homeinfo.'/popup/'.$this->data['landingpage'].'/460x260x2/'.$this->data['shop']['shopurl']?>/group1" class="ir edit img">Edit Image</a>
            </div>
            <div class="d-460x260">
                <span class="label">460 X 260</span>
                <div id="460x260x3"></div>
                    <div id="textx460x260x3"  class="portfolioItemInfo"></div>
                    <a href="<?=homeinfo.'/popup/'.$this->data['landingpage'].'/460x260x3/'.$this->data['shop']['shopurl']?>/group1" class="ir edit img">Edit Image</a>
            </div>
            <div class="d-220x90">
                    <span class="label">220 X 90</span>
                    <div id="220x90x0"></div>
                    <div id="textx220x90x0" style="display: none;" class="portfolioItemInfo"></div>
                    <a href="<?=homeinfo.'/popup/'.$this->data['landingpage'].'/220x90x0/'.$this->data['shop']['shopurl']?>" class="ir edit img">Edit Image</a>
                </div>
        </section>    <!-- #one -->    
        
        <section id="two" class="clearfix">
            <article class="quote">
                <div class="inner">
                    <div id="topic" class="d-820x50">
                        <span class="label">Topic</span>
                        <div id="title" class="font title black"><?=$this->data['title']?></div>
                         <a  href="<?=homeinfo.'/popup3/'.$this->data['landingpage'].'/title/'.$this->data['shop']['shopurl']?>" class="ir edit text">Edit Text</a>
                    </div>
                    <div  class="d-820x70">
                        <span class="label">Detail</span>
                         <div id="detail" class="font detail black"><?=$this->data['description']?></div>
                        <a  href="<?=homeinfo.'/popup3/'.$this->data['landingpage'].'/detail/'.$this->data['shop']['shopurl']?>" class="ir edit text">Edit Text</a>
                    </div>
                </div>
            </article>
        </section>    <!-- #two -->    
        
        <section id="three" class="clearfix">
            <article>
                <h3>Our Service</h3>
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <div class="d-208x148">
                                    
                                    <span class="label">208 X 148</span>
                                    <div id="208x148x0"></div>
                  
                    <a href="<?=homeinfo.'/popup/'.$this->data['landingpage'].'/208x148x0/'.$this->data['shop']['shopurl']?>/group2" class="ir edit img">Edit Image</a>
                                </div>
                                <div class="d-220x38">
                                      <div id="textx208x148x0" ></div>
                                </div>
                            </td>
                            <td>
                                <div class="d-208x148">
                                    
                                    <span class="label">208 X 148</span>
                                    <div id="208x148x1"></div>
                  
                    <a href="<?=homeinfo.'/popup/'.$this->data['landingpage'].'/208x148x1/'.$this->data['shop']['shopurl']?>/group2" class="ir edit img">Edit Image</a>

                                </div>
                                <div class="d-220x38">
                                    <div id="textx208x148x1" ></div>
                                </div>
                            </td>
                            <td>
                                <div class="d-208x148">
                                    
                                    <span class="label">208 X 148</span>
                                    <div id="208x148x2"></div>
                  
                    <a href="<?=homeinfo.'/popup/'.$this->data['landingpage'].'/208x148x2/'.$this->data['shop']['shopurl']?>/group2" class="ir edit img">Edit Image</a>
                                </div>
                                <div class="d-220x38">
                                    <div id="textx208x148x2" ></div>
                                </div>
                            </td>
                            <td>
                                <div class="d-208x148">
                                    
                                    <span class="label">208 X 148</span>
                                    <div id="208x148x3"></div>
                  
                    <a href="<?=homeinfo.'/popup/'.$this->data['landingpage'].'/208x148x3/'.$this->data['shop']['shopurl']?>/group2" class="ir edit img">Edit Image</a>
                                </div>
                                <div class="d-220x38">
                                    <div id="textx208x148x3" ></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="d-208x148">
                                    
                                    <span class="label">208 X 148</span>
                                    <div id="208x148x4"></div>
                  
                    <a href="<?=homeinfo.'/popup/'.$this->data['landingpage'].'/208x148x4/'.$this->data['shop']['shopurl']?>/group2" class="ir edit img">Edit Image</a>
                                </div>
                                <div class="d-220x38">
                                    <div id="textx208x148x4" ></div>
                                </div>
                            </td>
                            <td>
                                <div class="d-208x148">
                                    
                                    <span class="label">208 X 148</span>
                                    <div id="208x148x5"></div>
                  
                    <a href="<?=homeinfo.'/popup/'.$this->data['landingpage'].'/208x148x5/'.$this->data['shop']['shopurl']?>/group2" class="ir edit img">Edit Image</a>
                                </div>
                                <div class="d-220x38">
                                    <div id="textx208x148x5" ></div>
                                </div>
                            </td>
                            <td>
                                <div class="d-208x148">
                                    
                                    <span class="label">208 X 148</span>
                                    <div id="208x148x6"></div>
                  
                    <a href="<?=homeinfo.'/popup/'.$this->data['landingpage'].'/208x148x6/'.$this->data['shop']['shopurl']?>/group2" class="ir edit img">Edit Image</a>
                                </div>
                                <div class="d-220x38">
                                    <div id="textx208x148x6" ></div>
                                </div>
                            </td>
                            <td>
                                <div class="d-208x148">
                                    
                                    <span class="label">208 X 148</span>
                                    <div id="208x148x7"></div>
                  
                    <a href="<?=homeinfo.'/popup/'.$this->data['landingpage'].'/208x148x7/'.$this->data['shop']['shopurl']?>/group2" class="ir edit img">Edit Image</a>
                                </div>
                                <div class="d-220x38">
                                    <div id="textx208x148x7" ></div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </article>
        </section>    <!-- #three -->
        
        <section id="four" class="clearfix">
            <article class="left">
                <h3>Time work</h3>
                <div class="d-340x60">
                <div id="time" class="font time black">
                 <div id="daterange" class="font time black"><?=$this->data['daterange']?></div>
                    <a  href="<?=homeinfo.'/popup3/'.$this->data['landingpage'].'/daterange/'.$this->data['shop']['shopurl']?>" class="ir edit text">Edit Text</a>
                </div>
                  </div>
                <h3>Contact</h3>
                <div class="d-340x113">
                <div id="contact" class="font contact black"> <span id="title-address">Address</span> :<span id="address"><?=$this->data['address']?></span> <br>
                <span id="title-tel">Tel</span>:<span id="tel"><?=$this->data['tel']?></span><br>
               <span id="title-emailshop">Email</span> : <span id="emailshop"><?=$this->data['emailshop']?></span><br>
                <span id="title-website">Website</span> : <span id="website"><?=$this->data['website']?></span></div>
                    <a href="<?=homeinfo.'/popup5/'.$this->data['landingpage'].'/address-tel-emailshop-website/'.$this->data['shop']['shopurl']?>" class="ir edit text">Edit Text</a>
                </div>
                <a href="javascript:void(0);" id="branch" class="button black2">Branch</a>
            </article>
            
            <article class="right">
                <h3>Clip Review</h3>
                <div id="clip">
                <div id="videotext">
                  
                </div>
                    <span class="label">Upload Clip VDO</span>
                    <a href="javascript:void(0);" class="ir edit vdo">Edit VDO</a>
                </div>
            </article>
        </section>    <!-- #four -->
        
        <section id="five" class="clearfix">
            <article class="left">
                <h3>Map</h3>
                <div>
                <div id="map">
                    <span class="label">Add address apply to Google Map</span>
                    
                </div>
                <a href="javascript:void(0);" class="ir edit map">Edit Text</a>
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
            </article>
        </section> <!-- #five -->
        
        <?php include(fullpathtemp."/footer.php"); ?>  
      </div>
    

  <!-- JavaScript at the bottom for fast page loading -->
    <?php include(fullpathtemp."/script.php"); ?> 
    
  <!-- end scripts -->
</body>
</html>
