<?php

// Работа с карзиной и заказом
// action_add - Добавляет товар в карзину
// action_buy - Сохраняет заказ
// action_clear - Удаляет товары из корзины
// total_price - Суммирует цену всех товаров в корзине

session_start();

class Controller_Cart extends Controller
{
    function __construct()
	{
		$this->view = new View();
        
        $this->model = new Model_Cart();		
	}
    
    function action_index()
    {
        $data['category'] = $this->model->get_category();
            
        $this->view->generate('cart_view.php', 'template_view.php', $data);
    }
    
    // Добавляем товар в карзину
    function action_add($product_id = null)
    {
        if($product_id)
        {   
            $product = $this->model->get_product($product_id);
                
            $product['count'] = 1;
            
            // Если в карзине уже есть такой товар, то метод увеличивает количество этого товара на 1
            function product_count($product_id)
            {
               foreach($_SESSION['products'] as $k => $sess_prod)
               {
                    if($sess_prod['id'] == $product_id)
                    {
                        $_SESSION['products'][$k]['count'] += 1;
                       
                        return 0;
                    }
                }
                
                return 1; 
            }
            
            // Если в карзине уже есть товары, то добавляем новый товар или увеличиваем на 1 количетво этого товара
            if($_SESSION['products'])
            {
                if(product_count($product_id))
                {
                    $_SESSION['products'][] = $product;
                }        
            }
            // Здесь создается массив с товарами '$_SESSION['products']' если ранее его не было и добавляется товар в карзину
            else
            {   
                $_SESSION['products'][] = $product;
            }
            
            // Добавляем итоговую цену за заказ
            $_SESSION['total_price'] = $this->total_price();
            
            header("Location: ".BASE_URL."cart"); 
            
        }
        else
        {
            header("Location: ".BASE_URL);
        }
    }
    
    // Сохранение заказа
    function action_buy()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $order['products'] = serialize($_SESSION['products']);
            
            $order['name'] = $_POST['name'];
            
            $order['phone'] = $_POST['phone'];
            
            $order['address'] = $_POST['address'];
            
            $order['total_price'] = $_SESSION['total_price'];
            
            $this->model->add_to_cart($order);
            
            // Очищаем карзину после сохранения заказа
            unset($_SESSION['products']);
            
            echo "
                <script>
                    alert('Order added!');
                    window.location.pathname = '';
                </script>
            ";
        }
        else
        {
            header("Location: ".BASE_URL);
        }
    }
    
    // Метод удаляет товары из карзины
    function action_clear()
    {
        unset($_SESSION['products']);
        
        header("Location: ".BASE_URL."cart");
    }
    
    // Подсчитываем итоговую стоимость заказа
    function total_price()
    {
        if($_SESSION['products'])
        {
            $price = 0;
            
            foreach($_SESSION['products'] as $product)
            {
                $price += $product['price']*$product['count'];
            }
            
            return $price;
        }
        else
        {
            return 0;
        }
    }
}