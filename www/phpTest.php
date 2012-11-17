<?php
session_start();
?>
<html>
<head>
</head>
<body>
<a href="./phpTest.php?p=teste1">Coisa</a>
<a href="./phpTest.php?p=teste2">Coisa2</a>
<div>
<?php

include('pages/'.$_GET['p'].'.php');

?>
</div>
</body>
</html>

