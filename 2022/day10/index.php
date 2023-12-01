<?php
include "tube.php";
$tube = new tube();
?>

<html>
<head></head>
<body>
<h1>Advent of Code, Day 10, Tube</h1>
<br />
Tube Strength: <?=$tube->sumSignalStrength();?><br />
Letters:
<pre>
<?
foreach ($tube->drawLetter() as $row){
    echo str_replace('#','█',str_replace('.',' ',$row)).'<br />';
}?>
    </pre>
<br />
<a href="/">Zurück</a>
</body>
</html>
