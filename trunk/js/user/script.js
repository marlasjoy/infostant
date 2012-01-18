/* Author:

*/

$(document).ready(function() {
    
   // $('li.item-a').parent()
    if($('#status').html()==1)
    {
        reloadgallery();
    }
    if($('#status').html()==2)
    {
        
    }
    
    if($('#lat').html()&&$('#lat').html())
    {
        initialize3();
    }
   //reloadgallery();
  setgalleryimg();  
  
});
function changecolor(color)
{
    
      //alert($('body').attr('class'));
      


      $.post($("#homeinfo").html()+'/ajax/savebg2','meid='+$("#meid").html()+'&color='+color, function(reposnse)         {


           
      $('body').removeClass($('body').attr('class').split(/\s+/).pop());
      $('body').addClass(color);
      
      
      $('#title').removeClass($('#title').attr('class').split(/\s+/).pop());
      $('#title').addClass(color);
      
      
      $('#detail').removeClass($('#detail').attr('class').split(/\s+/).pop());
      $('#detail').addClass(color);
      
      
      $('#daterange').removeClass($('#daterange').attr('class').split(/\s+/).pop());
      $('#daterange').addClass(color);
      
      $('#contact').removeClass($('#contact').attr('class').split(/\s+/).pop());
      $('#contact').addClass(color);

        
       }); 
      
     
}
function changevdo()
{
      $.fancybox({
                'width'                : '50%',
                'height'            : '50%',
                'autoScale'            : false,
                'transitionIn'        : 'none',
                'transitionOut'        : 'none',
                'type'                : 'iframe',
                'href':$("#homeinfo").html()+'/manage/writevdo/memory/'+$("#meid").html()
            });  
    
}
function changetitle()
{
      $.fancybox({
                'width'                : '50%',
                'height'            : '50%',
                'autoScale'            : false,
                'transitionIn'        : 'none',
                'transitionOut'        : 'none',
                'type'                : 'iframe',
                'href':$("#homeinfo").html()+'/manage/writetitle/memory/'+$("#meid").html()
            });  
}
function changecontact()
{
        $.fancybox({
                'width'                : '50%',
                'height'            : '50%',
                'autoScale'            : false,
                'transitionIn'        : 'none',
                'transitionOut'        : 'none',
                'type'                : 'iframe',
                'href':$("#homeinfo").html()+'/manage/writecontact/memory/'+$("#meid").html()
            }); 
}
function changedetail()
{
    $.fancybox({
                'width'                : '50%',
                'height'            : '50%',
                'autoScale'            : false,
                'transitionIn'        : 'none',
                'transitionOut'        : 'none',
                'type'                : 'iframe',
                'href':$("#homeinfo").html()+'/manage/writedescription/memory/'+$("#meid").html()
            }); 
}
function changemap()
{
    $.fancybox({
                'width'                : '100%',
                'height'            : '100%',
                'autoScale'            : false,
                'transitionIn'        : 'none',
                'transitionOut'        : 'none',
                'type'                : 'iframe',
                'href':$("#homeinfo").html()+'/manage/writemap/memory/'+$("#meid").html()
            });
}
function setpont(lat,lng)
{
    $('#lat').html(lat);
    $('#lng').html(lng);
    initialize3();
}
function changedaterange()
{
    $.fancybox({
                'width'                : '50%',
                'height'            : '50%',
                'autoScale'            : false,
                'transitionIn'        : 'none',
                'transitionOut'        : 'none',
                'type'                : 'iframe',
                'href':$("#homeinfo").html()+'/manage/writedaterange/memory/'+$("#meid").html()
            }); 
    
}
function setyoutube(val)
{
     $('#videotext').html('<iframe width="446" height="300" id="video"  src="http://www.youtube.com/embed/'+$.trim(val)+'?wmode=transparent" frameborder="0" allowfullscreen></iframe>');
   
}
function changeimage(size,group)
{
    
    if(group)
    {
     var code=size+'&'+group;   
    }else
    {
     var code=size;   
    }
    
    
    
    $.fancybox({
                'width'                : '100%',
                'height'            : '100%',
                'autoScale'            : false,
                'transitionIn'        : 'none',
                'transitionOut'        : 'none',
                'type'                : 'iframe',
                'href':$("#homeinfo").html()+'/manage/image/'+code+'/memory/'+$("#meid").html()
            });
    
}
function changevideotext()
{
    $('#videotext').html('<br><br><br><a class="button black2" href="javascript:changegallery();" id="gallery">Gallery</a><a class="button black2" href="javascript:changevdo();" id="vdogallery">Vdo</a>');
}
function changegallery()
{


    
    
    $.fancybox({
                'width'                : '100%',
                'height'            : '100%',
                'autoScale'            : false,
                'transitionIn'        : 'none',
                'transitionOut'        : 'none',
                'type'                : 'iframe',
                'href':$("#homeinfo").html()+'/manage/writegallery/memory/'+$("#meid").html()
            });
    
}
function setgalleryimg()
{
    $("a.galleryimg").fancybox();
}

function reloadgallery()
{
    
    var mySliderInstance =  $('#myGallery3').royalSlider({               
                
                slideshowEnabled :true,
                imageAlignCenter:true
            }).data("royalSlider"); 
}