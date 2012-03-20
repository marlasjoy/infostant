
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

    <style>
	
	#event dt > .button {
    background: none repeat scroll 0 0 #D9D7D7;
    border-radius: 3px 3px 3px 3px;
    color: #555555;
    display: inline-block;
    font-size: 11px;
    font-weight: bold;
    height: 25px;
    line-height: 25px;
    padding: 0 10px;
}
		  
	 ul.v > li.icon > a {
    background-attachment: scroll;
    background-clip: border-box;
    background-color: transparent;
    background-image: url("images/icon-function-li.png");
    background-origin: padding-box;
    background-position: 0 0;
    background-repeat: no-repeat;
    background-size: 650px 650px;
    color: #FFFFFF;
    font-weight: normal;
    text-decoration: none;
    text-shadow: none;
}

	#shopmenu li {
    background: -moz-linear-gradient(center top , #EDEDED 0%, #E0E0E0) repeat scroll 0 0 transparent;
    border: 1px solid #CCCCCC;
    border-radius: 5px 5px 5px 5px;
    display: block;
    float: left;
    font-size: 15px;
    font-weight: normal;
    height: 100px;
    line-height: 80px;
    margin: 0 10px 10px 0;
    overflow: hidden;
    width: 236px;
				  }
				  
	#shopmenu li > a {
    background-attachment: scroll;
    background-clip: border-box;
    background-color: transparent;
    background-image: url("images/icon-function-li.png");
    background-origin: padding-box;
    background-position: 50% 50%;
    background-repeat: no-repeat;
    background-size: 650px 650px;
    color: #666666;
    font-weight: normal;
    padding-top: 60px;
    text-align: center;
    text-decoration: none;
    text-shadow: none;
}
	
	ul.v > li.icon.createshop a {
    background-attachment: scroll !important;
    background-clip: border-box !important;
    background-color: transparent !important;
    background-image: url("http://www.infostant.com/css/default/images/icon_createshop.png") !important;
    background-origin: padding-box !important;
    background-position: 50% 40% !important;
    background-repeat: no-repeat !important;
    background-size: 48px 48px !important;
    margin: 0;
}
#shopmenu li > a > span {
    background-attachment: scroll;
    background-clip: border-box;
    background-color: transparent;
    background-image: url("images/bg-function-devider.png");
    background-origin: padding-box;
    background-position: left center;
    background-repeat: no-repeat;
    background-size: 2px 36px;
    display: block;
    height: 38px;
    line-height: 38px;
    padding: 0 0 0 8px;
}



                  </style>
                                    
                  <section id="idshoplist" >
                      <dl id="event">
                      <dt>Affaliate <a class="button" href="http://www.infostant.com/registershop">+ Create Shop</a></dt>
                          <dd>
                          
                          <?php if(!$this->data['tableshop']):?>
                          
                          <div style="background: none repeat scroll 0 0 #EFEFEF;display: block;height: 400px;line-height: 400px;text-align: center;width: 100%;">
                          
                          <div id="shopmenu" style="padding:150px 0 0 250px;">
                                    <ul class="v">   
                                    	<li class="icon createshop"><a href="http://www.infostant.com/registershop"><span>Create New Shop</span></a></li>
                                    </ul>
                                </div>
                          </div>
                          
                          <?php endif;?>
                          
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