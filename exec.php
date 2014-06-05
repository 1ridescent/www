<?php

if($_POST["word"] != "")
{
	echo shell_exec("dict/a.out");
}

?>

<form action="exec.php" method="post">
	<p><Enter a word: <input type="text" name="word" /></p>
	<p><input type="submit" /></p>
