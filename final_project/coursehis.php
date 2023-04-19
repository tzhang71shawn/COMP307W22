<?php
    include_once "connectDB.php";

    $cID = $_POST['cID'];

    $results = $db->query('SELECT * FROM TAhist');

    echo "<table border=1 cellspacing=0 cellpading=0>";
    echo "<tr><td>Term</td><td>TAName</td><td>Assigned Hour</td></tr>";
    while($row = $results->fetchArray()){
        $tmp = $row['cID'];
        if($tmp == $cID){
            echo "<tr><td>".$row['term']."</td><td>".$row['TAName']."</td><td>".$row['assignedHour']."</td></tr>";
        }
    }
    echo "</table>";

    echo "<br><br>";

    echo '<button onclick="history.go(-1);"> Return to Dashboard </button> ';
?>