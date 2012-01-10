          
              
              <div id="myGallery2" class="royalSlider clearfix" style="width: 1000px;height: 400px;margin: 0 auto;">
              <div class="royalLoadingScreen"><p>Loading slider&hellip;<br>Click and drag to navigate</p></div>
                <ul class="royalSlidesContainer" id="testId">
                    <li class="royalSlide">  
                     <img width="1000" height="400" src="<?=homeinfo?>/images/default/contents/slide1.jpg" class="royalImage" usemap="#Map1">
                     </li>
                     <li class="royalSlide">  
                     <img width="1000" height="400" src="<?=homeinfo?>/images/default/contents/slide2.jpg" class="royalImage" usemap="#Map2">
                     </li>
                     <li class="royalSlide">  
                     <img width="1000" height="400" src="<?=homeinfo?>/images/default/contents/slide3.jpg" class="royalImage" usemap="#Map3">
                     </li>
                    
                </ul> 
                
   <map name="Map1" id="Map1">
  <area shape="rect" coords="512,314,790,360" href="<?=homeinfo?>/register" />
</map>
                      <map name="Map2" id="Map2">
  <area shape="rect" coords="596,310,877,359" href="<?=homeinfo?>/register" />
  </map> 
  
  <map name="Map3" id="Map3">
  <area shape="rect" coords="356,46,473,95" href="<?=homeinfo?>/register" />
</map>



                    </div>

              
              <section id="search" class="clearfix">
                  <h3 class="ir">Search by Map</h3>
                  <p>
                      <img src="<?=homeinfo?>/images/icon-search.png" alt="icon-search" /> 
                      <span class="placeholder"><label for="input-search">search</label><input type="text" name="search" id="input-search" /></span>
                      <input type="button" value="SEARCH" id="searchbutton" class="ir" />
                      <input type="button" value="Advance Search" class="ir" onclick="checkbox()" />

                  </p>
                   <div id="advance" style="display: none;" >
                      ค้นหาโดยละเอียด
                     <select size="1" name="cat2" id="cat2">
                    <option value="" selected="selected">เลือกประเภทของร้านค้า</option>
                                                <option value="1">ที่พักอาศัย</option>
                                                      <option value="2">โรงแรม</option>
                                                      <option value="4">ร้านอาหาร</option>
                                                      <option value="5">กาแฟ และ ของหวาน</option>
                                                      <option value="6">ร้านค้า</option>
                                                      <option value="7">เสื้อผ้า เครื่องประดับ</option>
                                                      <option value="8">โรงพยาบาล คลีนิก</option>
                                                      <option value="9">Beauty &amp; Spa</option>
                                                      <option value="10">บริการ</option>
                                                      <option value="11">การขนส่งและคมนาคม</option>
                                                      <option value="12">กีฬา</option>
                                                      <option value="13">สถานศึกษา</option>
                                                      <option value="14">สถานที่ท่องเที่ยว</option>
                                                      <option value="15">อื่นๆ</option>
                                                      <option value="17">สัมมนา</option>
                                                      <option value="18">ร้านอาหารชิว ชิว</option>
                                           </select>
                   <select id="subcat2" name="subcat2">
                        <option value="" selected="selected">เลือกหมวดหมู่ร้านค้า</option>
                </select>  
                <select size="1" name="province2" id="province2">
                    <option value="">เลือกจังหวัด</option>

                                                 <option value="101">กระบี่</option>
                                                      <option value="102">กรุงเทพมหานคร</option>
                                                      <option value="103">กาญจนบุรี</option>
                                                      <option value="104">กาฬสินธุ์</option>
                                                      <option value="105">กำแพงเพชร</option>
                                                      <option value="106">ขอนแก่น</option>
                                                      <option value="107">จันทบุรี</option>
                                                      <option value="108">ฉะเชิงเทรา</option>
                                                      <option value="109">ชลบุรี</option>
                                                      <option value="110">ชัยนาท</option>
                                                      <option value="111">ชัยภูมิ</option>
                                                      <option value="112">ชุมพร</option>
                                                      <option value="113">ตรัง</option>
                                                      <option value="114">ตราด</option>
                                                      <option value="115">ตาก</option>
                                                      <option value="116">นครนายก</option>
                                                      <option value="117">นครปฐม</option>
                                                      <option value="118">นครพนม</option>
                                                      <option value="119">นครราชสีมา</option>
                                                      <option value="120">นครศรีธรรมราช</option>
                                                      <option value="121">นครสวรรค์</option>
                                                      <option value="122">นนทบุรี</option>
                                                      <option value="123">นราธิวาส</option>
                                                      <option value="124">น่าน</option>
                                                      <option value="125">บุรีรัมย์</option>
                                                      <option value="126">ปทุมธานี</option>
                                                      <option value="127">ประจวบคีรีขันธ์</option>
                                                      <option value="128">ปราจีนบุรี</option>
                                                      <option value="129">ปัตตานี</option>
                                                      <option value="130">พระนครศรีอยุธยา</option>
                                                      <option value="131">พะเยา</option>
                                                      <option value="132">พังงา</option>
                                                      <option value="133">พัทลุง</option>
                                                      <option value="134">พิจิตร</option>
                                                      <option value="135">พิษณุโลก</option>
                                                      <option value="136">ภูเก็ต</option>
                                                      <option value="137">มหาสารคาม</option>
                                                      <option value="138">มุกดาหาร</option>
                                                      <option value="139">ยะลา</option>
                                                      <option value="140">ยโสธร</option>
                                                      <option value="141">ระนอง</option>
                                                      <option value="142">ระยอง</option>
                                                      <option value="143">ราชบุรี</option>
                                                      <option value="144">ร้อยเอ็ด</option>
                                                      <option value="145">ลพบุรี</option>
                                                      <option value="146">ลำปาง</option>
                                                      <option value="147">ลำพูน</option>
                                                      <option value="148">ศรีสะเกษ</option>
                                                      <option value="149">สกลนคร</option>
                                                      <option value="150">สงขลา</option>
                                                      <option value="151">สตูล</option>
                                                      <option value="152">สมุทรปราการ</option>
                                                      <option value="153">สมุทรสงคราม</option>
                                                      <option value="154">สมุทรสาคร</option>
                                                      <option value="155">สระบุรี</option>
                                                      <option value="156">สระแก้ว</option>
                                                      <option value="157">สิงห์บุรี</option>
                                                      <option value="158">สุพรรณบุรี</option>
                                                      <option value="159">สุราษฎร์ธานี</option>
                                                      <option value="160">สุรินทร์</option>
                                                      <option value="161">สุโขทัย</option>
                                                      <option value="162">หนองคาย</option>
                                                      <option value="163">หนองบัวลำภู</option>
                                                      <option value="164">อำนาจเจริญ</option>
                                                      <option value="165">อุดรธานี</option>
                                                      <option value="166">อุตรดิตถ์</option>
                                                      <option value="167">อุทัยธานี</option>
                                                      <option value="168">อุบลราชธานี</option>
                                                      <option value="169">อ่างทอง</option>
                                                      <option value="170">เชียงราย</option>
                                                      <option value="171">เชียงใหม่</option>
                                                      <option value="172">เพชรบุรี</option>
                                                      <option value="173">เพชรบูรณ์</option>
                                                      <option value="174">เลย</option>
                                                      <option value="175">แพร่</option>
                                                      <option value="176">แม่ฮ่องสอน</option>
                                           </select>     
                 <select size="1" name="district2" id="district2">
                    <option value="">เลือกอำเภอ/เขต</option>
                </select>                 
                <select size="1" name="tumbon2" id="tumbon2">
                    <option value="">เลือกตำบล/แขวง</option>
                </select>

                  </div>
                  <div id="list">
                      <ul class="h">
                          <li><a href="http://fashion.<?=domain?>/map">แฟชั่นเสื้อผ้า เครื่องประดับ</a></li>
                          <li><a href="http://communication.<?=domain?>/map">การเดินทาง โทรคมนาคม</a></li>
                          <li><a href="http://service.<?=domain?>/map">การบริการ</a></li>
                          <li><a href="http://home.<?=domain?>/map">ที่พัก หอพัก คอนโด</a></li>
                          <li><a href="http://nightlife.<?=domain?>/map">สถานบันเทิงยามค่ำคืน</a></li>
                          <li class="narrow"><a href="http://other.<?=domain?>/map">อื่นๆ</a></li>
                          <li><a href="http://spa.<?=domain?>/map">สปา ความสวยความงาม</a></li>
                          <li><a href="http://education.<?=domain?>/map">การศึกษา</a></li>
                          <li><a href="http://coffee.<?=domain?>/map">กาแฟและของหวาน</a></li>
                          <li><a href="http://seminar.<?=domain?>/map">สัมมนา</a></li>
                          <li class="wide"><a href="http://hotel.<?=domain?>/map">โรงแรม รีสอร์ต</a></li>
                          <li><a href="http://restaurant.<?=domain?>/map">ร้านอาหาร </a></li>
                          <li><a href="http://hospital.<?=domain?>/map">คลีนิค โรงพยาบาล</a></li>
                          <li><a href="http://shop.<?=domain?>/map">ร้านค้า</a></li>
                          <li><a href="http://travel.<?=domain?>/map">ทัวร์และท่องเทียว</a></li>
                          <li><a href="http://sport.<?=domain?>/map">กีฬา สนามกีฬา</a></li>
                      </ul>
                  </div>
                  <script>
                  function checkbox()
                  {
                      $('#advance').toggle();
                      
                      
                  }
                      $(document).ready(function() {
                      var strdistrict=$("select#district2").html();
var strtumbon=$("select#tumbon2").html();;
var strtsubcat=$("select#subcat2").html();
var webdir=$("#webdir").html();
var subdir=$("#subdir").html();    
            var mySliderInstance =  $('#myGallery2').royalSlider({               
                
                slideshowEnabled :true,
                imageAlignCenter:true
            }).data("royalSlider"); 
            
            $('#searchbutton').click(function() {
                if($('#input-search').val()) 
                {   
                    
                     if($('#cat2').val()||$('#subcat2').val()||$('#province2').val()||$('#district2').val()||$('#tumbon2').val())
                     {
                location.href=$('#webdir').html()+'/search/'+$('#input-search').val().replace(/\ /gi, "+" )+'/'+$("#cat2 option[value='"+$('#cat2').val()+"']").text().replace(/\ /gi, "+" )+'/'+$("#subcat2 option[value='"+$('#subcat2').val()+"']").text().replace(/\ /gi, "+" )+'/'+$("#province2 option[value='"+$('#province2').val()+"']").text()+'/'+$("#district2 option[value='"+$('#district2').val()+"']").text().replace( /\//gi, "+" )+'/'+$("#tumbon2 option[value='"+$('#tumbon2').val()+"']").text().replace( /\//gi, "+" )+'/'; 
                         
                     }else
                     {
                                               location.href=$('#webdir').html()+'/search/'+$('#input-search').val().replace(/\ /gi, "+" );     
                     }
                     
                }else
                {
                    if($('#cat2').val()||$('#subcat2').val()||$('#province2').val()||$('#district2').val()||$('#tumbon2').val())
                     {
                location.href=$('#webdir').html()+'/search/'+$('#input-search').val().replace(/\ /gi, "+" )+'/'+$("#cat2 option[value='"+$('#cat2').val()+"']").text().replace(/\ /gi, "+" )+'/'+$("#subcat2 option[value='"+$('#subcat2').val()+"']").text().replace(/\ /gi, "+" )+'/'+$("#province2 option[value='"+$('#province2').val()+"']").text()+'/'+$("#district2 option[value='"+$('#district2').val()+"']").text().replace( /\//gi, "+" )+'/'+$("#tumbon2 option[value='"+$('#tumbon2').val()+"']").text().replace( /\//gi, "+" )+'/'; 
                         
                     }else
                     {
                     alert('โปรดกรอกคำที่จะค้นหา');    
                     }
                    
                }
               
                
            });
            
            $('#province2').change(function() {
   
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
         $("select#district2").html(options);
   
         $("select#tumbon2").html(strtumbon);

});
});

            $('#district2').change(function(){
    

    
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
         $("select#tumbon2").html(options);
   

});
});

$('#cat2').change(function(){
    $.post(webdir+'/ajax/getsubcat', { catid: $(this).val() } ,function(data) {
    
    var myObject = eval('(' + data + ')');

     var options='';


     options +=strtsubcat;
         
if(typeof(myObject.error) == 'undefined')
     {
     $.each(myObject, function(index2,data) {
            
         options += '<option value="' + data.subcatid + '">' +data.subcatname + '</option>';
    
         });
     }
         $("select#subcat2").html(options);

});
});
            
                      });
                  </script>
              </section> <!-- #search -->
