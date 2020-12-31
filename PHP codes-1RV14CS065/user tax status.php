<?php

// check if the form has been submitted and display the results
if (isset($_POST['vehicleregno'])) {

  define('DB_NAME', 'rtodb');
  define('DB_USER', 'root');
  define('DB_PASSWORD', '');
  define('DB_HOST', 'localhost');

  $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  if (!$conn) {
    die('Could not connect: ' . mysqli_connect_error());
  }

  // escape the post data to prevent injection attacks
  $vehicleregno = mysqli_real_escape_string($conn, $_POST['vehicleregno']);

  $sql = "SELECT * FROM vehicle_tax WHERE vehicleregno='$vehicleregno'"; 
  $result=mysqli_query($conn, $sql);
  $today="2016-11-29";
  // check if the query returned a result
  if (!$result) {
      echo 'Tax not paid';
  } else {
    // result to output the table


  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
    if($row['paiddate'])
   {   
      $date=$row['paiddate'];
      
      if(strcmp($date,$today)<=0)
       { 
       
echo"<table width='1000' border='1' cellpadding='1' cellspacing='1'>";

echo"<tr>";
echo"<th><p>"."Registration No."."</p></th>";
echo"<th><p>"."Type"."</p></th>";
echo"<th><p>"."Challan No."."</p></th>";
echo"<th><p>"."Amount"."</p></th>";
echo"<th><p>"."Paid Date"."</p></th>";

echo"</tr>";   

   echo"<tr>";
    
   echo"<td><p1>".$row['vehicleregno']."</p1></td>";
   echo"<td><p1>".$row['type']."</p1></td>";
   echo"<td><p1>".$row['challanno']."</p1></td>";
   echo"<td><p1>".$row['amount']."</p1></td>";
   echo"<td><p1>".$row['paiddate']."</p1></td>";
   echo"</tr>";
    echo"</table>";
    echo "paid"; 
    }       
     
       
   
  }

   else
   echo "<center>"."<p3>tax not paid</p3>"."</center>";
}
  mysqli_close($conn);
} // end submitted
else
{
// not submitted to output the form
?>
<style type="text/css">
p1
{
 font-family:Arial;
}

p2
{
 font-family:Arial;
 font-size:20px;
}

p3
{
 font-family:Arial;
 font-size:30px;
 font-weight:bold;
}

a.button {
    -webkit-appearance: button;
    -moz-appearance: button;
    appearance: button;
    width:100px;
    text-decoration: none;
    color: white;
    background:steelblue;
    font-family:Arial;
    font-weight:bold;
    font-size:18px;
    padding:10px;
}

input[type="submit"]{
    -webkit-appearance: button;
    -moz-appearance: button;
    appearance: button;
    width:300px;
    text-decoration: none;
    color: white;
    background:steelblue;
    font-family:Arial;
    font-weight:bold;
    font-size:18px;
    padding:10px;
}


</style>
<br><br><br><br>
<br>
<br>
<center>
  <center><a href="rtousermainmenu.html" class="button">Main Menu</a><a href="rtostartpage.html" class="button">Logout</a></center>
  <br><br><br>
<center><p3>View Tax Status</p3></center>
<br><br><br><br><br><br><center><form action="user tax status.php" method="post">
  <label><p2>Enter registration number:<p2></label>
  <input name="vehicleregno" type="text" placeholder="Type Here">
  <br>
  <br>
  <input type="submit" value="Enter">
</form></center>
<?php
} // end not submitted
?>