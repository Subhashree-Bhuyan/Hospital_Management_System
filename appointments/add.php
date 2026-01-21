<?php
include('../config/db.php');

//fetch patients
$patients = mysqli_query($con, "SELECT patient_id, name FROM patients");

//fetch doctors
$doctors = mysqli_query($con, "SELECT doctor_id, name FROM doctors");

if(isset($_POST['save'])){
    $patient_id = $_POST['patient_id'];
    $doctor_id = $_POST['doctor_id'];
    $date = $_POST['date'];

    $q = "INSERT INTO appointments (patient_id, doctor_id, appointment_date) VALUES ('$patient_id', '$doctor_id', '$date')";

    mysqli_query($con, $q);
    header("Location: view.php");
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
    <h2>Book Appointment</h2>

    <form method='post'>
        <select name="patient_id" required>
            <option value="" disabled selected>Select Patient</option>
            <?php while($p = mysqli_fetch_assoc($patients)){ ?>
                <option value="<?= $p['patient_id']?>"><?= $p['name'] ?></option>
            <?php } ?>
        </select> <br><br>

        <select name="doctor_id" required>
        <option value="" disabled selected>Select Doctor</option>
        <?php while($d = mysqli_fetch_assoc($doctors)) { ?>
            <option value="<?= $d['doctor_id'] ?>"><?= $d['name'] ?></option>
        <?php } ?>
        </select><br><br>

        <input type="date" name="date" required><br><br>

        <button type="submit" name="save">Book</button>
        </form>
</body>
</html>