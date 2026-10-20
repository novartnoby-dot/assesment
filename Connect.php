<?php

$host = "localhost";
$user = "root";
$password = ""; // Replace with your actual password
$dbname = "studybudy";

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
   echo "Connection failed: " . $conn->connect_error;
} else {
   echo "Connection successful.";
}
