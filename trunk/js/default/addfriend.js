
function openaddfriend()
{
       $('#idfriendlist').toggle('slow');
        if($('#idfriendlist').css('display')!= 'none')
  {
       callfriend();
  }
   $('#idaddfriend').toggle('slow');
}
function isInt(x) 
{
    return (x % 1) == 0;
}
function calladdfriend()
{
        if(($("#infid").val()=="")||(!isInt($("#infid").val())))
    {
        alert('โปรดกรอกเป็นตัวเลขเท่านั้น');
        return false;
    }
    
    var webdir=$("#webdir").html();
    var mid=$("#infid").val()-10000;
    $.post(webdir+'/ajax/addfriend',{friend:mid} ,function(data) {
        var myObject = eval('(' + data + ')');    
         if(myObject.error)
               {
                   alert(myObject.error);
               }else{
                   alert('บันทึกข้อมูลเรียบร้อยแล้ว');
               }
        return false;
    });
    return false;
}
function callfriend()
{
    $('.v.line').html('');
    var webdir=$("#webdir").html();
    $.get(webdir+'/ajax/getallcontact2' ,function(data) {
    var myObject = eval('(' + data + ')');    
    var str='';
    
               for(var key in myObject) {
                     var obj = myObject[key];
                     
                   if(obj.tel===null)
                   {
                       var tel='';
                   }else
                   {
                       var tel=obj.tel;
                   }
                   
                   if(obj.pic===null)
                   {
                       var pic=webdir+'/images/default/no-image/100-80.jpg';
                   }else
                   {
                       var pic=webdir+'/images/user_c/'+obj.username+'/'+obj.pic;
                   }
                   str+='<li><a href="'+pic+'" class="thumb"><img  src="'+pic+'" alt="tesry"></a><strong>'+obj.username+'</strong><br>Tel. '+tel+'<br>Email, '+obj.email+'</li>';
                   
               }
              
    $('.v.line').html(str);
            
    });
}
$(document).ready(function() {
    callfriend();
});
