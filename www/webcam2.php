<?php
/* Usage: <img src="thisfile.php"> */

$server = "143.107.235.48"; // camera server
$port = 8082; // camera server port
$url = "/?action=stream"; // url on camera server
$fp = fsockopen($server, $port, $errno, $errstr, 30);
if( !$fp ){
    echo "$errstr ($errno)<br />\n";
}
	else
	    $urlstring = "GET ".$url." HTTP/1.0\r\n\r\n";
	    fwrite( $fp, $urlstring );
	    
	    while( $str = trim( fgets( $fp, 4096 ) ) )header( $str );
	    fpassthru( $fp );
	    fclose( $fp );

?>
