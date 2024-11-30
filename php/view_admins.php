<?php
include 'db_connection.php';

$sql = "SELECT * FROM admins";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Admin ID</th><th>Name</th><th>Password (Hashed)</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['Admin_ID'] . "</td>";
        echo "<td>" . $row['Name'] . "</td>";
        echo "<td>" . $row['Password'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No admins found!";
}
?>
