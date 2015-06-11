<?php 
	namespace App\Interfaces\Mail;	
	class smtp extends \App\handlers\configurator{
		private $config;
		function init($config){$this->config = $config;}
		
		function __construct(){
			parent::__construct("mail");
		}
	}
?>