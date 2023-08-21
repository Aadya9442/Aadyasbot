<!DOCTYPE html>
<html>
<head>
<style>
  table {
    background-color: white;
    margin-top: 10px;
  }
  th, td {
    padding: 5px;
  }
</style>
</head>
<body background="https://paralegal.com.au/wp-content/uploads/2019/04/certificate-background-template-blue-copy-simple-powerpoint-templates-interest-p-16.jpg" align="center">
<br><br><br><br><br>
<font size="11"><b>Welcome to Admin Dashboard</font>
<br><br><br><br>
<table align="center">
  <form action="Update.php" method="post">
    <tr style="background-color:#00008b; color:#fff;">
       <th>ENTER STANDARD</th>
       <td><input type="number" name="standard" required/></td>
       <th>ENTER STUDENT NAME</th>
       <td><input type="text" name="stuname" required/></td>
       <td colspan="2"><input type="submit" name="submit" value="Search"/></td>
    </tr>
  </form>
</table>
<br><br><br>
<table align="center" width="80%" border="1">
  <tr style="background-color:#00008b; color:#fff;">
     <th>no.</th>
     <th>Name</th>
     <th>Standard</th>
     <th>Edit</th>
  </tr>
  <?php
    if(isset($_POST['submit']))
    {  
      $standard = $_POST['standard'];
      $name = $_POST['stuname'];

      // Establish a database connection
      $connection = mysqli_connect("localhost", "root", "", "sms");

      // Check if the connection was successful
      if (!$connection) {
          die("Connection failed: " . mysqli_connect_error());
      }

      // Execute your database query
      $query = "SELECT * FROM `adda` WHERE `standard` = '$standard' AND `name` LIKE '%$name%'";
      $result = mysqli_query($connection, $query);

      // Check if the query was executed successfully
      if ($result) {
          $count = 0;
          while ($data = mysqli_fetch_assoc($result)) {
              $count++;
              echo "<tr>";
              echo "<td>" . $count . "</td>";
              echo "<td>" . $data['name'] . "</td>";
              echo "<td>" . $data['standard'] . "</td>";
              echo "<td><a href='Updateform.php?sid=" . $data['Id'] . "'>EDIT</a></td>";
              echo "</tr>";
          }
          if ($count === 0) {
              echo "<tr><td colspan='4'>No record found</td></tr>";
          }
      } else {
          echo "Query failed: " . mysqli_error($connection);
      }

      // Close the database connection
      mysqli_close($connection);
    }
  ?>
</table>
</body>
</html>