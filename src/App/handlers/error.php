<?php
	namespace App\handlers;
	class error extends configurator{
		private $config;
		function init($config){$this->config = $config;}
		
		function __construct($type,$header,$message){
			$type = strtolower($type);
			parent::__construct();
			if (($type!=="notice")||($type==="notice"&&$this->config->save_notice)){
				file_put_contents(
					$this->config->logfile,
					"\"$header\" - \"$message\"".PHP_EOL,
					FILE_APPEND)
					? ($type == "notice" && $this->config->show_notice)||$this->config->show_error
						? printf("There was an error.
							It was printed to the error-Log.")
						: null
					: die("There was a serious error,which was caused by getting an include-error by then getting a log-error![HES DEAD!]");
			}
			switch ($type){
				case "FATAL":
					die("The error was FATAL, aborting.");break;
	
				case "notice":
					$this->config->show_notice?printf("The error was a $type."):null;break;
				
				default:
					$this->config->show_error
						?printf("The error was $type.")
						:null;
			}
		}
		public static function register(){
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