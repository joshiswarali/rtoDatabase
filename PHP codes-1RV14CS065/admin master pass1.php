<?php
//connection to database
mysql_connect('localhost','root','');

//select database
mysql_select_db('rtodb');

$sql="SELECT * FROM masterpass";

$records=mysql_query($sql);

?>


<html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Issue Master Pass</title>
</head>
<body>

<center><table width="1000" border="1" cellpadding="1" cellspacing="1">

<tr>
<th><p>Vehicle registration no.</p></th>
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
$l1="2 Wheeler Learner's";
$l2="4 Wheeler Learner's";
while($driver_licence=mysql_fetch_assoc($records) )
{
   if($driver_licence['masterpassid']==NULL)
 {
  
   echo"<tr>";
   echo"<td><p1>".$driver_licence['vehicleregno']."</p1></td>";
   echo"</tr>";
    
 }
 
}
?>

</table>
<br>
<br>


<div class="container">
<form action="admin master pass2.php" method="post">
     <p>
        <label for="Vehicleregno">Vehicle Registration no.:</label>
        <input type="text" name="vehicleregno" id="Vehicleregno">
    </p>
    <p>
        <label for="Masterpassid">Master pass ID:</label>
        <input type="text" name="masterpassid" id="Masterpassid">
    </p>
    <p>
        <label for="Issuedate">Issue date:</label>
        <input type="date" name="issuedate" id="Issuedate">
    </p>
    <p>
        <label for="Expirydate">Expiry date:</label>
        <input type="date" name="expirydate" id="Expirydate">
    </p>
    
    
   <input type="submit" value="Submit">
</form>
</div>
</center>
</body>
</html>