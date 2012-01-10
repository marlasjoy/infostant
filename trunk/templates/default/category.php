   <div id="main" role="main" class="clearfix">
    <? include('categorybrowse.php')?>      
    <div id="category">
        <h1><img src="<?=homeinfo?>/images/default/home/<?=$this->data['catname_en']?>.png" border="0" height="32" ></h1>
        <ul>
          <?=$this->data['cat']?>
        </ul>
    </div>
    <hr class="line1">
    <div id="pagination">
        <ul>
            <?=$this->data['pagination']?>
        </ul>
    </div>
</div><!-- end of #page-container -->
