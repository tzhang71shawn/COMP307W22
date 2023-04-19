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
    <div class="header">
        <div class="header1">
            <h1>TA Cohort Result</h1>
            <h2>Course Quota</h2>
            <div>
                <?php
                    //connect to DB
                    include_once ("connectDB.php");

                    // Course Quota
                    $myfile = fopen("CourseQuota.csv", "r") or die("Unable to open file!");
                    $i = 0;
                    $s = "";
                    function del($var){return (trim($var));}
                    echo "<table border=1 cellspacing=0 cellpading=0>";
                    echo "<tr><td>Term</td><td>Course Id</td><td>Course Type</td><td>Course Name</td><td>Instructor</td><td>Enrollment/TA_quota</td></tr> ";
                    while(!feof($myfile)) {
                        $i = $i + 1;
                        $row = fgetcsv($myfile);
                        if(count(array_filter($row, "del")) < 7){
                            $s = $s + "<div>Course Quota: Line ".$i." contains null value.<br></div>";
                            continue;
                        }
                        $div = round((int)$row[5]/(int)$row[6]);
                        echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$div."</td></tr>";
                        $db->exec("INSERT INTO courseQuota(term,cID,cType,cName,iName,enrolNum,TAQuata) VALUES ('".$row[0]."','".$row[1]."','".$row[2]."','".$row[3]."','".$row[4]."','".(int)$row[5]."','".(int)$row[6]."');");
                    }

                    echo "</table>";

                    fclose($myfile);

                    $db->close;

                    // echo $s;
                ?>
            </div>
            <div>
                <?php
                    //connect to DB
                    include_once ("connectDB.php");

                    // Course Quota
                    $myfile = fopen("TACohort.csv", "r") or die("Unable to open file!");
                    $i = 0;
                    $s = "";
                    while(!feof($myfile)) {
                        $i = $i + 1;
                        $row = fgetcsv($myfile);
                        if(count(array_filter($row, "del")) < 16){
                            $s = $s + "<div>TA Cohort: Line ".$i." contains null value.<br></div>";
                            continue;
                        }
                        if(($row[8] == 90 || $row[8] == 180)){
                            $s = $s + "<div>TA Cohort: Line ".$i." has invalid TA hour.<br></div>";
                        }
                        $prio = 0;
                        $open = 0;
                        if($row[7] == 'yes' || $row[7] == 'Yes'){
                            $prio = 1;
                        }
                        if($row[14] == 'yes' || $row[14] == 'Yes'){
                            $open = 1;
                        }
                        $db->exec("INSERT INTO TAcohort(term,TAName,sID,legalName,email,TAStatus,superName,prio,TAHours,dApply,loc,phone,degree,cApplied,openToOther,notes) 
                        VALUES ('".$row[0]."','".$row[1]."','".$row[2]."','".$row[3]."','".$row[4]."','".$row[5]."','".$row[6]."','".$prio."',
                        '".$row[8]."','".$row[9]."','".$row[10]."','".$row[11]."','".$row[12]."','".$row[13]."','".$open."','".$row[15]."');");
                    }

                    fclose($myfile);

                    $db->close;

                    // echo $s;

                    //TODO: add a back button
                    echo '<button onclick="history.go(-1);"> Return to Dashboard </button> ';
                    // echo ('<scirpt> funtion return(){
                            
                    //     }
                    //     </script>');
                    
                ?>
            </div>
        </div>
    </div>
</body>
