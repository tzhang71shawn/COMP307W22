<?php
//*******************************************************************************************
//This php is called by sysop when a user is deleted.
//******************************************************************************************* 
//connect to DB
include_once "connectDB.php";

    $sID = $_POST['sID'];

    $query = $db->exec("delete from user_log where sID = '$sID'");
    if(!$query) {
        echo $db->lastErrorMsg();
    } else {
	     $changes= $db->changes();
//check if there is row modified
  if($changes>=1){ 
   echo ("<script>
            window.alert('Succesfully Deleted!');
           history.go(-1);
	    </script>");}
  else{
	  echo ("<script>
            window.alert('Invalid ID!');
           history.go(-1);
            </script>");}
    }


?>
