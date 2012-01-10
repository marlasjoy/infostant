/* Author:

*/

$(document).ready(function() {
    
   // $('li.item-a').parent()    .
    $('#map').parent().append('<a class="ir zoom" target="_blank" href="http://'+$("#shopurl").html()+'.'+$("#subdir").html()+'/map">Edit Text</a>');    
   
    $("#branch").hide();
    //$('img[src="RSS Feed"]').css("display","none");
    $('img[alt="RSS Feed"]').parent().parent().remove();   
    var access=$("#access").html();
    var checklogin=$("#checklogin").html();
    $("#emailshop").css("cursor","pointer");
  
    $("#website").css("cursor","pointer");
    $("#website").live('click', function() {
           window.open($(this).html(),'height=450,width=550');
        
    
    }); 
    
    if(access=="")
    {
      $("span.label").hide();
      $("#checkbg").hide();  
       $(".ir.edit").hide();
       $("label[for='bg']").hide();
       $(".ir.button").hide();
       $("label[for='language']").html('Select Language');
       $("label[for='language']").attr('style','top:10px');

    }
    onLoadMaps();
    document.domain=$("#subdir").html();
    setgalleryimg();
    $("#fav").live('click', function() {
    if(checklogin)
    {
        if(confirm('ต้องการเก็บเป็นรายการโปรดหรือไม่'))
        {
            $.fancybox({
                'width'                : '20%',
                'height'            : '20%',
                'autoScale'            : false,
                'transitionIn'        : 'none',
                'transitionOut'        : 'none',
                'type'                : 'iframe',
                'href':$("#homeinfo").html()+'/popup2/savefav/'+$("#landingpage").html()+'/'+$("#shopurl").html()
            });
        }else
        {
            return false;
        }
        
        
    }else
    {
        alert('กรุณา login ก่อน');
        return false;
    }
    });
    $("#like").click(function() {
        if(checklogin)
    {
        if(confirm('ต้องการ Like เว็บนี้หรือไม่'))
        {
            $.fancybox({
                'width'                : '20%',
                'height'            : '20%',
                'autoScale'            : false,
                'transitionIn'        : 'none',
                'transitionOut'        : 'none',
                'type'                : 'iframe',
                'href':$("#homeinfo").html()+'/popup2/savelike/'+$("#landingpage").html()+'/'+$("#shopurl").html()
            });
        }else
        {
            return false;
        }
        
        
    }else
    {
        alert('กรุณา login ก่อน');
        return false;
    }    
    });
   $(".ir.edit.img").fancybox({
                'width'                : '75%',
                'height'                : '75%',
                'autoScale'            : false,
                'transitionIn'        : 'none',
                'transitionOut'        : 'none', 
                'autoDimensions':true,
                'type'                : 'iframe'
            }); 
     $(".social").fancybox({
                'width'                : '75%',
                'height'            : '75%',
                'autoScale'            : false,
                'transitionIn'        : 'none',
                'transitionOut'        : 'none',

                'type'                : 'iframe'
            });        
$(".ir.button").fancybox({
                'width'                : '20%',
                'height'            : '20%',
                'autoScale'            : false,
                'transitionIn'        : 'none',
                'transitionOut'        : 'none',
                'type'                : 'iframe',

                'href':$("#homeinfo").html()+'/popup2/savebg/'+$("#landingpage").html()+'/'+$("#shopurl").html()
            });  
$(".ir.edit.text").fancybox({
                'autoScale'            : true,
                'transitionIn'        : 'none',
                'transitionOut'        : 'none',
                'type'                : 'iframe',
                'scrolling'   : 'no'

}); 
$(".ir.edit.map").fancybox({
                'width'                : '100%',
                'height'            : '100%',
                'autoScale'            : false,
                'transitionIn'        : 'none',
                'transitionOut'        : 'none',
                'type'                : 'iframe',

                'scrolling'   : 'no',
                 'href':$("#homeinfo").html()+'/editmap/savebg/'+$("#landingpage").html()+'/'+$("#shopurl").html()
            

});   
$(".ir.edit.vdo").fancybox({
                'autoScale'            : true,
                'transitionIn'        : 'none',
                'transitionOut'        : 'none',
                'type'                : 'iframe',
 
                'scrolling'   : 'no',
                'href':$("#homeinfo").html()+'/popup4/video/'+$("#landingpage").html()+'/'+$("#shopurl").html()
            });  
//if($('#videotext').html())
//{
//$('#video').youTubeEmbed({
//    video            : $('#videotext').html(),
//    width            : 446,         // Height is calculated automatically
//    height           : 300
//    
//    
//});    
//}     
            
            
          
                      
$(".ir.button").click(function() {

  if($(this).attr('class').search(new RegExp(/white/i))!=-1)
  {

          $('body').removeClass('black');
          $('body').addClass('white');
          
     $('#title').removeClass('black');
      $('#title').addClass('white');
          
      $('#detail').removeClass('black');
      $('#detail').addClass('white');
      
      $('#daterange').removeClass('black');
      $('#daterange').addClass('white');
          
      $('#contact').removeClass('black');
      $('#contact').addClass('white');
    
     // alert('white');
  }
  else
  {
      $('body').removeClass('white');
      $('body').addClass('black');
      
      $('#title').removeClass('white');
      $('#title').addClass('black');
          
      $('#detail').removeClass('white');
      $('#detail').addClass('black');
      
      $('#daterange').removeClass('white');
      $('#daterange').addClass('black');
          
      $('#contact').removeClass('white');
      $('#contact').addClass('black');
    // alert('black'); 
  }

   // location.href='/'+this.val();
    
});
            
            
            
            
            



//  var a = $("div .d-220x90");
//  var b = $("div .d-100x110");
//  var c = $("div .d-460x309");
//  var d = $("div .d-220x160");

//   
//    $(a.selector+", "+b.selector+", "+c.selector+", "+d.selector).hover(function() {
//      $(this).children(".portfolioItemInfo").stop().animate({bottom: "4"}, 'slow');
//    },
//    function() {
//      $(this).children(".portfolioItemInfo").stop().animate({bottom: "-85"}, 'slow');
//    });

  


});

function setyoutube(val)
{
    $('#videotext').html('<iframe width="446" height="300" id="video"  src="http://www.youtube.com/embed/'+$.trim(val)+'?wmode=transparent" frameborder="0" allowfullscreen></iframe>');
   
    
}

function setgalleryimg()
{
    $("a.galleryimg").fancybox();
}



