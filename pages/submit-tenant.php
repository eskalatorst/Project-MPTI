<?php
// Include the database connection file
include '../includes/koneksi.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $fullname = mysqli_real_escape_string($koneksi, $_POST['fullname']);
    $address = mysqli_real_escape_string($koneksi, $_POST['address']);
    $roomtype = mysqli_real_escape_string($koneksi, $_POST['roomtype']);
    $paymentstatus = mysqli_real_escape_string($koneksi, $_POST['paymentstatus']);
    $phone = mysqli_real_escape_string($koneksi, $_POST['phone']);
    $rentalduration = mysqli_real_escape_string($koneksi, $_POST['rentalduration']);
    $entrydate = mysqli_real_escape_string($koneksi, $_POST['entrydate']);
    $totalprice = isset($_POST['totalprice']) ? mysqli_real_escape_string($koneksi, $_POST['totalprice']) : null;
    $installments = isset($_POST['installments']) ? mysqli_real_escape_string($koneksi, $_POST['installments']) : null;

    // Insert data into the tenant table with prepared statement
    $sql = "INSERT INTO tenant (fullname, address, roomtype, paymentstatus, phone, rentalduration, entrydate, totalprice, installments)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssssd", $fullname, $address, $roomtype, $paymentstatus, $phone, $rentalduration, $entrydate, $totalprice, $installments);

    // Execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        // Redirect to the specified page after successful insertion
        header("Location: " . $_POST['redirect']);
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }

    // Close the statement
    mysqli_stmt_close($stmt);
    
    // Close the database connection
    mysqli_close($koneksi);
}
?>
