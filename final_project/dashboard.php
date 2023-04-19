<?php 
$token = strtok(getenv(QUERY_STRING), "=");
$token = strtok("=");
if ($token == 'SysOp'){
} elseif ($token == 'Admin'){
    echo '<style type="text/css">
        #SysOp { display: none; }
    </style>';
} elseif ($token == 'Prof' or $token == 'TA'){
    echo '<style type="text/css">
        #TA_Admin { display: none; }
        #SysOp { display: none; }
    </style>';
} else {
    echo '<style type="text/css">
        #TA_Admin { display: none; }
        #TA_Manage { display: none; }
        #SysOp { display: none; }
    </style>';
}

session_start();
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>DASHBOARD</title>
    <style>
        body {
            background-color: rgb(255, 255, 255);
            /*background-size:contain;*/
            background-size:cover;
            background-repeat:no-repeat;
            background-position:center;
            white-space:normal;
            word-break:break-all;
        }

        .header1 {
        }

        .box {
            width: 90%;
            height: 500px;
            background: rgb(224, 158, 158);
            margin: 5% auto;
            text-align: center;
            margin-left: 5%;
            background-image:url('background.jpg');
            background-size: contain;
        }

        .topnav {
            overflow: hidden;
            background: #aeb5b6;
        }

        .top {
            overflow: hidden;
            background: #aeb5b6;
        }

        .topnav a:hover {
            background-color: #9c9235d5;
            color: black;
        }

        .topnav .icon {
            display: none;
        }

        .topnav a {
            float: left;
            display: block;
            color: rgb(172, 75, 19);
            font-family: "verdana", verdana, sans-serif;
            text-align: left;
            padding-right: 5%;
            text-decoration: none;
            letter-spacing: 0.5px;
            font-size: 1.5vw;
            padding-top: 1vw;
            padding-bottom: 1vw;
        }

        @media screen and (max-width: 600px) {
            .topnav a:not(:first-child) {display: none;}
            .topnav a.icon {
                float: right;
                display: block;
            }
        }

        @media screen and (max-width: 600px) {
            .topnav.responsive {position: relative;}
            .topnav.responsive .icon {
                position: absolute;
                right: 0;
                top: 0;
            }
            .topnav.responsive a {
                float: none;
                display: block;
                text-align: left;
            }
        }

        .subnav {
            overflow: hidden;
            background: #aeb5b6;
        }

        .top {
            overflow: hidden;
            background: #aeb5b6;
        }

        .subnav a:hover {
            background-color: #9c9235d5;
            color: black;
        }

        .subnav .icon {
            display: none;
        }

        .subnav a {
            float: left;
            display: block;
            color: rgb(172, 75, 19);
            font-family: "verdana", verdana, sans-serif;
            text-align: left;
            padding-right: 5%;
            text-decoration: none;
            letter-spacing: 0.5px;
            font-size: 1.2vw;
            padding-top: 1vw;
            padding-bottom: 1vw;
        }

        @media screen and (max-width: 600px) {
            .subnav a:not(:first-child) {display: none;}
            .subnav a.icon {
                float: right;
                display: block;
            }
        }

        @media screen and (max-width: 600px) {
            .subnav.responsive {position: relative;}
            .subnav.responsive .icon {
                position: absolute;
                right: 0;
                top: 0;
            }
            .subnav.responsive a {
                float: none;
                display: block;
                text-align: left;
            }
        }
    </style>
    <script type='text/javascript'>
        var prof_TA = false;
        var all = false;
        var admin = false;

        function getIdentities(){
            if(document.getElementById("isSys").value === 1){
                sysop = true;
            } else if(document.getElementById("isAdmin").value === 1){
                admin = true;
            }else if(document.getElementById("isTA").value === 1 || document.getElementById("isProf").value === 1){
                prof_TA = true;
            }else{
                student = true;
            }
            checkIdentity();
        }

        function checkIdentity(){
            if(all){
                return;
            } else if(admin){
                document.getElementById("SysOp").style.display="none";
            }else if(prof_TA){
                document.getElementById("SysOp").style.display="none";
                document.getElementById("TA_Admin").style.display="none";
            }else{
                document.getElementById("SysOp").style.display="none";
                document.getElementById("TA_Admin").style.display="none";
                document.getElementById("TA_Manage").style.display="none";
            }
        }

        function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
        }

        function showContent(menuElement, theContent) {
            document.getElementById("empty").style.display="none";
            document.getElementById("green").style.display="none";
            document.getElementById("yellow").style.display="none";
            document.getElementById("blue").style.display="none";
            document.getElementById("orange").style.display="none";

            document.getElementById("TA_Admin").className="none";
            document.getElementById("TA_Manage").className="none";
            document.getElementById("Rate_TA").className="none";
            document.getElementById("SysOp").className="none";

            document.getElementById(menuElement).className="active";
            document.getElementById(theContent).style.display="block";
        }

        function showOrange(menuElement, theContent) {
            document.getElementById("importTA").style.display="none";
            document.getElementById("infoTA").style.display="none";
            document.getElementById("historyTA").style.display="none";
            document.getElementById("addTAC").style.display="none";
            document.getElementById("removeTAC").style.display="none";

            document.getElementById("import").className="none";
            document.getElementById("info").className="none";
            document.getElementById("history").className="none";
            document.getElementById("add").className="none";
            document.getElementById("remove").className="none";

            document.getElementById(menuElement).className="active";
            document.getElementById(theContent).style.display="block";
        }

        function showBlue(menuElement, theContent) {
            document.getElementById("selectCourse").style.display="none";
            // document.getElementById("officeHour").style.display="none";
            // document.getElementById("performanceLog").style.display="none";
            // document.getElementById("wishList").style.display="none";

            document.getElementById("selectC").className="none";
            // document.getElementById("oh").className="none";
            // document.getElementById("perfLog").className="none";
            // document.getElementById("wishL").className="none";

            document.getElementById(menuElement).className="active";
            document.getElementById(theContent).style.display="block";
        }
        function showYellow(menuElement, theContent) {
            document.getElementById("manageUser").style.display="none";
            document.getElementById("importProf").style.display="none";
            document.getElementById("addProf").style.display="none";

            document.getElementById("manageU").className="none";
            document.getElementById("importP").className="none";
            document.getElementById("addP").className="none";

            document.getElementById(menuElement).className="active";
            document.getElementById(theContent).style.display="block";
        }
    </script>
</head>

<body>
    <div class="header">
        <div class="top">
            <?php
                /*check if there is value in cookie, then session*/
                if ($_COOKIE["username"] ==""){ 
                    if ($_SESSION["username"]==""){
                        echo "<script LANGUAGE='javascript'>alert('You are not logged in');window.document.location.href='landing.html';</script>";
                    }
                    else{  
                        echo "&nbsp&nbsp&nbspWelcome&nbsp".$_SESSION["username"]."!&nbsp&nbsp&nbsp;<a href='loginout.php' style='float:right'>Logout</a>"; 
                    }    
                }else{
                    // if check session first
                    if ($_SEESION["username"]==""){
                        $_SESSION["username"]=$_COOKIE["username"];
                        echo "&nbsp&nbsp&nbspWelcome&nbsp".$_COOKIE["username"]."!&nbsp&nbsp&nbsp;<a href='loginout.php' style='float:right'>Logout</a>"; 
                    }else{  
                        echo "&nbsp&nbsp&nbspWelcome&nbsp".$_SESSION["username"]."!&nbsp&nbsp&nbsp;<a href='loginout.php' style='float:right'>Logout</a>"; 
                    }      
                }

                $username = $_SESSION['username'];
                $type = $_COOKIE['type'];
                $sID = $_COOKIE['sID'];
            ?>
        </div>
        <div class="header1">
            <div style="font-size:4vw;height:7vw;display: table-cell;vertical-align: middle;">
                <img src="header.jpg" class="photo" style="height:7vw">
                <b>TA Management System
            </div>
            <div class="topnav" id="myTopnav">
                <div style="padding-left: 2%;">
                    <div>
                        <a id="TA_Admin" onclick="showContent('TA_Admin', 'orange')" class="active">TA Administration</a>
                        <a id="TA_Manage" onclick="showContent('TA_Manage', 'blue')" class="none">TA Management</a>
                        <a id="Rate_TA" onclick="showContent('Rate_TA', 'green')" class="none">Rate A TA</a>
                        <a id="SysOp" onclick="showContent('SysOp', 'yellow')" class="none">Sysop Tasks</a>
                    </div>
                </div>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
        </div>

        <div id="empty">
            <div class="box" style="font-size:3.5vw;-webkit-text-stroke: 1px black;font-color:white">
                <br><br><br><br><br>Welcome to TA Management System!
            </div>
        </div>

        <!--------------------Orange---------------------------------------------->
        <div id="orange" style="display:none; margin-top: 1%;">
            <div>
                <h2 style="padding-left: 5%;">TA Administration</h2>
                <div class="subnav" id="mysubnav">
                    <div style="padding-left: 5%;">
                        <div>
                            <a id="import" onclick="showOrange('import', 'importTA')" class="active">Import TA Cohort</a>
                            <a id="info" onclick="showOrange('info', 'infoTA')" class="none">TA Info/History</a>
                            <a id="history" onclick="showOrange('history', 'historyTA')" class="none">Course TA history</a>
                            <a id="add" onclick="showOrange('add', 'addTAC')" class="none">Add TA to Course</a>
                            <a id="remove" onclick="showOrange('remove', 'removeTAC')" class="none">Remove TA from Course</a>
                        </div>
                    </div>
                    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>
            </div>
            <div id="importTA" style="display:none; margin-top: 5%;">
                <!--TODO: Add To SQL and manage submit key-->
                <h3 style="padding-left: 5%; margin-top: 5%;">Import TA Cohort</h3>
                <div style="padding-left: 5%; margin-top: 1%;">
                    Importing from TACohort.csv?
                    <form style="margin-top: 2%;padding-left: 5%;" action="importTACohort.php" method="post">
                        <input type="submit" value="Yes">
                    </form>
                </div>
            </div>
            <div id="infoTA" style="display:none; margin-top: 5%;">
                <h3 style="padding-left: 5%; margin-top: 5%;">TA Info/History</h3>
                <div style="padding-left: 5%; margin-top: 1%;">
                <?php   
                    include_once ("connectDB.php");
                    $res1 = $db->query("SELECT distinct TAName FROM TAhist");
                    echo "<form style=\"margin-top: 2%; font-size: 30\" action=\"TAinfo.php\" method=\"post\">";
                    echo "<select name=\"TAName\" id=\"TAName\">";
                    echo '<option value="a">------TA Name------</option>'; 
                    while($row = $res1->fetchArray()){
                        $tmp = $row['TAName'];
                        echo "<option value=\"$tmp\">" . $tmp .  "</option>";
                    }
                    echo "</select>";
                    echo "<br><br>";

                    echo "<input type=\"submit\" value=\"Submit\">";
                    echo "</form>";
                ?>
                </div>
                <!--TODO: Import from SQL-->
            </div>
            <div id="historyTA" style="display:none; margin-top: 5%;">
                <h3 style="padding-left: 5%; margin-top: 5%;">Course TA history</h3>
                <div style="padding-left: 5%; margin-top: 1%;">
                <?php
                    include_once ("connectDB.php");

                    $res1 = $db->query("SELECT distinct TAName FROM TAhist");
                    $res2 = $db->query("SELECT distinct cID FROM TAhist");

                    echo '<table style="table-layout:fixed; margin-left:5%; margin-right:5%">';
                    echo '<tr><td style="width:30%" valign="top">';

                    echo "<h4>Select TA</h4>";

                    echo "<form style=\"margin-top: 2%; font-size: 30\" action=\"TAhis.php\" method=\"post\">";
                    echo "<select name=\"TAName\" id=\"TAName\">";
                    echo '<option value="a">------TA Name------</option>'; 
                    while($row = $res1->fetchArray()){
                        $tmp = $row['TAName'];
                        echo "<option value=\"$tmp\">" . $tmp .  "</option>";
                    }
                    echo "</select>";
                    echo "<br><br>";

                    echo "<input type=\"submit\" value=\"SearchTA\">";
                    echo "</form>";

                    echo '</td><td style="width:30%" valign="top">';

                    echo "<h4>Select Course</h4>";

                    echo "<form style=\"margin-top: 2%; font-size: 30\" action=\"coursehis.php\" method=\"post\">";
                    echo "<select name=\"cID\" id=\"cID\">";
                    echo '<option value="a">------CourseID------</option>'; 
                    while($row = $res2->fetchArray()){
                        $tmp = $row['cID'];
                        echo "<option value=\"$tmp\">" . $tmp .  "</option>";
                    }
                    echo "</select>";
                    echo "<br><br>";

                    echo "<input type=\"submit\" value=\"SearchCourse\">";
                    echo "</form>";

                    echo "</td></tr>";
                    echo "</table>";
                ?>
                </div>
                <!--TODO: Import from SQL-->
            </div>
            <div id="addTAC" style="display:none; margin-top: 5%;">
                <h3 style="padding-left: 5%; margin-top: 5%;">Add TA to Course</h3>
                <div style="padding-left: 5%; margin-top: 1%;">
                    <form style="margin-top: 2%;" action="importTA.php" method="post">
                        Term:
                        <input type="text" placeholder="Term" name="term"><br>
                        Course ID:
                        <input type="text" placeholder="Course ID" name="course_id"><br>
                        TA Name:
                        <input type="text" placeholder="TA Name" name="TA_name"><br>
                        Student ID:
                        <input type="text" placeholder="Student ID" name="student_id"><br>
                        Assigned Hour:
                        <input type="radio" name="hour" value="90">90
                        <input type="radio" name="hour" value="180">180<br>
                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
            <div id="removeTAC" style="display:none; margin-top: 5%;">
                <h3 style="padding-left: 5%; margin-top: 5%;">Remove TA from Course</h3>
                <div style="padding-left: 5%; margin-top: 1%;">
                    <form style="margin-top: 2%;" action="deleteTA.php" method="post">
                        Term:
                        <input type="text" placeholder="Term" name="term"><br>
                        Course ID:
                        <input type="text" placeholder="Course ID" name="course_id"><br>
                        TA Name:
                        <input type="text" placeholder="TA Name" name="TA_name"><br>
                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>


        <!---------------------Blue--------------------------------------------->
        <div id="blue" style="display:none; margin-top: 1%;">
            <div>
                <h2 style="padding-left: 5%;">TA Management</h2>
                <div class="subnav" id="mysubnav">
                    <div style="padding-left: 5%;">
                        <div>
                            <a id="selectC" onclick="showBlue('selectC', 'selectCourse')" class="active">Select Course</a>
                        <!-- <a id="oh" onclick="showBlue('oh', 'officeHour')" class="none">Office Hour</a>
                        <a id="perfLog" onclick="showBlue('perfLog', 'performanceLog')" class="none">TA Performance Log</a>
                        <a id="wishL" onclick="showBlue('wishL', 'wishList')" class="none">TA Wish List</a> -->
                        </div>
                    </div>
                    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <i class="fa fa-bars"></i>
                    </a>
                </div>
            </div>

        
            <div id="selectCourse" style="display:none; margin-top: 5%;">
                <h3 style="padding-left: 5%; margin-top: 3%;">Select Course</h3>

            <!-- <form style="padding-left: 10%; margin-top: 2%; font-size: 30" action="officehour.php" method="post"> -->
                <!-- <label for="lang">Select a course: </label> -->
                <!-- <select name="course" id="course"> -->
                    <?php   
                    include_once ("connectDB.php");

                    $res1 = $db->query("SELECT DISTINCT term FROM prof WHERE pID='$sID' ");


                    echo "<form style=\"padding-left: 10%; margin-top: 2%; font-size: 30\" action=\"course.php\" method=\"post\">";

                    echo "<select name=\"term\" id=\"term\">";
                    echo '<option value="a">------Term------</option>'; 
                    while($row = $res1->fetchArray()){
                        $tmp = $row['term'];
                        echo "<option value=\"$tmp\">" . $tmp .  "</option>";
                    }
                    echo "</select>";
                    echo "<br><br>";


                    $res2 = $db->query("SELECT cID FROM prof WHERE pID='$sID'");
                    echo "<select name=\"course\" id=\"course\">";
                    echo '<option value="a">------Course------</option>'; 
                    while($row = $res2->fetchArray()){
                        $tmp = $row['cID'];
                        echo "<option value=\"$tmp\">" . $tmp .  "</option>";
                    }
                    echo "</select>";
                    echo "<br><br>";

                    echo "<input type=\"submit\" value=\"Submit\">";
                    echo "</form>";
                    ?>
                    <!-- </select> -->

                    <!-- <input type="submit" value="submit" name="submit"> -->
                    <!-- </form> -->
            </div>

        </div>



    <!---------COMPLETED--------Green--------rate the ta-------------------------------------->
        <div id="green" style="display:none; margin-top: 1%;">
            <h3 style="padding-left: 5%;">Rate a TA</h3>
            <?php   
                    include_once ("connectDB.php");

                    $res1 = $db->query("SELECT DISTINCT term FROM courses");


                    echo "<form style=\"padding-left: 10%; margin-top: 2%; font-size: 30\" action=\"rateAction.php\" method=\"post\">";
                    
                    echo "Select a term <br><br>";
                    echo "<select name=\"term\" id=\"term\">";
                    echo '<option value="a">------Term------</option>'; 
                    while($row = $res1->fetchArray()){
                        $tmp = $row['term'];
                        echo "<option value=\"$tmp\">" . $tmp .  "</option>";
                    }
                    echo "</select>";
                    echo "<br><br>";


                    $res2 = $db->query("SELECT cID FROM courses");
                    echo "Select a course <br><br>";
                    echo "<select name=\"course_id\" id=\"course_id\">";
                    echo '<option value="a">------Course------</option>'; 
                    while($row = $res2->fetchArray()){
                        $tmp = $row['cID'];
                        echo "<option value=\"$tmp\">" . $tmp .  "</option>";
                    }
                    echo "</select>";
                    echo "<br><br>";

                    $res3 = $db->query("SELECT TAName FROM TAhist");
                    echo "Select a TA <br><br>";
                    echo "<select name=\"TAName\" id=\"TAName\">";
                    echo '<option value="a">------TA Name------</option>'; 
                    while($row = $res3->fetchArray()){
                        $tmp = $row['TAName'];
                        echo "<option value=\"$tmp\">" . $tmp .  "</option>";
                    }
                    echo "</select>";
                    echo "<br><br>";


                    echo "Select a score <br><br>
                    <input type='radio' name='score' value='0'>0<br>
                    <input type='radio' name='score' value='1'>1<br>
                    <input type='radio' name='score' value='2'>2<br>
                    <input type='radio' name='score' value='3'>3<br>
                    <input type='radio' name='score' value='4'>4<br>
                    <input type='radio' name='score' value='5'>5<br>"; 
                    echo "<br><br>";

                    echo "Leave your comment 
                    <input type='text', name='comm'>";
                    echo "<br><br>";



                    echo "<input type=\"submit\" value=\"Submit\">";
                    echo "</form>";
                    ?>
            <!-- <form style="margin-top: 2%;padding-left: 5%;" action="rateAction.php" method="post">
                <table style=" border: none">
                <tr><td> Term: </td></tr>
                <tr><td><input type="text"  name="term"><br></td></tr> 
                <tr><td> Course ID:</td></tr> 
                <tr><td><input type="text" name="course_id"><br></td></tr> 
                <tr><td> TA name:</td></tr> 
                <tr><td><input type="text" name="TAName"><br></td></tr> 
                <tr><td> Rating:</td></tr> 
                <tr><td> <input type="radio" name="score" value="0">0</td></tr> 
                <tr><td> <input type="radio" name="score" value="1">1</td></tr> 
                <tr><td> <input type="radio" name="score" value="2">2</td></tr> 
                <tr><td> <input type="radio" name="score" value="3">3</td></tr>                        
                <tr><td> <input type="radio" name="score" value="4">4</td></tr>  
                <tr><td> <input type="radio" name="score" value="5">5</td></tr>  
                <tr><td> Leave a Comment:</td></tr>  
                <tr><td><input type="text" name="comm" ></td></tr> 
                <tr><td><input type="submit" value="Submit"></td></tr>                 
                </table>
            </form> -->
        </div>

    <!--------------COMPLETED-----------------------Yellow------------------------------------------------->

    <div id="yellow" style="display:none; margin-top: 1%;">
        <div>
            <h2 style="padding-left: 5%;">Sysop Tasks</h2>
            <div class="subnav" id="mysubnav">
                <div style="padding-left: 5%;">
                    <div>
                        <a id="manageU" onclick="showYellow('manageU', 'manageUser')" class="active">Manage Users</a>
                        <a id="importP" onclick="showYellow('importP', 'importProf')" class="none">Import Prof and Course</a>
                        <a id="addP" onclick="showYellow('addP', 'addProf')" class="none">Manual add Prof and course</a>
                    </div>
                </div>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
        </div>
        <div id="manageUser" style="display:none; margin-top: 5%;">
        <h3 style="padding-left: 5%; margin-top: 5%;">Manage User</h3>
            <table style="table-layout:fixed; margin-left:5%; margin-right:5%">
                <tr>
                <td style="width:30%" valign="top">
                <!----- add user block     --->
                <!----- add user into our user_log table ----------->
                <!----- initial type will be student, use update form to change the type ---------->
                <div style="display: block;float:left; margin-left:10%">
                    <h3 style="padding-left: 5%; margin-top: 5%;">Add User</h3>
                    <form style="margin-top: 2%;padding-left: 5%;" action="addUser.php" method="post">
                        <table style=" display: inline-table;border: none">
                            <tr><td>
                                <p>First name</p>
                            </tr></td>  
                            <tr><td>
                            <input type="text" placeholder="first name" name="first_name">   
                            </tr></td>  
                            <tr><td>
                            <p>Last name</p>  
                            </tr>  </td>                    
                            <tr><td>
                            <input type="text" placeholder="last name" name="last_name">
                            </tr></td>  
                            <tr><td>
                            <p>Email</p>
                            </tr></td>  
                            <tr><td>
                            <input type="text" placeholder="first.last@mcgill.ca" name="email">
                            </tr> </td>                                       
                            <tr><td>
                        <p>Student ID number</p>
                            </tr></td>  
                            <tr><td>
                            <input type="text" placeholder="9 digit ID number" name="sID">
                            </tr></td>  
                            <tr><td>
                            <p>Username</p>
                            </tr></td>  
                            <tr><td>
                            <input type="text" placeholder="username" name="username">
                            </tr></td>  
                            <tr><td>
                            <p>Password</p>
                            </tr></td>  
                            <tr><td>
                            <input type="password" placeholder="8-18 character password" name="password">
                            </tr></td>  
                            <tr><td>
                            <p>Courses</p>
                            </tr></td>  
                            <tr><td>
                            <input type="text" placeholder="eg. COMP206, COMP307, etc." name="courses">
                            </tr></td>    
                            <tr>
                            <td>
                            <input type="submit" value="Click to Add">
                            </td> 
                            </tr>                                                                                                             
                        </table>      
                    </form>
                </div>
                </td>
                <td style="width:30%;" valign="top">
                <!----- delete user block     --->
                <div style="display: block;float:left; margin-left:12%">
                    <h3 style="padding-left: 5%; margin-top: 5%;">Delete User</h3>
                    <form style="margin-top: 2%;padding-left: 5%;" action="deleteUser.php" method="post">
                        <table style=" display: inline-table;border: none;">
                            <tr><td>
                                <p>ID number</p>
                            </tr></td>  
                            <tr><td>
                                <input type="text" placeholder="9 digit ID number" name="sID">
                                <tr>
                                    <td>
                                        <input type="submit" value="Click to Delete">
                                    </td> 
                                </tr>                                                                                                             
                        </table>      
                    </form>
                </div>
                </td>
                <td style="width:30%" valign="top">
                <!----- Edit user block     --->
                <div style="display: block;float:right; margin-right:10%">
                    <h3 style="padding-left: 5%; margin-top: 5%;">Update User Info</h3>
                <form style="margin-top: 2%;padding-left: 5%;" action="editUser.php" method="post">
                    <table style=" display: inline-table; border: none">
                        <tr><td>
                            <p>Type the ID number of the person you want to modify</p>
                        </tr></td>  
                        <tr><td>
                            <input type="text" placeholder="9 digit ID number" name="sID">
                        </td></tr>
                        <tr><td>
                            Please provide the updated values, <br>
                            if certain filed is not required to update.
                            <br>Leave it empty.                   
                        </td></tr>
                        <tr><td>
                            <p>First name</p>
                        </tr></td>  
                        <tr><td>
                        <input type="text" placeholder="first name" name="first_name">   
                        </tr></td>  
                        <tr><td>
                        <p>Last name</p>  
                        </tr>  </td>                    
                        <tr><td>
                        <input type="text" placeholder="last name" name="last_name">
                        </tr></td>  
                        <tr><td>
                        <p>Email</p>
                        </tr></td>  
                        <tr><td>
                        <input type="text" placeholder="first.last@mcgill.ca" name="email">
                        </tr> </td>                                       

                        <tr><td>
                    <p>Username</p>
                        </tr></td>  
                        <tr><td>
                        <input type="text" placeholder="username" name="username">
                        </tr></td>  
                        <tr><td>
                        <p>Password</p>
                        </tr></td>  
                        <tr><td>
                        <input type="password" placeholder="8-18 character password" name="password">
                        </tr></td>  
                        <tr><td>
                        <p>Courses</p>
                        </tr></td>  
                        <tr><td>
                        <input type="text" placeholder="eg. COMP206, COMP307, etc." name="courses">
                        </tr></td>    

                        <tr><td>Choose Identity</td></tr>   
                        <tr><td>Student Yes<input type="radio" name="isStudent" value="1">No<input type="radio" name="isStudent" value="0"></td></tr>   
                        <tr><td>TA Yes<input type="radio" name="isTA" value="1">No<input type="radio" name="isTA" value="0"></td></tr>                                                                                                       
                        <tr><td>Professor Yes<input type="radio" name="isProf" value="1">No<input type="radio" name="isProf" value="0"></td></tr>                                                                                                          
                        <tr><td>TA Admin Yes<input type="radio" name="isAdmin" value="1">No<input type="radio" name="isAdmin" value="0"></td></tr>   
                        <tr><td>SysOp Yes<input type="radio" name="isSysOp" value="1">No<input type="radio" name="isSysOp" value="0"></td>                           <tr>
                        <td>
                        <input type="submit" value="Click to Update">
                        </td> 
                        </tr>                                                                                                                                                                                  
                    </table>      
                </form>
                </div>
                </td>
                </tr>
            </table>
</div>

<!-- import prof and course with sql queries-->
<div id="importProf" style="display: inline-table; display:none; margin-top: 5%;">
    <h3 style="padding-left: 5%; margin-top: 5%;">Import Prof and Course</h3>

    <form style="margin-top: 2%;padding-left: 5%;" action="importProf.php" method="post">
        <table style=" border: none">
            <tr><td>Importing Prof from csv?</td></tr>  
            <tr>
                <td>
                    <br>
                <input type="submit" value="Yes">
                <br>
                </td>
            </tr>
        </table>       
    </form>
    <form style="margin-top: 2%;padding-left: 5%;" action="importCourse.php" method="post">
        <table style=" border: none">
            <tr><td>Importing Course from csv?</td></tr>  
            <tr>
                <td>
                    <br>
                <input type="submit" value="Yes">
                <br>
                </td>
            </tr>
        </table>       
    </form>
      <!-- <form style="margin-top: 2%;padding-left: 5%;" action="importProf.php" method="post">
         <tr><td>   
            <textarea name="ProfSQL" placeholder="ie. INSERT INTO prof(term,cID,cName,pName,pID) VALUES ('','','','','','') " rows="5" cols="60">

            </textarea>
        </td></tr>          
        <tr><td>     <input type="submit" value="Import"></td></tr>  
     </form>
        </td></tr>  
    </table> -->
    <!-- <p>
    <br>
    </p>
    <table style=" border: none">
    <tr><td> Importing Prof and Course from csv?</td></tr>  
    <form style="margin-top: 2%;padding-left: 5%;" action="importCourse.php" method="post">
        <tr><td>    <textarea name="CourseSQL" placeholder="ie. INSERT INTO courseQuota(term,cID,cType,cName,iName,enrolNum,TAQuata) VALUES (Your values)"  rows="5" cols="60">

        </textarea></td></tr>  
        <tr><td>   <input type="submit" value="Import"></td></tr>  
    </form>
    </table> -->
</div>

<!--maually import prof and course, using two forms to call php-->
<div id="addProf" style="display:none; margin-top: 5%;">
    <h3 style="padding-left: 5%; margin-top: 5%;">Manual add Prof and course</h3>
    <table style="table-layout:fixed; margin-left:5%; margin-right:5%">
        <tr>
        <td style="width:30%" valign="top">
        <form style="margin-top: 2%;padding-left: 5%;" action="addProf.php" method="post">
            <table style=" display: inline-table;border: none">
                <tr><td>   <h3>Add Prof </h3></td></tr>
                <tr><td>
                    <p> Term:</p>
                </tr></td>  
                <tr><td>
                <input type="text" placeholder="eg. Fall/09/22" name="term">
                </tr></td>  
                <tr><td>
                <p> Course ID: </p>
                </tr></td>  
                <tr><td>
                <input type="text" placeholder="eg. COMP307" name="cID">
                </tr></td>   
                <tr><td>
                <p> Course Name: </p>
                </tr></td>  
                <tr><td>
                <input type="text" placeholder="eg. Web Development" name="cName">
                </tr></td>  
                <tr><td>
                <p> Instructor Name: </p>  
                </tr>  </td>                    
                <tr><td>
                <input type="text" placeholder="eg. Joseph Vybihal" name="pName">
                </tr></td>  
                <tr><td>
                <p> Instructor ID:</p>
                </tr></td>  
                <tr><td>
                <input type="text" placeholder="eg. 260900001" name="pID">
                </tr> </td>                                         
                <tr>
                <td>  <input type="submit" value="Add">
                </td> 
                </tr>  
            </table>
        </form>

        </td>
        <td style="width:30%" valign="top">
        <form style="margin-top: 2%;padding-left: 5%;" action="addCourse.php" method="post">         
            <table style=" display: inline-table;border: none">
                <tr><td>   <h3>Add Course </h3></td></tr>
                <tr><td>
                    <p> Term:</p>
                </tr></td>  
                <tr><td>
                <input type="text" placeholder="eg. Fall/09/22" name="term">
                </tr></td>  
                <tr><td>
                <p> Course ID: </p>
                </tr></td>  
                <tr><td>
                <input type="text" placeholder="eg. COMP307" name="cID">
                </tr></td>   
                <tr><td>
                <p> Course Name: </p>
                </tr></td>  
                <tr><td>
                <input type="text" placeholder="eg. Web Development" name="cName">
                </tr></td>                                  
                <tr>
                <td>  <input type="submit" value="Add">
                </td> 
                </tr>  
            </table>
        </form>
        </td>
        </tr>
    </table>

</div>

</div>
</body>
</html>
