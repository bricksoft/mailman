<?php
	namespace App\handlers;
	use DebugBar\StandardDebugBar;
	class debugbar extends configurator{
		private $config;
		function init($config){$this->config = $config;}
		
		function __construct(){
			global $app;
			parent::__construct();
			$app->debugbar = new StandardDebugBar();
			$app->debugbar->render = $app->debugbar->getJavascriptRenderer();
			$app->debugbar->render->setBaseUrl($this->config->assets_dir);
			$app->debugbar["messages"]->addMessage("Hello there! You are using Mailman with debugger!");
		}
	}
?>