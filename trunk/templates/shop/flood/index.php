<?php include(fullpathtemp."/head_flood.php"); ?> 
        <script  src="<?=homeinfo?>/js/shop/mylibs/spring_italic_400.font.js"></script>
          <script>Cufon.replace('#main h3', { fontFamily: 'spring', fontSize: '34px' });</script>
        <style>.cufon-loading #main h3 { visibility: hidden!important; }</style>
        
        <link rel="stylesheet" href="<?=homeinfo?>/css/shop/flood/flood.css" media="all" />
</head>
<body class="backend">
      <header>
        <?php include(fullpathtemp."/header_flood.php"); ?>
        <section id="color">
            <div class="inner">
                <div style="background: url('<?=homeinfo?>/images/shop/flood/area-<?=$this->data['areaid']?>.jpg') no-repeat scroll 0 0 transparent;     float: left;     height: 44px; width: 300px;   "></div>
                <p>

                </p>
            </div>
        </section>
    </header> 
      <div id="main" role="main">
        <section id="one"  class="clearfix">
        <div class="submain">
                  <article class="right2" >
                <div class="inner">
                <div id="postname" class="d-690x62">
                   
                        <div  class="font title white"><span style="color:#029fc1 ;">ผู้โพสต์ </span> : <span id="namepost" style="color:#ea9a01 ;"><?=$this->data['namepost']?> </span>
                        </div>
                         <a  href="<?=homeinfo.'/popup3/'.$this->data['landingpage'].'/namepost/'.$this->data['shop']['shopurl']?>" class="ir edit text">Edit Text</a>
                    </div>
                    <div id="topic" class="d-690x62">

                        <div id="title" class="font title white"><?=$this->data['title']?></div>
                         <a  href="<?=homeinfo.'/popup3/'.$this->data['landingpage'].'/title/'.$this->data['shop']['shopurl']?>" class="ir edit text">Edit Text</a>
                    </div>
                    <div  class="d-690x62">

                         <div id="detail" class="font detail white"><?=$this->data['description']?></div>
                        <a  href="<?=homeinfo.'/popup3/'.$this->data['landingpage'].'/detail/'.$this->data['shop']['shopurl']?>" class="ir edit text">Edit Text</a>
                    </div>
                </div>
            </article>
        
        
        </div>

        </section>    <!-- #one -->    
        <section id="two" class="clearfix">
                <div class="d-460x260">
                <span class="label">460 X 260</span>
                   <div id="460x260x0"></div>
                    <div id="textx460x260x0" class="portfolioItemInfo"></div>
                    <a href="<?=homeinfo.'/popup/'.$this->data['landingpage'].'/460x260x0/'.$this->data['shop']['shopurl']?>/group1" class="ir edit img">Edit Image</a>
            </div>
        <div class="d-460x260">
                <span class="label">460 X 260</span>
                   <div id="460x260x1"></div>
                    <div id="textx460x260x1" class="portfolioItemInfo"></div>
                    <a href="<?=homeinfo.'/popup/'.$this->data['landingpage'].'/460x260x1/'.$this->data['shop']['shopurl']?>/group1" class="ir edit img">Edit Image</a>
            </div>
        </section>
    
        
        <section id="three" class="clearfix">
            <article>

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
                    </tbody>
                </table>
            </article>
        </section>    <!-- #three -->
        
        <section id="four" class="clearfix">
            <article class="left">            
                <span class="font headcontact white">สถานที่ต้องการความช่วยเหลือ</span>
                <div class="d-340x190">
                    <div id="contact" class="font contact white"> <span id="title-namepost2">  ชื่อผู้ติดต่อ </span>: <span id="namepost2"><?=$this->data['namepost']?></span><br>
<span id="title-shopname">ชื่อสถานที่ </span>:<span id="shopname"><?=$this->data['shopname']?></span><br>
<span id="title-address">ที่อยู่</span> : <span id="address"><?=$this->data['address']?></span><br>
<span id="title-tel">เบอร์โทร</span>:<span id="tel"><?=$this->data['tel']?></span><br>
<span id="title-emailshop">อีเมล์</span> :<span id="emailshop"><?=$this->data['emailshop']?></span><br>
</div>
<a href="<?=homeinfo.'/popup5/'.$this->data['landingpage'].'/namepost2-shopname-address-tel-emailshop/'.$this->data['shop']['shopurl']?>" class="ir edit text">Edit Text</a>
                </div>
                <div id="social">

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
            
            <article class="right">
                <span class="font headcontact white">แผนที่</span>
                <div>
                <div id="map">
                    <span class="label">Add address apply to Google Map</span>
                    
                </div>
                <a href="javascript:void(0);" class="ir edit map">Edit Text</a>
                </div>
        </section>    <!-- #four -->
        
        <!-- #five -->
        
        <?php include(fullpathtemp."/footer.php"); ?>  
      </div>
    

  <!-- JavaScript at the bottom for fast page loading -->
    <?php include(fullpathtemp."/script.php"); ?> 
    
  <!-- end scripts -->
</body>
</html>
