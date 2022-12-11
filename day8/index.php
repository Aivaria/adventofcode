<?php
include "treehouse.php";
$treehouse = new treehouse();
?>

<html>
<head></head>
<body>
<h1>Advent of Code, Day 8, Treehouse</h1>
<br />
Visible Trees from Outside Forest <?=$treehouse->countTrees();?><br />
<!--Size of dir to Delete: --><?//=tr->freeDiskSpace();?><!--<br />-->
<br />
<a href="/">Zurück</a>
</body>
</html>
