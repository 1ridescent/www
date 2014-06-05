<?php

if($_POST["word"] != "")
{
	printf("%s\n", shell_exec("dict/dict " . $_POST["word"]));
}

?>

<form action="dict.php" method="post">
	<p>Enter a word: <input type="text" name="word" /></p>
	<p><input type="submit" /></p>
</form>
