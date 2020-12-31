<?php
//connection to database
mysql_connect('localhost','root','');

//select database
mysql_select_db('rtodb');

$sql="SELECT * FROM transfer_ownership WHERE vehicleregno IN (SELECT vehicleregno FROM vehicle_registration)";

$records=mysql_query($sql);
if(!$records)
 echo "error";
?>

<html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Transfer of ownership</title>
</head>
<body>

<center><table width="1000" border="1" cellpadding="1" cellspacing="1">

<tr>
<th><p>Registration number</p></th>
<th><p>Current Owner</p></th>
<th><p>New owner</p></th>
<th><p>Phone no.</p></th>
<th><p>Sex</p></th>
<th><p>Address</p></th>
</tr>



<style type="text/css">
   
  div {
  font-family:Arial;
 
}   
    .container {
      
        width: 300px;
        clear: both;
    }
    .container input {
        width: 100%;
        clear: both;
    }
p1
{
  font-size:15px;
  
  font-family:Arial;
  position:relative;
  
}

p
{
  font-size:15px;
  
  font-family:Arial;
  position:relative;
  
}
</style>

<?php

while($driver_licence=mysql_fetch_assoc($records) )
{
  
   echo"<tr>";
   echo"<td><p1>".$driver_licence['vehicleregno']."</p1></td>";
   echo"<td><p1>".$driver_licence['currentowner']."</p1></td>";
   echo"<td><p1>".$driver_licence['newowner']."</p1></td>";
   echo"<td><p1>".$driver_licence['phoneno']."</p1></td>";
   echo"<td><p1>".$driver_licence['sex']."</p1></td>";
   echo"<td><p1>".$driver_licence['address']."</p1></td>";
   echo"</tr>";

}
?>

</table>
<br>
<br>

<center><p1>Transfer of ownership</p1></center>

<div class="container">

<form action="admin transfer of ownership2.php" method="post">
    <p>
        <label for="Vehicleregno">Registration number:</label>
        <input type="text" name="vehicleregno" id="Vehicleregno">
    </p>
    
   <input type="submit" value="Transfer">
</form>

</div>
</body>
</html>

