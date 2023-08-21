<!DOCTYPE HTML>
<html>
<head>    
    <title>STUDENT MANAGEMENT SYSTEM</title>
</head>
<body background="https://paralegal.com.au/wp-content/uploads/2019/04/certificate-background-template-blue-copy-simple-powerpoint-templates-interest-p-16.jpg" align="center"><br/><br/><br/><br/>
<h3 align="right" style="margin-right:20px;"><a href="login.php"><b>
Admin Login</a></h3>
<font size="7"><u><b>Welcome to Student Management System</u></font>
<form method="post" action="ind.php">
<table border="2" align="center" style="width:60%; margin-top:80px;" bgcolor="white">
   <tr>  
      <td colspan="2" align="center">Student Information</td>
   </tr>
   <tr>
       <td align="left">Choose Standard</td>
       <td>
            <select name="std">
               <option value="1">1st</option>
               <option value="2">2nd</option>
                  <option value="3">3rd</option>
               <option value="4">4th</option>
              <option value="5">5th</option>
               <option value="6">6th</option>
               <option value="7">7th</option>
               <option value="8">8th</option>
               <option value="9">9th</option>
               <option value="10">10th</option>
                <option value="11">11th</option>
               <option value="12">12th</option>
               
            </select>
        </td>
   </tr>
   <tr> 
       <td align="left">Enter Rollno</td>
       <td><input type="text" name="rollno" required></td>
   </tr>
   <tr>
      <td colspan="2" align="center"><input type="submit" name="submit" value="Show Info"></td>
   </tr>
</table>
</form>
</body>
</html>


<?php
if(isset($_POST['submit'])) {
    $standard = $_POST['std'];
    $rollno = $_POST['rollno'];

    $con = mysqli_connect('localhost','root','','sms');

    if ($con === false) {
        die("Error: Could not connect. " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM `adda` WHERE `standard`='$standard' AND `rollno`='$rollno'";
    $run = mysqli_query($con, $sql);

    if (!$run) {
        die("Query failed: " . mysqli_error($con));
    }

    if (mysqli_num_rows($run) > 0) {
        $data = mysqli_fetch_assoc($run);
        ?>
        <table border="2" style="width:50%;  margin-top:60px;" align="center" bgcolor="white">
            <tr>
                <th colspan="3">Student Details</th>
            </tr>
            <tr>
                <td rowspan="5"><img src="dataimg/<?php echo $data['image']; ?>" style="max-height:150px; max-width:120px;"/></td>
                <th>Roll no</th>
                <td><?php echo $data['rollno']; ?></td>
            </tr>
            <tr>
                <th>Name</th>
                <td><?php echo $data['name']; ?></td>
            </tr>
            <tr>
                <th>Standard</th>
                <td><?php echo $data['standard']; ?></td>
            </tr>
            <tr>
                <th>Parents contact No.</th>
                <td><?php echo $data['pcontact']; ?></td>
            </tr>
            <tr>
                <th>City</th>
                <td><?php echo $data['city']; ?></td>
            </tr>
        </table>

        <?php
    } else {
        echo "<script>alert('NO Student Found.');</script>";
    }

    mysqli_close($con);
}
?>

