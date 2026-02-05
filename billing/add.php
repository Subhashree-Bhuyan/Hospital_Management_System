<?php
include("../config/db.php");

// fetch patients
$patients = mysqli_query($con, "SELECT patient_id, name FROM patients");

if (isset($_POST['add'])) {
    $patient_id = $_POST['patient_id'];
    $amount = $_POST['amount'];
    $status = $_POST['payment_status'];

    $q = "INSERT INTO billing (patient_id, amount, bill_date, payment_status)
          VALUES ('$patient_id', '$amount', CURDATE(), '$status')";

    mysqli_query($con, $q);
    header("Location: view.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Bill</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="page">
    <h2>Add Billing Entry</h2>

    <form method="post">
        <select name="patient_id" required>
            <option value="" disabled selected>Select Patient</option>
            <?php while ($p = mysqli_fetch_assoc($patients)) { ?>
                <option value="<?= $p['patient_id'] ?>">
                    <?= $p['name'] ?>
                </option>
            <?php } ?>
        </select>

        <input type="number" name="amount" placeholder="Amount" required>

        <select name="payment_status" required>
            <option value="Paid">Paid</option>
            <option value="Pending">Pending</option>
        </select>

        <button name="add">Save Bill</button>
    </form>

    <div class="btns">
        <a href="view.php" class="other_btn">View Billing</a>
        <a href="../dashboard.php" class="back">Back</a>
