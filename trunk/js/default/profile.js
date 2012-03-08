
$().ready(function() {
 var webdir=$('#webdir').html(); 
 var events=[];   
 var k=0;
 var pass=0;
var options = {
onMonthChangedFinish: function(dateIn) {
//this could be an Ajax call to the backend to get this months events

seteventdate();   
//this could be an Ajax call to the backend to get this months events
return true;

}
};
$.post(webdir + "/ajax/saveitenary",{mid:$('#mid').val()},
                function(data) {
                if(!data)
                {
                                 $.calendar.Initialize(options);       
                }else
                {
                  var   arraydata=jQuery.parseJSON(data);
                  var d = new Date();
                var year=  d.getFullYear();
                var month=  d.getMonth();
                var date=  d.getDate();
                            for(i in arraydata)
            {
               
                var arraydate1= i.split(" ");
                var arraydate2=arraydate1[0].split("-"); 
                 if(year==arraydate2[0]&&month==(arraydate2[1]-1)&&date==arraydate2[2])
                 {
                     pass=1;
                 }
                events[k]={ EventID:k+1, "Date": new Date(arraydate2[0], arraydate2[1]-1, arraydate2[2])};
                k++;
            }
                  $.calendar.Initialize(options,events);
                  seteventdate();
                }
                
                
                if(pass==1)
                {
                   
                setdatebydate(year+'-'+(month+1)+'-'+date);
                }

                });



});
function seteventdate()
{
    $(".event2").click(function() {
          var arraydate1= $(this).attr('date').split("/");
//   alert(date);
      var selectdate= arraydate1[2]+'-'+arraydate1[0]+'-'+arraydate1[1];
      setdatebydate(selectdate);
    });
}
function setdatebydate(date)
{ var webdir=$('#webdir').html(); 
    
     $.post(webdir + "/ajax/getlistday",{mid:$('#mid').val(),date:date},
                function(data) {
                    var   arraydata=jQuery.parseJSON(data);
                    var x=1;
                    $('#event').show();
                    $('#setevent').html('');
                    for(variable in arraydata)
            {
                var obj = arraydata[variable];
                var tr='<tr><td>'+x+'</td><td> '+obj.l+' <br />'+obj.date+' <br />'+obj.time+'</td><td><img src="'+obj.pic+'" alt="thumb-01" /></td><td><strong>Title:</strong>'+obj.title+'<br /><strong>Description:</strong>'+obj.description+'<br /><strong>Providence:</strong>'+obj.proname+'</td><td><a href="javascript:void(0);" class="btn-edit">Edit</a><a href="javascript:void(0);" class="btn-delete">Delete</a></td></tr>';
                $('#setevent').append(tr);
                x++;
            }
                    
                });
} 