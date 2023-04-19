<?php
//*******************************************************************************************
//Delete a TA from a course
//******************************************************************************************* 

    //connect to DB
    include_once "connectDB.php";

    $TAName = $_POST['TA_name'];
    $cID = $_POST['course_id'];
    $term = $_POST['term'];

    $query = $db->exec("DELETE from TAhist where term = '$term' and TAName = '$TAName' and cID = '$cID'");

    if(!$query) {
        echo $db->lastErrorMsg();
    } else {
	     $changes= $db->changes();

        //check if there is row modified
        if($changes>=1){ 
            echo ("<script>
                    window.alert('Succesfully Deleted!');
                    history.go(-1);
                    </script>");
        } else {
            echo ("<script>
                    window.alert('No TA match!');
                    history.go(-1);
                    </script>");
        }
    }


?>