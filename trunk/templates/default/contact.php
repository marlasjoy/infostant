          <div id="main" role="main" class="clearfix">
          
<style>
		  /* --------------------------------------------------------------

   forms.css
   * Sets up some default styling for forms
   * Gives you classes to enhance your forms

   Usage:
   * For text fields, use class .title or .text
   * For inline forms, use .inline (even when using columns)

-------------------------------------------------------------- */

/*
  A special hack is included for IE8 since it does not apply padding
  correctly on fieldsets
 */
form{color:#666;}
label    { font-weight: normal;}
fieldset { padding:0 1.4em 1.4em 1.4em; margin: 0 0 1.5em 0; border: 1px solid #ccc; }
legend   { font-weight: bold; font-size:1.2em; margin-top:-0.2em; margin-bottom:1em; }

fieldset, #IE8#HACK { padding-top:1.4em; }
legend, #IE8#HACK { margin-top:0; margin-bottom:0; }

/* Form fields
-------------------------------------------------------------- */

/*
  Attribute selectors are used to differentiate the different types
  of input elements, but to support old browsers, you will have to
  add classes for each one. ".title" simply creates a large text
  field, this is purely for looks.
 */
input[type=text], input[type=password], input[type=url], input[type=email],
input.text, input.title,
textarea {
  color:#000;
  background: -moz-linear-gradient(center top , #FFFFFF, #EEEEEE 1px, #FFFFFF 8px) repeat scroll 0 0 transparent;
    border: 1px solid #DDD;
    border-radius: 3px 3px 3px 3px;
    box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
}
input[type=text]:focus, input[type=password]:focus, input[type=url]:focus, input[type=email]:focus,
input.text:focus, input.title:focus,
textarea:focus {
  border-color:#CCC;
}
select { background-color:#fff; border-width:1px; border-style:solid; }

input[type=text], input[type=password], input[type=url], input[type=email],
input.text, input.title,
textarea, select {
  margin:0.5em 0;
}

input.text,
input.title { width: 300px; padding:8px; }
input.title { font-size:1.5em; }
textarea    { width: 390px; height: 250px; padding:5px; }

/*
  This is to be used on forms where a variety of elements are
  placed side-by-side. Use the p tag to denote a line.
 */
form.inline { line-height:3; }
form.inline p { margin-bottom:0; }


/* Success, info, notice and error/alert boxes
-------------------------------------------------------------- */

.error,
.alert,
.notice,
.success,
.info { padding: 0.8em; margin-bottom: 1em; border: 2px solid #ddd; }

.error, .alert { background: #fbe3e4; color: #8a1f11; border-color: #fbc2c4; }
.notice        { background: #fff6bf; color: #514721; border-color: #ffd324; }
.success       { background: #e6efc2; color: #264409; border-color: #c6d880; }
.info          { background: #d5edf8; color: #205791; border-color: #92cae4; }
.error a, .alert a { color: #8a1f11; }
.notice a          { color: #514721; }
.success a         { color: #264409; }
.info a            { color: #205791; }

input[type="submit"], input.submit {
    background: none repeat scroll 0 0 #0088CC;
    border: 1px solid #0066AA;
    border-radius: 5px 5px 5px 5px;
    color: #FFFFFF;
    cursor: pointer;
    font-weight: bold;
    margin-top: 15px;
    padding: 5px;
    width: auto;
}

input[type="submit"]:hover, input[type="submit"]:focus, input.submit:hover, input.submit:focus {
    background: none repeat scroll 0 0 #0066AA;
    color: #FFFFFF;
}

input[type="reset"], input.reset {
    background: none repeat scroll 0 0 #DBA32B;
    border: 1px solid #B78925 ;
    border-radius: 5px 5px 5px 5px;
    color: #FFFFFF;
    cursor: pointer;
    font-weight: bold;
    margin-top: 15px;
    padding: 5px;
    width: auto;
}

input[type="reset"]:hover, input[type="reset"]:focus, input.reset:hover, input.reset:focus {
    background: none repeat scroll 0 0 #B78925;
    color: #FFFFFF;
}

.cross{ background: url(images/btn-delete.png) no-repeat 50% 40% !important; background-size: 24px 24px !important; margin:0;
height: 24px;
    line-height: 24px;
    margin: 0 0 0 10px;
    padding: 10px;
    width: 24px;
}
.tick{ background: url(images/btn-delete.png) no-repeat 50% 40% !important; background-size: 24px 24px !important; margin:0;
height: 24px;
    line-height: 24px;
    margin: 0 0 0 10px;
    padding: 10px;
    width: 24px;
}

          </style>
          
          
          <div style="padding:20px 50px; font-size:14px;">
          <h1>Contact us</h1>
        <table width="100%" cellspacing="0" cellpadding="0" id="bg_block_center">
		<tbody><tr>
			<td>
				หากต้องการสอบถามข้อมูลเพิ่มเติมเกี่ยวกับบริการ การสมัครใช้งาน การเปิดร้านค้า Infostant การลงรูปภาพ การอัพเดทข้อมูล  หรือ ต้องการแจ้งปัญหาการใช้งานเกี่ยวกับเรื่องต่างๆ ของ Infostant สามารถติดต่อได้ผ่านทาง Contact From ด้านล่าง
				<br /><br />เมื่อทางบริษัทได้รับข้อมูลจากท่านแล้วจะรีบดำเนินการติดต่อกลับทันที ของพระคุณที่ติดต่อ ทางทีมงาน Infostant 
			</td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td>
				<table class="tbwidth100">
					<tbody><tr>
						<td  class="txtRight">  <label>ติดต่อ  : </label>
						      <select name="subject" id="subject">
<option value="1">สนใจบริการ</option>
<option value="1">สอบถามข้อมูลบริการเพิ่มเติม</option>
<option value="1">ปัญหาทางเทคนิคการใช้งาน</option>
<option value="1">สนใจเป็น Affiliate</option>
<option value="1">การชำระเงิน</option>
<option value="1">ข้อเสนอแนะ</option>
<option value="1">ติชมเรื่องการบริการ</option>
					          </select></td>
					  <td>
				  
					    </td>
					</tr>
				</tbody></table>
			</td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td>
				<table style="border:none;" class="tbwidth100">
					<tbody><tr><td>&nbsp;</td></tr>
					<tr>
						<td style="width:25%;" class="txtRight">ชื่อบริษัท : </td>
						<td>
							<input type="text" size="60" value="" name="ink_send">
						</td>								
					</tr>
					<tr>
						<td class="txtRight">ชื่อผู้ติดต่อ : </td>
						<td>
							<input type="text" size="60" value="" name="name_send">
							<font color="#FF0000"><b>*</b></font>
						</td>
					</tr>
					<tr>
						<td class="txtRight">email : </td>
						<td>
							<input type="text" size="60" value="" name="email_send">
							<font color="#FF0000"><b>*</b></font>
						</td>
					</tr>
					<tr>
						<td class="txtRight">website : </td>
						<td>
							<input type="text" size="60" value="" name="website_send">
						</td>
					</tr>
					<tr>
						<td class="txtRight">เบอร์โทรศัพท์ : </td>
						<td>
							<input type="text" size="60" onkeydown="DigitOnly(event,this);" value="" name="phone_send">
							<font color="#FF0000"><b>*</b></font>
						</td>
					</tr>
					<tr>
						<td valign="top" class="txtRight">ข้อความ : </td>
						<td>
							<textarea style="width:370px" cols="80" rows="6" name="msg_send"></textarea>
						</td>
					</tr>
					<tr><td>&nbsp;</td></tr>
				</tbody></table>
			</td>
		</tr>
		<tr>
						<td class="txtCenter">&nbsp;</td>								
		</tr>
		<tr>
			<td class="txtCenter">
				<input type="button" style="cursor:hand" onclick="sendMail('http://www.makewebeasy.com/contact/index.php','Ah7gJ');" value="ส่งข้อความ" id="btnSendContactUs" name="btnSendContactUs">
			</td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td class="txtCenter">&nbsp;</td>
		</tr>
	</tbody></table>  
    
    </div>
          
          
          
<!--<img src="<?=homeinfo?>/images/default/contents/contact.jpg" border="0" usemap="#Map">-->

<!-- end of #page-container -->
  </div>