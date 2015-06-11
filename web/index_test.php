<?php
		
	//Including autoloader
	require __DIR__.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoloader.php';
	
	// -----------------------------
	# examples of $app and $user usage
	
	# creating a new user
	// creating salt / challenge
	$challenge = sha1("challenge");
	// creating user with password and salt
	$foo = $user->create("user1","valid",0,"password",$challenge);
	// checking password 
	$foo->check_password("password")?printf("correct password"):printf("wrong password");
	echo "<br>";
	
	
	
	# adding a Database-Interface to the app
	$app->addInterface("database",1);
	
	# performing an insert
	var_dump($app->database->insert("user",array(
		"id"=>$foo->get_user_id(),
		"name"=>$foo->get_user_name(),
		"status"=>$foo->get_user_status(),
		"challenge"=>$foo->get_user_challenge()
	)));
	
	# performing an update
	$app->database->update("user","12",array(
		"id"=>"12",
		"name"=>"Foo Bar",
		"status"=>"111", // changed
		"challenge"=>"123"
	));
	
	# performing a select
	var_dump($app->database->select("user"));
	
	
	
	# examples of running twig
	// creating twig placeholders
	$twig_placeholder_vars = array(
		"user"			=>	$foo->get_user_name(),
		"user_status"	=>	$foo->get_user_status(),
		"user_id"		=>	$foo->get_user_id(),
		"user_challenge"=>	$foo->get_user_challenge()
	);
	// render page foo.twig with placeholder array
	$app->render('foo.twig',$twig_placeholder_vars);
	
	//OR
	$app->render('foo.twig',$foo->get_array());
	
	
	// -----------------------------
	# debug - area
	#var_dump($user);
	#var_dump($app);
	// -----------------------------
?>