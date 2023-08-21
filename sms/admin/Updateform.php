<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body background="https://paralegal.com.au/wp-content/uploads/2019/04/certificate-background-template-blue-copy-simple-powerpoint-templates-interest-p-16.jpg" align="center">
<?php

include('../db.php');
    
$sid = $_GET['sid'];

$sql = "SELECT * FROM `adda` WHERE `Id` = '$sid'";
$run = mysqli_query($con, $sql);
$data = mysqli_fetch_assoc($run);
?>
<br><br><br><br><br><br>
    <font size="11"><b>Welcome to Admin Dashboard</font>

<form method="post" action="Updatedata.php" enctype="multipart/form-data">
    <table align="center" border="2" style="width: 60%; margin-top: 40px;">
        <tr>
            <th align="center">Rollno:</th>
            <td><input type="text" name="rollno" value="<?php echo $data['rollno']; ?>"></td>
        </tr>
        <tr>
            <th align="center">Full Name :</th>
            <td><input type="text" name="name" value="<?php echo $data['name']; ?>"></td>
        </tr>
        <tr>
            <th align="center">City :</th>
            <td><input type="text" name="city" value="<?php echo $data['city']; ?>" required></td>
        </tr>
        <tr>
            <th align="center">Pcontact:</th>
            <td><input type="text" name="pcontact" value="<?php echo $data['pcontact']; ?>" required></td>
        </tr>
        <tr>
            <th align="center">Standard :</th>
            <td><input type="number" name="std" value="<?php echo $data['standard']; ?>" required></td>
        </tr>
        <tr>
            <th align="center">Image:</th>
            <td><input type="file" name="simg" value="<?php echo $data['image'];?>"required></td>
        </tr>
        <tr>
              <td> <input type="hidden" name="sid" value=<?php echo $data['Id'];?></td> 
            <td align="center" colspan="2"><input type="submit" name="submit" value="Submit"></td>
        </tr>
    </table>
</form>
</body>
</html>