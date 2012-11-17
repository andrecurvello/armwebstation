<?php
$cmd = "pause";
$file = "/tmp/mplayer.cmd";
$fr = fopen($file,'r+');
fwrite($fr,$cmd);
fclose($fr);

?>
