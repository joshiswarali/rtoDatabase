<?php
mysql_connect('localhost', 'root', '') or die("Connection Failed");
mysql_select_db('testswarali')or die("Connection Failed");
$user = $_POST['user'];
$password = $_POST['userpassword'];
$query = "UPDATE person SET first_name = '$password' WHERE person_id = '$user'";
if(mysql_query($query)){
echo "updated";}
else{
echo "fail";}
?>