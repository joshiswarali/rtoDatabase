<?php
if(isset($_POST['vehicleregno']))
{
//display owner information for a vehicle
//connection to database
mysql_connect('localhost','root','');

//select database
mysql_select_db('rtodb');

$applno = $_POST['vehicleregno'];
$sql="SELECT name,dob,sex,address,phoneno,licenceid,type,issuedate,expirydate FROM driver_licence WHERE licenceid IN (SELECT licenceid from vehicle WHERE vehicleregno='$applno')";

$records=mysql_query($sql);


?>


<html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>
<p>Owner information for vehicle registration <?php echo $applno;?> :<p><br> 
<table width="1000" border="1" cellpadding="1" cellspacing="1">

<tr>
<th><p>Name</p></th>
<th><p>DOB</p></th>
<th><p>Sex</p></th>
<th><p>Address</p></th>
<th><p>Phoneno</p></th>
<th><p>Licence id</p></th>
<th><p>Type</p></th>
<th><p>Issue date</p></th>
<th><p>Expiry date</p></th>
</tr>

<style type="text/css">
div
{
 font-family:Arial;
 font-weight:bold;
}

p
{

 font-family:Arial;
 font-weight:bold;
}

p1
{

 font-family:Arial;
 
}
</style>


<?php

while($driver_licence=mysql_fetch_assoc($records) )
{
   
 
   echo"<tr>";
   echo"<td><p1>".$driver_licence['name']."</p1></td>";
   echo"<td><p1>".$driver_licence['dob']."</p1></td>";
   echo"<td><p1>".$driver_licence['sex']."</p1></td>";
   echo"<td><p1>".$driver_licence['address']."</p1></td>";
   echo"<td><p1>".$driver_licence['phoneno']."</p1></td>";
   echo"<td><p1>".$driver_licence['licenceid']."</p1></td>";
   echo"<td><p1>".$driver_licence['type']."</p1></td>";
   echo"<td><p1>".$driver_licence['issuedate']."</p1></td>";
   echo"<td><p1>".$driver_licence['expirydate']."</p1></td>";
   echo"</tr>";
   
 
 }


echo"</table>";


}



 



 
else

{ ?>
<center>
<div class="container">
<form action="query2.php" method="post">
    <p>
        <label for="vehicleregno">Registration number:</label>
        <input type="text" name="vehicleregno" id="Vehicleregno">
    </p>
    

   

   <input type="submit" value="Submit">
</form>
</div>
</center>
<?php }?>
</body>
</html>