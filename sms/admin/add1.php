<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body background="https://paralegal.com.au/wp-content/uploads/2019/04/certificate-background-template-blue-copy-simple-powerpoint-templates-interest-p-16.jpg" align="center">
<br><br><br><br>
        <font size="11"><b>Welcome to Admin Dashboard</font>
    <br><br><br>
        <form method="post" action="add1.php" enctype="multipart/form-data">
           <table align="center" border="2" style="width:60%;">
                <tr><th align="center">Rollno:</th><td> <input type="text" name="rollno" placeholder="ENTER YOUR ROLLNO"></td></tr>
                <tr><th align="center">Full Name :</th><td>  <input type="text" name="name" placeholder="ENTER YOUR NAME"></td></tr>
                <tr><th align="center">City : </th><td> <input type="text" name="city" placeholder=" ENTER YOUR CITY"></td></td></tr>
                 <tr><th align="center">Pcontact:</th><td>  <input type="text" name="pcontact" placeholder="ENTER YOUR PCONTACT "></td></tr>
                 <tr><th align="center">Standard :</th><td>  <input type="number" name="std" placeholder="ENTER YOUR STANDARD "></td></tr>
                <tr><td align="center">Image:</th><td>  <input type="file" name="simg"></td></tr>
                <tr><td align="center"><input type="submit" value="Submit" name="submit"></td></tr>
            </table>
        </form>
</body>
</html>

<?php
if(isset($_POST['submit'])){
    // Form processing...
    $con = mysqli_connect('localhost','root','','sms');

    $rollno = $_POST['rollno'];
    $name = $_POST['name'];
    $city = $_POST['city'];
    $pcontact = $_POST['pcontact'];
    $std = $_POST['std'];

    $imagename = $_FILES['simg']['name'];
    $tempname = $_FILES['simg']['tmp_name'];
    $folder = "../dataimg/".$imagename;
    move_uploaded_file($tempname, $folder); // Missing semicolon

    $query = "INSERT INTO `adda`(`rollno`, `name`, `city`, `pcontact`, `standard`, `image`) VALUES ('$rollno','$name','$city','$pcontact','$std','$imagename')";
    $run = mysqli_query($con, $query);
}
?>