<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $AdminID = $_POST['AdminID'];

    $sql = "DELETE FROM admins WHERE Admin_ID = '$AdminID'";

    if ($conn->query($sql) === TRUE) {
        echo "Admin removed successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
