<?php
mysql_connect('localhost', 'root', '') or die("Connection Failed");
mysql_select_db('rtodb')or die("Connection Failed");

$vehicleregno = $_POST['vehicleregno'];
$permitid = $_POST['permitid'];
$issuedate = $_POST['issuedate'];
$query = "UPDATE permit SET permitid = '$permitid', issuedate='$issuedate' WHERE vehicleregno = '$vehicleregno'";
if(mysql_query($query)){
echo "updated";}
else{
echo "fail";}
?>