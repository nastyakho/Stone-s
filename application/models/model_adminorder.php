<?php

// Действия с заказом
class Model_Adminorder extends Model
{	
	// Удаление заказа
    function delete_order($order_id)
    {
        global $db;
        
	   	$sql = "DELETE FROM orders WHERE id = '$order_id'";	
        
        $result = mysqli_query($db, $sql) or die('Ошибка в запросе!');
        
        return true;
    }
}