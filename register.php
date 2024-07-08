<?php
include("conn.php");

if (isset($_POST['register'])) {
    if ($_POST['passwor'] != $_POST['cpassword']) {
        echo "Please enter the same password";
    } else {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, md5($_POST['passwor']));
        $cpassword = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
        $role = mysqli_real_escape_string($conn, $_POST['role']);

        // Corrected SQL query to check for existing username
        $sql1 = "SELECT username FROM user WHERE username = '{$username}'";
        $result1 = mysqli_query($conn, $sql1) or die("Query Failed");

        // Corrected condition to check for existing username
        if (mysqli_num_rows($result1) > 0) {
            echo "<p style='color: red; text-align: center; margin: 10px 0;'>Username already exists</p>";
        } else {
            // Insert new user
            $sql = "INSERT INTO user (username, fullname, email, passwor, cpassword, role) VALUES ('$username', '$fullname', '$email', '$password', '$cpassword', '$role')";
            $result = mysqli_query($conn, $sql);

            // Corrected redirection
            header("Location: login.php");
            exit();
        }
    }
}

$conn->close();
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
    <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
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
        <label for="">Role : 
            <select value="" name="role">
                <option name="" id="" value="0">Normal User</option>
                <option name=""  id="" value="1">Admin</option>
            </select> <br><br>
        </label>

        <input type="submit" value="Submit" name="register">
        <br><br>
    </form>
    <p>Already have Account? <a href="login.php">Login</a></p>
</body>
</html>