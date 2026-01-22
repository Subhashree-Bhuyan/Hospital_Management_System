<?php
include("../config/db.php");

$res = mysqli_query($con, "
SELECT 
    patients.name AS patient,
    doctors.name AS doctor,
    appointments.appointment_date
FROM appointments
JOIN patients ON appointments.patient_id = patients.patient_id
JOIN doctors ON appointments.doctor_id = doctors.doctor_id
ORDER BY appointments.appointment_date
");
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
        <h2>Appointment Report</h2>

        <table border="5">
            <tr>
                <th>Patient</th>
                <th>Doctor</th>
                <th>Date</th>
            </tr>

            <?php while($r = mysqli_fetch_assoc($res)) { ?>
            <tr>
                <td><?= $r['patient'] ?></td>
                <td><?= $r['doctor'] ?></td>
                <td><?= $r['appointment_date'] ?></td>
            </tr>
            <?php } ?>
        </table>
        
        <a href="../dashboard.php" class="back">Back</a>
    </div>
</body>
</html>