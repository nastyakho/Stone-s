<?php

// Класс Route подключает запрашиваемый контоллер, модель, вызывает метод и передает параметры в метод

class Route
{
	static function start()
	{
		// По умолчанию подключается контроллер Main
        // По умолчанию вызывается метод index
		$controller_name = 'Main';
		$action_name = 'index';
		
		$routes = explode('/', $_SERVER['REQUEST_URI']);

		// получаем имя контроллера
		if ( !empty($routes[1]) )
		{	
			$controller_name = $routes[1];
		}
		
		// получаем имя экшена
		if ( !empty($routes[2]) )
		{
			$action_name = $routes[2];
		}
        
        // получаем значение для экшена
		if ( !empty($routes[3]) )
		{
			$data_name = $routes[3];
		}

		// добавляем префиксы
		$model_name = 'Model_'.$controller_name;
		$controller_name = 'Controller_'.$controller_name;
		$action_name = 'action_'.$action_name;

		// Подключаем файл с классом модели (файла модели может и не быть)

		$model_file = strtolower($model_name).'.php';
		$model_path = "application/models/".$model_file;
		if(file_exists($model_path))
		{
			include "application/models/".$model_file;
		}

		// Подключаем файл с классом контроллера
		$controller_file = strtolower($controller_name).'.php';
		$controller_path = "application/controllers/".$controller_file;
		if(file_exists($controller_path))
		{
			include "application/controllers/".$controller_file;
		}
		else
		{
			header('Location: '.BASE_URL);
		}
		
		// создаем контроллер
		$controller = new $controller_name;
		$action = $action_name;
		
		if(method_exists($controller, $action))
		{
			// вызываем действие контроллера
            // если есть параметр для метода, то передаем его
			
            if($data_name)
            {
                $controller->$action($data_name);
            }
            else
            {
                $controller->$action();
            }
		}
		else
		{
			header('Location: '.BASE_URL);
		}
	}
}