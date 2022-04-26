<?php

// Действия с товаром - добавление, удаление, редактирование

class Model_Adminproduct extends Model
{
	// Возвращает список разделов для бокового меню админпанели
    function get_cat_list()
    {
        global $db;
        
	   	$sql = "SELECT id, name FROM category";	
        
        $result = mysqli_query($db, $sql) or die('Ошибка в запросе!');
        
        while($row = mysqli_fetch_assoc($result))
        {  
            $data[] = $row;
        }
        
        return $data;
    }
    
    // Добавляет новый товар
    function add_product($name, $category, $price, $image)
    {
        global $db;
        
	   	$sql = "INSERT INTO product(name, category, price, image) VALUES('$name', '$category', '$price', '$image')";	
        
        $result = mysqli_query($db, $sql) or die('Ошибка в запросе!');
        
        return true;
    }
    
    // Удаляет товар
    function del_product($product_id)
    {
        global $db;
        
	   	$sql = "DELETE FROM product WHERE id = '$product_id'";	
        
        $result = mysqli_query($db, $sql) or die('Ошибка в запросе!');
        
        return true;
    }
    
    // Возвращает данные товара
    function get_product($product_id)
    {
        global $db;
        
	   	$sql = "SELECT * FROM product WHERE id = '$product_id'";	
        
        $result = mysqli_query($db, $sql) or die('Ошибка в запросе!');
        
        while($row = mysqli_fetch_assoc($result))
        {
            $data[] = $row;
        }
        
        return $data;
    }
    
    // Обновляет информацию о товаре после его измененя
    function update_product($product)
    {
        global $db;
        
        if($product['image'])
        {
            $sql = "UPDATE product 
                SET name = '{$product['name']}', category = '{$product['cat']}', image = '{$product['image']}', price = '{$product['price']}' 
                WHERE id = '{$product['id']}'";
        }
        else
        {
            $sql = "UPDATE product 
                SET name = '{$product['name']}', category = '{$product['cat']}', price = '{$product['price']}' 
                WHERE id = '{$product['id']}'";
        }
        
        $result = mysqli_query($db, $sql) or die('Ошибка в запросе!');
        
        return true;
    }
}