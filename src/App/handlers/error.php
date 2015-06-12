<?php
	namespace App\handlers;
	class error extends configurator{
		private $config;
		function init($config){$this->config = $config;}
		
		function __construct($type,$header,$message){
			global $app;	
			isset($app)?$app->debugbar["messages"]->addMessage(__CLASS__.' created'):null; 
			$type = strtolower($type);
			parent::__construct();
			if (($type!=="notice")||($type==="notice"&&$this->config->save_notice)){
				file_put_contents(
					$this->config->logfile,
					"\"$header\" - \"$message\"".PHP_EOL,
					FILE_APPEND)
					? ($type == "notice" && $this->config->show_notice)||$this->config->show_error
						? $app->debugbar["messages"]->addMessage("There was an error.
							It was printed to the error-Log.")
						: null
					: $app->debugbar["messages"]->addMessage("There was a serious error,which was caused by getting an include-error by then getting a log-error![HES DEAD!]");
					#: die("There was a serious error,which was caused by getting an include-error by then getting a log-error![HES DEAD!]");
			}
			switch ($type){
				case "FATAL":
					$app->debugbar["messages"]->addMessage("The error was a FATAL Error, aborting.");break;
	
				case "notice":
					$this->config->show_notice?$app->debugbar["messages"]->addMessage("The error was a(n) $type."):null;break;
				
				default:
					$this->config->show_error
						?$app->debugbar["messages"]->addMessage("There was a(n) $type Error.")
						:null;
			}
		}
		public static function register(){
			global $app;
			register_shutdown_function(function (){
  				$error = error_get_last();
  				if	( $error !== NULL) {
      				$errfile = $error["file"];
					new error("FATAL","Exception ".E_CORE_ERROR,$error["message"]	. " in " . $error["file"] . " on Line " . $error['line']);
  				}
			});
		}
	}
?>