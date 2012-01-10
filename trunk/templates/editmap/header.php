<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>title</title>
    <script type="text/javascript" src="<?=homeinfo?>/js/default/google-stat.js"></script> 
    <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-23864974-15']);
  _gaq.push(['_setDomainName', '.infostant.com']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
    <link media="all" type="text/css" href="http://fanpage.iteen-tv.com/fanpage/wp-admin/load-styles.php?c=1&dir=ltr&load=global,wp-admin,media&ver=d907dc98bf712ffed1df14b178c8bcdd" rel="stylesheet">
    <link media="all" type="text/css" href="http://fanpage.iteen-tv.com/fanpage/wp-includes/js/imgareaselect/imgareaselect.css?ver=0.9.1" id="imgareaselect-css" rel="stylesheet">
    <link media="all" type="text/css" href="http://fanpage.iteen-tv.com/fanpage/wp-admin/css/colors-fresh.css?ver=20110121" id="colors-css" rel="stylesheet">
     <script type="text/javascript" src="<?=homeinfo?>/js/popup/uploadify/jquery-1.4.2.min.js"></script>     
    <script src="http://maps.google.com/maps?file=api&v=2&key=<?=googleapikey?>"
      type="text/javascript"></script>
    <script type="text/javascript">
    document.domain="<?=domain?>";
  $(document).ready(function() {  
     var strdistrict=$("select#district").html();
var strtumbon=$("select#tumbon").html();;
var strtsubcat=$("select#subcat").html(); 
     var webdir='<?=homeinfo?>'; 
     
    $('#save').click(function(){
        $('#save').attr("disabled", "true");
        $('#save').val('กำลังบันทึก...');
       parent.window.setpont($('#lat').val(),$('#lng').val());
       var setdata=$('#lat').val()+'pp'+$('#lng').val()+'pp'+$('#province').val()+'pp'+$('#district').val()+'pp'+$('#tumbon').val();
       

       
       $.post('<?=homeinfo?>/ajax/savemap','setdata='+setdata+'&filename=<?=$this->data['action']?>&shopurl='+'<?=$this->data['0']['shopurl']?>', function(reposnse)         
      {
         eval("var obj1="+reposnse); 
          if(obj1.resposne)parent.$.fancybox.close();

       }); 
       
    });  
     $('#lat').keyup(function() {
           
           refeshmap();
     });
     
      $('#lng').keyup(function() {

            refeshmap();
         
     });
     
$('#buttonSearch').click(function(){
        if($('#searchmap').val())
    {
      //alert($(this).val());
        if($('#province').val()&&$('#district').val()&&$('#tumbon').val())
        {
        showAddress($("#province option[value='"+$('#province').val()+"']").text()+' '+$("#district option[value='"+$('#district').val()+"']").text()+' '+$("#tumbon option[value='"+$('#tumbon').val()+"']").text()+' '+$('#searchmap').val());
        }else if($('#province').val())
        {

            showAddress($("#province option[value='"+$('#province').val()+"']").text()+' '+$('#searchmap').val());
        }else if($('#province').val()&&$('#district').val())
        {
            showAddress($("#province option[value='"+$('#province').val()+"']").text()+' '+$("#district option[value='"+$('#district').val()+"']").text()+' '+$('#searchmap').val());
        }else
        {
           showAddress($('#searchmap').val()); 
        }
        
    }   
    });  
     
$('#province').change(function() {
    if($(this).val())
    {
      
        showAddress($("#province option[value='"+$(this).val()+"']").text());
    }
$.post(webdir+'/ajax/getdistrict', { proid: $(this).val() } ,function(data) {
    
    var myObject = eval('(' + data + ')');
    
     var options='';


     options +=strdistrict;
         
     if(typeof(myObject.error) == 'undefined')
     {
     $.each(myObject, function(index2,data) {
            
         options += '<option value="' + data.disid + '">' +data.disname + '</option>';
    
         });
      }  
         $("select#district").html(options);
   
         $("select#tumbon").html(strtumbon);

});
});

$('#district').change(function(){
    
    if($(this).val())
    {
      
        showAddress($("#province option[value='"+$('#province').val()+"']").text()+' '+$("#district option[value='"+$('#district').val()+"']").text());
    }
    
    $.post(webdir+'/ajax/gettumbon', { disid: $(this).val() } ,function(data) {
    
    var myObject = eval('(' + data + ')');

     var options='';


     options +=strtumbon;
         
if(typeof(myObject.error) == 'undefined')
     {
     $.each(myObject, function(index2,data) {
            
         options += '<option value="' + data.tumid + '">' +data.tumname + '</option>';
    
         });
       }
         $("select#tumbon").html(options);
   

});
});

$('#tumbon').change(function(){
 if($(this).val())
    {
      
        showAddress($("#province option[value='"+$('#province').val()+"']").text()+' '+$("#district option[value='"+$('#district').val()+"']").text()+' '+$("#tumbon option[value='"+$('#tumbon').val()+"']").text());
    }   
});
    
  });
  function refeshmap()
  {
         if (GBrowserIsCompatible()) {
        var map = new GMap2(document.getElementById("map"));
        map.addControl(new GSmallMapControl());
        map.addControl(new GMapTypeControl());
        var center = new GLatLng(parseFloat($('#lat').val()),parseFloat($('#lng').val()));
        map.setCenter(center, 17);
        geocoder = new GClientGeocoder();
        var marker = new GMarker(center, {draggable: true});  
        map.addOverlay(marker);
     //   document.getElementById("lat").value = center.lat().toFixed(5);
    //    document.getElementById("lng").value = center.lng().toFixed(5);

      GEvent.addListener(marker, "dragend", function() {
       var point = marker.getPoint();
          map.panTo(point);
   //    document.getElementById("lat").value = point.lat().toFixed(5);
    //   document.getElementById("lng").value = point.lng().toFixed(5);

        });


     GEvent.addListener(map, "moveend", function() {
          map.clearOverlays();
    var center = map.getCenter();
          var marker = new GMarker(center, {draggable: true});
          map.addOverlay(marker);
   //       document.getElementById("lat").value = center.lat().toFixed(5);
  //     document.getElementById("lng").value = center.lng().toFixed(5);


     GEvent.addListener(marker, "dragend", function() {
      var point =marker.getPoint();
         map.panTo(point);
 //     document.getElementById("lat").value = point.lat().toFixed(5);
//document.getElementById("lng").value = point.lng().toFixed(5);

        });
 
        });

      }
      
      
  }  
    
 function load() {
     //alert(parseFloat($('#lat',parent.document.body).html()));
      if (GBrowserIsCompatible()) {
        var map = new GMap2(document.getElementById("map"));
        map.addControl(new GSmallMapControl());
        map.addControl(new GMapTypeControl());
        var center = new GLatLng(parseFloat($('#lat',parent.document.body).html()),parseFloat($('#lng',parent.document.body).html()));
        map.setCenter(center, 17);
        geocoder = new GClientGeocoder();
        var marker = new GMarker(center, {draggable: true});  
        map.addOverlay(marker);
        document.getElementById("lat").value = center.lat().toFixed(5);
        document.getElementById("lng").value = center.lng().toFixed(5);

      GEvent.addListener(marker, "dragend", function() {
       var point = marker.getPoint();
          map.panTo(point);
       document.getElementById("lat").value = point.lat().toFixed(5);
       document.getElementById("lng").value = point.lng().toFixed(5);

        });


     GEvent.addListener(map, "moveend", function() {
          map.clearOverlays();
    var center = map.getCenter();
          var marker = new GMarker(center, {draggable: true});
          map.addOverlay(marker);
          document.getElementById("lat").value = center.lat().toFixed(5);
       document.getElementById("lng").value = center.lng().toFixed(5);


     GEvent.addListener(marker, "dragend", function() {
      var point =marker.getPoint();
         map.panTo(point);
      document.getElementById("lat").value = point.lat().toFixed(5);
         document.getElementById("lng").value = point.lng().toFixed(5);

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
              alert(address + " not found");
            } else {
          document.getElementById("lat").value = point.lat().toFixed(5);
       document.getElementById("lng").value = point.lng().toFixed(5);
         map.clearOverlays()
            map.setCenter(point, 14);
   var marker = new GMarker(point, {draggable: true});  
         map.addOverlay(marker);

        GEvent.addListener(marker, "dragend", function() {
      var pt = marker.getPoint();
         map.panTo(pt);
      document.getElementById("lat").value = pt.lat().toFixed(5);
         document.getElementById("lng").value = pt.lng().toFixed(5);
        });


     GEvent.addListener(map, "moveend", function() {
          map.clearOverlays();
    var center = map.getCenter();
          var marker = new GMarker(center, {draggable: true});
          map.addOverlay(marker);
          document.getElementById("lat").value = center.lat().toFixed(5);
       document.getElementById("lng").value = center.lng().toFixed(5);

     GEvent.addListener(marker, "dragend", function() {
     var pt = marker.getPoint();
        map.panTo(pt);
    document.getElementById("lat").value = pt.lat().toFixed(5);
       document.getElementById("lng").value = pt.lng().toFixed(5);
        });
 
        });

            }
          }
        );
      }
    }
    </script>

</head>