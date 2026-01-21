<?php
include('../config/db.php');

$q = "SELECT appointments.id,
    patients.name AS patient_name,
    doctors.name AS doctor_name, 
    appointments.appointment_date 
    FROM appointments 
    JOIN patients ON appointments.patient_id = patients.patient_id
    JOIN doctors ON appointments.doctor_id = doctors.doctor_id";

    $res = mysqli_query($con, $q);
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
    <h2>Appointments</h2>

    <table border="1">
        <tr>
            <th>Patient</th>
            <th>Doctor</th>
            <th>Date</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($res)) { ?>
        <tr>
            <td><?= $row['patient_name'] ?></td>
            <td><?= $row['doctor_name'] ?></td>
            <td><?= $row['appointment_date'] ?></td>
        </tr>
<?php } ?>
    </table>
    <br><br>
    <a href="../dashboard.php" class="btn">Back</a>
</body>
</html>