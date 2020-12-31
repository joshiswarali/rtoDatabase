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

$sql1="SELECT * FROM change_address WHERE vehicleregno='$vehicleregno'";
$result=mysqli_query($link,$sql1);
if(!$result)
  echo"error";
else
{
  while($row=mysqli_fetch_array($result,MYSQL_ASSOC))
   {
     $renew=$row['vehicleregno'];
     $currentaddress=$row['currentaddress'];
     $newaddress=$row['newaddress'];
        $sql = "UPDATE vehicle_registration SET address='$newaddress' WHERE vehicleregno='$renew'";
       if(mysqli_query($link, $sql)){
         echo "address changed...";
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