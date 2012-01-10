
$(document).ready(function() {
var strdistrict=$("select#district").html();
var strtumbon=$("select#tumbon").html();;
var strtsubcat=$("select#subcat").html();
var webdir=$("#webdir").html();

$.post(webdir+'/ajax/randcapcha');
$("#captchaimage").load(webdir+'/ajax/getimgcapcha');
$("#refreshimg").live('click',function(){


        $.post(webdir+'/ajax/randcapcha');
        $("#captchaimage").load(webdir+'/ajax/getimgcapcha');
        return false;
                
    });
    $('#address').change(function(){
        if($(this).val())
    {
      //alert($(this).val());
        if($('#province').val()&&$('#district').val()&&$('#tumbon').val())
        {
        showAddress($("#province option[value='"+$('#province').val()+"']").text()+' '+$("#district option[value='"+$('#district').val()+"']").text()+' '+$("#tumbon option[value='"+$('#tumbon').val()+"']").text()+' '+$(this).val());
        }else if($('#province').val())
        {

            showAddress($("#province option[value='"+$('#province').val()+"']").text()+' '+$(this).val());
        }else if($('#province').val()&&$('#district').val())
        {
            showAddress($("#province option[value='"+$('#province').val()+"']").text()+' '+$("#district option[value='"+$('#district').val()+"']").text()+' '+$(this).val());
        }else
        {
           showAddress($(this).val()); 
        }
        
    }   
    });
    
 //ajax province district tumbon
   
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


$('#cat').change(function(){
    $.post(webdir+'/ajax/getsubcat', { catid: $(this).val() } ,function(data) {
    
    var myObject = eval('(' + data + ')');

     var options='';


     options +=strtsubcat;
         
if(typeof(myObject.error) == 'undefined')
     {
     $.each(myObject, function(index2,data) {
            
         options += '<option value="' + data.subcatid + '">' +data.subcatname + '</option>';
    
         });
     }
         $("select#subcat").html(options);

});
});


$('#register-form').validate({        
        rules: {
            email: {
                required: true,
                email: true,
                remote: {
                url: webdir+'/ajax/checkemail/',
                type: "post"
                            }
                      },
             ct_captcha: {
                required: true,
                remote: {
                url: webdir+'/ajax/checkcapcha/',
                type: "post"
                            }
                      },         
            username:{
               required: true,
               remote: {
               url: 'ajax/checkusername/',
               type: "post"
                            } 
                      },
             password: "required",
             repassword: {
             equalTo: "#password"
             },
             title: "required",
             keyword: "required",
             description: "required",
             cat: "required",
             subcat: "required",
             shopname: "required",
             postcode: {
             required: true,
             number:true
                     },
             shopurl: {
               required: true,
               remote: {
               url: webdir+'/ajax/checkshopurl/',
               type: "post"
                            } 
                      },
             address: "required",
             province: "required",
             district: "required", 
             tumbon: "required", 
             tel: {
             required: true,
             number:true
                     },
             emailshop: {
                required: true,
                email: true
                      },
             daterange: "required"                    
                  
        },
        messages: {
                        email:{
                                        email: "ไม่ถูก format รูปแบบ email",
                                        required: "โปรดกรอกอีเมล์นี้",
                                        remote: "อีเมล์นี้มีแล้ว"
                                },
                        username:{
                                        required: "โปรดกรอกยูเซอร์เนมนี้",
                                        remote: "ยูเซอร์เนมนี้มีแล้ว"
                                },
                                
                        password: "โปรดกรอกพาสเวิร์ด",          
                        repassword:{
                                        equalTo: "โปรดกรอกพาสเวิร์ดให้ตรง"
                                },
                        cat: "โปรดเลือกประเภทของร้านค้า",
                        subcat: "โปรดเลือกหมวดหมู่ร้านค้า",
                        shopname:"โปรดกรอกชื่อร้านค้า",
                        shopurl:{
                                        required: "โปรดกรอกชื่อ URL นี้",
                                        remote: "ชื่อ URL นี้มีแล้ว"
                                },
                        website:{
                                        url: "ไม่ถูก format รูปแบบ website"

                                },
                        address:"โปรดกรอกที่อยู่",
                        province:"โปรดกรอกจังหวัด",
                        district:"โปรดกรอกอำเภอ",
                        tumbon:"โปรดกรอกตำบล",
                        title:"โปรดกรอกtitle",
                        keyword:"โปรดกรอกkeyword",
                        description:"โปรดกรอกdescription",
                        tel: {
                                       required: "โปรดกรอกโทรศัพท์",
                                       number: "ไม่ถูก format รูปแบบ ตัวเลข"

                                },
                          postcode: {
                                       required: "โปรดกรอกรหัสไปรษณีย์",
                                       number: "ไม่ถูก format รูปแบบ ตัวเลข"

                                },       
                        emailshop:{
                                        email: "ไม่ถูก format รูปแบบ email",
                                        required: "โปรดกรอกอีเมล์นี้"
                                  },
                        daterange:"โปรดกรอกเวลาทำการ",
                        ct_captcha:{

                                        required: "โปรดกรอก captcha",
                                        remote: "โปรดกรอก captcha ให้ถูก"
                                }
                        
                        
                                
                                 },
        submitHandler: function(form)
        {
            
           // $('#register-form').serialize();
           //$.post(webdir+'/ajax/saveregister', $('#register-form').serialize() );
           
           $.post(webdir+'/ajax/saveregister',$('#register-form').serialize() ,function(data) {
               var validator = $("#register-form").validate();
               
               var myObject = eval('(' + data + ')');

               if(myObject.error)
               {
                 alert(myObject.error);
               }
              
               
           });
           

                   // checkfileimage();
        }
                                

});


});