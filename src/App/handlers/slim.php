<?php
	//twig class (easier implementation of twig)
	namespace App\handlers;
	class slim {
		private static $instance;
		public static function get_instance(){
			$app = new \Slim\Slim(array(
    			'view' => new \Slim\Views\Twig()
			));
			$app->view->setTemplatesDirectory(
				(new \App\handlers\twig())->config->template_dir
			);
			self::$instance = $app;
			return $app;
		}
		public static function apply_routes($data){
			new \App\routes\main($data, self::$instance);
			new \App\routes\special($data, self::$instance);
		}
	}
?>