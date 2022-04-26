<?php

//Отображение админпанели и разделов

class Controller_Admin extends Controller
{
    function __construct()
	{
		$this->view = new View();
        
        $this->model = new Model_Admin();		
	}
    
    function action_index()
    {
        $data['header'] = 'Admin panel';
        
        $this->view->generate('admin_view.php', 'template_view.php', $data); 
    }
    
    // Отображение разделов
    // В переменную $type передается имя раздела - Категории, Товары, Заказы
    function action_view($type = null)
    {
        if($type)
        {
            $data['type'] = $type;
        
            $data['header'] = $type;
            
            // Получаем данные для раздела
            $data['data'] = $this->model->get_view($type);
            
            $this->view->generate('admin_view.php', 'template_view.php', $data);
        }
        else
        {
            header('Location: '.BASE_URL.'admin');
        }
    }
}