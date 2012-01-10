<html lang="en-US" dir="ltr" xmlns="http://www.w3.org/1999/xhtml"><head>
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
<title><?=title?></title>
<link media="all" type="text/css" href="http://fanpage.iteen-tv.com/fanpage/wp-admin/load-styles.php?c=1&dir=ltr&load=global,wp-admin,media&ver=d907dc98bf712ffed1df14b178c8bcdd" rel="stylesheet">
<link media="all" type="text/css" href="http://fanpage.iteen-tv.com/fanpage/wp-includes/js/imgareaselect/imgareaselect.css?ver=0.9.1" id="imgareaselect-css" rel="stylesheet">
<link media="all" type="text/css" href="http://fanpage.iteen-tv.com/fanpage/wp-admin/css/colors-fresh.css?ver=20110121" id="colors-css" rel="stylesheet">
<!--[if lte IE 7]>
<link rel='stylesheet' id='ie-css'  href='http://fanpage.iteen-tv.com/fanpage/wp-admin/css/ie.css?ver=20101102' type='text/css' media='all' />
<![endif]-->
<script type="text/javascript" src="<?=homeinfo?>/js/popup/uploadify/jquery-1.4.2.min.js"></script>
    <script type="text/javascript">
    
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

    
    document.domain="<?=domain?>";
    $(document).ready(function() {
       if($('#<?=$this->data['function']?>',parent.document.body).attr("src"))
       {  
     var embed=testUrlForMedia($('#<?=$this->data['function']?>',parent.document.body).attr("src"));       
      if(embed)
        {
            $('#youtube').val('http://www.youtube.com/embed/'+embed.id);    
        }            
       }
    $('#button').click(function() {
        var embed=testUrlForMedia($('#youtube').val());
        //alert(embed.id);
       if(embed.id)
        {
        
        $.post('<?=homeinfo?>/ajax/savevideo','setdata='+embed.id+'&filename=<?=$this->data['action']?>&shopurl='+'<?=$this->data['0']['shopurl']?>&target=<?=$this->data['function']?>', function(reposnse)         
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
</head>
<body id="media-upload">
   
   
    
<form id="file-form" class="media-upload-form type-form validate"  method="post" >



<h3 class="media-title">ใส่ link youtube</h3>


<div id="media-upload-notice">
  <p>
    <input type="text" style=" width: 400px;" name="youtube" id="youtube" >
  </p>
  <p>
    <input type="button" class="button" name="button" id="button" value="บันทึก">
    <span class="media-upload-size">ตัวอย่าง http://www.youtube.com/embed/PVhRBTT2-7s </span></p>
</div>

</form>



</body>
</html>
