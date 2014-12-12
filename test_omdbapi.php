<?php

// test the omdbapi

//setup error display
ini_set('display_errors', 'On');
error_reporting(E_ALL);

// call stream class object and create it
require_once('classes/class.mlibrary.php');

// create object
$mlibrary = new mlibrary();

// get one random movie

// connect to database
$db = new PDO("mysql:dbname=mlibrary;host=localhost", "root", "4notrust" );

// get writers, actors, rating, votes
$sql="SELECT id, title, year, imdbid from movies order by rand() limit 1";

// prepare sql statement
$stmt = $db->exec($sql);
$row = $stmt->fetch();

print_r($row);

// loop thru results		
for($i=0 ; $i<1 ; $i++){
	
	// grab row
	$row = $stmt->fetch();
	
	// get id, title, year and imdbid
	$id = $row['id'];
	$title = $row['title'];
	$year = $row['year'];
	$imdbid = $row['imdbid'];
	
	// retrieve array
	$imdb = $mlibrary->get_imdb($title,$year);
	
}

// close connection
$db = NULL;

// print result
print_r($imdb);

?>
