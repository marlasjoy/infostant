
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
                      <dt><a href="javascript:backshop()">back</a> Shop Menu <input type="hidden" id="shopurldata" name="shopurldata" value=""><input type="hidden" id="siddata" name="siddata" value=""></dt>
                          <dd>
                             <a href="<?=homeinfo?>/registershop"> 1.Create New Shop</a>
                          </dd>
                          <dd>
                             <a href="javascript:editshop()"> 2.Shop edit </a>
                          </dd>
                         <dd>
                             <a href="javascript:openpromotion()"> 3.Promotion </a>
                          </dd>
                          <dd>
                              4.Member
                          </dd>
                          <dd>
                              5.Event
                          </dd>
                          <dd>
                              6.Affaliate
                          </dd>
                                               
                      </dl>
                   </section>
                   <section id="idpromotionmenu" style="display: none;" >
                        <dl>
                      <dt><a href="javascript:backpromotion()">back</a> Promotion Menu </dt>
                          <dd>
                             <a href="javascript:createpromotion()"> 1.Create Promotion</a>
                          </dd>
                          <dd>
                             <a href="javascript:editshop()"> 2.Promotion Member </a>
                          </dd>
                         <dd>
                             <a href="javascript:openpromotion()"> 3.Insert Code </a>
                          </dd>
                          <dd>
                              <a href="javascript:openpromotion()"> 4.Statistic </a>
                          </dd>
                          <dd>
                              5.Event
                          </dd>
                          <dd>
                              6.Affaliate
                          </dd>
                                               
                      </dl>
                   </section>
                   <link rel="stylesheet" href="<?=homeinfo?>/css/default/shopprofile.css" />
                   <section id="promotionpage" style="display: none;" >
                   <dl id="event">
                      <dt>Promotion Page</dt>
                          <dd>
                          
                             
                                                            <div class="main_image">
                                                               <!--<img src="<?=imginfo?>/images/default/shopprofile/promotion_ex1_image.jpg" width="100%"/>-->
                                                               <span class="label">735 X 345</span>
                                                             </div>
                                                             <div class="data">
                                                             
                                                             <a class="logo" href="#">
                                                             <span class="label">100 x 100</span>
                                                             </a>
                                                             
                                                             <div class="promo">  
                                                             <a class="logo" href="#">
                                                             <span class="label">100 x 100</span>
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