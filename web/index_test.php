<?php

/* Require and initialize Autoloader */
require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'autoload_custom.php';

/* Require and initialize Core App */
$app = new \App\app();

/* Require and initialize Slim and Twig */
$slim = \App\handlers\slim::get_instance();

/* Require and initialize database Interface to the app core */
$app->addInterface("database", 1);


// -----------------------------
# examples of $app and $user usage

/* creating a new user */
// creating salt / challenge
$challenge = sha1("challenge");
// creating user with password and salt
$foo       = $app->user->create("user1", "valid", 0, "password", $challenge);
// checking password 
$foo->check_password("password") ? printf("correct password") : printf("wrong password");
echo "<br>";



# adding a Database-Interface to the app
$app->addInterface("database", 1);

# performing an insert
var_dump($app->database->insert("user", array(
    "id" => $foo->get_user_id(),
    "name" => $foo->get_user_name(),
    "status" => $foo->get_user_status(),
    "challenge" => $foo->get_user_challenge()
)));

# performing an update
$app->database->update("user", "12", array(
    "id" => "12",
    "name" => "Foo Bar",
    "status" => "111", // changed
    "challenge" => "123"
));

# performing a select
var_dump($app->database->select("user"));



# examples of running twig
// creating twig placeholders
$twig_placeholder_vars = array(
    "user" => $foo->get_user_name(),
    "user_status" => $foo->get_user_status(),
    "user_id" => $foo->get_user_id(),
    "user_challenge" => $foo->get_user_challenge()
);
/* Application routes */
\App\handlers\slim::apply_routes($twig_placeholder_vars);

/* Run the application */
$slim->run();


// -----------------------------
# debug - area
#var_dump($user);
#var_dump($app);
// -----------------------------
?>