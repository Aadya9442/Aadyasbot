<?
session_start();
if(isset($_SESSION['uid']))
{
  header('location:admin/Admindash.php');
}
?>
<html>
<head>
  <title>Admin Login</title>
</head>
<body background=" https://paralegal.com.au/wp-content/uploads/2019/04/certificate-background-template-blue-copy-simple-powerpoint-templates-interest-p-16.jpg" align="center">
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/></br>
   <h1 align="center">ADMIN LOGIN</h1><br/>
  <form action="login.php" method="post">
   <table align="center" border="3" >
    <tr>
        <td>Username</td><td><input type="text" name="uname" required></td>
    </tr>
    <tr>
        <td>Password</td><td><input type="password" name="pass" required></td>
    </tr>
    <tr>
        <td colspan="2" align="center"><input type="submit" name="login" value="login"></td>
    </tr>
   </table>
  </form>
</body>
</html>
<?php
  include('db.php');
  if(isset($_POST['login']))
  {
    $username = $_POST['uname'];
    $password = $_POST['pass'];
  
    $qry = "SELECT * FROM `admin` WHERE `username` = '$username' AND `password` = '$password' ";
    $run = mysqli_query($con, $qry);
    $row = mysqli_num_rows($run);
    if($row < 1)
    { 
      ?>
      <script>
        alert('Username or Password not match!!');
        window.open('login.php','_self');
      </script>
      <?php
    }
    else
    {
      $data = mysqli_fetch_assoc($run);
      $id = $data['id'];
      session_start();
      $_SESSION['uid']=$id;
     header('location:admin/admindash.php');

    }
  }
?>