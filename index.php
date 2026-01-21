<?php
session_start();
include("config/db.php");

$error = "";
if(isset($_POST['login'])){
    $u = $_POST['username'];
    $p = $_POST['password'];

    $q = "SELECT * FROM admin WHERE username = '$u' AND password = '$p'";
    $res = mysqli_query($con, $q);
    if(mysqli_num_rows($res) == 1){
        $_SESSION['admin'] = $u;
        header("Location: dashboard.php");
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