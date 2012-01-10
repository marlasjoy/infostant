<html lang="en-US" dir="ltr" xmlns="http://www.w3.org/1999/xhtml"><head>
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
<title><?=title?></title>
<script type="text/javascript" src="<?=homeinfo?>/js/popup/uploadify/jquery-1.4.2.min.js"></script>
    <script type="text/javascript">
    document.domain="<?=domain?>";
    $(document).ready(function() {
        var setdata="";
       <?if($this->data['function']=="savebg"){?> 
        if($('body',parent.document).attr('class').search(new RegExp(/white/i))!=-1)
        {
            //alert('white');
            setdata="white";

        }else
        {
          //  alert('black');
             setdata="black";
        }
        <?}?>
    $.post('<?=homeinfo?>/ajax/<?=$this->data['function']?>','setdata='+setdata+'&filename=<?=$this->data['action']?>&shopurl='+'<?=$this->data['target']?>', function(reposnse)         
      {
         eval("var obj1="+reposnse); 
          if(obj1.resposne)parent.$.fancybox.close();

       }); 
       // parent.$.fancybox.close();
    });
        </script>
</head>
<body >
<center>...กำลังบันทึกข้อมูล</center>
</body>
</html>