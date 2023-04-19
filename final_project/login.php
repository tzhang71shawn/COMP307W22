<?php
//to record session
session_start(); 

//connect DB
include_once "connectDB.php";

$found = 0;
$results = $db->query('SELECT * FROM user_log');

while ($row = $results->fetchArray()) {
  
  // check if the username and password are correct
  // store in session so that they can be used in multiple page 
  if($row['username'] == $_POST['username']){
    if($row['pwd'] == $_POST['password']){ 
      // echo "Correct password!";
      $found = 1;
      $_SESSION['username'] = $row["username"];
      $_SESSION['pwd'] = $row["password"];
      $_SESSION['sID'] = $row["sID"];
      $_SESSION['fn'] = $row["first_name"];
      $_SESSION['ln'] = $row["last_name"];
      setcookie("username","{$row["username"]}",time()+60*60*24*1);
      setcookie("pwd","{$row["password"]}",time()+60*60*24*1);
      setcookie("sID","{$row["sID"]}",time()+60*60*24*1);
      setcookie("fn","{$row["first_name"]}",time()+60*60*24*1);
      setcookie("ln","{$row["last_name"]}",time()+60*60*24*1);

      if($row['isSysOp'] == 1){
        $_SESSION['type'] = 'SysOp';
        setcookie("type","SysOp",time()+60*60*24*1);
        header("Location:https://www.cs.mcgill.ca/~ylin123/final_project/dashboard.php?Page=SysOp");
      }
      else if($row['isAdmin'] == 1){
        $_SESSION['type'] = 'Admin';
        setcookie("type","Admin",time()+60*60*24*1);
        header("Location:https://www.cs.mcgill.ca/~ylin123/final_project/dashboard.php?Page=Admin");
      }
      else if($row['isProf'] == 1){
        $_SESSION['type'] = 'Prof';
        setcookie("type","Prof",time()+60*60*24*1);
        header("Location:https://www.cs.mcgill.ca/~ylin123/final_project/dashboard.php?Page=Prof");
      }   
      else if($row['isTA'] == 1){
        $_SESSION['type'] = 'TA';
        setcookie("type","TA",time()+60*60*24*1);
        header("Location:https://www.cs.mcgill.ca/~ylin123/final_project/dashboard.php?Page=TA");
      }
      else{
        $_SESSION['type'] = 'Student';
        setcookie("type","Student",time()+60*60*24*1);
        header("Location:https://www.cs.mcgill.ca/~ylin123/final_project/dashboard.php?Page=Student");
      }
    }
    else{
      // exit();
      echo ("<script>
            window.alert('Please enter the correct password!');
            window.location.href='https://www.cs.mcgill.ca/~ylin123/final_project/landing.html';
            </script>");
    }
  }
}

if($found == 0){
  echo ("<script>
            window.alert('Username " . $_POST['username'] . " does not exist.');
            window.location.href='https://www.cs.mcgill.ca/~ylin123/final_project/landing.html';
            </script>");
  // exit();
}

?>

<input id="var" type="hidden" value="<?php echo $username; ?>"/>
