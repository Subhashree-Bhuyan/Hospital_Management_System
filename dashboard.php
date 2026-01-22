<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: index.php");
}

// count card
include("config/db.php");

$patient_count = mysqli_fetch_assoc(
    mysqli_query($con, "SELECT COUNT(*) AS total FROM patients")
)['total'];

$doctor_count = mysqli_fetch_assoc(
    mysqli_query($con, "SELECT COUNT(*) AS total FROM doctors")
)['total'];

$appointment_count = mysqli_fetch_assoc(
    mysqli_query($con, "SELECT COUNT(*) AS total FROM appointments")
)['total'];
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
    <nav>
        <!-- <span>Admin</span> -->
        <a class="logout" href="logout.php">Logout</a>
    </nav>
    <div class="main-container">
        <!-- Menu -->
        <div class="menu">
            <h2>Hospital</h2>
            <a href="patients/add.php">Add Patient</a>
            <a href="patients/view.php">View Patients</a>
            <a href="doctors/add.php">Add Doctor</a>
            <a href="doctors/view.php">View Doctors</a>
            <a href="appointments/add.php">Book Appointment</a>
            <a href="appointments/view.php">View Appointments</a>
            <a href="appointments/report.php">Appointment Report</a>
        </div>


    <div class="content">
        <h1>Welcome, <?php echo ucwords(strtolower($_SESSION['admin'])); ?></h1>
        <!-- Count card -->
        <div class="cards">
            <div class="card">
                <h3>Total Patients</h3>
                <p><?= $patient_count ?></p>
            </div>

            <div class="card">
                <h3>Total Doctors</h3>
                <p><?= $doctor_count ?></p>
            </div>

            <div class="card">
                <h3>Total Appointments</h3>
                <p><?= $appointment_count ?></p>
            </div>
        </div>
    </div>
    </div>
</body>
</html>