<HTML>
<HEAD>
<TITLE> Example 5 </TITLE>
</HEAD>
<BODY>

<?  

// The next line opens a file handle to a file called output.txt
// the file handle is like an alias to the file
// the a in the fopen function means append so entries
// will be appended to the output.txt file

$out = fopen("output.txt", "a");
 
// if the file could not be opened for whatever reason, print 
// an error message and exit the program

if (!$out) {
    print("Could not append to file");
    exit;
}

// fputs writes output to a file.  the syntax is where to write
// followed by what to write

// $name is the contents of the name field in the sample form
// \t represents a tab character and \n represents a new line

/*<form action="input.php" method="post">
  <p>Your name: <input type="test" name="name" /></p>
  <p>Your age: <input type="test" name="age" /></p>
  <p><input type="submit" /></p>
</form>*/

fputs($out,"$_POST[name]\t");
fputs($out,"$_POST[age]\n");
print("done\n");

fclose($out);

?>


</BODY>
</HTML>
