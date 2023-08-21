<?php
$con = mysqli_connect('localhost', 'root', '', 'sms');

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rollno = $_POST['rollno'];
    $name = $_POST['name'];
    $city = $_POST['city'];
    $pcontact = $_POST['pcontact'];
    $std = $_POST['std'];
    $Id = $_POST['sid'];

    $imagename = $_FILES['simg']['name'];
    $tempname = $_FILES['simg']['tmp_name'];
    $folder = "../dataimg/" . $imagename;
    move_uploaded_file($tempname, $folder);

    $query = "UPDATE `adda` SET `rollno` = '$rollno', `name` = '$name', `city` = '$city', `pcontact` = '$pcontact', `standard` = '$std' WHERE `Id` = '$Id'";
    $run = mysqli_query($con, $query);

    if ($run) {
        echo '<script>
                alert("Data Updated Successfully.");
                window.open("Updateform.php?sid=' . $Id . '", "_self");
              </script>';
    } else {
        echo "Error updating data: " . mysqli_error($con);
    }

    mysqli_close($con);
}
?>