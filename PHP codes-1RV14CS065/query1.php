<?php
if(!empty($_POST['licenceid']))
{
//display vehicles owned by a particular driver
//connection to database
mysql_connect('localhost','root','');

//select database
mysql_select_db('rtodb');

$applno = $_POST['licenceid'];
$sql="SELECT vehicleregno,type,ownernumber,ownername,type,date,sex,address FROM vehicle_registration WHERE vehicleregno IN (SELECT vehicleregno from vehicle WHERE licenceid='$applno')";

$records=mysql_query($sql);


?>


<html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>
<p>Vehicles owned by licence id <?php echo $applno;?> :<p><br> 
<table width="1000" border="1" cellpadding="1" cellspacing="1">

<tr>
<th><p>Registration no</p></th>
<th><p>Type</p></th>
<th><p>Owner number</p></th>
<th><p>Owner name</p></th>
<th><p>Type</p></th>
<th><p>Date</p></th>
<th><p>Sex</p></th>
<th><p>Address</p></th>
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
   echo"<td><p1>".$driver_licence['vehicleregno']."</p1></td>";
   echo"<td><p1>".$driver_licence['type']."</p1></td>";
   echo"<td><p1>".$driver_licence['ownernumber']."</p1></td>";
   echo"<td><p1>".$driver_licence['ownername']."</p1></td>";
   echo"<td><p1>".$driver_licence['type']."</p1></td>";
   echo"<td><p1>".$driver_licence['date']."</p1></td>";
   echo"<td><p1>".$driver_licence['sex']."</p1></td>";
   echo"<td><p1>".$driver_licence['address']."</p1></td>";
   echo"</tr>";
   
 
 }


echo"</table>";


}



 



 
else

{ ?>
<center>
<div class="container">
<form action="query1.php" method="post">
    <p>
        <label for="licenceid">Licence ID:</label>
        <input type="text" name="licenceid" id="Licenceid">
    </p>
    

   

   <input type="submit" value="Submit">
</form>
</div>
</center>
<?php }?>
</body>
</html>