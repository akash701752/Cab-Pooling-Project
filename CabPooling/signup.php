<?php
    $db_host = 'localhost:3307' ;
    $db_user = 'root' ;
    $db_password = '';
    $db_name = 'signupdatabse';
    $username = $_POST['username'] ;
   
    $password = $_POST['password'] ;
    
    

    //database connection
    $conn = new mysqli($db_host,$db_user,$db_password,$db_name) ;
    // $conn=mysqli_connect($servername, $username, $password);

    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error) ; 
    }
    else{
        $stmt = $conn->prepare("INSERT INTO user (username,password) VALUES(?,?)") ;
        $stmt->bind_param("ss",$username,$password) ;
        $stmt->execute() ;
        echo "Signed Up Succesfully" ;
        $stmt->close() ;
        $conn->close() ;
    }
    
?>