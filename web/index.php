<?php

/* Require and initialize Autoloader */
require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'autoload_custom.php';

/* Require and initialize Core App */
global $app;
$app = new \App\app();

/* Require and initialize Debugbar Debugger */
new \App\handlers\debugbar();

/* Require and initialize Slim and Twig */
\App\handlers\slim::init();

$useract = new \App\testing\useraction();


/* Preparing twig data */
$data = $useract->foo->get_array();

/* Application routes */
#\App\handlers\slim::apply_routes($useract->foo->get_array());
\App\handlers\slim::apply_routes($data);

/* Run the application */
$slim->run();
// -----------------------------
# debug - area
#var_dump($user);
#var_dump($app);
// -----------------------------
?>