<?php

// Действие с товарами - добавление, удаление, редактирование

class Controller_Adminproduct extends Controller
{
    function __construct()
	{
		$this->view = new View();
        
        $this->model = new Model_Adminproduct();		
	}
    
    function action_index()
    {
        header('Location: '.BASE_URL.'admin/view/product');
    }
    
    // Действие с товаром
    // В параметр $action передается действие - 'add', 'del' или 'edit'
    function action_action($action)
    {
        $data['action'] = $action;
        
        switch($action)
        {
            case 'add':
            {
                 $data['cat_list'] = $this->model->get_cat_list();
                 
                 $this->view->generate('adminproduct_view.php', 'template_view.php', $data); 
                 
                 // Сохранение нового товара
                 if($_SERVER['REQUEST_METHOD'] == 'POST')
                 {                  
                    // Получаем путь к изображению товара
                    $product_image = $this->download_image();
                    
                    $this->model->add_product($_POST['name'], $_POST['category'], $_POST['price'], $product_image);
                    
                    header('Location: '.BASE_URL.'admin/view/product');
                 }
                 
                 break;
            }
            
            case 'del':
            {
                 $this->model->del_product($_GET['id']);
                 
                 header('Location: '.BASE_URL.'admin/view/product');
                 
                 break;
            }
            
            case 'edit':
            {
                 $data['product'] = $this->model->get_product($_GET['id']);
                 
                 $data['cat_list'] = $this->model->get_cat_list();
                 
                 $data['action'] = 'edit';
                 
                 $this->view->generate('adminproduct_view.php', 'template_view.php', $data);
                 
                 // Сохранение измененнного товара
                 if($_SERVER['REQUEST_METHOD'] == 'POST')
                 {
                    // Проверяем, было ли загружено новое изображение для товара
                    if($_FILES['prod_img'])
                    {
                        $prod['image'] = $this->download_image();
                    }
                    else
                    {
                        $prod['image'] = '';
                    }
                    
                    $prod['name'] = $_POST['name'];
                    
                    $prod['price'] = $_POST['price'];
                    
                    $prod['cat'] = $_POST['category'];
                    
                    $prod['id'] = $_POST['id'];
                    
                    $this->model->update_product($prod);
                    
                    header('Location: '.BASE_URL.'admin/view/product');
                 }
                 
                 break;
            }
        }      
    }
    
    // Метод для сохранения загруженного изображения товара
    // Возваращает путь к изображению товара
    function download_image()
    {
        $uploaddir = 'images/product/';
           
        $uploadfile = $uploaddir . basename($_FILES['prod_img']['name']);
        
        if (move_uploaded_file($_FILES['prod_img']['tmp_name'], $uploadfile))
        {
            return $uploadfile;
        }
        else
        {
            return false;
        }
    }
}