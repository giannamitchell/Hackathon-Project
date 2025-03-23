<?php
// search.php

// Simulate searching for patients (replace with actual database query)
function search_patients($query) {
    // Dummy patient data
    $patients = [
        ['id' => 1, 'name' => 'John Doe'],
        ['id' => 2, 'name' => 'Jane Smith'],
        ['id' => 3, 'name' => 'Peter Jones'],
    ];

    $results = [];
    foreach ($patients as $patient) {
        if (stripos($patient['name'], $query) !== false) {
            $results[] = $patient;
        }
    }
    return $results;
}

$query = $_GET['q'] ?? ''; // Get the search query from the URL

header('Content-Type: application/json');
echo json_encode(search_patients($query));
?>