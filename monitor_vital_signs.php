<?php
// Database credentials
$host = 'localhost';
$username_db = 'root';
$password_db = '';
$database = 'healthcare_system';

// Connect to the database
$conn = new mysqli($host, $username_db, $password_db, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to check vital signs and trigger alerts
function checkVitalsAndAlert($conn) {
    // Get the latest vital signs for each patient (you may have more conditions to check)
    $sql = "SELECT * FROM vitals ORDER BY timestamp DESC LIMIT 1";  // Get the latest record (modify to get all)
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $patient_id = $row['patient_id'];
            $heart_rate = $row['heart_rate'];
            $blood_pressure = $row['blood_pressure'];
            $temperature = $row['temperature'];
            $spo2 = $row['spo2'];

            // Define the thresholds
            $alert_message = "";

            // Heart Rate check
            if ($heart_rate < 60 || $heart_rate > 100) {
                $alert_message .= "Abnormal heart rate detected! ";
            }

            // Blood Pressure check (splitting systolic and diastolic)
            list($systolic, $diastolic) = explode('/', $blood_pressure);
            if ($systolic > 140 || $diastolic > 90) {
                $alert_message .= "Abnormal blood pressure detected! ";
            }

            // Temperature check
            if ($temperature < 36 || $temperature > 38) {
                $alert_message .= "Abnormal temperature detected! ";
            }

            // SpO2 check
            if ($spo2 < 90) {
                $alert_message .= "Low SpO2 detected! ";
            }

            // If there is an alert message, insert into the `alerts` table
            if (!empty($alert_message)) {
                $stmt = $conn->prepare("INSERT INTO alerts (patient_id, alert_message) VALUES (?, ?)");
                $stmt->bind_param("is", $patient_id, $alert_message);
                $stmt->execute();
                $stmt->close();

                echo "Alert triggered for Patient ID: $patient_id - $alert_message<br>";
            }
        }
    } else {
        echo "No vital signs found in the database.";
    }
}

// Call the function to check the latest vitals and generate alerts if necessary
checkVitalsAndAlert($conn);

// Close the connection
$conn->close();
?>
