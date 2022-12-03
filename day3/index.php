<?php
include "rucksack.php";
$rucksack = new rucksack();
?>

<html>
<head></head>
<body>
<h1>Advent of Code, Day 3, Elfen Rucksacks</h1>
<br />
Compartment Score: <?=$rucksack->getCompartmentsScore();?><br />
Groups Score: <?=$rucksack->getGroupScore();?><br />
<br />
<a href="/">Zurück</a>
</body>
</html>
