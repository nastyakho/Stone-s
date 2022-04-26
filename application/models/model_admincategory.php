<?php

// Обрабатывает действие с категорией

class Model_Admincategory extends Model
{
	// Добавление новой категории
    function add_cat($cat_name)
    {
        global $db;
        
	   	$sql = "INSERT INTO category(name) VALUES('$cat_name')";	
        
        $result = mysqli_query($db, $sql) or die('Ошибка в запросе!');
        
        return true;
    }
    
    // Удаление категории
    function del_cat($cat_id)
    {
        global $db;
        
	   	$sql = "DELETE FROM category WHERE id = $cat_id";	
        
        $result = mysqli_query($db, $sql) or die('Ошибка в запросе!');
        
        return true;
    }
}