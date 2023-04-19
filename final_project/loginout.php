<?php
//****************************************This file is called when the user clicked log out
header("Content-type: text/html; charset=gb2312"); ?>


<?php 
//begin session
session_start();
if ($_SESSION["username"] =="")
{
   echo "<script LANGUAGE='javascript'>alert('Go back to home');window.document.location.href='landing.html';</script>";
}
//clean cookie
setcookie("username","session expired",time()-60*60*24*1);

session_unset(); //destroy
//remove the session itself
session_destroy();
//go back
header("Location: landing.html");
?>
