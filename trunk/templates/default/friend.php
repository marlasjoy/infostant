
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

                  
                                     
                   <link rel="stylesheet" href="<?=homeinfo?>/css/default/shopprofile.css" />                  
                  <section id="idfriendlist" >
                         <dl id="event">
                      <dt>Friend List<a class="button" href="javascript:openaddfriend()">+ Add Friend</a></dt>
                       <div class="subpage">
                               <ul class="v line">
                               
                               </ul>
                               
                            </div>                
                      </dl>
                  </section>
                  

                  <section id="idaddfriend" style="display: none;" >
                        <dl>
                       <dt><h2 class="bar"><a class="back" href="javascript:openaddfriend()">back</a>Add Friend</h2></dt>    
                       <form method="post" action="" onsubmit="calladdfriend()" id="dummy">
                        
                       

                            <div style="padding:20px 40px;">  
                                <p>
                                  <label for="dummy1">Infostant ID</label><br>
                                  <input type="text" value="" name="infid" id="infid" class="text" >
                                </p>
                                
                                <p>
                                  <input type="button" onclick="calladdfriend()" class="submit" value="Submit">
                                  <input type="reset" value="Reset">
                                </p>
                    
                              </div>
                             
                    </form>              
                      </dl>
                    </section>
                   
                   
                   
                   
                   
      
                  
              </article>
                </div>