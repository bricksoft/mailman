<?php
	//twig class (easier implementation of twig)
	namespace App\handlers;
	class slim {
		public static function init(){
			global $slim;
			global $app;
			$app->debugbar["messages"]->addMessage(__CLASS__.' initialized');
			$slim = new \Slim\Slim(array(
    			'view' => new \Slim\Views\Twig()
			));
			$slim->view->setTemplatesDirectory(
				(new \App\handlers\twig())->config->template_dir
			);
		}
		public static function apply_routes($data){
			global $app, $slim;
			$data["debugHead"] = $app->debugbar->render->renderHead();
			$data["debugBody"] = $app->debugbar->render->render();
			new \App\routes\main($data, $slim);
			new \App\routes\special($data, $slim);
		}
	}
?>