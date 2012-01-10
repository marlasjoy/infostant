
 function load() {
      if (GBrowserIsCompatible()) {
        var map = new GMap2(document.getElementById("map"));
        map.addControl(new GSmallMapControl());
        map.addControl(new GMapTypeControl());
        var center = new GLatLng(13.72342,     100.47623);
        map.setCenter(center, 17);
        geocoder = new GClientGeocoder();
        var marker = new GMarker(center, {draggable: true});  
        map.addOverlay(marker);
        //document.getElementById("lat").innerHTML = center.lat().toFixed(5);
//        document.getElementById("lng").innerHTML = center.lng().toFixed(5);
        
        $("#lat").val(center.lat().toFixed(5));
          $("#lng").val(center.lng().toFixed(5));

      GEvent.addListener(marker, "dragend", function() {
       var point = marker.getPoint();
          map.panTo(point);
       //document.getElementById("lat").innerHTML = point.lat().toFixed(5);
//       document.getElementById("lng").innerHTML = point.lng().toFixed(5);
       
          $("#lat").val(point.lat().toFixed(5));
          $("#lng").val(point.lng().toFixed(5));

        });


     GEvent.addListener(map, "moveend", function() {
          map.clearOverlays();
    var center = map.getCenter();
          var marker = new GMarker(center, {draggable: true});
          map.addOverlay(marker);
      //    document.getElementById("lat").innerHTML = center.lat().toFixed(5);
//       document.getElementById("lng").innerHTML = center.lng().toFixed(5);
       
       $("#lat").val(center.lat().toFixed(5));
          $("#lng").val(center.lng().toFixed(5));


     GEvent.addListener(marker, "dragend", function() {
      var point =marker.getPoint();
         map.panTo(point);
     // document.getElementById("lat").innerHTML = point.lat().toFixed(5);
       //  document.getElementById("lng").innerHTML = point.lng().toFixed(5);
         $("#lat").val(point.lat().toFixed(5));
          $("#lng").val(point.lng().toFixed(5));
        });
 
        });

      }
    }

 function showAddress(address) {
       var map = new GMap2(document.getElementById("map"));
       map.addControl(new GSmallMapControl());
       map.addControl(new GMapTypeControl());
       if (geocoder) {
        geocoder.getLatLng(
          address,
          function(point) {
            if (!point) {
             // alert(address + " not found");
            } else {
          $("#lat").val(point.lat().toFixed(5));
          $("#lng").val(point.lng().toFixed(5));
      // document.getElementById("lng").innerHTML = point.lng().toFixed(5);
         map.clearOverlays()
            map.setCenter(point, 14);
   var marker = new GMarker(point, {draggable: true});  
         map.addOverlay(marker);

        GEvent.addListener(marker, "dragend", function() {
      var pt = marker.getPoint();
         map.panTo(pt);
     // document.getElementById("lat").innerHTML = pt.lat().toFixed(5);
       //  document.getElementById("lng").innerHTML = pt.lng().toFixed(5);
         
         $("#lat").val(pt.lat().toFixed(5));
          $("#lng").val(pt.lng().toFixed(5));
         
        });


     GEvent.addListener(map, "moveend", function() {
          map.clearOverlays();
    var center = map.getCenter();
          var marker = new GMarker(center, {draggable: true});
          map.addOverlay(marker);
      //    document.getElementById("lat").innerHTML = center.lat().toFixed(5);
//       document.getElementById("lng").innerHTML = center.lng().toFixed(5);
       
       $("#lat").val(center.lat().toFixed(5));
          $("#lng").val(center.lng().toFixed(5));

     GEvent.addListener(marker, "dragend", function() {
     var pt = marker.getPoint();
        map.panTo(pt);
//    document.getElementById("lat").innerHTML = pt.lat().toFixed(5);
//       document.getElementById("lng").innerHTML = pt.lng().toFixed(5);
       
       $("#lat").val(pt.lat().toFixed(5));
          $("#lng").val(pt.lng().toFixed(5));
        });
 
        });

            }
          }
        );
      }
    }

//<![CDATA[
var gs_d=new Date,DoW=gs_d.getDay();gs_d.setDate(gs_d.getDate()-(DoW+6)%7+3);
var ms=gs_d.valueOf();gs_d.setMonth(0);gs_d.setDate(4);
var gs_r=(Math.round((ms-gs_d.valueOf())/6048E5)+1)*gs_d.getFullYear();
var gs_p = (("https:" == document.location.protocol) ? "https://" : "http://");
document.write(unescape("%3Cscript src='" + gs_p + "s.gstat.orange.fr/lib/gs.js?"+gs_r+"' type='text/javascript'%3E%3C/script%3E"));
//]]>