<?php
mysql_connect('localhost', 'root', '') or die("Connection Failed");
mysql_select_db('rtodb')or die("Connection Failed");
$applno = $_POST['applno'];
$licenceid = $_POST['licenceid'];
$issuedate = $_POST['issuedate'];
$expirydate = $_POST['expirydate'];
$query = "UPDATE driver_licence SET licenceid = '$licenceid', issuedate='$issuedate', expirydate='$expirydate' WHERE applno = '$applno'";
if(mysql_query($query)){
echo "updated";}
else{
echo "fail";}
?>