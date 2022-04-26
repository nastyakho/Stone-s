<div style="float: left; width: 20%;">
    <ul class="nav nav-pills nav-stacked" style="max-width: 300px;">
         <li><a href="admin/view/category">Categories</a></li>
         <li><a href="admin/view/product">Products</a></li>
         <li><a href="admin/view/orders">Orders</a></li>
    </ul>
</div>
<div style="width: 70%; display: inline-block;">
<?php 
    
    // Выводим страницу добавления или редактирования товара в зависимости от переданного занчения $action
    switch($action)
    {
        case 'add':
        {
            echo "<h2>Add new product</h2>
                <form enctype='multipart/form-data' action='adminproduct/action/add' method='POST' role='form' style='width: 30%;'>\n
                    <label>Product name</label>\n
                    <input type='text' name='name' class='form-control'/>\n
                    <label>Price, $</label>\n
                    <input type='text' name='price' class='form-control'/>\n
                    <label>Select category</label>\n
                    <select name='category' class='form-control'>\n
            ";
            
            foreach($cat_list as $v)
            {
                echo "<option value='{$v['name']}'>{$v['name']}</option>\n";
            }
            
            echo "
                    </select></p>\n
                    <input type='hidden' name='MAX_FILE_SIZE' value='1000000' />\n
                    <input name='prod_img' type='file' /><br />\n
                    <input type='submit' value='Add' class='btn btn-success btn-sm'/>\n
                </form>\n
            ";
            
            break;
        }
        
        case 'edit':
        {
            echo "<h2>Edit product</h2>
                <form enctype='multipart/form-data' action='adminproduct/action/edit' method='POST' role='form' style='width: 30%;'>\n
                    <label>Product name</label>\n
                    <input type='text' name='name' class='form-control' value='{$product[0]['name']}'/>\n
                    <label>Price, $</label>\n
                    <input type='text' name='price' class='form-control' value='{$product[0]['price']}'/>\n
                    <label>Select category</label>\n
                    <select name='category' class='form-control'>\n
            ";
            
            foreach($cat_list as $cat)
            {
                if($cat['name'] == $product[0]['category'])
                {
                    echo "<option value='{$cat['name']}' selected>{$cat['name']}</option>\n";
                }
                else
                {
                    echo "<option value='{$cat['name']}'>{$cat['name']}</option>\n";
                }
            }
            
            echo "</select></p>\n";
            
            $product[0]['image'] ? print("<p><img src='{$product[0]['image']}' height='100'></p>") : print("<p><img src='images/no_image.jpg' height='100'></p>");
            
            echo "<input type='hidden' name='MAX_FILE_SIZE' value='1000000' />\n
                    <input name='prod_img' type='file' />\n
                    <p class='help-block'>Max file size: 1MB, jpg, jpeg, gif, png</p>\n
                    <input type='hidden' name='id' value='{$product[0]['id']}' />\n
                    <input type='submit' value='Save' class='btn btn-success btn-sm'>\n
                </form>\n
            ";
        }
    }
?>