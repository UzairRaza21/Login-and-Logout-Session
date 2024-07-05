<?php
include("login-auth.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <a href="logout.php">Logout</a>
    <h3>Welcome <?php echo $_SESSION['username'] ?></h3>
</body>
</html>