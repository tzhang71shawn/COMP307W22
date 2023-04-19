<?php
//*******************************************************************************************
//This php is called by sysop when a prof is added.
//A prof can only be added when there is already an account in user_log
//******************************************************************************************* 
//connect to DB
include_once "connectDB.php";

    $term = $_POST['term'];
    $cID = $_POST['cID'];
    $cName = $_POST['cName'];
    $pName = $_POST['pName'];
    $pID = $_POST['pID'];

        //if id doesnt exist
    $result= $db->query("SELECT COUNT(sID) as num_rows FROM user_log where sID = $pID") or  die("<br>unable to insert the professor: " .$db->lastErrorMsg());
    $row = $result->fetchArray();  
    if($row["num_rows"] < 1){
        echo( "<script language='javascript'>
            alert('Please add the professor the to user database first!');history.go(-1);
            </script>");
    }

    //if exist, continue to insert 
    $value = "('" . $term . "', '" . $cID . "', '" . $cName . "', '" . $pName . "', '" . $pID . "');";
    // echo $value . "<br>";

    $query = $db->exec("INSERT INTO prof(term,cID,cName,pName,pID) VALUES $value");
    $query2 = $db->exec("UPDATE user_log SET courses=$cName WHERE sID=$pID");
    $query3 = $db->exec("UPDATE user_log SET isProf=1 WHERE sID=$pID");
    $query4 = $db->exec("UPDATE user_log SET isStudent=0 WHERE sID=$pID");
    if(!$query) {
        $mess = $db->lastErrorMsg();
        echo ("<script> window.alert('$mess') </script>");
        echo "<script> history.go(-1) </script>";
    } else {
        echo ("<script>
            window.alert('Succesfully Added!');
           history.go(-1);
            </script>");
    }


?>