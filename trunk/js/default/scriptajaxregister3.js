
$(document).ready(function() {

var webdir=$("#webdir").html();
var subdir=$("#subdir").html();

$.post(webdir+'/ajax/randcapcha');
$("#captchaimage").load(webdir+'/ajax/getimgcapcha');
$("#refreshimg").live('click',function(){


        $.post(webdir+'/ajax/randcapcha');
        $("#captchaimage").load(webdir+'/ajax/getimgcapcha');
        return false;
                
    });


 //ajax province district tumbon
   






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
                      tel_user:{
               required: true
             },
              countries_user:{
               required: true
             },        
            username:{
               required: true,
               remote: {
               url: 'ajax/checkusername2/',
               type: "post"
                            } 
                      },
             password1:{
               required: true,
               maxlength:16
             },
             repassword: {   
             equalTo: "#password1"
             }
                 
                  
        },
        messages: {
                        email:{
                                        email: "ไม่ถูก  รูปแบบ อีเมล์",
                                        required: "โปรดกรอกอีเมล์นี้",
                                        remote: "อีเมล์นี้มีแล้ว"
                                },
                        username:{
                                        required: "โปรดกรอกยูเซอร์เนมนี้",
                                        remote: "ยูเซอร์เนมนี้มีแล้ว"
                                },
                                
                        password1:{
                            required: "โปรดกรอกพาสเวิร์ด",
                            maxlength:"ความยาวไม่เกิน 16 ตัวอักษร"
                        },  
                        countries_user:"โปรดเลือกประเทศของผู้ใช้",
                        tel_user:"โปรดกรอกเบอร์โทรศัพท์",           
                        repassword:{
                                       required: "โปรดกรอกพาสเวิร์ด อีกครั้ง นี้",
                                        equalTo: "โปรดกรอกพาสเวิร์ดให้ตรง"
                                },
                        ct_captcha:{

                                        required: "โปรดกรอกตัวอักษรที่เห็น",
                                        remote: "โปรดกรอกตัวอักษรให้ตรงกับรูปภาพ "
                                }
                        
                        
                                
                                 },
        submitHandler: function(form)
        {
            
           // $('#register-form').serialize();
           //$.post(webdir+'/ajax/saveregister', $('#register-form').serialize() );
           
           $.post(webdir+'/ajax/savemember2',$('#register-form').serialize() ,function(data) {
               var validator = $("#register-form").validate();
               
               var myObject = eval('(' + data + ')');

               if(myObject.error)
               {
                    alert(myObject.error);
               }else{
                  // alert();
                   
                   alert('บันทึกข้อมูลเรียบร้อย ท่านจำเป็นจะต้องยืนยันสมาชิกกับทางเราก่อน');
                   //location.href='http://'+myObject.shopurl+'.'+subdir;
                   $('#register-member').hide();
                   $('#register-shop2').hide();
                   
                   $('#ok').show();
               }
               
              
               
           });
           

                   // checkfileimage();
        }
                                

});


});