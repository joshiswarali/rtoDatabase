<?php
//connection to database
mysql_connect('localhost','root','');

//select database
mysql_select_db('rtodb');

$sql="SELECT * FROM driver_licence WHERE issuedate='9999-12-31' AND expirydate='9999-12-31'";

$records=mysql_query($sql);
if(!$records)
 echo "error";
?>

<html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Renewal of Learner's Licence</title>
</head>
<body>

<center><table width="1000" border="1" cellpadding="1" cellspacing="1">

<tr>
<th><p>Licence Id</p></th>
<th><p>Type</p></th>
<th><p>Name</p></th>
<th><p>DOB</p></th>
<th><p>Sex</p></th>
<th><p>Address</p></th>
<th><p>Phone No.</p></th>
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

p2
{
  font-size:30px;
 font-weight:bold;
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
   echo"<td><p1>".$driver_licence['licenceid']."</p1></td>";
   echo"<td><p1>".$driver_licence['type']."</p1></td>";
   echo"<td><p1>".$driver_licence['name']."</p1></td>";
   echo"<td><p1>".$driver_licence['dob']."</p1></td>";
   echo"<td><p1>".$driver_licence['sex']."</p1></td>";
   echo"<td><p1>".$driver_licence['address']."</p1></td>";
   echo"<td><p1>".$driver_licence['phoneno']."</p1></td>";
   echo"</tr>";

}
?>

</table>
<br>
<br>

<center><p2>Renewal of Learner's Licence</p2></center>

<div class="container">

<form action="admin renew learners licence2.php" method="post">
    <p>
        <label for="Licenceid">Licence Id:</label>
        <input type="text" name="licenceid" id="Licenceid">
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
</body>
</html>

