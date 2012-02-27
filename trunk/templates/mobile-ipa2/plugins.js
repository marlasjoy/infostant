
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
var myScroll="";
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
 var username;
 var password;
  var emailuser;
 var shopurl;
 var lat;
 var lng;
 var  mySliderInstance;
 var temid;
 var errorset=0;
 var refcode;
 var keyword;
 var sids;
 var fid;
 var myObject2;
 var sid2;
 var arraydata;
  var arraydata2;
  var events=[]; 
  var start=0;
  var limit=10;
  var submid;
  var tempproid;
  var tempdisid;
  var temptumid;
  var startchange;

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
     username="";
     password="";
     emailuser="";
     start=0;
     submid="";
     myScroll="";
     keyword="";
     startchange=0;
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
      //navigator.notification.alert('');
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
         if($('.ui-page-active').attr('id')=="registeraffiliate")
         {
             if(typeof  tempdisid !='undefined'&&startchange!=1){
                 
              $("select#district").val(tempdisid); 
                    if(tempdisid)
    {
      
     //   showAddress($("#province option[value='"+tempproid+"']").text()+' '+$("#district option[value='"+tempdisid+"']").text());
   
     //    $.mobile.showPageLoadingMsg();
     $.ajax({
                                                      data: {disid: tempdisid},                                                            
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
          }     
             }

         }
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
         
          if($('.ui-page-active').attr('id')=="registeraffiliate")
         {
          //   alert(temptumid);
             if(typeof  temptumid !='undefined'&&startchange!=1){
              $("select#tumbon").val(temptumid); 
                           if(temptumid)
                {
                  
                    showAddress($("#province option[value='"+tempproid+"']").text()+' '+$("#district option[value='"+tempdisid+"']").text()+' '+$("#tumbon option[value='"+temptumid+"']").text());
                }  
             }
             
 

         }
         
         myselect.selectmenu("refresh");
         }
         $.mobile.hidePageLoadingMsg();
}
function setdatetime(valueText,inst)
{
    navigator.notification.alert(valueText);
}
function setcalendar(sid)
{
    sid2=sid;
    $('#date'+sid).scroller('show');
    //navigator.notification.alert(shopurl);
}
function saveoffline()
{
//    $('.ui-page-active #searchresulthtml').html();

      localStorage.setItem("searchresulthtml",$('.ui-page-active #searchresulthtml').html()); 
      navigator.notification.alert('บันทึกเรียบร้อยแล้ว');
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
                navigator.notification.alert('เพิ่ม favarite เรียบร้อยแล้ว');
            }else
            {
                navigator.notification.alert(myObject.resposne);
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
myScroll='';
  //  alert(('#shop').html());
        if(myObject!= null)
    {
  //  myObject2=myObject;
      var areaid=""; 
      var k=1;
      if(start==0)
      {
      $('.ui-page-active #searchresulthtml').html('');
      }
       if($('.ui-page-active').attr('id')=="favarite")
    {
      var arraydata={};
    }
      for (variable in myObject)
      {   
          //   navigator.notification.alert(variable) ;
             var obj = myObject[variable]; 
     //$('.ui-page-active #searchresulthtml').append('<li><a  href="'+obj.shopurl+'" class="thumb"><img src="'+obj.pic+'" alt="'+obj.shopname+'" /></a><strong><a data-ajax="false" href="'+obj.shopurl+'">'+obj.shopname+'</a></strong><br />Time. '+obj.daterange+'<br />Tel.  '+obj.tel+'<br />'+obj.address+'</li><ul class="h"><li><a href="#" class="button delete">Delete</a></li><li><a href="#" class="button go">Go</a></li><li><a href="#" class="button favorite">Favorite</a></li><li class="date_add">26/10/2011 <strong>|</strong> 09:00</li></ul>');
    if($('.ui-page-active').attr('id')=="shop"||$('.ui-page-active').attr('id')=="affiliate")
    {
      $('.ui-page-active #searchresulthtml').append('<li><a href="'+obj.shopurl+'"  class="thumb"><img src="'+obj.pic+'" alt="'+obj.shopname+'" /></a><strong><a href="'+obj.shopurl+'">'+obj.shopname+'</a></strong><br />Time. '+obj.daterange+'<br />Tel. '+obj.tel+'<br />'+obj.address+', '+obj.proname+'<ul class="h"><li><a data-ajax="false" href="'+obj.shopurl2+'" class="button edit">Edit</a></li><li><a href="javascript:deleteshop(\''+obj.shopurl3+'\')" id="deleteid'+obj.shopurl3+'" class="button delete">Delete</a></li><li><a href="#" class="button promotion">Promotion</a></li><li><a href="#" class="button member">Member</a></li></ul></li>');      
    }else if($('.ui-page-active').attr('id')=="favarite")
    {
           var strtext= '<li><a href="'+obj.shopurl+'" class="thumb" ><img src="'+obj.pic+'" alt="'+obj.shopname+'" /></a><strong><a href="'+obj.shopurl+'">'+obj.shopname+'</a></strong><br />Time. '+obj.daterange+'<br />Tel. '+obj.tel+'<br />'+obj.address+', '+obj.proname+'<ul class="h"><li><a href="#" class="button delete">Delete</a></li><li><a class="button go share2" href="#">Go</a><ul id="share2" class=""><li><a href="javascript:openshare(\''+obj.shopurl3+'\',\'infostant\')">infotstant</a></li><li><a href="javascript:openshare(\''+obj.shopurl3+'\',\'facebook\')">facebook</a></li><li><a href="javascript:openshare(\''+obj.shopurl3+'\',\'twitter\')">twitter</a></li><li><a href="javascript:openshare(\''+obj.shopurl3+'\',\'google\')">google+</a></li><li><a href="javascript:openshare(\''+obj.shopurl3+'\',\'email\')">email</a></li></ul></li><li><a href="javascript:setcalendar(\''+obj.sid+'\')" class="button calendar"></a><input type="text" class="datecalender" style="display:none" id="date'+obj.sid+'"></li></ul></li>';  
           
           
           var strtext2= '<li><a href="'+obj.shopurl+'" class="thumb"><img src="'+obj.pic+'" alt="'+obj.shopname+'" /></a><strong><a href="'+obj.shopurl+'">'+obj.shopname+'</a></strong><br />Time. '+obj.daterange+'<br />Tel. '+obj.tel+'<br />'+obj.address+', '+obj.proname+'<ul class="h"><li><a href="javascript:deletecalendar(\''+obj.sid+'\',\''+k+'\')" class="button delete">Delete</a></li><li><a class="button go share2" href="#">Go</a><ul id="share2" class=""><li><a href="javascript:openshare(\''+obj.shopurl3+'\',\'infostant\')">infotstant</a></li><li><a href="javascript:openshare(\''+obj.shopurl3+'\',\'facebook\')">facebook</a></li><li><a href="javascript:openshare(\''+obj.shopurl3+'\',\'twitter\')">twitter</a></li><li><a href="javascript:openshare(\''+obj.shopurl3+'\',\'google\')">google+</a></li><li><a href="javascript:openshare(\''+obj.shopurl3+'\',\'email\')">email</a></li></ul></li><li class="dateshowset" id="date-'+obj.sid+'-'+k+'"></li></ul></li>'; 
           
           
            arraydata['text-'+obj.sid+'']=strtext2;
           
        
    $('.ui-page-active #searchresulthtml').append(strtext);    
    }   
    else
    {
    $('.ui-page-active #searchresulthtml').append('<li><a href="'+obj.shopurl+'" class="thumb"><img src="'+obj.pic+'" alt="'+obj.shopname+'" /></a><strong><a href="'+obj.shopurl+'">'+obj.shopname+'</a></strong><br />Time. '+obj.daterange+'<br />Tel. '+obj.tel+'<br />'+obj.address+', '+obj.proname+'<ul class="h"><li><a class="button go share2" href="#">Go</a><ul id="share2" class=""><li><a href="javascript:openshare(\''+obj.shopurl3+'\',\'infostant\')">infotstant</a></li><li><a href="javascript:openshare(\''+obj.shopurl3+'\',\'facebook\')">facebook</a></li><li><a href="javascript:openshare(\''+obj.shopurl3+'\',\'twitter\')">twitter</a></li><li><a href="javascript:openshare(\''+obj.shopurl3+'\',\'google\')">google+</a></li><li><a href="javascript:openshare(\''+obj.shopurl3+'\',\'email\')">email</a></li></ul></li><li><a href="javascript:setfav(\''+obj.sid+'\')" class="button favorite"></a></li></ul></li>');    
    }
    
    
            start=start+1;

             }
             
       if($('.ui-page-active').attr('id')=="favarite")
       {    
               var jsonstring= JSON.stringify(arraydata);
               localStorage.setItem('sidshop',jsonstring);   
           
       }
                 

            
             setshare2();
    
             
             if($('.ui-page-active').attr('id')=="shop")
    {
        //    if(myScroll)
//            {
//               myScroll.refresh();
//            }else
//            {
//                
       //  var      myScroll5 = new iScroll('wapper');  

//            }
        var elem = $('#wapper');
        elem.iscroll();
        elem.bind('onScrollEnd', function(e, iscroll){
         //   alert($(this).attr('id') +' - '+ iscroll);
        });

    }else if($('.ui-page-active').attr('id')=="cat_list")
    {
          // myScroll = new iScroll('wappercat'); 
           
           

             var elem = $('#wappercat');
        elem.iscroll();
        elem.bind('onScrollEnd', function(e, iscroll){
         //   alert($(this).attr('id') +' - '+ iscroll);
        });
            
            
    }else if($('.ui-page-active').attr('id')=="affiliate")
    {
          // myScroll = new iScroll('wappercat'); 
           
           

            
            
               var elem = $('#wapperaff');
        elem.iscroll();
        elem.bind('onScrollEnd', function(e, iscroll){
         //   alert($(this).attr('id') +' - '+ iscroll);
        });
    }
    $.mobile.hidePageLoadingMsg();
    }else
    {
        $.mobile.hidePageLoadingMsg();
    }
}
 function setshare2()
 {
      if($('.ui-page-active').attr('id')=="cat_list"||$('.ui-page-active').attr('id')=="favarite")
      {
       $('.ui-page-active.button.share2').click(function(){
                if ( $(this).parent().children('#share2').css("display") == "block" ){
                
                $(this).parent().children('#share2').fadeOut(300);
                $(this).parent().children('#share2').animate({ top: '28px'}, 300);
                
               } else {
                   
                  $(this).parent().children('#share2').fadeIn(200);
                  $(this).parent().children('#share2').animate({ top: '32px' }, 300);
                
               }
            
            
        })
        
        $('.ui-page-active#share2 a').click(function(){
                if ( $(this).parent().parent().css("display") == "block" ){
                
                $(this).parent().parent().fadeOut(300);
                $(this).parent().parent().animate({ top: '28px'}, 300);
                
               } else {
                   
                   $(this).parent().parent().fadeIn(200);
                   $(this).parent().parent().animate({ top: '32px' }, 300);
                
               }
        
        })
        
      }
    if($('.ui-page-active').attr('id')=="favarite")
    {
    $('.ui-page-active.datecalender').scroller('enable').scroller({dateFormat :'yy-m-d',timeFormat :'HH:ii', preset: 'datetime', theme: 'sense-ui', mode: 'clickpick',onSelect: function(dateText, inst) {
//navigator.notification.alert(dateText);
                 
       $.mobile.showPageLoadingMsg();
       var setcalendar=localStorage.getItem('calendar');   
       
       if(setcalendar)
       {
          // navigator.notification.alert(setcalendar);
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
         //navigator.notification.alert(jsonstring);
           
       }
    navigator.notification.alert('เพิ่ม วันที่ เรียบร้อยแล้ว');
    $.mobile.hidePageLoadingMsg();  
    //localStorage.setItem('calendar','');    
    
    }});
    }
 }
 function loadmore()
 {
     searchresultfunction();
 }
 function searchresultfunction(){
$.mobile.showPageLoadingMsg();

$.get(webdir+'/ajax/getallshopbyname3',{searchTxt: searchTxt,proid:proid,disid:disid,tumid:tumid,catid:catid,subcatid:subcatid,mid:mid,sids:sids,fid:fid,start:start,limit:limit,submid:submid}, function(data) {
    
     var myObject = eval('(' + data + ')');
//    alert(data);
   searchresultlist(myObject);
  //$('.result').html(data);
  //alert('Load was performed.');
}).error(function() {
                                
                                
                                
                                alert('error');
                                
                                });


//                  var req = $.ajax({
//                                                      data: {searchTxt: searchTxt,proid:proid,disid:disid,tumid:tumid,catid:catid,subcatid:subcatid,mid:mid,sids:sids,fid:fid,start:start,limit:limit,submid:submid},                                                            
//                                                      url: webdir+'/ajax/getallshopbyname3',
//                                                      dataType: "jsonp",
//                                                      jsonp: 'callback',
//                                                      jsonpCallback: 'searchresultlist', 
//                                                      timeout : 10000,
//                                                       success: function(myObject){
//                                               
//                                                      }
//                           }); 
//                           
//req.success(function() {
//    console.log('Yes! Success!');
//});

//req.error(function() {
//    console.log('Oh noes!');
//});

     
 }
 function deletememory(meid)
 {
   //  navigator.notification.alert(meid);
     $('#deleteid'+meid).simpledialog({
    'mode' : 'bool',
    'fullScreen':'false',
    'prompt' : 'คุณต้องการลบ Personal Memory นี้ หรือไม่ ?',
    'useModal': true,
    'buttons' : {
    'OK': {
        click: function () {
            $.mobile.showPageLoadingMsg();
           $.post(webdir+'/ajax/deletemorybymeid',{meid:meid,mid:localStorage.getItem("userId") }, function(data) {
               navigator.notification.alert('ลบเรียบร้อยแล้ว');
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
  function deleteshop(shopurl)
 {
   //  navigator.notification.alert(meid);
     $('#deleteid'+shopurl).simpledialog({
    'mode' : 'bool',
    'fullScreen':'false',
    'prompt' : 'คุณต้องการลบ ร้านค้า นี้ หรือไม่ ?',
    'useModal': true,
    'buttons' : {
    'OK': {
        click: function () {
            $.mobile.showPageLoadingMsg();
           $.post(webdir+'/ajax/deletemorybyshopurl',{shopurl:shopurl,mid:localStorage.getItem("userId") }, function(data) {
               navigator.notification.alert('ลบเรียบร้อยแล้ว');
               searchresultfunction();
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
      
      $('.ui-page-active #searchresulthtml').html('');
             for (variable in myObject)
             {   
                 
          //   navigator.notification.alert(variable) ;
             var obj = myObject[variable]; 
     //$('.ui-page-active #searchresulthtml').append('<li><a  href="'+obj.shopurl+'" class="thumb"><img src="'+obj.pic+'" alt="'+obj.shopname+'" /></a><strong><a data-ajax="false" href="'+obj.shopurl+'">'+obj.shopname+'</a></strong><br />Time. '+obj.daterange+'<br />Tel.  '+obj.tel+'<br />'+obj.address+'</li><ul class="h"><li><a href="#" class="button delete">Delete</a></li><li><a href="#" class="button go">Go</a></li><li><a href="#" class="button favorite">Favorite</a></li><li class="date_add">26/10/2011 <strong>|</strong> 09:00</li></ul>');

    $('.ui-page-active #searchresulthtml').append('<li><a data-ajax="false" href="'+obj.memoryurl+'" class="thumb"><img src="'+obj.pic+'"  /></a><strong><a href="'+obj.memoryurl+'">'+obj.memoryname+'</a></strong><br />Time. '+obj.daterange+'<br />Tel. '+obj.tel+'<br />'+obj.address+', '+obj.proname+'<ul class="h"><li><a data-ajax="false" href="'+obj.memoryurl+'" class="button edit"></a></li><li><a class="button go share2" href="#">Go</a><ul id="share2" class=""><li><a href="javascript:openshare2(\''+obj.memoryname+'\',\'infostant\')">infotstant</a></li><li><a href="javascript:openshare2(\''+obj.memoryname+'\',\'facebook\')">facebook</a></li><li><a href="javascript:openshare2(\''+obj.memoryname+'\',\'twitter\')">twitter</a></li><li><a href="javascript:openshare2(\''+obj.memoryname+'\',\'google\')">google+</a></li><li><a href="javascript:openshare2(\''+obj.memoryname+'\',\'email\')">email</a></li></ul></li><li><a id="deleteid'+obj.meid+'" href="javascript:deletememory(\''+obj.meid+'\')" class="button delete">Delete</a></li><li class="date_add">'+obj.date+'<strong>|</strong> '+obj.time+'</li></ul></li>');    

    
    
    

             }
            setshare2();
             $.mobile.hidePageLoadingMsg();
          //+   myScroll = new iScroll('wapper2');  
             
                     var elem = $('#wapper2');
        elem.iscroll();
        elem.bind('onScrollEnd', function(e, iscroll){
         //   alert($(this).attr('id') +' - '+ iscroll);
        });
             
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
     //navigator.notification.alert('');
    
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
                        if($('.ui-page-active #username').val()=="")
                         {
 
                          errorcode='โปรดกรอก Username';  
                         }
                        else  if($('.ui-page-active #password1').val()=="")
                         {
                          errorcode='โปรดกรอก Password';    
                         }
                      

                     }
                if(errorcode!="")
                         {
                            // navigator.notification.alert(errorcode);
                             navigator.notification.alert(errorcode); 
                             return false;
                         } 
     
$.post(webdir+'/ajax/loginformiphone',{username:$('.ui-page-active #username').val(),password1:$('.ui-page-active #password1').val() }, function(data) {
                var myObject = eval('(' + data + ')');             
                    if(myObject.error)
                           {
                              //navigator.notification.alert(myObject.error);
                              navigator.notification.alert(myObject.error);
                              //    $('#buttonSave').attr("disabled", "false"); 
                                // return false;
                           }else  if(myObject.mid)
                           {
                               if(!localStorage.getItem("userId"))
                               {
                               localStorage.setItem("userId",myObject.mid);
                               localStorage.setItem("username",myObject.username); 
                               localStorage.setItem("emailprofile",myObject.emailprofile);
                               localStorage.setItem("picme",myObject.picme); 
                               localStorage.setItem("group",myObject.group); 
                               }
                             //  navigator.notification.alert('เข้าสู่ระบบเรียบร้อยแล้ว'); 
                                navigator.notification.alert('เข้าสู่ระบบเรียบร้อยแล้ว'); 
                                
                              // location.href="login.html";
                               $.mobile.changePage("index.html#profile-myprofile", "flip", true, true);
                           }
                       }).error(function() {
                                
                                
                                
                                navigator.notification.alert('error');
                                
                                });

     
 }
 function setlanding(myObject)
 { 

            if(myObject.shopname) {$('#shopname').html(myObject.shopname)}
          //  localStorage.setItem("recentview",''); 
             var retrievedObject = localStorage.getItem('recentview');
             var arraydata=new Array();
             if (retrievedObject) {
               //   navigator.notification.alert(retrievedObject);
                  var arraydata = retrievedObject.split(",");

                  arraydata.push(myObject.sid); 
                }else
                {
                    
                    arraydata.push(myObject.sid);       // argument to control array's size)
                    
                    
                    
                }
                //navigator.notification.alert(arraydata.join(","));
                localStorage.setItem("recentview",arraydata.join(",")); 


             
              if(myObject.pic1) {$('.intro').attr('src',myObject.pic1)}  
              if(myObject.title) {$('#title').html(myObject.title)}
              if(myObject.description) {$('#description').html(myObject.description)}  
              $('#testId').html('');                             
              for (variable in myObject.gallery)
             {
                 
                     $('#testId').append('<li class="royalSlide" ><img class="royalImage"  src="'+myObject.gallery[variable]+'" alt="Photo Gallery" /></li>')
                 
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
                 //var htmlstr ='<iframe width="284" height="174" src="http://www.youtube.com/embed/OoJj0YW4MU8" frameborder="0" allowfullscreen></iframe>';
            $('#clipvideo').hide(); 
                  
              }
              if(myObject.daterange){$('#time').html(myObject.daterange)}
              if(myObject.address){$('#address').html(myObject.address)} 
              if(myObject.tel){$('#tel').html(myObject.tel)} 
              if(myObject.emailshop){$('#emailshop').html('<a href="mailto:'+myObject.emailshop+'">'+myObject.emailshop+'</a>')} 
              if(myObject.website){$('#website').html('<a href="'+myObject.website+'" target="_blank">'+myObject.website+'</a>')} 
              if(myObject.pricerange){$('#pricerange').html(myObject.pricerange)} 
              
   
 var myOptions = {
    zoom: 20,
    center: new google.maps.LatLng(myObject.lat, myObject.lng),
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
   map = new google.maps.Map(document.getElementById("mapgoogle"),
                                myOptions);
              
    var image = new google.maps.MarkerImage('icons/'+myObject.icon,
      // This marker is 20 pixels wide by 32 pixels tall.

      new google.maps.Size(38, 46),
      // The origin for this image is 0,0.
      new google.maps.Point(0,0),
      // The anchor for this image is the base of the flagpole at 0,32.
      new google.maps.Point(0, 40)); 
   // navigator.notification.alert(myObject.lat);
   var myLatLng = new google.maps.LatLng(myObject.lat, myObject.lng);
    var marker = new google.maps.Marker({
        position: myLatLng,
        icon: image,
        map: map,
        title: myObject.shopname,
        zIndex: 8000
    });                                 

   $('#maplink').attr('href','map.html?shopurl='+getUrlVars2()['shopurl']) ; 
 // setMarkers(map, beaches);
              
           //     $('#landing').show();  
                $.mobile.hidePageLoadingMsg();  
                myScroll = new iScroll('wapperlanding');  
                
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
 
 function settempregister()
 {
     
              if(tempproid)
             {
        $("select#province").val(tempproid); 
        var myselect = $("select#province");
        myselect.selectmenu("refresh");
      
       // showAddress($("#province option[value='"+tempproid+"']").text());
  
         $.mobile.showPageLoadingMsg();
                            $.ajax({
                                                      data: {proid: tempproid},                                                            
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
      }
 }
 function registershopfunction()
 {
     initialize();
     $('#province').change(function() {
         if($(this).val())
    {
         startchange=1;
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
        else if($('#keyword').val()=="")
        {
          errorset=1;  
        }
        
        if(errorset==1)
        {
        // navigator.notification.alert("ท่านกรอกข้อมูลไม่ครบ");
          navigator.notification.alert("ท่านกรอกข้อมูลไม่ครบ");   
          return false;
        }
        else{
            
        
        $.post(webdir+'/ajax/checkshopurl',{shopurl:$('#shopurl').val() }, function(data3) {
                         if(!eval(data3))
                         {
                         // navigator.notification.alert("url ที่ท่านกรอกซ้ำ");   
                         navigator.notification.alert("url ที่ท่านกรอกซ้ำ"); 
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
                          keyword=$('#keyword').val();
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
     ,refcode:refcode,lat:lat,lng:lng,keyword:keyword
     }, function(data) {
         var myObject = eval('(' + data + ')');
          if(myObject.error)
                           {
                                 //navigator.notification.alert(myObject.error);
                                 navigator.notification.alert(myObject.error); 
                                 $('#buttonSave').attr("disabled", "false"); 
                                 $('#buttonSave').html('Submit');
                                // return false;
                                $.mobile.hidePageLoadingMsg();
                           } if(myObject.shopurl)
                           {

                              // navigator.notification.alert('บันทึกข้อมูลเรียบร้อยแล้ว');  
                               navigator.notification.alert("บันทึกข้อมูลเรียบร้อยแล้ว"); 
                               $.mobile.hidePageLoadingMsg();
                            //   $.mobile.changePage("shopedit.html?shopurl="+myObject.shopurl, "flip", true, true); 
                                location.href="shopedit.html?shopurl="+myObject.shopurl;
                           }
                           
     });
 }
function checktemplate()
{
            var id=mySliderInstance.currentSlideId;
           // navigator.notification.alert(id);
           var temp= $('.royalImage-'+id).attr('id');
           temid=temp.replace('tem-', '');
           $('#temid').val(temid);
           
           //navigator.notification.alert(temid);
          
     }
function addmemoryserver()
{
    $.post(webdir+'/ajax/savememory',{username:localStorage.getItem("username"),mid:localStorage.getItem("userId"),template:$('#temid').val(),memoryurl:$('#memoryurl').val()} ,function(data) {

               
               var myObject = eval('(' + data + ')');

               if(myObject.error)
               {
                    navigator.notification.alert(myObject.error);
               }else{
                  // navigator.notification.alert();
                   
                   navigator.notification.alert('บันทึกข้อมูลเรียบร้อยแล้ว');
                  // navigator.notification.alert(webdir+'/memory/'+myObject.username+'/'+myObject.memoryurl);
                
                 //  $.mobile.changePage("memoryedit.html?meid="+myObject.meid, "flip", true, true); 
                   location.href="memoryedit.html?meid="+myObject.meid;
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

  $('.ui-page-active #username').html(localStorage.getItem("username")); 
   
  $('.ui-page-active #emailprofile').html(localStorage.getItem("emailprofile"));
  
  if(localStorage.getItem("picme"))
  {
      $('.ui-page-active #img-profile').attr('src',localStorage.getItem("picme"));
      
  }
  
  memoryresultfunction();
}
function addmemoryfunction()
{
    templatesshopfunction();
    myScroll = new iScroll('wapperaddmemory', {
        useTransform: false,
        onBeforeScrollStart: function (e) {
            var target = e.target;
            while (target.nodeType != 1) target = target.parentNode;

            if (target.tagName != 'SELECT' && target.tagName != 'INPUT' && target.tagName != 'TEXTAREA')
                e.preventDefault();
        }
    });
        var memoryurl = document.getElementById('memoryurl');
memoryurl.addEventListener('touchstart' /*'mousedown'*/, function(e) {
    e.stopPropagation();
}, false);
}
function registerserver()
{
     $.mobile.showPageLoadingMsg();
  //   $('#buttonSave').attr("disabled", ""); 
  //   $('#buttonSave').html('Loading');
     $.post(webdir+'/ajax/submitformregisteriphone',{email:$('.ui-page-active #input-email').val(),
     username:$('.ui-page-active #username').val(),password1:$('.ui-page-active #password1').val(),status:1
       
     }, function(data) {
         var myObject = eval('(' + data + ')');
          if(myObject.error)
                           {
                           // navigator.notification.alert(myObject.error);  
                                 navigator.notification.alert(myObject.error); 
                                $.mobile.hidePageLoadingMsg();
                                return false;
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
                               navigator.notification.alert("บันทึกข้อมูลเรียบร้อยแล้ว"); 
                               $.mobile.hidePageLoadingMsg();
                               $.mobile.changePage("index.html#profile-myprofile", "flip", true, true); 
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
               //   navigator.notification.alert(retrievedObject);
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
                        $('.ui-page-active #searchresulthtml').html('');
                        $('.ui-page-active #searchresulthtml').html(localStorage.getItem('searchresulthtml'));
                        setshare2();
                        return false;
                    }else
                    {
                      searchresultfunction();  
                    }
                    // continue internet connection is OK
                }).error(function() {
                $('.ui-page-active #searchresulthtml').html('');
                $('.ui-page-active #searchresulthtml').html(localStorage.getItem('searchresulthtml'));
                setshare2();
                
                // navigator.notification.alert('no online'); 
                return false;
                
                });


 //    navigator.notification.alert(online) ;
   //  if (online) {
//    searchresultfunction();
//  } else {
//      navigator.notification.alert('no online');
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

      var selectdate= datecheck;
        $('.ui-page-active #searchresulthtml').html('');
        $('#activity').html('Activity '+selectdate);
          
           for(i in arraydata)
            {
                var arraydate1= i.split(" ");
                
               
                if(arraydate1[0]==selectdate)
                {
                   // console.log(arraydata2['text-'+arraydata[i]]);
                    console.log(i);
                    $('.ui-page-active #searchresulthtml').append(arraydata2['text-'+arraydata[i]]);
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
        $('.ui-page-active #searchresulthtml').html('');
        $('#activity').html('Activity '+selectdate);
          
           for(i in arraydata)
            {
                var arraydate1= i.split(" ");
                
               
                if(arraydate1[0]==selectdate)
                {
                   // console.log(arraydata2['text-'+arraydata[i]]);
                   
                    $('.ui-page-active #searchresulthtml').append(arraydata2['text-'+arraydata[i]]);
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
function nextaffstep1()
{
       resetvalue();
        if($('#input-email').val()=="")
        {
           errorset=1; 
        }else if($('#input-username').val()=="")
        {
          errorset=1;  
        }
        else if($('#password1').val()=="")
        {
          errorset=1;  
        }
        else if($('#shopurl').val()=="")
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
        else if($('#keyword').val()=="")
        {
          errorset=1;  
        }
        
        if(errorset==1)
        {
        // navigator.notification.alert("ท่านกรอกข้อมูลไม่ครบ");
          navigator.notification.alert("ท่านกรอกข้อมูลไม่ครบ");   
          return false;
        }
        else{
            
        
        $.post(webdir+'/ajax/checkaff',{shopurl:$('#shopurl').val(),email:$('#input-email').val(),username:$('#input-username').val() }, function(data3) {
                            var myObject = eval('(' + data3 + ')');             

                       if(myObject.error)
                         {
                         // navigator.notification.alert("url ที่ท่านกรอกซ้ำ");   
                         navigator.notification.alert(myObject.error); 
                         }else
                         {
                            
                             
                             
                             
                         username=$('#input-username').val();    
                         password=$('#password1').val(); 
                         emailuser=$('#input-email').val(); 
                         proid=$('#province').val();
                         
                         
                         disid=$('#district').val();
                         tumid=$('#tumbon').val();
                         tempproid=proid;
                         tempdisid=disid;
                         temptumid=tumid;
                         catid=$('#cat').val();
                         subcatid=$('#subcat').val();
                         shopname=$('#shopname').val();
                         shopurl=$('#shopurl').val();
                         lat=$('#lat').val();
                         lng=$('#lng').val();
                         refcode=$('#refcode').val();
                         keyword=$('#keyword').val();
                         $.mobile.changePage("templatesaff.html", "flip", true, true); 
                         
                         
                         }
                         
                                
        });
        
        
        
        }
}
 function nextaffstep2()
 {
     $.mobile.showPageLoadingMsg();
     $('#buttonSave').attr("disabled", "true"); 
     $('#buttonSave').html('Loading');
     $.post(webdir+'/ajax/submitaffformiphone',{
       mid:localStorage.getItem("userId"),catid:catid
     ,subcatid:subcatid,shopname:encodeURIComponent(shopname),shopurl:shopurl
     ,proid:proid,disid:disid,tumid:tumid,temid:$('#temid').val()
     ,refcode:refcode,lat:lat,lng:lng
     ,username:username,password:password,email:emailuser,status:1,keyword:keyword
     }, function(data) {
         var myObject = eval('(' + data + ')');
          if(myObject.error)
                           {
                                 //navigator.notification.alert(myObject.error);
                                 navigator.notification.alert(myObject.error); 
                                 $('#buttonSave').attr("disabled", "false"); 
                                 $('#buttonSave').html('Submit');
                                // return false;
                                $.mobile.hidePageLoadingMsg();
                           } if(myObject.shopurl)
                           {

                              // navigator.notification.alert('บันทึกข้อมูลเรียบร้อยแล้ว');  
                               navigator.notification.alert("บันทึกข้อมูลเรียบร้อยแล้ว"); 
                               $.mobile.hidePageLoadingMsg();
                            //   $.mobile.changePage("shopedit.html?shopurl="+myObject.shopurl, "flip", true, true); 
                                location.href="shopedit.html?shopurl="+myObject.shopurl;
                           }
                           
     });
 }
 function addfriend()
{
 var reffriendcode=parseInt($('.ui-page-active #refercode').val())-10000;
 var mycode=parseInt(localStorage.getItem("userId"));

 if(reffriendcode>0)
 {
      
 if(reffriendcode!=mycode) 
 {
      $.mobile.showPageLoadingMsg();
      $.post(webdir+'/ajax/addfriend',{mid:localStorage.getItem("userId"),friend:reffriendcode}, function(data) {
         var myObject = eval('(' + data + ')');
         if(myObject.error)
                           {
                                 //navigator.notification.alert(myObject.error);
                                 navigator.notification.alert(myObject.error); 
                                 $('#buttonSave').attr("disabled", "false"); 
                                 $('#buttonSave').html('Submit');
                                // return false;
                                $.mobile.hidePageLoadingMsg();
                           }
                           else
                           {
                               navigator.notification.alert("เพิ่มเป็นเพื่อนเรียบร้อยแล้ว"); 
                               $.mobile.hidePageLoadingMsg();
                           }       
                           
 });  
 }
 }
}
function contactlist(myObject)
{
      $('.ui-page-active #searchresulthtml').html('');
      var stringuser;
      var datastr="";
      
                 for (variable in myObject)
             {   
             var obj = myObject[variable]; 
                 if(obj.tel==null)
                 {
                     var tel='';
                     
                 }else
                 {
                     var tel=obj.tel;
                 }
          //   navigator.notification.alert(variable) ;

             if(stringuser)
             {
             var  stringuser2=obj.username.substr(0,1).toUpperCase();   
            // if() 
            if(stringuser!=stringuser2)
            {
                               datastr+='</ul>'+'<h3>'+stringuser2+'</h3><ul class="v" >';
                           //    $('.ui-page-active #searchresulthtml').append();
                              stringuser= stringuser2; 
            }

             }else
             {
               stringuser=obj.username.substr(0,1).toUpperCase();  
               
                              datastr+='<h3>'+stringuser+'</h3><ul class="v" >';
               // $('.ui-page-active #searchresulthtml').append(data);
             }
             
              datastr+='<li><a href="javascript:void(0)" class="thumb"><img src="'+obj.picme+'" alt="Sub-Category Name" /></a><strong><a href="javascript:void(0)">'+obj.username+'</a></strong><br />'+obj.email+'<br />Tel. '+tel+'</li>';
             // $('.ui-page-active #searchresulthtml').append();
             
             }
             datastr+='</ul>';

      $('.ui-page-active #searchresulthtml').html(datastr);
    $.mobile.hidePageLoadingMsg();
}
function setcontact()
{
    $.mobile.showPageLoadingMsg();
                   $.ajax({
                                                      data: {mid:localStorage.getItem("userId")},                                                            
                                                      url: webdir+'/ajax/getallcontact',
                                                      dataType: "jsonp",
                                                      jsonp: 'callback',
                                                      jsonpCallback: 'contactlist', 
                                                      crossDomain:true,
                                                      xhrFields: {
                                                      withCredentials: true
                                                      },
                                                       success: function(myObject){
                                               
                                                      }
                           }); 
     
}
function checkdomtest2()
{

    var selectField = document.getElementById('cat');
selectField.addEventListener('touchstart' /*'mousedown'*/, function(e) {
    e.stopPropagation();
}, false);

    var shopname = document.getElementById('shopname');
shopname.addEventListener('touchstart' /*'mousedown'*/, function(e) {
    e.stopPropagation();
}, false);


    var shopurl = document.getElementById('shopurl');
shopurl.addEventListener('touchstart' /*'mousedown'*/, function(e) {
    e.stopPropagation();
}, false);


    var subcat = document.getElementById('subcat');
subcat.addEventListener('touchstart' /*'mousedown'*/, function(e) {
    e.stopPropagation();
}, false);


    var province = document.getElementById('province');
province.addEventListener('touchstart' /*'mousedown'*/, function(e) {
    e.stopPropagation();
}, false);


 var district = document.getElementById('district');
district.addEventListener('touchstart' /*'mousedown'*/, function(e) {
    e.stopPropagation();
}, false);


 var tumbon = document.getElementById('tumbon');
tumbon.addEventListener('touchstart' /*'mousedown'*/, function(e) {
    e.stopPropagation();
}, false);

 var refcode = document.getElementById('refcode');
refcode.addEventListener('touchstart' /*'mousedown'*/, function(e) {
    e.stopPropagation();
}, false);

var keyword = document.getElementById('keyword');
keyword.addEventListener('touchstart' /*'mousedown'*/, function(e) {
    e.stopPropagation();
}, false);



}

jQuery(document).ready(function($){ 
	
	/* Open/Close Function */

	/******* EOS ********/
	
	/* 	Open Share button */

	/******* EOS ********/
});
$('div').live( 'pageshow',function(event, ui){
  
//  $('.ui-content')

  switch ($('.ui-page-active').attr('id'))
{
  case "social-contact":
   if(accesspage())
   {
      setcontact();

  }
  break;
 case "templatesaff":
   if(accesspage())
   {
      templatesshopfunction();
      myScroll = new iScroll('wappertemplatesaff');
  }
  break;     
 case "registeraffiliate":
   if(accesspage())
  {
      resetvalue();

      myScroll="";
      $('#refcode').val(parseInt(localStorage.getItem("userId"))+10000);
      registershopfunction();
      settempregister();
      myScroll = new iScroll('wapperregisteraffiliate', {
        useTransform: false,
        onBeforeScrollStart: function (e) {
            var target = e.target;
            while (target.nodeType != 1) target = target.parentNode;

            if (target.tagName != 'SELECT' && target.tagName != 'INPUT' && target.tagName != 'TEXTAREA')
                e.preventDefault();
        }
    });
    checkdomtest2();
    
    var emailinput = document.getElementById('input-email');
emailinput.addEventListener('touchstart' /*'mousedown'*/, function(e) {
    e.stopPropagation();
}, false);

var usernameinput = document.getElementById('input-username');
usernameinput.addEventListener('touchstart' /*'mousedown'*/, function(e) {
    e.stopPropagation();
}, false);

var password1 = document.getElementById('password1');
password1.addEventListener('touchstart' /*'mousedown'*/, function(e) {
    e.stopPropagation();
}, false);
  //calendarfunction();
  //$('.show-rfcode').html((parseInt(localStorage.getItem("userId"))+10000));
  }
  break;     
 case "social-rfcode":
   if(accesspage())
  {
  //calendarfunction();
  $('.show-rfcode').html((parseInt(localStorage.getItem("userId"))+10000));
  myprofilefunction();
  }
  break;
   case "affiliate":
   if(accesspage())
  {
    resetvalue();
  submid=localStorage.getItem("userId");
 // $('#wordTxt').html(myCat[catid]);
  searchresultfunction();
  

  }
  break;   
case "calendar":
   if(accesspage())
  {
  calendarfunction();
  }
  break;    
case "index":
  indexfunction();
  myScroll = new iScroll('footerindex');  
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
      $(".ui-page-active #radio-choice-c").attr("checked",true).checkboxradio("refresh"); 
           $(".ui-page-active #radio-choice-d").attr("checked",false).checkboxradio("refresh"); 
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
  myScroll="";
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
     myScroll="";
   //  $(".ui-page-active #radio-choice-d").attr("checked","checked"); 
    shopfunction();  
  //   $(".ui-page-active #radio-choice-d").attr("checked",true).checkboxradio("refresh"); 
  //   $(".ui-page-active #radio-choice-c").attr("checked",false).checkboxradio("refresh"); 
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
    myScroll = new iScroll('wappertemplatesshop');
  }
  
  break;
  case "profile-myprofile":
   if(accesspage())
  {
  $('.show-rfcode').html((parseInt(localStorage.getItem("userId"))+10000));
      myprofilefunction();
    //  $(".ui-page-active #radio-choice-c").attr("checked",true).checkboxradio("refresh"); 
     //      $(".ui-page-active #radio-choice-d").attr("checked",false).checkboxradio("refresh"); 
  }
  break;
  case "registershop":
    if(accesspage())
  {
  myScroll="";
  registershopfunction();
      myScroll = new iScroll('wapperregistershop', {
        useTransform: false,
        onBeforeScrollStart: function (e) {
            var target = e.target;
            while (target.nodeType != 1) target = target.parentNode;

            if (target.tagName != 'SELECT' && target.tagName != 'INPUT' && target.tagName != 'TEXTAREA')
                e.preventDefault();
        }
    });
  checkdomtest2();


  }
  break;
    case "logout":

   localStorage.setItem("userId",'');
   localStorage.setItem("username",'');
   localStorage.setItem("emailprofile",'');
   localStorage.setItem("picme",'');
   clearsaveall();
   $.mobile.changePage("index.html", "flip", true, true); 

  break;
  case "maplanding":
  $('#map_canvas').css('width' , getWidth());
  $('#map_canvas').css('height' , getHeight()-100);
  setMap();
  break;
default:
  
}

   

   
           
        $('.ui-page-active #function .v').html('<li class="icon message"><a href="message.html"><span>Message</span></a></li><li class="icon memory"><a href="index.html#memory"><span>Personal Memory</span></a></li><li class="icon favorite"><a href="favarite.html"><span>Favorite</span></a></li><li class="icon calendar"><a href="calendar.html"><span>Calendar / Itenary</span></a></li><li class="icon addfriend"><a href="contact.html"><span>Friends</span></a></li><li class="icon promotion"><a href="promotion.html"><span>Promotion</span></a></li><li class="icon setting"><a href="setting.html"><span>Settings</span></a></li>');
          if(localStorage.getItem("group")==1)
          {
            if($('.ui-page-active #affiliatehtml').html())
            {
                
            }else
            {
                $('.ui-page-active #function2 .v').append('<li><a href="index.html#affiliate"><span id="affiliatehtml">Affiliate</span></a></li>'); 
            }
             
          }
          
    

      // PLACE SLIDE DOWN MENU
      $('.ui-page-active nav li:nth-child(2) a').click(function() { 
          if(accesspage())
  {
                  if(localStorage.getItem("group")==1)
          { 
        $('.ui-page-active #function2').animate({ top: '45px', useTranslate3d: true, leaveTransforms: true}, 1000);
         var height=$('.ui-page-active').height(); 

                   $('.ui-page-active').height(height+360);
                   
      }else
          {
              $.mobile.changePage("index.html#shop", "flip", true, true);   
          }
          
  }
      
    })    

      $('.ui-page-active #function2 a, nav li:nth-child(1) a, nav li:nth-child(3) a, h1 > a, a[data-rel="back"]').click(function() {
            
        $('.ui-page-active #function2').animate({ top: '-=360px', useTranslate3d: true, leaveTransforms: true}, 1000);
                 var height=$('.ui-page-active').height(); 

                   $('.ui-page-active').height(height-360);
    
      
      })
          
	  
	  
	  
	  // MEMBER SLIDE DOWN MENU
	  $('.ui-page-active nav li:nth-child(3) a').click(function() { 
        $('.ui-page-active #function').animate({ top: '45px', useTranslate3d: true, leaveTransforms: true}, 1000);
         var height=$('.ui-page-active').height(); 

                   $('.ui-page-active').height(height+320);
    })    
      $('.ui-page-active #function a, nav li:nth-child(1) a, nav li:nth-child(2) a,nav li:nth-child(4) a, h1 > a, a[data-rel="back"]').click(function() { 
        $('.ui-page-active #function').animate({ top: '-=370px', useTranslate3d: true, leaveTransforms: true}, 1000);
                 var height=$('.ui-page-active').height(); 

                   $('.ui-page-active').height(height-320);
    })
 
 
 




    
    


    
    

    return;

  
});
