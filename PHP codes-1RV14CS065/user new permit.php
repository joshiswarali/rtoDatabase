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
$vehicleregno = mysqli_real_escape_string($link, $_POST['vehicleregno']);
$region = mysqli_real_escape_string($link, $_POST['region']);

// attempt insert query execution
$sql = "INSERT INTO permit (vehicleregno, region) VALUES ('$vehicleregno', '$region')";
if(mysqli_query($link, $sql)){
    echo "<center>"."applied for new permit"."</center>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>

</body>
</html>