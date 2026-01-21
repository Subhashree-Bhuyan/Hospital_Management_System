<?php
include('../config/db.php');

if(isset($_POST['add'])){
    $name = $_POST['name'];
    $department = $_POST['department'];
    $available_days = $_POST['available_days'];

    $query = "INSERT INTO doctors (name, department, available_days) VALUES ('$name', '$department', '$available_days')";

    mysqli_query($con, $query);
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
    <h2>Add Doctor</h2>

    <form method="post">
        <input type="text" name="name" placeholder="Doctor name" required> <br><br>
        <input type="text" name="department" placeholder="Department" required> <br><br>
        <input type="text" name="available_days" placeholder="Available Days" required> <br><br>

        <button name="add">Add Doctor</button>
    </form>

    <br>
    <a href="view.php">View Doctors</a>
</body>
</html>