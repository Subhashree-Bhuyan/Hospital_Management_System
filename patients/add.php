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
    <div class="page">
        <h2>Add Patient</h2>

        <form method = "post">
            <input type="text" name="name" placeholder="Patient Name" required>
            <input type="number" name="age" placeholder="Age" required>
            <input type="text" name="gender" placeholder="Gender" required>
            <input type="tel" name="phone" placeholder="Phone" required>
            <input type="text" name="disease" placeholder="Disease" required>

            <button name="add">Add Patient</button>
        </form>

        <div class="btns">
            <a href="view.php" class="other_btn">View Patients</a>
            <a href="../dashboard.php" class="back">Back</a>
        </div>
    </div>
</body>
</html>

