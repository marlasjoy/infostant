
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
   






$('#dummy').validate({        
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
                       email: {
                       email: "Please correct an e-mail address",
            required: "Please enter your email",
 remote: "This e-mail address already exists"
 },
 username: {
 required: "Please enter username",
 remote: "This username already exists"
 },
 password1: {
 required: "Please enter password",
 maxlength: "password must no longer than 16 characters"
 },
 repassword: {
 required: "Please enter your password again",
 equalTo: "Please enter your correct password "
 }
                        
                        
                                
                                 },
        submitHandler: function(form)
        {
            
           // $('#register-form').serialize();
           //$.post(webdir+'/ajax/saveregister', $('#register-form').serialize() );
           
           $.post(webdir+'/ajax/savemember3',$('#dummy').serialize() ,function(data) {
               var validator = $("#register-form").validate();
               
               var myObject = eval('(' + data + ')');

               if(myObject.error)
               {
                    alert(myObject.error);
               }else{
                  // alert();
                   
                   alert('Thank You For register');
                   location.href=webdir+'/en';
                
               }
               
              
               
           });
           

                   // checkfileimage();
        }
                                

});


});