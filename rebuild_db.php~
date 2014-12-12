<?php

// build the sqlite database

//setup error display
ini_set('display_errors', 'On');
error_reporting(E_ALL);

// call stream class object and create it
require_once('classes/class.mlibrary.php');

// create object
$mlibrary = new mlibrary();

// now build array
$movie_path="/media/wdmybook/Movies";

// call movie array building function
global $movies;
$movies=array();

// get the array populated
$movies=$mlibrary->build_movies_array($movie_path);

// now save it to sqlite database
$mlibrary->build_movies_mysql($movie_path);


?>
