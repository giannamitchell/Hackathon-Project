<?php
// Fetch alerts for the healthcare provider
$sql = "SELECT * FROM alerts ORDER BY alert_time DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Patient ID: " . $row['patient_id'] . "<br>";
        echo "Alert Message: " . $row['alert_message'] . "<br>";
        echo "Alert Time: " . $row['alert_time'] . "<br><br>";
    }
} else {
    echo "No alerts.";
}
?>
