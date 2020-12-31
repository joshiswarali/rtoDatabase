<?php

// check if the form has been submitted and display the results
if (isset($_POST['user'])) {

  define('DB_NAME', 'testswarali');
  define('DB_USER', 'root');
  define('DB_PASSWORD', '');
  define('DB_HOST', 'localhost');

  $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  if (!$conn) {
    die('Could not connect: ' . mysqli_connect_error());
  }

  // escape the post data to prevent injection attacks
  $studentnum = mysqli_real_escape_string($conn, $_POST['user']);

  $sql = "SELECT * FROM person WHERE person_id LIKE '%$studentnum%'"; 
  $result=mysqli_query($conn, $sql);

  // check if the query returned a result
  if (!$result) {
      echo 'There are no results for your search';
  } else {
    // result to output the table
    echo '<table class="table table-striped table-bordered table-hover">'; 
    echo "<tr>
          <th>id</th>
          <th>first name</th>
          <th>last name</th>
          <th>email</th>
          
          </tr>"; 
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
      echo "<tr><td>"; 
      echo $row['person_id'];
      echo "</td><td>"; 
      echo $row['first_name'];
      echo "</td><td>";   
      echo $row['last_name'];
      echo "</td><td>"; 
      echo $row['email_address'];
      echo "</td><td>";   
     
    }
    echo "</table>";
  }

  mysqli_close($conn);
} // end submitted
else
{
// not submitted to output the form
?>
<form action="update1.php" method="post">
  <label>Enter id:</label>
  <input name="user" type="number" placeholder="Type Here">
  <br>
  <br>
  <input type="submit" value="Enter">
</form>
<?php
} // end not submitted
?>