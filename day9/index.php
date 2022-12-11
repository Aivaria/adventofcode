<?php
include "rope.php";
$rope = new rope();
?>

<html>
<head></head>
<body>
<h1>Advent of Code, Day 9, Rope</h1>
<br />
Rope Positions: <?=$rope->calcSteps();?><br />
Rope Positions2: <?=$rope->calcSteps(10);?><br />
<!--get Scenic Score: --><?//=$treehouse->getScenicScore();?><!--<br />-->
<br />
<a href="/">Zurück</a>
</body>
</html>
