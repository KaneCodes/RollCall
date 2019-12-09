<?php 

// Includes & Requirements
include "templates/header.php"; 
require "../config/database.php";

try {
    // Connect to database
    $connect = new PDO($dsn, $username, $password, $options);
    // Get record ID
    $id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found');

    //  Delete query
    $sql = "DELETE FROM staff WHERE id = ?";
    
    // Prepare statement
    $statement = $connect->prepare($sql);

    // Bind parameter
    $statement->bindParam(1, $id);

    // Check if executed
    if($statement->execute()){
        header('Location: index.php?action=deleted');
    } else {
        die('Unable to delete record');
    }
}

// Display error message
catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }

?>

<?php include "../templates/footer.php" ?>