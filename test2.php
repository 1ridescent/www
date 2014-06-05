<HTML>
<HEAD>
<TITLE> Example 6 </TITLE>
</HEAD>
<BODY>

<?  

// the following statement opens the files called output.txt
// and reads each line of the file into an array called $readfile

// Each line will be accessed by it's position in the array
// $readfile[0] would be the first line because the array begins at 0
// rather than 1

$readfile = file("output.txt");

// Create a loop that will read all elements of the array and print out
// each field of the tab-delimited text file

for ($k=0; $k<=count($readfile)-1; $k++) {
    $fields = split("\t",$readfile[$k]);
    print("$fields[0] $fields[2]<br>");
}


?>


</BODY>
</HTML>
