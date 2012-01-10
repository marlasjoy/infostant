
$(document).ready(function() {
              var webdir=$("#webdir").html(); 
                $('#formset').validate({
                          rules:{
                            password1:{
                            required: true,
                            maxlength:16
                            },
                            repassword: {   
                            equalTo: "#password1"
                            }  
                          },
                          messages: { 
                            password1:{
                            required: "โปรดกรอกพาสเวิร์ด",
                            maxlength:"ความยาวไม่เกิน 16 ตัวอักษร"
                        },          
                        repassword:{
                                       required: "โปรดกรอกพาสเวิร์ด อีกครั้ง นี้",
                                        equalTo: "โปรดกรอกพาสเวิร์ดให้ตรง"
                                }   
                          },
                         submitHandler: function(form)
                         {
                             $.post(webdir+'/ajax/setpassword',$('#formset').serialize(),function(data) { 
                             var myObject = eval('(' + data + ')');    
                               if(myObject.error)
               {
                    alert(myObject.error);
               }
               else{
                   alert('reset password เรียบร้อยแล้ว');
                   location.href=webdir;
               }   
                             });
        
                    }   
                    
                    
                });

});
