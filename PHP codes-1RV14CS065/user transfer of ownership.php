<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "rtodb");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$vehicleregno = mysqli_real_escape_string($link, $_POST['regnumber']);
$owner = mysqli_real_escape_string($link, $_POST['owner']);
$newowner = mysqli_real_escape_string($link, $_POST['newowner']);
$newphone = mysqli_real_escape_string($link, $_POST['newphone']);
$newsex = mysqli_real_escape_string($link, $_POST['newsex']);
$newaddress = mysqli_real_escape_string($link, $_POST['newaddress']);
$newaddress = mysqli_real_escape_string($link, $_POST['newaddress']);
$sql1="SELECT * FROM vehicle_registration WHERE vehicleregno='$vehicleregno'";
$result=mysqli_query($link,$sql1);
if(!$result)
  echo "error";
else
{
  while($row=mysqli_fetch_array($result,MYSQL_ASSOC))
   {
     $ownername=$row['ownername'];
    
     if(strcmp($owner,$ownername)==0)
       {
        $sql = "INSERT INTO transfer_ownership (vehicleregno, currentowner, newowner, phoneno, sex, address, username) VALUES ('$vehicleregno','$owner','$newowner','$newphone','$newsex','$newaddress','$newusername')";
       if(mysqli_query($link, $sql)){
         echo "ownership will be changed shortly...";
        } 
    else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
      }
    
    }
  }
// attempt insert query execution


 
// close connection
mysqli_close($link);
?>