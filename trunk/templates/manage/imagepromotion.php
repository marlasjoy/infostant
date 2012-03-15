<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <title>Galleriffic | Custom layout with external controls</title>
        <link rel="stylesheet" href="<?=homeinfo?>/css/manage/basic.css" type="text/css" />
        <link rel="stylesheet" href="<?=homeinfo?>/css/manage/galleriffic-5.css" type="text/css" />
        
        <!-- <link rel="stylesheet" href="css/white.css" type="text/css" /> -->
        <link rel="stylesheet" href="<?=homeinfo?>/css/manage/black.css" type="text/css" />
        <link href="<?=homeinfo?>/js/popup/uploadify/uploadify.css" type="text/css" rel="stylesheet" />
            <script type="text/javascript" src="<?=homeinfo?>/js/popup/uploadify/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="<?=homeinfo?>/js/manage/jquery.history.js"></script>
        <script type="text/javascript" src="<?=homeinfo?>/js/manage/jquery.galleriffic.js"></script>
        <script type="text/javascript" src="<?=homeinfo?>/js/manage/jquery.opacityrollover.js"></script>
        <script type="text/javascript" src="<?=homeinfo?>/js/popup/uploadify/swfobject.js"></script>
        <script type="text/javascript" src="<?=homeinfo?>/js/popup/uploadify/jquery.uploadify.v2.1.4.min.js"></script>
        <!-- We only want the thunbnails to display when javascript is disabled -->
        <script type="text/javascript">
            document.write('<style>.noscript { display: none; }</style>');
            document.domain="<?=domain?>";
        </script>

    </head>
    <body>
        <div id="page">
            <div id="container">
                <h1><a href="#">Infostant Gallery Promotion</a></h1>
              

                <!-- Start Advanced Gallery Html Containers -->                
                <div class="navigation-container">
                    <div id="thumbs" class="navigation">
                        <a class="pageLink prev" style="visibility: hidden;" href="#" title="Previous Page"></a>
                    
                        <ul id="queuefinish" class="thumbs noscript">
                            <?=$this->data['table']?>
                        </ul>
                        <a class="pageLink next" style="visibility: hidden;" href="#" title="Next Page"></a>
                    </div>
                </div>
                <div class="content">
                    <div class="slideshow-container">
                        <div id="controls" class="controls"></div>
                        <?if($this->data['table']){?>
                        <div id="loading" class="loader"></div>
                          <?}?>
                        <div id="slideshow" class="slideshow"></div>
                    </div>
                    <div id="caption" class="caption-container">
                        <div class="photo-index"></div>
                    </div>
                </div>
                <!-- End Gallery Html Containers -->
                <div style="clear: both;"></div><br>
                <div style="float: left;  margin-right: 5px"><h2>อัพโหลดรูปขึ้นเวป</h2></div><div style="float: left;"><input id="file_upload"  name="file_upload" type="file" /></div>
                <div style="float: left;"><div  id="queue"></div></div>
                
            </div>
        </div>
        <div id="footer">Copyright © 2011 All Rights Reserved.</div>
        <script type="text/javascript">
                        var onMouseOutOpacity = 0.67;
                $('#thumbs ul.thumbs li, div.navigation a.pageLink').opacityrollover({
                    mouseOutOpacity:   onMouseOutOpacity,
                    mouseOverOpacity:  1.0,
                    fadeSpeed:         'fast',
                    exemptionSelector: '.selected'
                });
        document.domain="<?=domain?>";
          var gallery;
                           function deleteimage(imagename,index)
                          {
            if(confirm('ต้องการลบรูปนี้หรือไม่'))
      {  
         $.post('<?=homeinfo?>/ajax/deletefile2','filename='+imagename+'&folder=<?=$this->data['folder']?>', function(reposnse)         {
           eval("var obj1="+reposnse); 
           alert(obj1.resposne);

           $("#queuefinish").html(obj1.table); 
           reloadpage();
        //   gallery.gotoIndex(0);
        
       }); 
       
      }
            
            }
                            function insertimage(filename,k)
                            {
        
         

                            $('.button').attr("disabled", "true");
                            $('.button').val('กำลังบันทึก...');
       
                            var checked = $('#check-'+k).attr('checked');
                            var alt = $('#alt-'+k).val();
                            var thumb=0;
                            if(checked)
                            {
                            thumb=1;
                            }
       $.post('<?=homeinfo?>/ajax/saveimagefile3','alt='+alt+'&thumb='+thumb+'&resize=<?=$this->data['resize']?>&group=<?=$this->data['group']?>&target=<?=$this->data['target']?>&filename='+filename+'&folder=<?=$this->data['folder']?>&sid=<?=$this->data['sid']?>', function(reposnse)     {
           eval("var obj1="+reposnse); 
                     //  $('#textx<?=$this->data['resize']?>',parent.document.body).html($('#alt-'+k).val());         
                   
                       $('#<?=$this->data['resize']?>',parent.document.body).html(obj1.imgstr);
                     //  parent.window.setgalleryimg();
                       parent.$.fancybox.close();
       });
        
        
      


                            }
            
                            function reloadpage()
                            {
                      gallery = $('#thumbs').galleriffic({
                    delay:                     2500,
                    numThumbs:                 9,
                    preloadAhead:              9,
                    enableTopPager:            false,
                    enableBottomPager:         false,
                    imageContainerSel:         '#slideshow',
                    controlsContainerSel:      '#controls',
                    captionContainerSel:       '#caption',
                    loadingContainerSel:       '#loading',
                    renderSSControls:          true,
                    renderNavControls:         true,
                    playLinkText:              'Play Slideshow',
                    pauseLinkText:             'Pause Slideshow',
                    prevLinkText:              '&lsaquo; Previous Photo',
                    nextLinkText:              'Next Photo &rsaquo;',
                    nextPageLinkText:          'Next &rsaquo;',
                    prevPageLinkText:          '&lsaquo; Prev',
                    enableHistory:             true,
                    autoStart:                 false,
                    syncTransitions:           true,
                    defaultTransitionDuration: 900,
                    onSlideChange:             function(prevIndex, nextIndex) {
                        // 'this' refers to the gallery, which is an extension of $('#thumbs')
                        this.find('ul.thumbs').children()
                            .eq(prevIndex).fadeTo('fast', onMouseOutOpacity).end()
                            .eq(nextIndex).fadeTo('fast', 1.0);

                        // Update the photo index display
                        this.$captionContainer.find('div.photo-index')
                            .html('Photo '+ (nextIndex+1) +' of '+ this.data.length);
                    },
                    onPageTransitionOut:       function(callback) {
                        this.fadeTo('fast', 0.0, callback);
                    },
                    onPageTransitionIn:        function() {
                        var prevPageLink = this.find('a.prev').css('visibility', 'hidden');
                        var nextPageLink = this.find('a.next').css('visibility', 'hidden');
                        
                        // Show appropriate next / prev page links
                        if (this.displayedPage > 0)
                            prevPageLink.css('visibility', 'visible');

                        var lastPage = this.getNumPages() - 1;
                        if (this.displayedPage < lastPage)
                            nextPageLink.css('visibility', 'visible');

                        this.fadeTo('fast', 1.0);
                    }
                });

                /**************** Event handlers for custom next / prev page links **********************/

                gallery.find('a.prev').click(function(e) {
                    gallery.previousPage();
                    e.preventDefault();
                });

                gallery.find('a.next').click(function(e) {
                    gallery.nextPage();
                    e.preventDefault();
                });
                                $.historyInit(pageload, "advanced.html");
                                
                } 
                
                           function pageload(hash) 
                            {
                    // alert("pageload: " + hash);
                    // hash doesn't contain the first # character.
                  //   alert('');

                  //  alert('');
                    if(hash) {
                        $.galleriffic.gotoImage(hash);
                    } else {
                        gallery.gotoIndex(0);
                    }
                    
                }
           
            jQuery(document).ready(function($) {
                
                // We only want these styles applied when javascript is enabled
                $('div.content').css('display', 'block');
                 
                 
                 


                 
                 
                 
                // Initially set opacity on thumbs and add
                // additional styling for hover effect on thumbs

                <?if($this->data['table']){?>
                // Initialize Advanced Galleriffic Gallery
                reloadpage();
               
  <?}?>
                /****************************************************************************************/

                /**** Functions to support integration of galleriffic with the jquery.history plugin ****/

                // PageLoad function
                // This function is called when:
                // 1. after calling $.historyInit();
                // 2. after calling $.historyLoad();
                // 3. after pushing "Go Back" button of a browser
                
                

                
                
                
                
                // Initialize history plugin.
                // The callback is called at once by present location.hash. 


                // set onlick event for buttons using the jQuery 1.3 live method
                $("a[rel='history']").live('click', function(e) {
                    if (e.button != 0) return true;

                    var hash = this.href;
                    hash = hash.replace(/^.*#/, '');

                    // moves to a new page. 
                    // pageload is called at once. 
                    // hash don't contain "#", "?"
                    $.historyLoad(hash);

                    return false;
                });

                /****************************************************************************************/
                
                $('#file_upload').uploadify({
        'uploader'  : '<?=homeinfo?>/js/popup/uploadify/uploadify.swf',
        'script'    : '<?=homeinfo?>/ajax/uploadfile4',
        'cancelImg' : '<?=homeinfo?>/js/popup/uploadify/cancel.png',
        'folder'    : '<?=$this->data['folder']?>',
        'fileExt'     : '*.jpg',
        'fileDesc'    : 'Image Files',
        'multi'       : true,
        'auto'      : true,
        'height'          : 37, // The height of the flash button
        'width'           : 150,
        'wmode':'transparent',
        'queueID'  : 'queue',
         'onComplete'  : function(event, queueID, fileObj, reposnse, data)
                    {
                     //   alert(reposnse);
                      eval("var obj1="+reposnse); 
                       
                      // arraydata[queueID]=obj1.file_name;
                       //                     alert(obj1.table);  
                    $("#queuefinish").html(obj1.table); 
                       
                     reloadpage(); 
                   //  gallery.gotoIndex(0);  

                    }
      });
                
            });
        </script>
    </body>
</html>