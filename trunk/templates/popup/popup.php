<html lang="en-US" dir="ltr" xmlns="http://www.w3.org/1999/xhtml"><head>
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
<title><?=title?></title>
 <meta name="viewport" content="minimum-scale=1.0; maximum-scale=1.0; user-scalable=false; initial-scale=1.0;"/>
<link media="all" type="text/css" href="http://fanpage.iteen-tv.com/fanpage/wp-admin/load-styles.php?c=1&dir=ltr&load=global,wp-admin,media&ver=d907dc98bf712ffed1df14b178c8bcdd" rel="stylesheet">
<link media="all" type="text/css" href="http://fanpage.iteen-tv.com/fanpage/wp-includes/js/imgareaselect/imgareaselect.css?ver=0.9.1" id="imgareaselect-css" rel="stylesheet">
<link media="all" type="text/css" href="http://fanpage.iteen-tv.com/fanpage/wp-admin/css/colors-fresh.css?ver=20110121" id="colors-css" rel="stylesheet">
<!--[if lte IE 7]>
<link rel='stylesheet' id='ie-css'  href='http://fanpage.iteen-tv.com/fanpage/wp-admin/css/ie.css?ver=20101102' type='text/css' media='all' />
<![endif]-->
    <link href="<?=homeinfo?>/js/popup/uploadify/uploadify.css" type="text/css" rel="stylesheet" />
    <script type="text/javascript" src="<?=homeinfo?>/js/popup/uploadify/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="<?=homeinfo?>/js/popup/uploadify/swfobject.js"></script>
    <script type="text/javascript" src="<?=homeinfo?>/js/popup/uploadify/jquery.uploadify.v2.1.4.min.js"></script>
    <script>
    document.domain="<?=domain?>";
    function deletefile(filename)
    {
      if(confirm('ต้องการลบรูปนี้หรือไม่'))
      {  
         $.post('<?=homeinfo?>/ajax/deletefile','filename='+filename+'&folder='+'/images/shop_c/<?=$this->data['0']['shopurl']?>', function(reposnse)         {
           eval("var obj1="+reposnse); 
           alert(obj1.resposne);
           $("#queuefinish").html(obj1.table); 
       }); 
       
      }
    }

    function insertimage(filename,k)
    {
        
         

        $('.button').attr("disabled", "true");
        $('.button').val('กำลังบันทึก...');
       // alert('กำลังบันทึก...');
       var checked = $('#check-'+k).attr('checked');
       var thumb=0;
       if(checked)
              {
               thumb=1;
              }
       $.post('<?=homeinfo?>/ajax/resizefile','thumb='+thumb+'&resize=<?=$this->data['action']?>&filename='+filename+'&folder='+'/images/shop_c/<?=$this->data['0']['shopurl']?>', function(reposnse)         {
           eval("var obj1="+reposnse); 
          
         
          
          
          
          $('#<?=$this->data['action']?>',parent.document.body).html('<div style="width: '+obj1.width+'px;height: '+obj1.height+'px;background-image: url(<?=homeinfo?>/images/shop_c/<?=$this->data['0']['shopurl']?>/resize/'+obj1.filedata+');background-repeat: no-repeat;-moz-border-radius: 7px;-webkit-border-radius: 7px;border-radius: 7px;"><a rel="<?=$this->data['group']?>" class="galleryimg" href="<?=homeinfo?>/images/shop_c/<?=$this->data['0']['shopurl']?>/'+obj1.fileorigi+'"><img style="opacity:0" alt="'+$('#alt-'+k).val()+'"  src="<?=homeinfo?>/images/shop_c/<?=$this->data['0']['shopurl']?>/resize/'+obj1.filedata+'"></a></div>  ');
          
          $('#textx<?=$this->data['action']?>',parent.document.body).html($('#alt-'+k).val());
          
          $.post('<?=homeinfo?>/ajax/saveimagefile','group=<?=$this->data['group']?>&imageori='+obj1.fileorigi+'&height='+obj1.height+'&width='+obj1.width+'&imagesrc='+obj1.filedata+'&alt='+$('#alt-'+k).val()+'&action=<?=$this->data['action']?>&filename=<?=$this->data['function']?>&shopurl='+'<?=$this->data['0']['shopurl']?>', function(reposnse)         {
              parent.window.setgalleryimg();
              parent.$.fancybox.close();
              
          
          
          
          });
          
          
          
           
          
       });  
        
        
      
      //alert(); 

    }
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
      $('#file_upload').uploadify({
        'uploader'  : '<?=homeinfo?>/js/popup/uploadify/uploadify.swf',
        'script'    : '<?=homeinfo?>/ajax/uploadfile',
        'cancelImg' : '<?=homeinfo?>/js/popup/uploadify/cancel.png',
        'folder'    : '/images/shop_c/<?=$this->data['0']['shopurl']?>',
        'fileExt'     : '*.jpg;*.gif;*.png',
        'fileDesc'    : 'Image Files',
        'multi'       : true,
        'auto'      : true,
        'queueID'  : 'queue',
         'onComplete'  : function(event, queueID, fileObj, reposnse, data)
                    {
                      // alert(reposnse);        
                       eval("var obj1="+reposnse); 
                       
                      // arraydata[queueID]=obj1.file_name;
                       
                       $("#queuefinish").html(obj1.table); 
                       

                    },
    'onCancel'    : function(event,ID,fileObj,data) 
                    {
     // arraydata.removeByIndex(ID);
       $.post('<?=homeinfo?>/ajax/deletefile','filename='+$('#'+ID).val()+'&folder='+'/images/shop_c/<?=$this->data['0']['shopurl']?>', function(reposnse)         {
           eval("var obj1="+reposnse); 
           alert(obj1.resposne);
       }); 
      $('#'+ID).remove();

     // alert('The upload of  has been canceled!');
                       } 
      });
    });
    </script>
<style>
html, .wp-dialog {
     background-color: #FFFFFF;
}
</style>
</head>
<body id="media-upload">
   
    <div id="media-upload-header">
    <ul id="sidemenu">
    <li id="tab-type"><a class="current" href="<?=homeinfo.'/popup/'.$this->data['setlink']?>">อัพโหลดรุปจากในเครื่อง</a></li>

   <!-- <li id="tab-library"><a  href="<?=homeinfo.'/popup2/'.$this->data['setlink']?>">รูปที่อัพขึ้นไป</a></li>-->
</ul>
    </div>
    
<form id="file-form" class="media-upload-form type-form validate"  method="post" enctype="multipart/form-data">

<div class="project_images"></div>

<h3 class="media-title">ใส่รูปภาพจากในเครื่อง</h3>


<div id="media-upload-notice">
</div>
<div id="media-upload-error">
</div>


<div class="hide-if-no-js" id="flash-upload-ui" style="display: block;">

    <div>เลือกไฟล์ที่จะอัพโหลด
      <input id="file_upload" name="file_upload" type="file" />
    </div>
    <p class="media-upload-size">ไฟล์ขนาดสูงสุด : 1MB    </p><p class="howto">&nbsp;</p>
</div>

<div id="html-upload-ui" style="display: none;">
    <p id="async-upload-wrap">
        <label for="async-upload" class="screen-reader-text">Upload</label>
        <input type="file" id="async-upload" name="async-upload">
        <input type="submit" value="Upload" class="button" id="html-upload" name="html-upload">        <a onClick="try{top.tb_remove();}catch(e){}; return false;" href="#">Cancel</a>
    </p>
    <div class="clear"></div>
    <p class="media-upload-size">Maximum upload file size: 1MB</p>
    <p class="upload-html-bypass hide-if-no-js">You are using the Browser uploader. Try the <a href="/fanpage/wp-admin/media-upload.php?post_id=35316&amp;flash=1">Flash uploader</a> instead.</p>
</div>


<div id="media-items">
<div  id="queue"></div>
<div  id="queuefinish">
<?
$k=1;
 if($this->data['table']) {
 echo $this->data['table'];
    }?>


</div>

</div>
<p class="savebutton ml-submit" style="display: none;">
<input type="submit" value="Save all changes" class="button" id="save" name="save"></p>
</form>



</body></html>
