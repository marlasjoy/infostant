function addcalendar(sid)
{
    
    
 //   $('#setbox'+sid).datetimepicker();
    $('#setbox'+sid).trigger('focus');
    
}
function savedatepicker(b)
{
   var ex13 = $('#example13'); 
   ex13.datetimepicker('getDate');
   // DP_jQuery_b.datepicker._hideDatepicker();
    
eval("DP_jQuery_"+b+".datepicker._hideDatepicker()");

    
}

$(document).ready(function() {
 $('.setbox').datetimepicker({
    hourGrid: 4, 
    minuteGrid: 5, 
    timeFormat: 'hh:mm',
    closeText:'save'
     
 });   

 
});