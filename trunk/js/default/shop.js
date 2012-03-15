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
}
function backpromotion()
{
   $('#idshopmenu').toggle('slow', function() {
    // Animation complete.
  });
     $('#idpromotionmenu').toggle('slow', function() {
    // Animation complete.
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