<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');

require_once '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $type = $_POST['adoption_type'] ?? '';
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $country = $_POST['country'] ?? '';
    $state = $_POST['preferred_state'] ?? '';
    $message = trim($_POST['message'] ?? '');

    if (empty($name) || empty($email)) {
        echo json_encode(['status' => 'error', 'message' => 'Name and email are required']);
        exit;
    }

    try {
        $pdo = get_db_connection();
        
        // We use the support_requests table for adoption matching
        $sql = "INSERT INTO support_requests (name, type, location, reason, status, created_at) VALUES (?, ?, ?, ?, 'Awaiting Match', NOW())";
        $stmt = $pdo->prepare($sql);
        
        $location = ($country === 'Nigeria') ? $state : $country;
        $reason = "Adoption Interest: " . ($type === 'individual' ? 'Individual' : 'Corporate') . ". " . $message;
        
        $stmt->execute([$name, 'Adopter', $location, $reason]);

        echo json_encode(['status' => 'success']);
        exit;
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        exit;
    }
}
?>