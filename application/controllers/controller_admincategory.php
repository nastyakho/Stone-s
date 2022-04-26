<?php

// Работа с категориями - добавление, удаление

class Controller_Admincategory extends Controller
{
    function __construct()
	{
        $this->model = new Model_Admincategory();		
	}
    
    function action_index()
    {
        header('Location: '.BASE_URL.'admin/view/category'); 
    }
    
    // Действие с категорией
    // В параметр $action передается действие 'add' или 'del'
    function action_action($action)
    {
        $data['action'] = $action;
        
        switch($action)
        {
            case 'add':
            {
                 if($_SERVER['REQUEST_METHOD'] == 'POST')
                 {                      
                    $this->model->add_cat($_POST['cat_name']);
                    
                    header('Location: '.BASE_URL.'admin/view/category');
                 }
                 
                 header('Location: '.BASE_URL.'admin/view/category');
                 
                 break;
            }
            
            case 'del':
            {
                 $this->model->del_cat($_GET['id']);
                 
                 header('Location: '.BASE_URL.'admin/view/category');
                 
                 break;
            }
            default:
            
                 header('Location: '.BASE_URL.'admin/view/category');
        }       
    }
}