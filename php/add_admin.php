<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $AdminID = $_POST['AdminID']; // Optional if auto-increment is used
    $Name = $_POST['Name'];
    $Password = password_hash($_POST['Password'], PASSWORD_BCRYPT); // Hash password for security

    $sql = "INSERT INTO admins (Admin_ID, Name, Password) VALUES ('$AdminID', '$Name', '$Password')";

    if ($conn->query($sql) === TRUE) {
        echo "Admin added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
