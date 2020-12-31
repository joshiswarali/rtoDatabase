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
$today="2016-11-29";
$sql1="SELECT * FROM vehicle_registration WHERE vehicleregno='$vehicleregno'";
$result=mysqli_query($link,$sql1);
if(!$result)
  echo "error";
else
{
  while($row=mysqli_fetch_array($result,MYSQL_ASSOC))
   {
     if(!empty($row['vehicleregno']))
     {
     $date=$row['date'];
     $dtime = DateTime::createFromFormat("Y-m-d", "$date");
      $ttime = DateTime::createFromFormat("Y-m-d", "$today");
     $timestamp = $dtime->getTimestamp();
      $timestamp1 = $ttime->getTimestamp();
     //echo date('Y-m-d',$timestamp);
     $end=strtotime('+5 years',$timestamp);
    
     
     //echo date('Y-m-d',$end);
     if(strcmp(date('Y-m-d',$end),date('Y-m-d',$timestamp1))<=0)
       {
        $sql = "UPDATE vehicle_registration SET date='9999-12-31' WHERE vehicleregno='$vehicleregno'";
       if(mysqli_query($link, $sql)){
         echo "registration will be renewed shortly...";
        } 
    else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
      }
     else
       echo"ineligible for registration renewal...registration not expired yet";
    }
   else
     echo "error";   

  }
// attempt insert query execution


 
// close connection
mysqli_close($link);
}


?>