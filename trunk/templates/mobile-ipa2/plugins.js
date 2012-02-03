
// usage: log('inside coolFunc', this, arguments);
// paulirish.com/2009/log-a-lightweight-wrapper-for-consolelog/
var webdir='http://www.infostant.com';
var searchTxt;
var proid;
var disid;
var tumid;
var catid;
var subcatid;
var lastpage;
var mid;
var myCat=new Array();
myCat[1]="Home";       // argument to control array's size)
myCat[2]="Hotel";
myCat[4]="Restaurant";
myCat[5]="Coffee";
myCat[6]="Shop";
myCat[7]="Fashion";
myCat[8]="Hospital";
myCat[9]="Spa Beauty";
myCat[10]="Service";
myCat[11]="Commu";
myCat[12]="Sport";
myCat[17]="Seminar";
myCat[14]="Travel";
myCat[13]="Education";
myCat[15]="Other";
 var shopname;
 var shopurl;
 var lat;
 var lng;
 var  mySliderInstance;
 var temid;
 var errorset=0;
 var refcode;
 var sids;
 var fid;
 var myObject2;
 var sid2;
 var arraydata;
  var arraydata2;
  var events=[]; 

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

function array2json(arr)
{  var parts = [];
    var is_list = (Object.prototype.toString.apply(arr) === '[object Array]');
 
    for(var key in arr) {
        var value = arr[key];
        if(typeof value == "object") { //Custom handling for arrays
            if(is_list) parts.push(array2json(value));
            else parts[key] = array2json(value);
        } else {
            var str = "";
            if(!is_list) str = '"' + key + '":';
 
            //Custom handling for multiple data types
            if(typeof value == "number") str += value; //Numbers
            else if(value === false) str += 'false'; //The booleans
            else if(value === true) str += 'true';
            else str += '"' + value + '"'; //All other things
            // :TODO: Is there any more datatype we should be in the lookout for? (Functions?)
 
            parts.push(str);
        }
    }
    var json = parts.join(",");
     
    if(is_list) return '[' + json + ']';//Return numerical JSON
    return '{' + json +
    '}';//Return associative JSON
}
// place any jQuery/helper plugins in here, instead of separate, slower script files.
function getUrlVars2() {
        var vars = {};
        var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
            vars[key] = value;
        });
        return vars;
 }
function resetvalue(){
     subcatid="";
     proid="";
     disid="";
     tumid="";
     catid="";
     searchTxt="";
     mid="";
     shopname="";
     shopurl="";
     lat="";
     lng="";
     temid="";
     errorset=0;
     refcode="";
     sids="";
     fid="";
 }
function getWidth(){
    xWidth = null;
    if(window.screen != null)
      xWidth = window.screen.availWidth;
 
    if(window.innerWidth != null)
      xWidth = window.innerWidth;
 
    if(document.body != null)
      xWidth = document.body.clientWidth;
 
    return xWidth;
  }
function getHeight() {
  xHeight = null;
  if(window.screen != null)
    xHeight = window.screen.availHeight;
 
  if(window.innerHeight != null)
    xHeight =   window.innerHeight;
 
  if(document.body != null)
    xHeight = document.body.clientHeight;
 
  return xHeight;
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
$.mobile.hidePageLoadingMsg();

           
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
         $.mobile.hidePageLoadingMsg();
}
function setdatetime(valueText,inst)
{
    alert(valueText);
}
function setcalendar(sid)
{
    sid2=sid;
    $('#date'+sid).scroller('show');
    //alert(shopurl);
}
function saveoffline()
{
//    $('#searchresulthtml').html();

      localStorage.setItem("searchresulthtml",$('#searchresulthtml').html()); 
      alert('บันทึกเรียบร้อยแล้ว');
}
function setfav(sid)
{ 
    $.mobile.showPageLoadingMsg();
        if(localStorage.getItem("userId"))
        {
        $.post(webdir+'/ajax/savefav2',{sid:sid,mid:localStorage.getItem("userId")} ,function(data) {
            var myObject = eval('(' + data + ')');   
            if(myObject.resposne==1)
            {
                alert('เพิ่ม favarite เรียบร้อยแล้ว');
            }else
            {
                alert(myObject.resposne);
            }
            $.mobile.hidePageLoadingMsg();   
        });
        }
}
function clearsaveall()
{
                   localStorage.setItem('sidshop','');
                   localStorage.setItem('calendar','');
                   localStorage.setItem('searchresulthtml','');
}
//clearsaveall();
function searchresultlist(myObject){
    myObject2=myObject;
      var areaid=""; 
      var k=1;
      $('#searchresulthtml').html('');
       var arraydata={};
             for (variable in myObject)
             {   
          //   alert(variable) ;
             var obj = myObject[variable]; 
     //$('#searchresulthtml').append('<li><a  href="'+obj.shopurl+'" class="thumb"><img src="'+obj.pic+'" alt="'+obj.shopname+'" /></a><strong><a data-ajax="false" href="'+obj.shopurl+'">'+obj.shopname+'</a></strong><br />Time. '+obj.daterange+'<br />Tel.  '+obj.tel+'<br />'+obj.address+'</li><ul class="h"><li><a href="#" class="button delete">Delete</a></li><li><a href="#" class="button go">Go</a></li><li><a href="#" class="button favorite">Favorite</a></li><li class="date_add">26/10/2011 <strong>|</strong> 09:00</li></ul>');
    if($('.ui-page-active').attr('id')=="shop")
    {
      $('#searchresulthtml').append('<li><a href="'+obj.shopurl+'" class="thumb"><img src="'+obj.pic+'" alt="'+obj.shopname+'" /></a><strong><a href="'+obj.shopurl+'">'+obj.shopname+'</a></strong><br />Time. '+obj.daterange+'<br />Tel. '+obj.tel+'<br />'+obj.address+', '+obj.proname+'<ul class="h"><li><a data-ajax="false" href="'+obj.shopurl2+'" class="button edit">Edit</a></li><li><a href="#" class="button delete">Delete</a></li><li><a href="#" class="button promotion">Promotion</a></li><li><a href="#" class="button member">Member</a></li></ul></li>');      
    }else if($('.ui-page-active').attr('id')=="favarite")
    {
           var strtext= '<li><a href="'+obj.shopurl+'" class="thumb" ><img src="'+obj.pic+'" alt="'+obj.shopname+'" /></a><strong><a href="'+obj.shopurl+'">'+obj.shopname+'</a></strong><br />Time. '+obj.daterange+'<br />Tel. '+obj.tel+'<br />'+obj.address+', '+obj.proname+'<ul class="h"><li><a href="#" class="button delete">Delete</a></li><li><a class="button go share2" href="#">Go</a><ul id="share2" class=""><li><a href="#">infotstant</a></li><li><a href="#">facebook</a></li><li><a href="#">twitter</a></li><li><a href="#">google+</a></li><li><a href="#">email</a></li></ul></li><li><a href="javascript:setcalendar(\''+obj.sid+'\')" class="button calendar"></a><input type="text" class="datecalender" style="display:none" id="date'+obj.sid+'"></li></ul></li>';  
           
           
           var strtext2= '<li><a href="'+obj.shopurl+'" class="thumb"><img src="'+obj.pic+'" alt="'+obj.shopname+'" /></a><strong><a href="'+obj.shopurl+'">'+obj.shopname+'</a></strong><br />Time. '+obj.daterange+'<br />Tel. '+obj.tel+'<br />'+obj.address+', '+obj.proname+'<ul class="h"><li><a href="javascript:deletecalendar(\''+obj.sid+'\',\''+k+'\')" class="button delete">Delete</a></li><li><a class="button go share2" href="#">Go</a><ul id="share2" class=""><li><a href="#">infotstant</a></li><li><a href="#">facebook</a></li><li><a href="#">twitter</a></li><li><a href="#">google+</a></li><li><a href="#">email</a></li></ul></li><li class="dateshowset" id="date-'+obj.sid+'-'+k+'"></li></ul></li>'; 
           
           
            arraydata['text-'+obj.sid+'']=strtext2;
           
        
    $('#searchresulthtml').append(strtext);    
    }
    else
    {
    $('#searchresulthtml').append('<li><a href="'+obj.shopurl+'" class="thumb"><img src="'+obj.pic+'" alt="'+obj.shopname+'" /></a><strong><a href="'+obj.shopurl+'">'+obj.shopname+'</a></strong><br />Time. '+obj.daterange+'<br />Tel. '+obj.tel+'<br />'+obj.address+', '+obj.proname+'<ul class="h"><li><a href="#" class="button delete">Delete</a></li><li><a class="button go share2" href="#">Go</a><ul id="share2" class=""><li><a href="#">infotstant</a></li><li><a href="#">facebook</a></li><li><a href="#">twitter</a></li><li><a href="#">google+</a></li><li><a href="#">email</a></li></ul></li><li><a href="javascript:setfav(\''+obj.sid+'\')" class="button favorite"></a></li></ul></li>');    
    }
    
    
    

             }
             
    if($('.ui-page-active').attr('id')=="favarite")
    {    
               var jsonstring= JSON.stringify(arraydata);
               localStorage.setItem('sidshop',jsonstring);   
           
    }
                 

    
              setshare2();
    
             $.mobile.hidePageLoadingMsg();
             
 }
 function setshare2()
 {
       $('.button.share2').click(function(){
                if ( $(this).parent().children('#share2').css("display") == "block" ){
                
                $(this).parent().children('#share2').fadeOut(300);
                $(this).parent().children('#share2').animate({ top: '28px'}, 300);
                
               } else {
                   
                  $(this).parent().children('#share2').fadeIn(200);
                  $(this).parent().children('#share2').animate({ top: '32px' }, 300);
                
               }
            
            
        })
        
        $('#share2 a').click(function(){
                if ( $(this).parent().parent().css("display") == "block" ){
                
                $(this).parent().parent().fadeOut(300);
                $(this).parent().parent().animate({ top: '28px'}, 300);
                
               } else {
                   
                   $(this).parent().parent().fadeIn(200);
                   $(this).parent().parent().animate({ top: '32px' }, 300);
                
               }
        
        })
    
    $('.datecalender').scroller('enable').scroller({dateFormat :'yy-m-d',timeFormat :'HH:ii', preset: 'datetime', theme: 'sense-ui', mode: 'clickpick',onSelect: function(dateText, inst) {
//alert(dateText);
                 
       $.mobile.showPageLoadingMsg();
       var setcalendar=localStorage.getItem('calendar');   
       
       if(setcalendar)
       {
          // alert(setcalendar);
          var arraydata=jQuery.parseJSON(setcalendar);
          
         arraydata[''+dateText+'']=sid2;
         var jsonstring= JSON.stringify(arraydata);
         localStorage.setItem('calendar',jsonstring);   
          
       }else
       {
           var arraydata={};
           arraydata[''+dateText+'']=sid2;
           var jsonstring= JSON.stringify(arraydata);
           localStorage.setItem('calendar',jsonstring);  
         //alert(jsonstring);
           
       }
    alert('เพิ่ม วันที่ เรียบร้อยแล้ว');
    $.mobile.hidePageLoadingMsg();  
    //localStorage.setItem('calendar','');    
    
    }});
 }
 function searchresultfunction(){
$.mobile.showPageLoadingMsg();
                   $.ajax({
                                                      data: {searchTxt: searchTxt,proid:proid,disid:disid,tumid:tumid,catid:catid,subcatid:subcatid,mid:mid,sids:sids,fid:fid},                                                            
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
 function deletememory(meid)
 {
   //  alert(meid);
     $('#deleteid'+meid).simpledialog({
    'mode' : 'bool',
    'fullScreen':'true',
    'prompt' : 'คุณต้องการลบ Personal Memory นี้ หรือไม่ ?',
    'useModal': true,
    'buttons' : {
    'OK': {
        click: function () {
            $.mobile.showPageLoadingMsg();
           $.post(webdir+'/ajax/deletemorybymeid',{meid:meid }, function(data) {
               alert('ลบเรียบร้อยแล้ว');
               memoryresultfunction();
            $.mobile.hidePageLoadingMsg();   
           });
        }
      },
      'Cancel': {
        click: function () {

        },
        icon: "delete",
        theme: "c"
      }
    }
  });
     
     
     
 }
  function memoryresultlist(myObject){
      var areaid=""; 
      $('#searchresulthtml').html('');
             for (variable in myObject)
             {   
          //   alert(variable) ;
             var obj = myObject[variable]; 
     //$('#searchresulthtml').append('<li><a  href="'+obj.shopurl+'" class="thumb"><img src="'+obj.pic+'" alt="'+obj.shopname+'" /></a><strong><a data-ajax="false" href="'+obj.shopurl+'">'+obj.shopname+'</a></strong><br />Time. '+obj.daterange+'<br />Tel.  '+obj.tel+'<br />'+obj.address+'</li><ul class="h"><li><a href="#" class="button delete">Delete</a></li><li><a href="#" class="button go">Go</a></li><li><a href="#" class="button favorite">Favorite</a></li><li class="date_add">26/10/2011 <strong>|</strong> 09:00</li></ul>');

    $('#searchresulthtml').append('<li><a href="'+obj.memoryurl+'" class="thumb"><img src="'+obj.pic+'"  /></a><strong><a href="'+obj.memoryurl+'">'+obj.memoryname+'</a></strong><br />Time. '+obj.daterange+'<br />Tel. '+obj.tel+'<br />'+obj.address+', '+obj.proname+'<ul class="h"><li><a href="'+obj.memoryurl+'" class="button edit"></a></li><li><a class="button go share2" href="#">Go</a><ul id="share2" class=""><li><a href="#">infotstant</a></li><li><a href="#">facebook</a></li><li><a href="#">twitter</a></li><li><a href="#">google+</a></li><li><a href="#">email</a></li></ul></li><li><a id="deleteid'+obj.meid+'" href="javascript:deletememory(\''+obj.meid+'\')" class="button delete">Delete</a></li><li class="date_add">'+obj.date+'<strong>|</strong> '+obj.time+'</li></ul></li>');    

    
    
    

             }
            setshare2();
             $.mobile.hidePageLoadingMsg();
             
 }
 function memoryresultfunction(){
$.mobile.showPageLoadingMsg();
                   $.ajax({
                                                      data: {mid:localStorage.getItem("userId")},                                                            
                                                      url: webdir+'/ajax/getallmemorybymid',
                                                      dataType: "jsonp",
                                                      jsonp: 'callback',
                                                      jsonpCallback: 'memoryresultlist', 
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
           $.mobile.hidePageLoadingMsg();
}
 function searchfunction() {
     //alert('');
    
     $('#province').change(function() {
         $.mobile.showPageLoadingMsg();
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
    $.mobile.showPageLoadingMsg();

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
         $.mobile.showPageLoadingMsg();
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
         resetvalue();
        searchTxt=$('#input-search').val();
        proid=$('#province').val();
        disid=$('#district').val();
        tumid=$('#tumbon').val();
        catid=$('#cat').val();
        subcatid=$('#subcat').val();
        $.mobile.changePage("searchresult.html", "flip", true, true);
    });
        
     
 }
 function loginserver()
 {
     var errorcode='';
             if(localStorage.getItem("userId")=="")
                     {
                        if($('#username').val()=="")
                         {
 
                          errorcode='โปรดกรอก Username';  
                         }
                        else  if($('#password1').val()=="")
                         {
                          errorcode='โปรดกรอก Password';    
                         }
                      

                     }
                if(errorcode!="")
                         {
                            // navigator.notification.alert(errorcode);
                             alert(errorcode); 
                             return false;
                         } 
                $.post(webdir+'/ajax/loginformiphone',{username:$('#username').val(),password1:$('#password1').val() }, function(data) {
                var myObject = eval('(' + data + ')');             
                    if(myObject.error)
                           {
                              //navigator.notification.alert(myObject.error);
                              alert(myObject.error);
                              //    $('#buttonSave').attr("disabled", "false"); 
                                // return false;
                           }else  if(myObject.mid)
                           {
                               if(!localStorage.getItem("userId")){
                               localStorage.setItem("userId",myObject.mid);
                               localStorage.setItem("username",myObject.username); 
                               localStorage.setItem("emailprofile",myObject.emailprofile);
                               localStorage.setItem("picme",myObject.picme); 
                               }
                             //  navigator.notification.alert('เข้าสู่ระบบเรียบร้อยแล้ว'); 
                                alert('เข้าสู่ระบบเรียบร้อยแล้ว'); 
                                
                              // location.href="login.html";
                               $.mobile.changePage("profile_myprofile.html", "flip", true, true);
                           }
                });
 }
 function setlanding(myObject)
 { 

            if(myObject.shopname) {$('#shopname').html(myObject.shopname)}
          //  localStorage.setItem("recentview",''); 
             var retrievedObject = localStorage.getItem('recentview');
             var arraydata=new Array();
             if (retrievedObject) {
               //   alert(retrievedObject);
                  var arraydata = retrievedObject.split(",");

                  arraydata.push(myObject.sid); 
                }else
                {
                    
                    arraydata.push(myObject.sid);       // argument to control array's size)
                    
                    
                    
                }
                //alert(arraydata.join(","));
                localStorage.setItem("recentview",arraydata.join(",")); 


             
              if(myObject.pic1) {$('.intro').attr('src',myObject.pic1)}  
              if(myObject.title) {$('#title').html(myObject.title)}
              if(myObject.description) {$('#description').html(myObject.description)}  
              $('#testId').html('');                             
              for (variable in myObject.gallery)
             {
                 
                     $('#testId').append('<li class="royalSlide" ><a data-ajax="false" rel="external" href="'+myObject.gallery[variable]+'" class="linkImage"><img class="royalImage"  src="'+myObject.gallery[variable]+'" alt="Photo Gallery" /></a></li>')
                 
             }
               var mySliderInstance =  $('#myGallery2').royalSlider({               
                removeCaptionsOpacityInIE8:true,
                slideshowEnabled :true,
                imageAlignCenter:true
            }).data("royalSlider");         
            var mySliderInstance = $("#myGallery2").data("royalSlider");              
             mySliderInstance.updateSliderSize();
              if(myObject.video){$('#video').html('<a href=\''+myObject.video+'\'" target="_blank">'+myObject.video+'</a>')}else
              {
                 // var htmlstr ='<iframe width="284" height="174" src="http://www.youtube.com/embed/OoJj0YW4MU8" frameborder="0" allowfullscreen></iframe>';
            $('#clipvideo').hide(); 
                  
              }
              if(myObject.daterange){$('#time').html(myObject.daterange)}
              if(myObject.address){$('#address').html(myObject.address)} 
              if(myObject.tel){$('#tel').html(myObject.tel)} 
              if(myObject.emailshop){$('#emailshop').html('<a href="mailto:'+myObject.emailshop+'">'+myObject.emailshop+'</a>')} 
              if(myObject.website){$('#website').html('<a href="'+myObject.website+'" target="_blank">'+myObject.website+'</a>')} 
              if(myObject.pricerange){$('#pricerange').html(myObject.pricerange)} 
              
   
 var myOptions = {
    zoom: 10,
    center: new google.maps.LatLng(myObject.lat, myObject.lng),
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
   map = new google.maps.Map(document.getElementById("mapgoogle"),
                                myOptions);
    $('a.linkImage').fancybox();                            
    var image = new google.maps.MarkerImage(webdir+'/images/default/icons/'+myObject.icon,
      // This marker is 20 pixels wide by 32 pixels tall.
      new google.maps.Size(myObject.width, myObject.height),
      // The origin for this image is 0,0.
      new google.maps.Point(0,0),
      // The anchor for this image is the base of the flagpole at 0,32.
      new google.maps.Point(0, 35)); 
       var shape = {
      coord: [1, 1, 1, 20, 18, 20, 18 , 1],
      type: 'poly'
  };
   var myLatLng = new google.maps.LatLng(myObject.lat, myObject.lng);
    var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        icon: image,
        shape: shape,
        title: myObject.shopname,
        zIndex: 0
    });                                 

   $('#maplink').attr('href','map.html?shopurl='+getUrlVars2()['shopurl']) ; 
 // setMarkers(map, beaches);
              
                $('#landing').show();  
                $.mobile.hidePageLoadingMsg();  
 }
 function landingfunction()
 {
    $.mobile.showPageLoadingMsg();

     $.ajax({
                                                      data: {shopurl: getUrlVars2()['shopurl']},                                                            
                                                      url: webdir+'/ajax/getshopbysub',
                                                      dataType: "jsonp",
                                                      jsonp: 'callback',
                                                      jsonpCallback: 'setlanding', 
                                                      crossDomain:true,
                                                      xhrFields: {
                                                      withCredentials: true
                                                      },
                                                       success: function(myObject){
                                               
                                                      }
                            });
 }
 function accesspage()
 {
   // localStorage.setItem("userId",'');
 //  localStorage.setItem("username",''); 
     if(localStorage.getItem("userId"))
              {
           
              return true;
                  
              }else
              {
              lastpage=$('.ui-page-active').attr('id');     
              
              $.mobile.changePage("login.html", "flip", true, true);    
              }
              return false;
 }
 function settingfunction()
 {
     
 }
 function setshoplist(myObject)
 {
     
 }
 function shopfunction()
 {
       
        resetvalue();
        mid=localStorage.getItem("userId")
        searchresultfunction();
 }
 function registershopfunction()
 {
     initialize();
     $('#province').change(function() {
         if($(this).val())
    {
      
        showAddress($("#province option[value='"+$(this).val()+"']").text());
    }
         $.mobile.showPageLoadingMsg();
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
    $.mobile.showPageLoadingMsg();

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
             if($(this).val())
    {
      
        showAddress($("#province option[value='"+$('#province').val()+"']").text()+' '+$("#district option[value='"+$('#district').val()+"']").text());
    }
         $.mobile.showPageLoadingMsg();
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
    $('#tumbon').change(function(){
             if($(this).val())
                {
                  
                    showAddress($("#province option[value='"+$('#province').val()+"']").text()+' '+$("#district option[value='"+$('#district').val()+"']").text()+' '+$("#tumbon option[value='"+$('#tumbon').val()+"']").text());
                }   
            });
 }

 function nextstep1()
{
        resetvalue();
        if($('#shopurl').val()=="")
        {
           errorset=1; 
        }else if($('#shopname').val()=="")
        {
          errorset=1;  
        }else if($('#province').val()=="")
        {
          errorset=1;  
        }else if($('#district').val()=="")
        {
          errorset=1;  
        }else if($('#tumbon').val()=="")
        {
          errorset=1;  
        }else if($('#cat').val()=="")
        {
          errorset=1;  
        }
        else if($('#subcat').val()=="")
        {
          errorset=1;  
        }
        
        if(errorset==1)
        {
        // navigator.notification.alert("ท่านกรอกข้อมูลไม่ครบ");
          alert("ท่านกรอกข้อมูลไม่ครบ");   
          return false;
        }
        else{
            
        
        $.post(webdir+'/ajax/checkshopurl',{shopurl:$('#shopurl').val() }, function(data3) {
                         if(!eval(data3))
                         {
                         // navigator.notification.alert("url ที่ท่านกรอกซ้ำ");   
                         alert("url ที่ท่านกรอกซ้ำ"); 
                         }else
                         {
                            
                             
                             
                             
                             
                         proid=$('#province').val();
                         disid=$('#district').val();
                         tumid=$('#tumbon').val();
                         catid=$('#cat').val();
                         subcatid=$('#subcat').val();
                         shopname=$('#shopname').val();
                         shopurl=$('#shopurl').val();
                         lat=$('#lat').val();
                         lng=$('#lng').val();
                         refcode=$('#refcode').val();
                         $.mobile.changePage("templatesshop.html", "flip", true, true); 
                         
                         
                         }
                         
                                
        });
        
        
        
        }
        
}
 function nextstep2()
 {
     $.mobile.showPageLoadingMsg();
     $('#buttonSave').attr("disabled", "true"); 
     $('#buttonSave').html('Loading');
     $.post(webdir+'/ajax/submitformiphone',{
       mid:localStorage.getItem("userId"),catid:catid
     ,subcatid:subcatid,shopname:encodeURIComponent(shopname),shopurl:shopurl
     ,proid:proid,disid:disid,tumid:tumid,temid:$('#temid').val()
     ,refcode:refcode,lat:lat,lng:lng
     }, function(data) {
         var myObject = eval('(' + data + ')');
          if(myObject.error)
                           {
                                 //navigator.notification.alert(myObject.error);
                                 alert(myObject.error); 
                                 $('#buttonSave').attr("disabled", "false"); 
                                 $('#buttonSave').html('Submit');
                                // return false;
                                $.mobile.hidePageLoadingMsg();
                           } if(myObject.shopurl)
                           {

                              // navigator.notification.alert('บันทึกข้อมูลเรียบร้อยแล้ว');  
                               alert("บันทึกข้อมูลเรียบร้อยแล้ว"); 
                               $.mobile.hidePageLoadingMsg();
                            //   $.mobile.changePage("shopedit.html?shopurl="+myObject.shopurl, "flip", true, true); 
                                location.href="shopedit.html?shopurl="+myObject.shopurl;
                           }
                           
     });
 }
function checktemplate()
{
            var id=mySliderInstance.currentSlideId;
           // alert(id);
           var temp= $('.royalImage-'+id).attr('id');
           temid=temp.replace('tem-', '');
           $('#temid').val(temid);
           
           //alert(temid);
          
     }
function addmemoryserver()
{
    $.post(webdir+'/ajax/savememory',{username:localStorage.getItem("username"),mid:localStorage.getItem("userId"),template:$('#temid').val(),memoryurl:$('#memoryurl').val()} ,function(data) {

               
               var myObject = eval('(' + data + ')');

               if(myObject.error)
               {
                    alert(myObject.error);
               }else{
                  // alert();
                   
                   alert('บันทึกข้อมูลเรียบร้อยแล้ว');
                  // alert(webdir+'/memory/'+myObject.username+'/'+myObject.memoryurl);
                
                   $.mobile.changePage("memoryedit.html?meid="+myObject.meid, "flip", true, true); 
               }
               
              
               
           });
}
function templatesshopfunction()
{
     mySliderInstance =  $('#myGallery2').royalSlider({               
                removeCaptionsOpacityInIE8:true,
                imageAlignCenter:true,
                beforeSlideChange:checktemplate,
                afterSlideChange:checktemplate

            }).data("royalSlider");
}
function myprofilefunction()
{

  $('#username').html(localStorage.getItem("username"));  
  $('#emailprofile').html(localStorage.getItem("emailprofile"));
  memoryresultfunction();
}
function addmemoryfunction()
{
    templatesshopfunction();
}
function registerserver()
{
     $.mobile.showPageLoadingMsg();
  //   $('#buttonSave').attr("disabled", ""); 
  //   $('#buttonSave').html('Loading');
     $.post(webdir+'/ajax/submitformregisteriphone',{email:$('#input-email').val(),
     username:$('#username').val(),password1:$('#password1').val(),status:1
       
     }, function(data) {
         var myObject = eval('(' + data + ')');
          if(myObject.error)
                           {
                           // navigator.notification.alert(myObject.error);  
                                 alert(myObject.error); 
                                $.mobile.hidePageLoadingMsg();
                           } 
          if(myObject.mid)
                           {
                                 if(!localStorage.getItem("userId")){
                               localStorage.setItem("userId",myObject.mid);
                               localStorage.setItem("username",myObject.username); 
                               localStorage.setItem("emailprofile",myObject.emailprofile);
                               localStorage.setItem("picme",myObject.picme); 
                               }
                               
                              // navigator.notification.alert('บันทึกข้อมูลเรียบร้อยแล้ว');  
                               alert("บันทึกข้อมูลเรียบร้อยแล้ว"); 
                               $.mobile.hidePageLoadingMsg();
                               $.mobile.changePage("profile_myprofile.html", "flip", true, true); 
                           }
                           
     });
}
function recentfunction()
{
    var retrievedObject = localStorage.getItem('recentview');
      if (retrievedObject) {
                    resetvalue();
                    sids=retrievedObject;
                    
                    searchresultfunction();
               //   alert(retrievedObject);
                //  var arraydata = retrievedObject.split(",");

                 // arraydata.push(myObject.sid); 
                }
}
function favaritefunction()
{
    resetvalue();
    fid=1;
    mid=localStorage.getItem('userId');;
    $.post(webdir + "/ajax/testconnect",
                function(data) {
                    if(!data) {
                        $('#searchresulthtml').html('');
                        $('#searchresulthtml').html(localStorage.getItem('searchresulthtml'));
                        setshare2();
                        return false;
                    }else
                    {
                      searchresultfunction();  
                    }
                    // continue internet connection is OK
                }).error(function() {
                $('#searchresulthtml').html('');
                $('#searchresulthtml').html(localStorage.getItem('searchresulthtml'));
                setshare2();
                
                // alert('no online'); 
                return false;
                
                });


 //    alert(online) ;
   //  if (online) {
//    searchresultfunction();
//  } else {
//      alert('no online');
    //document.getElementById('jquery_loader').src = '/javascripts/jquery.js';
//  }

    
    
}
function deletecalendar(sid,k)
{
    
    $('#date-'+sid+'-'+k).simpledialog({
    'mode' : 'bool',
    'fullScreen':'true',
    'prompt' : 'คุณต้องการลบ activity นี้ หรือไม่ ?',
    'useModal': true,
    'buttons' : {
    'OK': {
        click: function () {
            $.mobile.showPageLoadingMsg();
           
            var dateselected=$('#date-'+sid+'-'+k).html();
          
            delete arraydata[dateselected];
            var jsonstring= JSON.stringify(arraydata);
            localStorage.setItem('calendar',jsonstring);
            var arraydate1= dateselected.split(" ");
            setcalendarevent2(arraydate1[0]);
            
            
            $.post(webdir + "/ajax/deleteitenary",{datetime:dateselected,mid:localStorage.getItem('userId')},
                function(data) {
                    
                    
                $.mobile.hidePageLoadingMsg();   
                    
                }).error(function() {
              
                
                
                $.mobile.hidePageLoadingMsg(); 
                
                });
            
            
           
           
            
          
        }
      },
      'Cancel': {
        click: function () {

        },
        icon: "delete",
        theme: "c"
      }
    }
  });
    
    

    
}
function setcalendarevent2(datecheck)
{
     
       
//       var arraydate1= $(this).attr('date').split("/");
  //     arraydate1[0];
   //    arraydate1[1];
    //   arraydate1[2];
      var selectdate= datecheck;
        $('#searchresulthtml').html('');
        $('#activity').html('Activity '+selectdate);
          
           for(i in arraydata)
            {
                var arraydate1= i.split(" ");
                
               
                if(arraydate1[0]==selectdate)
                {
                   // console.log(arraydata2['text-'+arraydata[i]]);
                    console.log(i);
                    $('#searchresulthtml').append(arraydata2['text-'+arraydata[i]]);
                    $(".dateshowset:last").html(i);

                
                }
                
                
              //  var arraydate2=arraydate1[0].split("-"); 
                
            }
       
       
       
       
         
            $('.relative, .subpage').fadeIn(300);
            $.scrollTo('#activity',800);
            setshare2();
    
}
function setcalendarevent()
{
          $('.event2').click(function() {
       
       var arraydate1= $(this).attr('date').split("/");
  //     arraydate1[0];
   //    arraydate1[1];
    //   arraydate1[2];
      var selectdate= arraydate1[2]+'-'+arraydate1[0]+'-'+arraydate1[1];
        $('#searchresulthtml').html('');
        $('#activity').html('Activity '+selectdate);
          
           for(i in arraydata)
            {
                var arraydate1= i.split(" ");
                
               
                if(arraydate1[0]==selectdate)
                {
                   // console.log(arraydata2['text-'+arraydata[i]]);
                   
                    $('#searchresulthtml').append(arraydata2['text-'+arraydata[i]]);
                    $(".dateshowset:last").html(i);

                
                }
                
                
              //  var arraydate2=arraydate1[0].split("-"); 
                
            }
       
       
           
       
        
            $('.relative, .subpage').fadeIn(300);
            $.scrollTo('#activity',800);
            setshare2();
         });
}
function calendarset2()
{
    var options = {
onMonthChangedFinish: function(dateIn) {
  
 setcalendarevent();   
//this could be an Ajax call to the backend to get this months events
return true;
}

};
    
    var sidshop=localStorage.getItem('sidshop');
    var k=0;
    arraydata2=jQuery.parseJSON(sidshop);  
          for(i in arraydata)
            {
               
                var arraydate1= i.split(" ");
                var arraydate2=arraydate1[0].split("-"); 

                events[k]={ EventID:k+1, "Date": new Date(arraydate2[0], arraydate2[1]-1, arraydate2[2])};
                k++;
            }
    
    
    $.calendar.Initialize(options,events);
    setcalendarevent();
}
function calendarfunction()
{




      var setcalendar=localStorage.getItem('calendar'); 
 

      
      
       if(setcalendar)
       {
          
          
          
          arraydata=jQuery.parseJSON(setcalendar);
          
          $.mobile.showPageLoadingMsg();
          $.post(webdir + "/ajax/saveitenary",{calendar:arraydata,mid:localStorage.getItem('userId')},
                function(data) {
                    if(!data) {
                      
                      
                      calendarset2();    
                      $.mobile.hidePageLoadingMsg(); 
                    }else
                    {
                      arraydata=jQuery.parseJSON(data);
                      localStorage.setItem('calendar',data);
                      calendarset2()
                      $.mobile.hidePageLoadingMsg(); 
                    }
                    // continue internet connection is OK
                }).error(function() {
              
                
                calendarset2();
                $.mobile.hidePageLoadingMsg(); 
                
                });
          
          
          


   
          
       }else
       {
           var options = {
onMonthChangedFinish: function(dateIn) {
  
 //setcalendarevent();   
//this could be an Ajax call to the backend to get this months events
return true;
}

};

$.calendar.Initialize(options);


       }

       




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
    
case "calendar":
   if(accesspage())
  {
  calendarfunction();
  }
  break;    
case "index":
  indexfunction();
  break;
  
case "favarite":
 if(accesspage())
  {
  favaritefunction();
  }
  break;  
  
case "recent":
  recentfunction();
  break;
  case "memory":
     if(accesspage())
  {
      memoryresultfunction();
  }
  
  break;
case "search":
  searchfunction();
  break;
case "searchresult":
  if(searchTxt)$('#wordTxt').html('คำค้นหา '+searchTxt); 
  searchresultfunction();
  break;
case "cat_list":
  resetvalue();
  catid=getUrlVars2()['catid'];
  $('#wordTxt').html(myCat[catid]);
  searchresultfunction();
  break;
case "landing":
  landingfunction();
  break;
  case "addmemory":
  addmemoryfunction();
  break;
  case "shop":
  if(accesspage())
  {
    shopfunction();  
  }
  
  break;
  case "setting":
   if(accesspage())
  {
    settingfunction();
  }
  
  break;
    case "templatesshop":
   if(accesspage())
  {
    templatesshopfunction();
  }
  
  break;
    case "memoryedit":
   if(accesspage())
  {
      setMemoryEdit();
 //  setLoadBrowser('memoryeditframe.html?shopurl=tazushabuyaki'); 
  }
  break;
  case "shopedit":
   if(accesspage())
  {
    setShopEdit(); 
  }
  break;
  case "profile-myprofile":
   if(accesspage())
  {
  
      myprofilefunction();
      
  }
  break;
  case "registershop":
    if(accesspage())
  {
  registershopfunction();
  }
  break;
    case "logout":

   localStorage.setItem("userId",'');
   localStorage.setItem("username",'');
   localStorage.setItem("emailprofile",'');
   localStorage.setItem("picme",'');
   $.mobile.changePage("index.html", "flip", true, true); 

  break;
  case "map":
  $('#map_canvas').css('width' , getWidth());
  $('#map_canvas').css('height' , getHeight());
  setMap();
  break;
default:
  
}
  var viewport = $("head meta[name=viewport]");   
  viewport.attr('content', 'width=320, initial-scale=1, user-scalable=no'); 
  try
  {
   
      if($('.ui-page-active').attr('id')!="index")  
      {
          if(localStorage.getItem("userId"))
          {
             $('.ui-page-active #function .v').append('<li><a href="logout.html"><span>logout</span></a></li>'); 
          }else
          {
             $('.ui-page-active #function .v').append('<li><a href="login.html"><span>login</span></a></li>');  
          }
          
      }else
      {
          if(localStorage.getItem("userId"))
          {
               $('#logid').html('logout');
               $('#loglink').attr('href','logout.html');
               
          }else
          {
              $('#logid').html('login');
              $('#loglink').attr('href','login.html');
          }
         
      }    

      
      $('.ui-page-active nav li:nth-child(2) a').click(function() { 
        $('.ui-page-active #function').animate({ top: '45px', useTranslate3d: true, leaveTransforms: true}, 1000);
    })    
      $('.ui-page-active #function a, nav li:nth-child(1) a, nav li:nth-child(3) a, h1 > a, a[data-rel="back"]').click(function() { 
        $('.ui-page-active #function').animate({ top: '-=360px', useTranslate3d: true, leaveTransforms: true}, 1000);
    })
 
 
 
 if($('.ui-page-active').attr('id')=="social-qrcode"||$('.ui-page-active').attr('id')=="social-contact"||$('.ui-page-active').attr('id')=="social-rfcode")
 {
    if (navigator.userAgent.toLowerCase().match(/iphone/) ) 
    {
        $("input[type='radio']").click(function() {
        if($("#radio-choice-a").attr("checked") != "undefined" &&$("#radio-choice-a").attr("checked") == "checked")
           {
             
             $.mobile.changePage("contact.html", "flip", true, true);
                               
           }
           else if($("#radio-choice-b").attr("checked") != "undefined" &&$("#radio-choice-b").attr("checked") == "checked")
           {
            $.mobile.changePage("rfcode.html", "flip", true, true);   
               
           }else
           {
               
            $.mobile.changePage("qr.html", "flip", true, true);     
               
           }
        
        
        });
        
        
        
    }
    else
    {
        
    }  
 }else
  {
 if (navigator.userAgent.toLowerCase().match(/iphone/) ) 
 {
                                       //  document.write('<script charset="utf-8" src="ios\/phonegap-1.2.0.js"><\/script>');
                                   
$("input[type='radio']").click(function() {
  if($("#radio-choice-c").attr("checked") != "undefined" &&$("#radio-choice-c").attr("checked") == "checked")
           {
             
             $.mobile.changePage("profile_myprofile.html", "flip", true, true);
                               
          }else
           {
               $.mobile.changePage("shop.html", "flip", true, true);
           }
});
                                       
                                         }
else
{
                                             
                                      
       $("fieldset").click(function() {
           if($("#radio-choice-c").attr("checked") != "undefined" &&$("#radio-choice-c").attr("checked") == "checked")
           {
               $.mobile.changePage("shop.html", "flip", true, true);
           }else
           {
               $.mobile.changePage("profile_myprofile.html", "flip", true, true);
           }
});
   }
  
  }


    
    
    
  }
catch(err)
  {
  //Handle errors here
  }

    
    
        

    
    
  
});
