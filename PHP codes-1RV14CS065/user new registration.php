
<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "rtodb");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$username = mysqli_real_escape_string($link, $_POST['username']);
$password = mysqli_real_escape_string($link, $_POST['password']);


// attempt insert query execution

$sql = "INSERT INTO user_login (username, password) VALUES ('$username', '$password')";
if(mysqli_query($link, $sql)){
    echo "Registration successful";
} else{
    echo "<center>"."email already in use, please select another"."</center>";
}
 
// close connection
mysqli_close($link);
?>

