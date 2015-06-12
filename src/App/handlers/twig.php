<?php
	//twig class (easier implementation of twig)
	namespace App\handlers;
	class twig extends configurator {
		public $config;
		function init($config){
			$this->config = $config;
			$this->config->loader_params = (array) $this->config->loader_params;
		}
		function __construct(){
			global $app;
			$app->debugbar["messages"]->addMessage(__CLASS__.' initialized');
			parent::__construct();
		}
	}
?>