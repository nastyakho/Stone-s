<div style="float: left; width: 20%;">
    <ul class="nav nav-pills nav-stacked" >
    <?php  foreach($category as $v):?>
    <li><a href="category/products/<?=strtolower($v['name']);?>"><?=$v['name'];?></a></li>
    <?php endforeach; ?>
    </ul>
</div>
<div>
    <h2 class="text-uppercase" style="margin-left: 2%;"><?=$header;?></h2>
<?php
    
    // Отображаем товары из категории
    if($products)
    {
        foreach($products as $v)
        {
            echo "<div style='display: inline-block; margin: 1%;'>";
            
            $v['image'] ? print("<p><img src='{$v['image']}' height='100'></p>") : print("<p><img src='images/no_image.jpg' height='100'></p>");
            
            echo "<h4>{$v['name']}</h4>";
            
            echo "<p>{$v['price']} $</p>";
            
            echo "<a href='product/view/{$v['id']}' class='btn btn-success btn-sm'>View</a>";
            
            echo "</div>";
        }
    }
    else
    {
        echo "<h3>No products</h3>";
    }
?>
</div>