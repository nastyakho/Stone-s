<?php

// Отображает страницу товара

class Controller_Product extends Controller
{
    function __construct()
	{
		$this->view = new View();
        
        $this->model = new Model_Product();		
	}
    
    function action_index()
    {
        header('Location: '.BASE_URL);
    }
    
    // Отображает страницу товара
    // В метод передается ID товара $product_id
    function action_view($product_id = null)
    {         
        if($product_id)
        {
            $data['category'] = $this->model->get_category();
            
            $data['product'] = $this->model->get_product($product_id);
            
            $this->view->generate('product_view.php', 'template_view.php', $data); 
        }
        else
        {
            header('Location: '.BASE_URL);
        }
    }
}