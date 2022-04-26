<div style="float: left; width: 20%;">
    <ul class="nav nav-pills nav-stacked" style="max-width: 300px;">
    <?php  foreach($category as $v):?>
    <li><a href="category/products/<?=strtolower($v['name']);?>"><?=$v['name'];?></a></li>
    <?php endforeach; ?>
    </ul>
</div>
<div>
    <h2>Wellcome to Apple Store!</h2>
</div>