<?php

// check if the form has been submitted and display the results
if (isset($_POST['vehicleregno'])) {

  define('DB_NAME', 'rtodb');
  define('DB_USER', 'root');
  define('DB_PASSWORD', '');
  define('DB_HOST', 'localhost');

  $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  if (!$conn) {
    die('Could not connect: ' . mysqli_connect_error());
  }

  // escape the post data to prevent injection attacks
  $vehicleregno = mysqli_real_escape_string($conn, $_POST['vehicleregno']);

  $sql1 = "SELECT vehicleregno FROM vehicle_registration WHERE vehicleregno='$vehicleregno'";
   $result1 = mysqli_query($conn, $sql1); 
  $sql2 = "SELECT vehicleregno FROM vehicle_tax WHERE vehicleregno='$vehicleregno'";
  
  $result2 = mysqli_query($conn, $sql2); 
 if($result1 && $result2)
{   
   
    if(!($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) || !($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) )
     echo 'not eligible for master pass';
       
  if($row1) 
  {    
      
      if($row1['vehicleregno']==$vehicleregno)
     {  
       echo 'Applied for master pass';
    $newsql = "INSERT INTO masterpass (vehicleregno) VALUES ('$vehicleregno')";
    $result3=mysqli_query($conn,$newsql);
    if(!$result3)
      echo "error";
      }
    
  }
  
  
}

      
   
   
  mysqli_close($conn);
 // end submitted
}
else
{
// not submitted to output the form
?>
<form action="user master pass.php" method="post">
  <label>Enter registration number:</label>
  <input name="vehicleregno" type="text" placeholder="Type Here">
  <br>
  <br>
  <input type="submit" value="Enter">
</form>
<?php
} // end not submitted
?>