<?php

// Отображает главную страницу со списком категорий товаров

class Controller_Main extends Controller
{
    function __construct()
	{
		$this->view = new View();
        
        $this->model = new Model_Main();		
	}
    
    function action_index()
	{	
        $data['category'] = $this->model->get_category();
        		
		$this->view->generate('main_view.php', 'template_view.php', $data);
	}
}