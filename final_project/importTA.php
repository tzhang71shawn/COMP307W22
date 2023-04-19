<?php
    //*******************************************************************************************
    // Importing TA
    //******************************************************************************************* 
    //connect to DB

    //TODO: do we have to check from TA cohort if such TA exist?
    include_once "connectDB.php";

    $sID = $_POST['student_id'];
    $TAName = $_POST['TA_name'];
    $cID = $_POST['course_id'];
    $term = $_POST['term'];
    $hour = $_POST['hour'];

    $results = $db->query('SELECT MAX(TAID) as max FROM TAhist');
    $MAXTID;
    $row = $results->fetchArray(); 
    $MAXTID= $row["max"];
    $tID= $MAXTID+1;

    $value = "('".$tID."','".$sID."','".$term."','".$TAName."','".$cID."','".$hour."');";

    $query = $db->exec("INSERT INTO TAhist(TAID,sID,term,TAName,cID,assignedHour) VALUES $value");
    if(!$query) {
        echo $db->lastErrorMsg();
    } else {
        echo ("<script>
            window.alert('Succesfully Add TA!');
            history.go(-1);
           </script>");
    }
?>