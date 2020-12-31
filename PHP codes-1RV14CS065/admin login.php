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


// attempt insert query execution

$sql="SELECT username,password from admin_login WHERE username='$username' AND password='$password'";
$result=mysqli_query($link, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
if(!empty($row['username']) && !empty($row['password']))
      {
         header('Location: /rtoadminmainmenu.html');
      }
else
  {echo "incorrect username or password";
  header('Refresh: 2;url=admin login.html');
      }
      
/*else
{
    if($row = mysqli_fetch_array($result, MYSQLI_ASSOC)==false)
        echo "error";
   else
 {
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    { 
       
      if($username==$row['username'] && $password==$row['password'])
        header('Location: /rtousermainmenu.html');
       else
        echo"incorrect username or password";

    }
 }
}
*/     
 
 
// close connection
mysqli_close($link);
?>
</body>
</html>