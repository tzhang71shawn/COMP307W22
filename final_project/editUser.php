<?php
//*******************************************************************************************
//This php is called by sysop when to update info
//******************************************************************************************* 
//connect to DB
include_once "connectDB.php";

    //receive data
$fname = $_POST['first_name'];
$lname = $_POST['last_name'];
$email = $_POST['email'];
$sID = $_POST['sID'];
$username = $_POST['username'];
$pwd = $_POST['password'];
$course = $_POST['courses'];
$isStudent = $_POST['isStudent'];  
$isTA = $_POST['isTA']; 
$isProf = $_POST['isProf']; 
$isAdmin = $_POST['isAdmin']; 
$isSysOp = $_POST['isSysOp']; 
    //if didnt pass ID
if ($sID==""){
    echo "<script language='javascript'>";
    echo "alert('Please put into ID');history.go(-1);";
    echo "</script>";
}
    //if id doesnt exist
$result= $db->query("SELECT COUNT(sID) as num_rows FROM user_log where sID = $sID") or  die("<br>unable to update the user information: " .$db->lastErrorMsg());
$row = $result->fetchArray();  
if($row["num_rows"] < 1){
    echo( "<script language='javascript'>
        alert('ID is invalid please send valid ID');history.go(-1);
        </script>");
}
    //if id exit, check each field and do modification 
if ($fname!=""){
    $query = $db->exec("UPDATE user_log SET first_name='{$fname}' where sID ='{$sID}'");
    if(!$query) {
        echo $db->lastErrorMsg();
    }
}
if ($lname!=""){
    $query = $db->exec("UPDATE user_log SET last_name='{$lname}' where sID ='{$sID}'");
    if(!$query) {
        echo $db->lastErrorMsg();
    }
}
if ($email!=""){
    $query = $db->exec("UPDATE user_log SET email='{$email}' where sID ='{$sID}'");
    if(!$query) {
        echo $db->lastErrorMsg();
    }
}
if ($username!=""){
    $query = $db->exec("UPDATE user_log SET username='{$username}' where sID ='{$sID}'");
    if(!$query) {
        echo $db->lastErrorMsg();
    }
}
if ($pwd!=""){
    $query = $db->exec("UPDATE user_log SET pwd='{$pwd}' where sID ='{$sID}'");
    if(!$query) {
        echo $db->lastErrorMsg();
    }
}
if ($course!=""){
    $query = $db->exec("UPDATE user_log SET course='{$course}' where sID ='{$sID}'");
    if(!$query) {
        echo $db->lastErrorMsg();
    }
}
if ($isStudent!=""){
    $query = $db->exec("UPDATE user_log SET isStudent='{$isStudent}' where sID ='{$sID}'");
    if(!$query) {
        echo $db->lastErrorMsg();
    }
}
if ($isTA!=""){
    $query = $db->exec("UPDATE user_log SET isTA='{$isTA}' where sID ='{$sID}'");
    if(!$query) {
        echo $db->lastErrorMsg();
    }
}if ($isProf!=""){
    $query = $db->exec("UPDATE user_log SET isProf='{$isProf}' where sID ='{$sID}'");
    if(!$query) {
        echo $db->lastErrorMsg();
    }
}if ($isAdmin!=""){
    $query = $db->exec("UPDATE user_log SET isAdmin='{$isAdmin}' where sID ='{$sID}'");
    if(!$query) {
        echo $db->lastErrorMsg();
    }
}if ($isSysOp!=""){
    $query = $db->exec("UPDATE user_log SET isSysOp='{$isSysOp}' where sID ='{$sID}'");
    if(!$query) {
        echo $db->lastErrorMsg();
    }
}

echo ("<script>
    window.alert('Succesfully Updated!');
    history.go(-1);
    </script>");



    ?>
