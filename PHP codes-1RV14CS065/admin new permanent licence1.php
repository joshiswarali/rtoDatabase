<?php
//connection to database
mysql_connect('localhost','root','');

//select database
mysql_select_db('rtodb');

$sql="SELECT * FROM driver_licence";

$records=mysql_query($sql);

?>


<html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>

<center><table width="1000" border="1" cellpadding="1" cellspacing="1">

<tr>
<th><p>Appl.No.</p></th>
<th><p>Type</p></th>
<th><p>Name</p></th>
<th><p>DOB</p></th>
<th><p>Sex</p></th>
<th><p>Address</p></th>
<th><p>Phone No.</p></th>
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
   if($driver_licence['licenceid']==NULL && (strcmp($driver_licence['type'],"2 Wheeler Permanent")==0 || strcmp($driver_licence['type'],"4 Wheeler Permanent")==0))
 {
  
   echo"<tr>";
   echo"<td><p1>".$driver_licence['applno']."</p1></td>";
   echo"<td><p1>".$driver_licence['type']."</p1></td>";
   echo"<td><p1>".$driver_licence['name']."</p1></td>";
   echo"<td><p1>".$driver_licence['dob']."</p1></td>";
   echo"<td><p1>".$driver_licence['sex']."</p1></td>";
   echo"<td><p1>".$driver_licence['address']."</p1></td>";
   echo"<td><p1>".$driver_licence['phoneno']."</p1></td>";
   echo"</tr>";
    
 }
 
}
?>

</table>
<br>
<br>


<div class="container">
<form action="admin new permanent licence2.php" method="post">
    <p>
        <label for="Applno">Application number:</label>
        <input type="text" name="applno" id="Applno">
    </p>
    <p>
        <label for="Licenceid">Licence id:</label>
        <input type="text" name="licenceid" id="Licenceid">
    </p>
    <p>
        <label for="Issuedate">Issue date:</label>
        <input type="date" name="issuedate" id="Issuedate">
    </p>
    
    <p>
        <label for="Expirydate">Expiry Date:</label>
        <input type="date" name="expirydate" id="Expirydate">
    </p>

   

   <input type="submit" value="Submit">
</form>
</div>
</center>
</body>
</html>