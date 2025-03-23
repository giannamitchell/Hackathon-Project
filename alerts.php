<?php
// Database connection
$host = 'localhost';
$username_db = 'root';
$password_db = '';
$database = 'healthcare_system';

$conn = new mysqli($host, $username_db, $password_db, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve vital signs from POST request
$heart_rate = isset($_POST['heart_rate']) ? $_POST['heart_rate'] : null;
$blood_pressure = isset($_POST['blood_pressure']) ? $_POST['blood_pressure'] : null;
$temperature = isset($_POST['temperature']) ? $_POST['temperature'] : null;
$spo2 = isset($_POST['spo2']) ? $_POST['spo2'] : null;

// Set thresholds for alert (example thresholds)
$threshold_heart_rate = 100; // Heart rate above 100 is an alert
$threshold_systolic_bp = 140; // Systolic BP above 140 is an alert
$threshold_temperature = 38; // Temperature above 38°C is an alert
$threshold_spo2 = 90; // SPO2 below 90% is an alert

// Check if any vital sign exceeds the threshold
$alert_message = "";

if ($heart_rate > $threshold_heart_rate) {
    $alert_message = "Alert: High heart rate detected!";
} elseif ($blood_pressure > $threshold_systolic_bp) {
    $alert_message = "Alert: High blood pressure detected!";
} elseif ($temperature > $threshold_temperature) {
    $alert_message = "Alert: High body temperature detected!";
} elseif ($spo2 < $threshold_spo2) {
    $alert_message = "Alert: Low SPO2 detected!";
}

// If there's an alert, insert it into the database
if (!empty($alert_message)) {
    $patient_id = 1; // Example patient ID, in a real system, this should be dynamic based on the logged-in patient

    // Insert the alert into the database
    $stmt = $conn->prepare("INSERT INTO alerts (patient_id, alert_message) VALUES (?, ?)");
    $stmt->bind_param("is", $patient_id, $alert_message);
    $stmt->execute();
    $stmt->close();

    // You could also use WebSockets or another real-time solution to notify healthcare providers instantly.
    echo "Alert sent: " . $alert_message;
} else {
    echo "No alert triggered.";
}

$conn->close();
?>
