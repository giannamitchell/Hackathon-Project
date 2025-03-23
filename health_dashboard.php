<?php
session_start();

// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: healthcare_login.html"); // Assuming a login page exists
    exit;
}

// Database connection details (replace with your actual credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "healthcare_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// --- Data Retrieval (Placeholders) ---

// Get upcoming appointments
$sql_appointments = "SELECT * FROM appointments WHERE appointment_date >= CURDATE() ORDER BY appointment_date LIMIT 5";
$result_appointments = $conn->query($sql_appointments);

// Get patient count
$sql_patients = "SELECT COUNT(*) AS total_patients FROM patients";
$result_patients = $conn->query($sql_patients);
$row_patients = $result_patients->fetch_assoc();
$total_patients = $row_patients['total_patients'];

// Get recent notifications
$sql_notifications = "SELECT * FROM notifications ORDER BY created_at DESC LIMIT 5";
$result_notifications = $conn->query($sql_notifications);
?>