<div id="page-container"><!-- #page-container content area -->
     <? include('categorybrowse.php')?>
    <div id="sub-category"><!-- #sub-category content area -->
        <h1><a href="<?=homeinfo?>/<?=$this->data['catname']?>"><img src="<?=homeinfo?>/images/default/home/<?=$this->data['catname_en']?>.png" border="0" height="32" ></a></h1>
        <ul>
                <?=$this->data['cat']?>
        </ul>
        <hr class="line1">
        
        <div id="pagination"><!-- #pagination content area -->
            <ul>
                  <?=$this->data['pagination']?>
            </ul>
        </div><!-- end of #pagination -->
    </div><!-- end of #sub-category -->
    
    <div id="sub-category-side"><!-- #sub-category-side -->                    <!--<ul>
            <h1>Categories</h1>
            <li><a href="#">Category 1</a></li>
            <li><a href="#">Category 2</a></li>
            <li><a href="#">Category 3</a></li>
        </ul>
        <ul>
            <h1>Recent Comments</h1>
            <li><a href="#">admin on <span class="text-orange">Sed ut quam odio</span></a></li>
            <li><a href="#">admin on <span class="text-orange">Sed ut quam odio</span></a></li>
            <li><a href="#">admin on <span class="text-orange">Sed ut quam odio</span></a></li>
            <li><a href="#">admin on <span class="text-orange">Sed ut quam odio</span></a></li>
            <li><a href="#">admin on <span class="text-orange">Sed ut quam odio</span></a></li>
        </ul>                     -->
        
        <ul>
            <h1>Advertisements</h1>
            <p>
                <img src="<?=homeinfo?>/images/default/banner/banner_01.jpg" border="0" width="250">
            </p>
            <p style="height:100px;">&nbsp;</p>
        </ul>
    </div><!-- end of #sub-category-side -->
</div><!-- end of #page-container -->