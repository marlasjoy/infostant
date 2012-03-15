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