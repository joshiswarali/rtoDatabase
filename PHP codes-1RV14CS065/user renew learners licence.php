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
$today="2016-11-29";
$sql1="SELECT * FROM driver_licence WHERE licenceid='$licenceid'";
$result=mysqli_query($link,$sql1);
if(!$result)
  echo "error";
else
{
  while($row=mysqli_fetch_array($result,MYSQL_ASSOC))
   {
     $expiry=$row['expirydate'];
     if(strcmp($expiry,$today)<=0)
       {
        $sql = "UPDATE driver_licence SET issuedate='9999-12-31',expirydate='9999-12-31' WHERE licenceid='$licenceid'";
       if(mysqli_query($link, $sql)){
         echo "licence will be updated shortly...";
        } 
    else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
      }
     else
       echo"ineligible for updation...licence not expired yet";
    }
  }
// attempt insert query execution


 
// close connection
mysqli_close($link);
?>