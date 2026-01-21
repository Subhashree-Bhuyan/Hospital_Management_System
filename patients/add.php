<?php
include("../config/db.php");

if(isset($_POST['add'])){
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $disease = $_POST['disease'];

    $query = "INSERT INTO patients (name, age, gender, phone, disease) VALUES ('$name', '$age', '$gender', '$phone', '$disease')";
    
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
    <h2>Add Patient</h2>

    <form method = "post">
        <input type="text" name="name" placeholder="Patient Name" required><br><br>
        <input type="number" name="age" placeholder="Age" required><br><br>
        <input type="text" name="gender" placeholder="Gender" required><br><br>
        <input type="tel" name="phone" placeholder="Phone" required><br><br>
        <input type="text" name="disease" placeholder="Disease" required><br><br>

        <button name="add">Add Patient</button>
    </form>

    <br>
    <a href="view.php" class="btn">View Patients</a>
    <a href="../dashboard.php" class="btn">Back</a>
</body>
</html>

