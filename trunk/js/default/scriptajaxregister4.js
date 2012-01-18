
$(document).ready(function() {
var strdistrict=$("select#district").html();
var strtumbon=$("select#tumbon").html();;
var strtsubcat=$("select#subcat").html();
var webdir=$("#webdir").html();
var subdir=$("#subdir").html();

$.post(webdir+'/ajax/randcapcha');
$("#captchaimage").load(webdir+'/ajax/getimgcapcha');
$("#refreshimg").live('click',function(){


        $.post(webdir+'/ajax/randcapcha');
        $("#captchaimage").load(webdir+'/ajax/getimgcapcha');
        return false;
                
    });

     $('#template').change(function() {
     
          if($(this).val())
    {
         $('#template-image').html('<img src="'+webdir+'/images/default/contents/template-'+$(this).val()+'.jpg">');
    }
         
     });
 //ajax province district tumbon
   



$('#register-form').validate({        
        rules: {

             ct_captcha: {
                required: true,
                remote: {
                url: webdir+'/ajax/checkcapcha/',
                type: "post"
                            }
                      },
             memoryurl: {
               minlength:5,    
               required: true,
               remote: {
               url: webdir+'/ajax/checkmemoryurl/',
               type: "post"
                            } 
                      }
                  
        },
        messages: {
                     
               memoryurl: {
               minlength:"ขั้นต่ำต้อง 5 ตัวอักษรขึ้นไป",    
               required: "โปรดกรอกชื่ออัลบั้ม",
               remote:"ชื่ออัลบั้มนี้ซ้ำหรือมีตัวอักษรที่ห้ามใช้"
                            } 
                     ,
                        ct_captcha:{

                                        required: "โปรดกรอกตัวอักษรที่เห็น",
                                        remote: "โปรดกรอกตัวอักษรให้ตรงกับรูปภาพ "
                                }
                        
                        
                                
                                 },
        submitHandler: function(form)
        {
            
           // $('#register-form').serialize();
           //$.post(webdir+'/ajax/saveregister', $('#register-form').serialize() );
           
           $.post(webdir+'/ajax/savememory',$('#register-form').serialize() ,function(data) {
               var validator = $("#register-form").validate();
               
               var myObject = eval('(' + data + ')');

               if(myObject.error)
               {
                    alert(myObject.error);
               }else{
                  // alert();
                   
                   alert('บันทึกข้อมูลเรียบร้อยแล้ว');
                  // alert(webdir+'/memory/'+myObject.username+'/'+myObject.memoryurl);
                   location.href=webdir+'/'+myObject.username+'/memory/'+myObject.memoryurl;
               }
               
              
               
           });
           

                   // checkfileimage();
        }
                                

});


});