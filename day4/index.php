<?php
include "accessCalc.php";
$access = new accessCalc();
?>

<html>
<head></head>
<body>
<h1>Advent of Code, Day 3, Elfen Rucksacks</h1>
<br />
Compartment Score: <?=$access->getDoubleAccess();?><br />
Groups Score: <?=$access->getOverleapAccess();?><br />
<br />
<a href="/">Zurück</a>
</body>
</html>
