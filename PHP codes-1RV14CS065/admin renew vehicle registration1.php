<?php
//connection to database
mysql_connect('localhost','root','');

//select database
mysql_select_db('rtodb');

$sql="SELECT * FROM vehicle_registration WHERE date='9999-12-31'";

$records=mysql_query($sql);
if(!$records)
 echo "error";
?>

<html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Renewal of Vehicle Registration</title>
</head>
<body>

<center><table width="1000" border="1" cellpadding="1" cellspacing="1">

<tr>
<th><p>Registration number</p></th>
<th><p>Type</p></th>
<th><p>Owner number</p></th>
<th><p>Owner name</p></th>
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
   echo"<td><p1>".$driver_licence['type']."</p1></td>";
   echo"<td><p1>".$driver_licence['ownernumber']."</p1></td>";
   echo"<td><p1>".$driver_licence['ownername']."</p1></td>";
   echo"<td><p1>".$driver_licence['sex']."</p1></td>";
   echo"<td><p1>".$driver_licence['address']."</p1></td>";
   echo"</tr>";

}
?>

</table>
<br>
<br>

<center><p1>Renewal of Vehicle Registration</p1></center>

<div class="container">

<form action="admin renew vehicle registration2.php" method="post">
    <p>
        <label for="Vehicleregno">Registration number:</label>
        <input type="text" name="vehicleregno" id="Vehicleregno">
    </p>
    
    <p>
        <label for="Regdate">New registration date:</label>
        <input type="date" name="regdate" id="Regdate">
    </p>

  
   <input type="submit" value="Submit">
</form>

</div>
</body>
</html>

