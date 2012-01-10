

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
             <p>
              
             <label for="">กรอก captcha  </label>
            
             
            
            </p>
             <p>
                <label id="captchaimage" for=""><a href="#" id="refreshimg"  title="Click to refresh image"><img src="<?=homeinfo?>/plugins/ajaxform/captcha/image.php?<?php echo time(); ?>" alt="Captcha image" width="132" height="46" align="left" /></a>
              </label>
              <input type="text" maxlength="6" name="ct_captcha" id="ct_captcha" value=""  >
             <span class="required">*</span><label for="ct_captcha" generated="true" class="error"></label>
            </p>

        </div>
        <div id="register-shop2" style="width: 100%;"> 
            <p>
                <label for="">&nbsp; <span>&nbsp;</span></label>

                <span id="buttonSave" onclick=" $('#register-form').submit();" style="cursor: pointer"  class="button-submit">ลงทะเบียน &nbsp;&nbsp;</span>
                <span id="buttonCancel" style="cursor: pointer" class="button-cancel">ยกเลิก &nbsp;&nbsp;</span>
            </p>
            </div>
        <?}?>
         <div id="ok" style="display: none; font-size: 20px; color: red;">โปรดยืนยันการเป็นสมาชิกที่ระบุค่ะ</div>
        </div>

         </form>   





