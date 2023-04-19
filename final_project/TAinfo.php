<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>TA Cohort</title>
</head>

<body>
    <h1>TA Cohort</h1>

    <?php
        include_once "connectDB.php";

        $TAName = $_POST['TAName'];

        $results1 = $db->query("SELECT * FROM TAcohort WHERE TAName = '$TAName' ");
        $results2 = $db->query("SELECT * FROM rating WHERE TAName = '$TAName'");
        $results3 = $db->query("SELECT * FROM perfLog WHERE TAName = '$TAName'");
        $results4 = $db->query("SELECT * FROM wishlist WHERE TAName = '$TAName'");
        
        // echo "<table border=1 cellspacing=0 cellpading=0>";
        // echo "<tr><td>Term</td><td>Student ID</td><td>Legal Name</td><td>Email</td><td>Undergrad or Grad</td><td>Supervisor</td>
        // <td>Priority</td><td>TA Hour</td><td>Date Applied</td><td>Location</td><td>Phone</td><td>Degree</td><td>Course Applied</td>
        // <td>Open To Other Courses</td><td>Note</td></tr>";

        while($row = $results1->fetchArray()){
            $tmp = $row['TAName'];
            if($tmp == $TAName){
            
            echo " Term: ".$row['term']." <br>";
            echo " Student ID: ".$row['sID']." <br>";
            echo " Legal Name: ".$row['legalName']." <br>";
            echo " Email: ".$row['email']." <br>";
            echo " Undergrad or Grad: ".$row['TAStatus']." <br>";
            echo " Supervisor: ".$row['superName']." <br>";
            echo " Priority: ".$row['prio']." <br>";
            echo " TA Hour: ".$row['TAHours']." <br>";
            echo " Date Applied: ".$row['dApply']." <br>";
            echo " Location: ".$row['loc']." <br>";
            echo " Phone: ".$row['phone']." <br>";
            echo " Degree: ".$row['degree']." <br>";
            echo " Course Applied: ".$row['cApplied']." <br>";
            echo " Open To Other Courses: ".$row['openToOther']." <br>";
            echo " Note: ".$row['notes']." <br>";
            echo "<br><br>";
            }
        }
    ?>

    <h1>TA Rating Record</h1>
    <?php
        $total = 0;
        $i = 0;
        while($row = $results2->fetchArray()){
            $tmp = $row['TAName'];
            if($tmp == $TAName){
                echo " Term: ".$row['term']." <br>";
                echo " Score: ".$row['score']." <br>";
                echo " Course ID: ".$row['course']." <br>";
                echo " Rating comment about this TA: ".$row['comm']." <br>";
                echo "<br><br>";
                $i++;
                $total = $total + $row['score'];
            }
        }

        if($i == 0){
            echo " No rating record.";
        }else if($total == 0){
            echo " The average rating score is 0.<br>";
        } else {
            $tmp = $total/$i;
            echo " The average rating score is ".$tmp.".<br>";
        }
        echo "<br><br>";
    ?>

    <h1>TA Performance Log</h1>
    <?php
        $i = 0;
        while($row = $results3->fetchArray()){
            $tmp = $row['TAName'];
            if($tmp == $TAName){
                echo " Term: ".$row['term']." <br>";
                echo " Course ID: ".$row['cID']." <br>";
                echo " Prof's comment about this TA: ".$row['comm']." <br>";
                echo "<br><br>";
                $i++;
            }
        }

        if($i == 0){
            echo " No performance log.";
        }
    ?>

    <h1>Wish List Membership</h1>
    <?php
        $i = 0;
        while($row = $results4->fetchArray()){
            $tmp = $row['TAName'];
            if($tmp == $TAName){
                echo " Term: ".$row['term']." <br>";
                echo " Course ID: ".$row['cID']." <br>";
                echo " Professor's Name ".$row['pName']." <br>";
                echo "<br><br>";
                $i++;
            }
        }

        if($i == 0){
            echo " No wish list membership.";
        }
    ?>

    <?php
        // echo "</table>";

        echo "<br><br>";

        echo '<button onclick="history.go(-1);"> Return to Dashboard </button> ';
    ?>

</body>
</html>