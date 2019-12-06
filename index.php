<?php 
// Requirements & Includes
include "templates/header.php";
require 'config/database.php';
require 'functions.php';

// Connect to database
try {
  $connect = new PDO($dsn, $username, $password, $options);
}
// Error Message
catch(PDOException $exception){
  echo "Connection error: " . $exception->getMessage();
}

// Select all results
$query = "SELECT * FROM staff";
// Prepare statement
$statement = $connect->prepare($query);
// Execute statement
$statement->execute();
// Get number of rows
$num = $statement->rowCount();

?>

<!-- Table Heading -->
<h5>Company Staff</h5>
<!-- Add Member -->
<a href="add.php"><button class="button-primary">Add Member</button></a>
<!-- Main Table -->
<table class="u-full-width">
      <thead>
        <tr>
          <th>Full Name</th>
          <th>Address</th>
          <th>Gender</th>
          <th>Position</th>
          <th>Salary</th>
          <th>Holidays</th>
          <th>     </th>
          <th>     </th>
        </tr>
      </thead>
      <tbody>
        <tr>
        <?php
        //Check if more than 0 records found
        if($num>0){
        
          while ($row = $statement->fetch(PDO::FETCH_ASSOC)){
            // Extract Rows
            extract($row);
            // Insert data into table
            echo "<tr>";
              echo "<td>{$firstName} " .  "{$lastName}</td>";
              echo "<td>{$address}</td>";
              echo "<td>{$gender}</td>";
              echo "<td>{$position}</td>";
              echo "<td>{$salary}</td>";
              echo "<td>{$holidays}</td>";
              echo "<td><button>Update</button></td>";
              echo "<td><button>Delete</button></td>";
            echo "</tr>";
          }
        }
        ?>
      </tbody>
    </table>
  </div>

<?php include "templates/footer.php"; ?>