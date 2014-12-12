<?php

// test the video streaming class

//setup error display
ini_set('display_errors', 'On');
error_reporting(E_ALL);

// call stream class object and create it
require_once('classes/class.videostream.php');

// how to store the working directory "from where" the script was called:
$cwd = preg_replace( '~(\w)$~' , '$1' . DIRECTORY_SEPARATOR , realpath( getcwd() ) );

// set movie filename
$file=$cwd.'movies/Captain America The Winter Soldier (2014)/Captain America The Winter Soldier.mp4';

// echo "File: [$file]<br/>";

// call videostream function/library
$stream = new VideoStream($file);
$stream->start();


?>
