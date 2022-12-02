<?php
include "rockpaper.php";
$rockpaper = new rockpaper();
?>

<html>
<head></head>
<body>
<h1>Advent of Code, Day 2, Elfen Rock Paper Scissor</h1>
<br />
<?= $rockpaper->getScoreP1();?><br />
<?= $rockpaper->getScoreP2(); ?>
<br />
<a href="/">Zurück</a>
</body>
</html>
