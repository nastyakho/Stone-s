<?php

// Получает данные для отображения раздела Категорий, Товаров, Заказов

class Model_Admin extends Model
{
	// В метод передается имя раздела $type
    function get_view($type)
    {
        global $db;
        
	   	$sql = "SELECT * FROM $type";	
        
        $result = mysqli_query($db, $sql) or die('Ошибка в запросе!');
        
        while($row = mysqli_fetch_assoc($result)){
            
            $data[] = $row;
        }
        
        return $data;
    }
}