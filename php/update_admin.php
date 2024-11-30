<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $AdminID = $_POST['AdminID']; // AdminID to identify the admin
    $Name = $_POST['Name'];       // New name (optional)
    $Password = $_POST['Password']; // New password (optional)

    // Check what to update
    $updates = [];
    if (!empty($Name)) {
        $updates[] = "Name = '$Name'";
    }
    if (!empty($Password)) {
        // Hash the new password for security
        $hashedPassword = password_hash($Password, PASSWORD_BCRYPT);
        $updates[] = "Password = '$hashedPassword'";
    }

    // If there are updates to make
    if (!empty($updates)) {
        $updateQuery = "UPDATE admins SET " . implode(", ", $updates) . " WHERE Admin_ID = '$AdminID'";

        if ($conn->query($updateQuery) === TRUE) {
            echo "Admin updated successfully!";
        } else {
            echo "Error updating admin: " . $conn->error;
        }
    } else {
        echo "No changes were made.";
    }
}
?>
