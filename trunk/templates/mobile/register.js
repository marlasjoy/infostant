var imageURI="";
var webdir="http://www.infostant.com"; 

function PictureSourceType() {};
             PictureSourceType.PHOTO_LIBRARY = 0;
             PictureSourceType.CAMERA = 1;
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
         myselect[0].selectedIndex = 0;
         myselect.selectmenu("refresh");
         
         var myselect = $("select#tumbon");
         myselect[0].selectedIndex = 0;
         myselect.selectmenu("refresh");


           
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
         myselect[0].selectedIndex = 0;
         myselect.selectmenu("refresh");
}
function submittoserver() {
                 
                   var errorcode=''; 
                    if($('#cat').val()=="")
                         {
                          errorcode='โปรดเลือกประเภทของร้านค้า';
                          
                         }
                       else if($('#subcat').val()=="")
                         {
                          errorcode='โปรดเลือกหมวดหมู่ร้านค้า';  
                         }  
                       else  if($('#shopname').val()=="")
                         {
                          errorcode='โปรดกรอกชื่อร้านค้า';    
                         }
                       else  if($('#shopurl').val()=="")
                         {
                          errorcode='โปรดกรอก ชื่อ URL';    
                         }

                      else   if($('#title').val()=="")
                         {
                          errorcode='โปรดกรอก หัวข้อ';    
                         }
                      else   if($('#description').val()=="")
                         {
                          errorcode='โปรดกรอก บรรยาย';    
                         }
                     else    if($('#address').val()=="")
                         {
                          errorcode='โปรดกรอก ที่อยู่';    
                         }
                     else     if($('#province').val()=="")
                         {
                          errorcode='โปรดกรอก จังหวัด';    
                         }
                    else      if($('#district').val()=="")
                         {
                          errorcode='โปรดกรอก อำเภอ';    
                         }
                   else      if($('#tumbon').val()=="")
                         {
                          errorcode='โปรดกรอก ตำบล';    
                         }
                    else     if($('#postcode').val()=="")
                         {
                          errorcode='โปรดกรอก รหัสไปรษณีย์';    
                         }
                   else      if($('#tel').val()=="")
                         {
                          errorcode='โปรดกรอก เบอร์โทรศัพท์';    
                         }
                   else      if($('#emailshop').val()=="")
                         {
                          errorcode='โปรดกรอก email ของผู้ติดต่อ';    
                         }
                    else     if($('#daterange').val()=="")
                         {
                          errorcode='โปรดกรอก  วันเวลาที่เปิดทำการ';    
                         }
                   
                   
                     if($('#userid').val()=="")
                     {
                        if($('#email').val()=="")
                         {
 
                          errorcode='โปรดกรอก Email';  
                         } 
                        else if($('#username').val()=="")
                         {
 
                          errorcode='โปรดกรอก Username';  
                         }
                        else  if($('#password1').val()=="")
                         {
                          errorcode='โปรดกรอก Password';    
                         }
                        else if($('#repassword').val()=="")
                         {
                          errorcode='โปรดกรอก Password อีกครั้ง';    
                         }
                        else if($('#repassword').val()!=$('#password1').val())
                         {
                          errorcode='โปรดกรอก Password ให้ตรงกัน';   
                         }

                     }
                     

                     
             
 
                         if(errorcode!="")
                         {
                             alert(errorcode); 
                             return false;
                         } 
                         else if(errorcode==""){
                     $.post(webdir+'/ajax/submitformiphone',{
                     pic1:imageURI 
                     ,email:$('#email').val()
                     ,username:encodeURIComponent($('#username').val())
                     ,password1:encodeURIComponent($('#password1').val())
                     ,repassword:encodeURIComponent($('#repassword').val()) 
                     ,namepost:encodeURIComponent($('#namepost').val())
                     ,shopname:encodeURIComponent($('#shopname').val())   
                     ,shopurl:$('#shopurl').val()   
                     ,website:encodeURIComponent($('#website').val())   
                     ,title:encodeURIComponent($('#title').val()) 
                     ,description:encodeURIComponent($('#description').val())  
                     ,address:encodeURIComponent($('#address').val())  
                     ,province:encodeURIComponent($('#province').val())  
                     ,district:encodeURIComponent($('#district').val())  
                     ,tumbon:encodeURIComponent($('#tumbon').val())  
                     ,postcode:encodeURIComponent($('#postcode').val())  
                     ,tel:encodeURIComponent($('#tel').val()) 
                     ,emailshop:$('#emailshop').val()
                     ,daterange:encodeURIComponent($('#daterange').val())  
                     ,lat:$('#lat').val()  
                     ,lng:$('#lng').val()  
                     ,cat:$('#cat').val() 
                     ,subcat:$('#subcat').val()
                     ,userid:$('#userid').val()       
                     }, function(data) {
                           var myObject = eval('(' + data + ')');
                         //  $('#buttonSave').attr("disabled", "true");
                           $('#buttonSave').val('กำลังบันทึก...');
                           if(myObject.error)
                           {
                                 alert(myObject.error);
                              //    $('#buttonSave').attr("disabled", "false"); 
                                // return false;
                           }else  if(myObject.shopurl)
                           {
                               if(!checkCookie('username')){
                               setCookie('username',myObject.username,36500000);
                               setCookie('userid',myObject.mid,36500000);  
                               }
                               alert('บันทึกข้อมูลเรียบร้อยแล้ว');  
                               location.href="http://"+myObject.shopurl+'.infostant.com';
                           }
//
                            });
                     
                         }
                 
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
         myselect[0].selectedIndex = 0;
         myselect.selectmenu("refresh");
}
function getPicture(sourceType)
             {
                 var options = { quality: 30 };
                 if (sourceType != undefined) {
                     options["sourceType"] = sourceType;
                     
                 }
                 // if no sourceType specified, the default is CAMERA 
                 navigator.camera.getPicture(getPicture_Success, onFail, options);
             }
function getPicture_Success(imageData)
             {
                 imageURI=imageData;
                 //alert("getpic success");
                 document.getElementById("test_img").src = "data:image/jpeg;base64," + imageData;
                 
                 
             }
function capturePhoto() {
                 // Take picture using device camera and retrieve image as base64-encoded string
                 navigator.camera.getPicture(getPicture_Success, onFail, { quality: 50 });
             }
function onDeviceReady() {
                 //?navigator.notification.alert('');  
                 navigator.network.isReachable('phonegap.com', reachableCallback);
                 pictureSource=navigator.camera.PictureSourceType;
                 destinationType=navigator.camera.DestinationType;
                 
             }
$( function() {
      
        $('#province').change(function() {
    if($(this).val())
    {
      
        showAddress($("#province option[value='"+$(this).val()+"']").text());
    }
                //  alert(webdir+'/ajax/getdistrict');
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
    
    if($(this).val())
    {
      
        showAddress($("#province option[value='"+$('#province').val()+"']").text()+' '+$("#district option[value='"+$('#district').val()+"']").text());
    }
    
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
            
         //document.addEventListener("deviceready", onDeviceReady, false);   
    
});


 
    // Called when a photo is successfully retrieved (out of the device's library)

 
