<?php

class Model_Main extends Model
{	
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