<?php
include("conn.php");
if (isset($_POST['register'])){

    if($_POST['passwor'] != $_POST['cpassword']){
        echo "Please enter same password";
    }else{
        $username = $_POST['username'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $password = $_POST['passwor'];
        $cpassword = $_POST['cpassword'];

        $sql = "INSERT INTO `user`(`username`, `fullname`, `email`, `passwor`, `cpassword`) VALUES ('{$username}','{$fullname}','{$email}','{$password}','{$cpassword}')";
        $result = mysqli_query($conn, $sql);
        header ("location : login.php");

    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h3>Reigster Yourself</h3>
    <form method="post">
        <label for="">Username:
            <input type="text" name="username" id="username">
        </label><br><br>
        <label for="">Full Name:
            <input type="text" name="fullname" id="name">
        </label><br><br>
        <label for="">Email:
            <input type="email" name="email" id="email">
        </label><br><br>
        <label for="">Password:
            <input type="password" name="passwor" id="password">
        </label><br><br>
        <label for="">Confirm Password:
            <input type="password" name="cpassword" id="cpassword">
        </label><br><br>

        <input type="submit" value="Submit" name="register">
        <br><br>
    </form>
    <p>Already have Account? <a href="login.php">Login</a></p>
</body>
</html>