<?php
include("../config/db.php");

$q = "
SELECT 
    billing.bill_id,
    patients.name AS patient_name,
    billing.amount,
    billing.bill_date,
    billing.payment_status
FROM billing
JOIN patients ON billing.patient_id = patients.patient_id
ORDER BY billing.bill_date DESC
";

$res = mysqli_query($con, $q);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Billing Report</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="page">
        <h2>Billing Report</h2>

        <table border="5" cellpadding="10">
            <tr>
                <th>Bill ID</th>
                <th>Patient Name</th>
                <th>Amount</th>
                <th>Bill Date</th>
                <th>Status</th>
            </tr>

            <?php while($row = mysqli_fetch_assoc($res)) { ?>
            <tr>
                <td><?= $row['bill_id'] ?></td>
                <td><?= $row['patient_name'] ?></td>
                <td><?= $row['amount'] ?></td>
                <td><?= $row['bill_date'] ?></td>
                <td><?= $row['payment_status'] ?></td>
            </tr>
            <?php } ?>
        </table>

        <a href="../dashboard.php" class="back">Back</a>
    </div>
</body>
</html>
