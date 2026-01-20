<?php
// Enable error reporting for debugging locally
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Laragon/PHP sometimes populates $_POST differently if Content-Type is missing
    // but standard forms should work. Let's ensure we trim inputs.
    $firstName = isset($_POST['first-name']) ? trim($_POST['first-name']) : '';
    $lastName = isset($_POST['last-name']) ? trim($_POST['last-name']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
    $subject = isset($_POST['subject']) ? trim($_POST['subject']) : '';
    $message = isset($_POST['message']) ? trim($_POST['message']) : '';

    if (empty($firstName) || empty($lastName) || empty($email) || empty($message)) {
        echo "<h2>Submission Error</h2>";
        echo "<p>Please fill in all required fields.</p>";
        echo "<a href='javascript:history.back()'>Go Back</a>";
        exit;
    }

    try {
        $pdo = get_db_connection();
        $stmt = $pdo->prepare("INSERT INTO contact_messages (first_name, last_name, email, phone, subject, message) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$firstName, $lastName, $email, $phone, $subject, $message]);
        
        // Redirect back to contact page with success
        header("Location: ../page/contact.html?success=1");
        exit;
    } catch (Exception $e) {
        echo "<h2>Database Error</h2>";
        echo "<p>" . htmlspecialchars($e->getMessage()) . "</p>";
        echo "<a href='javascript:history.back()'>Go Back</a>";
        exit;
    }
} else {
    // Not a POST request
    header("Location: ../page/contact.html");
    exit;
}
?>