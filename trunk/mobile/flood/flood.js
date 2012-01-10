
 
function jsonpCallback(myObject){
             var areaid=""; 
             $('.ui-listview').html('');
             for (variable in myObject)
             {   
             //alert(variable) ;
                 var obj = myObject[variable]; 
                                              
                 if(obj.areaid!=areaid )
                                              {
                                                 $('.ui-listview').append(' <li data-role="list-divider" role="heading" class="ui-li ui-li-divider ui-btn ui-bar-b ui-li-has-count ui-btn-up-undefined">'+obj.areaname+'<span class="ui-li-count ui-btn-up-c ui-btn-corner-all">2</span></li>');
                                                  areaid=obj.areaid;
                                              }
                                                 $('.ui-listview').append('<li data-theme="c" class="ui-btn ui-btn-icon-right ui-li-has-arrow ui-li ui-btn-up-c ui-li-has-thumb"><div class="ui-btn-inner ui-li" aria-hidden="true"><div class="ui-btn-text"><a href="javascript:void(0);" onclick="location.href=\''+obj.shopurl+'\'" class="ui-link-inherit"><img src="'+obj.pic+'" class="ui-li-thumb"> <h3 class="ui-li-heading">'+obj.shopname+'</h3><p class="ui-li-desc"><strong>'+obj.title+'</strong></p><p class="ui-li-desc">'+obj.description+'</p></a></div><span class="ui-icon ui-icon-arrow-r ui-icon-shadow"></span></div></li>');
                                             
            }  ;
           }
          function    loadajax()
         {
               $.ajax({
                                                      data: {searchTxt: $('#searchBox').val()},                                                            
                                                      url: webdir+'/ajax/getallcat',
                                                      dataType: "jsonp",
                                                      jsonp: 'callback',
                                                      jsonpCallback: 'jsonpCallback', 
                                                      crossDomain:true,xhrFields: {
                                                      withCredentials: true
                                                      },
                                       success: function(myObject){
                                               
                                                      }
                                                    });
          }
 
        //  document.domain="infostant.com";
           
            
            