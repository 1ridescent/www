<?php

//printf("hi\n");
if($_POST[stuff] != "")
{
  file_put_contents('output.txt', $_POST[stuff] . "\n");
}
$_POST[stuff] = file_get_contents('output.txt');
printf("You entered: %s", $_POST[stuff]);

?>

<form action="form2.php" method="post">
  <p>Enter something: <input type="text" name="stuff" /></p>
  <p><input type="submit" /></p>
</form>
