<?php
//connection to database
mysql_connect('localhost','root','');

//select database
mysql_select_db('rtodb');

$sql="SELECT * FROM driver_licence";

$records=mysql_query($sql);

?>

<html>

<head>
<title> Licence Applications </title>
</head>


<body>
<style type="text/css">
p{
   font-family: "Arial"; 
   font-weight: bold;
   font-size: 20px;
}
</style>
<center><p>Licence applications
<br>
<br>
<table width="1000" border="1" cellpadding="1" cellspacing="1">

<tr>
<th>Appl.No.</th>
<th>Type</th>
<th>Name</th>
<th>DOB</th>
<th>Sex</th>
<th>Address</th>
<th>Phone No.</th>
</tr>

<?php
$count=0;
while($driverlicence=mysql_fetch_assoc($records))
{
   if($driverlicence['licenceid']==NULL)
   {
   $count++;
   echo"<tr>";
   echo"<td>".$driverlicence['applno']."</td>";
   echo"<td>".$driverlicence['type']."</td>";
   echo"<td>".$driverlicence['name']."</td>";
   echo"<td>".$driverlicence['dob']."</td>";
   echo"<td>".$driverlicence['sex']."</td>";
   echo"<td>".$driverlicence['address']."</td>";
   echo"<td>".$driverlicence['phoneno']."</td>";
   echo"</tr>";
   }    
}
 if($count==0){ echo"no new applications!";
                    }
?>
</table>
</p>
</center>

</body>

</html>