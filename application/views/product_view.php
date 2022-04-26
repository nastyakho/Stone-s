<div style="float: left; width: 20%;">
    <ul class="nav nav-pills nav-stacked" >
    <?php  foreach($category as $v):?>
    <li><a href="category/products/<?=strtolower($v['name']);?>"><?=$v['name'];?></a></li>
    <?php endforeach; ?>
    </ul>
</div>
<div>
    <!-- Страница товара -->
    <h2 class="text-uppercase" style="margin-left: 2%;">Product</h2>
    <div style='display: inline-block; margin: 1%;'>
<?php
        
    $product[0]['image'] ? print("<p><img src='{$product[0]['image']}' height='200'></p>\n") : print("<p><img src='images/no_image.jpg' height='100'></p>\n");
     
?>
        <h3><?=$product[0]['name']?></h3>
        <p><?=$product[0]['category']?></p>
        <p><?=$product[0]['price']?> $</p>
        <a href='cart/add/<?=$product[0]['id']?>' class='btn btn-success btn-sm'>Add to cart</a>
    </div>
</div>