<?php

include "Connect.php";

// Check if the 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare and execute the SQL query 
    $stmt = $conn->prepare("SELECT * FROM candidates WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a record was found
    foreach ($result as $row) {
        echo "
            <tr>
            <br>
                <td><strong>ID:</strong></td>
                <td>{$row['id']}</td><br>
            </tr>
            <tr>
                <td><strong>First Name:</strong></td>
                <td>{$row['Firstname']}</td><br>
            </tr>
            <tr>
                <td><strong>Second Name:</strong></td>
                <td>{$row['Secondname']}</td><br>
            </tr>
            <tr>
                <td><strong>Email:</strong></td>
                <td>{$row['Email']}</td><br>
            </tr>";
    }

    // Close the statement
    $stmt->close();
} else {
    echo "No ID parameter provided in the URL.";
}