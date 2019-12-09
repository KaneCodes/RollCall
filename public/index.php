<?php 

// Includes & Requirements
include "templates/header.php"; 
require "../config/database.php";

try {
  // Connect to database
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
<a href="padd.php"><button class="button-primary">Add Member</button></a>
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
              echo "<td><a href='edit.php?id={$id}'><button>Edit</button></a></td>";
              echo "<td><button onclick='deleteStaff({$id});'>Delete</button></td>";
            echo "</tr>";
          }
        }

        $action = isset($_GET['action']) ? $_GET['action'] : "";

        if($action=='deleted') {
          echo "<h5>Record Deleted</h5>";
        }


        ?>
      </tbody>
    </table>
  </div>

<?php include "templates/footer.php"; ?>