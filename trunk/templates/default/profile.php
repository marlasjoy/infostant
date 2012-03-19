
          <div id="main" role="main" class="clearfix">
              <aside>
                  <a href="javascript:void(0);"><img src="images/img-avatar.jpg" alt="img-avatar" /></a>
                  <h3>Feature</h3>
                  <ul class="v">
                      <?=$this->data['leftmenu'];?> 
                  </ul>
              </aside>
              
              <article>
                  <h2><a href="javascript:void(0);"><?=$this->data['username'];?></a></h2>
                  <a href="javascript:void(0);" class="icon edit_profile">Edit Profile</a>
              
                  <input type="hidden" value="<?=$_COOKIE['userid']?>" id="mid" name="mid">
                  
                  <?=$this->data['recent'];?> 
                  
                  <section class="clearfix" id="itenary">
                      <h4>Calendar</h4>
                      <div id="calendar">

                      </div>
                      <dl id="search">
                          <dt>Search Category by Map</dt>
                          <dd>
                              <ul class="h">
                                  <li><a href="http://home.<?=domain?>/map" target="_blank" class="icon map-01">Home</a></li>
                                  <li><a href="http://hotel.<?=domain?>/map" target="_blank" class="icon map-02">Hotel</a></li>
                                  <li><a href="http://restaurant.<?=domain?>/map" target="_blank" class="icon map-03">Restaurant</a></li>
                                  <li><a href="http://coffee.<?=domain?>/map" target="_blank" class="icon map-04">Coffee</a></li>
                                  <li><a href="http://shop.<?=domain?>/map" target="_blank" class="icon map-05">Shop</a></li>
                                  <li><a href="http://fashion.<?=domain?>/map" target="_blank" class="icon map-06">Fashion</a></li>
                                  <li><a href="http://hospital.<?=domain?>/map" target="_blank" class="icon map-07">Hospital</a></li>
                                  <li><a href="http://spa.<?=domain?>/map" target="_blank" class="icon map-08">Spa Beauty</a></li>
                                  <li><a href="http://service.<?=domain?>/map" target="_blank" class="icon map-09">Service</a></li>
                                  <li><a href="http://communication.<?=domain?>/map" target="_blank" class="icon map-10">Commu</a></li>
                                  <li><a href="http://sport.<?=domain?>/map" target="_blank" class="icon map-11">Sport</a></li>
                                  <li><a href="http://seminar.<?=domain?>/map" target="_blank" class="icon map-12">Seminar</a></li>
                                  <li><a href="http://travel.<?=domain?>/map" target="_blank" class="icon map-13">Travel</a></li>
                                  <li><a href="http://education.<?=domain?>/map" target="_blank" class="icon map-14">Education</a></li>
                                  <li><a href="http://nightlife.<?=domain?>/map" target="_blank" class="icon map-15">Night Life</a></li>
                                  <li><a href="http://other.<?=domain?>/map" target="_blank" class="icon map-16">Other</a></li>
                              </ul>
                          </dd>
                      </dl>
                  </section>
                  
                  <section>
                      <dl id="event" style="display:none">
                          <dt id="date"><?=date("d M Y")?></dt>
                          <dd>
                              <table>
  <tbody id="setevent">
                                      <tr>
                                          <td>1</td>
                                          <td>
                                              Friday <br />
                                              14 October 2011 <br />
                                              14:47:20
                                          </td>
                                          <td>
                                              <img src="images/thumb-01.jpg" alt="thumb-01" />
                                          </td>
                                          <td>
                                              <strong>Title:</strong> Donec sed odo dui <br />
                                              <strong>Description:</strong> Nulla Vitae elt libero, a pharetra augue <br />
                                              <strong>Providence:</strong> Bangkok
                                          </td>
                                          <td>
                                              <a href="javascript:void(0);" class="btn-edit">Edit</a>
                                              <a href="javascript:void(0);" class="btn-delete">Delete</a>
                                          </td>
                                      </tr>
                                      <tr>
                                          <td>2</td>
                                          <td>
                                              Friday <br />
                                              14 October 2011 <br />
                                              14:47:20
                                          </td>
                                          <td>
                                              <img src="images/thumb-02.jpg" alt="thumb-01" />
                                          </td>
                                          <td>
                                              <strong>Title:</strong> Donec sed odo dui <br />
                                              <strong>Description:</strong> Nulla Vitae elt libero, a pharetra augue <br />
                                              <strong>Providence:</strong> Bangkok
                                          </td>
                                          <td>
                                              <a href="javascript:void(0);" class="btn-edit">Edit</a>
                                              <a href="javascript:void(0);" class="btn-delete">Delete</a>
                                          </td>
                                      </tr>
                                      <tr>
                                          <td>3</td>
                                          <td>
                                              Friday <br />
                                              14 October 2011 <br />
                                              14:47:20
                                          </td>
                                          <td>
                                              <img src="images/thumb-03.jpg" alt="thumb-01" />
                                          </td>
                                          <td>
                                              <strong>Title:</strong> Donec sed odo dui <br />
                                              <strong>Description:</strong> Nulla Vitae elt libero, a pharetra augue <br />
                                              <strong>Providence:</strong> Bangkok
                                          </td>
                                          <td>
                                              <a href="javascript:void(0);" class="btn-edit">Edit</a>
                                              <a href="javascript:void(0);" class="btn-delete">Delete</a>
                                          </td>
                                      </tr>
                                      <tr>
                                          <td>4</td>
                                          <td>
                                              Friday <br />
                                              14 October 2011 <br />
                                              14:47:20
                                          </td>
                                          <td>
                                              <img src="images/thumb-04.jpg" alt="thumb-01" />
                                          </td>
                                          <td>
                                              <strong>Title:</strong> Donec sed odo dui <br />
                                              <strong>Description:</strong> Nulla Vitae elt libero, a pharetra augue <br />
                                              <strong>Providence:</strong> Bangkok
                                          </td>
                                          <td>
                                              <a href="javascript:void(0);" class="btn-edit">Edit</a>
                                              <a href="javascript:void(0);" class="btn-delete">Delete</a>
                                          </td>
                                      </tr>
                                      <tr>
                                          <td>5</td>
                                          <td>
                                              Friday <br />
                                              14 October 2011 <br />
                                              14:47:20
                                          </td>
                                          <td>
                                              <img src="images/thumb-05.jpg" alt="thumb-01" />
                                          </td>
                                          <td>
                                              <strong>Title:</strong> Donec sed odo dui <br />
                                              <strong>Description:</strong> Nulla Vitae elt libero, a pharetra augue <br />
                                              <strong>Providence:</strong> Bangkok
                                          </td>
                                          <td>
                                              <a href="javascript:void(0);" class="btn-edit">Edit</a>
                                              <a href="javascript:void(0);" class="btn-delete">Delete</a>
                                          </td>
                                      </tr>
                                      <tr>
                                          <td>6</td>
                                          <td>
                                              Friday <br />
                                              14 October 2011 <br />
                                              14:47:20
                                          </td>
                                          <td>
                                              <img src="images/thumb-06.jpg" alt="thumb-01" />
                                          </td>
                                          <td>
                                              <strong>Title:</strong> Donec sed odo dui <br />
                                              <strong>Description:</strong> Nulla Vitae elt libero, a pharetra augue <br />
                                              <strong>Providence:</strong> Bangkok
                                          </td>
                                          <td>
                                              <a href="javascript:void(0);" class="btn-edit">Edit</a>
                                              <a href="javascript:void(0);" class="btn-delete">Delete</a>
                                          </td>
                                      </tr>
                                      <tr>
                                          <td>7</td>
                                          <td>
                                              Friday <br />
                                              14 October 2011 <br />
                                              14:47:20
                                          </td>
                                          <td>
                                              <img src="images/thumb-01.jpg" alt="thumb-01" />
                                          </td>
                                          <td>
                                              <strong>Title:</strong> Donec sed odo dui <br />
                                              <strong>Description:</strong> Nulla Vitae elt libero, a pharetra augue <br />
                                              <strong>Providence:</strong> Bangkok
                                          </td>
                                          <td>
                                              <a href="javascript:void(0);" class="btn-edit">Edit</a>
                                              <a href="javascript:void(0);" class="btn-delete">Delete</a>
                                          </td>
                                      </tr>
                                      <tr>
                                          <td>8</td>
                                          <td>
                                              Friday <br />
                                              14 October 2011 <br />
                                              14:47:20
                                          </td>
                                          <td>
                                              <img src="images/thumb-02.jpg" alt="thumb-01" />
                                          </td>
                                          <td>
                                              <strong>Title:</strong> Donec sed odo dui <br />
                                              <strong>Description:</strong> Nulla Vitae elt libero, a pharetra augue <br />
                                              <strong>Providence:</strong> Bangkok
                                          </td>
                                          <td>
                                              <a href="javascript:void(0);" class="btn-edit">Edit</a>
                                              <a href="javascript:void(0);" class="btn-delete">Delete</a>
                                          </td>
                                      </tr>
                                  </tbody>
                                  <tfoot>
                                      <tr>
                                       <!--   <td colspan="7" id="pagination">
                                              <label for="page">Page 1 of 2</label> <a href="javascript:void(0);" class="active">1</a> <a href="javascript:void(0);">2</a> <a href="javascript:void(0);">&rsaquo;</a>
                                          </td>-->
                                      </tr>
                                  </tfoot>
                              </table>
                          </dd>
                      </dl>
                  </section>
                  

                  
              </article>
                </div>