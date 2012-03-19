function shopmenu(sid,shopurl)
{
          $('#idshoplist').toggle('slow', function() {
    // Animation complete.
  });
      $('#idshopmenu').toggle('slow', function() {
    // Animation complete.
  });
  
       $('#shopurldata').val(shopurl);
       $('#siddata').val(sid);
  
  
}
function editshop()
{
    var shopurl=$('#shopurldata').val();
    location.href='http://'+shopurl+'.'+$('#subdir').html();
}
function editshop()
{
    var shopurl=$('#shopurldata').val();
    location.href='http://'+shopurl+'.'+$('#subdir').html();
}
function openpromotion()
{
   $('#idshopmenu').toggle('slow', function() {
    // Animation complete.
  });
     $('#idpromotionmenu').toggle('slow', function() {
    // Animation complete.
  }); 
}
function backshop()
{
     $('#idshoplist').toggle('slow', function() {
    // Animation complete.
  });
      $('#idshopmenu').toggle('slow', function() {
    // Animation complete.
  });
}
function createpromotion()
{
   
     $('#idpromotionmenu').toggle('slow', function() {
    // Animation complete.
  });
    
       $('#promotionpage').toggle('slow', function() {
    // Animation complete.
  });
  
   callpromotion();
}
function backmembercard()
{
       $('#idshopmenu').toggle('slow');
   $('#idmembercard').toggle('slow');
}

function backpromotion()
{
   $('#idshopmenu').toggle('slow');
   $('#idpromotionmenu').toggle('slow');
  if($('#idpromotionmenu').css('display')!= 'none')
  {
       callpromotion();
  }
}
function openmembercard()
{
   $('#idshopmenu').toggle('slow');
   $('#idmembercard').toggle('slow');

}




// MEMBERCARD SUBPAGE
function membercard_create()
{
   $('#idmembercard').toggle('slow');
   $('#idmembercard-create').toggle('slow');
}

function membercard_list()
{
   $('#idmembercard').toggle('slow');
   $('#idmembercard-list').toggle('slow');
}

function membercard_list()
{
   $('#idmembercard').toggle('slow');
   $('#idmembercard-list').toggle('slow');
}

function membercard_stamp()
{
   $('#idmembercard').toggle('slow');
   $('#idmembercard-stamp').toggle('slow');
}

function membercard_usestamp()
{
   $('#idmembercard').toggle('slow');
   $('#idmembercard-usestamp').toggle('slow');
}

function membercard_report()
{
   $('#idmembercard').toggle('slow');
   $('#idmembercard-report').toggle('slow');
}
function membercard_statistic()
{
   $('#idmembercard').toggle('slow');
   $('#idmembercard-statistic').toggle('slow');
}

function membercard_setting()
{
   $('#idmembercard').toggle('slow');
   $('#idmembercard-setting').toggle('slow');
}

//END MEMBERCARD SUBPAGE


// PROMOTION SUBPAGE

function promotiom_member()
{
   $('#idpromotionmenu').toggle('slow');
   $('#idpromotion-member').toggle('slow');
   if($('#idpromotion-member').css('display')!= 'none')
  {
       callpromotionmember();
  }
}
function promotiom_statistic()
{
   $('#idpromotionmenu').toggle('slow');
   $('#idpromotion-statistic').toggle('slow');
}
function promotiom_use()
{
   $('#idpromotionmenu').toggle('slow');
   $('#idpromotion-use').toggle('slow');

}

// END PROMOTION SUBPAGE




// MEMBER

function openmember()
{
    $('#idshopmenu').toggle('slow');
   $('#idmember').toggle('slow');
}

// END PROMOTION SUBPAGE

// Promotion

function isInt(x) 
{
  
  return (x % 1) == 0;
}
function callpromotionuse()
{
     
    if(($("#infid").val()=="")||(!isInt($("#infid").val())))
    {
        alert('โปรดกรอกเป็นตัวเลขเท่านั้น');
        return false;
    }
    
    var webdir=$("#webdir").html();
    var mid=$("#infid").val()-10000;
    $.post(webdir+'/ajax/savepromotionbymid',{sid:$('#siddata').val(),mid:mid} ,function(data) {
        var myObject = eval('(' + data + ')');    
         if(myObject.error)
               {
                   alert(myObject.error);
               }else{
                   alert('บันทึกข้อมูลเรียบร้อยแล้ว');
               }
        return false;
    });
    return false;
}
function callpromotionmember()
{
    $('.v.line').html('');
    var webdir=$("#webdir").html();
    $.post(webdir+'/ajax/getmemberpromotionbypromoid',{sid:$('#siddata').val()} ,function(data) {
    var myObject = eval('(' + data + ')');    
    var str='';
    
               for(var key in myObject) {
                     var obj = myObject[key];
                   if(obj.tel===null)
                   {
                       var tel='';
                   }else
                   {
                       var tel=obj.tel;
                   }
                   
                   if(obj.pic===null)
                   {
                       var pic=webdir+'/images/default/no-image/100-80.jpg';
                   }else
                   {
                       var pic=webdir+'/images/user_c/'+obj.username+'/'+obj.pic;
                   }
                   str+='<li><a href="'+pic+'" class="thumb"><img  src="'+pic+'" alt="tesry"></a><strong>'+obj.username+'</strong><br>Tel. '+tel+'<br>Email, '+obj.email+'</li>';
                   
               }
    $('.v.line').html(str);
            
    });
}
function callpromotion()
{
      var webdir=$("#webdir").html();
        $.post(webdir+'/ajax/getpromotion',{sid:$('#siddata').val()} ,function(data) {
            var myObject = eval('(' + data + ')');
             if(myObject.error)
               {
                 //   alert(myObject.error);
               }else{
                   
                   
                //   alert('บันทึกข้อมูลเรียบร้อยแล้ว');
                  // location.href='http://'+myObject.shopurl+'.'+subdir;

                  if(myObject[0].pic1)
                  {
                      
                      $('#735x325x1').html('<img src="'+webdir+'/images/shop_c/'+$('#shopurldata').val()+'/promotion/resize/'+myObject[0].pic1+'">');
                     
                  }
                  
                  if(myObject[0].pic2)
                 {
                     
                     $('#100x100x2').html('<img src="'+webdir+'/images/shop_c/'+$('#shopurldata').val()+'/promotion/resize/'+myObject[0].pic2+'">');
                 }
                 
                  if(myObject[0].pic3)
                 {
                     
                     $('#100x100x3').html('<img src="'+webdir+'/images/shop_c/'+$('#shopurldata').val()+'/promotion/resize/'+myObject[0].pic3+'">');
                 }
                 
                  if(myObject[0].title)
                 {
                     $('#title').removeClass("nocontenttitle").addClass("contenttitle");
                     $('#title').html(myObject[0].title);
                 }
                  if(myObject[0].description)
                 {
                     $('#description').removeClass("nocontentdescription").addClass("contentdescription");
                     $('#description').html(myObject[0].description);
                 }
                  
               }
        });
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
'width' : '100%',
'height' : '100%',
'autoScale' : false,
'transitionIn' : 'none',
'transitionOut' : 'none',
'type' : 'iframe',
'href':$("#homeinfo").html()+'/manage/imagepromotion/'+code+'/promotion/'+$("#shopurldata").val()+'/'+$('#siddata').val()
});
} 
function changecontent(content)
{

var code=content;

$.fancybox({
'width' : '100%',
'height' : '100%',
'autoScale' : false,
'transitionIn' : 'none',
'transitionOut' : 'none',
'type' : 'iframe',
'href':$("#homeinfo").html()+'/manage/write'+content+'promotion/'+content+'/promotion/'+$("#shopurldata").val()+'/'+$('#siddata').val()
});
} 

function reportpromotionbyday()
{
     $('#setbox').scroller('show');
    
}
$(document).ready(function() {
      $('#setbox').scroller('enable').scroller({dateFormat :'yy-mm-dd', theme: 'sense-ui', mode: 'clickpick',onSelect: function(dateText, inst) {
           var arraydata={};
           alert(dateText);
  //         arraydata[''+dateText+'']=sid2;
              var webdir=$("#webdir").html();
              $.post(webdir + "/ajax/getpromotionstatbypromoid",{sid:$('#siddata').val(),day:dateText},
                function(data) {
                  
                });

         var line1 = new RGraph.Line('line1', [56,45,43,52,56,65,21,23,34,15,21,12], [35,43,41,41,42,46,42,39,46,41,45,65,54]);
            line1.Set('chart.background.grid', true);
            line1.Set('chart.linewidth', 5);
            line1.Set('chart.gutter.left', 35);
            line1.Set('chart.hmargin', 5);

            if (!document.all || RGraph.isIE9up()) {
                line1.Set('chart.shadow', true);
            }
            line1.Set('chart.tickmarks', null);
            line1.Set('chart.units.post', 'k');
            line1.Set('chart.colors', ['red']);
            line1.Set('chart.background.grid.autofit', true);
            line1.Set('chart.background.grid.autofit.numhlines', 10);
            line1.Set('chart.curvy', 1);
            line1.Set('chart.curvy.factor', 0.25);
            line1.Set('chart.labels',['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec']);
            line1.Set('chart.title','A curvy Line chart');
            
            line1.Draw();
    }});
});
// END Promotion