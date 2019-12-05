<?php include "templates/header.php"; ?>
 
        <!-- Table Heading -->
        <h5>Company Staff</h5>
        <!-- Control Buttons -->
        <a href="add.php"><button class="button-primary">Add Member</button></a>
        <button>Update Member</button>
        <button>Delete Member</button>
        <!-- Main Table -->
        <table class="u-full-width">
                <thead>
                  <tr>
                    <th>Full Name</th>
                    <th>Address</th>
                    <th>Gender</th>
                    <th>Position</th>
                    <th>Salary</th>
                    <th>Holidays Remaining</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Dave Gamache</td>
                    <td>Essex</td>
                    <td>Male</td>
                    <td>Class 2 Driver</td>
                    <td>£28,000</td>
                    <td>5</td>
                  </tr>
                  <tr>
                    <td>Dwayne Johnson</td>
                    <td>Essex</td>
                    <td>Male</td>
                    <td>Class 1 Driver</td>
                    <td>£35,000</td>
                    <td>20</td>
                  </tr>
                </tbody>
              </table>

    </div>
<?php include "templates/footer.php"; ?>