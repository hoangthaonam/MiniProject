<?php  
	class Controller {
		function models($models){
			require_once './mvc/models/'.$models.'.php';
			return new $models;
		}
		function views($layout,$data=''){
			require_once './mvc/views/'.$layout.'.php';
		}
	}
?>