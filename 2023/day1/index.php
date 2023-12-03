<?php
include "./numbercalc.php";
$numbercalc = new numbercalc();
?>

<html>
<head></head>
<body>
<h1>Advent of Code, Day 1, Elfen Calories</h1>
<br/>
Numbers Added: <?= $numbercalc->getNumbers(); ?><br/>
Numbers and String added: <?= $numbercalc->getNumbersWithString(); ?> <br/>
<br/>
<a href="/">Zurück</a>
</body>
</html>
