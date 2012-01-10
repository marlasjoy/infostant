<div id="page-container"><!-- #page-container content area -->
    <? include('categorybrowse.php')?>  
     <div style="overflow: hidden; height: 360px; "><iframe width="1000" height="588" style="overflow: hidden; height: 588px; margin-top: -80px; " scrolling="no" src="<?=homeinfo?>/powerbeemap"></iframe></div>    
    <div id="home-content">
        <ul>
          <?=$this->data['cat']?>
        </ul>
    </div>
</div><!-- end of #page-container -->
<a href="#powerbeebee" id="hidden_link"><font color="#FFFFFF">.</font></a>
<div id="powerbee-info" style="display:none;">
<div id="powerbeebee" style="width:1000px;height:2225px;">
  <object width="1000" height="288"><param name="movie" value="<?=homeinfo?>/flash/banner-flood-infostant.swf"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="<?=homeinfo?>/flash/banner-flood-infostant.swf" type="application/x-shockwave-flash" width="1000" height="288" allowscriptaccess="always" allowfullscreen="true"></embed></object>
    

<img width="1000" height="1825" usemap="#Map2" src="<?=homeinfo.'/images/default/powerbee/PowerBee-pupup2.jpg'?>">
<map name="Map2">
  <area shape="rect" coords="584,1497,838,1555" href="<?=homeinfo.'/register'?>">
</map>
</div>

</div>
<script>
jQuery(document).ready(function() {
$("#hidden_link").fancybox({
    'width' : '1000',
    'height' :'2225',
    'scrolling'   : 'no',
                    'autoScale'            : true,
                'transitionIn'        : 'none',
                'transitionOut'        : 'none'
});
$("#hidden_link").trigger('click');
});
</script>