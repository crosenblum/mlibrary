<?php

// this is the mlibrary web app - designed to surf local dlna servers
// and create a beautiful local entertainment library

//setup error display
ini_set('display_errors', 'On');
error_reporting(E_ALL);

// call stream class object and create it
require_once('classes/class.mlibrary.php');
require_once('classes/class.videostream.php');

// create object
$mlibrary = new mlibrary();

// set the default value of imdbid
$imdbid="";

// get url parameter
if (isset($_GET['id'])) {

	// should I filter this
    $imdbid=$_GET['id'];

}else{

    // Fallback behaviour goes here
    // maybe return to index page after displaying an error
    
}


// setup array for one movie grab
$movie=$mlibrary->find_movie($imdbid);

// how to store the working directory "from where" the script was called:
$cwd = preg_replace( '~(\w)$~' , '$1' . DIRECTORY_SEPARATOR , realpath( getcwd() ) );

// get the path
$folder = basename($movie['path']);

// set movie filename
$file=$cwd.'movies/'.$folder.'/'.$movie['filename'];

// call videostream function/library
// $stream = new VideoStream($file);
// $stream->start();

// exit;

// display the http title
echo '<title>mLibrary - '.$movie['title'].' ('.$movie['year'].')</title>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>mLibrary - Your local movies/tvshows/music library</title>
	<meta charset="utf-8">
	<meta name="author" content="Craig M. Rosenblum">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="icon"  type="image/ico"  href="favicon.ico"> 
	<script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</head>
<body>

	<header>
		<div class="logo">
			<a href="index.html"><img src="img/logo.png" title="Magnetic" alt="Magnetic"/></a>
		</div><!-- end logo -->

		<div id="menu_icon"></div>
		<?php echo $mlibrary->navigation(); ?>

		<div class="footer clearfix">
			<?php echo $mlibrary->footer(); ?>
		</div >
		<!-- end footer -->

	</header>
	<!-- end header -->

	<section class="main clearfix">
	
		<!--- display movie fanart here --->
		<?php 

			// how to store the working directory "from where" the script was called:
			$cwd = preg_replace( '~(\w)$~' , '$1' . DIRECTORY_SEPARATOR , realpath( getcwd() ) );

			// get the path
			$folder = basename($movie['path']);

			// set movie filename
			$file=$cwd.'movies/'.$folder.'/'.$movie['filename'];

			// call videostream function/library
			$stream = new VideoStream($file);
			$stream->start();
		
		 ?>
		
	</section><!-- end main -->
	
</body>
</html>		
