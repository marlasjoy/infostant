
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
                      <dt>Setting</dt>
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
                  

                   
                   
                   
                   
                   
      
                  
              </article>
                </div>