<?php
session_start();
include "conn.php";
if (isset($_SESSION['username'])){
    header("location: welcome.php");
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h3>Login User</h3>

    <form action="<?php $_SERVER=["PHP_SELF"] ?>" method="post">
        <label for="">Username:
            <input type="text" name="username" id="username">
        </label><br><br>
        <label for="">Password:
            <input type="password" name="passwor" id="password">
        </label><br><br>

        <input type="submit" value="Login" name="login">
    </form>
    <p>Don't have an Account? <a href="register.php">Register Now</a></p>

    <?php
session_start();
include("conn.php");

if (isset($_POST['login'])) {

    $username = mysqli_escape_string($conn, $_POST['username']);
    $password = md5($_POST['passwor']); // Corrected 'passwor' to 'password'

    $sql = "SELECT * FROM user WHERE username = '{$username}' AND passwor = '{$password}'"; // Corrected 'passwor' to 'password'
    $result = mysqli_query($conn, $sql) or die("Query Failed");

    if(mysqli_num_rows($result) > 0){ // Corrected the condition
        while($row = mysqli_fetch_assoc($result)){
            $_SESSION['username'] = $row['username']; 
            $_SESSION['id'] = $row['id'];
            $_SESSION['user_role'] = $row['role'];
            header("location: welcome.php");
        }
    } else {
        echo "Invalid Username or Password";
    }
}

?>
</body>
</html>