
 function onLoadMaps() {
  
      var myLatlng = new google.maps.LatLng($('#lat').html(),  $('#lng').html());
        var image = new google.maps.MarkerImage($("#homeinfo").html()+'/images/default/icons/'+$('#icon').html(),

      new google.maps.Size($('#width').html(), $('#height').html()),

      new google.maps.Point(0,0),

      new google.maps.Point(0, 35));
var myOptions = {
  
zoom: 15,
center: myLatlng,
mapTypeId: google.maps.MapTypeId.ROADMAP
}
var map = new google.maps.Map(document.getElementById("map"), myOptions);
var contentString = '<div id="content">'+
'<div id="siteNotice">'+
'</div>'+
'<h1 id="firstHeading" class="firstHeading">'+$('#shopname').html()+'</h1>'+
'<div id="bodyContent"><p><h1>Contact</h1></p><p>'+$('#contact').html()+
'</p></div>'+
'</div>';
var infowindow = new google.maps.InfoWindow({
content: contentString
});
var marker = new google.maps.Marker({
 icon: image,    
position: myLatlng,
map: map,
title:$('#shopname').html()
});
google.maps.event.addListener(marker, 'click', function() {
infowindow.open(map,marker);
});
      
}
    
function onLoadMaps2() {
  
      var myLatlng = new google.maps.LatLng($('#lat').html(),  $('#lng').html());
        var image = new google.maps.MarkerImage('images/walk.png',

      new google.maps.Size(38, 46),

      new google.maps.Point(0,0),

      new google.maps.Point(0, 35));
var myOptions = {
  
zoom: 15,
center: myLatlng,
mapTypeId: google.maps.MapTypeId.ROADMAP
}
var map = new google.maps.Map(document.getElementById("map"), myOptions);
var contentString = '<div id="content">'+
'<div id="siteNotice">'+
'</div>'+
'<h1 id="firstHeading" class="firstHeading">'+$('#shopname').html()+'</h1>'+
'<div id="bodyContent"><p><h1>Contact</h1></p><p>'+$('#contact').html()+
'</p></div>'+
'</div>';
var infowindow = new google.maps.InfoWindow({
content: contentString
});
var marker = new google.maps.Marker({
 icon: image,    
position: myLatlng,
map: map,
title:$('#shopname').html()
});
google.maps.event.addListener(marker, 'click', function() {
infowindow.open(map,marker);
});
      
}
  

 function setpont(lat,lng) {
     $('#lat').html(lat);
     $('#lng').html(lng);
      var myLatlng = new google.maps.LatLng(parseFloat(lat),  parseFloat(lng));
               var image = new google.maps.MarkerImage($("#homeinfo").html()+'/images/default/icons/'+$('#icon').html(),
      // This marker is 20 pixels wide by 32 pixels tall.
      new google.maps.Size($('#width').html(), $('#height').html()),
      // The origin for this image is 0,0.
      new google.maps.Point(0,0),
      // The anchor for this image is the base of the flagpole at 0,32.
      new google.maps.Point(0, 35));
var myOptions = {
zoom: 17,
center: myLatlng,
mapTypeId: google.maps.MapTypeId.ROADMAP
}
var map = new google.maps.Map(document.getElementById("map"), myOptions);
var contentString = '<div id="content">'+
'<div id="siteNotice">'+
'</div>'+
'<h1 id="firstHeading" class="firstHeading">'+$('#shopname').html()+'</h1>'+
'<div id="bodyContent"><h1>Contact</h1><p>'+$('#contact').html()+
'</p></div>'+
'</div>';
var infowindow = new google.maps.InfoWindow({
content: contentString
});
var marker = new google.maps.Marker({
position: myLatlng,
 icon: image, 
map: map,
title:$('#shopname').html()
});
google.maps.event.addListener(marker, 'click', function() {
infowindow.open(map,marker);
});
     
     
 }
 function setpont2(lat,lng) {
     $('#lat').html(lat);
     $('#lng').html(lng);
      var myLatlng = new google.maps.LatLng(parseFloat(lat),  parseFloat(lng));
               var image = new google.maps.MarkerImage('images/walk.png',
      // This marker is 20 pixels wide by 32 pixels tall.
      new google.maps.Size(38, 46),
      // The origin for this image is 0,0.
      new google.maps.Point(0,0),
      // The anchor for this image is the base of the flagpole at 0,32.
      new google.maps.Point(0, 35));
var myOptions = {
zoom: 15,
center: myLatlng,
mapTypeId: google.maps.MapTypeId.ROADMAP
}
var map = new google.maps.Map(document.getElementById("map"), myOptions);
var contentString = '<div id="content">'+
'<div id="siteNotice">'+
'</div>'+
'<h1 id="firstHeading" class="firstHeading">'+$('#shopname').html()+'</h1>'+
'<div id="bodyContent"><h1>Contact</h1><p>'+$('#contact').html()+
'</p></div>'+
'</div>';
var infowindow = new google.maps.InfoWindow({
content: contentString
});
var marker = new google.maps.Marker({
position: myLatlng,
 icon: image, 
map: map,
title:$('#shopname').html()
});
google.maps.event.addListener(marker, 'click', function() {
infowindow.open(map,marker);
});
     
     
 }
