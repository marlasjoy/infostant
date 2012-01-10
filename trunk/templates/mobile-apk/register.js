var imageURI="";
var webdir="http://www.infostant.com";              
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


$( function() {
       
        $('#province').change(function() {
    if($(this).val())
    {
      
        showAddress($("#province option[value='"+$(this).val()+"']").text());
    }
                //  navigator.notification.alert(webdir+'/ajax/getdistrict');
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
            
       //  document.addEventListener("deviceready", onDeviceReady, false);   
    
});
     // $(document).ready(function() { 
//          onDeviceReady();
//    });

 
    // Called when a photo is successfully retrieved (out of the device's library)

 
