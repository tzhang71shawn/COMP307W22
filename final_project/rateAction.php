<?php
//**********************************************************************************************
//***This php is called during rating a TA, performing inserting new rating into the rating table
//*********************************************************************************************
include_once "connectDB.php";
//retreive data
$term = $_POST['term'];
$thecourse_id=$_POST['course_id'];
$TAName=$_POST['TAName'];
$score=$_POST['score'];
$comm=$_POST['comm'];

echo $term;
echo $thecourse_id;
echo $TAName;

if(empty($term) or empty($thecourse_id) or empty($TAName) or empty($score)){
      echo ("<script>
            window.alert('Fail to rate,please fill the blanks!');
           history.go(-1);
            </script>");
}
//store result
$results = $db->query('SELECT MAX(rID) as max FROM rating');
$row = $results->fetchArray(); 
$MAXRID= $row["max"];
 //get a max rid and +1 to get new rid         
$newRID= $MAXRID+1;
//echo $newRID;
$value = "('" . $newRID . "', '" . $term . "', '" . $thecourse_id . "', " . $score . ", '" . $TAName . "', '" . $comm . "' );";
$insertQuery = "INSERT into rating(rID ,term ,course ,score,TAName,comm) VALUES ".$value."";
//echo $insertQuery;
$db->query($insertQuery) or die("<br>unable to insert rating: " .$db->lastErrorMsg());
echo "<script language='javascript'>";
echo "alert('Thanks for rating, continue if you have more rating');window.history.go(-1);";
echo "</script>";
?>

