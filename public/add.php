<?php 

// Includes & Requirements
include "templates/header.php"; 
require "../config/database.php";

if(isset($_POST['submit'])) {
    
    try {
        // Connect to database
        $connect = new PDO($dsn, $username, $password, $options);

        // Sql query
        $sql = "INSERT INTO staff SET firstName=:firstName, lastName=:lastName, address=:address, position=:position,
        gender=:gender, salary=:salary, holidays=:holidays";

        // Prepare query for execution
        $statement = $connect->prepare($sql);

        // Posted Values
        $firstName=htmlspecialchars(strip_tags($_POST['firstName']));
        $lastName=htmlspecialchars(strip_tags($_POST['lastName']));
        $address=htmlspecialchars(strip_tags($_POST['address']));
        $position=htmlspecialchars(strip_tags($_POST['position']));
        $gender=htmlspecialchars(strip_tags($_POST['gender']));
        $salary=htmlspecialchars(strip_tags($_POST['salary']));
        $holidays=htmlspecialchars(strip_tags($_POST['holidays']));

        // Bind the parameters
        $statement->bindParam(':firstName', $firstName);
        $statement->bindParam(':lastName', $lastName);
        $statement->bindParam(':address', $address);
        $statement->bindParam(':position', $position);
        $statement->bindParam(':gender', $gender);
        $statement->bindParam(':salary', $salary);
        $statement->bindParam(':holidays', $holidays);

        // Execute the query
        if($statement->execute()){
            echo "<h5> Success </h5>";
        }else{
            echo "<h5> Error </h5>";
        }
        
      // Display Error   
    } catch(PDOException $exception){
        die('ERROR: ' . $exception->getMessage());
    }
}
?>
<h5>Add Staff Member</h5>

  <!-- Add Member form -->
  <form method="post">
    <!-- First Name -->
    <label for="firstName">First Name</label>
    <input type="text" name="firstName" id="firstName">
    <!-- Last Name -->
    <label for="lastName">Last Name</label>
    <input type="text" name="lastName" id="lastName">
    <!-- Address -->
    <label for="address">Address</label>
    <input type="text" name="address" id="address">
    <!-- Gender -->
    <label for="gender">Gender</label>
        <select name="gender" id="gender">
            <option name="gender" id="gender" value="Male">Male</option>
            <option name="gender" id="gender" value="Female">Female</option>
        </select>
    <!-- Position -->
    <label for="position">Position</label>
    <input type="text" name="position" id="position">
    <!-- Salery -->
    <label for="salary">Salary</label>
    <input type="text" name="salary" id="salary">
    <!-- Holidays Remaining -->
    <label for="holidays">Holidays Remaining</label>
    <input type="text" name="holidays" id="holidays">
    <br>
    <!-- Submit Button -->
    <input class="button-primary" type="submit" value="Submit" name="submit">
    <br>
    <a href="index.php">Return To Dashboard</a>
</form>

<?php require "templates/footer.php"; ?>