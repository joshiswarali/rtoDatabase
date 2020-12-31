<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "rtodb");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if(!empty($_POST['name']))
{
// Escape user inputs for security
$name = mysqli_real_escape_string($link, $_POST['name']);
$dob = mysqli_real_escape_string($link, $_POST['dob']);
$sex = mysqli_real_escape_string($link, $_POST['sex']);
$address = mysqli_real_escape_string($link, $_POST['address']); 
$phoneno = mysqli_real_escape_string($link, $_POST['phoneno']);
$type = mysqli_real_escape_string($link, $_POST['licencetype']);
$username = mysqli_real_escape_string($link, $_POST['username']);
// attempt insert query execution
$sql = "INSERT INTO driver_licence (name, dob, sex, address, phoneno, type, username) VALUES ('$name', '$dob', '$sex', '$address', '$phoneno', '$type','$username')";
if(mysqli_query($link, $sql)){
    echo "Applied successfully";
     header( "refresh:2;url=user new permanent licence.html" );
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
     header( "refresh:2;url=user new permanent licence.html" );
}
 
// close connection
mysqli_close($link);
}
else
{
  echo "please enter all values.....";
  header( "refresh:2;url=user new permanent licence.html" );
}

 
?>