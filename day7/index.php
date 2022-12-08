<?php
include "filehandling.php";
$handler = new filehandling();
?>

<html>
<head></head>
<body>
<h1>Advent of Code, Day 7, FileHandler</h1>
<br />
getSum (limit 100000): <?=$handler->getDirSizeSumByMaxSize(100000);?><br />
Size of dir to Delete: <?=$handler->freeDiskSpace();?><br />
<br />
<a href="/">Zurück</a>
</body>
</html>
