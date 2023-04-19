<?php
    include_once "connectDB.php";

    $TAName = $_POST['TAName'];

    $results = $db->query('SELECT * FROM TAhist');

    echo "<table border=1 cellspacing=0 cellpading=0>";
    echo "<tr><td>Term</td><td>Course Id</td><td>Assigned Hour</td></tr>";
    while($row = $results->fetchArray()){
        $tmp = $row['TAName'];
        if($tmp == $TAName){
            echo "<tr><td>".$row['term']."</td><td>".$row['cID']."</td><td>".$row['assignedHour']."</td></tr>";
        }
    }
    echo "</table>";

    echo "<br><br>";

    echo '<button onclick="history.go(-1);"> Return to Dashboard </button> ';
?>