

<!-- contents -->
          <div id="main" role="main" class="clearfix">
          <? include('categorybrowse.php')?>   
<form name="register-form"    method="post" id="register-form">
    <div id="form-register">

        <?if(empty($_COOKIE['userlogin'])){?>       
        <div id="register-member">
            <h3>Member Information</h3>
            <p>
                <label for="">อีเมล์ <span>:</span></label>
                <input type="text" id="email" value="<?echo $this->data['email'];?>" name="email" maxlength="30" value="" />
                <input type="hidden" id="fid" name="fid" value="<?echo $this->data['fid'];?>"  id="fid" />
                <span class="required">*</span>
<label for="email" generated="true" class="error"></label>
                <?if(empty($this->data['fid'])){?>  
                        
                        <a href="<?php echo $this->data['loginfacebook'];  ?>"><img id="RES_ID_fb_login_image" src="http://static.ak.fbcdn.net/rsrc.php/v1/y_/r/vE_oh0zqP1Z.gif" alt="Connect"></a>
                <?}?>
            </p>
            <p>
                <label for="">ชื่อสมาชิก <span>:</span></label>
                <input type="text" id="username" name="username" value="<? echo $this->data['username'];?>" maxlength="30" value="" />
                <span class="required">*</span><label for="username" generated="true" class="error"></label>
                
            </p>
            <p>
                <label for="">&nbsp;<span>&nbsp;</span></label>
                <span class="text-normal">ขึ้นต้นด้วยตัวอักษร และตามด้วยตัวอักษรภาษาอังกฤษ (a-z,A-Z), <br />
                ตัวเลข(0-9),เครื่องหมาย "-", เครื่องหมาย "_", ห้ามมีเว้นวรรค</span>
            </p>
            <p>
                <label for="">รหัสผ่าน <span>:</span></label>
                <input type="password" id="password1" name="password1" maxlength="30" value="" />
                <span class="required">*</span><label for="password1" generated="true" class="error"></label>
                <span class="text-normal">ความยาวไม่เกิน 16 ตัวอักษร</span>
            </p>
            <p>
                <label for="">ยืนยันรหัสผ่าน <span>:</span></label>
                <input type="password" id="repassword" name="repassword" maxlength="30" value="" />
                <span class="required">*</span><label for="repassword" generated="true" class="error"></label>
            </p>
            <p class="space">&nbsp;</p>
        </div>
        <?}?>
        <div id="register-shop">
            <h3>ข้อมูลร้านค้า (Shop Information)</h3>
            <p>
                <label for="">ประเภทของร้านค้า <span>:</span></label>
                <select id="cat" name="cat" size="1">
                    <option selected="selected" value="">เลือกประเภทของร้านค้า</option>
                     <?
                        if(is_array($this->data['cat'])){
                          foreach($this->data['cat'] as $value)
                          {
                           ?>
                           <option value="<?=$value['catid']?>"><?=$value['catname']?></option>
                           <?   
                          }
                          
                          
                      }?>
                </select>
                <span class="required">*</span><label for="cat" generated="true" class="error"></label>
            </p>
            <p>
                <label for="">หมวดหมู่ของร้านค้า <span>:</span></label>
                <select name="subcat" id="subcat">
                        <option selected="selected" value="">เลือกหมวดหมู่ร้านค้า</option>
                </select>
                <span class="required">*</span><label for="subcat" generated="true" class="error"></label>
            </p>
            <p>
                <label for="">ชื่อร้านค้า <span>:</span></label>
                <input type="text" name="shopname" value="" id="shopname" />
                <span class="required">*</span><label for="shopname" generated="true" class="error">ชื่อที่จะไปปรากฏบนแผนที่</label>
            </p>
            <p>
                <label for="">ชื่อ URL <span>:</span></label>
                <input type="text" name="shopurl" value="" id="shopurl" />
                <span class="required">*</span><label style="width: 400px;" for="shopurl" generated="true" class="error">ชื่อที่ปรากฏบนแอดเดรสบาร์ เช่น cool.infostant.com</label>
                
            </p>
            <p>
                <label for="">Website <span>:</span></label>
                <input type="text" name="website" value="http://" id="website" />
                <span class="required">&nbsp;</span>
                <label for="website" generated="true" class="error"> เว็บไซต์หลัก (ถ้ามี)   </label>
                
            </p>
            <p>
                <label for="">Title <span>:</span></label>
                <input type="text" id="title" name="title" maxlength="30" value="" />
                <span class="required">*</span><label for="title" generated="true" class="error">หัวข้อที่บ่งบอกถึงสถานที่นั้นๆ</label>
            </p>
            <p>
                <label for="">Keyword <span>:</span></label>
                <input type="text" id="keyword" name="keyword" maxlength="30" value="" />
                <span class="required">*</span><label for="keyword" style="width: 300px;" generated="true" class="error">เอาไว้ช่วยในส่วนของผลการค้นหาในระบบ Search Engine</label>
            </p>
            <p>
                <label for="">Description <span>:</span></label>
                <textarea id="description" name="description"></textarea>
                <span class="required">*</span><label for="description" style="width: 300px;" generated="true" class="error">บ่งบอกในสิ่งที่น่าสนใจในสถานที่นั้นๆ เพื่อดึงดูให้ผู้คนได้เข้าไปดูในรายละเอียดอื่นๆของหน้าเพจ
</label>
            </p>
            </div>
        
        <div id="register-shop2">
            <p>
                <label for="">ที่อยู่ <span>:</span></label>
                <textarea id="address" name="address"></textarea>
                <span class="required">*</span><label for="address" generated="true" class="error"></label>
            </p>
            <p>
                <label for="">ประเทศ <span>:</span></label>
                <select id="countries" name="countries" size="1">
                    <option value="">เลือกประเทศ</option>

                      <?
                        if(is_array($this->data['countrie'])){
                          foreach($this->data['countrie'] as $value)
                          {
                           ?>
                           <option value="<?=$value['contrid']?>"><?=$value['country_name']?></option>
                           <?   
                          }
                          
                          
                      }
                      ?>
                </select>
                <span class="required">*</span><label for="countries" generated="true" class="error"></label>
            </p>
            <div id="groupthai">
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
                <span class="required">*</span><label for="province" generated="true" class="error"></label>
            </p>
            <p>
                <label for="">อำเภอ/เขต <span>:</span></label>
                <select id="district" name="district" size="1">
                    <option value="">เลือกอำเภอ/เขต</option>
                </select>
                <span class="required">*</span><div><label for="district" generated="true" class="error"></label></div>
            </p>
            <p>
                <label for="">ตำบล/แขวง <span>:</span></label>
                <select id="tumbon" name="tumbon" size="1">
                    <option value="">เลือกตำบล/แขวง</option>
                </select>
                <span class="required">*</span><div><label for="tumbon" generated="true" class="error"></label></div>
            </p>
            
            </div>
            <div id="groupeng" style="display: none;">
            <p>
                <label for="">Town <span>:</span></label>
                 <input type="text" id="subcontry" disabled="true" name="subcontry" maxlength="30" value="" />
                <span class="required">*</span><div><label for="subcontry" generated="true" class="error"></label></div>
            </p>
            </div>
            <p>
                <label for="">รหัสไปรษณีย์ <span>:</span></label>
                <input type="text" id="postcode" name="postcode" maxlength="30" value="" />
               
            </p>
            <p>
                <label for="">โทรศัพท์ <span>:</span></label>
                <input type="text" id="tel" name="tel" maxlength="30" value="" />
            </p>
            <p>
                <label for="">E-mail <span>:</span></label>
                <input type="text" id="emailshop" name="emailshop" maxlength="30" value="" />    
            </p>
            <p>
                <label for="">เวลาทำการ <span>:</span></label>
                <textarea name="daterange" id="daterange"></textarea>
                <span class="required">*</span><div><label for="daterange" generated="true" class="error"></label></div>
            </p>
            <p>
                <label for="">Templates <span>:</span></label>
                <select id="template" name="template" size="1">
                    <option value="">เลือก Templates</option>

                      <?
                        if(is_array($this->data['template'])){
                           $k=1;   
                          foreach($this->data['template'] as $value)
                          {
                              
                           ?>
                           <option value="<?=$value['temid']?>">Templates <?=$k?></option>
                           <?
                           $k++;     
                          }
                           
                          
                      }
                      ?>
                </select>
                <span class="required">*</span><div><label for="template" generated="true" class="error"></label></div>
            </p>
            <p>
                <label for="">RefCode <span>:</span></label>
                <textarea name="refcode" id="refcode"></textarea>
                <div><label for="refcode" generated="true" class="error"></label></div>
            </p>
            <p>
              
             <label for="">กรอก captcha  </label>
            
             
            
            </p>
             <p>
                <label id="captchaimage" for=""><a href="#" id="refreshimg"  title="Click to refresh image"><img src="<?=homeinfo?>/plugins/ajaxform/captcha/image.php?<?php echo time(); ?>" alt="Captcha image" width="132" height="46" align="left" /></a>
              </label>
              <input type="text" maxlength="6" name="ct_captcha" id="ct_captcha" value=""  >
             <span class="required">*</span><div><label for="ct_captcha" generated="true" class="error"></label></div>
            </p>
         
            
            
            <input type="hidden" name="lat"  id="lat" value="">
            <input type="hidden" name="lng"  id="lng" value="">
            <p>
            <span class="text-bold-underline">หมายเหตุ </span>     
            <span class="text-bold">&nbsp; : &nbsp;</span>
            <span class="text-normal"> กรุณากรอกข้อมูลในช่องที่มีเครื่องหมาย</span><span class="required">*</span> 
            <span class="text-normal">กํากับอยู่ให้ครบถ้วน</span> 
            </p>
            <p>
                <label for="">&nbsp; <span>&nbsp;</span></label>

                <span id="buttonSave" onclick=" $('#register-form').submit();" style="cursor: pointer"  class="button-submit">ลงทะเบียน &nbsp;&nbsp;</span>
                <span id="buttonCancel" style="cursor: pointer" class="button-cancel">ยกเลิก &nbsp;&nbsp;</span>
            </p>
            <p class="space">&nbsp; </p>
                    </div>
          <div id="google-map">
    <p>
        <label for="">ค้นหา &nbsp; </label>
        <input type="text" id="searchmap" name="searchmap" maxlength="30" value="" /> &nbsp;
        <input type="button" id="buttonSearch" onclick="#" style="cursor: pointer; background:url('<?=homeinfo?>/images/default/button/button_search.jpg');
            border: 0 none;

    height: 24px;
    line-height: 24px;
    margin: auto 0;

    width: 24px;
        
        
        "  >
        
    </p>
    <p style="height:10px;">&nbsp; </p>
    <p>
         <div align="center" id="map" style="width: 446px; height: 301px"></div>
    </p>
</div>

<div id="template-image" style="float: left; width: 470px;"></div>          
        </div>
         </form>   





