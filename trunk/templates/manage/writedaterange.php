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
             $(document).ready(function() {
    $('#textarea').html($('#daterange',parent.document.body).html());
    $('#button').click(function() {
        
        
        
        $.post('<?=homeinfo?>/ajax/savetext2','target=daterange&meid=<?=$this->data['meid']?>&mid=<?=$this->data['userid']?>&value='+$('#textarea').val(), function(reposnse)         
      {
         eval("var obj1="+reposnse); 
          if(obj1.resposne){
              $('#daterange',parent.document.body).html($('#textarea').val());
             parent.$.fancybox.close();
          }

       }); 
        
    });
    
    });
             
             
        </script>

    </head>
    <body>
        <div id="page">
            <div id="container">
                <h1>เขียนคำบรรยาย</h1>
                   <p>
    <textarea name="textarea" id="textarea" cols="80" rows="10"></textarea>
  </p>
    <p>
    <input type="button" class="button" name="button" id="button" value="บันทึก">
    <span class="media-upload-size"> </span></p>

            
                
            </div>
        </div>
        <div id="footer">Copyright © 2011 All Rights Reserved.</div>
            </body>
</html>