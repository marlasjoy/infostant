
$(document).ready(function() {
              var webdir=$("#webdir").html(); 
                $('#formforget').validate({
                    
                         submitHandler: function(form)
        {
                             $.post(webdir+'/ajax/sendcode',$('#formforget').serialize() ,function(data) { 
                             var myObject = eval('(' + data + ')');    
                               if(myObject.error)
               {
                    alert(myObject.error);
               }else{
                  // alert();
                   
                   alert('ส่งข้อมูลให้ท่านทาง Email เรียบร้อยรอการยืนยัน');
                   location.href=webdir;
               }   
                             });
        
        }   
                    
                    
                });

});
