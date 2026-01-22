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
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="page">
        <h2>Add Doctor</h2>

        <form method="post">
            <input type="text" name="name" placeholder="Doctor name" required>
            <input type="text" name="department" placeholder="Department" required>
            <input type="text" name="available_days" placeholder="Available Days" required>

            <button name="add">Add Doctor</button>
        </form>

        <div class="btns">
            <a href="view.php" class="other_btn">View Doctors</a>
            <a href="../dashboard.php" class="back">Back</a>
        </div>
    </div>
</body>
</html>