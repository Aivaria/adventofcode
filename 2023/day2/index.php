<?php
include "./gamecalc.php";
$gamecalc = new gamecalc();
?>

<html>
<head></head>
<body>
<h1>Advent of Code, Day 1, Elfen Calories</h1>
<br/>
Numbers Added: <?= $gamecalc->getNumbers(); ?><br/>
Numbers and String added: <?= $gamecalc->getNumbersWithString(); ?> <br/>
<br/>
<a href="/">Zurück</a>
</body>
</html>
