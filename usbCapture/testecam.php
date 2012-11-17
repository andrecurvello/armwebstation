<?php
$cmd = "/usbCapture/cameraCapture.sh";
$name = "teste";

$shell_cmd = "$cmd $name";

//$cmd_f = escape_shell_cmd("$shell_cmd");

$test = system($shell_cmd);

echo $test;

?>
