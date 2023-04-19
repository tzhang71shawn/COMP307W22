<?php
header('Cache-Control: no cache'); //no cache
session_cache_limiter('private_no_expire'); // works
session_start();
include_once "connectDB.php";
$term = $_COOKIE['term'];
$cID = $_COOKIE['cID'];
$TAName = $_POST['TAName'];
$comm = $_POST['note'];
$idNumber = $_COOKIE['sID'];
$results = $db->query('SELECT MAX(logID) as max FROM perfLog');
$MAXLOGID;
$row = $results->fetchArray(); 
//echo $row["max"];
$MAXLOGID= $row["max"];
 //get a max rid and +1 to get new rid         
$newLogID= $MAXLOGID+1;


$value = "('" . $newLogID . "', '" . $term . "', '" . $cID . "', '" . $TAName . "', '" . $comm . "', '" . $idNumber . "');";
$insertQuery = "INSERT into perfLog(logID ,term ,cID ,TAName,comm,sID) VALUES ".$value."";
$db->query($insertQuery) or die("<br>unable to insert into Performance Log: " .$db->lastErrorMsg());
echo "<script language='javascript'>";
// TODO: history go back 
echo "alert('Thanks for submitting your note for TA.');history.go(-2);";

echo "</script>";
?>