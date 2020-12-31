<?php
mysql_connect('localhost', 'root', '') or die("Connection Failed");
mysql_select_db('rtodb')or die("Connection Failed");
$vehicleregno = $_POST['vehicleregno'];
$masterpassid = $_POST['masterpassid'];
$issuedate = $_POST['issuedate'];
$expirydate = $_POST['expirydate'];
$query = "UPDATE masterpass SET masterpassid = '$masterpassid', issuedate='$issuedate', expirydate='$expirydate' WHERE vehicleregno = '$vehicleregno'";
if(mysql_query($query)){
echo "updated";}
else{
echo "fail";}
?>