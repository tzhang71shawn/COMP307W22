<?php
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=');
session_cache_limiter('private_no_expire'); // works
session_start();
include_once "connectDB.php";
$term = $_COOKIE['term'];
$cID = $_COOKIE['cID'];
$oHour = $_POST['ohDate'] . ' ' . $_POST['ohTime']; 
$ohLocation = $_POST['ohLocation'];
$ohDuty = $_POST['ohDuty'];
$sid = $_COOKIE['sID'];
$TAName = $_COOKIE['fn'] . ' ' . $_COOKIE['ln'];


$value = "('" . $oHour . "', '" . $ohLocation . "', '" . $ohDuty . "', '" . $sid . "', '" . $cID . "', '" . $term . "', '" . $TAName . "' );";
$insertQuery = "INSERT into oh(oHour ,oLocation ,oDuty ,sID,CID,term,TAName) VALUES ".$value."";
$db->query($insertQuery) or die("<br>unable to insert office hour: " .$db->lastErrorMsg());
echo "<script language='javascript'>";
echo "alert('Thanks for define your office hour.');history.go(-2);";

echo "</script>";
?>