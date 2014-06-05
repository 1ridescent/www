<h1>Cool Stuff To Do</h1>

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
<form action="form5.php" method="post">
  Add something: <input type="text" name="data">
  <input type="submit" name="submit" value="Add">
</form>

<form action="form5.php" method="post">
  Delete index: <input type="text" name="index">
  <input type="submit" name="submit" value="Delete">
</form>

<form action="form5.php" method="post" onsubmit="return confirm('Clear all?')">
  <input type="submit" name="submit" value="Clear All">
</form>


