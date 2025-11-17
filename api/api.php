<?php
// Simple API endpoint for bookings.
// - action=booking_email : sends an email with booking details (server-side)
// - action=booking_create: (example, still commented) for future storage

header('Content-Type: application/json');

$action = $_GET['action'] ?? '';

// --- SEND BOOKING EMAIL (ACTIVE) ---
if ($action === 'booking_email') {
    $raw = file_get_contents('php://input');
    $payload = json_decode($raw, true);

    if (!$payload || empty($payload['meta'])) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid payload']);
        exit;
    }

    $meta = $payload['meta'];

    // Adjust this to your admin email if needed
    $to = 'kothagunduraviteja@gmail.com';
    $subject = 'New booking: ' . ($meta['bookingType'] ?? 'Booking');

    $lines = [
        'Name: ' . ($meta['name'] ?? ''),
        'Email: ' . ($meta['email'] ?? ''),
        'Mobile: ' . ($meta['mobile'] ?? ''),
        'Type: ' . ($meta['bookingType'] ?? ''),
        'Start: ' . ($meta['startDate'] ?? ''),
        'End: ' . ($meta['endDate'] ?? ''),
        'Days: ' . ($meta['days'] ?? ''),
        'Catering: ' . ($meta['catering'] ?? ''),
        'Decoration: ' . ($meta['decoration'] ?? ''),
        'Notes: ' . ($meta['notes'] ?? ''),
    ];

    $body = implode("\r\n", $lines);

    // Basic headers; for more reliable delivery, configure SMTP instead of mail()
    $headers = 'From: bookings@' . ($_SERVER['SERVER_NAME'] ?? 'example.com');

    $ok = @mail($to, $subject, $body, $headers);

    if ($ok) {
        echo json_encode(['status' => 'ok']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'mail() failed']);
    }
    exit;
}

/*
// --- FUTURE: STORE BOOKING SERVER-SIDE (EXAMPLE, STILL COMMENTED) ---
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
*/

echo json_encode(['status' => 'noop']);
