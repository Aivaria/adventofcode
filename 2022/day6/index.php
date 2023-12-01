<?php
include "message.php";
$message = new message();
?>

<html>
<head></head>
<body>
<h1>Advent of Code, Day 6, Elfen Message</h1>
<br />
Message - Length 4: <?=$message->getMessageArea(4);?><br />
Message - Length 14: <?=$message->getMessageArea(14);?><br />
<br />
<a href="/">Zurück</a>
</body>
</html>
