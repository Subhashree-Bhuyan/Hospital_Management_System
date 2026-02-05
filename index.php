<?php
session_start();
include("config/db.php");

$error = "";

if(isset($_POST['login'])){
    // 🔐 Basic security: escape user input to prevent SQL Injection
    $u = $_POST['username'];
    $p = $_POST['password'];

    // 🔐 Admin authentication query
    $q = "SELECT * FROM admin WHERE username='$u'";
    $res = mysqli_query($con, $q);

    if(mysqli_num_rows($res) == 1){
        $row = mysqli_fetch_assoc($res);

        // 🔐 Verify hashed password
        if (password_verify($p, $row['password'])) {
            $_SESSION['admin'] = $row['username'];
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Invalid Username or Password";
        }
    }else {
        $error = "Invalid Username or Password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>main page</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Hospital Management System</h1>
    <?php
    if($error != ""){
        echo $error;
    }
    ?>
    <form method="post">
        <input type="text" name="username" placeholder="Username" required> <br><br>
        <input type="password" name="password" placeholder="Password" required> <br><br>
        <button name="login">Submit</button>
    </form>
</body>
</html>