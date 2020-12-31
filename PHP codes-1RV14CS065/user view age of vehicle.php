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

  $sql = "SELECT * FROM vehicle_registration WHERE vehicleregno='$vehicleregno'"; 
  $result=mysqli_query($conn, $sql);

  // check if the query returned a result
  if (!$result) {
      echo 'There are no results for your search';
  } else {
    // result to output the table
    echo "<center>"."Registration Details";
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
<form action="user view details of vehicle.php" method="post">
  <label>Enter registration number:</label>
  <input name="vehicleregno" type="text" placeholder="Type Here">
  <br>
  <br>
  <input type="submit" value="Enter">
</form>
<?php
} // end not submitted
?>