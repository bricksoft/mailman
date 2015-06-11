<?php
	

	//Including autoloader
	require dirname(__DIR__).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload_custom.php';
	
	$app = new \App\app();
	/* Require and initialize Slim and Twig */
	$slim = \App\handlers\slim::get_instance();
	
	$app->addInterface("database",1);
	$foo= $app->user->create_from_array($app->database->select("users",array("name","Foo Bar"))[0],"password");
	
	/* Application routes */
	\App\handlers\slim::apply_routes($foo->get_array());
	
	/* Run the application */
	$slim->run();
	
	// -----------------------------
	# debug - area
	#var_dump($user);
	#var_dump($app);
	// -----------------------------
?>


