<?php
mysql_connect('localhost', 'root', '') or die("Connection Failed");
mysql_select_db('rtodb')or die("Connection Failed");
$applno = $_POST['applno'];
$vehicleregno = $_POST['vehicleregno'];
$regdate = $_POST['regdate'];
$query = "UPDATE vehicle_registration SET vehicleregno = '$vehicleregno', date='$regdate' WHERE applno = '$applno'";
$result=mysql_query($query);
if($result)
{
echo "Vehicle registered";}
else{
echo "fail";}
$query1="SELECT * from vehicle_registration INNER JOIN driver_licence ON phoneno=ownernumber";
$result1=mysql_query($query1);
if($result1)
{
  while($driver_licence=mysql_fetch_assoc($result1) )
{
   if($driver_licence['vehicleregno']!=NULL && $driver_licence['licenceid']!=NULL && $vehicleregno==$driver_licence['vehicleregno'])
 {
  
   
   $lid=$driver_licence['licenceid'];
   $v=$driver_licence['vehicleregno'];
   $t=$driver_licence['type'];
  

    
 }
}

$query2="INSERT INTO vehicle (licenceid, vehicleregno, type) VALUES ('$lid', '$v', '$t')";
$result2=mysql_query($query2);
}
?>