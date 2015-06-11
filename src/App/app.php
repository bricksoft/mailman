<?php
// TODO move and configure class

	namespace App;
	class app extends handlers\configurator {
		private $config;
		public $user;
		
		function init($config){$this->config = $config;}
		
		function __construct(){
			parent::__construct();
			$this->user = new \App\Client\User();
		}
		
		public function addInterface($interface="",$type=0){
			foreach ($this->config->interfaces as $interface_name => $interface_ref){
				if ($interface_name === $interface){
					$this->$interface = new $interface_ref[$type];	
					return;
				}
			}
			new hadlers\error("Critical","Interface not found","The Interface \"".$interface."\"($type) was not found!");
		}
	}
?>