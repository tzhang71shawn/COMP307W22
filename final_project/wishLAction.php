<?php
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=');
session_cache_limiter('private_no_expire'); // works
session_start();
include_once "connectDB.php";
$term = $_COOKIE['term'];
$cID = $_COOKIE['cID'];
$pName = $_POST['profName'];
$TAName = $_POST['TAName'];
$sID = $_COOKIE['sID'];


$value = "('" . $term . "', '" . $cID . "', '" . $pName . "', '" . $TAName . "', '" . $sID . "');";
$insertQuery = "INSERT into wishlist(term,cID,pName,TAName,sID) VALUES ".$value."";
$db->query($insertQuery) or die("<br>unable to insert into wish list!: " .$db->lastErrorMsg());
echo "<script language='javascript'>";
// TODO : history go back 
echo "alert('Thanks for selecting the TA you wish to have!.');history.go(-2);";

echo "</script>";
?>