<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Welcome, Admin</h1>

    <ul>
        <li>Patient Management</li>
        <li>Doctor Management</li>
        <li>Appointment Management</li>
    </ul>

    <a href="logout.php">Logout</a>
</body>
</html>