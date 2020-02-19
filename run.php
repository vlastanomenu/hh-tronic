<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL & ~E_WARNING);

include "IGrabber.php";
include "Grabber.php";

include "IOutput.php";
include "Output.php";

include "Dispatcher.php";

// code here
$dispatcher = new Dispatcher(new Grabber(), new Output());
echo $dispatcher->run();


?>