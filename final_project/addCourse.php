<?php
//*******************************************************************************************
//This php is called by sysop when a course is added.
//******************************************************************************************* 
//connect to DB
include_once "connectDB.php";

    $term = $_POST['term'];
    $cID = $_POST['cID'];
    //$cType = null;
    $cName = $_POST['cName'];
    // $iName = $_POST['iName'];
    // $enrolNum =  null;
    // $TAQuata = null;
    //concact data
    //$value = "('" . $term . "', '" . $cID . "', '" . $cType . "', '" . $cName . "', '" . $iName . "','" . $enrolNum . "', '" . $TAQuata . "');";
    $value = "('" . $term . "', '" . $cID . "', '" . $cName . "');";
    //$query = $db->exec("INSERT INTO courseQuota(term,cID,cType,cName,iName,enrolNum,TAQuata) VALUES $value");
    $query = $db->exec("INSERT INTO courses(term,cID,cName) VALUES $value");
    if(!$query) {
        echo $db->lastErrorMsg();
    } else {
        echo ("<script>
            window.alert('Succesfully Added!');
           history.go(-1);
            </script>");
    }
?>