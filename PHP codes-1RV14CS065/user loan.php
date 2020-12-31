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
$licenceid = mysqli_real_escape_string($link, $_POST['licenceid']);
$loanid = mysqli_real_escape_string($link, $_POST['loanid']);
$amount = mysqli_real_escape_string($link, $_POST['amount']);
$period = mysqli_real_escape_string($link, $_POST['period']); 
$loanissuedate = mysqli_real_escape_string($link, $_POST['loanissuedate']);
$issuebank = mysqli_real_escape_string($link, $_POST['issuebank']);
// attempt insert query execution
$sql = "INSERT INTO driver_loan (licenceid, loanid, amount, period, loanissuedate, issuebank) VALUES ('$licenceid', '$loanid', '$amount', '$period', '$loanissuedate', '$issuebank')";
if(mysqli_query($link, $sql)){
    echo "<center>"."loan details entered"."</center>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>

</body>
</html>