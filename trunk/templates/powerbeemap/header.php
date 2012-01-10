<!doctype html>
  <head>
  <meta charset="utf-8">
          <title>Find latitude and longitude with Google Maps</title>
     <script type="text/javascript" src="<?=homeinfo?>/js/popup/uploadify/jquery-1.4.2.min.js"></script>     
     <meta content="authenticity_token" name="csrf-param" />
<meta content="<?=googleapikey?>" name="csrf-token" />

        <script type="text/javascript">
            var AUTH_TOKEN = "<?=googleapikey?>";
        </script>
     <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>  
        
    <script>
    var beaches = [
['Bondi Beach', -33.890542, 151.274856, 4],
['Coogee Beach', -33.923036, 151.259052, 5],
['Cronulla Beach', -34.028249, 151.157507, 3],
['Manly Beach', -33.80010128657071, 151.28747820854187, 2],
['Maroubra Beach', -33.950198, 151.259302, 1]
];
    function initialize() {

      var myLatlng = new google.maps.LatLng( -33.890542,  151.274856);
var myOptions = {
zoom: 17,
center: myLatlng,
mapTypeId: google.maps.MapTypeId.ROADMAP
}
var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
var contentString = '';
var infowindow = new google.maps.InfoWindow({
content: contentString
});
var marker = new google.maps.Marker({
position: myLatlng,
map: map,
title: 'Uluru (Ayers Rock)'
});
google.maps.event.addListener(marker, 'click', function() {
infowindow.open(map,marker);
});
}
/**
* Data for the markers consisting of a name, a LatLng and a zIndex for
* the order in which these markers should display on top of each
* other.
*/

function setMarkers(map, locations) {
// Add markers to the map
// Marker sizes are expressed as a Size of X,Y
// where the origin of the image (0,0) is located
// in the top left of the image.
// Origins, anchor positions and coordinates of the marker
// increase in the X direction to the right and in
// the Y direction down.
var image = new google.maps.MarkerImage('http://www.infostant.com/images/default/icons/black.png',
// This marker is 20 pixels wide by 32 pixels tall.
new google.maps.Size(20, 32),
// The origin for this image is 0,0.
new google.maps.Point(0,0),
// The anchor for this image is the base of the flagpole at 0,32.
new google.maps.Point(0, 32));
//var shadow = new google.maps.MarkerImage('images/default/icons/black.png',
// The shadow image is larger in the horizontal dimension
// while the position and offset are the same as for the main image.
//new google.maps.Size(37, 32),
//new google.maps.Point(0,0),
//new google.maps.Point(0, 32));
// Shapes define the clickable region of the icon.
// The type defines an HTML &lt;area&gt; element 'poly' which
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
}
} 

    </script>
</head>