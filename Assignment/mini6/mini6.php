<?php
//
// ----------------- MAIN PROGRAM --------------------------------
//
// --------- COMMON WEBPAGE TOP ---------
//

display("matter/mini6header.txt");
// --------- ROUTING WEBPAGE BODY -----------
if (sizeof($_GET)==0 || $_GET["Page"]=="Home") {
// HOME PAGE
display("matter/mini6home.txt");
} else if ($_GET["Page"]=="Hobbies") {
// INFO PAGE
display("matter/mini6hobbies.txt");
}else {
// ERROR PAGE
echo "404: Invalid Page!";
}
// --------- COMMON WEBPAGE BOTTOM ----------
display("matter/mini6footer.txt");
// END MAIN

// Prints a file into the packet positionally dependent
function display($path) {
$file = fopen($path,"r");
while(!feof($file)) {
$line = fgets($file);
echo $line;
}
fclose($file);
}

// Prints a file to the packet, but switches class="Active" by target
function displayActive($path,$target) {
$file = fopen($path,"r");
if (sizeof($target)==0) $target="Page=Home";
else $target="Page=".$target;
while(!feof($file)) {
$line = fgets($file);
if (strstr($line,$target)) 
$line=str_replace("class=\"empty\"","class=\"active\"",$line);
else 
$line=str_replace("class=\"active\"","class=\"empty\"",$line);
echo $line;
}
fclose($file);
}
?>
