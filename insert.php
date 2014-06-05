<!-- <form action="insert.php" method="post">
  <p>Your name: <input type="test" name="name" /></p>
  <p>Your age: <input type="test" name="age" /></p>
  <p><input type="submit" /></p>
</form> -->

<?php
$filename = "data.txt";
$data = "hi"
file_put_contents($filename, $data);
//$file = fopen($myFile, 'w');
//fwrite($file, "hello world");
//fclose($file);
?>
