$(document).ready(function() { 
    $('#searchform').submit(function() {
     location.href=$('#homeinfo').html()+'/search/'+$('#textSearch').val();
     return false;
    });
});