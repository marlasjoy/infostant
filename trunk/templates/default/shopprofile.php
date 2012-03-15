
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

                  
                                    
                  <section id="idshoplist" >
                      <dl id="event">
                      <dt>Shop Register</dt>
                          <dd>
                              <table>
                                  <tbody><?=$this->data['tableshop'];?></tbody>
                                  <tfoot>
                                      <tr>
                                          <td colspan="7" id="pagination">
                                              <?=$this->data['pagination'];?>
                                          </td>
                                      </tr>
                                  </tfoot>
                              </table>
                          </dd>
                      </dl>
                  </section>
                  
                   <section id="idshopmenu" style="display: none;" >
                        <dl>
                     
                       <dt><h2 class="bar"><a class="back" href="javascript:backshop()">back</a>  Shop Menu  </h2><input type="hidden" id="shopurldata" name="shopurldata" value=""><input type="hidden" id="siddata" name="siddata" value=""></dt>   
                               <div  id="shopmenu">
                                    <ul class="v">   
                                    	<li class="icon createshop"><a href="<?=homeinfo?>/registershop"><span>Create New Shop</span></a></li>
                                        <li class="icon editshop"><a href="javascript:editshop()"><span>Shop edit</span></a></li>
                                        <li class="icon promotion"><a href="javascript:openpromotion()"><span>Promotion</span></a></li>
                                        <li class="icon member"><a href="#"><span>Member</span></a></li>
                                        <li class="icon event"><a href="#"><span>Event</span></a></li>
                                        <li class="icon aff"><a href="#"><span>Affaliate</span></a></li>
                                         <li class="icon member-card"><a href="#"><span>Member Card</span></a></li>
                                    </ul>
                                </div> <!-- #shopmenu end -->
 
                                               
                      </dl>
                   </section>
                   <section id="idpromotionmenu" style="display: none;" >
                   
                  
                   
                        <dl>
                      <dt><h2 class="bar"><a class="back" href="javascript:backpromotion()">back</a> Promotion Menu </h2></dt>
                      
                      
                       <div  id="shopmenu">
                                    <ul class="v">   
                                    	<li class="icon createpromotion"><a href="javascript:createpromotion()"><span>Create Promotion</span></a></li>
                                        <li class="icon promotionmember"><a href="javascript:editshop()"><span>Promotion Member</span></a></li>
                                        <li class="icon qr"><a href="javascript:openpromotion()"><span>QR Reader</span></a></li>
                                        <li class="icon statistic"><a href="javascript:openpromotion()"><span>Statistic</span></a></li>
                                        <li class="icon event"><a href=""><span>Event</span></a></li>
                                        <li class="icon aff"><a href=""><span>Affaliate</span></a></li>
                                    </ul>
                                </div> <!-- #shopmenu end -->
                            
                      </dl>
                   </section>
                   <link rel="stylesheet" href="<?=homeinfo?>/css/default/shopprofile.css" />
                   <section id="promotionpage" style="display: none;" >
                   <dl id="event">
                      <dt><h2 class="bar"><a class="back" href="javascript:createpromotion()">back</a>Promotion Page</h2></dt>
                          <dd>
                          
                             
                                                            <div class="main_image" onclick="changeimage('735x325',1)">
                                                               <!--<img src="<?=imginfo?>/images/default/shopprofile/promotion_ex1_image.jpg" width="100%"/>-->
                                                               <div id="735x325x1" ></div>
                                                               <span  class="label">735 X 325</span>
                                                             </div>
                                                             <div class="data" onclick="">
                                                             
                                                             <a class="logo" href="javascript:changeimage('100x100',2)">
                                                             <div id="100x100x2" >
                                                             <span class="label">100 x 100</span>
                                                             </div>
                                                             </a>
                                                             
                                                             <div class="promo">  
                                                             <a class="logo" href="javascript:changeimage('100x100',3)">
                                                                <div id="100x100x3" >
                                                             <span class="label">100 x 100 </span>
                                                             </div>
                                                             </a>
                                                        	</div>
                                                            
                                                            
                                                             <a class="fav" href="#"><img  width="100" src="<?=imginfo?>/images/default/shopprofile/btn-add_favorite.png" /></a>
                                                            
                                                            
                                                            
                                                            <div class="d1"><strong>S&amp;P ชือนี้มีแต่ของอร่อย</strong><br />
                                                                              <strong>Vanilla at home</strong><br />บริการใหม่อีกหนึ่งทางเลือกที่คุณตองถูกใจกับสไตลการ
                                                        ครีเอตเมนูได้หลากหลายและน่าสนใจทั้ง ฝรั่ง จีน ญี่ปุ่น 
                                                                            </div>
                                                                            
                                                                            <div class="d2 subpage">
                                                                                                <p>
                                                                                                  <strong>พิเศษ!! ช่วงแนะนำ</strong><br />
                                                                                                   ตลอดเดือนมิถุนายนนี้ Vanilla at home มีโปรโมชั่น
                                                                                                    อิ่มอรอยครบเซตในราคาพิเศษ สำหรับลูกคาที่สั่ง
                                                                                                                            Vanilla Special Set 
                                                                                                                            
                                                                                                                            <br /><br />
                                                                                                        
                                                                                                        บริการทุกวัน : 10.00 - 21.00 น.<br />
                                                                                                        เฉพาะพื้นที่ 5 จุดที่กำหนด ได้แก่<br />
                                                                                                          - ถนนสุขุมวิท 21 <br />
                                                                                                          - สุขุมวิท 71 (ทั้ง 2 ฝั่ง)<br />
                                                                                                          - ถนนพระราม 4 (แยกศูนย์สิริกิติ์)<br />
                                                                                                           - แยกพระโขนง<br />
                                                                                                          - ถนนเพชรบุรีตัดใหม่ (แยกอโศก) <br />
                                                                                                          - พัฒนาการ 20<br />
                                                                                                          - RCA<br />
                                                                                                 <strong>Vanilla at home : 02-381-4332</strong>
                                                                                                </p>
                                                                                                
                                                                                                
                                                                            </div>
                                                                            
                                                              </div>
                             
                          </dd>
                      </dl>
                   </section>
                  
              </article>
                </div>