<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "rtodb");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security

$permitid = mysqli_real_escape_string($link, $_POST['permitid']);
$issuedate = mysqli_real_escape_string($link, $_POST['issuedate']);
$today="2019-05-05";
$sql1="SELECT * FROM permit WHERE permitid='$permitid'";
$result=mysqli_query($link,$sql1);
if(!$result)
  echo"error";
else
{
  while($row=mysqli_fetch_array($result,MYSQL_ASSOC))
   {
     $renew=$row['permitid'];
    
        $sql = "UPDATE permit SET issuedate='$issuedate' WHERE permitid='$permitid'";
       if(mysqli_query($link, $sql)){
         echo "permit renewed...";
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