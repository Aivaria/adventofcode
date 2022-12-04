<?php
include "accessCalc.php";
$access = new accessCalc();
?>

<html>
<head></head>
<body>
<h1>Advent of Code, Day 4, Elfen Access</h1>
<br />
Compartment Score: <?=$access->getDoubleAccess();?><br />
Groups Score: <?=$access->getOverleapAccess();?><br />
<br />
<a href="/">Zurück</a>
</body>
</html>
