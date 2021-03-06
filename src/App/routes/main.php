<?php
	namespace App\routes;
	class main extends \App\handlers\configurator {
		public $config;
		public function init($config){$this->config = $config;}
		
		public function __construct($data,$slim){
			parent::__construct("routes_main");
			foreach($this->config->routes as $config){
				$slim->get($config->route, function () use ($slim,$config,$data){
					$slim->render($config->template,$data);
				});
			}
		}
	}
?>