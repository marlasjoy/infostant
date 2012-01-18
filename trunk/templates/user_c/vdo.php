                <div id="clip" style="background:none">
                <div id="videotext">
                <? if($this->data['datavdo']){
                    echo $this->data['datavdo'];
                    
                }else{?>
                <br>
                <br>
                <br>
                <a class="button black2" href="javascript:changegallery();" id="gallery">Gallery</a>
                <a class="button black2" href="javascript:changevdo();" id="vdogallery">Vdo</a>
                <?}?>
                
                
                
                  
                </div>
<!--                    <span class="label">Upload Clip VDO</span>-->
                    <a href="javascript:changevideotext()" class="ir edit vdo">Edit VDO</a>
                </div>