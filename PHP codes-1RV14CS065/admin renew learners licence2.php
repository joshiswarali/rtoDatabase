<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "rtodb");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$licenceid = mysqli_real_escape_string($link, $_POST['licenceid']);
$issuedate = mysqli_real_escape_string($link, $_POST['issuedate']);
$expirydate = mysqli_real_escape_string($link, $_POST['expirydate']);
$today="2019-05-05";
$sql1="SELECT * FROM driver_licence WHERE licenceid='$licenceid'";
$result=mysqli_query($link,$sql1);
if(!$result)
  echo"error";
else
{
  while($row=mysqli_fetch_array($result,MYSQL_ASSOC))
   {
     $renew=$row['licenceid'];
      
        $sql = "UPDATE driver_licence SET issuedate='$issuedate',expirydate='$expirydate' WHERE licenceid='$licenceid'";
       if(mysqli_query($link, $sql)){
         echo "licence renewed...";
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