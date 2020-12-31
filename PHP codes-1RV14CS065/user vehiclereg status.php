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
         header('Refresh: 2;url=user vehiclereg status.php');
      }
else
{
$sql="SELECT vehicleregno, type, ownernumber, ownername, date, sex, address, username FROM vehicle_registration WHERE username IN (SELECT username FROM user_login WHERE username='$u' AND password='$p')";

$records=mysql_query($sql);


?>


<html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>View status of registration</title>
</head>
<body>
<p>Vehicle registration status:<p><br> 
<table width="1000" border="1" cellpadding="1" cellspacing="1">

<tr>
<th><p>Registration no.</p></th>
<th><p>Type</p></th>
<th><p>Owner number</p></th>
<th><p>Owner name</p></th>
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
     if(!empty($driver_licence['username']) && !empty($driver_licence['vehicleregno']) && $driver_licence['date']!='9999-12-31')  
   {
   echo"<tr>";
   echo"<td><p1>".$driver_licence['vehicleregno']."</p1></td>";
   echo"<td><p1>".$driver_licence['type']."</p1></td>";
   echo"<td><p1>".$driver_licence['ownernumber']."</p1></td>";
   echo"<td><p1>".$driver_licence['ownername']."</p1></td>";
   echo"<td><p1>".$driver_licence['date']."</p1></td>";
   echo"<td><p1>".$driver_licence['sex']."</p1></td>";
   echo"<td><p1>".$driver_licence['address']."</p1></td>";

   echo"</tr>";
   }
   
   else if(!empty($driver_licence['username']) && empty($driver_licence['vehicleregno']))
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


a.button {
    -webkit-appearance: button;
    -moz-appearance: button;
    appearance: button;
    width:100px;
    text-decoration: none;
    color: white;
    background:steelblue;
    font-family:Arial;
    font-weight:bold;
    font-size:18px;
    padding:10px;
}

input[type="submit"]{
    -webkit-appearance: button;
    -moz-appearance: button;
    appearance: button;
    width:300px;
    text-decoration: none;
    color: white;
    background:steelblue;
    font-family:Arial;
    font-weight:bold;
    font-size:18px;
    padding:10px;
}


</style>  
<br><br><br>
 <center><a href="rtousermainmenu.html" class="button">Main Menu</a><a href="rtostartpage.html" class="button">Logout</a></center><br><br><br><br>
<center><p3> Enter your login details to view registration status:</p3><br><br>
<div class="container">
<form action="user vehiclereg status.php" method="post">
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