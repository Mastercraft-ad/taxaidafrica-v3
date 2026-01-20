<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $partnerName = trim($_POST['partner_name'] ?? '');
    $partnerType = $_POST['partner_type'] ?? '';
    $contactPerson = trim($_POST['contact_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if (empty($partnerName) || empty($contactPerson) || empty($email)) {
        echo "<h2>Submission Error</h2>";
        echo "<p>Partner name, contact person, and email are required.</p>";
        echo "<a href='javascript:history.back()'>Go Back</a>";
        exit;
    }

    try {
        $pdo = get_db_connection();
        $stmt = $pdo->prepare("INSERT INTO partnership_inquiries (partner_name, partner_type, contact_person, email, phone, message) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$partnerName, $partnerType, $contactPerson, $email, $phone, $message]);

        header("Location: ../page/partner.html?success=1");
        exit;
    } catch (Exception $e) {
        echo "<h2>Database Error</h2>";
        echo "<p>" . htmlspecialchars($e->getMessage()) . "</p>";
        echo "<a href='javascript:history.back()'>Go Back</a>";
        exit;
    }
}
?>