<?php
include "elfenclass.php";
$elfen = new elfenrechner();
?>

<html>
<head></head>
<body>
<h1>Advent of Code, Day 1, Elfen Calories</h1>
<br/>
Top Calories: <?= $elfen->getTopCalorie(); ?><br/>
Top Tree Together: <?= $elfen->getTopTree(); ?> <br/>
<br/>
<a href="/">Zurück</a>
</body>
</html>
