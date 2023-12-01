<?php
include "treehouse.php";
$treehouse = new treehouse();
?>

<html>
<head></head>
<body>
<h1>Advent of Code, Day 8, Treehouse</h1>
<br />
Visible Trees from Outside Forest <?=$treehouse->getVisibleTrees();?><br />
get Scenic Score: <?=$treehouse->getScenicScore();?><br />
<br />
<a href="/">Zurück</a>
</body>
</html>
