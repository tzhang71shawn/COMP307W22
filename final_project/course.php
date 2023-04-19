<?php 
session_start();
if($_COOKIE['type'] == 'Prof'){  
}elseif ($_COOKIE['type'] == 'TA'){
    echo '<style type="text/css">
        #performance_log { display: none; }
        #wish_list { display: none; }
    </style>';
} else {
}

$_SESSION['term'] = $_POST["term"];
setcookie("term","{$_POST['term']}",time()+60*60*24*1);
$_SESSION['cID'] = $_POST["course"];
setcookie("cID","{$_POST["course"]}",time()+60*60*24*1);

$term=$_COOKIE['term'];
$cID=$_COOKIE['cID'];
    //check sessions and cookies
// session_start();
// /*check if there is value in cookie, then session*/
// if ($_COOKIE["username"] ==""){ 
//   //check Session
//   if ($_SESSION["username"]==""){
//     echo "<script LANGUAGE='javascript'>alert('You are not logged in');window.document.location.href='landing.html';</script>";
// }else{  
//     echo $_SESSION["username"]. "&nbspWelcome!&nbsp;<a href=loginout.php>Log &nbsp out</a>"; 
// }  
// }else{
// 	// if check session first
//   if ($_SEESION["username"]==""){
//     $_SESSION["username"]=$_COOKIE["username"];
//     echo $_COOKIE["username"]."&nbspWelcome!&nbsp;<a href=loginout.php>Logout</a>"; 
// }else{  
//     echo $_SESSION["username"]."&nbspWelcome!&nbsp;<a href=loginout.php>Logout</a>"; 
// }      
// }

// $username = $_SESSION['username'];

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title></title>
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
            margin-top: 2%;
        }

        .box {
            width: 90%;
            height: 500px;
            background: rgb(224, 158, 158);
            margin: 5% auto;
            text-align: center;
            margin-left: 5%;
        }

        .topnav {
            overflow: hidden;
            background: #fff1ca;
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
    </style>
    <script type='text/javascript'>

        function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
        }

        function showContent(menuElement, theContent) {
            // content
            document.getElementById("oh").style.display="none";
            document.getElementById("perfLog").style.display="none";
            document.getElementById("wishL").style.display="none";
            document.getElementById("dashboard").style.display="none";
            // menu
            document.getElementById("office_hour").className="none";
            document.getElementById("performance_log").className="none";
            document.getElementById("wish_list").className="none";
            document.getElementById("dashb").className="none";
        
            document.getElementById(menuElement).className="active";
            document.getElementById(theContent).style.display="block";
        }

        
    </script>
</head>

<body>
    <div class="header">
        <div class="header1">
            <h1>TA Management

            </div>
            <div class="topnav" id="myTopnav">
                <div style="padding-left: 2%;">
                    <div>
                        <a id="office_hour" onclick="showContent('office_hour', 'oh')" class="active">Office Hour</a>
                        <a id="performance_log" onclick="showContent('performance_log', 'perfLog')" class="none">Performance Log</a>
                        <a id="wish_list" onclick="showContent('wish_list', 'wishL')" class="none">Wish List</a>
                        <a id="dashb" onclick="showContent('dashb', 'dashboard')" class="none">Dashboard</a>

                    </div>
                </div>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
        </div>


        <!--------------------------------->
        <div id="oh" style="display:block; margin-top: 5%;">

                <form style="margin-top: 2%;padding-left: 5%;" action="officehourAction.php" method="post">
                    <h3>Office Hour</h3>
                    <input type="date" placeholder="choose a date" name="ohDate">
                    <input type="time" placeholder="choose a time" name="ohTime">
                    <br>
                    <h3>Office Hour Location</h3>
                    <input type="text" placeholder="eg. Trottier 3120" name="ohLocation">
                    <br>
                    <h3>Office Hour Duty</h3>
                    <input type="text" name="ohDuty">
                    <br>
                    <br>
                    <input type="submit" value="Enter">
                </form>
        </div>

        <div id="perfLog" style="display:none; margin-top: 5%;">

                <form style="margin-top: 2%;padding-left: 5%;" action="perfLogAction.php" method="post">
                    <h3>Select TA</h3>
                    <?php
                        include_once ("connectDB.php");
                        $res = $db->query("SELECT DISTINCT TAName FROM TAhist WHERE term='$term' AND cID='$cID'");
                        echo "<select name=\"TAName\" id=\"TAName\">";
                        echo '<option value="a">------Choose TA------</option>'; 
                        while($row = $res->fetchArray()){
                            $tmp = $row['TAName'];
                            echo "<option value=\"$tmp\">" . $tmp .  "</option>";
                        }
                        echo "</select>";
                    ?>
                    <br>
                    <br>
                    <h3>Note about TA</h3>
                    <input type="text" name="note">
                    <br>
                    <br>
                    <input type="submit" value="Enter">
                </form>
        </div>

        <div id="wishL" style="display:none; margin-top: 5%;">

                <form style="margin-top: 2%;padding-left: 5%;" action="wishLAction.php" method="post">
                    <h3>Enter your name: </h3>
                    <input type="text" placeholder="eg. Vybihal" name="profName">
                    <br>
                    <h3>TA you wish to have: </h3>
                    <?php
                        include_once ("connectDB.php");
                        $res = $db->query("SELECT DISTINCT TAName FROM TAhist");
                        echo "<select name=\"TAName\" id=\"TAName\">";
                        echo '<option value="a">------Choose TA------</option>'; 
                        while($row = $res->fetchArray()){
                            $tmp = $row['TAName'];
                            echo "<option value=\"$tmp\">" . $tmp .  "</option>";
                        }
                        echo "</select>";
                    ?>
                    <br>
                    <br>
                    <input type="submit" value="Enter">
                </form>
        </div>

        <div id="dashboard" style="display:none; margin-top: 5%; margin-left:5%">

                    <h3>Want to select another course? </h3>
                    <br>
                    <br>
                    <button onclick="history.go(-1);"> Return to Dashboard </button>
                </form>
        </div>

    </div>
</body>
</html>