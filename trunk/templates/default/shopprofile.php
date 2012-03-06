
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
                   <section id="promotionpage" style="display: none;" >
                   <dl id="event">
                      <dt>Promotion Page</dt>
                          <dd>
                             ddd
                          </dd>
                      </dl>
                   </section>
                  
              </article>
                </div>