<?php
//connection to database
mysql_connect('localhost','root','');

//select database
mysql_select_db('testswarali');

$sql="SELECT * FROM person";

$records=mysql_query($sql);

?>

<html>

<head>
<title> People data </title>
</head>


<body>

<table width="600" border="1" cellpadding="1" cellspacing="1">

<tr>
<th>ID</th>
<th>First name</th>
<th>Last name</th>
<th>email</th>
</tr>

<?php

while($person=mysql_fetch_assoc($records))
{
   echo"<tr>";
   echo"<td>".$person['person_id']."</td>";
   echo"<td>".$person['first_name']."</td>";
   echo"<td>".$person['last_name']."</td>";
   echo"<td>".$person['email_address']."</td>";
   echo"</tr>";  
}
?>
</table>
</body>

</html>