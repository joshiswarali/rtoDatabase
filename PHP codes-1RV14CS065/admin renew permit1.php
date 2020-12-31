<?php
//connection to database
mysql_connect('localhost','root','');

//select database
mysql_select_db('rtodb');

$sql="SELECT * FROM permit WHERE issuedate='9999-12-31'";

$records=mysql_query($sql);
if(!$records)
 echo "error";
?>

<html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Renewal of Permit</title>
</head>
<body>

<center><table width="1000" border="1" cellpadding="1" cellspacing="1">

<tr>
<th><p>Vehicle Registration No.</p></th>
<th><p>PermitID</p></th>
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
   echo"<td><p1>".$driver_licence['permitid']."</p1></td>";
   echo"</tr>";

}
?>

</table>
<br>
<br>

<center><p1>Renewal of Permit</p1></center>

<div class="container">

<form action="admin renew permit2.php" method="post">
    <p>
        <label for="Permitid">Permit ID:</label>
        <input type="text" name="permitid" id="Permitid">
    </p>
    
    <p>
        <label for="Issuedate">Issue date:</label>
        <input type="date" name="issuedate" id="Issuedate">
    </p>

   <input type="submit" value="Submit">
</form>

</div>
</body>
</html>

