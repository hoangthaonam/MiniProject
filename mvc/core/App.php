<?php  
	class App{
		protected $controller = "Home";
		protected $action = "load";
		protected $params = [];

		function __construct()
		{
			$arr = $this->processURL();
			if(isset($arr[0])){
				if(file_exists('./mvc/controllers/'.$arr[0].'.php')){
					$this->controller = $arr[0];
				}
			}
			unset($arr[0]);
			require_once './mvc/controllers/'.$this->controller.'.php';
			$this->controller = new $this->controller();
			if(isset($arr[1])){
				if(method_exists($this->controller,$arr[1])){
					$this->action = $arr[1];
				}
			}
			unset($arr[1]);
			if(isset($arr[2])){
				$this->params = array_values($arr);
			}
			call_user_func_array([$this->controller,$this->action],$this->params);
		}

		function processURL(){
			if(isset($_GET['url'])){
				return explode('/',$_GET['url']);
			}else{
				return [];
			}
		}
	}
?>