    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Import Course CSV</title>
    </head>

    <body>
        <div class="header">
            <div class="header1">
                <h1>Import Course</h1>
                
                <div>
                    <?php

                    // Course Quota
                    $myfile = fopen("importCourse.csv", "r") or die("Unable to open file!");
                    $i = 0;
                    $s = "";
                    function del($var){return (trim($var));}
                    echo "<table border=1 cellspacing=0 cellpading=0>";
                    echo "<tr><td>Term</td><td>Course Id</td><td>Course Type</td><td>Course Name</td><td>Instructor</td><td>Enrollment/TA_quota</td></tr> "
                    ;
                    while(!feof($myfile)) {
                        $i = $i + 1;
                        $row = fgetcsv($myfile);
                        if(count(array_filter($row, "del")) < 7){
                            $s = $s + "<div>Course Quota: Line ".$i." contains null value.<br></div>";
                            continue;
                        }
                        $div = round((int)$row[5]/(int)$row[6]);
                        echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$div."</td></tr>";
                        }
                        echo "</table>";

                        fclose($myfile);




                    
                        ?>
                        <?php
//*******************************************************************************************
//This php is called by sysop when  course is imported with a csv file (in the server)
//
//******************************************************************************************* 
//connect to DB
                        include_once "connectDB.php";

        //open the csv contains the queries to import prof
                        if (($open = fopen("importCourse.csv", "r")) !== FALSE) 
                        {
                            while (($CourseSQL = fgetcsv($open, 1000, ",")) !== FALSE) 
                            {   
       //execute     
                                $sqlStr ="INSERT INTO courseQuota(term,cID,cType,cName,iName,enrolNum,TAQuata) VALUES ('$CourseSQL[0]','$CourseSQL[1]','$CourseSQL[2]','$CourseSQL[3]','$CourseSQL[4]','$CourseSQL[5]','$CourseSQL[6]')";
                                $result= $db->exec($sqlStr); 

                            }
                            fclose($open);
                        }
			 echo '<button onclick="history.go(-1);"> Return to Dashboard </button> ';
                            ?>

                        </div>
                        <div>


                    </div>
                </div>
            </div>
        </body>
