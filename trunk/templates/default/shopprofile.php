
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
                      <dt>Shop Register <a class="button" href="http://www.infostant.com/registershop">+ Create Shop</a></dt>
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
                                        <li class="icon member"><a href="javascript:openmember()"><span>Member</span></a></li>
                                         <li class="icon member-card"><a href="javascript:openmembercard()"><span>Member Card</span></a></li>
                                    </ul>
                                </div> <!-- #shopmenu end -->
 
                                               
                      </dl>
                   </section>
                   <section id="idmembercard" style="display: none;" >
                        <dl>
                     
                       <dt><h2 class="bar"><a class="back" href="javascript:backmembercard()">back</a>  Member Card  </h2></dt>   
                               <div  id="shopmenu">
                                    <ul class="v">   
                                        <li class="icon member-card"><a href="javascript:membercard_create()"><span>Create Member Card</span></a></li>
                                        <li class="icon member-list"><a href="javascript:membercard_list()"><span>Member List</span></a></li>
                                        <!--<li class="icon member-stamp"><a href="javascript:membercard_stamp()"><span>Stamp</span></a></li>-->
                                        <li class="icon member-usestamp"><a href="javascript:membercard_usestamp()"><span>Use Stamp</span></a></li>
                                        <li class="icon member-report"><a href="javascript:membercard_report()"><span>Report</span></a></li>
                                        <li class="icon statistic"><a href="javascript:membercard_statistic()"><span>Statistic</span></a></li>
                                        <li class="icon member-stamp"><a href="javascript:membercard_setting()"><span>Member Setting</span></a></li>
                                    </ul>
                                </div> <!-- #shopmenu end -->
 
                                               
                      </dl>
                   </section>
                   
                   
                   
                   
                   <section id="idmember" style="display: none;" >
                        <dl>
                       <dt><h2 class="bar"><a class="back" href="javascript:openmember()">back</a>Member</h2></dt> 
                       <div class="subpage">
                               <ul class="v line">
                               <li><a class="thumb" href="landing.html?shopurl=tesry"><img alt="tesry" src="http://www.infostant.com/images/shop_c/chabuton/resize/thumb7.jpg"></a><strong><a href="landing.html?shopurl=tesry">Suphannika Spa – Baan Amphawa Resort&Spa</a></strong>
                               Time. null<br>Tel. null<br>null, กรุงเทพมหานคร 
                               </li>
                               <li><a class="thumb" href="landing.html?shopurl=tesry"><img alt="tesry" src="http://www.infostant.com/images/shop_c/chabuton/resize/thumb7.jpg"></a><strong><a href="landing.html?shopurl=tesry">อีรันด้า เฮอร์เบิล สปา</a></strong>
                               Time. null<br>Tel. null<br>null, กรุงเทพมหานคร 
                               </li>
                               <li><a class="thumb" href="landing.html?shopurl=tesry"><img alt="tesry" src="http://www.infostant.com/images/shop_c/chabuton/resize/thumb7.jpg"></a><strong><a href="landing.html?shopurl=tesry">Healthlandspa</a></strong>
                               Time. null<br>Tel. null<br>null, กรุงเทพมหานคร 
                               </li>
                               </ul>
                               
                            </div>                
                      </dl>
					</section>
                   
                   
                   
                   
                   
                   
                   
                   <section id="idmembercard-create" style="display: none;" >
                        <dl>
                       <dt><h2 class="bar"><a class="back" href="javascript:membercard_create()">back</a> Create Member Card</h2></dt>   
     					
                        	<div class="subpage">
                               <ul class="v">
                               <li><a class="thumb" href="landing.html?shopurl=tesry"><img alt="tesry" src="http://www.infostant.com/images/shop_c/chabuton/resize/thumb7.jpg"></a><strong><a href="landing.html?shopurl=tesry">tesry</a></strong>
                               Time. null<br>Tel. null<br>null, กรุงเทพมหานคร 
                               </li>
                               <ul class="stamp">
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
  
                                        
                               </ul>
                               <div class="text1">* กรุณาแสดง Member Card นี้เพื่อแลกใช้สิทธิ์ ก่อนการเรียกชำระเงิน</div>
                               <div class="text2"><h3 class="condition">Conditions</h3>
                                           <div class="data">
                                          <div style="display:block; background:#efefef;height: 400px;text-align: center;width: 100%; line-height:400px;">Input text here.</div>
                                            </div>
                               </div>
                              
                               </ul>
                               
                            </div>
                                              
                      </dl>
                   </section>
                   
                   
                    <section id="idmembercard-list" style="display: none;" >
                        <dl>
                       <dt><h2 class="bar"><a class="back" href="javascript:membercard_list()">back</a> Member List</h2></dt>   
     					<div class="subpage">
                               <ul class="v line">
                               <li><a class="thumb" href="landing.html?shopurl=tesry"><img alt="tesry" src="http://www.infostant.com/images/shop_c/chabuton/resize/thumb7.jpg"></a><strong><a href="landing.html?shopurl=tesry">Suphannika Spa – Baan Amphawa Resort&Spa</a></strong>
                               Time. null<br>Tel. null<br>null, กรุงเทพมหานคร 
                               </li>
                               <li><a class="thumb" href="landing.html?shopurl=tesry"><img alt="tesry" src="http://www.infostant.com/images/shop_c/chabuton/resize/thumb7.jpg"></a><strong><a href="landing.html?shopurl=tesry">อีรันด้า เฮอร์เบิล สปา</a></strong>
                               Time. null<br>Tel. null<br>null, กรุงเทพมหานคร 
                               </li>
                               <li><a class="thumb" href="landing.html?shopurl=tesry"><img alt="tesry" src="http://www.infostant.com/images/shop_c/chabuton/resize/thumb7.jpg"></a><strong><a href="landing.html?shopurl=tesry">Healthlandspa</a></strong>
                               Time. null<br>Tel. null<br>null, กรุงเทพมหานคร 
                               </li>
                               </ul>
                               
                            </div>                   
                      </dl>
                   </section>
                   
<!--                   <section id="idmembercard-stamp" style="display: none;" >
                        <dl>
                       <dt><h2 class="bar"><a class="back" href="javascript:membercard_stamp()">back</a> Stamp</h2></dt>   
     					Content                    
                      </dl>
                   </section>-->
                   
                   
                   <section id="idmembercard-usestamp" style="display: none;" >
                        <dl>
                       <dt><h2 class="bar"><a class="back" href="javascript:membercard_usestamp()">back</a> Use Stamp</h2></dt>   
                       
     					<form method="post" action="" id="dummy">
                        
                       

                            <div style="padding:20px 40px;">  
                                <p>
                                  <label for="dummy1">Infostant ID</label><br>
                                  <input type="text" value="" name="dummy1" id="dummy1" class="text" >
                                </p>
                                
                                 <p>
                                  <label for="dummy2">Total Stamp</label><br>
                                  <input type="text" value="" name="dummy2" id="dummy2" class="text">
                                </p>
                    
                                <p>
                                  <label for="dummy3">Advance</label><br>
                                   item 1 <input type="text" value="" name="dummy3" id="dummy3" class="text"><a class="cross" href="#"></a><br>
                                   item 2 <input type="text" value="" name="dummy3" id="dummy3" class="text"><a class="cross" href="#"></a><br>
                                   item 3 <input type="text" value="" name="dummy3" id="dummy3" class="text"><a class="cross" href="#"></a>
                                </p>
                    
                    
                                <p>
                                  <input type="submit" value="Submit">
                                  <input type="reset" value="Reset">
                                </p>
                    
                              </div>
                             
        			</form>                   
                      </dl>
                   </section>
                   
                   <section id="idmembercard-report" style="display: none;" >
                        <dl>
                       <dt><h2 class="bar"><a class="back" href="javascript:membercard_report()">back</a>Report</h2></dt>   
     					 <div  id="shopmenu">
                                    <ul class="v">   
                                        <li class="icon member-card"><a href=""><span>By Day</span></a></li>
                                        <li class="icon member-list"><a href=""><span>By Month</span></a></li>
                                        <li class="icon member-stamp"><a href=""><span>By Year</span></a></li>

                                    </ul>
                                </div> <!-- #shopmenu end -->                   
                      </dl>
                   </section>
                   
                   <section id="idmembercard-statistic" style="display: none;" >
                        <dl>
                       <dt><h2 class="bar"><a class="back" href="javascript:membercard_statistic()">back</a>Statistic</h2></dt>   
     					Content                    
                      </dl>
                   </section>
                   
                   <section id="idmembercard-setting" style="display: none;" >
                        <dl>
                       <dt><h2 class="bar"><a class="back" href="javascript:membercard_setting()">back</a>Setting</h2></dt>   
     					<form method="post" action="" id="dummy">
                        
                       

                            <div style="padding:20px 40px;">  
                                <p>
                                  <label for="dummy1">Total Cost</label><br>
                                  <input type="text" value="" name="dummy1" id="dummy1" class="text" >
                                </p>
                                
                                 <p>
                                  <label for="dummy2">Stamp</label><br>
                                  <input type="text" value="" name="dummy2" id="dummy2" class="text">
                                </p>
                    
                                <p>
                                  <label for="dummy3">Advance</label><br>
                                   item 1 <input type="text" value="" name="dummy3" id="dummy3" class="text"><a class="cross" href="#"></a><br>
                                   item 2 <input type="text" value="" name="dummy3" id="dummy3" class="text"><a class="cross" href="#"></a><br>
                                   item 3 <input type="text" value="" name="dummy3" id="dummy3" class="text"><a class="cross" href="#"></a>
                                </p>
                    
                                <p>
                                  <input type="submit" value="Submit">
                                  <input type="reset" value="Reset">
                                </p>
                    
                              </div>
                             
        			</form>                         
                      </dl>
                   </section>
                   
                   
                   
                   
                   
                   
                   
                   
                   <section id="idpromotionmenu" style="display: none;" >
                   
                  
                   
                        <dl>
                      <dt><h2 class="bar"><a class="back" href="javascript:backpromotion()">back</a> Promotion Menu </h2></dt>
                      
                      
                       <div  id="shopmenu">
                                    <ul class="v">   
                                    	<li class="icon createpromotion"><a href="javascript:createpromotion()"><span>Create Promotion</span></a></li>
                                        <li class="icon promotionmember"><a href="javascript:promotiom_member()"><span>Promotion Member</span></a></li>
                                        <li class="icon qr"><a href="javascript:promotiom_use()"><span>Use Promotion</span></a></li>
                                        <li class="icon statistic"><a href="javascript:promotiom_statistic()"><span>Statistic</span></a></li>
                                
                                    </ul>
                                </div> <!-- #shopmenu end -->
                            
                      </dl>
                   </section>
                   
                   
                 
                   <section id="idpromotion-member" style="display: none;" >
                        <dl>
                       <dt><h2 class="bar"><a class="back" href="javascript:promotiom_member()">back</a>Promotion Member</h2></dt>   
                       <div class="subpage">
                               <ul class="v line">
                               <li><a class="thumb" href="landing.html?shopurl=tesry"><img alt="tesry" src="http://www.infostant.com/images/shop_c/chabuton/resize/thumb7.jpg"></a><strong><a href="landing.html?shopurl=tesry">Suphannika Spa – Baan Amphawa Resort&Spa</a></strong>
                               Time. null<br>Tel. null<br>null, กรุงเทพมหานคร 
                               </li>
                               <li><a class="thumb" href="landing.html?shopurl=tesry"><img alt="tesry" src="http://www.infostant.com/images/shop_c/chabuton/resize/thumb7.jpg"></a><strong><a href="landing.html?shopurl=tesry">อีรันด้า เฮอร์เบิล สปา</a></strong>
                               Time. null<br>Tel. null<br>null, กรุงเทพมหานคร 
                               </li>
                               <li><a class="thumb" href="landing.html?shopurl=tesry"><img alt="tesry" src="http://www.infostant.com/images/shop_c/chabuton/resize/thumb7.jpg"></a><strong><a href="landing.html?shopurl=tesry">Healthlandspa</a></strong>
                               Time. null<br>Tel. null<br>null, กรุงเทพมหานคร 
                               </li>
                               </ul>
                               
                            </div>             
                      </dl>
                   </section>
                   
                   <section id="idpromotion-statistic" style="display: none;" >
                   <dl>
                       <dt><h2 class="bar"><a class="back" href="javascript:promotiom_statistic()">back</a>Report</h2></dt>   
                          <div  id="shopmenu">
                                    <ul class="v">   
                                         
                                        <li class="icon member-card"><a href="javascript:reportpromotionbyday()"><span>By Day</span></a></li>
                                        <li class="icon member-list"><a href="javascript:reportpromotionbymonth()"><span>By Month</span></a></li>
                                        <li class="icon member-stamp"><a href="javascript:reportpromotionbyyear()"><span>By Year</span></a></li>

                                    </ul>
                                    <input type="text" id="setbox" name="setbox"  style="opacity:0" >
                                </div> <!-- #shopmenu end -->               
                              <canvas id="line1" width="600" height="250"></canvas>    
                      </dl>
					</section>
                    
                    <section id="idpromotion-statistic" style="display: none;" >
                        <dl>
                       <dt><h2 class="bar"><a class="back" href="javascript:promotiom_statistic()">back</a>Statistic</h2></dt>  
                       Graph              
                      </dl>
					</section>
                    <section id="idpromotion-use" style="display: none;" >
                        <dl>
                       <dt><h2 class="bar"><a class="back" href="javascript:promotiom_use()">back</a>Use Promotion</h2></dt>    
                       <form method="post" action="" onsubmit="callpromotionuse()" id="dummy">
                        
                       

                            <div style="padding:20px 40px;">  
                                <p>
                                  <label for="dummy1">Infostant ID</label><br>
                                  <input type="text" value="" name="infid" id="infid" class="text" >
                                </p>
                                
                                <p>
                                  <input type="button" onclick="callpromotionuse()" class="submit" value="Submit">
                                  <input type="reset" value="Reset">
                                </p>
                    
                              </div>
                             
        			</form>              
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
                                                            
                                                            
                                                            
                                                            <div class="d1">
                                                            <div id="title" onclick="changecontent('title')" class="nocontenttitle">Input text here</div>
                                                                            </div>
                                                                            
                                                                            <div class="d2 subpage">
                                                                                             <div id="description" onclick="changecontent('description')" class="nocontentdescription" >Input text here.</div>
                                                                                                
                                                                                                
                                                                            </div>
                                                                            
                                                              </div>
                             
                          </dd>
                      </dl>
                   </section>
                  
              </article>
                </div>