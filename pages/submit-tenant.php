<?php
include "../includes/koneksi.php";

// Collect the form data
$fullname = $_POST['fullname'];
$address = $_POST['address'];
$roomtype = $_POST['roomtype'];
$roomnumber = $_POST['roomnumber'];
$paymentstatus = $_POST['paymentstatus'];
$phone = $_POST['phone'];
$rentalduration = $_POST['rentalduration'];
$entrydate = $_POST['entrydate'];
$enddate = $_POST['enddate'];
$totalprice = $_POST['totalprice'];
$installments = $_POST['installments'];

// Prepare and bind
$sql = "INSERT INTO tenant (fullname, address, roomtype, roomnumber, paymentstatus, phone, rentalduration, entrydate, enddate, totalprice, installments) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($koneksi, $sql);
mysqli_stmt_bind_param($stmt, "ssssssssdds", $fullname, $address, $roomtype, $roomnumber, $paymentstatus, $phone, $rentalduration, $entrydate, $enddate, $totalprice, $installments);

// Execute the statement
if (mysqli_stmt_execute($stmt)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
}

// Close the statement and connection
mysqli_stmt_close($stmt);
mysqli_close($koneksi);

// Redirect to the specified page
header("Location: lihat_penghuni.php");
exit();
?>
