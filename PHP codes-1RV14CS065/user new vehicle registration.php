<html>
<body>
<style type="text/css">
p
{
  font-family:Arial
  font-size:20px
  font-weight:bold
} 
</style>
<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "rtodb");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security
$ownername = mysqli_real_escape_string($link, $_POST['ownername']);
$ownernumber = mysqli_real_escape_string($link, $_POST['ownernumber']);
$owneraddress = mysqli_real_escape_string($link, $_POST['owneraddress']);
$ownersex = mysqli_real_escape_string($link, $_POST['ownersex']); 
$type = mysqli_real_escape_string($link, $_POST['type']);
$username = mysqli_real_escape_string($link, $_POST['username']);
// attempt insert query execution
$sql = "INSERT INTO vehicle_registration (ownername, ownernumber, address, sex, type, username) VALUES ('$ownername', '$ownernumber', '$owneraddress', '$ownersex', '$type', '$username')";
if(mysqli_query($link, $sql)){
    echo "<center>"."Successfully applied for registration!"."</center>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>

</body>
</html>