<?php
$myFile = "/var/www/testFile.txt";
$fh = fopen($myFile, 'w');
$stringData = "Tracy Tanner\n";
fwrite($fh, $stringData);
fclose($fh);

$fh = fopen($myFile, 'r');
$value = fgets($fh);
echo $value;
fclose($fh);
?>
