<?php
/*
$server = 'localhost:3307';
$username = 'root';
$password = '';
$database = 'signupdatabse';
*/
$db_host = 'localhost:3307' ;
$db_user = 'root' ;
$db_password = '';
$db_name = 'signupdatabse';
$conn = new mysqli($db_host,$db_user,$db_password,$db_name) ;

//$conn = new mysqli($server, $username, $password, $database);
if (!$conn){
    //echo "success";
 //}
 //else{
    die("Error". mysqli_connect_error());
}

?>