<?php

class View
{
	/*
	$content_file - виды отображающие контент страниц;
	$template_file - шаблон страницы;
	$data - массив, содержащий элементы контента страницы
	*/
	function generate($content_view, $template_view, $data = null)
	{
		if(is_array($data)) {
			
			// преобразуем элементы массива в переменные
			extract($data);
		}
		
		include 'application/views/'.$template_view;
	}
}