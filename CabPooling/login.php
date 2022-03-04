<?php 

$db_host = 'localhost:3307' ;
$db_user = 'root' ;
$db_password = '';
$db_name = 'signupdatabase';

//mysql_connect($db_host,$db_user,$db_password);
//$conn = new mysqli($db_host,$db_user,$db_password,$db_name) ;

//mysql_select_db($db_name);
/*
if(isset($_POST['email'])){
    
    $email=$_POST['email'];
    $password=$_POST['password'];
    // for checking email and paasword 
    $sql=mysql_query("SELECT * FROM signupdatabase WHERE email='".$email."'AND password='".$password."' limit 2");
    
    $result=mysql_query($sql);
    //checking for data is found or not
    if(mysql_num_rows($result)==1){
        echo " You Have Successfully Logged in";
        exit();
    }
    else{
        echo " You Have Entered Incorrect Password";
        exit();
    }
}
*/
$email = $_POST['email'] ;
$password = $_POST['password'] ;
$conn = mysqli_connect($db_host,$db_user,$db_password,$db_name);
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error) ; 
}
else{
    $stmt = $conn->prepare("SELECT * FROM signupdatabase WHERE email=?") ;
    $stmt->bind_param("s",$email) ;
    $stmt->execute() ;
    $stmt_result = $stmt->get_result() ;
    if($stmt_result->num_rows > 0){
        $data = $stmt_result->fetch_assoc() ;
        if($data['password']===$password){
           
            //echo "<h1 > Login Successfully </h1>" ;
            header("location:welcome.php") ;
            
        }
        else{
            echo "<h1>Invalid Email or Password </h1> " ;
        }
    }
    else{
        echo "Invalid Email or Password " ;
    }
    
    $stmt->close() ;
    $conn->close() ;
}
?>