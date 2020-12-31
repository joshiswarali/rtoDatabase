<html>
<body>
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
$newpassword=mysqli_real_escape_string($link, $_POST['newpassword']);

// attempt insert query execution

$sql="SELECT password from admin_login WHERE username='$username'";
$result=mysqli_query($link, $sql);
if($result==false)
   echo"incorrect username";

 while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
      if($password==$row['password'])
         {
           $sql1="UPDATE admin_login SET password='$newpassword' WHERE username='$username' AND password='$password'";
           $result1=mysqli_query($link,$sql1);
           if($result1==false)
            echo "something went wrong!";
           else
            echo "password updated successfully";
          }
       else
        echo"incorrect username or password";

    }
     
  
 
// close connection
mysqli_close($link);
?>
</body>
</html>