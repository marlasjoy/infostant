

  
<body onload="load()" onunload="GUnload()" >






 
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

  
  <div align="center" id="map" style="width:100%; height: 500px"><br/></div>
   </p>

  </div>

 

