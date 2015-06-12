<?php 
	namespace App\Client;	
	class User {
		private $model;
		function __construct(){	
		}
		
		public function create($name="",$status="",$id=null,$pw_raw,$challenge=""){
			$pw_hash = crypt($pw_raw,$challenge);
			return new _user($this->init($this->_create(),$name,$status,$id,$pw_hash,$challenge));
		}
		public function create_from_array($user=array(),$pw_raw){
			$pw_hash = crypt($pw_raw,$user['challenge']);
			return new _user($this->init($this->_create(),$user['name'],$user['status'],$user['id'],$pw_hash,$user['challenge']));
		}
		
		private function _create(){
			return json_decode(file_get_contents(__DIR__.ds."user".ds."usermodel.json"));
		}
		private function init($user,$name,$status,$id,$pw_hash,$challenge){
			$user->name=$name;
			$user->status=$status;
			$user->id=$id;
			$user->challenge=$challenge;
			$user->pw_hash=$pw_hash;
			return $user;
		}
	}
	class _user{
		
		private $model;
		function __construct($model){
			global $app;	
			isset($app)?$app->debugbar["messages"]->addMessage(__CLASS__.' created'):null; 
			$this->model = $model;
		}
		public function get_user_name(){
			return $this->model->name;
		}
		public function get_user_status(){
			return $this->model->status;
		}
		public function get_user_id(){
			return $this->model->id;
		}
		public function get_user_challenge(){
			return $this->model->challenge;
		}
		public function check_password($pw_str){
			return (crypt($pw_str,$this->model->challenge)==$this->model->pw_hash);
		}
		public function get_array(){
			return array(
				"user"			=>	$this->get_user_name(),
				"user_status"	=>	$this->get_user_status(),
				"user_id"		=>	$this->get_user_id(),
				"user_challenge"=>	$this->get_user_challenge()
				);
		}
	}
?>