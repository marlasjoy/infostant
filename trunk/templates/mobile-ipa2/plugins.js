
// usage: log('inside coolFunc', this, arguments);
// paulirish.com/2009/log-a-lightweight-wrapper-for-consolelog/
var webdir='http://www.infostant.com';
var searchTxt;
var proid;
var disid;
var tumid;
var catid;
var subcatid;
window.log = function(){
  log.history = log.history || [];   // store logs to an array for reference
  log.history.push(arguments);
  if(this.console) {
    arguments.callee = arguments.callee.caller;
    var newarr = [].slice.call(arguments);
    (typeof console.log === 'object' ? log.apply.call(console.log, console, newarr) : console.log.apply(console, newarr));
  }
};

// make it safe to use console.log always
(function(b){function c(){}for(var d="assert,clear,count,debug,dir,dirxml,error,exception,firebug,group,groupCollapsed,groupEnd,info,log,memoryProfile,memoryProfileEnd,profile,profileEnd,table,time,timeEnd,timeStamp,trace,warn".split(","),a;a=d.pop();){b[a]=b[a]||c}})((function(){try
{console.log();return window.console;}catch(err){return window.console={};}})());


// place any jQuery/helper plugins in here, instead of separate, slower script files.
 function getUrlVars2() {
        var vars = {};
        var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
            vars[key] = value;
        });
        return vars;
 }
 function indexfunction(){
      //alert('');
 }
 function setdistrict(myObject){
       $("select#district").html('');
       var strdistrict='<option value="">เลือกอำเภอ/เขต</option>';
       var strtumbon='<option value="">เลือกตำบล/แขวง</option>'; 
      // var strtsubcat=$("select#subcat").html();
        var options='';

       
        options +=strdistrict;
         
         if(typeof(myObject.error) == 'undefined')
         {
         $.each(myObject, function(index2,data) {
                
             options += '<option value="' + data.disid + '">' +data.disname + '</option>';
        
             });
          }  

         $("select#district").html(options);
         //$("select option#district:first").attr( 'selected' , ''  ) ; 
         $("select#tumbon").html(strtumbon);
         var myselect = $("select#district");
         if(jQuery.isFunction(myselect.selectmenu))
         {
         myselect[0].selectedIndex = 0;
         myselect.selectmenu("refresh");
         }
         
         var myselect = $("select#tumbon");
         if(jQuery.isFunction(myselect.selectmenu))
         {
         myselect[0].selectedIndex = 0;
         myselect.selectmenu("refresh");
         }


           
}
 function settumbon(myObject){
       $("select#tumbon").html('');
      // var strdistrict='<option value="">เลือกอำเภอ/เขต</option>';
       var strtumbon='<option value="">เลือกตำบล/แขวง</option>'; 
      // var strtsubcat=$("select#subcat").html();
        var options='';

       
        options +=strtumbon;
         
         if(typeof(myObject.error) == 'undefined')
         {
         $.each(myObject, function(index2,data) {
                
             options += '<option value="' + data.tumid + '">' +data.tumname + '</option>';
        
             });
          }  

        // $("select#district").html(strdistrict);
         //$("select option#district:first").attr( 'selected' , ''  ) ; 
         $("select#tumbon").html(options);
         var myselect = $("select#tumbon");
          if(jQuery.isFunction(myselect.selectmenu))
         {
         myselect[0].selectedIndex = 0;
         myselect.selectmenu("refresh");
         }
}
 function searchresultlist(myObject)
 {
      var areaid=""; 
      $('#searchresulthtml').html('');
             for (variable in myObject)
             {   
          //   alert(variable) ;
             var obj = myObject[variable]; 
     //$('#searchresulthtml').append('<li><a  href="'+obj.shopurl+'" class="thumb"><img src="'+obj.pic+'" alt="'+obj.shopname+'" /></a><strong><a data-ajax="false" href="'+obj.shopurl+'">'+obj.shopname+'</a></strong><br />Time. '+obj.daterange+'<br />Tel.  '+obj.tel+'<br />'+obj.address+'</li><ul class="h"><li><a href="#" class="button delete">Delete</a></li><li><a href="#" class="button go">Go</a></li><li><a href="#" class="button favorite">Favorite</a></li><li class="date_add">26/10/2011 <strong>|</strong> 09:00</li></ul>');
    
    $('#searchresulthtml').append('<li><a href="'+obj.shopurl+'" class="thumb"><img src="'+obj.pic+'" alt="'+obj.shopname+'" /></a><strong><a href="'+obj.shopurl+'">'+obj.shopname+'</a></strong><br />Time. '+obj.daterange+'<br />Tel. '+obj.tel+'<br />'+obj.address+', '+obj.proname+'<ul class="h"><li><a href="#" class="button delete">Delete</a></li><li><a href="#" class="button go">Go</a></li><li><a href="#" class="button favorite">Favorite</a></li></ul></li>');
    
    

             }
                 $('.button.share').toggle(function() { 
        $('#share').fadeIn(200);
        $('#share').animate({ top: '32px' }, 300);
    }, 
    function() { 
        $('#share').fadeOut(300);
        $('#share').animate({ top: '28px'}, 300);
    })
    /* Close Share button */
    $('#share a').click(function() { 
        $('#share').fadeOut(300);
        $('#share').animate({ top: '28px'}, 300);
    })
             $.mobile.hidePageLoadingMsg();
             
 }
 function searchresultfunction(){
$.mobile.showPageLoadingMsg();
                   $.ajax({
                                                      data: {searchTxt: searchTxt,proid:proid,disid:disid,tumid:tumid,catid:catid,subcatid:subcatid},                                                            
                                                      url: webdir+'/ajax/getallshopbyname3',
                                                      dataType: "jsonp",
                                                      jsonp: 'callback',
                                                      jsonpCallback: 'searchresultlist', 
                                                      crossDomain:true,
                                                      xhrFields: {
                                                      withCredentials: true
                                                      },
                                                       success: function(myObject){
                                               
                                                      }
                           }); 
     
 }
 function setcat(myObject){
       $("select#subcat").html('');
      // var strdistrict='<option value="">เลือกอำเภอ/เขต</option>';
       var strtumbon='<option value="">เลือกหมวดหมู่ร้านค้า</option>'; 
      // var strtsubcat=$("select#subcat").html();
        var options='';


        options +=strtumbon;
         
         if(typeof(myObject.error) == 'undefined')
         {
         $.each(myObject, function(index2,data) {
                
             options += '<option value="' + data.subcatid + '">' +data.subcatname + '</option>';
        
             });
          }  

        // $("select#district").html(strdistrict);
         //$("select option#district:first").attr( 'selected' , ''  ) ; 
         $("select#subcat").html(options);
         var myselect = $("select#subcat");
          if(jQuery.isFunction(myselect.selectmenu))
         {
         myselect[0].selectedIndex = 0;
         myselect.selectmenu("refresh");
         }
}
 function searchfunction() {
     //alert('');
     $('#province').change(function() {
                            $.ajax({
                                                      data: {proid: $(this).val()},                                                            
                                                      url: webdir+'/ajax/getdistrict',
                                                      dataType: "jsonp",
                                                      jsonp: 'callback',
                                                      jsonpCallback: 'setdistrict', 
                                                      crossDomain:true,
                                                      xhrFields: {
                                                      withCredentials: true
                                                      },
                                                       success: function(myObject){
                                               
                                                      }
                                                    });
     });
     $('#cat').change(function() {


                   $.ajax({
                                                      data: {catid: $(this).val()},                                                            
                                                      url: webdir+'/ajax/getsubcat',
                                                      dataType: "jsonp",
                                                      jsonp: 'callback',
                                                      jsonpCallback: 'setcat', 
                                                      crossDomain:true,
                                                      xhrFields: {
                                                      withCredentials: true
                                                      },
                                                       success: function(myObject){
                                               
                                                      }
                                                    });
    
          }); 
     $('#district').change(function(){
     $.ajax({
                                                      data: {disid: $(this).val()},                                                            
                                                      url: webdir+'/ajax/gettumbon',
                                                      dataType: "jsonp",
                                                      jsonp: 'callback',
                                                      jsonpCallback: 'settumbon', 
                                                      crossDomain:true,
                                                      xhrFields: {
                                                      withCredentials: true
                                                      },
                                                       success: function(myObject){
                                               
                                                      }
     });
    
    
        });
        
    $("#btn-search").click(function()
    {
        searchTxt=$('#input-search').val();
        proid=$('#province').val();
        disid=$('#district').val();
        tumid=$('#tumbon').val();
        catid=$('#cat').val();
        subcatid=$('#subcat').val();
        $.mobile.changePage("searchresult.html", "flip", true, true);
    });
        
     
 }
jQuery(document).ready(function($){ 
	
	/* Open/Close Function */

	/******* EOS ********/
	
	/* 	Open Share button */

	/******* EOS ********/
});
$('div').live( 'pageshow',function(event, ui){
    
  
  switch ($('.ui-page-active').attr('id'))
{
case "index":
  indexfunction();
  break;
case "search":

  searchfunction();
  break;
case "searchresult":
  searchresultfunction();
  break;
default:
  
}
  
  try
  {
      $('.ui-page-active nav li:nth-child(2) a').click(function() { 
        $('.ui-page-active #function').animate({ top: '45px', useTranslate3d: true, leaveTransforms: true}, 800);
    })    
      $('.ui-page-active #function a, nav li:nth-child(1) a, nav li:nth-child(3) a, h1 > a, a[data-rel="back"]').click(function() { 
        $('.ui-page-active #function').animate({ top: '-=360px', useTranslate3d: true, leaveTransforms: true}, 800);
    })
  }
catch(err)
  {
  //Handle errors here
  }

    
    
        

    
    
  
});
