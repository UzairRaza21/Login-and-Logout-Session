<?php
session_start();
include("conn.php");

if (isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['passwor'];

    $sql = "SELECT * FROM user WHERE username = '$username' AND passwor = '$password'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if ($count == 1){
        $_SESSION['username'] = $username;
        header("location: welcome.php");
    }else{
        echo "Invalid Username or Password";
    }
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

    <form action="" method="post">
        <label for="">Username:
            <input type="text" name="username" id="username">
        </label><br><br>
        <label for="">Password:
            <input type="password" name="passwor" id="password">
        </label><br><br>

        <input type="submit" value="Login" name="login">
    </form>
    <p>Don't have an Account? <a href="register.php">Register Now</a></p>
</body>
</html>