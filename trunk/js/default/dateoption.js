    var sid2;
function savedatepicker(b)
{
   var ex13 = $('#example13'); 
   ex13.datetimepicker('getDate');
   // DP_jQuery_b.datepicker._hideDatepicker();
    
eval("DP_jQuery_"+b+".datepicker._hideDatepicker()");

    
}
function addcalendar(sid)
{
  // alert(sid);
    sid2=sid;
    $('#setbox'+sid).scroller('show');
    
    
    
 //   $('#setbox'+sid).datetimepicker();
 //   $('#setbox'+sid).trigger('focus');
    
}

$(document).ready(function() {

   
    var webdir=$('#webdir').html(); 


    
     $('.setbox').scroller('enable').scroller({dateFormat :'yy-m-d',timeFormat :'HH:ii', preset: 'datetime', theme: 'sense-ui', mode: 'clickpick',onSelect: function(dateText, inst) {
           var arraydata={};
           arraydata[''+dateText+'']=sid2;
           
              $.post(webdir + "/ajax/saveitenary",{calendar:arraydata,mid:$('#mid').val()},
                function(data) {
                    alert('บันทึกเรียบร้อยแล้ว');
                });
       //  var dataid=$(this).attr('id');
                 
    }});
});