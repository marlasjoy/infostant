<html><head>
<meta content="initial-scale=1.0, user-scalable=no" name="viewport">
<meta name="viewport" content="width=device-width, maximum-scale=1.0,
minimum-scale=1.0" /> 
<meta content="text/html; charset=UTF-8" http-equiv="content-type">
    <script type="text/javascript" src="<?=homeinfo?>/js/default/google-stat.js"></script> 
<title><?=$this->data['title']?$this->data['title']:title?></title> 
<meta content="<?=$this->data['description']?$this->data['description']:description?>" name="description">
<meta content="<?=$this->data['keywords']?$this->data['keywords']:keywords?>" name="keywords">
<link type="text/css" rel="stylesheet" href="http://code.google.com/apis/maps/documentation/javascript/examples/default.css">
<link href="<?=homeinfo?>/js/shop/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.css" rel="stylesheet">
<link href="<?=homeinfo?>/css/map/map.css" rel="stylesheet"> 
<script src="http://maps.googleapis.com/maps/api/js?sensor=true" type="text/javascript"></script>
<script src="<?=homeinfo?>/js/shop/libs/jquery-1.6.4.min.js"></script>
<script src="<?=homeinfo?>/js/shop/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.js"></script>
<style>
a.button.black1 {
width: 169px;
height: 63px;
display: inline-block;
line-height: 54px;
text-align: center;
background: url(<?=homeinfo?>/images/shop/bg-button-black1.png) no-repeat;
font-size: 18px;
margin-right: 5px;
}
a.button.black1 {
margin-top: 15px;
background-image: url(<?=homeinfo?>/images/shop/bg-button-black2.png);
}
a {
color: #A3A3A3;
text-decoration: none;
}

</style>

<script type="text/javascript">
jQuery(document).ready(function() {
$('#hidden_link').fancybox({
     'width' : '310',
     'height' :'950',
     'centerOnScroll':true,
 
     'onClosed': function() {
   var src2="<?=homeinfo?>/images/default/icons/spiral.gif";
    $("#mapimage").attr("src",src2);
  } 
    
});

$('#dir').click(function() {
       calcRoute(postion2);
       $.fancybox.close();
});


});
var  data2='<?=addslashes($this->data['flood']['json2'])?>';
var myObject = eval('(' + data2 + ')'); 
var map ;
var initialLocation;
var myLatLng;
 var directionDisplay;
 var postion2;
// var lng2;
  var directionsService = new google.maps.DirectionsService();
  
function detectBrowser() {
  var useragent = navigator.userAgent;
  var mapdiv = document.getElementById("powerbeebee");
    
  if (useragent.indexOf('iPhone') != -1 || useragent.indexOf('Android') != -1 ) {
    mapdiv.style.width = '100%';
    mapdiv.style.height = '100%';
  } else {
    mapdiv.style.width = '310px';
    //mapdiv.style.height = '800px';
  }
}  
  
function getlocation(position)
{
   initialLocation = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
      
      map.setCenter(initialLocation); 
      myMarkers(map,initialLocation,beaches);  
}  
function initialize()
 {
    detectBrowser(); 
   directionsDisplay = new google.maps.DirectionsRenderer();   
  var myOptions = {
    zoom: <?=$this->data['zoom']?>,
    center: new google.maps.LatLng(<?=$this->data['flood']['latnew']?>, <?=$this->data['flood']['lngnew']?>),
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
   map = new google.maps.Map(document.getElementById("map_canvas"),
                                myOptions);
   directionsDisplay.setMap(map);
 
   if(navigator.geolocation) {
              //alert('');   
    browserSupportFlag = true;
    navigator.geolocation.getCurrentPosition(getlocation,handleNoGeolocation);
  // Try Google Gears Geolocation
  } else if (google.gears) {
 
    browserSupportFlag = true;
    var geo = google.gears.factory.create('beta.geolocation');
    geo.getCurrentPosition(function(position) {
      initialLocation = new google.maps.LatLng(position.latitude,position.longitude);
      map.setCenter(initialLocation);
      myMarkers(map,initialLocation,beaches); 
    }, function() {
      handleNoGeoLocation(browserSupportFlag);
    });
  // Browser doesn't support Geolocation
  } else {

    browserSupportFlag = false;
    handleNoGeolocation(browserSupportFlag);
  }
  
  function handleNoGeolocation(errorFlag) {
    alert(errorFlag.code);  
    if (errorFlag == true) {
      alert("Geolocation service failed.");
   //   initialLocation = newyork;
    } else {
      alert("Your browser doesn't support geolocation. We've placed you in Siberia.");
   //   initialLocation = siberia;
    }
    map.setCenter(initialLocation);
  }
                           
                                
                                
  setMarkers(map, beaches);
}
function myMarkers(map,mylocation,locations)
{
    
    var image = new google.maps.MarkerImage('<?=homeinfo?>/images/default/icons/walk.png',
      // This marker is 20 pixels wide by 32 pixels tall.
      new google.maps.Size(38,40),
      // The origin for this image is 0,0.
      new google.maps.Point(0,0),
      // The anchor for this image is the base of the flagpole at 0,32.
      new google.maps.Point(0, 20));
    var shape = {
      coord: [1, 1, 1, 20, 18, 20, 18 , 1],
      type: 'poly'
  };   
   // var myLatLng = new google.maps.LatLng(beach[1], beach[2]);
    var marker = new google.maps.Marker({
        position: mylocation,
        map: map,
        icon: image,
        shape: shape,
        title: 'คุณอยู่ที่นี่',
        zIndex: 10
    });
    
    google.maps.event.addListener(marker, 'click', function() {
      //  alert(marker.getPosition().lat());
    //    setdata(marker);
            
   //     $("#hidden_link").trigger('click');
        toggleBounce(marker);
  });
   if(locations.length==1)
   {
   for (var i = 0; i < locations.length; i++) { 
    var beach = locations[i];
    var myLatLng = new google.maps.LatLng(beach[1], beach[2]);
    calcRoute(myLatLng);   
   }
   }
}
 function calcRoute(toend) {
   // var start = document.getElementById("start").value;
    //var end = document.getElementById("end").value;
    var request = {
        origin:initialLocation, 
        destination:toend,
        travelMode: google.maps.DirectionsTravelMode.DRIVING
    };
    directionsService.route(request, function(response, status) {
      if (status == google.maps.DirectionsStatus.OK) {
        directionsDisplay.setDirections(response);
      }
    });
  }
 function setDirection()
 {
     
     
     
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
  var dataset=myObject[1]; 
  var image = new google.maps.MarkerImage('<?=homeinfo?>/images/default/icons/'+dataset.icon,
      // This marker is 20 pixels wide by 32 pixels tall.
      new google.maps.Size(dataset.width, dataset.height),
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
   postion2=marker.getPosition();
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
    var src="http://maps.googleapis.com/maps/api/staticmap?&sensor=false&center="+postion+"&zoom=17&size=301x220&sensor=false&markers=icon:<?=homeinfo?>/images/default/icons/"+dataset.icon+"|"+postion+"&format=png";
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
 
<div style="display: none;" id="powerbeebee-info">
<a href="#powerbeebee" id="hidden_link"><font color="#FFFFFF">.</font></a>  
<div  id="powerbeebee" style="width:310px;">
<div style=" display: block; font-family: Tahoma; font-size: 12px;  color: black;">

<div>
 <img width="100%"   src="<?=homeinfo?>/images/default/header/header-map2.jpg"> 
 <div style="display: none;" id="shopurl"></div>
</div>
<div style="">
<div style="padding-bottom: 5px">

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

<div style="padding-bottom: 10px; color:#029fc1; line-height: 160%;">
ชื่อสถานที่ : <span style="color: black;" id="shopname"></span><br>
ที่อยู่ : <span style="color: black;" id="address"></span><br>
เบอร์โทร:<span style="color: black;" id="tel"></span> <br>
อีเมล์ :<span style="color: black;" id="emailshop"></span><br>
</div>
<div style="padding-bottom: 10px;text-align: center;">
<a href="javascript:void(0);" id="dir" class="button black1">Get Direction</a>   
<img id="mapimage2" width="100%"  src="http://www.infostant.com/images/default/icons/spiral.gif">
</div>
<div style="padding-bottom: 10px;text-align: center;"> <a href="javascript:void(window.open($('#shopurl').html()));" id="fav" class="button black1">Go To Shop</a>  </div>
 <div id="social" style="padding-bottom: 10px">

                        <div class="dsocial" ><a  href="javascript:void(window.open('http://www.facebook.com/sharer/sharer.php?v=4&src=bm&u='+encodeURIComponent($('#shopurl').html()),'Facebook','height=450,width=550').focus())"><img src="<?=homeinfo?>/images/shop/icon-social-01.png" alt="Facebook" width="29" height="29" /></a></div>
                        <div class="dsocial"><a  href="javascript:void(window.open('http://twitter.com/intent/tweet?source=webclient&text='+encodeURIComponent($('#shopurl').html()),'Twitter','height=450,width=550').focus())"><img src="<?=homeinfo?>/images/shop/icon-social-02.png" alt="Twitter" width="29" height="29" /></a></div>
                        
                        <div class="dsocial"><a  href="javascript:void(window.open('http://www.myspace.com/Modules/PostTo/Pages/?u='+encodeURIComponent($('#shopurl').html()),'My Space','height=450,width=550').focus())"><img src="<?=homeinfo?>/images/shop/icon-social-04.png" alt="My Space" width="29" height="29" /></a></div>
                        <div class="dsocial"><a  href="javascript:void(window.open('http://www.linkedin.com/shareArticle?mini=true&url=CONTENT-URL&title=web&summary=web&source='+encodeURIComponent($('#shopurl').html()),'Linkedin','height=450,width=550').focus())"><img src="<?=homeinfo?>/images/shop/icon-social-05.png" alt="Linkedin" width="29" height="29" /></a></div>
                        <div class="dsocial"><a  href="javascript:void(window.open('https://m.google.com/app/plus/x/?v=compose&content='+encodeURIComponent($('#shopurl').html()),'Google +','height=450,width=550').focus())"><img src="<?=homeinfo?>/images/shop/icon-social-06.png" alt="Google +" width="29" height="29" /></a></div>
                        <div class="dsocial"><a  href="mailto:?subject=&body=Link="><img src="<?=homeinfo?>/images/shop/icon-social-07.png" alt="Email" width="29" height="29" /></a></div>

                        
</div>
<div style="padding-bottom: 10px">&nbsp;
</div>

  </div>
</div></div></div>


    </header> <article>
  <div id="map_canvas" style="position: relative; background-color: rgb(229, 227, 223); overflow: hidden;"></div>
  </article>
<footer>  

    </footer>

</body></html>
