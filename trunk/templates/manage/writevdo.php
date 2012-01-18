<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <title>Galleriffic | Custom layout with external controls</title>

        
        <!-- <link rel="stylesheet" href="css/white.css" type="text/css" /> -->


            <script type="text/javascript" src="<?=homeinfo?>/js/popup/uploadify/jquery-1.4.2.min.js"></script>

        <!-- We only want the thunbnails to display when javascript is disabled -->
        <script type="text/javascript">
            document.write('<style>.noscript { display: none; }</style>');
            document.domain="<?=domain?>";
            function testUrlForMedia(pastedData) {
var success = false;
var media   = {};
if (pastedData.match('http://(www.)?youtube|youtu\.be')) {
    if (pastedData.match('embed')) { youtube_id = pastedData.split(/embed\//)[1].split(/[?&]/)[0]; }
    else { youtube_id = pastedData.split(/v\/|v=|youtu\.be\//)[1].split(/[?&]/)[0]; }
    media.type  = "youtube";
    media.id    = youtube_id;
    success = true;
}
else if (pastedData.match('http://(player.)?vimeo\.com')) {
    vimeo_id = pastedData.split(/video\/|http:\/\/vimeo\.com\//)[1].split(/[?&]/)[0];
    media.type  = "vimeo";
    media.id    = vimeo_id;
    success = true;
}
else if (pastedData.match('http://player\.soundcloud\.com')) {
    soundcloud_url = unescape(pastedData.split(/value="/)[1].split(/["]/)[0]);
    soundcloud_id = soundcloud_url.split(/tracks\//)[1].split(/[&"]/)[0];
    media.type  = "soundcloud";
    media.id    = soundcloud_id;
    success = true;
}
if (success) { return media; }
else { alert("No valid media id detected"); }
return false;
}
             $(document).ready(function() {
  //  $('#textarea').html($('#title',parent.document.body).html());
    $('#updatevdo').click(function() {
        
      var embed=testUrlForMedia($('#youtube').val());
        //alert(embed.id);
       if(embed.id)
        {
       $.post('<?=homeinfo?>/ajax/savevideo2','value='+embed.id+'&meid=<?=$this->data['meid']?>', function(reposnse)         
      {
         eval("var obj1="+reposnse); 
          if(obj1.resposne){
              parent.window.setyoutube(embed.id);   
              parent.$.fancybox.close();
          }

       });  
        
        }  
    
        
    });
    
    });
             
             
        </script>
 <style>
       .button{
       background: url("<?=homeinfo?>/images/shop/bg-button-black1.png") no-repeat scroll 0 0 transparent;
    display: block;
    font-size: 18px;
    height: 63px;
    line-height: 55px;
    
    text-align: center;
    width: 169px;
       }
       a {
    color: #A3A3A3;
    text-decoration: none;
}
       </style>
    </head>
    <body>
        <div id="page">
            <div id="container">
                <h1>เพิ่ม Vdo</h1>
                   <p>
    <div id="vdotext"></div>
    <input type="text" style="width: 400px;" name="youtube" id="youtube">
   
  </p>
   <p >ตัวอย่าง http://www.youtube.com/embed/PVhRBTT2-7s </p>
    <p>
    <a id="updatevdo" href="javascript:insertvdo();" class="button">บันทึก</a>
 </p>

            
                
            </div>
        </div>
        <div id="footer">Copyright © 2011 All Rights Reserved.</div>
            </body>
</html>