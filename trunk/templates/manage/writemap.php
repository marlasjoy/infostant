<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>title</title>
    <script type="text/javascript" src="<?=homeinfo?>/js/default/google-stat.js"></script> 


     <script type="text/javascript" src="<?=homeinfo?>/js/popup/uploadify/jquery-1.4.2.min.js"></script>     
       <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
       <script src="<?=homeinfo?>/js/user/googlemap.js"></script>
    <script type="text/javascript">
    document.domain="<?=domain?>";
   
  $(document).ready(function() {
      var webdir="<?=homeinfo?>";
  var strdistrict=$("select#district").html();
var strtumbon=$("select#tumbon").html();;
var strtsubcat=$("select#subcat").html();   
$('#province').change(function() {
    if($(this).val())
    {
      
        showAddress($("#province option[value='"+$(this).val()+"']").text());
    }
$.post(webdir+'/ajax/getdistrict', { proid: $(this).val() } ,function(data) {
    
    var myObject = eval('(' + data + ')');
    
     var options='';


     options +=strdistrict;
         
     if(typeof(myObject.error) == 'undefined')
     {
     $.each(myObject, function(index2,data) {
            
         options += '<option value="' + data.disid + '">' +data.disname + '</option>';
    
         });
      }  
         $("select#district").html(options);
   
         $("select#tumbon").html(strtumbon);

});
});

    $('#save').click(function(){
        $('#save').attr("disabled", "true");
        $('#save').val('กำลังบันทึก...');
       parent.window.setpont($('#lat').val(),$('#lng').val());
       var setdata=$('#lat').val()+'pp'+$('#lng').val();
       

       
       $.post('<?=homeinfo?>/ajax/savemap2','setdata='+setdata+'&meid='+'<?=$this->data['meid']?>', function(reposnse)         
      {
         eval("var obj1="+reposnse); 
          if(obj1.resposne)parent.$.fancybox.close();

       }); 
       
    }); 

 $('#lat').keyup(function() {
           
           refeshmap();
     });
     
      $('#lng').keyup(function() {

            refeshmap();
         
     });

$('#district').change(function(){
    
    if($(this).val())
    {
      
        showAddress($("#province option[value='"+$('#province').val()+"']").text()+' '+$("#district option[value='"+$('#district').val()+"']").text());
    }
    
    $.post(webdir+'/ajax/gettumbon', { disid: $(this).val() } ,function(data) {
    
    var myObject = eval('(' + data + ')');

     var options='';


     options +=strtumbon;
         
if(typeof(myObject.error) == 'undefined')
     {
     $.each(myObject, function(index2,data) {
            
         options += '<option value="' + data.tumid + '">' +data.tumname + '</option>';
    
         });
       }
         $("select#tumbon").html(options);
   

});
});

$('#tumbon').change(function(){
 if($(this).val())
    {
      
        showAddress($("#province option[value='"+$('#province').val()+"']").text()+' '+$("#district option[value='"+$('#district').val()+"']").text()+' '+$("#tumbon option[value='"+$('#tumbon').val()+"']").text());
    }   
}); 
      
  });
      
      </script>
    
</head>
<body onload="initialize()" >

<header>
</header>




 
  <p>
                <label for="">จังหวัด <span>:</span></label>
                <select id="province" name="province" size="1">
                    <option value="">เลือกจังหวัด</option>
                      <?
                        if(is_array($this->data['province'])){
                          foreach($this->data['province'] as $value)
                          {
                           ?>
                           <option value="<?=$value['proid']?>"><?=$value['proname']?></option>
                           <?   
                          }
                          
                          
                      }
                      ?>
                </select>
                <label for="">อำเภอ/เขต <span>:</span></label>
                <select id="district" name="district" size="1">
                    <option value="">เลือกอำเภอ/เขต</option>
                </select>
                                <label for="">ตำบล/แขวง <span>:</span></label>
                <select id="tumbon" name="tumbon" size="1">
                    <option value="">เลือกตำบล/แขวง</option>
                </select>
                 <label for="">ค้นหาเพิ่มเติม <span>:</span></label>   
                  <input type="text" id="searchmap" name="searchmap" maxlength="30" value="" />
                <input type="button" id="buttonSearch"  style="cursor: pointer; background:url('<?=homeinfo?>/images/default/button/button_search.jpg');border: 0 none;height: 24px;line-height: 24px;margin: auto 0;width: 24px;">
        <br>
                ละติจูด:<input id="lat"  type="text" name="lat" value="">
                ลองติจูด:<input id="lng" type="text" name="lng" value="">
                   
                 <input type="button" class="button" value="บันทึก" name="save" id="save">
            </p>
          
 </p>

  
  <div align="center" id="maparea" style="width:100%; height: 500px"><br/></div>
   </p>

  </div>
  
</body>

</html>