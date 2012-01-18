
          <div id="main" role="main" class="clearfix">
              <aside>
                  <a href="javascript:void(0);"><img src="<?=homeinfo?>/images/img-avatar.jpg" alt="img-avatar" /></a>
                  <h3>Feature</h3>
                  <ul class="v">
                    <?=$this->data['leftmenu'];?> 
                  </ul>
              </aside>
              
              <article>
                  <h2><a href="javascript:void(0);"><?=$this->data['username'];?></a></h2>
                  <a href="javascript:void(0);" class="icon edit_profile">Edit Profile</a>

                  

                    <?=$this->data['recent'];?> 

                  
                                    
                  <section>
                      <dl id="event">
                      <dt>Register Memory</dt>
                          <dd>
                             <form name="register-form"    method="post" id="register-form">
    <div id="form-register">



        
        <div id="register-shop2" style=" width: 100%;">
         <h3>ข้อมูลสถานที่</h3>
           <p>
                <label for="">ชื่ออัลบั้ม <span>:</span></label>
                <input type="text" name="memoryurl" value="" id="memoryurl" />
                <input type="hidden" name="username" value="<?=$_COOKIE['userlogin']?>" id="username" />
                <input type="hidden" name="mid" value="<?=$_COOKIE['userid']?>" id="mid" />
                <span class="required">*</span><label style="width: 400px;" for="memoryurl" generated="true" class="error">ห้ามมี - , _ และ เว้นวรรค</label>
                
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
                <div id="template-image" style=" margin: 0pt auto;width:100%;text-align:center"></div>    
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
          
      
        </div>
         </form>  
                          </dd>
                      </dl>
                  </section>
                  
                   <section>
                   </section>
                  
              </article>
                </div>