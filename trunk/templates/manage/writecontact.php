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
            $('#address').val($('#address',parent.document.body).html());
            $('#tel').val($('#tel',parent.document.body).html());
            $('#email').val($('#email',parent.document.body).html());
            $('#website').val($('#website',parent.document.body).html());
            $('#pricerange').val($('#pricerange',parent.document.body).html());
    $('#button').click(function() {
        
        
        
        $.post('<?=homeinfo?>/ajax/savetext3','meid=<?=$this->data['meid']?>&mid=<?=$this->data['userid']?>&'+$('#contactform').serialize(), function(reposnse)         
      {
         eval("var obj1="+reposnse); 
          if(obj1.resposne){
//              $('#daterange',parent.document.body).html($('#textarea').val());

            $('#address',parent.document.body).html($('#address').val());
            $('#tel',parent.document.body).html($('#tel').val());
            $('#email',parent.document.body).html($('#email').val());
            $('#website',parent.document.body).html($('#website').val());
            $('#pricerange',parent.document.body).html($('#pricerange').val());
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
                <h1>กรอกรายละเอียด</h1>
                   <p>
                   <form name="contactform" id="contactform">
    <table>

      <tbody><tr>
    <td><span id="span-address">Address</span></td><td>  <input type="text" id="address" name="address" style=" width:400px"> </td>
    </tr>
      <tr>
    <td><span id="span-tel">Tel</span></td><td>  <input type="text" id="tel" name="tel" style=" width:400px"> </td>
    </tr>
      <tr>
    <td><span id="span-email">Email</span></td><td>  <input type="text" id="email" name="email" style=" width:400px"> </td>
    </tr>
      <tr>
    <td><span id="span-website">Website</span></td><td>  <input type="text" id="website" name="website" style=" width:400px"> </td>
    </tr>
          <tr>
    <td><span id="span-pricerange">Pricerange</span></td><td>  <input type="text" id="pricerange" name="pricerange" style=" width:400px"> </td>
    </tr>
    </tbody></table>
    </form>
  </p>
    <p>
    <input type="button" class="button" name="button" id="button" value="บันทึก">
    <span class="media-upload-size"> </span></p>

            
                
            </div>
        </div>
        <div id="footer">Copyright © 2011 All Rights Reserved.</div>
            </body>
</html>