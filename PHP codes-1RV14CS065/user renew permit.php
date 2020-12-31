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
$today="2016-11-29";
$sql1="SELECT * FROM permit WHERE permitid='$permitid'";
$result=mysqli_query($link,$sql1);
if(!$result)
  echo "error";
else
{
  while($row=mysqli_fetch_array($result,MYSQL_ASSOC))
   {
     $date=$row['issuedate'];
     //$end=date('$date',strtotime('+5 years'));
      $dtime = DateTime::createFromFormat("Y-m-d", "$date");
      $ttime = DateTime::createFromFormat("Y-m-d", "$today");
     $timestamp = $dtime->getTimestamp();
      $timestamp1 = $ttime->getTimestamp();
     //echo date('Y-m-d',$timestamp);
     $end=strtotime('+5 years',$timestamp);
    
     
     //echo date('Y-m-d',$end);
     if(strcmp(date('Y-m-d',$end),date('Y-m-d',$timestamp1))<=0)
       {
        $sql = "UPDATE permit SET issuedate='9999-12-31' WHERE permitid='$permitid'";
       if(mysqli_query($link, $sql)){
         echo "permit will be renewed shortly...";
        } 
    else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
      }
     else
       echo"ineligible for updation...permit not expired yet";
    }
  }
// attempt insert query execution


 
// close connection
mysqli_close($link);
?>