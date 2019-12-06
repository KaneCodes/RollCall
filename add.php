<?php require "templates/header.php"; ?>

<h5>Add Staff Member</h5>

  <!-- Add Member form -->
  <form method="post">
    <!-- First Name -->
    <label for="firstName">First Name</label>
    <input type="text" name="firstName" id="firstName">
    <!-- Last Name -->
    <label for="lastName">Last Name</label>
    <input type="text" name="lasttName" id="lastName">
    <!-- Address -->
    <label for="address">Address</label>
    <input type="text" name="address" id="address">
    <!-- Gender -->
    <label for="gender">Gender</label>
        <select id="gender">
            <option value="Option 1">Male</option>
            <option value="Option 2">Female</option>
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
    <input class="button-primary" type="submit" value="Submit">
    <br>
    <a href="index.php">Return To Dashboard</a>
</form>




<?php require "templates/footer.php"; ?>