<?php

// check if the form has been submitted and display the results
if (isset($_POST['licenceid'])) {

  define('DB_NAME', 'rtodb');
  define('DB_USER', 'root');
  define('DB_PASSWORD', '');
  define('DB_HOST', 'localhost');

  $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  if (!$conn) {
    die('Could not connect: ' . mysqli_connect_error());
  }

  // escape the post data to prevent injection attacks
  $licenceid = mysqli_real_escape_string($conn, $_POST['licenceid']);

  $sql = "SELECT * FROM driver_loan WHERE licenceid='$licenceid'"; 
  $result=mysqli_query($conn, $sql);

  // check if the query returned a result
  if (!$result) {
      echo 'Loan details not entered';
  } else {
    // result to output the table
    echo "<center>"."Loan details";
    echo '<table width="1000" border="1" cellpadding="1" cellspacing="1">';     
    echo "<tr>
          <th>Licence ID</th>
          <th>Loan ID</th>
          <th>Amount</th>
          <th>Period</th>
          <th>Loan issue date</th>
          <th>Issue bank</th>
          </tr>"; 
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
      echo "<tr><td>"; 
      echo $row['licenceid'];
      echo "</td><td>"; 
      echo $row['loanid'];
      echo "</td><td>";   
      echo $row['amount'];
      echo "</td><td>"; 
      echo $row['period'];
      echo "</td><td>"; 
      echo $row['loanissuedate'];
      echo "</td><td>"; 
      echo $row['issuebank'];
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

<style>

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
p4
{
 font-family:Arial;
 font-weight:bold;
 font-size:20px;
}

</style>
<br>
<br>
<br>
<center>
  <center><a href="rtousermainmenu.html" class="button">Main Menu</a><a href="rtostartpage.html" class="button">Logout</a></center>
  <br><br><br>
<form action="user loan view.php" method="post">
  <label><p4>Enter registration number:</p4></label>
  <input name="licenceid" type="text" placeholder="Type Here">
  <br>
  <br>
  <input type="submit" value="Enter">
</form>
<?php
} // end not submitted
?>