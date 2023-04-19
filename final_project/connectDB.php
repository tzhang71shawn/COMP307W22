<?php
//****************************************This php is called everytime we connect to DataBase.
//******************************************************************************************
class db extends SQLite3{

  function __construct(){
    $this->open('final.db'); 
  }
}

$db = new db();

if(!$db){
  echo $db->lastErrorMsg();
}
?>
