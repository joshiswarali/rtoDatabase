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
if(!empty($_POST['name']))
{
$name = mysqli_real_escape_string($link, $_POST['name']);
$dob = mysqli_real_escape_string($link, $_POST['dob']);
$sex = mysqli_real_escape_string($link, $_POST['sex']);
$address = mysqli_real_escape_string($link, $_POST['address']); 
$phoneno = mysqli_real_escape_string($link, $_POST['phoneno']);
$type = mysqli_real_escape_string($link, $_POST['licencetype']);
$username = mysqli_real_escape_string($link, $_POST['username']);
// attempt insert query execution
$sql = "INSERT INTO driver_licence (name, dob, sex, address, phoneno, type, username) VALUES ('$name', '$dob', '$sex', '$address', '$phoneno', '$type', '$username')";
if(mysqli_query($link, $sql))
    {echo "<center>"."Successfully applied for licence!"."</center>";
      header( "refresh:2;url=user new learners licence.html" );
     } 

else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
     header( "refresh:2;url=user new learners licence.html" );
    }
 
// close connection
mysqli_close($link);
}

else
{
  echo "please enter all values.....";
  header( "refresh:2;url=user new learners licence.html" );
}
?>

</body>
</html>