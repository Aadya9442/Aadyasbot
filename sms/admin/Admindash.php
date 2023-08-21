<html>
<head>
<body background="https://paralegal.com.au/wp-content/uploads/2019/04/certificate-background-template-blue-copy-simple-powerpoint-templates-interest-p-16.jpg" align="center">
<?php
  session_start();
    if($_SESSION['uid'])
     {
       echo " ";
      }
  else
     {
       header('location :../login.php');
     }
?>  
<?php
  include('header.php');
?>
<br><br><br><br><br><br><br><br>

   <font size="11"><b>Welcome to Admin Dashboard</font>
<h4><a href="logout.php" style="float:right; margin-right:30px; color:black; font-size:20px;">Logout</a></h4>

<br><br><br><br>
   <table align="center">
      <tr>
          <td><li><ul</ul></li></td><td><a href="add1.php ">Insert Student Details</a></td>
      </tr><br>
     <tr>
          <td><li><ul</ul></li></td><td><a href="Update.php">Update Student Details</a></td>
      </tr>

</table>
</body>
</html>