
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Import Prof CSV</title>
    </head>

    <body>
        <div class="header">
            <div class="header1">
                <h1>Import Prof</h1>
                
                <div>
                    <?php
                    //connect to DB
                    

                    // Course Quota
                    $myfile = fopen("importProf.csv", "r") or die("Unable to open file!");
                    $i = 0;
                    $s = "";
                    function del($var){return (trim($var));}
                    echo "<table border=1 cellspacing=0 cellpading=0>";
                    echo "<tr><td>Term</td><td>Course Id</td><td>  Course Name </td><td>Prof Name</td><td>Prof ID</td></tr> "
                    ;
                    while(!feof($myfile)) {
                        $i = $i + 1;
                        $row = fgetcsv($myfile);
                        if(count(array_filter($row, "del")) < 5){
                            $s = $s + "<div>Course Quota: Line ".$i." contains null value.<br></div>";
                            continue;
                        }
                        
                        echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td></tr>";
			}
                        echo "</table>";

                        fclose($myfile);
                    
                        ?>
                     

         

                            <?php
//*******************************************************************************************
//This php is called by sysop when  prof is imported with sql queries.
//
//******************************************************************************************* 
//connect to DB
                            include_once "connectDB.php";

    //open the csv contains the queries to import prof
                            if (($open = fopen("importProf.csv", "r")) !== FALSE) 
                            {

                                while (($ProfSQL = fgetcsv($open, 1000, ",")) !== FALSE) 
                                {   
       //execute     
                                  $result= $db->exec("INSERT INTO prof(term,cID,cName,pName,pID) VALUES ($ProfSQL[0],$ProfSQL[1],$ProfSQL[2],$ProfSQL[3],$ProfSQL[4])") ;
   
                            }

                            fclose($open);
                        }
                            $db->close;
                            echo '<button onclick="history.go(-1);"> Return to Dashboard </button> ';
                            ?>

                        </div>
                        <div>


                    </div>
                </div>
            </div>
        </body>
