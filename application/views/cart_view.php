<div style="float: left; width: 20%;">
    <ul class="nav nav-pills nav-stacked" >
    <?php  foreach($category as $v):?>
    <li><a href="category/products/<?=strtolower($v['name']);?>"><?=$v['name'];?></a></li>
    <?php endforeach; ?>
    </ul>
</div>
<div style="width: 20%; display: inline-block;">
    <h2 class="text-uppercase" style="padding: 1%;">Cart</h2>
<?php
    
    session_start();
    
    // Если в карзине есть товары, то отображаем форму для оформления заказа
    if($_SESSION['products'])
    {
        foreach($_SESSION['products'] as $product)
        {
            echo "<p>{$product['name']} x {$product['count']}</p>\n";
        }
        
        echo "<p><strong>Total price: {$_SESSION['total_price']} $</strong></p>\n";
        
        $str = <<<EOD
<form method="POST" action="cart/buy">
    <label>Name</label><br />
    <input type="text" name="name" class="form-control"/><br />
    <label>Phone</label><br />
    <input type="text" name="phone" class="form-control"/><br />
    <label>Address</label><br />
    <input type="text" name="address" class="form-control"/><br />
    <a href="cart/clear" class="btn btn-warning btn-sm" style="margin-right: 5%;">Clear cart</a><input type="submit" class="btn btn-success btn-sm" value="Buy"/>
</form>
EOD;
        echo $str;
            
        echo "<p style='margin-top: 10px;'><a href='{$_SERVER['HTTP_REFERER']}'>Add more products</a></p>";
    }
    else
    {
        echo "<h3>Cart empty</h3>";
    }
?>
</div>