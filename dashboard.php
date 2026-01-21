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
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Welcome, Admin</h1>

    <!-- <ul>
        <li>Patient Management</li>
        <li>Doctor Management</li>
        <li>Appointment Management</li>
    </ul> -->

    <ul>
        <li><a href="patients/add.php">Add Patient</a></li>
        <li><a href="patients/view.php">View Patients</a></li>
        <li><a href="doctors/add.php">Add Doctor</a></li>
        <li><a href="doctors/view.php">View Doctors</a></li>
        <li><a href="appointments/add.php">Book Appointment</a></li>
        <li><a href="appointments/view.php">View Appointments</a></li>
        <li><a href="appointments/report.php">Appointment Report</a></li>

    </ul>


    <a class="logout" href="logout.php">Logout</a>
</body>
</html>