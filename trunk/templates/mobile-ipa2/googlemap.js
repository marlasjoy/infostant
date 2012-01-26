var marker;
var geocoder;
var map2;
function initialize()
 {
  var myOptions = {
    zoom: 15,
    center: new google.maps.LatLng(13.80458, 100.64795),
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
   geocoder = new google.maps.Geocoder();
   map2 = new google.maps.Map(document.getElementById("maparea"),
                                myOptions);

  setMarkers2(map2);
}
function setMarkers2(map2) 
{
  // Add markers to the map

  // Marker sizes are expressed as a Size of X,Y
  // where the origin of the image (0,0) is located
  // in the top left of the image.

  // Origins, anchor positions and coordinates of the marker
  // increase in the X direction to the right and in
  // the Y direction down.

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

   // var beach = locations[i];
    var myLatLng = new google.maps.LatLng(13.80458, 100.64795);
    marker = new google.maps.Marker({
        position: myLatLng,
        map: map2,
        shape: shape
    });
   setevent(marker);
   

}
function setevent(marker)
{
        google.maps.event.addListener(marker, 'dragend', function() {
         //   alert('');
      //  alert(marker.getPosition().lat());
        $('#lat').val(marker.getPosition().lat());
        $('#lng').val(marker.getPosition().lng());  
        //setdata(marker);
            
        //$("#hidden_link").trigger('click');
       // toggleBounce(marker);
       });
    
}
function showAddress(address)
{
     //var address = document.getElementById("address").value;
    geocoder.geocode( { 'address': address}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        map2.setCenter(results[0].geometry.location);
        marker.setPosition(results[0].geometry.location); 
        
         if(($('#province').val()=="")||($('#district').val()=="")||($('#tumbon').val()==""))
       {
        marker.setDraggable(false);   
       // alert('กรุณาเลือก จังหวัด อำเภอ ตำบล ก่อนค่ะ');   
        
       }else
       {
         marker.setDraggable(true);  
       }
        $('#lat').val(marker.getPosition().lat());
        $('#lng').val(marker.getPosition().lng()); 
      } else {
        alert("Geocode was not successful for the following reason: " + status);
      }
  });
  }
function refeshmap()
  {
      var myOptions = {
    zoom: 15,
    center: new google.maps.LatLng($('#lat').val(),$('#lng').val()),
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  map2.setOptions(myOptions);
  var myLatLng = new google.maps.LatLng($('#lat').val(), $('#lng').val());
  marker.setPosition(myLatLng);
  
  }
