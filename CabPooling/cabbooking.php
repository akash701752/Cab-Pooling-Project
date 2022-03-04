<?php
require_once "dbconnect.php";
if($_SERVER['REQUEST_METHOD'] == "POST")
{
$source=$_POST['source'];
$destination=$_POST['destination'];
$time=$_POST['time'];
$sql = "SELECT cab FROM ridedetails WHERE (source='$source' AND destination='$destination'  AND time >='$time'  ) ";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) 
{
  
  // output data of each row
  while($row = mysqli_fetch_assoc($result))
   {
    
     $var=$row["cab"];
      $sql="SELECT * FROM ridedetails INNER JOIN  capacitytable ON ridedetails.cab=capacitytable.cab WHERE(capacitytable.cab ='$var' AND capacitytable.space >0 )";
      $result1 = mysqli_query($conn, $sql);
      $row1=mysqli_fetch_assoc($result1);
      $var1=$row1["cab"];
      if (mysqli_num_rows($result1) > 0)
       {
         echo " inside the join query";
           $sql="UPDATE capacitytable SET space = space-1 WHERE (cab ='$var')";
           $result2 = mysqli_query($conn, $sql);
           if ($result2) 
           {
            echo "Record updated successfully";
            header("location: success.php");
            echo "Record updated successfully";
            break;
          } 
          else 
          {
            echo "Error updating record: " . mysqli_error($conn);
          }
         // mysqli_close($result2);
        
        
       }
      else 
      {
        //echo "0 results";
        header("location:sorry.html");
       }
     // mysqli_close($result1);
    }

  }
  else 
  {
    //echo "0 results";
    header("location:sorry.html");
   }
 mysqli_close($conn);
}
?>