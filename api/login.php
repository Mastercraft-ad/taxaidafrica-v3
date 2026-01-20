<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        echo "<h2>Login Error</h2>";
        echo "<p>Email and password are required.</p>";
        echo "<a href='javascript:history.back()'>Go Back</a>";
        exit;
    }

    try {
        $pdo = get_db_connection();
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password_hash'])) {
            // Success - would start session here
            header("Location: ../index.html?login=success");
            exit;
        } else {
            header("Location: ../page/login.html?error=invalid_credentials");
            exit;
        }
    } catch (Exception $e) {
        echo "<h2>Database Error</h2>";
        echo "<p>" . htmlspecialchars($e->getMessage()) . "</p>";
        echo "<a href='javascript:history.back()'>Go Back</a>";
        exit;
    }
}
?>