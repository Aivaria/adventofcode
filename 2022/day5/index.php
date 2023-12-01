<?php
include "Cargo.php";
$cargo = new Cargo();
?>

<html>
<head></head>
<body>
<h1>Advent of Code, Day 5, Elfen Cargo</h1>
<br/>
LetterStorage: <?= $cargo->getCargoLetter(1) ?><br/>
<? $cargo = new Cargo(); ?>
LetterStorage2: <?= $cargo->getCargoLetter(2) ?><br/>
<br/>
<a href="/">Zurück</a>
</body>
</html>
