<?php

// Работа с заказами - удаление

class Controller_Adminorder extends Controller
{
    function __construct()
	{
        $this->model = new Model_Adminorder();
	}
    
    function action_index()
    {
        header('Location: '.BASE_URL.'admin/view/orders');
    }
    
    // Удаление заказа по его ID ($order_id)
    function action_delete($order_id)
    {
        $this->model->delete_order($order_id);
        
        header('Location: '.BASE_URL.'admin/view/orders'); 
    }
}