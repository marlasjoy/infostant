<div id="page-container"><!-- #page-container content area -->
     <? include('categorybrowse.php')?>    
    <div id="category">
        <h1><img src="<?=homeinfo?>/images/default/contents/search.jpg" border="0" height="32" ></h1>
        <ul>
          <?=$this->data['cat']?>
        </ul>
    </div>

    <div id="pagination">
        <ul>
            <?=$this->data['pagination']?>
        </ul>
    </div>
</div><!-- end of #page-container -->
