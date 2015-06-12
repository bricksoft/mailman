<?php
	namespace App\testing;
	class useraction{
		public $foo;
		function __construct(){
			global $app;
			/* Require and initialize database Interface */
			$app->addInterface("database", 1);

			/* Fetch SQL Userdata from Database */
			// sql statement: "SELECT * FROM users WHERE name = Foo Bar"
			$sqlFetch = $app->database->select("users", array(
    			"name",
    			"Foo Bar"
			));

			/* Create a User from sql array  */
			$this->foo = $app->user->create_from_array($sqlFetch[0], "password");
		}
		
	}
?>