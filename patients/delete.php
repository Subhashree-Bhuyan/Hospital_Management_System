<?php
include("../config/db.php");

$id = $_GET['id'];

mysqli_query($con, "DELETE FROM patients WHERE patient_id=$id");

header("Location: view.php");
?>
