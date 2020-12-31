<?php

// check if the form has been submitted and display the results
if (!empty($_POST['vehicleregno'])) {

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

  $sql = "SELECT * FROM vehicle_registration WHERE vehicleregno='$vehicleregno'"; 
  $result=mysqli_query($conn, $sql);

  // check if the query returned a result
  if (!$result) {
      echo 'There are no results for your search';
  } 
   

      else {
    // result to output the table
    echo "<center>"."<p1>Registration Details</p1>";
    echo '<table width="1000" border="1" cellpadding="1" cellspacing="1">';     
    echo "<tr>
          <th>Registration number</th>
          <th>Registration date</th>
          <th>Owner name</th>
          <th>Phone no.</th>
          <th>Sex</th>
          <th>Address</th>
          </tr>"; 

    
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
      echo "<tr><td>"; 
      echo $row['vehicleregno'];
      echo "</td><td>"; 
      echo $row['date'];
      echo "</td><td>";   
      echo $row['ownername'];
      echo "</td><td>"; 
      echo $row['ownernumber'];
      echo "</td><td>"; 
      echo $row['sex'];
      echo "</td><td>"; 
      echo $row['address'];
      echo "</td></tr></center>";       
     
    }
    echo "</table>";
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
  font-size: 20px;
  font-weight:bold;
  font-family:Arial;
}

p2
{
  font-size: 35px;
  font-weight:bold;
  font-family:Arial;
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
<br>
<br>
<br>
<center>
  <center><a href="rtousermainmenu.html" class="button">Main Menu</a><a href="rtostartpage.html" class="button">Logout</a></center>
  <br><br><br><p2>Enter registration details</p2><br><br><br>
 </center>
 <br>
 <center><form action="user view details of vehicle.php" method="post">
  <label><p1>Enter registration number:</p1></label>
  <input name="vehicleregno" type="text" placeholder="Type Here">
  <br>
  <br>
  <input type="submit" value="Enter">
</form></center>
<?php
} // end not submitted
?>