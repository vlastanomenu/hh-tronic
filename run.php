<?php

include "IGrabber.php";
include "Grabber.php";

include "IOutput.php";
include "Output.php";

include "Dispatcher.php";

// code here
$dispatcher = new Dispatcher(new Grabber(), new Output());
echo $dispatcher->run();


?>