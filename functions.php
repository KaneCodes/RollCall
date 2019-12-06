<?php 

function displayData() {
    try {
        // Requirements
        require "../connect/config.php";
        require "../connect/common.php";
        // Connect to databse
        $connection = new PDO($dsn, $username, $password, $options);
        // SQL Query 
        $sql = "SELECT FROM staff";
        // Prepare and excute query
        $statement = $connection->prepare($sql);
        $statement->execute();
        // Catch errors
    }   catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}



?>