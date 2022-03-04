<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"]; 
    
     
    //$sql = "Select * from user where username='$username' AND password='$password'";
    //password hash
    $sql = "Select * from user where username='$username' ";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        while($row=mysqli_fetch_assoc($result)){
          if(password_verify($password, $row['password'])) {
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header("location: welcome.php");
          }
          else{
            $showError = "Invalid Credentials";
        }
        }
       } 
    else{
        $showError = "Invalid Credentials";
    }
}
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Corinthia:wght@700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
</head>
<body style="background-color:rgb(245, 188, 170);">
    <br><br><br>
<?php
    if($login){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
?>
    <div class="fixed-top">
        <div class="collapse" id="navbarToggleExternalContent">
          <div class="bg-dark p-4">
            <h5 class="text-white h4">Cab Pooling</h5>
            <span class="text-muted">Web based Cab Pooling System.</span>
          </div>
        </div>
        

        <nav class="navbar navbar-dark bg-dark">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </nav>
    </div>
    <br>
    <br>
    <section>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Cabpooling</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link" href="../CabPooling/index.html">Home <span class="sr-only"></span></a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="#">LogOut <span class="sr-only"></span></a>
                </li>
              </ul>
            </div>
          </nav>
    </section>
  <form class="form" method="post" action="loginnew.php">
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card bg-white text-dark" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">
      
                  <div class="mb-md-5 mt-md-4 pb-5">
      
                    <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                    <p class="text-dark-50 mb-5">Please enter your user id and password!</p>
      
                    <div class="form-outline form-white mb-4">
                    <p>User Name* :<input type="text" id="username" name="username"></p>
                    </div>
      
                    <div class="form-outline form-white mb-4">
                      <p>Password* :<input type="password" id="password" name="password" required></p> 
                    </div>
    
      
                    <button class="btn btn-outline-dark btn-lg px-5" type="submit" value="submit">Login</button>
      
                    <div class="d-flex justify-content-center text-center mt-4 pt-1">

                      <a href="https://www.facebook.com/" class="text-dark"><i style="font-size:24px" class="fa">&#xf09a;</i>&nbsp;&nbsp;</a>
                      <a href="https://www.twitter.com/" class="text-dark"><i style="font-size:24px" class="fa">&#xf081;</i>&nbsp;&nbsp;</a>
                      <a href="https://www.instagram.com/" class="text-dark"><i style="font-size:24px" class="fa">&#xf16d;</i></a>
                    </div>
      
                  </div>
      
                  <div>
                    <p class="mb-0">Don't have an account? <a href="signupnew.php" class="text-dark-50 fw-bold">Sign Up</a></p>
                  </div>
      
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </form> 
      <br>
    <br>
    <br>
    <br>
    <br>
    <br>
      <footer class="bg-dark text-center text-white">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
          <!-- Section: Social media -->
          <section class="mb-4">
            <!-- Facebook -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
              ><i style="font-size:24px" class="fa">&#xf09a;</i></a>
      
            <!-- Twitter -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
              ><a href="#!" class="text-dark"><i style="font-size:24px" class="fa">&#xf081;</i></a></a>
      
            <!-- Google -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
              ><i class="fab fa-google"></i
            ></a>
      
            <!-- Instagram -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
              > <a href="#!" class="text-dark"><i style="font-size:24px" class="fa">&#xf16d;</i></a></a>
      
            <!-- Linkedin -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
              ><i class="fab fa-linkedin-in"></i
            ></a>
      
            <!-- Github -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
              ><i class="fab fa-github"></i
            ></a>
          </section>
          <!-- Section: Social media -->
        </div>
        
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
          © 2021 Copyright:
          <a class="text-white" href="https://mdbootstrap.com/">Cab Pooling</a>
        </div>
        
      </footer>
</body>
</html>
