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
    document.domain="<?=domain?>";
    $(document).ready(function() {
        
    //=$('#<?=$this->data['action']?>',parent.document.body).html();    
    
    <?
     $arrayaction=explode('-',$this->data['action']);
     if(count($arrayaction))
     {
     foreach($arrayaction as $valueaction)
     {
    ?>
        
      $('#text-<?=$valueaction?>').val(($('#<?=$valueaction?>',parent.document.body).html()));
      $('#span-<?=$valueaction?>').html(($('#title-<?=$valueaction?>',parent.document.body).html()));  
    
    <?
     }
     }
    
    ?>
    $('#button').click(function() {
        
        
        
        $.post('<?=homeinfo?>/ajax/savetext',''+$('#file-form').serialize()+'&filename=<?=$this->data['function']?>&shopurl='+'<?=$this->data['0']['shopurl']?>&target=<?=$this->data['action']?>', function(reposnse)         
      {   
          
         eval("var obj1="+reposnse); 
          if(obj1.resposne){
              $('#<?=$this->data['action']?>',parent.document.body).html($('#textarea').val());
                  <?

     if(count($arrayaction))
     {
     foreach($arrayaction as $valueaction)
     {
    ?>
        
      $('#<?=$valueaction?>',parent.document.body).html($('#text-<?=$valueaction?>').val());
     
    
    <?
     }
     }
    
    ?>
              
              
              
             parent.$.fancybox.close();
          }

       }); 
        
    });
    
    });
        </script>
</head>
<body id="media-upload">
   
   
    
<form id="file-form" class="media-upload-form type-form validate"  method="post" >



<h3 class="media-title">ใส่ข้อความ</h3>


<div id="media-upload-notice">
<table>

  <?
         if(count($arrayaction))
     {
       
     foreach($arrayaction as $valueaction)
     {
    ?>
    <tr>
    <td><span id="span-<?=$valueaction?>" ></span></td><td>  <input  style=" width:400px"  type="text" name="text-<?=$valueaction?>" id="text-<?=$valueaction?>" > </td>
    </tr>
  <?}}?>
  </table>   
  <p>


    <input type="button" class="button" name="button" id="button" value="บันทึก">
    <span class="media-upload-size">ไม่เกิน 500ข้อความ </span></p>
</div>

</form>



</body>
</html>
