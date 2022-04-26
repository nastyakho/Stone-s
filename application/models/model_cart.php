<?php

// Действия с карзиной

class Model_Cart extends Model
{
	// Возвращает информацию о товаре
    function get_product($product_id)
    {
        global $db;
        
	   	$sql = "SELECT * FROM product WHERE id = '$product_id'";	
        
        $result = mysqli_query($db, $sql) or die('Ошибка в запросе!');
        
        $row = mysqli_fetch_assoc($result);
       
        return $row;
    }
    
    // Сохраняет заказ
    function add_to_cart($order)
    {
        global $db;
        
	   	$sql = "INSERT INTO orders(name, phone, address, products, date, total_price) 
                        VALUES('{$order['name']}', '{$order['phone']}', '{$order['address']}', '{$order['products']}', NOW(), '{$order['total_price']}')";
        
        $query = mysqli_query($db, $sql) or die('Ошибка в запросе!');
    }
    
    // Возвращает список категорий товара для бокового меню
    public function get_category()
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
}