<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $donationType = $_POST['donation-type'] ?? '';
    $amount = $_POST['amount'] ?? $_POST['custom-amount'] ?? 0;
    $name = trim($_POST['donor-name'] ?? '');
    $email = trim($_POST['donor-email'] ?? '');
    $phone = trim($_POST['donor-phone'] ?? '');

    if (empty($amount) || empty($email)) {
        echo "<h2>Submission Error</h2>";
        echo "<p>Amount and email are required.</p>";
        echo "<a href='javascript:history.back()'>Go Back</a>";
        exit;
    }

    try {
        $pdo = get_db_connection();
        $stmt = $pdo->prepare("INSERT INTO donations (donation_type, amount, donor_name, donor_email, donor_phone, reference, status) VALUES (?, ?, ?, ?, ?, ?, 'success')");
        $stmt->execute([$donationType, (float)$amount, $name, $email, $phone, $_POST['reference'] ?? '']);
        
        // Success response
        echo json_encode(['status' => 'success']);
        exit;
    } catch (Exception $e) {
        echo "<h2>Database Error</h2>";
        echo "<p>" . htmlspecialchars($e->getMessage()) . "</p>";
        echo "<a href='javascript:history.back()'>Go Back</a>";
        exit;
    }
}
?>