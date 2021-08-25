

<?php
session_start();
include('config.php');



if($_SERVER['REQUEST_METHOD'] == "POST")
{
 //Username and Password sent from Form
 $username = mysqli_real_escape_string($mysqli, $_POST['username']);
 $password = mysqli_real_escape_string($mysqli, $_POST['password']);
 $password_one = sha1($password);
 $sql = "SELECT * FROM registrationprocess WHERE Username ='$username' AND '$password_one'";
 $query = mysqli_query($mysqli, $sql);
 $row  = mysqli_fetch_array($query);


 //If result match $username and $password Table row must be 1 row
 if(mysqli_num_rows($query) > 0)

 {
   $_SESSION['username'] = $username;
    echo header("location: indexlogin.php");
 }
 else
 {
 echo "Invalid Username or Password";
 }
}
?>
