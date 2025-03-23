<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "healthcare_system";

header("Content-Type: application/json");

try {
    // Create a new connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }

    // Fetch patients from the database
    $sql = "SELECT full_name FROM patient_registration";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $patients = [];
        while ($row = $result->fetch_assoc()) {
            $patients[] = $row['full_name'];  // Assuming 'full_name' is the column with patient names
        }

        // Return the patient list as a JSON response
        echo json_encode($patients);
    } else {
        echo json_encode(["message" => "No patients found."]);
    }

} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
} finally {
    $conn->close();
}
?>
