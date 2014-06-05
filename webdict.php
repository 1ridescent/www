<?php

if($_POST["update"] == "Update")
{
	$entry = file_get_contents("webdict/entry.txt");
	shell_exec("cd webdict && ./dict update " . $entry);
	printf("Updated %s<br>", $entry);
	$_POST["update"] = "";
}

if($_POST["submit"] == "Lookup")
{
	$entry = shell_exec("cd webdict && ./dict lookup");
	printf("%s<br>", $entry);
	file_put_contents("webdict/entry.txt", $entry);
	?>
	<form action="webdict.php" method="post">
	<input type="submit" name="update" value="Update">
	</form>
	<?php
}

if($_POST["submit"] == "Insert")
{
	shell_exec("cd webdict && ./dict insert " . $_POST["input_word"] . " : " . $_POST["input_def"]);
}

?>

<form action="webdict.php" method="post">
	<p>Lookup: <input type="submit" name="submit" value="Lookup"></p>
	<p>Insert: Word <input type="text" name="input_word">;
	Definition <input type="text" name="input_def">
	<input type="submit" name="submit" value="Insert">
</form>
