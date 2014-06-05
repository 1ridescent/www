<h1>Vocab Stuff</h1>

<h2>

<?php

if($_POST["update"] == "Update")
{
	$entry = file_get_contents("webdict/entry.txt");
	file_put_contents("webdict/input.txt", $entry);
	shell_exec("cd webdict && ./dict update");
	printf("Updated %s<br>", $entry);
}

if(!$_POST["submit"] || $_POST["submit"] == "Lookup")
{
	$entry = shell_exec("cd webdict && ./dict lookup");
	printf("%s<br>", $entry);
	file_put_contents("webdict/entry.txt", $entry);
	?>
	<form action="todo-dict.php" method="post">
	<input type="submit" name="update" value="Update">
	</form>
	<?php
}

if($_POST["submit"] == "Insert")
{
	file_put_contents("webdict/input.txt", $_POST["input_word"] . " : " . $_POST["input_def"]);
	shell_exec("cd webdict && ./dict insert");
	printf("Added %s<br>", $_POST["input_word"]);
}

?>

<form action="todo-dict.php" method="post">
	<p>Lookup: <input type="submit" name="submit" value="Lookup"></p>
	<p>Insert: Word <input type="text" name="input_word">;
	Definition <input type="text" name="input_def">
	<input type="submit" name="submit" value="Insert">
</form>

<hr>

<h1>Cool/Important Stuff To Do</h1>

<h2>

<?php

if($_POST["submit"] == "Add")
{
  file_put_contents("todo.txt", $_POST["data"] . "\n", FILE_APPEND);
  printf("Added: %s<br><br>", $_POST["data"]);
}
if($_POST["submit"] == "Delete")
{
  file_put_contents("deleted.txt", $_POST["index"] . "\n", FILE_APPEND);
  printf("Deleted: %s<br><br>", $_POST["index"]);
}
if($_POST["submit"] == "Clear All")
{
  file_put_contents("todo.txt", "");
  file_put_contents("deleted.txt", "");
  printf("Cleared<br>");
}
$_POST["submit"] = "";

$list = array();
$listfile = fopen("todo.txt", "r");
while(($buffer = fgets($listfile)) != false)
{
  $list[] = $buffer;
}

$deleted = array();
$delfile = fopen("deleted.txt", "r");
while($index = fscanf($delfile, "%d"))
{
  //printf("unsetting %d<br>", $index[0]);
  unset($list[$index[0]]);
}

foreach($list as $key => $value)
{
  printf("%d: %s<br>", $key, $value);
}

?>
<br>
<form action="todo-dict.php" method="post">
  Add something: <input type="text" name="data">
  <input type="submit" name="submit" value="Add">
</form>

<form action="todo-dict.php" method="post">
  Delete index: <input type="text" name="index">
  <input type="submit" name="submit" value="Delete">
</form>

<form action="todo-dict.php" method="post" onsubmit="return confirm('Clear all?')">
  <input type="submit" name="submit" value="Clear All">
</form>

<br>
<br>

<?php
$cnt = file_get_contents("count.txt");
$cnt += 1;
file_put_contents("count.txt", $cnt);
printf("Visit count: %d\n", $cnt);
?>
