<script src="<?=homeinfo?>/js/shop/libs/DOMAssistantCompressed-2.8.js"></script>
<script src="<?=homeinfo?>/js/shop/libs/imgsizer.js"></script>
<script src="<?=homeinfo?>/js/shop/libs/selectivizr-1.0.1.js"></script>
<script src="<?=homeinfo?>/js/shop/mylibs/jquery.infieldlabel.min.js"></script>
<script src="<?=homeinfo?>/js/shop/mylibs/jquery.placeholder.min.js"></script>




<!-- scripts concatenated and minified via build script -->
<script defer src="<?=homeinfo?>/js/shop/plugins.js"></script>
<script defer src="<?=homeinfo?>/js/shop/script.js"></script>

<script>Cufon.now();</script>
<!--           Fix bug cufon flash display -->
<style> #main h3 { visibility : visible; }
header #color { background-color: #<?=$this->data['color']?>; } 
header #color h2 { background-image: url(../../../images/shop/<?=$this->data['catname_en']?>/hd-<?=$this->data['catname_en']?>.png); }
#main h3 {
    color: #<?=$this->data['color']?>;
}
#social ul {
 width: 290px;   
}

</style>