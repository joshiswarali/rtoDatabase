<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "rtodb");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$vehicleregno = mysqli_real_escape_string($link, $_POST['vehicleregno']);
$regdate = mysqli_real_escape_string($link, $_POST['regdate']);
$today="2019-05-05";
$sql1="SELECT * FROM vehicle_registration WHERE vehicleregno='$vehicleregno'";
$result=mysqli_query($link,$sql1);
if(!$result)
  echo"error";
else
{
  while($row=mysqli_fetch_array($result,MYSQL_ASSOC))
   {
     $renew=$row['vehicleregno'];
    
        $sql = "UPDATE vehicle_registration SET date='$regdate' WHERE vehicleregno='$vehicleregno'";
       if(mysqli_query($link, $sql)){
         echo "registration renewed...";
         }
    else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
     
    }
  }
// attempt insert query execution


 
// close connection
mysqli_close($link);
?>