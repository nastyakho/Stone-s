<?php

// Отображает список товаров из выбранной категории

class Controller_Category extends Controller
{
    function __construct()
	{
		$this->view = new View();
        
        $this->model = new Model_Category();		
	}
    
    // Отображает список товаров из выбранной категории
    // В метод передается имя категории $type 
    function action_products($type = null)
    {      
        if($type)
        {
            $data['category'] = $this->model->get_category();
            
            $data['products'] = $this->model->get_products($type);
            
            $data['header'] = $type;
            
            $this->view->generate('category_view.php', 'template_view.php', $data); 
        }
    }
}