/* Author:

*/
$(window).unload(function() {
  
  GUnload();
});
$(document).ready(function() {
    load();
    document.domain=$("#subdir").html();
   $(".ir.edit.img").fancybox({
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
                'onComplete'    :    function() {
                  
                },
                'href':$("#homeinfo").html()+'/popup2/savebg/'+$("#landingpage").html()+'/'+$("#shopurl").html()
            });  
$(".ir.edit.text").fancybox({
                'autoScale'            : true,
                'transitionIn'        : 'none',
                'transitionOut'        : 'none',
                'type'                : 'iframe',
                'scrolling'   : 'no'

});             
            
            
            
                      
$(".ir.button").click(function() {

  if($(this).attr('class').search(new RegExp(/white/i))!=-1)
  {

          $('body').removeClass('black');
          $('body').addClass('white');
          
     $('#title').removeClass('black');
      $('#title').addClass('white');
          
      $('#detail').removeClass('black');
      $('#detail').addClass('white');
      
      $('#time').removeClass('black');
      $('#time').addClass('white');
          
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
      
      $('#time').removeClass('white');
      $('#time').addClass('black');
          
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



