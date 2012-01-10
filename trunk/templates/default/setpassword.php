   <div id="main" role="main" class="clearfix">
    <? include('categorybrowse.php')?>      
    <div id="category">
        <h1>Set Password</h1>
        <ul>
       
         <form name="formset" id="formset" method="post">
        <div id="register-shop2">
        <p style="text-align:left">กรอก password ใหม่เพื่อทำการ reset ค่ะ</p>
         <p style="text-align:left"><label for="">รหัสผ่าน <span>:</span></label>  <input  title="กรอก Password ด้วยค่ะ" id="password1" name="password1" type="password"></p>
          <p style="text-align:left"><label for="">ยืนยันรหัสผ่าน  <span>:</span></label> <input  title="กรอก Password อีกครั้ง ด้วยค่ะ" id="repassword" name="repassword" type="password"></p> 
         <p style="text-align:left"><span class="button-submit" style="cursor: pointer" onclick=" $('#formset').submit();"  id="buttonSave">ส่งข้อมูล &nbsp;&nbsp;</span></p>
         <br>
         <br>
         <br>
         <br>
         <input type="hidden" name="forgetpassword" id="forgetpassword" value="<?=$this->data['forgetpassword']?>" >
         <input type="hidden" name="username" id="username" value="<?=$this->data['username']?>" >
         </div>
         </form>
         
        </ul>
    </div>
    <hr class="line1">

</div><!-- end of #page-container -->
