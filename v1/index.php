<?php
/**
* Main Route file, includes all classes and routes for the api.
* @version 1.0
* @author Ole Martin Skaug
*/

# Require in the autoload
require '../vendor/autoload.php';
# Require the databse obj.
require 'database/dbHandler.php';

# Initialize Slim
$app = new \Slim\Slim();

# Main API route for, only for checking if api is working
$app->get( '/', function() { echo 'Welcome to PHP-auth API. It is working correctly'; } );

# Require in all your routes here.



# End Require routes

# Run app
$app->run();
