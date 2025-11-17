<?php
// Example API endpoint for future booking storage.
// Currently everything is commented so this file does not execute any logic.

/*
header('Content-Type: application/json');

$action = $_GET['action'] ?? '';

if ($action === 'booking_create') {
    // Read JSON body
    $raw = file_get_contents('php://input');
    $data = json_decode($raw, true);

    // TODO: validate $data and store into database or file
    // Example: append to a JSON file bookings.json in this folder
    // $file = __DIR__ . '/bookings.json';
    // $existing = file_exists($file) ? json_decode(file_get_contents($file), true) : [];
    // $existing[] = $data;
    // file_put_contents($file, json_encode($existing, JSON_PRETTY_PRINT));

    echo json_encode(['status' => 'ok']);
    exit;
}

echo json_encode(['status' => 'noop']);
*/
