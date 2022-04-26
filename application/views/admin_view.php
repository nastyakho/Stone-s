<div style="float: left; width: 20%;">
    <ul class="nav nav-pills nav-stacked" style="max-width: 300px;">
         <li><a href="admin/view/category">Categories</a></li>
         <li><a href="admin/view/product">Products</a></li>
         <li><a href="admin/view/orders">Orders</a></li>
    </ul>
</div>
<div style="width: 70%; display: inline-block;">
    <h2><?php echo strtoupper($header);?></h2>
<?php 

// Отображаем выбранный раздел в зависимости от переданного имени раздела $type

switch($type)
{
    case 'category':
    {
        if($data)
        {
            echo "<div class='form-group' style='width: 30%;'>
                <label>Add new category</label>\n
                <form method='post' action='admincategory/action/add' role='form'>\n
			        <input type='text' name='cat_name' class='form-control' />\n 	
				    <input type='submit' value='Add' class='btn btn-success btn-sm' style='margin-top: 10px;'>\n
				</form>
                </div>\n";
            
            echo "<table class='table' style='width: 30%;'>\n";
            
            foreach($data as $cat)
            {
                echo "<tr>";
                
                echo "<td>{$cat['name']}</td><td><a href='admincategory/action/del/?id={$cat['id']}' class='btn btn-danger btn-xs'>delete</a></td>\n";
                
                echo "</tr>\n";
            }
            
            echo "</table>";
        }
        else
        {
            echo "<h3>No categories</h3>\n";
        }
        break;
    }
    
    case 'product':
    {
        if($data)
        {
            echo "<p><a href='adminproduct/action/add' class='btn btn-default'>Add new product</a></p>\n";
        
            echo "<table class='table' style='width: 70%;'>\n";
            
            foreach($data as $prod)
            {
                echo "<tr>";
                
                $prod['image'] ? print("<td><img src='{$prod['image']}' height='50'></td>") : print("<td><img src='images/no_image.jpg' height='50'></td>");
                
                echo "<td>{$prod['name']}</td>
                    <td>{$prod['category']}</td>
                    <td>{$prod['price']} $</td>
                    <td><a href='adminproduct/action/edit/?id={$prod['id']}' class='btn btn-warning btn-xs'>Edit</a></td>
                    <td><a href='adminproduct/action/del/?id={$prod['id']}' class='btn btn-danger btn-xs'>Delete</a></td>\n";
            
                echo "</tr>\n";
            }
            
            echo "</table>";
        }
        else
        {
            echo "<h3>No products</h3>\n";
        }
        
        break;
    }
    
    case 'orders':
    {
        if($data)
        {
            echo "<table class='table table-striped'>\n
                    <thead>\n
                    <tr class='success tr-bold'>\n
                        <td>Order ID</td><td>Date</td><td>Name</td><td>Phone</td><td>Address</td><td>Total price</td><td>Order</td>\n
                    </tr>\n
                    </thead>\n
                    <tbody>\n";
        
            foreach($data as $order)
            {
                echo "
                    <tr>
                        <td>{$order['id']}</td>
                        <td>{$order['date']}</td>
                        <td>{$order['name']}</td>
                        <td>{$order['phone']}</td>
                        <td>{$order['address']}</td>
                        <td>{$order['total_price']} $</td><td>";
                
                $product_list = unserialize($order['products']);
                
                foreach($product_list as $prod)
                {
                    echo "<p>{$prod['name']} x {$prod['count']}</p>\n";
                }
                
                echo "<a href='adminorder/delete/{$order['id']}' class='btn btn-warning btn-sm'>Delete order</a>";
                
                echo "</td></tr>\n";
            }
            
            echo "</tbody></table>";
        }
        else
        {
            echo "<h3>No orders</h3>";
        }
        
        break;
    }     
}
?>
</div>