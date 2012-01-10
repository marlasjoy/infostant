<html><head>
<meta content="initial-scale=1.0, user-scalable=no" name="viewport">
<meta content="text/html; charset=UTF-8" http-equiv="content-type">
<title><?=$this->data['title']?$this->data['title']:title?></title> 
<meta content="<?=$this->data['description']?$this->data['description']:description?>" name="description">
<meta content="<?=$this->data['keywords']?$this->data['keywords']:keywords?>" name="keywords">
<link type="text/css" rel="stylesheet" href="http://code.google.com/apis/maps/documentation/javascript/examples/default.css">
<link href="<?=homeinfo?>/js/shop/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.css" rel="stylesheet">
<link href="<?=homeinfo?>/css/map/map.css" rel="stylesheet"> 
<script src="http://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
<script src="<?=homeinfo?>/js/shop/libs/jquery-1.6.4.min.js"></script>
<script src="<?=homeinfo?>/js/shop/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.js"></script>


<script type="text/javascript">
jQuery(document).ready(function() {
$('#hidden_link').fancybox({
     'width' : '330',
     'height' :'950',
     'centerOnScroll':true,
     'onClosed': function() {
   var src2="<?=homeinfo?>/images/default/icons/spiral.gif";
    $("#mapimage").attr("src",src2);
  } 
    
});
});
var  data2='<?=addslashes($this->data['flood']['json2'])?>';
var myObject = eval('(' + data2 + ')'); 
var map ;
function initialize()
 {
  var myOptions = {
    zoom: 7,
    center: new google.maps.LatLng(<?=$this->data['flood']['latnew']?>, <?=$this->data['flood']['lngnew']?>),
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
   map = new google.maps.Map(document.getElementById("map_canvas"),
                                myOptions);

  setMarkers(map, beaches);
}

/**
 * Data for the markers consisting of a name, a LatLng and a zIndex for
 * the order in which these markers should display on top of each
 * other.
 */
var beaches = [<?=$this->data['flood']['json']?>
];

function setMarkers(map, locations) {
  // Add markers to the map

  // Marker sizes are expressed as a Size of X,Y
  // where the origin of the image (0,0) is located
  // in the top left of the image.

  // Origins, anchor positions and coordinates of the marker
  // increase in the X direction to the right and in
  // the Y direction down.
  var image = new google.maps.MarkerImage('<?=homeinfo?>/images/default/icons/black.png',
      // This marker is 20 pixels wide by 32 pixels tall.
      new google.maps.Size(65, 35),
      // The origin for this image is 0,0.
      new google.maps.Point(0,0),
      // The anchor for this image is the base of the flagpole at 0,32.
      new google.maps.Point(0, 35));
 // var shadow = new google.maps.MarkerImage('images/beachflag_shadow.png',
      // The shadow image is larger in the horizontal dimension
      // while the position and offset are the same as for the main image.
//      new google.maps.Size(37, 32),
//      new google.maps.Point(0,0),
//      new google.maps.Point(0, 32));
      // Shapes define the clickable region of the icon.
      // The type defines an HTML &amp;lt;area&amp;gt; element 'poly' which
      // traces out a polygon as a series of X,Y points. The final
      // coordinate closes the poly by connecting to the first
      // coordinate.
  var shape = {
      coord: [1, 1, 1, 20, 18, 20, 18 , 1],
      type: 'poly'
  };
  for (var i = 0; i < locations.length; i++) {
    var beach = locations[i];
    var myLatLng = new google.maps.LatLng(beach[1], beach[2]);
    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        icon: image,
        shape: shape,
        title: beach[0],
        zIndex: beach[3]
    });
   setevent(marker);
   
  }
}
function setdata(marker)
{
   map.setCenter(new google.maps.LatLng(marker.getPosition().lat(), marker.getPosition().lng())); 
    var postion=marker.getPosition().toUrlValue();
    var dataset=myObject[marker.getZIndex()];
    
    $("#title").html(dataset.title);
    $(".namepost").html(dataset.namepost);
    $("#description").html(dataset.description);
    $("#emailshop").html(dataset.emailshop);
    $("#tel").html(dataset.tel);
    $("#address").html(dataset.address); 
    $("#shopname").html(dataset.shopname); 
    $("#shopurl").html(dataset.shopurl);   
    var src3=dataset.pic;
    $("#mapimage2").attr("src",src3);
    
   // alert(lat);
  //  var lng=marker.getPosition().lng();
    var src="http://maps.googleapis.com/maps/api/staticmap?&sensor=false&center="+postion+"&zoom=17&size=301x220&sensor=false&markers=icon:<?=homeinfo?>/images/default/icons/black.png|"+postion+"&format=png";
    $("#mapimage").attr("src",src);
    
}
function setevent(marker)
{
        google.maps.event.addListener(marker, 'click', function() {
      //  alert(marker.getPosition().lat());
        setdata(marker);
            
        $("#hidden_link").trigger('click');
        toggleBounce(marker);
  });
    
}
function stopmarker(marker)
{
    marker.setAnimation(null);
}
function toggleBounce(marker) {

  if (marker.getAnimation() != null) {
    marker.setAnimation(null);
  } 
  else {
    marker.setAnimation(google.maps.Animation.BOUNCE);
     setTimeout(function() {
      stopmarker(marker);
    },  4000);

  }
}
</script>
</head>

<body onload="initialize()">

 <header>  
    <div style=" background: url('<?=homeinfo?>/images/default/header/header-03.jpg'); background-repeat: no-repeat; width: 100%; height: 81px;"> 
<div style="display: none;" id="powerbeebee-info">
<div  id="powerbeebee" style="width:330px;">
<div style=" display: block; font-family: Tahoma; font-size: 12px;  color: black;">

<div>
 <img  src="<?=homeinfo?>/images/default/header/header-map.jpg"> 
 <div style="display: none;" id="shopurl"></div>
</div>
<div style="padding-left: 14px; padding-right: 15px;">
<div style="padding-bottom: 5px">
<span style="color:#029fc1 ;font-weight: bold;">ผู้โพสต์ :</span>
<span class="namepost" style="color:#ea9a01 ;font-weight: bold;"> คนไทยจิตอาสา </span>
</div>
<div style="padding-bottom: 5px;font-weight: bold;">
<span id="title" >สภาพน้ำเน่าเสียจากน้ำท่วม  2554 ของโรงเรียนใน จังหวัดอยุธยา </span>
</div>
<div style="padding-bottom: 5px">
<span id="description" >เผยภาพถ่ายดาวเทียมเปรียบเทียบก่อน-หลังน้ำท่วมผู้เชียวชาญสับเละโตแบบไร้การวางแผน สำนักข่าวต่าง ประเทศ เผยภาพถ่ายดาวเทียม ที่ถ่ายได้ในช่วงก่อนและหลังเกิด ในไทยที่แสดงให้เห็นสภาพ </span>
</div>
<div style="padding-bottom: 5px">
<img width="100%"  id="mapimage" src="<?=homeinfo?>/images/default/icons/spiral.gif">
</div>
<div style="padding-bottom: 5px;font-weight: bold;">
   สถานที่ต้องการความช่วยเหลือ
</div>
<div style="padding-bottom: 10px; color:#029fc1; line-height: 160%;">
ชื่อผู้ติดต่อ : <span style="color: black;" class="namepost">คนไทยจิตอาสา</span> <br>
ชื่อสถานที่ : <span style="color: black;" id="shopname"></span><br>
ที่อยู่ : <span style="color: black;" id="address"></span><br>
เบอร์โทร:<span style="color: black;" id="tel"></span> <br>
อีเมล์ :<span style="color: black;" id="emailshop"></span><br>
</div>
<div style="padding-bottom: 10px">
<img id="mapimage2" width="100%"  src="<?=homeinfo?>/images/default/icons/spiral.gif">
</div>
 <div id="social" style="padding-bottom: 10px">

                        <div class="dsocial" ><a  href="javascript:void(window.open('http://www.facebook.com/sharer/sharer.php?v=4&src=bm&u='+encodeURIComponent($('#shopurl').html()),'Facebook','height=450,width=550').focus())"><img src="<?=homeinfo?>/images/shop/icon-social-01.png" alt="Facebook" width="29" height="29" /></a></div>
                        <div class="dsocial"><a  href="javascript:void(window.open('http://twitter.com/intent/tweet?source=webclient&text='+encodeURIComponent($('#shopurl').html()),'Twitter','height=450,width=550').focus())"><img src="<?=homeinfo?>/images/shop/icon-social-02.png" alt="Twitter" width="29" height="29" /></a></div>
                        <div class="dsocial"><a  href="javascript:void(0);"><img src="<?=homeinfo?>/images/shop/icon-social-03.png" alt="RSS Feed" width="29" height="29" /></a></div>
                        <div class="dsocial"><a  href="javascript:void(window.open('http://www.myspace.com/Modules/PostTo/Pages/?u='+encodeURIComponent($('#shopurl').html()),'My Space','height=450,width=550').focus())"><img src="<?=homeinfo?>/images/shop/icon-social-04.png" alt="My Space" width="29" height="29" /></a></div>
                        <div class="dsocial"><a  href="javascript:void(window.open('http://www.linkedin.com/shareArticle?mini=true&url=CONTENT-URL&title=web&summary=web&source='+encodeURIComponent($('#shopurl').html()),'Linkedin','height=450,width=550').focus())"><img src="<?=homeinfo?>/images/shop/icon-social-05.png" alt="Linkedin" width="29" height="29" /></a></div>
                        <div class="dsocial"><a  href="javascript:void(window.open('https://m.google.com/app/plus/x/?v=compose&content='+encodeURIComponent($('#shopurl').html()),'Google +','height=450,width=550').focus())"><img src="<?=homeinfo?>/images/shop/icon-social-06.png" alt="Google +" width="29" height="29" /></a></div>
                        <div class="dsocial"><a  href="mailto:?subject=&body=Link="><img src="<?=homeinfo?>/images/shop/icon-social-07.png" alt="Email" width="29" height="29" /></a></div>

</div>
<div style="padding-bottom: 10px">&nbsp;
</div>

  </div>
</div></div></div>
<a href="#powerbeebee" id="hidden_link"><font color="#FFFFFF">.</font></a>
</div>
    </header> <article>
  <div id="map_canvas" style="position: relative; background-color: rgb(229, 227, 223); overflow: hidden;"></div>
  </article>
<footer>  

    </footer>

</body></html>