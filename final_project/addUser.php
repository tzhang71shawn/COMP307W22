<?php
//*******************************************************************************************
//This php is called by sysop when a user is added.
//******************************************************************************************* 
//connect to DB
include_once "connectDB.php";

    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $email = $_POST['email'];
    $sID = $_POST['sID'];
    $username = $_POST['username'];
    $pwd = $_POST['password'];
    $course = $_POST['courses'];
    $isStudent = 1;  
    $isTA = 0;
    $isProf = 0;
    $isAdmin = 0; 
    $isSysOp = 0;

    //
    $value = "('" . $fname . "', '" . $lname . "', '" . $email . "', '" . $sID . "', '" . $username . "', '" . $pwd . "', '" . $course . "', '" . $isStudent . "', '" . $isTA . "', '" . $isProf . "', '" . $isAdmin . "', '" . $isSysOp . "' );";
    // echo $value . "<br>";

    $query = $db->exec("INSERT INTO user_log(first_name,last_name,email,sID,username,pwd,courses,isStudent,isTA,isProf,isAdmin,isSysOp) VALUES $value");
    if(!$query) {
        echo $db->lastErrorMsg();
    } else {
        echo ("<script>
            window.alert('Succesfully Added!');
           history.go(-1);
            </script>");
    }


?>