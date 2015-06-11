<?php 
	namespace App\Interfaces\Syncronisation;
	class relay extends \App\handlers\configurator {
		private $config;
		function init($config){$this->config = $config;}
		
		function __construct(){
			parent::__construct();
		}
	}
?>