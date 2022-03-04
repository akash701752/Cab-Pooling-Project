<?php
    $db_host = 'localhost:3307' ;
    $db_user = 'root' ;
    $db_password = '';
    $db_name = 'signupdatabse';
    
    $name = $_POST['name'] ;
    $cartype = $_POST['cartype'] ;
    $source = $_POST['source'] ;
    $destination = $_POST['destination'] ;
    $time = $_POST['time'] ;
    
    

    //database connection
    $conn = new mysqli($db_host,$db_user,$db_password,$db_name) ;
    // $conn=mysqli_connect($servername, $username, $password);

    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error) ; 
    }
    else{
        //$stmt = $conn->prepare("INSERT INTO user (username,password) VALUES(?,?)") ;
        $stmt = $conn->prepare("INSERT INTO userride (name,cartype,source,destination,time) VALUES(?,?,?,?,?)") ;
        $stmt->bind_param("sssss",$name,$cartype,$source,$destination,$time) ;
        $stmt->execute() ;
        echo "Booking Confirmed" ;
        $stmt->close() ;
        $conn->close() ;
    }

?>