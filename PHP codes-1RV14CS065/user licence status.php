<?php
if(isset($_POST['username']) && isset($_POST['password']))
{
//display vehicles owned by a particular driver
//connection to database
mysql_connect('localhost','root','');

//select database
mysql_select_db('rtodb');

$u = $_POST['username'];
$p = $_POST['password'];
$sql="SELECT username,password from user_login WHERE username='$u' AND password='$p'";
$result=mysql_query($sql);
$row = mysql_fetch_array($result);
if(empty($row['username']) || empty($row['password']))
      {  echo "<center>"."wrong username or password"."</center>";
         header('Refresh: 2;url=user licence status.php');
      }
else
{
$sql="SELECT name,dob,sex,address, phoneno, licenceid, type, issuedate, expirydate, username FROM driver_licence WHERE username IN (SELECT username FROM user_login WHERE username='$u' AND password='$p')";

$records=mysql_query($sql);


?>


<html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>
<p>Licence status:<p><br> 
<table width="1000" border="1" cellpadding="1" cellspacing="1">

<tr>
<th><p>Name</p></th>
<th><p>DOB</p></th>
<th><p>Sex</p></th>
<th><p>Address</p></th>
<th><p>Phone no.</p></th>
<th><p>Licence ID</p></th>
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

p2
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
     if(!empty($driver_licence['username']) && !empty($driver_licence['licenceid']) && $driver_licence['issuedate']!='9999-12-31')  
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
   
   else if(!empty($driver_licence['username']) && empty($driver_licence['licenceid']))
     echo $driver_licence['type']." licence not issued";
   else
     echo $driver_licence['type']." licence under renewal";
  
 }


echo"</table>";


}

}

 



 
else

{ ?>
<style type="text/css">

p3
{

 font-family:Arial;
 font-weight:bold;
 font-size:30px;
}

p4
{

 font-family:Arial;
 
 font-size:20px;
}
</style>  
<br><br><br><br><br><br><br>
<center><p3> Enter your login details to view licence status:</p3><br><br>
<div class="container">
<form action="user licence status.php" method="post">
    <p>
        <label for="username"><p4>Username:</p4></label>
        <input type="text" name="username" id="Username">
    </p>
    
    <p>
        <label for="password"><p4>Password:</p4></label>
        <input type="password" name="password" id="Password">
    </p>
   

   <input type="submit" value="Submit">
</form>
</div>
</center>
<?php }?>
</body>
</html>