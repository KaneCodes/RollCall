<?php include "templates/header.php" ?>
<?php 

// Requirements
require "config/database.php";

// Check POST variable
if(isset($_POST['submit'])) {
  try {
    // Connect to database
    $connect = new PDO($dsn, $username, $password, $options);
    // Staff member details
    $staff =[
      "id"        => $_POST['id'],
      "firstName" => $_POST['firstName'],
      "lastName"  => $_POST['lastName'],
      "address"   => $_POST['address'],
      "gender"    => $_POST['gender'],
      "salary"    => $_POST['salary'],
      "holidays"  => $_POST['holidays']
    ];
    // Query to database
    $sql = "UPDATE staff SET 
            id = :id,
            firstName = :firstName,
            lastName = :lastName,
            address = :address,
            gender = :gender,
            salary = :salary,
            holidays = :holidays
            WHERE id = :id";

    //Prepare statement
    $statement = $connect->prepare($sql);
    // Execute statement
    $statement->execute($staff);

  }
  // Display error message
  catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
}

// Check ID set
if (isset($_GET['id'])) {
    try {
      // Connect to database
      $connect = new PDO($dsn, $username, $password, $options);
      // Set ID to variable
      $id = $_GET['id'];
      // Query to database
      $sql = "SELECT * FROM staff WHERE id = :id";
      // Prepare statement
      $statement = $connect->prepare($sql);
      // Bind value
      $statement->bindValue(':id', $id);
      // Execute statement
      $statement->execute();
      // Set results to member variable
      $member = $statement->fetch(PDO::FETCH_ASSOC);
      // Bind results
      $firstName = $member['firstName'];
      $lastName = $member['lastName'];
      $address = $member['address'];
      $gender = $member['gender'];
      $salary = $member['salary'];
      $holidays = $member['holidays'];
    } 
    // Display Error
    catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
  } else {
      echo "Something went wrong!";
      exit;
  }




?>
<!-- Page Heading -->
<?php echo "<h5>Edit Staff Member - {$firstName} " . " {$lastName}</h5>"; ?>

<!-- Edit Staff Member form -->
<form method="post">
    <!-- ID -->
    <label for="ID">Staff Member ID</label>
    <input type="text" name="id" id="id" value="<?php echo "{$id}"?>"">
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

<?php include "templates/footer.php" ?>