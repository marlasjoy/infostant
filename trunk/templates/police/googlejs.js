
var map;
var marker;
    
function onLoadMaps2() {
  
      var myLatlng = new google.maps.LatLng(13.72875, 100.56941);
        var image = new google.maps.MarkerImage('walk.png',

      new google.maps.Size(38, 46),

      new google.maps.Point(0,0),

      new google.maps.Point(0, 35));
var myOptions = {
  
zoom: 15,
center: myLatlng,
mapTypeId: google.maps.MapTypeId.ROADMAP
}
 map = new google.maps.Map(document.getElementById("maparea"), myOptions);


 marker = new google.maps.Marker({  
position: myLatlng,
map: map,
title:''
});

      
}
  
